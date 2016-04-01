
DROP PROCEDURE IF EXISTS ArmarFixture;
DELIMITER $$
CREATE PROCEDURE ArmarFixture(IN v_torneo BIGINT)
BEGIN
	
    DECLARE v_id_grupo_por_ronda, v_idtorneo, v_idronda, v_idasignacion_en_grupo_por_ronda BIGINT UNSIGNED;
	DECLARE v_idtipo_competencia, v_idgrupo, v_cant_grupos, v_puesto_equipo_a, v_puesto_equipo_b, v_cant_participantes_grupo, v_cant_participantes_torneo INT UNSIGNED;
	DECLARE v_idayvuelta, v_asignar_por_sorteo BIT;
    DECLARE salir bit default 0;
    DECLARE cont_equipos_desde int;
    
    DECLARE config_torneo CURSOR FOR 
		select gr.id_grupo_por_ronda, gr.idtorneo, gr.idronda, gr.idtipo_competencia, gr.idgrupo, gr.idayvuelta, gr.cant_participantes,
		r.cant_grupos,
		ag.idasignacion_en_grupo_por_ronda, ag.puesto_equipo_a, ag.puesto_equipo_b, ag.asignar_por_sorteo
		from grupo_por_ronda gr
		inner join ronda as r on gr.idronda=r.idronda
		inner join asignacion_en_grupo_por_ronda ag on gr.id_grupo_por_ronda=ag.id_grupo_por_ronda
		where gr.idtorneo=v_torneo
		order by gr.id_grupo_por_ronda;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET salir = 1;

	DROP TEMPORARY TABLE IF EXISTS equiposdisponiblesA;
    DROP TEMPORARY TABLE IF EXISTS equiposdisponiblesB;
    
    CREATE TEMPORARY TABLE equiposdisponiblesA (
		idequipo bigint unsigned,
		nro_equipo_asignado_torneo int unsigned
	) ENGINE=MEMORY;
    
    CREATE TEMPORARY TABLE equiposdisponiblesB (
		idequipo bigint unsigned,
		nro_equipo_asignado_torneo int unsigned
	) ENGINE=MEMORY;

    SELECT cant_participantes INTO v_cant_participantes_torneo FROM torneo WHERE idtorneo=v_torneo;
    
    
    
    OPEN config_torneo;
    
    FETCH config_torneo INTO v_id_grupo_por_ronda, v_idtorneo, v_idronda, v_idtipo_competencia, v_idgrupo, v_idayvuelta, v_cant_participantes_grupo,
							v_cant_grupos, v_idasignacion_en_grupo_por_ronda, v_puesto_equipo_a, v_puesto_equipo_b, v_asignar_por_sorteo;
    WHILE salir = 0 DO
    
		IF v_idtipo_competencia = 1 THEN
        
# genero equiposdisponibles para el "todos contra todos" (lista de equipos) segun desde hasta tomado de asignacion_en_grupo_por_ronda.v_puesto_equipo_a
            IF v_asignar_por_sorteo = 0 THEN
				set cont_equipos_desde = v_puesto_equipo_a;
				
				WHILE cont_equipos_desde <= v_puesto_equipo_b DO
				
					INSERT INTO equiposdisponiblesA (idequipo, nro_equipo_asignado_torneo) 
					VALUES (NULL,cont_equipos_desde);
					
					SET cont_equipos_desde = cont_equipos_desde + 1;
				END WHILE;
			ELSE 
            
# obtengo la lista de la cual tomar equipos, es el total de equipos, menos los que ya hayan sido elegidos en algun grupo.            
				INSERT INTO equiposdisponiblesA (idequipo, nro_equipo_asignado_torneo)
				SELECT te.idequipo, te.nro_equipo_asignado_torneo
                FROM (
					SELECT idequipo, nro_equipo_asignado_torneo 
                    FROM equipo_por_torneo 
                    WHERE idtorneo=v_idtorneo) te
				left join (
					SELECT idequipoa, idequipob
                    FROM fixture
                    WHERE idtorneo=v_idtorneo and idronda=v_idronda
					) eu on te.nro_equipo_asignado_torneo = eu.idequipoa or te.nro_equipo_asignado_torneo = eu.idequipob 
				where eu.idequipoa is null and eu.idequipob is null
				;
            
				
            	set cont_equipos_desde = v_puesto_equipo_a;
				
				WHILE cont_equipos_desde <= v_puesto_equipo_b DO
				
					INSERT INTO equiposdisponiblesA (idequipo, nro_equipo_asignado_torneo) 
					VALUES (NULL,cont_equipos_desde);
					
					SET cont_equipos_desde = cont_equipos_desde + 1;
				END WHILE;
                
			END IF;
/*Asigno equipos desde equipo_por_torneo, podria ser desde tabla de posiciones.*/
            UPDATE equiposdisponiblesA e 
				INNER JOIN (SELECT idequipo, numero_equipo_asignado_torneo FROM equipo_por_torneo WHERE idtorneo=v_torneo AND idequipo IS NOT NULL) t
            	ON e.nro_equipo_asignado_torneo = t.numero_equipo_asignado_torneo    
			SET	e.idequipo=t.idequipo;
            
            INSERT INTO equiposdisponiblesB (idequipo, nro_equipo_asignado_torneo)
            SELECT idequipo, nro_equipo_asignado_torneo from equiposdisponiblesA;
                
			INSERT INTO fixture
					(idtorneo,  idronda,idsede,idgrupo,   
					idequipoa,
					idequipob,
					fechaevento,tantosa,tantosb, son_posiciones)
			SELECT v_torneo, v_idronda,  1, v_idgrupo, 
				a.nro_equipo_asignado_torneo,
                b.nro_equipo_asignado_torneo,
				NULL, NULL, NULL, 0
			FROM equiposdisponiblesA a INNER JOIN equiposdisponiblesB b 
				on a.nro_equipo_asignado_torneo < b.nro_equipo_asignado_torneo;
	
            
            # select FLOOR(RAND() * (<max> - <min> + 1)) + <min> aleatorio en un rango inclusive.
            
			TRUNCATE TABLE equiposdisponiblesA;
            TRUNCATE TABLE equiposdisponiblesB;
			
    
        END IF;
		
        IF v_idtipo_competencia = 2 THEN
        
			INSERT INTO fixture
					(idtorneo,  idronda,idsede,idgrupo,   
					idequipoa,
					idequipob,
					fechaevento,tantosa,tantosb, son_posiciones)
			VALUES (v_torneo,v_idronda,  1,v_idgrupo, 
				v_puesto_equipo_a, 
                v_puesto_equipo_b,
				NULL,NULL,NULL, 1);
        
        END IF;
    
        FETCH config_torneo INTO v_id_grupo_por_ronda, v_idtorneo, v_idronda, v_idtipo_competencia, v_idgrupo, v_idayvuelta, v_cant_participantes_grupo,
							v_cant_grupos, v_idasignacion_en_grupo_por_ronda, v_puesto_equipo_a, v_puesto_equipo_b, v_asignar_por_sorteo;
                            
    END WHILE;
    CLOSE config_torneo;
    
	DROP TEMPORARY TABLE IF EXISTS equiposdisponiblesA;
    DROP TEMPORARY TABLE IF EXISTS equiposdisponiblesB;
    
END$$
DELIMITER ;

# call ArmarFixture(1);
# select * from fixture;