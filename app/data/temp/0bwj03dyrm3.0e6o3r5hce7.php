<div class="WidgetWidth200 shadow RadCornAll PGLWidget">
    <div class="WidgetHeaderBar">Problem- og målliste
        <a href="javascript:void(0)" class="PG-help"></a>
    </div>

    <div class="ContentWidgetNu">

        <div class="PGLIcon-WH"></div>
        <div class="PGLText-WH">“Jeg vil gerne blive bedre til at komme ud af sengen
            om morgen”
        </div>

    </div>
    <div class="WD-Button WidgetButtons">
        <a id="ButtonProblemGoal" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentProblemGoal"></div>

    <div id="PG-HelpContent" class="popover bottom">
        <div class="title">Problem- og målliste</div>
        <p>
            Dette redskab kan du bruge til at
            formulere målsætninger i forhold til
            forskellige problemer du har i
            forbindelse med din depression.
            Redskabet viser en tilfældig udvalgt,
            af de målsætninger du har
            formuleret.
            Klik på ÅBN for at bruge redskabet.

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

    $('#ButtonProblemGoal').click(function () {
        $('#ContentProblemGoal').load('<?php echo $ROOT; ?>/window/pg/show', function () {
            $('#ModalProblemGoal').modal('show');
        });
    });
    
    /*$('#ButtonProblemGoal').click(function () {
        $('#ContentProblemGoal').load('<?php echo $ROOT; ?>/window/pblmgl/show', function () {
            $('#ModalProblemGoal').modal('show');
        });
    });*/

</script>
