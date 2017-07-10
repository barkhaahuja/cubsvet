<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/NATneg_circle.css" rel="stylesheet" type="text/css"/>

<style>
    #ModalNATWidget .popover {
        background:#000;
    }
    #ModalNATWidget .popover-content {
        background: #000000;
        color: #FFFFFF;
    }
    #ModalNATWidget .popover.left .arrow:after {        
        border-left-color: #000;       
    }
    #ModalNATWidget .popover.right .arrow:after {        
        border-right-color: #000;        
    }
    .popover.bottom .arrow:after {
       border-bottom-color: #000000;
    }
    /*** ***/
    textarea {
        max-height: 110px;
        max-width: 180px;
        min-height: 110px;
        min-width: 180px;
    }
    .PE-TextFeildreg .popover {
        width: 220px;
    }
    .PE-TextFeildreg.pe_popoverLeft .popover {
        left: -131px !important;
    }
    .PE-TextFeildreg.pe_popoverRight .popover {
        left: 116px !important;
    }
    .NAT-TextBoxButtons .TB-tick {
        background: url("<?php echo $ROOT; ?>/assets/img/TB_blk_tick_50.png") no-repeat scroll 15px 7px !important;
    }
    .NAT-PE-Box .PE-TextFeildreg {
        overflow-y: auto;
        height: 118px;
        overflow-x: auto;
        max-width: 196px;
        min-width: 196px;
    }
    .NAT-PE-Box2 .PE-TextFeildreg {
        overflow-y: auto;
        height: 118px;
        overflow-x: auto;
        max-width: 196px;
        min-width: 196px;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="ModalNATWidget" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow window" id="container" style="width:1200px; height:720px; margin:auto; border:1px solid #000; background-color: #F5F5F6;">            
            <div class="PE-HeaderBar change_header"> 
                <nav class="nat_menu">
                    <ul>
                        <li class="nat_menu_1 active" id="selected" style="border-bottom: 3px solid #E2776F;">
                            <a href="javascript:void(0)">
                                <i class="pe_active"></i>
                                Registrering
                            </a>
                        </li>
                        
                        <?php if ((($currentStep.'.'.$currentSubStep) >= 4.6) AND ($dashbrd == 1)): ?>
                            <li class="nat_menu_2"> 
                                <?php if ($dashbrd == 1): ?>
                                    <a href="javascript:void(0)" class="natnegcirctab">
                                        <i class=""></i>
                                        Den negative cirkel  
                                    </a>
                                   <?php else: ?>
                                    <i></i>
                                    Den negative cirkel
                                   
                                <?php endif; ?>                                
                            </li>
                        <?php endif; ?>
                        <?php if ((($currentStep.'.'.$currentSubStep) >= 5.3) AND ($dashbrd == 1)): ?>
                            <li class="nat_menu_3">
                                <?php if ($dashbrd == 1): ?>
                                    <a href="javascript:void(0)" class="natchlgtab">
                                        <i class=""></i>
                                        Udfordring
                                    </a>
                                   <?php else: ?>
                                    <i></i>
                                    Udfordring
                                   
                                <?php endif; ?>                                
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <div class="nat_heading" style="width:590px; text-align:left;">                    
                    <h2>Negative automatiske tanker - Registrering</h2>
                        <i class="q_Mark">Questen</i>
                        <a href="javascript:void(0);" data-dismiss="modal">
                            <i class="c_Mark">close</i>
                        </a>
                </div>
            </div>
            <div class="DropShaddowDOWN"></div>
            
            <div class="PE-Box-Container">
                <div class="pe_centerBox">
                    
                    <input type="hidden" name="natbxhide" id="natbxhide" value="" />
                    
                <?php foreach (($natnegthts?:array()) as $negtht): ?>
                    
                    <div class="pe_registrering" style="max-width:81% !important;">

                        <div class="NAT-PE-Box NATBOX<?php echo $negtht['id']; ?>" id="<?php echo $negtht['id']; ?>">
                            <div class="arrow-right"></div>
                            <div class="NAT-Box-Title">                                
                                <img src="<?php echo $ROOT; ?>/assets/img/negthts.png" />&nbsp;&nbsp;Negative tanker
                            </div>
                            <div class="NAT-TextBoxButtons visOFF">
                                <a href="javascript:void(0)" class="TB-close">FORTRYD</a>
                                <a href="javascript:void(0)" id="TB-next" class="TB-tick">NÆSTE</a>
                            </div>

                            <div class="PE-TextFeildreg pe_popoverLeft">
                                <?php echo $negtht['negthts']; ?>
                            </div>
                        </div>

                        <div class="NAT-PE-Box2 NATBOX<?php echo $negtht['id']; ?>" id="<?php echo $negtht['id']; ?>">                        
                            <div class="NAT-Box-Title">
                                <i class="natreg_closeIcon"></i>
                                <img src="<?php echo $ROOT; ?>/assets/img/posbresp.png" />&nbsp;&nbsp;<span style="color:#E2776F;">Muligt svar</span>
                            </div>
                            <div class="NAT-TextBoxButtons visOFF">
                                <a href="javascript:void(0)" class="TB-close">FORTRYD</a>
                                <a href="javascript:void(0)" class="TB-tick">NÆSTE</a>
                            </div>

                            <div class="PE-TextFeildreg pe_popoverRight">
                                <?php echo $negtht['posresp']; ?>
                            </div>
                        </div>
                        
                    </div>
                   
                <?php endforeach; ?>
                </div>
                
                <div class="pe_centerBox2">
                    
                </div>
                
            </div>
            <div class="DropShaddowUP"></div>  
            
            <!-- container  -->
            <div style="height:280px; width:100%; margin:auto; padding:auto; font-size: 12px;">
                <!-- red  -->
                <div style="float:left; background:#e6e6e6; height:30px; width:100%;">
                    <div align="right" style="padding-top:.3%;padding-right:40%">
                        <div class="NATbuttonsample" style="cursor:pointer;">
                            <!-- <img src="<?php echo $ROOT; ?>/assets/img/down_arrow.png" width />&nbsp;VIS EKSEMPLER -->
                            <div id="arwdiv" class="arrow-up"></div>
                            <div class="exmptxt">VIS EKSEMPLER</div>
                        </div>
                    </div>
                </div>

                <!-- grey  -->
                <div class="NATsampcont">
                    <div class="nat_centerBox">
                    <div style="float:left; margin-top:10px; position:relative; width:800px;">                        
                        <div style="float:left; margin-left:100px; width:300px; height:80px; background:#cccccc; border-bottom:1px solid #cccccc; position:relative;">
                            <div class="NATarrow-left"></div>
                            <div style="width:235px; padding:3px; margin:25px 21px;">Jeg har ikke lyst til det</div>
                        </div>
                        <div style="float:right; width:300px; height:80px; background:#e6e6e6; margin-right:100px; border-bottom:1px solid #808080;">
                            <div style="width:291px; margin:10px 5px;">
                                Det er rigtig nok, at jeg ikke har lyst, men måske får jeg det bedre når jeg har gjort det. Hvad har jeg at miste ved at prøve?
                            </div>                            
                        </div>                        
                    </div>
                    
                    <div style="float:left; position:relative; border-bottom:0.2em solid #808080; width:800px;">                        
                        <div style="float:left; margin-left:100px; width:300px; height:80px; background:#cccccc; position:relative;">
                            <div class="NATarrow-left"></div>
                            <div style="width:235px; padding:3px; margin:25px 21px;">Jeg kan ikke overskue det</div>
                        </div>
                        <div style="float:right; width:300px; height:80px; background:#e6e6e6; margin-right:100px;">
                            <div style="width:291px; margin:30px 5px;">
                                Jeg kan tage en lille ting ad gangen
                            </div>
                        </div>
                    </div>   
                    
                    <div style="float:left; position:relative; width:800px;">                        
                        <div style="float:left; margin-left:100px; width:300px; height:80px; background:#cccccc; position:relative; border-bottom:1px solid #cccccc;">
                            <div class="NATarrow-left"></div>
                            <div style="width:235px; padding:3px; margin:25px 21px;">Jeg kan ikke gøre det så godt som jeg plejer</div>
                        </div>
                        <div style="float:right; width:300px; height:80px; background:#e6e6e6; margin-right:100px; border-bottom:1px solid #808080; ">
                            <div style="width:291px; margin:7px 5px;">
                                Jeg kan ikke gøre det lige så godt som jeg plejer, men det er naturlig, når jeg har den energi, som jeg plejer jeg har det.
                                Det er bedre at gøre lidt end ingenting
                            </div>
                        </div>                        
                    </div>
                    
                    <div style="float:left; position:relative; border-bottom:0.2em solid #808080; width:800px;">                        
                        <div style="float:left; margin-left:100px; width:300px; height:80px; background:#cccccc; position:relative;">
                            <div class="NATarrow-left"></div>
                            <div style="width:235px; padding:3px; margin:25px 21px;">Jeg burde have gjort det før</div>
                        </div>
                        <div style="float:right; width:300px; height:80px; background:#e6e6e6; margin-right:100px;">
                            <div style="width:291px; margin:7px 5px;">
                                Måske var det bedre hvis jeg havde gjort det tidligere, men det har jeg ikke. Det hjælper mig ikke at bebrejde mig selv.
                                Tværtimod. Jeg skal ikke spilde tiden med fortrydelse.
                            </div>
                        </div>                        
                    </div>
                    
                    <div style="float:left; position:relative; width:800px;">                        
                        <div style="float:left; margin-left:100px; width:300px; height:80px; background:#cccccc; position:relative; border-bottom:1px solid #cccccc;">
                            <div class="NATarrow-left"></div>
                            <div style="width:235px; padding:3px; margin:25px 21px;">Jeg kan alligevel ikke nå alt det jeg har sat mig for</div>
                        </div>
                        <div style="float:right; width:300px; height:80px; background:#e6e6e6; margin-right:100px; border-bottom:1px solid #808080;">
                            <div style="width:291px; margin:7px 5px;">
                                Jeg har tendens til at stille store krav til mig selv. Lige nu kan jeg ikke leve op til mine krav, da jeg ikke har den
                                energi jeg plejer. Men det er bedre at tage et skridt ad gangen end slet ikke at foretage mig noget.
                            </div>
                        </div>                        
                    </div>
                </div>
                </div>
                
                <div class="DropShaddowUP"></div><br/>
                <div class="PE-FooterBar">
                    <button id="NATaddbox" type="button" class="RadCornAll">TILFØJ NY</button>
                </div>                
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div id="PE-HelpContentNATReg" class="popover bottom">
    <div class="title">Negative automatiske tanker</div>
    <p>Her skal du skrive dine negative tanker ned og prøve at finde på mulige svar til dem. Klik på TILFØJ NY for at komme igang. 
       Hvis du har svært ved at komme igang, kan du klikke på VIS EKSEMPLER nede i bunden og se nogle eksempler på typiske negative tanker.</p>
    <p>For at forlade redskabet, klikker du på krydset i hjørnet. Alt vil være gemt automatisk.</p>
</div>

<div id="click_popOverBox" class="click_popOverBox_NC popover bottom">
    <p>Er du sikker på at du vil slette denne tanke?</p>
    <div class="popOver_btn_nc">
        <button class="prevBtnNC" onclick="confirmCancel(this)">NEJ</button>
        <button class="nextBnNC" onclick="confirmOk(this)">JA</button>
    </div>
</div>

<div id="box-template">
    <div class="NAT-PE-Box" id="temp">
        <div class="NAT-Box-Title">
            <img src="<?php echo $ROOT; ?>/assets/img/negthts.png" />&nbsp;&nbsp;Negative tanker
        </div>
        <div class="NAT-TextBoxButtons">
            <a href="javascript:void(0)" class="TB-close">FORTRYD</a>
            <a href="javascript:void(0)" id="TB-next" class="TB-tick">NÆSTE</a>
        </div>
        <div class="PE-TextFeildreg">
            <textarea id="box-experience" name="experience" rows="5" data-toggle="popover" data-html="true"
                         data-content="<p>Beskriv din negative automatiske tanke.</p>
                         <p>Klik i tekstfeltet for at begynde at skrive.</p>"
                         data-placement="bottom"></textarea>
        </div>
    </div>
</div>

<div id="prbox-template">
    <div class="NAT-PE-Box2" id="temp2">
        <div class="NAT-Box-Title">
            <i class="natreg_closeIcon"></i>
            <img src="<?php echo $ROOT; ?>/assets/img/posbresp.png" />&nbsp;&nbsp;<span style="color:#E2776F;">Muligt svar</span>
        </div>
        <div class="NAT-TextBoxButtons">
            <a href="javascript:void(0)" class="TB-close">FORTRYD</a>
            <a href="javascript:void(0)" class="TB-tick">FÆRDIG</a>
        </div>
        <div class="PE-TextFeildreg popover_right">
            <textarea id="box-posbresp" name="posbresp" rows="5" data-toggle="popover" data-html="true"
                         data-content="<p>Prøv at komme med et mulig svar til din tanke.</p>
                         <p>Klik i tekstfeltet for at begynde at skrive.</p>"
                         data-placement="bottom"></textarea>
        </div>
    </div>
</div>


<script>


    $('.natreg_closeIcon').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
    
    $( ".natreg_closeIcon" ).mousedown(function() {
       
//      var delid = $($(this).closest('.pe_registrering')).find('.NAT-PE-Box').attr('id');
//      $('#natbxhide').val(delid);
//      console.log("AA:".delid);
      $('.popover').hide();
    });
    
    
    
//    $('.natreg_closeIcon').click(function(){
//        
//        $('.popover').hide();
//        
//    });
//            
            
    $('textarea#box-experience').click(function () {
        $("textarea#box-experience").popover('hide');
    });
    $('textarea#box-posbresp').click(function () {
        $("textarea#box-posbresp").popover('hide');
    });
    // hide template box
    $('#box-template').hide();
    
    // hide template prbox
    $('#prbox-template').hide();
    
    // modal help
    $('.q_Mark').popover({
        content: $('#PE-HelpContentNATReg').html(),
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
        if ($(evt.currentTarget).hasClass("natreg_closeIcon")) { 
            
            console.log('This is called from line 359');
            
            /*$.ajax({
                url: "<?php echo $ROOT; ?>/window/nat/delete/" + $(evt.delegateTarget).attr("id"),
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
            
			console.log('400');
            $('#natbxhide').val('');
            $('#natbxhide').val(bxid);
            
            $('.natreg_closeIcon').popover({
                content: $('#click_popOverBox').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }

        // show text area to write, activate buttons
        if ($(evt.currentTarget).hasClass("PE-TextFeildreg")) {
            // disable add button
            $("#NATaddbox").attr('disabled', 'disabled');
            // add data active
            $(evt.delegateTarget).attr("data-active", "true");

            // original value
            var text = $elem.html().trim();

            // replace div html by textarea
            //alert('ff');
            $(evt.currentTarget).html('<textarea id="box-experience" name="experience" rows="5" data-toggle="popover" data-html="true" data-content="<p>Beskriv din negative automatiske tanke.</p><p>Klik i tekstfeltet for at begynde at skrive.</p>" data-placement="left">' + $elem.html().trim() + '</textarea>');
            // added
            $('textarea#box-experience').focus();
            var temp;
            temp=$('textarea#box-experience').val();
            $('textarea#box-experience').val('');
            $('textextarea#box-experiencetarea').focus();
            $('textarea#box-experience').val(temp);
            
            $('textarea#box-experience').on('mousedown',function(){
                $('.popover').hide();
            });
            $('textarea#box-experience').bind('input change', function() {
                $('.popover').hide();
            });
            // end

            //show buttons
            var $btnContainer = $(evt.delegateTarget).children(".NAT-TextBoxButtons");
            $btnContainer.removeClass("visOFF");
            //alert('ffff');
            // handler for CANCEL button
            $btnContainer.children("a.TB-close").on('click', function () {
                $btnContainer.addClass("visOFF");
                $(evt.currentTarget).html(text);
                $("#NATaddbox").removeAttr('disabled');
                // remove active flag
                $(evt.delegateTarget).removeAttr("data-active");
            });

            // handler for DONE (Save)
            $btnContainer.children("a.TB-tick").on('click', function () { 
                
                var negtht = $("textarea#box-experience").val();
                var posresp = $("textarea#box-experience").val();
                url = "";

                if($(evt.delegateTarget).attr("id") == ""){
                    url = "<?php echo $ROOT; ?>/window/nat/create/";
                } else {
                    url = "<?php echo $ROOT; ?>/window/nat/update/" + $(evt.delegateTarget).attr("id");
                }
                update_negative_thoughts = negtht;
                
              //  alert('dfs');
                
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                   // data: {"user_id" : "<?php echo $user_id; ?>}", "negative_thoughts": negtht, "possible_response": posresp},
                    data: {"user_id" : "<?php echo $user_id; ?>", "negative_thoughts": negtht},
                   
                   success: function (data) {
                      // alert('b');
                        if (data.status == 'success') {
                            // UI handling
                            $btnContainer.addClass("visOFF");
                            $(evt.currentTarget).html(update_negative_thoughts);
                            $("#NATaddbox").removeAttr('disabled');
                            // remove active flag
                            $(evt.delegateTarget).removeAttr("data-active");
                        }

                        if (data.status == 'error') {
                            $btnContainer.addClass("visOFF");
                            $(evt.currentTarget).html(update_negative_thoughts);
                            $("#NATaddbox").removeAttr('disabled');
                            // remove active flag
                            $(evt.delegateTarget).removeAttr("data-active");
                        }
                    }
                });
            });

            // show popover when hovering text area
            /*$("textarea#box-experience").popover({
                content: $('#PE-NewBoxContent').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });*/

            if ($('textarea#box-experience').length > 0){
                $("textarea#box-experience").popover('show');
            }
        }
    }
    
    function confirmCancel(obj){ 
        //alert('cal confirm');
        $(obj).closest('.NAT-Box-Title').find('.natreg_closeIcon').trigger('click');
        //$(obj).closest('.natreg_closeIcon').trigger('click');
        //remPopover();
    }
    
    function confirmOk(){
        var natbxid = $('#natbxhide').val();
        
        $.ajax({
            url: "<?php echo $ROOT; ?>/window/nat/delete/" + natbxid,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                if (data.status == 'success') {
                    // UI handling
                    //$(evt.delegateTarget).remove();
                    //$('.popover').hide();
                    $('.NATBOX'+natbxid).remove();
                }

                if (data.status == 'error') {

                }
            }
        });
    }
    
    // handler for existing boxes, lets bubble!
    $(".NAT-PE-Box").on("click", "div", handleBox);
    
	/*
	 $('#NATaddbox').on('mousedown',function () {
	 
	    console.log($('.PE-Box-Container').find('textarea').length);
		if($('.PE-Box-Container').find('textarea').length == 0)
		{
			$("#NATaddbox").removeAttr('disabled');
			 //$("#NATaddbox").attr('disabled', 'disabled');
		}
		else
		{
			 $("#NATaddbox").removeAttr('disabled');
		}
	 
	 });
	 */
	 
	
    //lets handle new boxes now
    $('#NATaddbox').click(function () {
	
        var self = this;
        // disable button to prevent more boxes creation
        $(self).attr('disabled', 'disabled');

        // get html template and temporal id
        var box = $('#box-template').children('div').first().clone();

        // add temporal id and append box to container
        $(box).children(".PE-TextFeildreg").html('<textarea id="box-experience" name="experience" rows="5" data-toggle="popover" data-html="true" data-content="<p>Beskriv din negative automatiske tanke.</p><p>Klik i tekstfeltet for at begynde at skrive.</p>" data-placement="left"></textarea>');
        $(box).appendTo('.pe_centerBox2');
        $(box).attr("data-active", "true");
        
        // added later
         $('textarea#box-experience').focus();
            var temp;
            temp=$('textarea#box-experience').val();
            $('textarea#box-experience').val('');
            $('textextarea#box-experiencetarea').focus();
            $('textarea#box-experience').val(temp);
            
            $('textarea#box-experience').on('mousedown',function(){
                $('.popover').hide();
            });
            $('textarea#box-experience').bind('input change', function() {
                $('.popover').hide();
            });
        // end

        // checking if something is typed when clicked
        $("#temp a.TB-tick").on("click", function (e) {
            
            var negtht = $("textarea#box-experience").val();

            if (negtht == "") {
                e.preventDefault();
                return;
            }

            var url = "";
            if($(box).attr("id") == "temp"){
                url = "<?php echo $ROOT; ?>/window/nat/create/";
            } else {
                url = "<?php echo $ROOT; ?>/window/nat/update/" + $(box).attr("id");
            }            
          
           // alert('dddd');
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {"user_id" : "<?php echo $user_id; ?>}", "negative_thoughts": negtht},
                success: function (data) {
                    //alert('ffa');
                    if (data.status == 'success') {
                      
                        $('#natbxhide').val(data.id);
                      
                        // update id
                        $(box).attr('id', data.id);
                        //add new class
                        $(box).addClass('NATBOX'+data.id);
                        // UI handling
                        $(box).children('.NAT-TextBoxButtons').addClass("visOFF");
                        // restore add box button
                        $(self).removeAttr('disabled');
                        // remove active flag
                        $(box).removeAttr("data-active");
                        // restore html
                        $("textarea#box-experience").parent('.PE-TextFeildreg').html(negtht);

                        $("#" + data.id +  " a.TB-close").on("click", function () {
                            console.log($(this));
                            $(self).removeAttr('disabled');
                            $(this).removeAttr("data-active");
                            $(this).parents().find('.NAT-TextBoxButtons').addClass("visOFF");
                            $("textarea#box-experience").parent('.PE-TextFeildreg').html(negtht);
                        });
                        
						//console.log(data.id);
                        //load possible response box
                        // console.log('putside second'+data.id);
                        if($("#" + data.id).parent().find('.NAT-PE-Box2.NATBOX'+data.id).length == 0  )
                        {
                        //    console.log('inside second'+data.id);
                            loadposbrespBox(negtht,$(box).attr("id"));
                        }
                        
                    }

                    if (data.status == 'error') {
                        // update id
                        $(box).attr('id', data.id);
                        //add new class
                        $(box).addClass('NATBOX'+data.id);
                        // UI handling
                        $(box).children('.NAT-TextBoxButtons').addClass("visOFF");
                        // restore add box button
                        $(self).removeAttr('disabled');
                        // remove active flag
                        $(box).removeAttr("data-active");
                        // restore html
                        $("textarea#box-experience").parent('.PE-TextFeildreg').html(negtht);

                        $("#" + data.id +  " a.TB-close").on("click", function () {
                            console.log($(this));
                            $(self).removeAttr('disabled');
                            $(this).removeAttr("data-active");
                            $(this).parents().find('.NAT-TextBoxButtons').addClass("visOFF");
                            $("textarea#box-experience").parent('.PE-TextFeildreg').html(negtht);
                        });
                        
                        //load possible response box
                        // console.log('putside second'+data.id);
						
						if($("#" + data.id).parent().find('.NAT-PE-Box2.NATBOX'+data.id).length == 0  )
                        {
                        //    console.log('inside second'+data.id);
                            loadposbrespBox(negtht,$(box).attr("id"));
                        }
                        //if($("#" + data.id).parent().find('.NAT-PE-Box2').length == 0)
                        //{
                        //    console.log('inside second'+data.id);
                            //loadposbrespBox(negtht,$(box).attr("id"));
                        //}
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
        $("#temp .PE-TextFeildreg").on('click', function () {
            // add active button
            $(box).attr("data-active", "true");

            // if we have shown the text area already return, don't want to do anything else
            // prevent adding more text to text area itself
            if ($(this).find("textarea#box-experience").length > 0) {
                return true;
            }

            // replace div html by textarea
            $(this).html('<textarea id="box-experience" name="experience" rows="5">' + $(this).html().trim() + '</textarea>');
            $(this).siblings(".NAT-TextBoxButtons").removeClass('visOFF');
//alert('sdfsdfsdfsd');
            // show popover when hovering text area
            $("textarea#box-experience").popover({
                content: $('#PE-NewBoxContent').html(),
                html: true,
                placement: 'top',
                trigger: 'hover'
            });
        });

        // show popover when hovering text area
        /*$("textarea#box-experience").popover({
            content: $('#PE-NewBoxContent').html(),
            html: true,
            placement: 'top',
            trigger: 'click'
        });*/
        if ($('textarea#box-experience').length > 0){
            $("textarea#box-experience").popover('show');
        }
        
        
        
        document.getElementById('TB-next').focus();
        
    });
    
        
    //---------  box - possible response
    
    /**
     * Main handler for existent boxes
     *
     * It runs in a context of an event bubbled in each box
     */
    function handlePRBox(evt) { 
        //alert('xitent');
       
        var $elem = $(this);

        // if we have shown the text area already return, don't want to do anything else
        // prevent adding more text to text area itself
        if ($(evt.delegateTarget).find("textarea#box-posbresp").length > 0) {
            return true;
        }

        // check if active box is clicked box
        try {
            if($("div[data-active]").length > 0 && ! $(evt.delegateTarget).hasAttribute("data-active")) {
                return true;
            }
        }
        catch(err)
        {
            
        }

        //close button
        /*if ($(evt.currentTarget).hasClass("TopCornerCross")) {
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/nat/delete/" + $(evt.delegateTarget).attr("id"),
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
            });
        }*/
        
        if ($(evt.currentTarget).hasClass("NAT-Box-Title")) {             
            var bxid = $(evt.delegateTarget).attr("id");
            
            $('#natbxhide').val('');
            $('#natbxhide').val(bxid);
            
            $('.natreg_closeIcon').popover({
                content: $('#click_popOverBox').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }

        // show text area to write, activate buttons
        if ($(evt.currentTarget).hasClass("PE-TextFeildreg")) {
            
            // disable add button
            $("#NATaddbox").attr('disabled', 'disabled');
            // add data active
            $(evt.delegateTarget).attr("data-active", "true");

            // original value
            var text = $elem.html().trim();

            // replace div html by textarea
            //alert('old boxes');
            $(evt.currentTarget).html('<textarea id="box-posbresp" name="posbresp" rows="5" data-toggle="popover" data-html="true" data-content="<p>Prøv at komme med et mulig svar til din tanke.</p><p>Klik i tekstfeltet for at begynde at skrive.</p>" data-placement="right">' + $elem.html().trim() + '</textarea>');

            // added
            $('textarea#box-posbresp').on('mousedown',function(){
                $('.popover').hide();
            });
            $('textarea#box-posbresp').bind('input change', function() {
                $('.popover').hide();
            });
            // end

            //show buttons
           
            var $btnContainer = $(evt.delegateTarget).children(".NAT-TextBoxButtons");
            $btnContainer.removeClass("visOFF");
            //alert('dddddff');
            
            // handler for CANCEL button
            $btnContainer.children("a.TB-close").on('click', function () {
                $btnContainer.addClass("visOFF");
                $(evt.currentTarget).html(text);
                $("#NATaddbox").removeAttr('disabled');
                // remove active flag
                $(evt.delegateTarget).removeAttr("data-active");
            });

            // handler for DONE (Save)
            $btnContainer.children("a.TB-tick").on('click', function () {
               //alert('adfasdd');
                var negtht = $("textarea#box-experience").val();
                var posresp = $("textarea#box-posbresp").val();
                var url = "";

                if($(evt.delegateTarget).attr("id") == ""){
                    url = "<?php echo $ROOT; ?>/window/nat/create/";
                } else {
                    url = "<?php echo $ROOT; ?>/window/nat/update/" + $(evt.delegateTarget).attr("id");
                }
                update_possible_response = posresp;
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    //data: {"user_id" : "<?php echo $user_id; ?>}", "negative_thoughts": negtht, "possible_response": posresp},
                    data: {"user_id" : "<?php echo $user_id; ?>}", "possible_response": posresp},
                    success: function (data) {
						//alert('a');
                        if (data.status == 'success') {
                            // UI handling
                            $btnContainer.addClass("visOFF");
                            $(evt.currentTarget).html(update_possible_response);
                            $("#NATaddbox").removeAttr('disabled');
                            // remove active flag
                            $(evt.delegateTarget).removeAttr("data-active");
                        }

                        if (data.status == 'error') {

                        }
                    }
                });
            });

            // show popover when hovering text area
            /*$("textarea#box-posbresp").popover({
                content: $('#PE-NewBoxContent').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });*/
            if ($('textarea#box-posbresp').length > 0){
               
                $('.popover').hide();
                
                $("textarea#box-posbresp").popover('show');
            }
        }
    }
    
    // handler for existing boxes, lets bubble!
    $(".NAT-PE-Box2").on("click", "div", handlePRBox);
    
    //lets handle possible response boxes now
    function loadposbrespBox(neg_tht, id){ 
        var self = this;
        // disable button to prevent more boxes creation
        $(self).attr('disabled', 'disabled');

        // get html template and temporal id
        var box2 = $('#prbox-template').children('div').first().clone();

        // add temporal id and append box to container
        $(box2).addClass("NATBOX"+ $('#natbxhide').val());
        //alert('f');
        $(box2).children(".PE-TextFeildreg").html('<textarea id="box-posbresp" name="posbresp" rows="5" data-toggle="popover" data-html="true" data-content="<p>Prøv at komme med et mulig svar til din tanke.</p><p>Klik i tekstfeltet for at begynde at skrive.</p>" data-placement="right"></textarea>');
        $(box2).appendTo('.pe_centerBox2');
        $(box2).attr("data-active", "true");
        
        //grr
         $('.natreg_closeIcon').popover({
            content: $('#click_popOverBox').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });

        $( ".natreg_closeIcon" ).mousedown(function() {
            console.log('898 inside');
            var delid = $(this).closest('.NAT-PE-Box2').attr('id');
			
            if(!$.isNumeric(delid))
            {   
                var aa = $(this).closest('.NAT-PE-Box2').attr('class').split(/\s+/)[1];
                delid = aa.split("NATBOX")[1];
            }
            $('#natbxhide').val(delid);
            console.log("AA:"+delid);
            $('.popover').hide();
        });
        $('textarea#box-posbresp').on('mousedown',function(){
                           
                $('.popover').hide();
        });
        $('textarea#box-posbresp').bind('input change', function() {
            $('.popover').hide();
        });

        //rend
        
        // checking if something is typed when clicked
        $("#temp2 a.TB-tick").on("click", function (e) { 
		
			//alert('gggg');
            var posresp = $("textarea#box-posbresp").val();
            
            if (posresp == "") {
                e.preventDefault();
                return;
            }            
			$('#NATaddbox').removeAttr('disabled');
            var url = "";            
            url = "<?php echo $ROOT; ?>/window/nat/update/" + id;
            
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {"user_id" : "<?php echo $user_id; ?>}", "possible_response": posresp},
                success: function (data) {

                    if (data.status == 'success') {
                        // update id
                        $(box2).attr('id', data.id);
                        //add new class
                        $(box2).addClass('NATBOX'+data.id);
                        // UI handling
                        $(box2).children('.NAT-TextBoxButtons').addClass("visOFF");                        
                        // restore add box button
                        $(self).removeAttr('disabled');
                        // remove active flag
                        $(box2).removeAttr("data-active");
                        // restore html
                        $("textarea#box-posbresp").parent('.PE-TextFeildreg').html(posresp);

						
                        $("#" + data.id +  " a.TB-close").on("click", function () {
                            console.log($(this));
                            $(self).removeAttr('disabled');
                            $(this).removeAttr("data-active");
                            $(this).parents().find('.NAT-TextBoxButtons').addClass("visOFF");
                            $("textarea#box-posbresp").parent('.PE-TextFeildreg').html(posresp);
                        });
                        
                        
                        // handling this
                        $($(box2).find('.TB-close')[0]).off('click');
                        $($(box2).find('.TB-close')[0]).on("click", function () {
                            
                            $(this).parent().addClass('visOFF');
                            $(box2).removeAttr("data-active");
                            $($(box2).find('.PE-TextFeildreg')[0]).html(posresp);
							
                            $('#NATaddbox').removeAttr('disabled');
                        });
                    }

                    if (data.status == 'error') {

                    }
                }
            });
        });

        // if cancel button clicked remove recently added box
        $("#temp2 a.TB-close, " + "#temp2 .TopCornerCross").on("click", function () {
            //alert('old');
            $("#temp2").remove();
            $(self).removeAttr('disabled');
            $(box2).removeAttr("data-active"); 
            
        });

        // if text clicked, show textarea again for edition
        $("#temp2 .PE-TextFeildreg").on('click', function () {

            // add active button
            $(box2).attr("data-active", "true");

            // if we have shown the text area already return, don't want to do anything else
            // prevent adding more text to text area itself
            if ($(this).find("textarea#box-posbresp").length > 0) {
                return true;
            }

            // replace div html by textarea
            $(this).html('<textarea id="box-posbresp" name="posbresp" rows="5">' + $(this).html().trim() + '</textarea>');
            $(this).siblings(".NAT-TextBoxButtons").removeClass('visOFF');
            $("#NATaddbox").attr('disabled', 'disabled');

            // show popover when hovering text area
            $("textarea#box-posbresp").popover({
                content: $('#PE-NewBoxContent2').html(),
                html: true,
                placement: 'top',
                trigger: 'hover'
            });
        });
        
        // show popover when hovering text area
        /*$("textarea#box-posbresp").popover({
            content: $('#PE-NewBoxContent2').html(),
            html: true,
            placement: 'top',
            trigger: 'click'
        });  */
        if ($('textarea#box-posbresp').length > 0){
            $("textarea#box-posbresp").popover('show');
        }
    }
    
    $(document).ready(function() {
    
        $( ".NATbuttonsample" ).click(function() {        
            if($( ".NATsampcont" ).css("display") == "none"){              
                $('.PE-Box-Container').animate({height: '150px'}, 500);
                $( ".NATsampcont" ).delay(500).show( "slow" );
                $('#arwdiv').removeClass('arrow-up').addClass('arrow-down');
            } else {
                $('.PE-Box-Container').animate({height: '510px'}, 500);
                $( ".NATsampcont" ).hide( "slow" );
                $('#arwdiv').removeClass('arrow-down').addClass('arrow-up');
            }
        });

        $('.natnegcirctab').click(function() {
            $('#ModalNATWidget').modal('hide');
            
            <?php if (($currentStep > 5) AND ($dashbrd == 1)): ?>
                setTimeout(function(){
                    $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negthtcircle?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                        $('#ModalNATWidget').modal('show');
                        $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                            $(this).removeData('hidden.bs.modal').empty();
                            $(document.body).removeClass('modal-open');
                        });
                    }) 
                }, 250);
            <?php else: ?>
                setTimeout(function(){
                    $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negcircle?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                        $('#ModalNATWidget').modal('show');
                        $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                            $(this).removeData('hidden.bs.modal').empty();
                            $(document.body).removeClass('modal-open');
                        });
                    }) 
                }, 250);
            
            <?php endif; ?>
        });

        $('.natchlgtab').click(function() {
            $('#ModalNATWidget').modal('hide');

            setTimeout(function(){
                $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negativechallenge?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                    $('#ModalNATWidget').modal('show');
                    $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                        $(this).removeData('hidden.bs.modal').empty();
                        $(document.body).removeClass('modal-open');
                    });
                }) 
            }, 250);
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

</script>


