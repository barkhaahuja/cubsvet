

<div class="WidgetWidth200 shadow RadCornAll PEWidget" xmlns="http://www.w3.org/1999/html">
    <div class="WidgetHeaderBar">Dagens positive oplevelse<a class="PE-help" href="javascript:void(0);"></a></div>
    <div class="ContentWidget">
        <div class="WD-PE-Date"><?php echo $date; ?></div>
        <div class="WD-PE-Text">
            <div><?php echo $note; ?></div>
        </div>
        <div class="WD-Button WidgetButtons">
            <a id="ButtonPositiveExp" href="javascript:void(0)" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>
    </div>

    <div id="ContentPositiveExp"></div>

    <div id="PE-HelpContent" class="popover bottom">
        <div class="title">Dagens positive oplevelse</div>
        <p>Meningen med ‘Dagens positive
            oplevelse’ er at du hver aften sætter dig og tænker over hvad der er
            sket i løbet af dagen. Tænk på de ting, der har gjort dig glad, 
            og skriv dem på en seddel her. <br><br>
            Klik på ‘NY’ for at lave en ny seddel.
        </p>
    </div>

</div>

<script>

    $(document).ready(function (){
        // modal help
        $('.PE-help').popover({
            content: $('#PE-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });

    $('#ButtonPositiveExp').click(function () {
        $('#ContentPositiveExp').load('<?php echo $ROOT; ?>/window/pe/show', function () {
            $('#ModalOplevelse').modal('show');
            $('#ModalOplevelse').on('hidden.bs.modal', function (e) { 
                
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                    
                    $('#ContentPositiveExp').html('');
                });
        });
    });

</script>
