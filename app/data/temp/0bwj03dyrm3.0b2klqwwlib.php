<input type="hidden" id="tstep">
<input type="hidden" id="eflag">
<div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC wd_widget_Box" style="background-color: #AEA7D3;">
    <div class="WidgetHeaderBar">Leveregler<a href="#" class="levrhelp"></a></div>

    <div class="ContentWidgetNu">

        <div style="text-align: center; padding:30px 10px 30px 10px;"><img src="<?php echo $ROOT; ?>/assets/img/leveregler_icon.png" /></div>
        
    </div>
    <div class="WD-Button WidgetButtons" style="background-color: #BAB4DA;">
        <a href="javascript:void(0)" id="ButtonLeveregler" class="WB-FullBlank RadCornAllExtreme" style="background: #C8C3E1;">ÅBN</a>
    </div>

    <div id="ContentLeveregler"></div>

</div>

<div id="Levr-HelpContent" class="popover bottom">
    <div class="title">Leveregler</div>
    <p>
        Dette er dit redskab til at arbejde
        med basale leveregler, som blev
        introduceret i trin A. Du kan bruge
        det til at tænke over, og kortlægge
        nogle af dine basale leveregler, og
        efterfølgende formulere adfærdseksperimenter,
        der udfordre disse leveregler.<br/><br/>
        Klik på et af ikonerne, eller ÅBN for
        at bruge redskabet.
    </p>
</div>

<script>
    $(document).ready(function() {
        // modal help
        $('.levrhelp').popover({
            content: $('#Levr-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
        
      
    });


    $('#ButtonLeveregler').click(function() {
        
        var url;
      
        var cname;

        var step = document.getElementById("tstep").value;

        
            url = '<?php echo $ROOT; ?>/window/leveregler/leveregler2?id=<?php echo date("Ymdhis", time()); ?>';
            cname="#ModalLevereglerWidget2";
       
        
        
        $('#ContentLeveregler').load(url, function() {
            $(cname).modal('show');
            $(cname).on('hidden.bs.modal', function(e) {
               $(this).removeData('hidden.bs.modal').empty();
                        $(document.body).removeClass('modal-open');
            });
        });
    });

</script>
