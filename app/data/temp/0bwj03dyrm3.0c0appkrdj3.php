<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/calendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/activity_list.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/calf.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/nat.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/NATneg_circle.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/assets/js/calf.js" /></script>
<script src="<?php echo $ROOT; ?>/3rdparty/jqueryui/jquery-ui-1.10.custom.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/js/bootstrap-slider.js"></script>
<script src="<?php echo $ROOT; ?>/assets/js/nat.js" /></script>

<style>

#toolbox{           
    background-color: #000000; color: #FFFFFF; height: 270px; left: 500px;
    position: relative; top: -348px; width: 270px; padding: 10px; z-index: 99999;
}
.showmodal
{
    top:200px; left:250px; z-index:1000; position:absolute;
    background-color:White; display:block;       
}   
.hidemodal
{
    display:none;
}       
.OverlayEffect
{
    background-color: white; filter: alpha(opacity=70); opacity: 0.7; width:100%;
    height:100%; z-index:400; position:absolute; top:0; left:0;       
}
.popover.bottom .arrow:after {
    border-bottom-color: #000000;
}
.popover.top .arrow:after {
    border-top-color: #000000;
}
#smb1 .popover, #smb2 .popover, #smb4 .popover, #smb7 .popover, #slb1 .popover, #srb1 .popover, #slb2 .popover, #srb2 .popover {
    width: 175px;
}
#smb1 .popover .popover-content p {
    padding: 0;
}
</style>
    
<!-- Modal -->
<div class="modal fade" id="ModalNATWidget" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1200px;">
        <div class="modal-content shadow window" id="container" style="height: 800px;">
          
            <header class="nat_header">
                <nav class="nat_menu">
                    <ul>
                        <li class="nat_menu_1">
                           <?php if ($dashbrd == 1): ?>
                                <a href="javascript:void(0)" class="natregtab">
                                     <i></i>
                                     Registering
                                </a>
                               <?php else: ?>
                                <i></i>
                                Registering
                               
                           <?php endif; ?>
                        </li>
                        <li class="nat_menu_2">
                            <?php if ($dashbrd == 1): ?>
                                <a href="javascript:void(0)" class="natnegcirctab">
                                    <i></i>
                                    Den negative cirkel
                               </a>
                               <?php else: ?>
                                <i></i>
                                Den negative cirkel
                               
                           <?php endif; ?>                           
                        </li>
                        <li class="nat_menu_3 active">
                            <a href="javascript:void(0)">
                                <i class="pe_active"></i>
                                Udfordring
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="negcommentBox">
                    <i class="top_icon"></i>
                    <div class="negcomment_matter">
                        <p>
                            Klik her for at komme igang med at arbejde med en af dine negative tanker, i den negative cirkel.
                        </p>
                    </div>
                </div>
                <div class="nat_heading">
                    <h2>Negative automatiske tanker - Den negative cirkel</h2>
                    <i class="q_Mark">Questen</i>
                    <a href="javascript:void(0);" data-dismiss="modal">
                        <i class="c_Mark">close</i>
                    </a>
                </div>
            </header>
            
            <div class="DropShaddowDOWN"></div>
            
            <input type="hidden" id="cid" value="" />
            <input type="hidden" id="eid" value="" />
            
            <div style="margin-top: 10px; height:730px; float:left; overflow-x: hidden; overflow-y: auto; width:100%; display:block;" id="fullcontent">
                
                <input type="hidden" id="elmblk" name="elmblk" value="" />
                <input type="hidden" id="elmbtnblk" name="elmbtnblk" value="" />
                <input type="hidden" id="elmctblk" name="elmctblk" value="" />
                <input type="hidden" id="elmntblk" name="elmntblk" value="" />

                <section class="nat_contant">
                    <div class="exercisePage">
                        <div class="exerciseLeft" id="sl1" style="display:none;">
                            <div class="texareaBox_left tablocksl1">
                                <h4>For</h4>
                                <textarea id="txtsl1" onclick="switchbblock('slb1','tablocksl1',1)" onkeypress="actmod('sl1')"></textarea>
                                <div id="slb1" class="PE-TextBoxButtons1" style="display: none;">
                                    <a class="TB-close1_nat exe_npBtn slb1" id="prev" href="#" data-block="sl1" data-bblock="slb1" data-ctblock="txtsl1" data-ntblock="txtsm1">TILBAGE</a>
                                    <a class="TB-tick1_nat exe_npBtn TB_active_nat sl1" id="next" href="#" data-block="sl1" data-tarea="txtsl1"  data-bblock="slb1" data-fld="l1" data-nxt="sr1" data-hbox="txtsr1">NÆSTE</a>
                                </div>
                            </div>
                        </div>
                        <div class="exerciseCenter exe_center-center  tablocksm1" id="sm1">
                            <h2>
                                Negative tanker
                            </h2>
                            <textarea id="txtsm1" onclick="switchbblock('smb1','tablocksm1',2)" onkeypress="actmod1('sm1')"></textarea>
                            <div class="n_pBtn" id="smb1" style="display:none;">
                                <button class="nextBtn smb1" id="prev" data-block="sm1" data-bblock="smb1" data-ctblock="txtsm1" data-ntblock="txtsm1">
                                    
                                    <h4>TILBAGE</h4>
                                </button>
                                <button class="prevBtn sm1 active" id="next" data-block="sm1" data-tarea="txtsm1"  data-bblock="smb1" data-fld="m1" data-nxt="sl1" data-hbox="txtsl1">
                                    
                                    <h4>NÆSTE</h4>
                                </button>
                            </div>

                            <div id="nthoughts" class="nat_windowBox">
                                <div style="margin-top: -22px;position: relative; left:117px;">
                                    <img src="<?php echo $ROOT; ?>/assets/img/commentPeak_topDRK.png" >
                                </div>
                                <div class="nat_windowinnerBox">
                                    <div class="nat_windowTopBox">
                                        Vælg en af dine tidligere regis-trerede negative tanker på listen herunder, eller arbejd med en ny ved at klikke på TILFØJ NY
                                    </div>
                                    <div class="nat_windowCenterBox" id="innerlistblock">
                                        <?php foreach (($challenges?:array()) as $data): ?>
                                            <div class="nat_windowCaption">
                                                <a href="javascript:void(0)" onclick="createChallengeFromPast(<?php echo $data['id']; ?>,'<?php echo $data['negative_thoughts']; ?>', 'm1')" class="thoughts" data-id="<?php echo $data['id']; ?>" data-text="<?php echo $data['negative_thoughts']; ?>"><?php echo $data['negative_thoughts']; ?></a>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="nat_windowBottomBox">
                                        <div class="nat_win_BottomBtn"><a id="Buttonnatchallenge" href="javascript:void(0);"  style="text-decoration: none;color:white;">&nbsp; + TILFØJ NY &nbsp;</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="exerciseRight" id="sr1" style="display:none;">
                            <div class="texareaBox_right tablocksr1">
                                <h4>Imod</h4>
                                <textarea  id="txtsr1"  onclick="switchbblock('srb1','tablocksr1',1)" onkeypress="actmod('sr1')"></textarea>
                                <div id="srb1" class="PE-TextBoxButtons1" style="display: none;">
                                    <a class="TB-close1_nat exe_npBtn srb1" id="prev" href="#" data-block="sr1" data-bblock="srb1" data-ctblock="txtsr1" data-ntblock="txtsl1">TILBAGE</a>
                                    <a class="TB-tick1_nat exe_npBtn TB_active_nat sr1" id="next" href="#" data-block="sr1" data-tarea="txtsr1"  data-bblock="srb1" data-fld="r1" data-nxt="sm2" data-hbox="txtsm2">NÆSTE</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapBox">
                        <div class="exercisePage exercisePage2">
                            <div class="exerciseLeft" id="sl2" style="display:none;">
                                <div class="texareaBox_left tablocksl2">
                                    <h4>Fordele</h4>
                                    <textarea id="txtsl2" onclick="switchbblock('slb2','tablocksl2',1)" onkeypress="actmod('sl2')"> </textarea>
                                    <div id="slb2" class="PE-TextBoxButtons1" style="display: none;">
                                        <a class="TB-close1_nat exe_npBtn slb2" id="prev" href="#" data-block="sl2" data-bblock="slb2" data-ctblock="txtsl2" data-ntblock="txtsm2">TILBAGE</a>
                                        <a class="TB-tick1_nat exe_npBtn sl2 TB_active_nat" id="next" href="#" data-block="sl2" data-tarea="txtsl2"  data-bblock="slb2" data-fld="l2" data-nxt="sr2" data-hbox="txtsr2">NÆSTE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="exe_udfordringBox exe_udfordringBox2 exe_center-center">
                                <div class="udfordring_icon" id="sm2-main" style="display:none;"></div>
                                <div class="exe_udfordring" id="sm2" style="display:none;">
                                    <div class="exe_udfordring_arrow tablocksm2">
                                        <h3>
                                            Udfordring
                                        </h3>
                                        <textarea id="txtsm2" onclick="switchbblock('smb2','tablocksm2',2)" onkeypress="actmod1('sm2')"></textarea>
                                        <div class="n_pBtn" id="smb2" style="display:none;">
                                            <button id="prev" class="nextBtn smb2" data-block="sm2" data-bblock="smb2" data-ctblock="txtsm2" data-ntblock="txtsr1">
                                                
                                                <h4>TILBAGE</h4>
                                            </button>
                                            <button class="prevBtn sm2 active" id="next" data-block="sm2" data-tarea="txtsm2"  data-bblock="smb2" data-fld="m2" data-nxt="sl2" data-hbox="txtsl2">
                                                
                                                <h4>NÆSTE</h4>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="exerciseRight" id="sr2" style="display:none;">
                                <div class="texareaBox_right tablocksr2">
                                    <h4>Ulemper</h4>
                                    <textarea id="txtsr2" onclick="switchbblock('srb2','tablocksr2',1)" onkeypress="actmod('sr2')"></textarea>
                                    <div id="srb2" class="PE-TextBoxButtons1" style="display: none;">
                                        <a class="TB-close1_nat exe_npBtn srb2" id="prev" href="#" data-block="sr2" data-bblock="srb2" data-ctblock="txtsr2" data-ntblock="txtsl2">TILBAGE</a>
                                        <a class="TB-tick1_nat exe_npBtn TB_active_nat sr2" id="next" href="#" data-block="sr2" data-tarea="txtsr2"  data-bblock="srb2" data-fld="r2" data-nxt="sm3" data-hbox="exe_roundBorder">NÆSTE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapBox round_margin">
                        <div class="exe_roundBox" id="sm3" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_roundBorder">
                                <div class="round_header" id="eventdate">
                                    <h2>
                                        <i></i>
                                        Aftale
                                    </h2>
                                    <div class="round_cld round_top_gray">
                                        <h4>?</h4>
                                        <span>Hvornår</span>
                                    </div>
                                </div>
                                <div class="round_footer">

                                    <h4 id="caleventtxt">  <br><a id="ButtonCalendar" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme1" onclick="loadcalendar()">ABN KALENDER</a></h4>
                                    <div class="round_btn" id="smb3" style="display:none;">
                                        <button class="nextBtn" id="next1"  data-block="sm3" data-tarea="txtsm3"  data-bblock="smb3" data-fld="m3" data-nxt="sm4" data-hbox="txtsm4">
                                            Ja
                                        </button>
                                        <button class="prevBtn" id="prev" data-block="sm3" data-bblock="smb3" data-ctblock="" data-ntblock="txtsr2">
                                            Nej
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wrapBox">
                        <div class="exe_singleBox" id="sm4" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_singleBorder tablocksm4">
                                <h3>Hvad skete der?</h3>
                                <textarea id="txtsm4" onclick="switchbblock('smb4','tablocksm4',2)" onkeypress="actmod1('sm4')"></textarea>
                                <div class="n_pBtn" id="smb4" style="display:none;">
                                    <button class="nextBtn smb4" id="prev" data-block="sm4" data-bblock="smb4" data-ctblock="txtsm4" data-ntblock="txtsm3">
                                        
                                        <h4>TILBAGE</h4>
                                    </button>
                                    <button class="prevBtn active sm4" id="next" data-block="sm4" data-tarea="txtsm4"  data-bblock="smb4" data-fld="m4" data-nxt="sm5">
                                        
                                        <h4>NÆSTE</h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapBox">
                        <div class="exe_smallBox" id="sm5" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_singleBorder">
                                <p>
                                    <input type="hidden" id="txtsm5" name="txtsm5" value="1" />                              
                                    Blev din automatiske negative tanke bekræftet eller afkræftet?
                                </p>
                                <div class="n_pBtn two_Btn" id="smb5">
                                    <button class="nextBtn" id="prev" data-block="sm5" data-bblock="smb5" data-ctblock="" data-ntblock="txtsm4">
                                        BEKRÆFTET
                                    </button>
                                    <button class="prevBtn  bsm5" id="next" data-block="sm5" data-tarea="txtsm5"  data-bblock="smb5" data-fld="m5" data-nxt="sm6">
                                        AFKRÆFTET
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapBox">
                        <div class="exe_smallBox" id="sm6" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_singleBorder">
                                <p>
                                    <input type="hidden" id="txtsm6" name="txtsm6" value="1" >
                                    Kan du generalisere denne erfaring til andre situationer?
                                </p>
                                <div class="n_pBtn two_Btn" id="smb6">
                                    <button class="nextBtn bsm6"  id="next" data-block="sm6" data-tarea="txtsm6"  data-bblock="smb6" data-fld="m6" data-nxt="sm7" data-hbox="txtsm7">
                                        JA
                                    </button>
                                    <button class="prevBtn"  id="prev" data-block="sm6" data-bblock="smb6" data-ctblock="" data-ntblock="txtsm5">
                                        NEJ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapBox">
                        <div class="exe_singleBox" id="sm7" style="display:none;">
                            <div class="udfordring_icon"></div>
                            <div class="exe_singleBorder tablocksm7">
                                <h3>Hvilke situationer?</h3>
                                <textarea id="txtsm7" onclick="switchbblock('smb7','tablocksm7',2)" onkeypress="actmod1('sm7')"></textarea>
                                <div class="n_pBtn" id="smb7" style="display:none;">
                                    <button class="nextBtn smb7" id="prev" data-block="sm7" data-bblock="smb7" data-ctblock="txtsm7" data-ntblock="txtsm6">
                                        
                                        <h4>TILBAGE</h4>
                                    </button>
                                    <button class="prevBtn active sm7" id="next" data-block="sm7" data-tarea="txtsm7"  data-bblock="smb7" data-fld="m7">
                                        
                                        <h4>FÆRDIG</h4>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--  3 -->
                </section>
                <div id="sm8" class="nat_tickMark" style="display:none;">
                    <div class="nat_tMark">
                        <img src="<?php echo $ROOT; ?>/assets/img/NAT-final.png" />
                    </div>
                </div>

                <div id="natexit" style="display:none;">
                    <p>  Godt gået!<br>
                        Du er nu færdig med øvelsen.
                        Dette redskab er nu blevet
                        tilgængeligt på dit arbejdsbord.
                        Lav endelig flere af disse
                        udfordringer med andre af din
                        negative tanker.
                    </p>
                    <br>
                    <p style="text-align: center;">
                        <input type="button" value="OK" name="cls" onclick="$('#ModalNATWidget').modal('hide');" />
                    </p>
                </div>

            </div>
            <div id="tooltip-help-sl1" class="popover bottom">
                <p>
                    Hvad taler for den <br/>
                    negative tanke?
                </p>
            </div>
            <div id="tooltip-help-sr1" class="popover bottom">
                <p>
                    Hvad taler imod den <br/>
                    negative tanke?
                </p>
            </div>
            <div id="tooltip-help-sm2" class="popover bottom">
                <p>
                    Udtænk en bestemt<br/>
                    situation hvor du kan<br/>
                    afprøve om din tanke<br/>
                    holder stik. Hvad vil du<br/>
                    konkret gøre?
                </p>
            </div>
            <div id="tooltip-help-sl2" class="popover bottom">
                <p>
                    Hvilke fordele kan<br/>
                    der være ved at<br/>
                    gøre dette?
                </p>
            </div>
            <div id="tooltip-help-sr2" class="popover bottom">
                <p>
                    Hvilke ulemper<br/>
                    kan der være ved<br/>
                    at gøre dette?
                </p>
            </div>
            <div id="tooltip-help-sm3" class="popover bottom">
                <p>
                    Hvornår vil du gøre det?<br/>
                    Skriv det i din kalender.<br/>
                    Klik på ÅBN KALENDER
                </p>
            </div>
            <div id="tooltip-help-eventdate" class="popover bottom">

                <p>Du har nu lavet en aftale med dig 
selv om, hvornår du vil afprøve din 
udfordring.
Du skal nu forlade trinnet og vil blive 
spurgt om du har afprøvet din 
udfordring, når det pågældene 
tidspunkt er passeret.
Du kan ændre din aftale fra din 
aktivitetskalender på arbejdsbordet.</p>
                <div class="popOver_btn">
                    <button class="prevBtn" onclick="natexit()">OK</button>

                </div>
            </div>
            
            
            
            <div id="tooltip-help-sm4" class="popover bottom">
                <p>
                    Hvad skete der?<br/>
                    Hvad gjorde du?<br/>
                    Beskriv kort.
                </p>
            </div>

            <div id="tooltip-help-sm7" class="popover bottom">
                <p>
                    I hvilke situationer<br/>
                    kan du bruge denne<br/>
                    erfaring?
                </p>
            </div>
            
            <div id="leftcontainer">

            </div>
            
            <div id="rightcontainer">

            </div>
            
            <div id="click_popOverBox" class="click_popOverBox_NC popover top">
                <p>Du har klikket på TILBAGE. Det du har skrevet vil ikke blive gemt. Vil du fortsætte alligevel?</p>
                <div class="popOver_btn_nc">
                    <button class="prevBtnNC" onclick="confirmCancel()">NEJ</button>
                    <button class="nextBnNC" onclick="confirmOk()">JA</button>
                </div>
            </div>

            <div id="calendarblock" class="calendarblock" style="display:none;">
                <div id="calendar" style="opacity:5px;">

                </div>
                <div id="overlay"></div>
                <div id="toolbox" style="display:block;">
                    <p> Dette er en begrænset udgave af din kalender. Du kan kun planlægge din udfordring her 
                    ved at klikke og trække med musen. Du kan ikke alle de andre ting du normalt kan i din 
                    kalender, såsom at lave andre nye aktiviteter, eller redigere eksisterende. Det eneste der 
                    ellers er muligt, er at flytte rundt på eksisterende aktiv-iteter, hvis du skulle have brug 
                    for at omlægge nogle planer.</p>
                  
                    <div style="background-color:grey;  margin-left:75px; border-radius: 15px;padding: 5px; width: 100px;text-align: center; float: left;">
                        <a id="buttonok" href="javascript:void(0);"  style="text-decoration: none;color:white;">&nbsp; OK &nbsp;</a>
                    </div>   
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

<div id="PE-HelpContentNATChlg" class="popover bottom">
    <div class="title">Negative automatiske tanker</div>
    <p>Her kan du formulere en udfordring til en af dine negative tanker, som du så skal teste i praksis og efterfølgende komme tilbage og evaluere.
       Klik på TILFØJ NY for at komme igang.</p>
    <p>For at forlade redskabet, klikker du på krydset i hjørnet. Alt vil være gemt automatisk.</p>
</div>


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

$('.slb2').popover({
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

$('.srb2').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$('.smb4').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});

$('.smb7').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'top',
    trigger: 'click'
});
    
// modal help
$('.q_Mark').popover({
    content: $('#PE-HelpContentNATChlg').html(),
    html: true,
    placement: 'bottom',
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

$("textarea#txtsl2").popover({
    content: $('#tooltip-help-sl2').html(),
    html: true,
    placement: 'left',
    trigger: 'manual'
});

$("textarea#txtsr2").popover({
    content: $('#tooltip-help-sr2').html(),
    html: true,
    placement: 'right',
    trigger: 'manual'
});

$(".exe_roundBorder").popover({
    content: $('#tooltip-help-sm3').html(),
    html: true,
    placement: 'left',
    trigger: 'manual'
});

$("#m3").popover({
    content: $('#tooltip-help-eventdate').html(),
    html: true,
    placement: 'right',
    trigger: 'manual'
});

$("textarea#txtsm4").popover({
    content: $('#tooltip-help-sm4').html(),
    html: true,
    placement: 'left',
    trigger: 'manual'
});

$("textarea#txtsm7").popover({
    content: $('#tooltip-help-sm7').html(),
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
    
    document.getElementById("txtsm1").value =txt;
    document.getElementById("cid").value = id;
    document.getElementById("sl1").style.display = 'block';
    
    

    lb1check('l1', 'sl1', 'txtsl1', id);
    lb1check('r1', 'sr1', 'txtsr1', id);
    lb1check('l2', 'sl2', 'txtsl2', id);
    lb1check('m2', 'sm2', 'txtsm2', id);
    lb1check('r2', 'sr2', 'txtsr2', id);
    lb1check('m4', 'sm4', 'txtsm4', id);
    lb1check('m5', 'sm5', 'txtsm5', id);
    lb1check('m6', 'sm6', 'txtsm6', id);
    lb1check('m7', 'sm7', 'txtsm7', id);
    
    if(document.getElementById("txtsl1").value==""){
    $('textarea#txtsl1').popover('show');
    }
    
    if(document.getElementById("txtsm5").value==1){
        $('.bsm5').addClass("exe_click");
    }
    
    if(document.getElementById("txtsm6").value==1){
        $('.bsm6').addClass("exe_click");
    }

    if(document.getElementById("txtsm7").value){
        document.getElementById('sm8').style.display = 'block';
        document.getElementById('natexit').style.display='block';

        $('#bid6').addClass("rightBtn1_select");
        $('#bid7').addClass("rightBtn1_select");
        $('#natexit').focus();

       
        
    } else {        
        var objDiv = document.getElementById("fullcontent");
        objDiv.scrollTop = objDiv.scrollHeight;
    }
    
    preloadevent(id);
});

$(document).on('click', '#prev', function() { 
    
        
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
   
    
    $('.' + elmbtnblock).popover('toggle');
}

// back button functionality
function confirmOk(){
    var elmblock = $("#elmblk").val();
    var elmbtnblock = $("#elmbtnblk").val();
    var elmctblock = $("#elmctblk").val();
    var elmntblock = $("#elmntblk").val();
    
    if(elmblock != 'sm3'){
        document.getElementById(elmbtnblock).style.display = 'none';
    }
    
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
    
    
    if(elmntblock=="txtsm3"){
     $('.exe_roundBorder').popover('show');
    }
}

$(document).on('click', '#next1', function() {
    var nxt = $(this).data('nxt');

    document.getElementById(nxt).style.display = 'block';
    var objDiv = document.getElementById("fullcontent");
    objDiv.scrollTop = objDiv.scrollHeight;
});

$(document).on('click', '#next', function() {
    

    var block = $(this).data('block');
    var bblock = $(this).data('bblock');
    var tarea = $(this).data('tarea');
    var fld = $(this).data('fld');
    var nxt = $(this).data('nxt');
    var cid = document.getElementById("cid").value;
    var txt = document.getElementById(tarea).value;
   
    
     if(bblock != "smb5" && bblock != "smb6") {
        $(".texareaBox_active").removeClass("texareaBox_active");
        $(".textarea_active").removeClass("textarea_active");
     }else{
         txt=1;
     }

    if(txt){
        if (bblock == "smb1" && cid=='') {
            document.getElementById("nthoughts").style.display = "none";
            
            $.ajax({
                url: "/window/nat/createchallange",
                type: 'POST',
                dataType: 'json',
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

            updatenchallenge(cid, txt, fld);

            if(bblock != "smb5" && bblock != "smb6") {
                document.getElementById(bblock).style.display = 'none';
            }
            if(bblock == "smb5"){
            $('.bsm5').addClass("exe_click");
            }
            if(bblock == "smb6"){
            $('.bsm6').addClass("exe_click");
            }
            
            
            if(bblock == "smb7") {
                 document.getElementById("sm8").style.display = 'block';
                document.getElementById('natexit').style.display='block';
            }

            document.getElementById(nxt).style.display = 'block';

            if (nxt == "sm2") {
                document.getElementById('sm2-main').style.display = 'block';
            }

            var objDiv = document.getElementById("fullcontent");
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    
    
    var hbox = $(this).data('hbox');
     hidePopovers();
     if(hbox){
     if(hbox=="exe_roundBorder"){
     $('.'+hbox).popover('show');
     }else{
     
     $('textarea#'+hbox).popover('show');
      
     }
     }
});


$(document).on('click', '#buttonok', function() {
    document.getElementById("overlay").className = "";
    document.getElementById("toolbox").style.display = "none";
    document.getElementById("toolbox").style.height="";
});


<?php if (isset($currentStep) && $currentStep < '6'): ?>                                
    function updateStep(step){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo $ROOT; ?>/user/update/step",
            data: {id: "<?php echo $user_id; ?>", treatment_step: step}
        });
    }
<?php else: ?>
    function updateStep(step){
    }

<?php endif; ?>


$(document).ready(function() {

   
    $('.natregtab').click(function() {
        $('#ModalNATWidget').modal('hide');

        setTimeout(function(){
            $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/show?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {                
                $('#ModalNATWidget').modal('show');
                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                });
            }) 
        }, 250);
    });

    $('.natnegcirctab').click(function() {
        $('#ModalNATWidget').modal('hide');

        setTimeout(function(){
            $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negcircle?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                $('#ModalNATWidget').modal('show');
                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                });
            }) 
        }, 250);
    });

});

function actmod(blk){    
    $('.'+blk).removeClass("TB_active_nat");
}

function actmod1(blk){    
    $('.'+blk).removeClass("active");
}


$(":input, a").attr("tabindex", "-1");


</script>

<div class="click_popOver popover bottom" id="closebox1">
				
					<p>Man kan ikke planlægge aktiviteter tilbage i tiden.</p>
					<div class="popOver_btn">
						<button class="prevBtn" onclick="hidecloseblock()">OK</button>
						
					</div>
				
				
	</div>