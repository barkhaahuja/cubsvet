<div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC">
    <div class="WidgetHeaderBar">Aktivitetsliste <a class="PE-helpact" href="javascript:void(0);"></a></div>

    <div class="ContentWidgetNu">

        <div class="WD-ActivityList_Icon"></div>
    </div>
    <div class="WD-Button WidgetButtons">
        <a href="javascript:void(0)" id="ButtonActivityList" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentActivityList"></div>

</div>

<div id="PE-HelpContent1" class="popover bottom">
    <div class="title">Aktivitetsliste</div>
    <p>Formålet med dette redskab er, at give dig et overblik over, hvilke aktiviteter der er henholdsvis 
        tilfredsstillende og krævende for dig. <br/><br/>
        Klik på ÅBN for at arbejde med din aktivitetsliste.
    </p>
</div>

<div id="PE-HelpContent2" class="popover bottom">
    <div class="title">Aktivitetsliste</div>
    <p>Formålet med dette redskab er, at give dig et overblik over, hvilke aktiviteter der er henholdsvis 
        tilfredsstillende og krævende for dig. Aktivitetslisten er også tilgængelig i din kalender.<br/><br/>
        Klik på ÅBN for at arbejde med din aktivitetsliste.
    </p>
</div>

<script>
    $('#ButtonActivityList').click(function () {
        $('#ContentActivityList').load('<?php echo $ROOT; ?>/window/al/show', function () {
            $('#ModalActivityList').modal('show');
        });
    });
    $(document).ready(function () {
        $('.PE-helpact').popover({
            content: $('#PE-HelpContent2').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });
</script>
<script>
    <?php if (isset($current_step) && $current_step == '3' &&  $current_sub_step >= '3'): ?>
            $(document).ready(function () {
        $('.PE-helpact').popover({
            content: $('#PE-HelpContent2').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });
            <?php endif; ?>
</script>
<script>
            <?php if (isset($current_step) && $current_step >= '2' &&  $current_sub_step < '8'): ?>
            $(document).ready(function () {
        $('.PE-helpact').popover({
            content: $('#PE-HelpContent1').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });
            <?php endif; ?>
</script>


