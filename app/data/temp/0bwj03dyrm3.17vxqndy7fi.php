<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/calendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/activity_list.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/calf.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/levengler.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/assets/js/calf.js" /></script>
<script src="<?php echo $ROOT; ?>/3rdparty/jqueryui/jquery-ui-1.10.custom.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/js/bootstrap-slider.js"></script>
<script src="<?php echo $ROOT; ?>/assets/js/levengler.js" /></script>

<style>
    .popover.top .arrow:after {
        border-top-color: #000000;
    }
    #smb1 .popover, #smb2 .popover,#smb3 .popover, #smb5 .popover, #slb1 .popover, #srb1 .popover {
        width: 175px;
    }
    #smb1 .popover .popover-content p {
        padding: 0;
    }
    
/*    .popover.left {
    left: 3% !important;
    width: 165px !important;
    top: 144px !important;
}*/

#splashscreen {
    background-color: #000000;
    color: #FFFFFF;
    display: none;
    float: right;
    height: 230px;
    padding: 8px;
    position: relative;
    right: 51px;
    top: -229px;
    width: 300px;
}
</style>

<!-- Modal -->
<div class="modal fade" id="ModalLevereglerWidget" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1200px;">
        <div class="modal-content shadow window" id="container" style="height: 800px;">
            <div class="PE-HeaderBar"> 
                Leveregler
                <a href="javascript:void(0)" class="PE-help btn" data-toggle="popover"></a>
                <a href="javascript:void(0)" class="close" data-dismiss="modal"aria-hidden="true"></a>
            </div>
            <div class="DropShaddowDOWN"></div>
            
            <input type="hidden" id="cid" value="">
            <input type="hidden" id="eid" value="">
            
            <div style="margin-top: 10px; height:730px; float:left; overflow-x: hidden; overflow-y: auto; width:100%; display:block;" id="fullcontent">
                
               <input type="hidden" id="elmblk" name="elmblk" value="" />
                <input type="hidden" id="elmbtnblk" name="elmbtnblk" value="" />
                <input type="hidden" id="elmctblk" name="elmctblk" value="" />
                <input type="hidden" id="elmntblk" name="elmntblk" value="" />

                <section class="nat_contant">
                    <div class="exercisePage">
                        <div class="exerciseLeft" id="sl1" style="display:none;">
                            <div class="texareaBox_left  tablocksl1">
                                <h4>Fordele</h4>
                                <textarea id="txtsl1"   onclick="switchbblock('slb1', 'tablocksl1', 1)" onkeypress="actmod('sl1')"></textarea>
                                <div id="slb1" class="PE-TextBoxButtons1" style="display: none;">
                                    <a class="TB-close1_nat exe_npBtn slb1" id="prev" href="#" data-block="sl1" data-bblock="slb1" data-ctblock="txtsl1" data-ntblock="txtsm2">TILBAGE</a>
                                    <a class="TB-tick1_nat exe_npBtn exe_active sl1" id="next" href="#" data-block="sl1" data-tarea="txtsl1"  data-bblock="slb1" data-fld="l1" data-nxt="sr1" data-hbox="txtsr1">NÆSTE</a>
                                </div>
                            </div>
                        </div>
                        <div class="exerciseCenter exe_center-center  tablocksm1" id="sm1">
                            <h2>
                                Unyttig leveregel
                            </h2>
                            <textarea id="txtsm1" onclick="switchbblock('smb1', 'tablocksm1', 2)" onkeypress="actmod1('sm1')"></textarea>
                            <div class="n_pBtn" id="smb1" style="display:none;">
                                <button class="nextBtn smb1" id="prev" data-block="sm1" data-bblock="smb1" data-ctblock="txtsm1" data-ntblock="txtsm1">

                                    <h4>TILBAGE</h4>
                                </button>
                                <button class="prevBtn activeBtn sm1" id="next" data-block="sm1" data-tarea="txtsm1"   data-bblock="smb1" data-fld="m1" data-nxt="sm2" data-hbox="txtsm2">

                                    <h4>NÆSTE</h4>
                                </button>
                            </div>

                            <div id="nthoughts" class="lev_windowBox">
                                <div style="margin-top: -22px;position: relative; left:117px;">
                                    <img src="<?php echo $ROOT; ?>/assets/img/commentPeak_topDRK.png" >
                                </div>
                                <div class="lev_windowinnerBox">
                                    <div class="lev_windowTopBox">

                                        Hvilken unyttige leveregel vil du se nærmere på? Vælg fra listen
                                        herunder eller klik på TILFØJ NY, hvis du har en selv, som du vil arbejde med.

                                    </div>
                                    <div id="innerlistblock" class="lev_windowCenterBox">
                                        <?php foreach (($levereglers?:array()) as $data): ?>
                                            <div class="lev_windowCaption">
                                                <a href="javascript:void(0)" onclick="createChallengeFromPast(<?php echo $data['id']; ?>,'<?php echo $data['title']; ?>', 'm1')"  class="thoughts" data-id="<?php echo $data['id']; ?>" data-text="<?php echo $data['title']; ?>"><?php echo $data['title']; ?></a>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="lev_windowBottomBox">
                                        <div class="lev_win_BottomBtn"><a id="Buttonnatchallenge" href="javascript:void(0);"  style="text-decoration: none;color:white;">&nbsp; + TILFØJ NY &nbsp;</a></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="exerciseRight" id="sr1" style="display:none;">
                            <div class="texareaBox_right tablocksr1">
                                <h4>Ulemper</h4>
                                <textarea  id="txtsr1"  onclick="switchbblock('srb1', 'tablocksr1', 1)" onkeypress="actmod('sr1')"></textarea>
                                <div id="srb1" class="PE-TextBoxButtons1" style="display: none;">
                                    <a class="TB-close1_nat exe_npBtn srb1" id="prev" href="#" data-block="sr1" data-bblock="srb1" data-ctblock="txtsr1" data-ntblock="txtsl1">TILBAGE</a>
                                    <a class="TB-tick1_nat exe_npBtn exe_active sr1" id="next" href="#" data-block="sr1" data-tarea="txtsr1"  data-bblock="srb1" data-fld="r1" data-nxt="sm3" data-hbox="txtsm3">NÆSTE</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapBox">
                        <div class="exercisePage exercisePage2">
                            <div class="exe_udfordringBox exe_udfordringBox2 exe_center-center">
                                <div class="udfordring_icon" id="sm2-main" style="display:none;"></div>
                                <div class="exe_udfordring exe_udfordring_top" id="sm2" style="display:none;">
                                    <div class="exe_udfordring_arrow tablocksm2">
                                        <h3>
                                            Baggrund for leveregel
                                        </h3>
                                        <textarea id="txtsm2" onclick="switchbblock('smb2', 'tablocksm2', 2)" onkeypress="actmod1('sm2')"></textarea>
                                        <div class="n_pBtn" id="smb2" style="display:none;">
                                            <button id="prev" class="nextBtn smb2" data-block="sm2" data-bblock="smb2" data-ctblock="txtsm2" data-ntblock="txtsm1">

                                                <h4>TILBAGE</h4>
                                            </button>
                                            <button class="prevBtn activeBtn sm2" id="next" data-block="sm2" data-tarea="txtsm2"  data-bblock="smb2" data-fld="m2" data-nxt="sl1" data-hbox="txtsl1">

                                                <h4>NÆSTE</h4>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapBox">
                        <div class="exe_singleBox" id="sm3" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_singleBorder tablocksm3">
                                <h3>

                                    Situationer hvor den viser sig
                                </h3>
                                <textarea id="txtsm3" onclick="switchbblock('smb3', 'tablocksm3', 2)" onkeypress="actmod1('sm3')"></textarea>
                                <div class="n_pBtn" id="smb3" style="display:none;">
                                    <button class="nextBtn smb3" id="prev" data-block="sm3" data-bblock="smb3" data-ctblock="txtsm3" data-ntblock="txtsr1">

                                        <h4>Tilbage</h4>
                                    </button>
                                    <button class="prevBtn activeBtn sm3" id="next" data-block="sm3" data-tarea="txtsm3"  data-bblock="smb3" data-fld="m3" data-nxt="sm4" data-hbox="sm4-tt">

                                        <h4>NÆSTE</h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapBox">
                        <div class="exe_smallBox" id="sm4" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_singleBorder" >
                                <p id="sm4-tt">
                                    <input type="hidden" id="txtsm4" name="txtsm4" value="2" >
                                    Er det muligt at omformulere den
                                    unyttige leveregel, så den bliver
                                    mere nuanceret og fleksibel ?
                                    
                                </p>
                                <div class="n_pBtn two_Btn" id="smb4" style="display:block;">
                                    <button class="nextBtn"  id="next" data-block="sm4" data-tarea="txtsm4"  data-bblock="smb4" data-fld="m4" data-nxt="sm5" data-hbox="txtsm5">
                                        JA
                                    </button>
                                    <button class="prevBtn"  id="prev" onclick="spashscreen()">
                                        NEJ
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div id="splashscreen">
                            <p>  
                                Det er ok. Kontakt evt din psykolog for at få hjæp til at formulere en ny leveregel. Du kan vælge at springe dette trin over, men skriv til din psykolog om det først. Du kan også formulere en leveregel, som du kunne ønske dig, at den så ud, også selvom du ikke tror helt på den. Den kan du fortsætte øvelsen med.
                            </p>
                            <br>
                            <p class="lev_lastBtn">
                                <input type="button" value="OK" name="cls" onclick="movenext()">
                            </p>
                        </div>
                    </div>


                    <div class="wrapBox">
                        <div class="exe_singleBox" id="sm5" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_singleBorder tablocksm5">
                                <h3>

                                    Mere nyttig leveregel
                                </h3>
                                <textarea id="txtsm5" onclick="switchbblock('smb5', 'tablocksm5', 2)" onkeypress="actmod1('sm5')"></textarea>
                                <div class="n_pBtn" id="smb5" style="display:none;">
                                    <button class="nextBtn smb5" id="prev" data-block="sm5" data-bblock="smb5" data-ctblock="txtsm5" data-ntblock="txtsm4">

                                        <h4>Tilbage</h4>
                                    </button>
                                    <button class="prevBtn activeBtn sm5" id="next" data-block="sm5" data-tarea="txtsm5"  data-bblock="smb5" data-fld="m5" data-nxt="natexit">

                                        <h4>NÆSTE</h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  3 -->
                </section>

                <div id="natexit" class="lev_natExit" style="display:none;height: 115px">
                    <p class="lev_natMatter" style="height:35px">  Godt gået!
                        Du er nu færdig med denne
                        øvelse. Du kan nu gå videre til
                        næste kapittel.
                    </p>
                    <br>
                    <p class="lev_lastBtn">
                        <input type="button" value="OK" name="cls" onclick="levexit()">
                    </p>
                </div>
                
                  
            </div>

            <div id="tooltip-help-sl1" class="popover bottom">
                <p>
                    Hvilke fordele er der ved at du har denne leveregel?
                </p>
            </div>
            <div id="tooltip-help-sr1" class="popover bottom">
                <p>
                    Hvilke ulemper er der ved at du har denne leveregel?
                </p>
            </div>
            <div id="tooltip-help-sm2" class="popover bottom">
                <p>
                    Hvor kommer den fra? Er der nogle faktorer i dit liv,
                    der har bidraget til udviklingen af din unyttige leveregel? Hvis ja, hvilke?
                </p>
            </div>
            <div id="tooltip-help-sm3" class="popover bottom">
                <p>
                    I hvilke konkrete situationer viser levereglen sig?
                    Hvordan påvirker den din adfærd? Tænk på tre situationer, hvor den har vist sig.
                </p>
            </div>

            <div id="tooltip-help-sm4" class="popover bottom">
                <p>
                    Er det muligt at omfor-
                    mulere den unyttige
                    leveregel, så den bliver
                    mere nuanceret og
                    fleksibel ?
                </p>
            </div>

            <div id="tooltip-help-sm5" class="popover bottom">
                <p>
                    Hvordan kan en ny
                    mere hensigtsmæssig
                    og samtidig realistisk
                    leveregel lyde?
                </p>
            </div>
            
            <div id="click_popOverBox" class="click_popOverBox_LV popover top">
                <p>Du har klikket på TILBAGE. Det du har skrevet vil ikke blive gemt. Vil du fortsætte alligevel?</p>
                <div class="popOver_btn_lv">
                    <button class="prevBtnLV" onclick="confirmCancel()">NEJ</button>
                    <button class="nextBnLV" onclick="confirmOk()">JA</button>
                </div>
            </div>

            <div id="leftcontainer">

            </div>
            
            <div id="rightcontainer">

            </div>

            <div id="calendarblock" class="calendarblock" style="display:none;">

                <div id="calendar">

                </div>
                <div style="background-color: #f2f2f2; height: 10%">

                    <div align="right" style="padding-top:.3%;padding-right: .5%"><!--<button type="button" >AKTIVITETSLISTE</button>-->
                        <table border="0">
                            <tr>

                                <td> 
                                    <div class="NATCAL" id="NATCAL" style="display:none;">
                                        <a  href="#" onclick="loadNATCH()" style="text-decoration:none;">FÆRDIG</a>
                                    </div>
                                </td>
                            </tr>
                        </table> 
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
    
$('.slb1').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$('.smb1').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$('.srb1').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$('.smb2').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$('.smb3').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$('.smb5').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$("textarea#txtsl1").popover({
    content: $('#tooltip-help-sl1').html(),
    html: true,
    placement: 'left',
    trigger: 'manual'
});

$("textarea#txtsr1").popover({
    content: $('#tooltip-help-sr1').html(),
    html: true,
    placement: 'right',
    trigger: 'manual'
});

$("textarea#txtsm2").popover({
    content: $('#tooltip-help-sm2').html(),
    html: true,
    placement: 'left',
    trigger: 'manual'
});

$("textarea#txtsm3").popover({
    content: $('#tooltip-help-sm3').html(),
    html: true,
    placement: 'left',
    trigger: 'manual'
});

$("#sm4-tt").popover({
    content: $('#tooltip-help-sm4').html(),
    html: true,
    placement: 'right',
    trigger: 'manual'
});

$("textarea#txtsm5").popover({
    content: $('#tooltip-help-sm5').html(),
    html: true,
    placement: 'left',
    trigger: 'manual'
});


$(document).on('click', '#Buttonnatchallenge', function() {
    document.getElementById("nthoughts").style.display = "none";
    document.getElementById("smb1").style.display = 'block';
    document.getElementById('txtsm1').focus();
});

$(document).on('click', '.thoughts', function() {

    document.getElementById("nthoughts").style.display = "none";
    var id = $(this).data('id');
    var txt = $(this).data('text');
    document.getElementById('txtsm1').value = txt;
    document.getElementById("cid").value = id;
    
    document.getElementById("sm2").style.display = 'block';
    document.getElementById('sm2-main').style.display = 'block';
   

    lvcheck('l1', 'sl1', 'txtsl1', id);
    lvcheck('r1', 'sr1', 'txtsr1', id);

    lvcheck('m2', 'sm2', 'txtsm2', id);
    lvcheck('m3', 'sm3', 'txtsm3', id);
    lvcheck('m4', 'sm4', 'txtsm4', id);
    lvcheck('m5', 'sm5', 'txtsm5', id);
     
        if(document.getElementById("txtsm2").value==""){
        $('textarea#txtsm2').popover('show');
     }
     
    if (document.getElementById("txtsm5").value) {
        document.getElementById('natexit').style.display = 'block';
    }
});

$(document).on('click', '#prev', function() {
    /*var block = $(this).data('block');
    var bblock = $(this).data('bblock');
    var tarea = $(this).data('tarea');

    document.getElementById(bblock).style.display = 'none';*/
        
     var block = $(this).data('block');
    var bblock = $(this).data('bblock');
    var ctblock = $(this).data('ctblock');
    var ntblock = $(this).data('ntblock');
    
    $('#elmblk').val('');
    $('#elmblk').val(block);
    
    $('#elmbtnblk').val('');
    $('#elmbtnblk').val(bblock);
    
    $('#elmctblk').val('');
    $('#elmctblk').val(ctblock);
    
    $('#elmntblk').val('');
    $('#elmntblk').val(ntblock);
    
    $(this).popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'top',
        trigger: 'click'
    });
});

function confirmCancel(){
    var elmblock = $("#elmblk").val();
    var elmbtnblock = $("#elmbtnblk").val();
    
    $('.' + elmbtnblock).popover('toggle');
}


// back button functionality
function confirmOk(){
   
    var elmblock = $("#elmblk").val();
    var elmbtnblock = $("#elmbtnblk").val();
    var elmctblock = $("#elmctblk").val();
    var elmntblock = $("#elmntblk").val();
    
    document.getElementById(elmbtnblock).style.display = 'none';
    
    $('.' + elmbtnblock).popover('toggle');
    $(".texareaBox_active").removeClass("texareaBox_active");
    $(".textarea_active").removeClass("textarea_active");
    
    if(elmctblock){
    $('#'+elmctblock).val('');
    }
    if(elmntblock){
    $('textarea#'+elmntblock).popover('show');
    $('#'+elmntblock).focus();
    }
}









$(document).on('click', '.TB-PREV-NAT', function() {
    var block = $(this).data('block');

    document.getElementById(block).style.display = 'block';
    var objDiv = document.getElementById("fullcontent");
    objDiv.scrollTop = objDiv.scrollHeight;
});

$(document).on('click', '#next', function() {
    
    
    $(".texareaBox_active").removeClass("texareaBox_active");
    $(".textarea_active").removeClass("textarea_active");

    var block = $(this).data('block');
    var bblock = $(this).data('bblock');
    var tarea = $(this).data('tarea');
    var fld = $(this).data('fld');
    var nxt = $(this).data('nxt');
    var cid = document.getElementById("cid").value;
    var txt = document.getElementById(tarea).value;
    
     document.getElementById(bblock).style.display = 'none';
     
    
    if( ($.trim(txt) != "" ) && ($.trim(cid) == "" )  ){    

        if (bblock == "smb1") {
            $.ajax({
                url: "/window/leveregler/createchallange",
                type: 'POST',
                dataType: 'json',
                cache: false,
                async: false,
                data: { txt: txt },
                success: function(data) {
                    if (data.status == "success") {
                        cid = data.cid;
                        document.getElementById("cid").value = cid;
                    }
                }
            });
        }

       
    }
    
     if (($.trim(txt) != "" ) && ($.trim(cid) != "" )  ) {
            updatenchallenge(cid, txt, fld);

            document.getElementById(nxt).style.display = 'block';

            if (nxt == "sm2") {
                document.getElementById('sm2-main').style.display = 'block';
            }
            
            var objDiv = document.getElementById("fullcontent");
            objDiv.scrollTop = objDiv.scrollHeight;
    }
    
    var hbox = $(this).data('hbox');
     hidePopovers();
     if(hbox=="sm4-tt"){
      $('#'+hbox).popover('show');
     }else{
     $('textarea#'+hbox).popover('show');
     }
});

function levexit(){
    $('#ModalLevereglerWidget').modal('hide');
}

function spashscreen(){
    hidePopovers();
    document.getElementById("splashscreen").style.display='block';
    
    var objDiv = document.getElementById("fullcontent");
            objDiv.scrollTop = objDiv.scrollHeight;
}

function movenext(){
    
    document.getElementById("splashscreen").style.display='none';
    document.getElementById("sm5").style.display = 'block';
     var cid = document.getElementById("cid").value;
      updatenchallenge(cid, 1, 'm4');
      
       var objDiv = document.getElementById("fullcontent");
       objDiv.scrollTop = objDiv.scrollHeight;
     
     hidePopovers();
     var hbox = "txtsm5";
     $('textarea#'+hbox).popover('show');
     
     
     
}



function actmod(blk){
    $('.'+blk).removeClass("exe_active");
}

function actmod1(blk){
    $('.'+blk).removeClass("activeBtn");
}

$(":input, a").attr("tabindex", "-1");

</script>

<div class="click_popOver popover bottom" id="closebox1">
				
					<p>Man kan ikke registrere aktiviteter 
frem i tiden.</p>
					<div class="popOver_btn">
						<button class="prevBtn" onclick="hidecloseblock()">OK</button>
						
					</div>
				
				
	</div>
<script>
$(document).ready(function(){               
                                 
                // popover 
                $('.PE-help').popover({
                    content: 'popovertext',//$('#PE-HelpCont').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click'
                });

                function hidePopover(){
                    $('.PE-help').popover('hide');

                    $('.PE-help').popover({
                        content:  'popovertext',//$('#PE-HelpCont').html(),
                        html: true,
                        placement: 'bottom',
                        trigger: 'click'
                    });
                }
                  
            });
 </script>
    