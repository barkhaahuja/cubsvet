<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/calendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/calf.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/depressive.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/assets/js/calf.js" /></script>
<script src="<?php echo $ROOT; ?>/assets/js/depressive.js" /></script>

<!-- Modal -->
<div class="modal fade" id="ModalDepressiveWidget1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1200px;">
        <div class="modal-content shadow window" id="container" style="height: 800px;">
            <div class="PE-HeaderBar"> 


                <div id="nrtab">
                    <ul>
                        <li id="selected" style="border-bottom: 3px solid #8ED2CC; height: 20px;margin-left: -9px;margin-top: -10px;padding: 10px;">

                            Depressive grublerier

                        </li>
                    </ul>
                </div>
                <div id="nrtab">
                    <ul>
                        <li>

                        </li>
                    </ul>
                </div>
                <div id="nrtab">
                    <ul>
                        <li>

                        </li>
                    </ul>
                </div>
                Depressive grublerier
                <a href="javascript:void(0)" class="PE-help btn" data-toggle="popover"></a>
                <a href="javascript:void(0)" class="close" data-dismiss="modal"aria-hidden="true"></a>
            </div>
            <div class="DropShaddowDOWN"></div>
            <input type="hidden" id="cid" value="">
            <input type="hidden" id="m9_event" value="">
            <input type="hidden" id="m10_event" value="">

            <div style="margin-top: 10px; height:730px; float:left; overflow-x: hidden; overflow-y: auto; width:100%; display:block;" id="fullcontent">

                 <input type="hidden" id="elmblk" name="elmblk" value="" />
                <input type="hidden" id="elmbtnblk" name="elmbtnblk" value="" />
                <input type="hidden" id="elmctblk" name="elmctblk" value="" />
                <input type="hidden" id="elmntblk" name="elmntblk" value="" />

                <div class="wrapper">

                    <div class="lefttopBox" id="sl1" style="display:none;">
                        <div class="left_BoxArrow"></div>
                        <h3>Hvad udløste grublerierne?</h3>
                        <div class="gwd-div-p1hc gwd-div-3m2s tablocksl1" id="TextareaOne">
                            <textarea id="txtsl1" style="width: 196px;" class="gwd-textarea-inzt" onclick="switchbblock('slb1', 'tablocksl1', 1)" onkeypress="actmod('sml1')"></textarea>
                        </div>
                        <div class="small_btn" id="slb1" style="display:none;">
                            <div class="leftbox tb_bg_prev">
                                <a class="TB-PREV slb1" href="javascript:void(0)" data-block="sl1" data-bblock="slb1" data-ctblock="txtsml1" data-ntblock="txtsm1">TILBAGE</a>
                            </div>

                            <div class="rightbox tb_bg_nxt active_leftBtn">
                                <a class="TB-NEXT" href="javascript:void(0)" data-block="sl1" data-tarea="txtsl1"  data-bblock="slb1" data-fld="l1" data-nxt="sm2" data-hbox="txtsm2l">NÆSTE</a>

                            </div>
                        </div>
                    </div>
                    <div class="topareaBox" id="sm1">
                        <div id="mainbtmcontainer" class="topBox">
                            <h3>Situation hvor du grublede</h3>
                            <div class="gwd-div-p1hc-top gwd-div-3m2s  tablocksm1" id="textareatop">
                                <textarea id="txtsm1" style="width: 196px; background-color: none; " class="gwd-textarea-inzt" onclick="switchbblock('smb1', 'tablocksm1', 2)" onkeypress="actmod1('sm1')"></textarea>
                            </div>
                            <div class="small_btn centerBtn top_changeBtn" id="smb1" style="display:none;">
                                <button id="leftBtn" style="background-color:#8ED2CC;" data-block="sm1"  data-bblock="smb1"   class="TB-PREV smb1" data-ctblock="txtsm1" data-ntblock="txtsm1">TILBAGE</button>
                                <button id="rightBtn" data-block="sm1" data-tarea="txtsm1"  data-bblock="smb1" data-fld="m1" data-nxt="sl1" data-hbox="txtsl1" class="TB-NEXT active_nextBtn sm1">NÆSTE</button>
                            </div>
                        </div>
                    </div>

                    <div class="gwd-div-khzu"  id="sm2" style="display:none;">

                        <div class="gwd-div-k3i2 gwd-div-k9px" id="Topdot"></div>
                        <div class="gwd-div-eua4">
                            <div id="mainleftBox">
                                <div class="gwd-div-jywx gwd-div-ok2g gwd-div-mainboxLeft">
                                    <div id="leftimage"></div>
                                </div>
                                <div class="gwd-div-fbur" id="Leftbox">
                                    <h3>Indledende negative tanker</h3>
                                    <div class="gwd-div-p1hc gwd-div-3m2s  tablocksm2l" id="Textarea">
                                        <textarea id="txtsm2l" style="width: 196px;" class="gwd-textarea-inzt" onclick="switchbblock('smb2l', 'tablocksm2l', 1)" onkeypress="actmod('sm2l')"></textarea>
                                    </div>
                                    <div class="small_btn" id="smb2l" style="display:none;">
                                        <button id="leftBtn" data-block="sm2l"  data-bblock="smb2l"   class="TB-PREV smb2l" data-ctblock="txtsm2l" data-ntblock="txtsl1">TILBAGE</button>
                                        <button id="rightBtn"  data-block="sm2l" data-tarea="txtsm2l"  data-bblock="smb2l" data-fld="m2l" data-nxt="sm2" data-hbox="txtsm2r" class="TB-NEXT active_nextBtn sm2l">NÆSTE</button>
                                    </div>
                                </div>
                            </div>
                            <div id="mainrightBox">
                                <div class="gwd-div-2qyr" id="Rightbox">
                                    <h3>Efterfølgende tanker</h3>
                                    <div class="gwd-div-p1hc gwd-div-3m2s  tablocksm2r" id="Textarea">
                                        <textarea id="txtsm2r" style="height: 126px; width: 196px;" class="gwd-textarea-inzt" onclick="switchbblock('smb2r', 'tablocksm2r', 1)" onkeypress="actmod('sm2r')"></textarea>
                                    </div>
                                    <div class="small_btn" id="smb2r" style="display:none;">
                                        <button id="leftBtn" data-block="sm2r"  data-bblock="smb2r"   class="TB-PREV smb2r" data-ctblock="txtsm2r" data-ntblock="txtsm2l">TILBAGE</button>
                                        <button id="rightBtn"  data-block="sm2r" data-tarea="txtsm2r"  data-bblock="smb2r" data-fld="m2r" data-nxt="sm3" data-hbox="txtsm3" class="TB-NEXT active_nextBtn sm2r">NÆSTE</button>
                                    </div>
                                </div>
                                <div class="gwd-div-dl8y">
                                    <div id="rightimage"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nextArea" id="sm3" style="display:none;">
                        <div class="gwd-div-calt bottomBox" id="mainbtmcontainer">
                            <div class="gwd-div-k3i2 gwd-div-k9px gwd-div-gd58" id="Topdot_1"></div>
                            <div class="gwd-div-epbp">

                                <div class="singleLeft gwd-div-jywx gwd-div-c7si gwd-div-leftBox"></div>
                                <div class="singleRight">
                                    <h3>Følelser mens du grublede</h3>
                                    <div class="gwd-div-p1hc-rep gwd-div-j1q7 gwd_popupBox tablocksm3" id="Textarea_5">
                                        <textarea id="txtsm3" style=" height: 120px; width: 196px;" class="gwd-textarea-swya" onclick="switchbblock('smb3', 'tablocksm3', 1)" onkeypress="actmod('sm3')"></textarea>
                                    </div>
                                    <div class="small_btn_rep" id="smb3" style="display:none;">
                                        <button id="leftBtn" data-block="sm3"  data-bblock="smb3"   class="TB-PREV smb3" data-ctblock="txtsm3" data-ntblock="txtsm2r">TILBAGE</button>
                                        <button id="rightBtn"  data-block="sm3" data-tarea="txtsm3"  data-bblock="smb3" data-fld="m3" data-nxt="sm4" data-hbox="txtsm4" class="TB-NEXT active_nextBtn sm3">NÆSTE</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="nextArea" id="sm4" style="display:none;">
                        <div class="gwd-div-calt bottomBox" id="mainbtmcontainer">
                            <div class="gwd-div-k3i2 gwd-div-k9px gwd-div-gd58" id="Topdot_1"></div>
                            <div class="gwd-div-epbp">

                                <div class="singleLeft gwd-div-jywx gwd-div-c7si gwd-div-leftBox4"></div>
                                <div class="singleRight">
                                    <h3>Handlinger</h3>
                                    <div class="gwd-div-p1hc-rep gwd-div-j1q7 gwd_popupBox2 tablocksm4" id="Textarea_5">
                                        <textarea id="txtsm4" style=" height: 120px; width: 196px;" class="gwd-textarea-swya" onclick="switchbblock('smb4', 'tablocksm4', 1)" onkeypress="actmod('sm4')"></textarea>
                                    </div>
                                    <div class="small_btn_rep" id="smb4" style="display:none;">
                                        <button id="leftBtn" data-block="sm4"  data-bblock="smb4"   class="TB-PREV smb4" data-ctblock="txtsm4" data-ntblock="txtsm3">TILBAGE</button>
                                        <button id="rightBtn"  data-block="sm4" data-tarea="txtsm4"  data-bblock="smb4" data-fld="m4" data-nxt="sm5" data-hbox="txtsm5l" class="TB-NEXT active_nextBtn sm4">NÆSTE</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="gwd-div-khzu" id="sm5" style="display:none;">

                        <div class="gwd-div-k3i2 gwd-div-k9px" id="Topdot"></div>
                        <div class="gwd-div-eua4">
                            <div id="mainleftBox">
                                <div class="gwd-div-jywx gwd-div-ok2g gwd-div-mainboxLeft">
                                    <div id="leftimage5"></div>
                                </div>
                                <div class="gwd-div-fbur" id="Leftbox">
                                    <h3>Fordele ved at gruble</h3>
                                    <div class="gwd-div-p1hc gwd-div-3m2s tablocksm5l" id="Textarea">
                                        <textarea id="txtsm5l" style="  width: 196px;" class="gwd-textarea-inzt" onclick="switchbblock('smb5l', 'tablocksm5l', 1)" onkeypress="actmod('sm5l')"></textarea>
                                    </div>
                                    <div class="small_btn" id="smb5l" style="display:none;">
                                        <button id="leftBtn" data-block="sm5l"  data-bblock="smb5l"   class="TB-PREV smb5l" data-ctblock="txtsm5l" data-ntblock="txtsm4">TILBAGE</button>
                                        <button id="rightBtn"  data-block="sm5l" data-tarea="txtsm5l"  data-bblock="smb5l" data-fld="m5l" data-nxt="sm5" data-hbox="txtsm5r" class="TB-NEXT sm5l active_nextBtn">NÆSTE</button>
                                    </div>
                                </div>
                            </div>
                            <div id="mainrightBox">
                                <div class="gwd-div-2qyr" id="Rightbox">
                                    <h3>Ulemper ved at gruble</h3>
                                    <div class="gwd-div-p1hc gwd-div-3m2s tablocksm5r" id="Textarea">
                                        <textarea id="txtsm5r" style=" height: 126px; width: 196px;" class="gwd-textarea-inzt" onclick="switchbblock('smb5r', 'tablocksm5r', 1)" onkeypress="actmod('sm5r')"></textarea>
                                    </div>
                                    <div class="small_btn" id="smb5r" style="display:none;">
                                        <button id="leftBtn" data-block="sm5r"  data-bblock="smb5r"   class="TB-PREV smb5r" data-ctblock="txtsm5r" data-ntblock="txtsm5l">TILBAGE</button>
                                        <button id="rightBtn"  data-block="sm5r" data-tarea="txtsm5r"  data-bblock="smb5r" data-fld="m5r" data-nxt="sm6" data-hbox="txtsm6" class="TB-NEXT sm5r active_nextBtn">NÆSTE</button>
                                    </div>
                                </div>
                                <div class="gwd-div-dl8y">
                                    <div id="rightimage5"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nextArea" id="sm6" style="display:none;">
                        <div class="gwd-div-calt bottomBox" id="mainbtmcontainer">
                            <div class="gwd-div-k3i2 gwd-div-k9px gwd-div-gd58" id="Topdot_1"></div>
                            <div class="gwd-div-epbp">

                                <div class="singleLeft gwd-div-jywx gwd-div-c7si gwd-div-leftBox6"></div>
                                <div class="singleRight">
                                    <h3>Hvordan sluttede grublerierne?</h3>
                                    <div class="gwd-div-p1hc-rep gwd-div-j1q7 gwd_popupBox3 tablocksm6" id="Textarea_5">
                                        <textarea id="txtsm6" style=" height: 120px; width: 196px;" class="gwd-textarea-swya" onclick="switchbblock('smb6', 'tablocksm6', 1)" onkeypress="actmod('sm6')"></textarea>
                                    </div>
                                    <div class="small_btn_rep" id="smb6" style="display:none;">
                                        <button id="leftBtn" data-block="sm6"  data-bblock="smb6"   class="TB-PREV smb6" data-ctblock="txtsm6" data-ntblock="txtsm5r">TILBAGE</button>
                                        <button id="rightBtn"  data-block="sm6" data-tarea="txtsm6"  data-bblock="smb6" data-fld="m6" data-nxt="sm7"  class="TB-NEXT active_nextBtn sm6">NÆSTE</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="nextArea" id="sm7" style="display:none;">
                        <div class="gwd-div-calt bottomBox" id="mainbtmcontainer">
                            <div class="gwd-div-k3i2 gwd-div-k9px gwd-div-gd58" id="Topdot_1"></div>
                            <div class="gwd-div-epbp-confirm" style="background-color:#8ED2CC; padding: 10px; color:white; height:130px;">
                                <p align="center">
                                    <input type="hidden" id="txtsm7" value="0">
                                    Kunne du have gjort noget for at afslutte grublerierne tidligere?
                                </p>
                                <p>
                                <div class="small_btn_check" style="position:relative; top:44px;" id="smb7">
                                    <button id="leftBtn1"  data-block="sm7" data-tarea="txtsm7"  data-bblock="smb7" data-fld="m7" data-nxt="sm8" data-hbox="txtsm8" data-value="1" class="TB-NEXT">JA</button>
                                    <button id="rightBtn1" data-block="sm7" data-tarea="txtsm7"  data-bblock="smb7" data-fld="m7" data-nxt="sm8e" data-value="2" class="TB-NEXT">NEJ</button>
                                </div>
                                </p>

                            </div>

                        </div>
                    </div>

                    <div class="nextArea" id="sm8e" style="display:none;">
                        <div class="gwd-div-calt bottomBox" id="mainbtmcontainer">
                            <div class="gwd-div-k3i2 gwd-div-k9px gwd-div-gd58" id="Topdot_1"></div>
                            <div class="gwd-div-epbp-confirm" style="background-color:#8ED2CC; padding: 10px; color:white; height:auto;">
                                <p align="center">
                                    Det er helt ok. Det er meget vanskligt at standse grublerier, når de er i gang. Prøv at svare JA alligevel og skriv noget, som du ønsker du kunne have gjort. Er det fuldstændig umuligt, så skriv ”Det ved jeg ikke” og fortsæt med øvelsen alligevel. Så vil du blive præsenteret for 3 redskaber, som kan hjælpe med grublerier.<br>
                                   
                                </p>


                            </div>

                        </div>
                    </div>

                    <div class="nextArea" id="sm8" style="display:none;">
                        <div class="gwd-div-calt bottomBox" id="mainbtmcontainer">
                            <div class="gwd-div-k3i2 gwd-div-k9px gwd-div-gd58" id="Topdot_1"></div>
                            <div class="gwd-div-epbp">

                                <div class="singleLeft gwd-div-jywx gwd-div-c7si gwd-div-leftBox8"></div>
                                <div class="singleRight">
                                    <h3>Hvad kunne du have gjort?</h3>
                                    <div class="gwd-div-p1hc-rep gwd-div-j1q7 gwd_popupBox4 tablocksm8" id="Textarea_5">
                                        <textarea id="txtsm8" style=" height: 120px; width: 196px;" class="gwd-textarea-swya" onclick="switchbblock('smb8', 'tablocksm8', 1)" onkeypress="actmod('sm8')"></textarea>
                                    </div>
                                    <div class="small_btn_rep" id="smb8" style="display:none;">
                                        <button id="leftBtn" data-block="sm8"  data-bblock="smb8"   class="TB-PREV smb8" data-ctblock="txtsm8" data-ntblock="">TILBAGE</button>
                                        <button id="rightBtn" data-block="sm8" data-tarea="txtsm8"  data-bblock="smb8" data-fld="m8" data-nxt="tbox" class="TB-NEXT active_nextBtn sm8">NÆSTE</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="maincontiner" id="sm9e" style="display:block;">
                        <div class="center_wrapper">
                            <div class="trianglemaindiv">
                                <div class="rectanglebox">
                                    <div class="image">
                                        <h4>Afledende Aktiviteter</h4>
                                    </div>
                                </div>
                                <div class="right-triangle_1" id="righttriangle"></div>
                            </div>
                            <div class="sndtrianglemaindiv_1">
                                <div class="sndrectanglebox sndrectangle_center">
                                    <div class="tangleImage">
                                        <div class="calenderredbox1">
                                            <h3 class="textdiv">Aftale</h3> 
                                            <div class="cle_top"></div>
                                            <div class="cle_bottom" id="eventdate1">
                                                <h2>?</h2>
                                                <span>Hvornår</span>
                                            </div>
                                        </div>
                                        <p class="textdiv2">Har du udført udfordringen?</p>
                                        <div class="small_btn" id="smb9a">
                                            <button class="leftBtn cen_leftBtn" id="e_complete" readonly>JA</button>
                                            <button class="rightBtn cen_rightBtn" readonly>NEJ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sndtrianglemaindiv_2">
                                <div class="sndrectanglebox_2">
                                    <h3>Afledende Aktiviteter</h3>
                                    <div class="gwd-div-p1hc gwd-div-3m2s" id="Textarea">
                                        <textarea id="txtsm9" style="background-color: rgb(235, 240, 240); height: 126px; width: 196px;" class="gwd-textarea-inzt" readonly></textarea>
                                    </div>
                                    <div class="small_btn" id="smb9b" style="display:none;">
                                        <button id="leftBtn right_leftBtn" class="TB-PREV smb9b" data-block="sm9e"  data-bblock="smb9b" data-ctblock="txtsm9" data-ntblock="">TILBAGE</button>
                                        <button id="rightBtn right_rightBtn" data-block="sm9e" data-tarea="txtsm9"  data-bblock="smb9b" data-fld="m9" data-nxt="sm9e" class="TB-NEXT">NÆSTE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="maincontiner" style="display:block;" id="sm10">
                        <div class="cont_wrapper">
                            <div class="trianglemaindiv">
                                <div class="rectanglebox">
                                    <div class="image10">
                                        <h4>Problemløsning</h4>
                                    </div>
                                </div>
                                <div class="right-triangle" id="righttriangle"></div>
                            </div>
                            <div class="sndtrianglemaindiv">
                                <div class="sndrectanglebox">
                                    <div class="calenderredbox">
                                        <h3 class="textdiv">Aftale</h3> 
                                        <div class="cle_top"></div>
                                        <div class="cle_bottom" id="eventdate10">
                                            <h2>?</h2>
                                            <span>Hvornår</span>
                                        </div>
                                    </div>
                                    <p class="textdiv2"></p>
                                    <div class="small_btn" id="calbut10">
                                        <p>
                                            <a id="ButtonCalendar" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme" style="background-color:gainsboro; color:black; font-size: 15px;" onclick="loadcalendar()">ABN KALENDER</a>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="maincontiner" id="sm10e" style="display:none;">
                        <div class="center_wrapper">
                            <div class="trianglemaindiv">
                                <div class="rectanglebox">
                                    <div class="image10">
                                        <h4>Problemløsning</h4>
                                    </div>
                                </div>
                                <div class="right-triangle_1" id="righttriangle"></div>
                            </div>
                            <div class="sndtrianglemaindiv_1">
                                <div class="sndrectanglebox sndrectangle_center">
                                    <div class="tangleImage">
                                        <div class="calenderredbox1">
                                            <h3 class="textdiv">Aftale</h3> 
                                            <div class="cle_top"></div>
                                            <div class="cle_bottom" id="eventdate110">
                                                <h2>?</h2>
                                                <span>Hvornår</span>
                                            </div>
                                        </div>
                                        <p class="textdiv2">Har du udført udfordringen?</p>
                                        <div class="small_btn" id="smb10a">
                                            <button class="leftBtn cen_leftBtn" id="e_complete10">JA</button>
                                            <button class="rightBtn cen_rightBtn" id="e_ncomplete10">NEJ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sndtrianglemaindiv_2">
                                <div class="sndrectanglebox_2">
                                    <h3>Problemløsning</h3>
                                    <div class="gwd-div-p1hc gwd-div-3m2s" id="Textarea">
                                        <textarea id="txtsm10" style="background-color: rgb(235, 240, 240); height: 126px; width: 196px;" class="gwd-textarea-inzt" onclick="switchbblock('smb10b')"></textarea>
                                    </div>
                                    <div class="small_btn" id="smb10b" style="display:none;">
                                        <button id="leftBtn right_leftBtn" onclick="clearlb('smb11b')" class="TB-PREV smb11b">TILBAGE</button>
                                        <button id="rightBtn right_rightBtn" data-block="sm10e" data-tarea="txtsm10"  data-bblock="smb10b" data-fld="m10" data-nxt="tbox" class="TB-NEXT">NÆSTE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="nextArea" id="tbox" style="display:none;">
                        <div class="gwd-div-calt bottomBox" id="mainbtmcontainer">

                            <div class="gwd-div-epbp-confirm" style="background-color:#ffffff; padding: 10px; color:#8ED2CC; height:130px; border:0px; border-color: white;">
                                <p align="center">
                                    Vælg et værktøj
                                    <br>
                                    <img src="<?php echo $ROOT; ?>/assets/img/tool_image.png" />

                                </p>

                                <div id="nthoughts" style="float:left; display:block;">
                                    <div style="margin-top: -15px;position: relative; left:161px;">
                                        <img src="<?php echo $ROOT; ?>/assets/img/commentPeak_topDRK.png" >
                                    </div>

                                    <div id="innerlistblock" style="height: auto; width:250px;  background-color: black; position:relative; left:44px;">

                                        <div  id="thoughts1" class="thoughts">
                                            <a href="#" class="thoughts" data-id="m9" data-text="m9" data-dismiss="modal" style="text-decoration:none;">Afledende aktiviteter</a>

                                        </div>
                                        <div class="thoughts" id="thoughts2" >
                                            <a href="#" class="thoughts" data-id="m10" data-text="m10" data-dismiss="modal" style="text-decoration:none;">Problemløsning</a>

                                        </div>
                                        <div class="thoughts" id="thoughts3" style="background-color: #8ED2CC;">
                                            <a href="#" class="thoughts" data-id="m11" data-text="m11" data-dismiss="modal" style="text-decoration:none;background-color: #8ED2CC;">Grubletid</a>

                                        </div>

                                    </div>




                                </div>


                            </div>

                        </div>
                    </div>


                    <div id="natexit" style="display:none;">
                        <p>  Du har nu lavet en aftale med dig
                            selv om, hvornår du vil afprøve din
                            udfordring.
                            Du skal nu forlade trinnet og vil blive
                            spurgt om du har afprøvet din
                            udfordring, når det pågældene
                            tidspunkt er passeret.
                            Du kan ændre din aftale fra din
                            aktivitetskalender på arbejdsbordet.


                        </p>

                        <p style="text-align: center;">

                            <input type="button" value="OK" name="cls" onclick="levexit()">

                        </p>

                    </div>





                </div>




            </div>



            <div id="tooltip-help-sm1" class="popover bottom">

                <p>
                    Du skal finde en nylig<br>
                    situation, hvor du har<br>
                    oplevet, at du grubler<br>
                    meget over et bestemt<br>
                    tema uden at det løser<br>
                    problemet.<br>
                    Hvilken situation var det?
                </p>
            </div>
            <div id="tooltip-help-sl1" class="popover bottom">

                <p>
                    Hvad var det, der<br>
                    udløste dine<br>
                    grublerier?
                </p>
            </div>
            <div id="tooltip-help-sm2l" class="popover bottom">

                <p>
                    Hvilken negativ<br>
                    tanke havde du<br>
                    indledningsvis?
                </p>
            </div>
            <div id="tooltip-help-sm2r" class="popover bottom">

                <p>
                    Hvilken negativ<br>
                    tanke havde du<br>
                    efterfølgende?
                </p>
            </div>
            <div id="tooltip-help-sm3" class="popover bottom">

                <p>
                    Hvad skete der med dine<br>
                    følelser undervejs?<br>
                    Beskriv dine følelser og<br>
                    kropslige reaktioner i<br>
                    situationen. Det kan være<br>
                    følelser, som tristhed,<br>
                    vrede og nervøsitet.



                </p>
            </div>
            <div id="tooltip-help-sm4" class="popover bottom">

                <p>
                    Hvordan påvirkede<br>
                    grublerierne dine<br>
                    handlinger i<br>
                    situationen?



                </p>
            </div>

            <div id="tooltip-help-sm5l" class="popover bottom">

                <p>
                    Var der nogle fordele<br>
                    ved at gruble i den<br>
                    situation?



                </p>
            </div>
            <div id="tooltip-help-sm5r" class="popover bottom">

                <p>
                    Var der nogle ulemper<br>
                    ved at gruble i den<br>
                    situation?
                </p>
            </div>
            <div id="tooltip-help-sm6" class="popover bottom">

                <p>
                    Hvordan sluttede<br>
                    grublerierne?

                </p>
            </div>
            <div id="tooltip-help-sm8" class="popover bottom">

                <p>
                    Havd kunne du<br>
                    have gjort?
                </p>
            </div>
            <div id="tooltip-help-sm9" class="popover bottom">

                <p>
                    Hvornår vil du gøre det?<br>
                    Skriv det i din kalender.<br>
                    Klik på ÅBN KALENDER



                </p>
            </div>
            <div id="tooltip-help-sm9e" class="popover bottom">

                <p>
                    Hvordan virkede<br>
                    øvelsen for dig?<br>
                    Beskriv kort.
                </p>
            </div>

            <div id="tooltip-help-sm10e" class="popover bottom">

                <p>
                    Hvordan virkede<br>
                    øvelsen for dig?<br>
                    Beskriv kort.



                </p>
            </div>


            <div id="tooltip-help-sm11e" class="popover bottom">

                <p>
                    Hvordan virkede<br>
                    øvelsen for dig?<br>
                    Beskriv kort.



                </p>
            </div>

            <div id="tooltip-thoughts3" class="popover left">

                <p>
                    Klik på den øvelse, der er fremhævet med grønt, for at gå videre

                </p>
            </div>


            <div id="click_popOverBox" class="click_popOverBox_DP popover top">
                <p>Du har klikket på TILBAGE. Det du har skrevet vil ikke blive gemt. Vil du fortsætte alligevel?</p>
                <div class="popOver_btn_dp">
                    <button class="prevBtnDP" onclick="confirmCancel()">NEJ</button>
                    <button class="nextBnDP" onclick="confirmOk()">JA</button>
                </div>
            </div>

            <div id="click_popOverBox11" class="click_popOverBox_DP popover top">
                <p>Du har klikket på TILBAGE. Det du har skrevet vil ikke blive gemt. Vil du fortsætte alligevel?</p>
                <div class="popOver_btn_dp">
                    <button class="prevBtnDP" onclick="confirmCancel()">NEJ</button>
                    <button class="nextBnDP" onclick="confirmOk11()">JA</button>
                </div>
            </div>




            <div id="calendarblock" class="calendarblock" style="display:none;">





                <div id="calendar">

                </div>
                <div style="background-color: #f2f2f2; height: 10%">

                    <div align="right" style="padding-top:.3%;padding-right: .5%"><!--<button type="button" >AKTIVITETSLISTE</button>-->
                        <table border="0">
                            <tr>

                                <td> 
                                    <div class="NATCAL" id="NATCAL" style="display:none;" >
                                        <a  href="#" onclick="loadNATCH()" style="text-decoration:none;">FÆRDIG</a>
                                    </div>
                                </td>
                            </tr>
                        </table> 

                    </div>
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

                                $('.smb2l').popover({
                                    content: $('#click_popOverBox').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $('.smb2r').popover({
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

                                $('.smb4').popover({
                                    content: $('#click_popOverBox').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $('.smb5l').popover({
                                    content: $('#click_popOverBox').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $('.smb5r').popover({
                                    content: $('#click_popOverBox').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $('.smb6').popover({
                                    content: $('#click_popOverBox').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $('.smb8').popover({
                                    content: $('#click_popOverBox').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $('.smb9b').popover({
                                    content: $('#click_popOverBox').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $('.smb10b').popover({
                                    content: $('#click_popOverBox11').html(),
                                    html: true,
                                    placement: 'top',
                                    trigger: 'click'
                                });

                                $("textarea#txtsm1").popover({
                                    content: $('#tooltip-help-sm1').html(),
                                    html: true,
                                    placement: 'left',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsl1").popover({
                                    content: $('#tooltip-help-sl1').html(),
                                    html: true,
                                    placement: 'left',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm2l").popover({
                                    content: $('#tooltip-help-sm2l').html(),
                                    html: true,
                                    placement: 'left',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm2r").popover({
                                    content: $('#tooltip-help-sm2r').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm3").popover({
                                    content: $('#tooltip-help-sm3').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm4").popover({
                                    content: $('#tooltip-help-sm4').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm5l").popover({
                                    content: $('#tooltip-help-sm5l').html(),
                                    html: true,
                                    placement: 'left',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm5r").popover({
                                    content: $('#tooltip-help-sm5r').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm6").popover({
                                    content: $('#tooltip-help-sm6').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'manual'
                                });
                                $("textarea#txtsm8").popover({
                                    content: $('#tooltip-help-sm8').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'manual'
                                });

                                $("textarea#txtsm9").popover({
                                    content: $('#tooltip-help-sm9e').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'hover'
                                });
                                $(".calenderredbox").popover({
                                    content: $('#tooltip-help-sm9').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'hover'
                                });
                                $("textarea#txtsm10").popover({
                                    content: $('#tooltip-help-sm10e').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'hover'
                                });

                                $("textarea#txtsm11").popover({
                                    content: $('#tooltip-help-sm11e').html(),
                                    html: true,
                                    placement: 'right',
                                    trigger: 'hover'
                                });

                                //---toolbox---------------------------
                                $("#thoughts3").popover({
                                    content: $('#tooltip-thoughts3').html(),
                                    html: true,
                                    placement: 'left',
                                    trigger: 'manual'
                                });



                                $(document).ready(function() {

                                    lvcheck('l1', 'sl1', 'txtsl1');
                                    lvcheck('m1', 'sm1', 'txtsm1');
                                    lvcheck('m2l', 'sm2', 'txtsm2l');
                                    lvcheck('m2r', 'sm2', 'txtsm2r');
                                    lvcheck('m3', 'sm3', 'txtsm3');
                                    lvcheck('m4', 'sm4', 'txtsm4');
                                    lvcheck('m5l', 'sm5', 'txtsm5l');
                                    lvcheck('m5r', 'sm5', 'txtsm5r');
                                    lvcheck('m6', 'sm6', 'txtsm6');
                                    lvcheck('m7', 'sm7', 'txtsm7');
                                    lvcheck('m8', 'sm8', 'txtsm8');
                                    lvcheck('m9', 'sm9e', 'txtsm9');
                                    lvcheck('m10', 'sm10', 'txtsm10');

                                    loaddpevent('m9_event');
                                    loaddpevent('m10_event');







                                    $('#leftBtn1').addClass("leftBtn1_select");
                                    $('#e_complete').addClass("leftBtn1_select");



                                    if (document.getElementById("m10_event").value == 1) {
                                        document.getElementById('tbox').style.display = 'none';
                                        document.getElementById('sm10').style.display = 'block';
                                    }

                                    if (document.getElementById("txtsm10").value) {
                                        document.getElementById('sm10').style.display = 'none';
                                        document.getElementById('sm10e').style.display = 'block';
                                        $('#e_complete10').addClass("leftBtn1_select");
                                    }

                                    var objDiv = document.getElementById("fullcontent");

                                    objDiv.scrollTop = objDiv.scrollHeight;

                                });

                                $(document).on('click', '.TB-PREV', function() {
                                    /*var block = $(this).data('block');
                                     var bblock = $(this).data('bblock');
                                     var tarea = $(this).data('tarea');
                                     
                                     if(bblock){
                                     document.getElementById(bblock).style.display = 'none';
                                     }*/



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

                                $(document).on('click', '#e_complete10', function() {
                                    $('#e_complete10').addClass("leftBtn1_select");
                                    document.getElementById("smb10b").style.display = 'block';

                                });

                                $(document).on('click', '#e_ncomplete10', function() {
                                    $('#e_ncomplete10').addClass("leftBtn1_select");


                                });

                                $(document).on('click', '.TB-PREV-NAT', function() {

                                    var block = $(this).data('block');

                                    document.getElementById(block).style.display = 'block';
                                    var objDiv = document.getElementById("fullcontent");

                                    objDiv.scrollTop = objDiv.scrollHeight;

                                });



                                $(document).on('click', '.TB-NEXT', function() {

                                    var block = $(this).data('block');
                                    var bblock = $(this).data('bblock');
                                    var tarea = $(this).data('tarea');
                                    var fld = $(this).data('fld');
                                    var nxt = $(this).data('nxt');
                                    var txt = document.getElementById(tarea).value;




                                    if (block == 'sm7') {
                                        var vlu = $(this).data('value');
                                        txt = vlu;
                                        document.getElementById(tarea).value = vlu;
                                        if (vlu == 1) {
                                            document.getElementById('sm8e').style.display = 'none';
                                            document.getElementById('sm8').style.display = 'block';
                                            $('#leftBtn1').addClass("leftBtn1_select");
                                            $('#rightBtn1').removeClass("rightBtn1_select");

                                        }
                                        else {
                                            document.getElementById('sm8e').style.display = 'block';
                                            document.getElementById('sm8').style.display = 'none';
                                            document.getElementById('sm9').style.display = 'none';
                                            $('#rightBtn1').addClass("rightBtn1_select");
                                            $('#leftBtn1').removeClass("leftBtn1_select");
                                            document.getElementById('tbox').style.display = 'none';
                                        }
                                    }

                                    if (txt) {

                                        updatenchallenge(txt, fld);

                                        document.getElementById(nxt).style.display = 'block';



                                        var objDiv = document.getElementById("fullcontent");
                                        objDiv.scrollTop = objDiv.scrollHeight;

                                    }

                                    if (bblock == 'smb10b') {
                                        document.getElementById(bblock).style.display = 'none';
                                    }

                                    var hbox = $(this).data('hbox');
                                    hidePopovers();

                                    if (nxt == "tbox") {

                                        $('#thoughts3').popover('show');

                                    } else {

                                        $('textarea#' + hbox).popover('show');

                                    }
                                });







                                $(document).on('click', '.thoughts', function() {

                                    var id = $(this).data('id');
                                    if (id == "m11") {

                                        $('#ModalDepressiveWidget1').modal('hide');


                                    }

                                });


                                function switchevbox() {
                                    document.getElementById('sm10').style.display = 'none';
                                    document.getElementById('sm10e').style.display = 'block';
                                    $('#e_complete').addClass("leftBtn1_select");
                                    $('#e_complete10').addClass("leftBtn1_select");



                                }

                                function clearlb(bblock) {
                                    /*document.getElementById('txtsm10').value="";
                                     document.getElementById(bblock).style.display = 'none';
                                     $('#e_complete10').removeClass("leftBtn1_select");*/

                                    $('#elmbtnblk').val('');
                                    $('#elmbtnblk').val(bblock);

                                    $('.smb10b').popover({
                                        content: $('#click_popOverBox11').html(),
                                        html: true,
                                        placement: 'top',
                                        trigger: 'click'
                                    });
                                }

                                function confirmCancel() {
                                    var elmblock = $("#elmblk").val();
                                    var elmbtnblock = $("#elmbtnblk").val();

                                    $('.' + elmbtnblock).popover('toggle');
                                }

                                function confirmOk() {
                                    var elmblock = $("#elmblk").val();
                                    var elmbtnblock = $("#elmbtnblk").val();
                                    var elmctblock = $("#elmctblk").val();
                                    var elmntblock = $("#elmntblk").val();
                                    document.getElementById(elmbtnblock).style.display = 'none';
                                    $('.' + elmbtnblock).popover('toggle');
                                    $(".texareaBox_active").removeClass("texareaBox_active");
                                    $(".textarea_active").removeClass("textarea_active");
                                    if (elmctblock) {
                                        $('#' + elmctblock).val('');
                                    }
                                    if (elmntblock) {
                                        $('textarea#' + elmntblock).popover('show');
                                        $('#' + elmntblock).focus();
                                    }
                                }

                                function confirmOk11() {
                                    var elmbtnblock = $("#elmbtnblk").val();

                                    document.getElementById('txtsm10').value = "";
                                    document.getElementById(elmbtnblock).style.display = 'none';
                                    $('#e_complete10').removeClass("leftBtn1_select");

                                    $('.smb10b').popover('toggle');
                                }

</script>

<script src="<?php echo $ROOT; ?>/3rdparty/jqueryui/jquery-ui-1.10.custom.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/js/bootstrap-slider.js"></script>


<script>



                                function loadNATCH() {

                                    $("#calendarblock").fadeOut("slow");
                                    $("#fullcontent").fadeIn("slow");

                                    document.getElementById("fullcontent").style.display = "block";
                                    document.getElementById("calendarblock").style.display = "none";

                                    loaddpevent('m9_event');
                                    loaddpevent('m10_event');
                                    document.getElementById('natexit').style.display = 'block';

                                }




                                function loadcalendar() {


                                    $("#fullcontent").fadeOut("slow");
                                    $("#calendarblock").fadeIn("slow");


                                    document.getElementById("fullcontent").style.display = "none";
                                    document.getElementById("calendarblock").style.display = "block";

                                    var date = new Date();
                                    var d = date.getDate();
                                    var m = date.getMonth();
                                    var y = date.getFullYear();

                                    $('#calendar').html('');

                                    var calendar = $('#calendar').fullCalendar({
                                        header: {
                                            left: '',
                                            center: 'prev,agendaDay,agendaWeek,next',
                                            right: ''
                                        },
                                        selectable: true,
                                        allDaySlot: false,
                                        dayNames: ['Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag'],
                                        dayNamesShort: ['Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag'],
                                        defaultView: 'agendaWeek',
                                        snapMinutes: 10,
                                        allDayDefault: false,
                                        firstDay: 1,
                                        firstHour: 8,
                                        height: 654,
                                        selectHelper: true,
                                        editable: true,
                                        eventColor: '#8ED2CC',
                                        events: "/calendar/dpevents",
                                        droppable: false,
                                        viewDisplay: function(view) {
                                            var parentDiv = $(".fc-agenda-slots:visible").parent();

                                            var timeline = parentDiv.children(".timeline");
                                            if (timeline.length == 0) { //if timeline isn't there, add it
                                                timeline = $("<hr>").addClass("timeline");
                                                parentDiv.prepend(timeline);
                                            }

                                            var curTime = new Date();


                                            var curCalView = $('#calendar').fullCalendar("getView");

                                            timeline.show();



                                            var startSeconds = curCalView.getMinMinute() * 60;

                                            var endSeconds = curCalView.getMaxMinute() * 60;
                                            var curSeconds = (curTime.getHours() * 60 * 60) + (curTime.getMinutes() * 60) + curTime.getSeconds();
                                            var percentOfDay = (curSeconds - startSeconds) / (endSeconds - startSeconds);
                                            var topLoc = Math.floor(parentDiv.height() * percentOfDay);

                                            timeline.css("top", topLoc + "px");
                                        },
                                        eventAfterAllRender: function(view) {

                                            hidePopovers();

                                        },
                                        eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {

                                            updateTime32(event, revertFunc);
                                            document.getElementById("NATCAL").style.display = 'block';


                                        },
                                        eventResize: function(event, dayDelta, minuteDelta, revertFunc) {

                                            updateTime32(event, revertFunc);

                                        },
                                        select: function(start, end, allDay) {
                                            var rstd = new Date(start);
                                            var rend = new Date(end);

                                            var startm = rstd.getMinutes();
                                            var endm = rend.getMinutes();
                                            var diff = (endm - startm);

                                            if (diff == 10 || diff == -50) {
                                                calendar.fullCalendar('unselect');
                                            } else {
                                                //if (checkDate32(start)) {


                                                    createDpact('Problemløsning', start, end, 'm10_event');
                                                    calendar.fullCalendar('refetchEvents');
                                                    document.getElementById("NATCAL").style.display = 'block';

                                                /*} else {

                                                    $('#renjufalse').popover({
                                                        content: $('#closebox1').html(),
                                                        html: true,
                                                        placement: 'bottom',
                                                        trigger: 'manual',
                                                        container: '.fc-newslot'

                                                    }).popover('show');

                                                }*/
                                            }

                                        }


                                    });


                                }





                                function levexit() {

                                    $('#ModalDepressiveWidget1').modal('hide');
                                }

                                $(":input, a").attr("tabindex", "-1");
</script>





<div class="click_popOver popover bottom" id="closebox1">

    <p>Man kan ikke planlægge aktiviteter tilbage i tiden.</p>
    <div class="popOver_btn">
        <button class="prevBtn" onclick="hidecloseblock()">OK</button>

    </div>


</div>