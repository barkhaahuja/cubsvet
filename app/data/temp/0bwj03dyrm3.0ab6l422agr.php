<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/NATneg_circle.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap/css/bootstrap.custom.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/3rdparty/jquery/jquery-1.10.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.custom.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/js/bootstrap-slider.js"></script>

<style>
    .nat_heading .popover{
        background-color: #000;
        color: #fff;
    }
    .nat_heading .popover.bottom .arrow:after{
        border-bottom-color: #000;
    }
    .negcircle .popover{
        background-color: #000;
        color: #fff;
        width: 175px;
    }
    .negcircle .popover.bottom .arrow:after{
        border-bottom-color: #000;
    }
    .pos1 .S1_NC_TB .tooltip.left {
        top: 46px !important;
        left: -200px !important;
    }
    .pos2 .S1_NC_TB .tooltip.left {
        top: 39px !important;
        left: -203px !important;
    }
    .pos3 .S1_NC_TB .tooltip.left {
        top: 36px !important;
        left: -174px !important;
    }
    .pos3 .S1_NC_TB .tooltip .tooltip-inner {
        max-width: 175px;
    }
    .pos4 .S1_NC_TB .tooltip.left{
        top: 0 !important;
        left: -185px !important;
    }
    .slider .tooltip.hide{
        display:none;
    }
    .S1_NC_TBButtons visNONE{
        padding-top: 20px;
    }
    
</style>

<!-- Modal -->
<div class="modal fade" id="ModalNATWidget" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow window" id="container" style="width:1200px; height:720px; margin:auto; border:1px solid #000; background-color: #F5F5F6;">

            <div class="natnegcircl" style="display:block; ">

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
                                        <span style="color: #797979; font-size: 15px; line-height: 28px;">Registering</span>
                                
                                <?php endif; ?>
                            </li>
                            <li class="nat_menu_two_2 active_2">
                                <a href="javascript:void(0)">
                                    <i></i>
                                    Den negative cirkel
                                </a>
                            </li>     
                            <?php if ((($currentStep.'.'.$currentSubStep) >= 5.3) AND ($dashbrd == 1)): ?>
                                <li class="nat_menu_3">
                                    <a href="javascript:void(0)" class="natchlgtab">
                                        <i></i>
                                        Udfordring
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                    <div class="negcommentBox" style="display:block;">
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
                <section class="nat_contant" style="display:none;">
                    <div id="popup">
                        <div class="popup_top">
                            <p>Du kan vælge en af dine allerede registrerede negative tanker fra listen, eller arbejde fra
                                bunden med en helt ny ved at klikke på TILFØJ NY</p>
                        </div>
                        <div class="popup_cenetr">

                        </div>
                        <div class="scroll_bar_bottom">                            
                            <div class="addnewnegtht">
                                <img src="<?php echo $ROOT; ?>/assets/img/plus_icon.png" />TILFØJ NY
                            </div>                            
                        </div>
                    </div>
                </section>

                <div class="DropShaddowDOWN"></div>
                
                <input type="hidden" name="natneghide" id="natneghide" value="" />

                <!--Negative Circle start-->

                <div class="negcircle" style="display:none;">

                    <div class="MoveableContainer pos0 visNONE">
                        <div id="S1_NC_TBSit">
                            <div class="TB-Header">Situation <a class="help help-pos0" data-toggle="tooltip" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild_Drk" name="textPos0"></textarea>

                            <div class="tooltip-help-pos0 tooltip_TB_1" data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>I hvilken situation havde du disse tanker? Beskriv situationen kort.</p>
                                 <p>Klik i tekstfeltet for at begynde at skrive.</p>"
                                 data-placement="left"></div>

                            <div class="S1_NC_TBButtons visNONE">
                                <a href="javascript:void(0)" class="NCB-close" onclick="delconfirm('pos0')">FORTRYD</a>
                                <a href="javascript:void(0)" class="NCB-tick-drk" onclick="nextStep1(true)">NÆSTE</a>
                            </div>
                        </div>

                        <div id="S1_NC_SitBottom"></div>
                    </div>

                    <div id="NC_BG">
                        <div class="Circle BC_BG_Stage0">
                            <a href="javascript:void(0)" class="qstnspot"></a>  
                            <div class="negative_circle" style="display:none;">
                                <div class="negative_box">
                                    <div class="topbox">
                                        Hvad taler for, at dine tanker er  <br/> rigtige?<br/><br/>
                                        Hvad taler imod, at dine tanker er rigtige? <br/><br/>
                                        Er der andre måder at forstå situationen på? <br/><br/>
                                        Hvordan vil du have set på 
                                        situationen, før du blev deprimeret? <br/><br/>
                                        Hvad ville din bedste ven tænke i den situation? <br/><br/>
                                        Hvilke konsekvenser har det, hvis dine tanker er rigtige? <br/><br/>

                                    </div>
                                    <div class="downbox">
                                        <a href="javascript:void(0)" class="button">LUK</a>
                                    </div>
                                </div>
                                <div class="roundbox">
                                    <i>icon</i>
                                </div>
                            </div>                        
                        </div>
                    </div>

                    <div class="MoveableContainer pos1 visNONE">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Negative tanker <a class="help help-pos1" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos1"></textarea>

                            <div class="tooltip-help-pos1 tooltip_TB_2"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="Vis i procent på en skala fra 0-100%, hvor meget du troede på tankerne, da de fór
                                 gennem hovedet på dig. Hvis du vil angive 0% kan du bare klikke NÆSTE." data-placement="left"></div>

                            <div class="EventSlider EventSliderRight" id="circnegtht" style="display: inline;"> 
                                <div class="slider-container" style="float:left">
                                    <input type="text" class="slider-percent" data-slider-min="0" data-slider-max="99"
                                           data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal"
                                           data-slider-selection="after" data-slider-tooltip="hide">
                                </div>
                                <div class="slider-indicator" id="negthtperc" style="display: inline; float:right; position:relative;">0%</div>
                            </div>

                            <div class="S1_NC_TBButtons visNONE">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos1')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep2(true)">NÆSTE</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos2 visNONE" style="width: 400px;">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Følelser og kropslige reaktioner <a class="help help-pos2" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos2"></textarea>

                            <div class="tooltip-help-pos2"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>Beskriv dine følelser og kropslige reaktioner i cirklen. Det kan være følelser som tristhed, vrede og nervøsitet.</p>
                                 <p>Vis følelsernes styrke på en skala fra 0-100%.</p>"  data-placement="left"></div>

                            <div class="EventSlider EventSliderRight" id="circresp" style="display: inline;">     
                                <div class="slider-container" style="float:left">
                                    <input type="text" class="slider-percent2" data-slider-min="0" data-slider-max="99"
                                           data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal"
                                           data-slider-selection="after" data-slider-tooltip="hide">
                                </div>
                                <div class="slider-indicator" id="sldindresp" style="display: inline; float:right; position:relative;">0%</div>
                            </div>

                            <div class="S1_NC_TBButtons">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos2')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep3(true)">NÆSTE</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos3 visNONE">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Adfærd<a class="help help-pos3" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos3"></textarea>

                            <div class="tooltip-help-pos3"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>Hvad gjorde du i situationen? Beskriv det kort.</p>
                                 <p>Klik i tekstfeltet for at begynde at skrive.</p>" data-placement="left"></div>

                            <div class="S1_NC_TBButtons">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos3')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep4(true)">NÆSTE</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos4 visNONE">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Alternative tanker<a class="help help-pos4" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos4"></textarea>

                            <div class="tooltip-help-pos4"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>Prøv at finde alternative tanker til dine negative tanker.</p>
                                 <p>Klik på det store spørgsmålstegn i cirklen og brug de spørgsmål der bliver vist, til at bekæmpe dine negative
                                 tanker.</p>" data-placement="left"></div>

                            <div class="EventSlider EventSliderRight" id="circalttht" style="display: inline;"> 
                                <div class="slider-container" style="float:left">
                                    <input type="text" class="slider-percent3" data-slider-min="0" data-slider-max="99"
                                           data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal"
                                           data-slider-selection="after" data-slider-tooltip="hide">
                                </div>
                                <div class="slider-indicator" id="sldalttht" style="display: inline; float:right; position:relative;">0%</div>
                            </div>

                            <div class="S1_NC_TBButtons">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos4')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStepEnd(true)">FÆRDIG</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos5 visNONE">
                        <div class="S1_NC_TB" style="border: 2px solid #0E0E0E; width: 221px;">
                            <div class="lftboxtxt">
                                Godt gået. Du har brudt den
                                negative cirkel med din alternative
                                tanke. Du kan nu gå videre
                                til næste kapittel. Denne øvelse
                                er nu blevet tilgængelig på dit
                                arbejdsbord. Den er inkluderet i
                                værktøjet Negative Automatiske
                                Tanker.
                            </div>

                            <div class="lftboxbtnctr">
                                <div class="lftboxbtn">FORTSÆT</div>
                            </div>

                        </div>
                    </div>

                </div>            

                <div class="complnegcir" style="display:none;"></div>

                <!-- Negative Circle end -->

                     
            
            <!-- TILFØJ NY - Negative Circle start-->

                <div class="tilf_negcircle" style="display:none;">

                    <div class="MoveableContainer pos0 visNONE">
                        <div id="S1_NC_TBSit">
                            <div class="TB-Header">Situation <a class="help help-pos0" data-toggle="tooltip" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild_Drk" name="textPos0"></textarea>

                            <div class="tooltip-help-pos0 tooltip_TB_1" data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>I hvilken situation havde du disse tanker? Beskriv situationen kort.</p>
                                 <p>Klik i tekstfeltet for at begynde at skrive.</p>"
                                 data-placement="left"></div>

                            <div class="S1_NC_TBButtons visNONE">
                                <a href="javascript:void(0)" class="NCB-close" onclick="delconfirm('pos0')">FORTRYD</a>
                                <a href="javascript:void(0)" class="NCB-tick-drk" onclick="nextStep6(true)">NÆSTE</a>
                            </div>
                        </div>

                        <div id="S1_NC_SitBottom"></div>
                    </div>

                    <div id="NC_BG">
                        <div class="Circle BC_BG_Stage0">
                            <a href="javascript:void(0)" class="qstnspot"></a>  
                            <div class="negative_circle" style="display:none;">
                                <div class="negative_box">
                                    <div class="topbox">
                                         Hvad taler for, at dine tanker er  <br/> rigtige?<br/><br/>
                                        Hvad taler imod, at dine tanker er rigtige? <br/><br/>
                                        Er der andre måder at forstå situationen på? <br/><br/>
                                        Hvordan vil du have set på 
                                        situationen, før du blev deprimeret? <br/><br/>
                                        Hvad ville din bedste ven tænke i den situation? <br/><br/>
                                        Hvilke konsekvenser har det, hvis dine tanker er rigtige? <br/><br/>
                                    </div>
                                    <div class="downbox">
                                        <a href="javascript:void(0)" class="button">LUK</a>
                                    </div>
                                </div>
                                <div class="roundbox">
                                    <i>icon</i>
                                </div>
                            </div>                        
                        </div>
                    </div>

                    <div class="MoveableContainer pos1 visNONE">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Negative tanker <a class="help help-pos1" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos1"></textarea>

                            <div class="tooltip-help-pos1 tooltip_TB_2"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="Vis i procent på en skala fra 0-100%, hvor meget du troede på tankerne, da de fór
                                 gennem hovedet på dig. Hvis du vil angive 0% kan du bare klikke NÆSTE." data-placement="left"></div>

                            <div class="EventSlider EventSliderRight" id="circnegtht" style="display: inline;"> 
                                <div class="slider-container" style="float:left">
                                    <input type="text" class="slider-percent4" data-slider-min="0" data-slider-max="99"
                                           data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal"
                                           data-slider-selection="after" data-slider-tooltip="hide">
                                </div>
                                <div class="slider-indicator" id="negthtperc4" style="display: inline; float:right; position:relative;">0%</div>
                            </div>

                            <div class="S1_NC_TBButtons visNONE">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos1')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep7(true)">NÆSTE</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos2 visNONE" style="width: 400px;">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Følelser og kropslige reaktioner <a class="help help-pos2" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos2"></textarea>

                            <div class="tooltip-help-pos2"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>Beskriv dine følelser og kropslige reaktioner i cirklen. Det kan være følelser som tristhed, vrede og nervøsitet.</p>
                                 <p>Vis følelsernes styrke på en skala fra 0-100%.</p>"  data-placement="left"></div>

                            <div class="EventSlider EventSliderRight" id="circresp" style="display: inline;">     
                                <div class="slider-container" style="float:left">
                                    <input type="text" class="slider-percent5" data-slider-min="0" data-slider-max="99"
                                           data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal"
                                           data-slider-selection="after" data-slider-tooltip="hide">
                                </div>
                                <div class="slider-indicator" id="sldindresp5" style="display: inline; float:right; position:relative;">0%</div>
                            </div>

                            <div class="S1_NC_TBButtons">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos2')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep8(true)">NÆSTE</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos3 visNONE">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Adfærd<a class="help help-pos3" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos3"></textarea>

                            <div class="tooltip-help-pos3"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>Hvad gjorde du i situationen? Beskriv det kort.</p>
                                 <p>Klik i tekstfeltet for at begynde at skrive.</p>" data-placement="left"></div>

                            <div class="S1_NC_TBButtons">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos3')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep9(true)">NÆSTE</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos4 visNONE">
                        <div class="S1_NC_TB">
                            <div class="NC-Header">Alternative tanker<a class="help help-pos4" href="javascript:void(0)"></a></div>
                            <textarea class="TextFeild" name="textPos4"></textarea>

                            <div class="tooltip-help-pos4"
                                 data-toggle="tooltip" data-html="true"
                                 data-original-title="<p>Prøv at finde alternative tanker til dine negative tanker.</p>
                                 <p>Klik på det store spørgsmålstegn i cirklen og brug de spørgsmål der bliver vist, til at bekæmpe dine negative
                                 tanker.</p>" data-placement="left"></div>

                            <div class="EventSlider EventSliderRight" id="circalttht" style="display: inline;"> 
                                <div class="slider-container" style="float:left">
                                    <input type="text" class="slider-percent6" data-slider-min="0" data-slider-max="99"
                                           data-slider-step="1" data-slider-value="0" data-slider-orientation="horizontal"
                                           data-slider-selection="after" data-slider-tooltip="hide">
                                </div>
                                <div class="slider-indicator" id="sldalttht6" style="display: inline; float:right; position:relative;">0%</div>
                            </div>

                            <div class="S1_NC_TBButtons">
                                <a href="javascript:void(0)" class="NCB-prev" onclick="delconfirm('pos4')">TILBAGE</a>
                                <a href="javascript:void(0)" class="NCB-tick" onclick="tlfnextStepEnd(true)">FÆRDIG</a>
                            </div>
                        </div>
                    </div>

                    <div class="MoveableContainer pos5 visNONE">
                        <div class="S1_NC_TB" style="border: 2px solid #0E0E0E; width: 221px;">
                            <div class="lftboxtxt">
                                Godt gået. Du har brudt den
                                negative cirkel med din alternative
                                tanke. Du kan nu gå videre
                                til næste kapittel. Denne øvelse
                                er nu blevet tilgængelig på dit
                                arbejdsbord. Den er inkluderet i
                                værktøjet Negative Automatiske
                                Tanker.
                            </div>

                            <div class="lftboxbtnctr">
                                <div class="lftboxbtn">FORTSÆT</div>
                            </div>

                        </div>
                    </div>

                </div> 

                <!-- TILFØJ NY - Negative Circle end -->

            </div> 

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div id="PE-HelpContentNATReg" class="popover bottom">
    <div class="title">Negative automatiske tanker</div>
    <p>Her kan du arbejde i dybden og udfordre nogle af de negative tanker du tidligere har registreret. 
       Du kan også arbejde med en helt ny negativ tanke. Klik på TILFØJ NY for at komme igang.</p>
    <p>Klik på ÅBN for at bruge redskabet.</p>
</div>

<div id="click_popOverBox" class="click_popOverBox_NC popover bottom">
    <p>Er du sikker på, at du vil slette denne seddel?</p>
    <div class="popOver_btn_nc">
        <button class="prevBtnNC" onclick="confirmCancel(this)">NEJ</button>
        <button class="nextBnNC" onclick="confirmOk(this)">JA</button>
    </div>
</div>

<script> 

    $('.nat_contant').hide();    
    $('.tilf_negcircle').hide();
    $('.pos5').hide();
    
    $('.pos0 .NCB-close').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
    $('.pos1 .NCB-prev').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
    $('.pos2 .NCB-prev').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
    $('.pos3 .NCB-prev').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
    $('.pos4 .NCB-prev').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });

    // modal help
    $('.q_Mark').popover({
        content: $('#PE-HelpContentNATReg').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });    

    $(document).ready(function() {
        //$('.tooltip-help-negcirtab').tooltip('show');
        //$('.tooltip').css('left',parseInt($('.tooltip').css('left')) + 130 + 'px');
        //$('.tooltip').css('top',parseInt($('.tooltip').css('top')) + 28 + 'px');
        
        $('.negcommentBox').show();

        $('.help-pos0').click(function() {
            $('.tooltip-help-pos0').tooltip('toggle');
        });
        $('.help-pos1').click(function() {
            $('.tooltip-help-pos1').tooltip('toggle');
        });
        $('.help-pos2').click(function() {
           $('.tooltip-help-pos2').tooltip('toggle');
        });
        $('.help-pos3').click(function() {
            $('.tooltip-help-pos3').tooltip('toggle');
        });
        $('.help-pos4').click(function() {
            $('.tooltip-help-pos4').tooltip('toggle');
        });
        // End Tooltip Help

        //Question mark drop down
        $('.qstnspot').click(function() {
            $('.negative_circle').toggle();
        });

        $('.roundbox').click(function() {
            $('.negative_circle').hide();
        });

        $('.downbox').click(function() {
            $('.negative_circle').hide();
            //$('.pos5').show();
        });

        $('.lftboxbtn').click(function() {
            $('#ModalNATWidget').modal('hide');
        });

    });

    $("li.active_2").mouseover(function() {
        $('.negcommentBox').hide();
    });

    $("li.active_2").mouseout(function() {
        $('.negcommentBox').hide();        
    });

    function negthtslisting() {
        $.ajax({
            url: "<?php echo $ROOT; ?>/window/nat/natnegthtlist",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {},
            success: function(data) {
                if (data.status == 'success') {
                    $('.popup_cenetr').html(data.usernthts);
                }
            }
        });
    }

    $('li.active_2').click(function() {
        $('.negcommentBox').hide();
        $('.complnegcir').hide();
        $('.negcircle').hide();

        if ($('.nat_contant').css('display') == 'none') {
            $('.nat_contant').show();
            negthtslisting();
        } else {
            $('.nat_contant').hide();
        }
    });
    
    function compNegcircle(negid) {
        $('.nat_contant').hide();
        $('.tilf_negcircle').hide();               
        
        $('#ModalNATWidget').modal('hide');

        setTimeout(function(){
           $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negcircleclone?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1&ngid='+negid, function () {                
                $('#ModalNATWidget').modal('show');
                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                });
            }) 
        }, 250);
    }

    // Steps
    function nextStep0(negid) {
        $('.tilf_negcircle').hide();
        $('.negcommentBox').hide();
        $('.nat_contant').hide();
        $('.complnegcir').hide();
        if ($('.negthtlist').css('display') == 'block') {
            $(".negthtlist").css('display', null);
        }
        $('.negcircle').show();
        $('.pos1').show();
        $('#circnegtht').show();
        $('.pos1 .S1_NC_TBButtons').hide();
        $('.pos1 textarea').attr('readonly', 'readonly');

        negativethtstep1(negid);

        $('.Circle').removeClass('BC_BG_Stage0').addClass('BC_BG_Stage1');
        
        setTimeout(function() {
            $('.pos0').show()
        }, 1000);

        $('.tooltip-help-pos0').tooltip('show');

        window.setTimeout(function() {
            $('.tooltip')
                    .css({'top': '25px', 'left': '-208.5px'});
            
            $('.tooltip').addClass('in');
        }, 0);
    }
    function nextStep1(save) {
      if( $('.pos0 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos0 .S1_NC_TBButtons').hide();
        $('.pos0 textarea').attr('readonly', 'readonly');
        $('.pos1 .S1_NC_TBButtons').show();
        $('#circnegtht').show();
        $('.tooltip-help-pos0').tooltip('hide');
        $('.tooltip-help-pos1').tooltip('show');
        if (save) {
            saveText(0, $('.pos0 textarea').val(), 0, 0);
        }
      }
    }
    function nextStep2(save) {
        if( $('.pos1 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos1 .S1_NC_TBButtons').hide();
        $('.pos1 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage0').addClass('BC_BG_Stage1');
        $('.Circle').removeClass('BC_BG_Stage1').addClass('BC_BG_Stage3');
        $('#circnegtht').show();
        $('.pos2').show();
        $('.tooltip-help-pos2').tooltip('show');
        if (save) {
            saveText(1, $('.pos1 textarea').val(), $('.slider-percent').val(), 0);
        }
       }
    }
    function nextStep3(save) {
       if( $('.pos2 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos2 .S1_NC_TBButtons').hide();
        $('.pos2 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage3').addClass('BC_BG_Stage5');
        $('.pos3').show();
        $('#circresp').show();
        $('.tooltip-help-pos2').tooltip('hide');
        $('.tooltip-help-pos3').tooltip('show');
        if (save) {
            saveText(2, $('.pos2 textarea').val(), $('.slider-percent2').val(), 0);
        }
       } 
    }
    function nextStep4(save) {
       if( $('.pos3 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos3 .S1_NC_TBButtons').hide();
        $('.pos3 textarea').attr('readonly', 'readonly');
        $('.tooltip-help-pos3').tooltip('hide');
        $('.Circle').removeClass('BC_BG_Stage5').addClass('BC_BG_Stage6');
        setTimeout(function() {
            $('.Circle').removeClass('BC_BG_Stage6').addClass('BC_BG_Stage7')
        }, 1000);
        setTimeout(function() {
            $('.qstnspot').show()
        }, 1100);
        setTimeout(function() {
            $('.pos4').show()
        }, 1300);
        setTimeout(function() {
            $('.tooltip-help-pos4').tooltip('show')
        }, 1500);
        
        $('#circalttht').show();
        if (save) {
            saveText(3, $('.pos3 textarea').val(), 0, 0);
        }
       } 
    }
    function nextStepEnd(save) {
       if( $('.pos4 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos4 .S1_NC_TBButtons').hide();
        $('.pos4 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage7').addClass('BC_BG_Stage8');
        $('.qstnspot').show();
        $('.pos5').show();
        if ($('.negative_circle').css('display') == 'block') {
            $('.negative_circle').hide();            
        }
        if (save) {
            saveText(4, $('.pos4 textarea').val(), $('.slider-percent3').val(), 0);
        }
       } 
    }
    
    // New negative thought
    
    function nextStep5() {
        
        // fix for - P0120-4
         $.ajax({
            url: "<?php echo $ROOT; ?>/window/nat/resetWidgetSession",
            type: 'GET',
            dataType: 'json',
            async: true,
            data: {},
            success: function(data) {
                if (data.status == 'success') {
                    console.log('sesion variable cleared');
                }
            }
        });
        // end 
        
        $('.negcommentBox').hide();
        $('.nat_contant').hide();
        $('.complnegcir').hide();
        if ($('.negthtlist').css('display') == 'block') {
            $(".negthtlist").css('display', null);
        }
        $('.tilf_negcircle').show();
        $('.pos0').show();
        $('#circnegtht').show(); 

        $('.tooltip-help-pos0').tooltip('show');

        window.setTimeout(function() {
            $('.tooltip').css({'top': '25px', 'left': '-208.5px'});            
            $('.tooltip').addClass('in');
        }, 0);
    }
    
    function nextStep6(save) {
      if( $('.tilf_negcircle .pos0 textarea').val() !=''){ 
        $('.negcommentBox').hide();
        $('.pos0 .S1_NC_TBButtons').hide();
        $('.pos0 textarea').attr('readonly', 'readonly');
        $('.pos1').show();
        $('.pos1 .S1_NC_TBButtons').show();
        $('#circnegtht').show();
        $('.tooltip-help-pos0').tooltip('hide');
        $('.tooltip-help-pos1').tooltip('show');
        if (save) {
            saveText(0, $('.tilf_negcircle .pos0 textarea').val(), 0, 1);
        }
      }
    }
    
    function nextStep7(save) {
        if( $('.tilf_negcircle .pos1 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos1 .S1_NC_TBButtons').hide();
        $('.pos1 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage0').addClass('BC_BG_Stage1');
        $('.Circle').removeClass('BC_BG_Stage1').addClass('BC_BG_Stage3');
        $('#circnegtht').show();
        $('.pos2').show();
        $('.tooltip-help-pos2').tooltip('show');
        if (save) {
            saveText(1, $('.tilf_negcircle .pos1 textarea').val(), $('.slider-percent4').val(), 1);
        }
       }
    }
    function nextStep8(save) {
       if( $('.tilf_negcircle .pos2 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos2 .S1_NC_TBButtons').hide();
        $('.pos2 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage3').addClass('BC_BG_Stage5');
        $('.pos3').show();
        $('#circresp').show();
        $('.tooltip-help-pos2').tooltip('hide');
        $('.tooltip-help-pos3').tooltip('show');
        if (save) {
            saveText(2, $('.tilf_negcircle .pos2 textarea').val(), $('.slider-percent5').val(), 1);
        }
       } 
    }
    function nextStep9(save) {
       if( $('.tilf_negcircle .pos3 textarea').val() !=''){
        $('.negcommentBox').hide();
        $('.pos3 .S1_NC_TBButtons').hide();
        $('.pos3 textarea').attr('readonly', 'readonly');
        $('.tooltip-help-pos3').tooltip('hide');
        $('.Circle').removeClass('BC_BG_Stage5').addClass('BC_BG_Stage6');
        setTimeout(function() {
            $('.Circle').removeClass('BC_BG_Stage6').addClass('BC_BG_Stage7')
        }, 1000);
        setTimeout(function() {
            $('.pos4').show()
        }, 1300);
        setTimeout(function() {
            $('.tooltip-help-pos4').tooltip('show')
        }, 1500);
        setTimeout(function() {
            $('.qstnspot').show()
        }, 1100);
        $('#circalttht').show();
        if (save) {
            saveText(3, $('.tilf_negcircle .pos3 textarea').val(), 0, 1);
        }
       } 
    }
    function tlfnextStepEnd(save) {
        if( $('.tilf_negcircle .pos4 textarea').val() !=''){
            $('.negcommentBox').hide();
            $('.pos4 .S1_NC_TBButtons').hide();
            $('.pos4 textarea').attr('readonly', 'readonly');
            $('.Circle').removeClass('BC_BG_Stage7').addClass('BC_BG_Stage8');
            $('.qstnspot').show();
            $('.pos5').show();
            if ($('.negative_circle').css('display') == 'block') {
                $('.negative_circle').hide();                
            }
            
            if (save) {
                saveText(4, $('.tilf_negcircle .pos4 textarea').val(), $('.slider-percent6').val(), 1);
            }
       } 
    }
    // End Steps

    function saveText(step, text, slider_val, newnegtht) { 
        $('.negcommentBox').hide();
        $.ajax({
            url: "<?php echo $ROOT; ?>/window/nat/negcircle/save",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {step: step, text: text, slider_val: slider_val, newnegtht: newnegtht},
            success: function(data) {
                if (data.status == 'success') {
                    console.log('step saved');
                }
            }
        });
    }

    function negativethtstep1(negid) {
        $('.negcommentBox').hide();
        $.ajax({
            url: "<?php echo $ROOT; ?>/window/nat/getnegthought",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {
                negid: negid
            },
            success: function(data) {
                if (data.status == "success") {
                    $('.pos1 textarea').val(data.txtdata);
                }
            }
        });
    }

    // Common methods
    $('textarea').focusin(function() {
        remPopover();
        $('.negcommentBox').hide();
        $('.tooltip-help-pos1').tooltip('hide');
        $('.tooltip-help-pos4').tooltip('hide');
        if (!$(this).attr('readonly'))
            $(this).parent().children('.S1_NC_TBButtons').show();
                 
        if($(this).attr('name') == 'textPos0'){
            $(this).keypress(function(event) {
                $('.pos0 .NCB-tick-drk').addClass('NCB-tick-drk-act');
            });
        } 
        if($(this).attr('name') == 'textPos1'){
            $(this).keypress(function(event) {
                $('.pos1 .NCB-tick').addClass('NCB-tick-act');
            });
        } 
        if($(this).attr('name') == 'textPos2'){
            $(this).keypress(function(event) {
                $('.pos2 .NCB-tick').addClass('NCB-tick-act');
            });
        } 
        if($(this).attr('name') == 'textPos3'){
            $(this).keypress(function(event) {
                $('.pos3 .NCB-tick').addClass('NCB-tick-act');
            });
        } 
        if($(this).attr('name') == 'textPos4'){
            $(this).keypress(function(event) {
                $('.pos4 .NCB-tick').addClass('NCB-tick-act');
            });
        } 
    });

    /*$('.NCB-close').click(function() {
        $(this).parent().parent().children('.TextFeild_Drk').val('');
        $(this).parent().parent().children('.TextFeild').val('');
        $(this).parent().hide();
    });*/

    // create & show slider
    $('.slider-percent').slider().on('slide', function(ev) {
        var type = $(this).parentsUntil(".EventLayout", ".EventSlider");
        var sldperc = ev.value;
        if(sldperc == 99){
            sldperc = 100;
        }
        $('#negthtperc').html(sldperc + '%');
    });

    $('.slider-percent2').slider().on('slide', function(ev) {
        var type = $(this).parentsUntil(".EventLayout", ".EventSlider");
        var sldperc = ev.value;
        if(sldperc == 99){
            sldperc = 100;
        }
        $('#sldindresp').html(sldperc + '%');
    });

    $('.slider-percent3').slider().on('slide', function(ev) {
        var type = $(this).parentsUntil(".EventLayout", ".EventSlider");
        var sldperc = ev.value;
        if(sldperc == 99){
            sldperc = 100;
        }
        $('#sldalttht').html(sldperc + '%');
    });  
    
    $('.slider-percent4').slider().on('slide', function(ev) {
        var type = $(this).parentsUntil(".EventLayout", ".EventSlider");
        var sldperc = ev.value;
        if(sldperc == 99){
            sldperc = 100;
        }
        $('#negthtperc4').html(sldperc + '%');
    });

    $('.slider-percent5').slider().on('slide', function(ev) {
        var type = $(this).parentsUntil(".EventLayout", ".EventSlider");
        var sldperc = ev.value;
        if(sldperc == 99){
            sldperc = 100;
        }
        $('#sldindresp5').html(sldperc + '%');
    });

    $('.slider-percent6').slider().on('slide', function(ev) {
        var type = $(this).parentsUntil(".EventLayout", ".EventSlider");
        var sldperc = ev.value;
        if(sldperc == 99){
            sldperc = 100;
        }
        $('#sldalttht6').html(sldperc + '%');
    });  

</script>

</div>

<script>
    $(document).ready(function() {

        /*$('.addnewnegtht').click(function() {
            $('.natnegcircl').hide();
            $('.modal-content').animate({width: '900px', height: '625px'}, 100);
            $('.newnatreg').show();
        });*/
        
        $('.addnewnegtht').click(function() {
            nextStep5();
        });
        
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
    
    function delconfirm(pcls){            
        $('#natneghide').val('');
        $('#natneghide').val(pcls);

        $('.'+pcls+' .NCB-close').popover({
            content: $('#click_popOverBox').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        }); 
        
        $('.'+pcls+' .NCB-prev').popover({
            content: $('#click_popOverBox').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
    }
    
    function confirmCancel(){        
        remPopover();
    }
    
    function confirmOk(){ 
        var natbxcls = $('#natneghide').val();
        
        if(natbxcls == 'pos0'){
            $('.pos0 .TextFeild_Drk').val('');
            $('.pos0 .S1_NC_TBButtons').hide();
        }
        if(natbxcls == 'pos1'){
            //$('.pos1 .TextFeild').val('');
            $('.pos0 .TextFeild_Drk').removeAttr('readonly');
            $('.pos0 .TextFeild_Drk').focus();
            $('.pos0 .S1_NC_TBButtons').show();
            $('.pos1 .S1_NC_TBButtons').hide();
        }
        if(natbxcls == 'pos2'){
            $('.pos2 .TextFeild').val('');
            $('.pos2 .S1_NC_TBButtons').hide();
            $('.pos1 .TextFeild').removeAttr('readonly');
            $('.pos1 .TextFeild').focus();
            $('.pos1 .S1_NC_TBButtons').show();            
        }
        if(natbxcls == 'pos3'){
            $('.pos3 .TextFeild').val('');
            $('.pos3 .S1_NC_TBButtons').hide();
            $('.pos2 .TextFeild').removeAttr('readonly');
            $('.pos2 .TextFeild').focus();
            $('.pos2 .S1_NC_TBButtons').show();
        }
        if(natbxcls == 'pos4'){
            $('.pos4 .TextFeild').val('');
            $('.pos4 .S1_NC_TBButtons').hide();
            $('.pos3 .TextFeild').removeAttr('readonly');
            $('.pos3 .TextFeild').focus();
            $('.pos3 .S1_NC_TBButtons').show();
        }
    }
    
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
