<div class="WidgetWidth200 shadow RadCornAll WD-F6-BGC" style="height: 250px;">
    <div class="WidgetHeaderBar">Brug for akut psykiatrisk hjælp?</div>
    <div class="ContentWidget">
        <div class="WD-Warning"></div>
        <div class="WD-Help WidgetButtons" style="margin-top: 25px;">
            <a href="javascript:void(0)" id="ButtonPsychiatricHelp" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>
    </div>

    <div id="ContentPsychiatricHelp"></div>

</div>

<script>

    $('#ButtonPsychiatricHelp').click(function () {
        $('#ContentPsychiatricHelp').load('<?php echo $ROOT; ?>/window/psychiatrichelp', function () {
            $('#modalPsychiatricHelp').modal('show');
        });
    });

</script>
