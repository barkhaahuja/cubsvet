<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>

<style>
    #ModalOplevelse .popover-content{
        font-size:13px;
    }
    #ModalOplevelse .PE-TextFeild{
        max-height: 137px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    
    /* confirmation box */

    .click_popOverBox_PE {
        background: #171716;
        float: left; border-radius: 2px;
    }
    .click_popOverBox_PE p {
        color: #fff; font-size: 14px;
        padding: 15px 20px 10px;
    }
    .click_popOverBox_PE .popOver_btn_pe {
        bottom: 0; float: left;
        padding: 0 28px; width: auto;
    }
    .popOver_btn_pe button {
        background: none repeat scroll 0 0 #3B3B3B;
        border: medium none; border-radius: 15px; color: #BFBFBF;
        float: left; padding: 3px 14px; text-transform: uppercase;
        width: 47%; font-weight: bold;
    }
    .popOver_btn_pe button.prevBtnPE {
        margin: 0 3px 8px 0;
    }
    .popOver_btn_pe button.nextBnPE {
        margin: 0 0 8px 3px;
    }
    .S1-PE-Box .popover-content {
        width: 145px;
    }
    .popover.left .arrow:after {
        border-left-color: #000000 
    }
    .PE-TextFeild .popover-content {
        width: 225px;
    }
    /** EOF TILBAGE confirmation box */
    .PE-TextFeild textArea#box-experience {
        background-color: #F5E8BE;
    }
    textarea {
        max-height: 110px;
        max-width: 164px;
        min-height: 110px;
        min-width: 164px;
        border: none;
    }
    .PE-TextFeild .popover, .S1-PE-Box .popover {
        background-color: #000;
        color: #fff;
    }
    .popover.bottom .arrow:after {
        border-bottom-color: #000;
    }
    /*** okBtn ***/
    .okBtn {
        width: 100%;
        height: 40px;
        box-shadow: 0 1px 1px #999 inset;
    }
    .okBtn button {
        background: url("<?php echo $ROOT; ?>/assets/img/tick-green.png") no-repeat scroll 19px 4px #545557;
        border: medium none;
        border-radius: 4px;
        color: #f2f2f2;
        cursor: pointer;
        font-size: 13px;
        font-weight: bold;
        margin: 7px 78px;
        padding: 3px 34px;
        text-transform: uppercase;
    }
    .PE-HeaderBar .popover {
        width: 250px;
        border-radius: 0;
        background-color: #F7F7F8;
    }
    .PE-HeaderBar .popover.bottom .arrow:after {
        border-bottom-color: #F7F7F8;
    }
    .PE-HeaderBar .popover-content {
        padding: 0;
    }
    .windowBox {
        padding: 10px 15px;
    }
    .windowBox .title {
        font-weight: bold;
    }
    /*** ***/
    .PE-HeaderBar {
        background-color: #fff;
    }
    .PE-Box-Container {
        background-color: #F7F7F8;
    }
    .PE-FooterBar {
        background-color: #fff;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="ModalOplevelse" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow" id="container"
             style="width:800px; height:625px; margin:auto; border:1px solid #000; background-color: #F5F5F6;">
            <div class="PE-HeaderBar"> Dagens positive oplevelse
                <a href="javascript:void(0)" class="PE-help btn"
                   data-toggle="popover"></a>
                <a href="javascript:void(0)" class="close" data-dismiss="modal"
                   aria-hidden="true"></a>
            </div>
            <div class="DropShaddowDOWN"></div>

            <div class="PE-Box-Container" id="PE-Box-Container">
                
                <input type="hidden" name="pebxhide" id="pebxhide" value="" />

                <?php foreach (($notes?:array()) as $note): ?>

                    <div class="S1-PE-Box PEBOX<?php echo $note['id']; ?>" id="<?php echo $note['id']; ?>">
                        <div class="TopCornerFold"></div>
                        <div class="TopCornerCross"></div>
                        <div class="PE-TB-Header"><?php echo $note['date']; ?></div>

                        <div class="PE-TextBoxButtons visOFF">
                            <a href="javascript:void(0)" class="TB-close">FORTRYD</a>
                            <a href="javascript:void(0)" class="TB-tick">FÆRDIG</a>
                        </div>
                        <div class="PE-TextFeild">
                            <?php echo $note['content']; ?>
                        </div>
                    </div>

                <?php endforeach; ?>  

            </div>

            <div class="DropShaddowUP"></div>
            <div class="PE-FooterBar">
                <button id="addbox" type="button" class="RadCornAll">TILFØJ NY</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="PE-HelpContent" class="popover bottom">
    <div class="windowBox">
        <div class="title">Dagens positive oplevelse</div>
        <p>'Dagens positive oplevelse' er, at du hver aften sætter dig ned og tænker over, hvad din mest positive
            oplevelse har været den dag</p>
        <p>
            Klik på "Tilføj ny" for at lave en ny seddel.
        </p>
    </div>
    <div class="okBtn" style="height:23px" onclick="cancelpopup()">
        <button style="margin:6px 68px">ok</button>
    </div>
</div>

<div id="PE-NewBoxContent" class="popover left">
    <div class="title">Dagens positive oplevelse</div>
    <p>
        Tænk tilbage på din dag. Beskriv den situation hvor du havde det bedst, eller hvor
        du oplevede noget godt. Klik i tekstfeltet for at begynde at skrive.
    </p>
    <p>
        Når du er færdig med øvelsen, skal du lukke den ved at trykke på krydset oppe i hjørnet. Den gemmer automatisk det, du har skrevet.
    </p>
</div>

<div id="click_popOverBox" class="click_popOverBox_PE popover bottom">
    <p>Er du sikker på, at du vil slette denne seddel?</p>
    <div class="popOver_btn_pe">
        <button class="prevBtnPE" onclick="confirmCancel(this)">NEJ</button>
        <button class="nextBnPE" onclick="confirmOk(this)">JA</button>
    </div>
</div>

<div id="box-template">
    <div class="S1-PE-Box" id="temp">
        <div class="TopCornerFold"></div>
        <div class="TopCornerCross"></div>
        <div class="PE-TB-Header"><?php echo $ndate; ?></div>
        <div class="PE-TextBoxButtons">
            <a href="javascript:void(0)" class="TB-close">FORTRYD</a>
            <a href="javascript:void(0)" class="TB-tick">FÆRDIG</a>
        </div>
        <div class="PE-TextFeild">
            <textarea id="box-experience" name="experience" rows="5"></textarea>
        </div>
    </div>
</div>


<script>
    // hide template box
    $('#box-template').hide();

    // modal help
    $('.PE-help').popover({
        content: $('#PE-HelpContent').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
    
    $('.TopCornerCross').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });

    /**
     * Main handler for existent boxes
     *
     * It runs in a context of an event bubbled in each box
     */
    function handleBox(evt) {
        var $elem = $(this);

        // if we have shown the text area already return, don't want to do anything else
        // prevent adding more text to text area itself
        if ($(evt.delegateTarget).find("textarea#box-experience").length > 0) {
            return true;
        }

        // check if active box is clicked box
        if($("div[data-active]").length > 0 && ! $(evt.delegateTarget).hasAttribute("data-active")) {
            return true;
        }

        //close button
        if ($(evt.currentTarget).hasClass("TopCornerCross")) { //alert($(evt.delegateTarget));
            /*$.ajax({
                url: "<?php echo $ROOT; ?>/window/pe/delete/" + $(evt.delegateTarget).attr("id"),
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    if (data.status == 'success') {
                        // UI handling
                        $(evt.delegateTarget).remove();
                    }

                    if (data.status == 'error') {

                    }
                }
            });*/
            
            var bxid = $(evt.delegateTarget).attr("id");
            
            $('#pebxhide').val('');
            $('#pebxhide').val(bxid);
            
            $('.TopCornerCross').popover({
                content: $('#click_popOverBox').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }

        // show text area to write, activate buttons
        if ($(evt.currentTarget).hasClass("PE-TextFeild")) {
            // disable add button
            $("#addbox").attr('disabled', 'disabled');
            // add data active
            $(evt.delegateTarget).attr("data-active", "true");

            // original value
            var text = $elem.html().trim();

            // replace div html by textarea
            $(evt.currentTarget).html('<textarea id="box-experience" name="experience" rows="5">' + $elem.html().trim() + '</textarea>');

            //show buttons
            var $btnContainer = $(evt.delegateTarget).children(".PE-TextBoxButtons");
            $btnContainer.removeClass("visOFF");
            // handler for CANCEL button
            $btnContainer.children("a.TB-close").on('click', function () {
                $btnContainer.addClass("visOFF");
                $(evt.currentTarget).html(text);
                $("#addbox").removeAttr('disabled');
                // remove active flag
                $(evt.delegateTarget).removeAttr("data-active");
            });

            // handler for DONE (Save)
            $btnContainer.children("a.TB-tick").on('click', function () {
                var text = $("textarea#box-experience").val(),
                    url = "";

                if($(evt.delegateTarget).attr("id") == ""){
                    url = "<?php echo $ROOT; ?>/window/pe/create/";
                } else {
                    url = "<?php echo $ROOT; ?>/window/pe/update/" + $(evt.delegateTarget).attr("id");
                }

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {"user_id" : "<?php echo $user_id; ?>}", "note": text},
                    success: function (data) {

                        if (data.status == 'success') {
                            // UI handling
                            $btnContainer.addClass("visOFF");
                            $(evt.currentTarget).html(text);
                            $("#addbox").removeAttr('disabled');
                            // remove active flag
                            $(evt.delegateTarget).removeAttr("data-active");
                        }

                        if (data.status == 'error') {

                        }
                    }
                });
            });

            // show popover when hovering text area
            $("textarea#box-experience").popover({
                content: $('#PE-NewBoxContent').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        }

    }
    
    function confirmCancel(){        
        remPopover();
        //$('.TopCornerCross').popover('toggle');
    }
    
    function confirmOk(){
        var pbxid = $('#pebxhide').val();
        
        $.ajax({
            url: "<?php echo $ROOT; ?>/window/pe/delete/" + pbxid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                if (data.status == 'success') {
                    remPopover();
                    $('#addbox').removeAttr('disabled');
                    
                    // UI handling
                    $('.PEBOX'+pbxid).remove();
                }

                if (data.status == 'error') {

                }
            }
        });
    }

    // handler for existing boxes, lets bubble!
    $(".S1-PE-Box").on("click", "div", handleBox);

    //lets handle new boxes now
    $('#addbox').click(function () { 
        var self = this;
        // disable button to prevent more boxes creation
        $(self).attr('disabled', 'disabled');
        
        var box = "";

        // get html template and temporal id
        box = $('#box-template').children('div').first().clone();

        // add temporal id and append box to container
        //$(box).children(".PE-TextFeild").html('<textarea id="box-experience" name="experience" rows="5"></textarea>');
        //$(box).appendTo('.PE-Box-Container');
        //$(box).attr("data-active", "true");
        var tcontent=document.getElementById("PE-Box-Container").innerHTML;
       
        var ncontent = '<div class="S1-PE-Box" id="temp" data-active="true"><div class="TopCornerFold"></div><div class="TopCornerCross"></div><div class="PE-TB-Header"><?php echo $ndate; ?></div>';
        ncontent = ncontent+ '<div class="PE-TextBoxButtons "><a href="javascript:void(0)" class="TB-close">FORTRYD</a><a href="javascript:void(0)" class="TB-tick">FÆRDIG</a>';
        ncontent = ncontent+ '</div><div class="PE-TextFeild"><textarea id="box-experience" name="experience" rows="5"></textarea></div></div>';
                  
        $('.PE-Box-Container').html(tcontent+""+ncontent);       
        
        $('.TopCornerCross').popover({
            content: $('#click_popOverBox').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });

        // checking if something is typed when clicked
        $("#temp a.TB-tick").on("click", function (e) {
            var text = $("textarea#box-experience").val();

            if (text == "") {
                e.preventDefault();
                return;
            }

            var url = "";
            if($(box).attr("id") == "temp"){
                url = "<?php echo $ROOT; ?>/window/pe/create/";                
            } else {
                url = "<?php echo $ROOT; ?>/window/pe/update/" + $(box).attr("id");
            }

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {"user_id" : "<?php echo $user_id; ?>}", "note": text},
                success: function (data) {

                    if (data.status == 'success') {
                        // update id
                        $('#temp .PE-TextBoxButtons').addClass("visOFF");
                        $('#temp').addClass('PEBOX'+data.id);
                        $('#temp').attr('id', data.id);
                        //$(box).attr('id', data.id);
                        //add new class
                        //$(box).addClass('PEBOX'+data.id);
                        // UI handling
                        //$(box).children('.PE-TextBoxButtons').addClass("visOFF");
                        // add box delete handler
                        //$(box).children(".TopCornerCross").on("click", function(evt){
                        $(".TopCornerCross").on("click", function(evt){
                            /*$.ajax({
                                url: "<?php echo $ROOT; ?>/window/pe/delete/" + $(evt.currentTarget).parent().attr("id"),
                                type: 'GET',
                                dataType: 'json',
                                success: function (data) {

                                    if (data.status == 'success') {
                                        // UI handling
                                        $(evt.currentTarget).parent().remove();
                                    }

                                    if (data.status == 'error') {

                                    }
                                }
                            });*/
        
                            var abxid = $(evt.currentTarget).parent().attr("id");
            
                            $('#pebxhide').val('');
                            $('#pebxhide').val(abxid);

                            $('.TopCornerCross').popover({
                                content: $('#click_popOverBox').html(),
                                html: true,
                                placement: 'bottom',
                                trigger: 'click'
                            });
                        });
                        // restore add box button
                        $(self).removeAttr('disabled');
                        // remove active flag
                        $(box).removeAttr("data-active");
                        // restore html
                        $("textarea#box-experience").parent('.PE-TextFeild').html(text);

                        $("#" + data.id +  " a.TB-close").on("click", function () {
                            console.log($(this));
                            $(self).removeAttr('disabled');
                            $(this).removeAttr("data-active");
                            $(this).parents().find('.PE-TextBoxButtons').addClass("visOFF");
                            $("textarea#box-experience").parent('.PE-TextFeild').html(text);
                        });
                    }

                    if (data.status == 'error') {

                    }
                }
            });
        });

        // if cancel button clicked remove recently added box
        $("#temp a.TB-close, " + "#temp .TopCornerCross").on("click", function () {
            $("#temp").remove();
            $(self).removeAttr('disabled');
            $(box).removeAttr("data-active");
        });

        // if text clicked, show textarea again for edition
        $("#temp .PE-TextFeild").on('click', function () {

            // add active button
            $(box).attr("data-active", "true");

            // if we have shown the text area already return, don't want to do anything else
            // prevent adding more text to text area itself
            if ($(this).find("textarea#box-experience").length > 0) {
                return true;
            }

            // replace div html by textarea
            $(this).html('<textarea id="box-experience" name="experience" rows="5">' + $(this).html().trim() + '</textarea>');
            $(this).siblings(".PE-TextBoxButtons").removeClass('visOFF');

            // show popover when hovering text area
            $("textarea#box-experience").popover({
                content: $('#PE-NewBoxContent').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        });

        // show popover when hovering text area
        $("textarea#box-experience").popover({
            content: $('#PE-NewBoxContent').html(),
            html: true,
            placement: 'left',
            trigger: 'hover'
        });
    });
    
    function remPopover() {
        $('.popover.fade.bottom').each(function() {
            $(this).remove();
        });

        $('.popover.fade.top').each(function() {
            $(this).remove();
        });

        $('.popover.fade.left').each(function() {
            $(this).remove();
        });

        $('.popover.fade.right').each(function() {
            $(this).remove();
        });
    }
    
    function cancelpopup()
    {
      remPopover();
    }
    
   $(document).ready(function(){
      $("link[href='<?php echo $ROOT; ?>/assets/css/NATneg_circle.css']").remove();
   });
</script>
