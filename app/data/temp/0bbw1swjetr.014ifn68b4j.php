<link rel='stylesheet' href='<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.css' />
<script src='<?php echo $ROOT; ?>/3rdparty/fullcalendar/jquery.min.js'></script>
<script src='<?php echo $ROOT; ?>/3rdparty/fullcalendar/lib/moment.min.js'></script>
<script src='<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.js'></script>


<script type="text/javascript">

$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
    })

});

</script>

<div id='calendar'></div>