use yaftekun;

DELETE FROM torneo;
ALTER TABLE torneo AUTO_INCREMENT=1;

DELETE FROM tipodetorneo;
ALTER TABLE tipodetorneo AUTO_INCREMENT=1;

DELETE FROM fixture;
ALTER TABLE fixture AUTO_INCREMENT=1;

DELETE FROM sede;
ALTER TABLE sede AUTO_INCREMENT=1;

DELETE FROM asignacion_en_grupo_por_ronda;
ALTER TABLE asignacion_en_grupo_por_ronda AUTO_INCREMENT=1;

DELETE FROM grupo_por_ronda;
ALTER TABLE grupo_por_ronda AUTO_INCREMENT=1;

DELETE FROM tipo_competencia;
ALTER TABLE tipo_competencia AUTO_INCREMENT=1;

DELETE FROM grupo;
ALTER TABLE grupo AUTO_INCREMENT=1;


DELETE FROM ronda;
ALTER TABLE ronda AUTO_INCREMENT=1;


INSERT INTO tipodetorneo (idtipodetorneo,nombre,descripcion) VALUES(	1	,'TORNEO APERTURA','Torneo que se juega a fin de año');


insert into sede (idsede, nombre) values(	1,"Sin Sede Asignada");


INSERT INTO torneo (idtorneo,nombre,idtipodetorneo, cant_participantes) VALUES(	1	,'Apertura 2016',	1,10);


INSERT INTO tipo_competencia (idtipo_competencia,nombre) VALUES(	1	,'Todos contra todos');
INSERT INTO tipo_competencia (idtipo_competencia,nombre) VALUES(	2	,'Eliminacion directa');
INSERT INTO tipo_competencia (idtipo_competencia,nombre) VALUES(	3	,'Eliminacion directa con sorteo');

INSERT INTO grupo (idgrupo,nombre) VALUES(	1	,'GENERAL');
INSERT INTO grupo (idgrupo,nombre) VALUES(	2	,'GRUPO A');
INSERT INTO grupo (idgrupo,nombre) VALUES(	3	,'GRUPO B');

INSERT INTO ronda (idronda,idtorneo,nombre, cant_grupos) VALUES(	1	,	1	,'Inicia Aspirantes',	1	);
INSERT INTO ronda (idronda,idtorneo,nombre, cant_grupos) VALUES(	2	,	1	,'Pre Campeones',	2	);

INSERT INTO grupo_por_ronda (id_grupo_por_ronda, idtorneo, idronda, idtipo_competencia, idgrupo, idayvuelta, cant_participantes) VALUES(	1	,	1	,	1	,	1	,	1	,	0	,10);
INSERT INTO grupo_por_ronda (id_grupo_por_ronda, idtorneo, idronda, idtipo_competencia, idgrupo, idayvuelta, cant_participantes) VALUES(	2	,	1	,	2	,	2	,	2	,	0	,4);
INSERT INTO grupo_por_ronda (id_grupo_por_ronda, idtorneo, idronda, idtipo_competencia, idgrupo, idayvuelta, cant_participantes) VALUES(	3	,	1	,	2	,	1	,	3	,	0	,6);

INSERT INTO asignacion_en_grupo_por_ronda (idasignacion_en_grupo_por_ronda,id_grupo_por_ronda,puesto_equipo_a, id_grupo_por_ronda_equipo_a,puesto_equipo_b,id_grupo_por_ronda_equipo_b,referencia_es_equipo) VALUES(	1	,	1	,	1	,	1	,	10	,	1	,	1);
INSERT INTO asignacion_en_grupo_por_ronda (idasignacion_en_grupo_por_ronda,id_grupo_por_ronda,puesto_equipo_a, id_grupo_por_ronda_equipo_a,puesto_equipo_b,id_grupo_por_ronda_equipo_b,referencia_es_equipo) VALUES(	2	,	2	,	1	,	1	,	2	,	1	,	1);
INSERT INTO asignacion_en_grupo_por_ronda (idasignacion_en_grupo_por_ronda,id_grupo_por_ronda,puesto_equipo_a, id_grupo_por_ronda_equipo_a,puesto_equipo_b,id_grupo_por_ronda_equipo_b,referencia_es_equipo) VALUES(	3	,	2	,	3	,	1	,	4	,	1	,	1);
INSERT INTO asignacion_en_grupo_por_ronda (idasignacion_en_grupo_por_ronda,id_grupo_por_ronda,puesto_equipo_a, id_grupo_por_ronda_equipo_a,puesto_equipo_b,id_grupo_por_ronda_equipo_b,referencia_es_equipo) VALUES(	4	,	3	,	5	,	1	,	10	,	1	,	1);




