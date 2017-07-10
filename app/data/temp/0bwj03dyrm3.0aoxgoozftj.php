<div class="WidgetWidth200 shadow RadCornAll PGLWidget fbp_MainBox fbp_widget_Box" style="">
    <div class="WidgetHeaderBar fbp_widgetBox">Forebyggelsesplan
        <a href="javascript:void(0)" class="PG-help"></a>
    </div>

    <div class="ContentWidgetNu">

        <div class="fgp_MainBox"></div>
        

    </div>
    <div class="WD-Button WidgetButtons">
        <a id="ButtonForebygg" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentForebygg"></div>

    <div id="PG-HelpContent" class="popover bottom">
        <div class="title">Forebyggelsesplan</div>
        <p>
            For at tilføje en Risikosituation eller
            et Tidligt advarselstegn skal du
            klikke på knappen nedenfor den
            pågældende liste.
            Når du markerer et advarselstegn på
            listen, kan du i højre kolonne
            formulere en personlig handleplan for
            hvad du skal gøre i tilfælde af at du
            oplever det pågældende advarselstegn.

        </p>
    </div>
</div>

<script>

    $(document).ready(function (){
        // modal help
        $('.PG-help').popover({
            
            content: $('#PG-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });

    $('#ButtonForebygg').click(function () {
        $('#ContentForebygg').load('<?php echo $ROOT; ?>/window/foreb/show', function () {
            $('#ModalForebygg').modal('show');
        });
    });

</script>
