$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
        eventDrop: function(event, delta, revertFunc) {

            //alert(event.title + " con id " + event.id_encuentro + "se mueve a la fecha " + event.start.format());

            if (!confirm(event.title + " con id " + event.id_encuentro + "se mueve a la fecha " + event.start.format() + ".\n ¿Seguro de moverlo?")) {
                revertFunc();
            }
            else {
            	window.location.replace("/calendario/reasignarfecha/" + event.id_encuentro + "/" + event.start.format());
            }
        },
    	events: "/calendario_feed"
    })

});