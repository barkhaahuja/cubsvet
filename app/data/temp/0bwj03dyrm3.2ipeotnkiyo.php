<div class="WidgetWidth200 shadow RadCornAll">
    <div class="EventsWidgetHeaderBar">Aktivitetskalender<a href="javascript:void(0);" class="CAL-help help"></a></div>

    <div class="ContentWidgetEvents">

        <div class="WD-Events-Date"><?php echo $datec; ?></div>
        <div class="WD-HR"></div>
        <div class="WD-Events-Day"><?php echo $day; ?></div>

    </div>
    <div id="ButtonCalendar" class="WD-Button WidgetButtons">
        <a href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>
</div>

<div id="ContentCalendar"></div>

<div id="CAL-HelpContent" class="popover bottom">
    <div class="title">Aktivitetskalender</div>
    <p>Dette er din aktivitetskalender. Den
        skal du bruge til at lave registrere
        dine aktiviteter. Aktivitetsregistrering
        hjælper dig til at få overblik over de
        aktiviteter du laver hver dag.
        Klik på ÅBN for at bruge redskabet.
    </p>
</div>



<script>

    $('#ButtonCalendar').click(function () {
        <?php if ($current_step == 2): ?>
        $('#ContentCalendar').load('<?php echo $ROOT; ?>/window/calendar?id=<?php echo date("Ymdhis", time()); ?>', function () {
            $('#ModalCalendar').modal('show');
            
            $('#ModalCalendar').on('shown.bs.modal', function () {
                $("#calendar").fullCalendar('render');
            });
            $('#ModalCalendar').on('hidden.bs.modal', function (e) { 
               window.location.href= window.location.href;
            });
        });
        <?php endif; ?>
        <?php if ($current_step == 3): ?>
         <?php if ($current_sub_step <= 2): ?>
        $('#ContentCalendar').load('<?php echo $ROOT; ?>/window/calendar?id=<?php echo date("Ymdhis", time()); ?>', function () {
            $('#ModalCalendar').modal('show');
            $('#ModalCalendar').on('shown.bs.modal', function () {
                $("#calendar").fullCalendar('render');
            });
            $('#ModalCalendar').on('hidden.bs.modal', function (e) { 
               window.location.href= window.location.href;
            });
        });
        <?php endif; ?>
       <?php if ($current_sub_step > 2): ?>
         $('#ContentCalendar').load('<?php echo $ROOT; ?>/window/calendar32?id=<?php echo date("Ymdhis", time()); ?>', function () {
            $('#ModalCalendar').modal('show');
            $('#ModalCalendar').on('shown.bs.modal', function () {
                $("#calendar").fullCalendar('render');
            });
            $('#ModalCalendar').on('hidden.bs.modal', function (e) { 
               window.location.href= window.location.href;
            });
        });
        
         <?php endif; ?>
        <?php endif; ?>
        <?php if ($current_step >= 4): ?>
        $('#ContentCalendar').load('<?php echo $ROOT; ?>/window/calendar39?id=<?php echo date("Ymdhis", time()); ?>', function () {
            $('#ModalCalendar').modal('show');
            $('#ModalCalendar').on('shown.bs.modal', function () {
                $("#calendar").fullCalendar('render');
            });
            $('#ModalCalendar').on('hidden.bs.modal', function (e) { 
               window.location.href= window.location.href;
            });
        });
        <?php endif; ?>
    });

</script>


<script>

    $(document).ready(function (){
        // modal help
        $('.CAL-help').popover({
            content: $('#CAL-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });

</script>