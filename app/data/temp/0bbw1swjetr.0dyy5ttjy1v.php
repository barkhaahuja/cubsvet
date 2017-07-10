<link href="<?php echo $ROOT; ?>/assets/css/S1.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/widget.css" rel="stylesheet">

<link href="<?php echo $ROOT; ?>/assets/css/video-js.css" rel="stylesheet">
<script src="<?php echo $ROOT; ?>/assets/js/video.js"></script>

<style>
    .lock {
        pointer-events: none;
        opacity: 0.1;
        filter: alpha(opacity=10); /* For IE8 and earlier */
    }
    
    .vjs-default-skin {
	color: #F0CF67 !important; 
    }
    
</style>

<!-- sticky review message -->
<?php if (isset($readonly)): ?>
    <style>
    
            #fixed_buttons {
            position: fixed;
            top: 35%;
            right: -150px;
            
            width: 145px;
            height: 205px;
            border: 1px solid Red;
            cursor: pointer;
            padding-left: 20px;
            
            -moz-transition: right 1s ease-in-out;
            transition: right 1s ease-in-out;
            
             -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
            -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
            -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
            

            border:1px solid #91b41a; -webkit-border-radius: 3px; -moz-border-radius: 3px;border-radius: 3px;font-size:12px;font-family:arial, helvetica, sans-serif; padding: 10px 10px 10px 10px; text-decoration:none; display:inline-block;
            /*text-shadow: -1px -1px 0 rgba(0,0,0,0.3);*/
            font-weight:bold; color: #FFFFFF;
            background-color: #b6e026; background-image: -webkit-gradient(linear, left top, left bottom, from(#b6e026), to(#abdc28));
            background-image: -webkit-linear-gradient(top, #b6e026, #abdc28);
            background-image: -moz-linear-gradient(top, #b6e026, #abdc28);
            background-image: -ms-linear-gradient(top, #b6e026, #abdc28);
            background-image: -o-linear-gradient(top, #b6e026, #abdc28);
            background-image: linear-gradient(to bottom, #b6e026, #abdc28);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#b6e026, endColorstr=#abdc28);

        }
        
        @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
                #fixed_buttons{
                       width: 173px;
                       height: 150px;
                }
        }
        
        #fixed_buttons:hover {
            right: 0px;
            background-color: Red!important;
        }
        
        .roratenormal{
            -moz-transform: rotate(+90.0deg);  /* FF3.5+ */
            -o-transform: rotate(+90.0deg);  /* Opera 10.5 */
            -webkit-transform: rotate(+90.0deg);  /* Saf3.1+, Chrome */
             filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
            padding-left:30px;
            color: #000;
            font-weight: normal;
            font-size: 13px;
            font-family: verdana;
        }
        
        @media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
                .roratenormal{
                       padding-left:35px
                }
        }
       
    </style>
    
    <div id="fixed_buttons">
        <div style="display:table; padding-bottom: 8px; border-bottom: 1px solid #91b41a">
            <img  width="28px;vertical-align:middle" src="<?php echo $ROOT; ?>/assets/img/reviewmode.png">
            <span style="vertical-align:middle; display:table-cell; letter-spacing: 2px"><b>&nbsp;REVIEW MODE</b></span>
          
        </div>
        
        <div class="roratenormal">
          Du ser dette trin bedømmelsesudvalg tilstand, kan visse aktiviteter og øvelser ikke være tilgængelige.
        </div>
       
    </div>
<?php endif; ?> 
<!-- sticky review message end -->
    

<br>
<br>

<!-- INTRODUCTION -->
<div id="step1-0">
    <div class="StepLogo"></div>
    <div class="StepTitle">Introduktion</div>
    <div id="ContBut"><a href="javascript:void(0)"></a></div>
    <div class="StepSubText">Scroll ned for at påbegynde behandlingen.</div>
</div>

<br/>
<br/>
<br/>

<!--1.1 VID-->
<div id="step1-1" class="videoHolderBox">
    <div class="ChaptHead">Velkommen til Trin 1</div>
    <div class="VideoContainer">

        <video id="step1-1-video" class="video-js vjs-default-skin vjs-big-play-centered  vjs-big-play-centered " controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step1-1-download"
           href="<?php echo $ROOT; ?>/app/data/videos/1.1.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step1-1-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
               
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-2").offset().top
                }, 1000);

                unlockDiv("#step1-2");
                // post update user step
                updateStep("1.2");
                    <?php else: ?>
                        unlockDiv("#step1-2");
                    
                <?php endif; ?>
            });
        });
    </script>
</div><!--Video holder box end-->

<!--1.2 VID-->
<br/>
<br/>
<br/>

<div id="step1-2" class="videoHolderBox lock">
    <div class="ChaptHead">Hvordan viser depression sig?</div>
    <div class="VideoContainer">
        <video id="step1-2-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.2.mp4" type='video/mp4'/>
        </video>
    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a href="<?php echo $ROOT; ?>/app/data/videos/1.2.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->

    <script>
        videojs("step1-2-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-3").offset().top
                }, 1000);

                unlockDiv("#step1-3");
                updateStep("1.3");
                <?php else: ?>
                        unlockDiv("#step1-3");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--1.3 VID-->
<br/>
<br/>
<br/>

<div id="step1-3" class="videoHolderBox lock">
    <div class="ChaptHead">Den negative cirkel</div>
    <div class="VideoContainer">
        <video id="step1-3-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.3.mp4" type='video/mp4'/>
        </video>
    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
         <a href="<?php echo $ROOT; ?>/app/data/videos/1.3.mp4" class="">DOWNLOAD</a>
     </div>-->
     <!-- NU Download Box end-->
    <script>
        videojs("step1-3-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-4").offset().top
                }, 1000);

                unlockDiv("#step1-4");
                updateStep("1.4");
                <?php else: ?>
                        unlockDiv("#step1-4");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->


<!--1.4 Negative circle -->

<link href="<?php echo $ROOT; ?>/assets/css/negative_circle.css" rel="stylesheet" type="text/css"/>
<style>
    .tooltip-inner {
        background-color: white;
        color: #000000;
        border: 1px solid;
    }
</style>

<!--Integration-->
<style>
    .pos0 {
        margin-left: 380px;
    }
    .pos1 {
        margin-left: 580px;
    }
    .pos2 {
        margin-left: 380px;
    }
    .pos3 {
        margin-left: 170px;
    }
</style>
<!--End Integration-->

<br/>
<br/>
<br/>

<div id="step1-4" class="videoHolderBox lock">
    <div class="ChaptHead">Den negative cirkel</div>

    <!--Negative Circle start-->

    <div class="MoveableContainer pos0 visNONE">
        <div id="S1_NC_TBSit">
            <div class="TB-Header">Situation <a class="help help-pos0"
                                                href="javascript:void(0)"></a></div>
            <textarea class="TextFeild_Drk" name="textPos0"></textarea>
            <br>

            <div class="S1_NC_TBButtons visNONE">
                <a href="javascript:void(0)" class="NCB-close">FORTRYD</a>
                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep1(true)">FÆRDIG</a>
            </div>
        </div>
        <div class="tooltip-help-pos0"
             data-toggle="tooltip" data-html="true"
             data-original-title="Tænk på en bestemt situation,som du har haft for nylig, hvor du var særlig
                                            trist. Beskriv situationen kort. Klik inde i tekstfeldtet for at starte med at skrive."
             data-placement="bottom"></div>
        <div id="S1_NC_SitBottom"></div>
    </div>

    <div id="NC_BG">
        <div class="Circle BC_BG_Stage0">
            <div id="NC_StartButtonloc">
                <a class="NC_StartBut RadCornAll" href="javascript:void(0)"
                   onclick="nextStep0()"
                   data-toggle="tooltip" data-html="true"
                   data-original-title="Klik på ‘START’ for<br> at komme igang<br>  med at udfylde din<br>  negative cirkel."
                   data-placement="top">START</a>
            </div>
        </div>
    </div>

    <div class="MoveableContainer pos1 visNONE">
        <div class="S1_NC_TB">
            <div class="NC-Header">Negative tanker <a class="help help-pos1"
                                                      href="javascript:void(0)"></a>
            </div>
            <textarea class="TextFeild" name="textPos1" onclick="$('#step1-4 .tooltip').remove();"></textarea>

            <div class="tooltip-help-pos1"
                 data-toggle="tooltip" data-html="true"
                 data-original-title="Hvilke tanker havde du i situationen, som gjorde dig særlig trist? Eller hvilke
                                                billeder så du for dit indre blik? Hvad var det værste du tænkte eller forestillede dig?"
                 data-placement="bottom"></div>
            <div class="S1_NC_TBButtons visNONE">
                <a href="javascript:void(0)" class="NCB-close">FORTRYD</a>
                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep2(true)">FÆRDIG</a>
            </div>
        </div>
    </div>

    <div class="MoveableContainer pos2 visNONE" style="width: 400px;">
        <div class="S1_NC_TB">
            <div class="NC-Header">Følelser og kropslige reaktioner <a
                    class="help help-pos2"
                    href="javascript:void(0)"></a></div>
            <textarea class="TextFeild" name="textPos2" onclick="$('#step1-4 .tooltip').remove();"></textarea>

            <div class="tooltip-help-pos2"
                 data-toggle="tooltip" data-html="true"
                 data-original-title="Hvad følte du? Var du trist, angst eller vred? Hvad skete der i din krop?
                                                Følte du f.eks. uro?"
                 data-placement="bottom"></div>
            <div class="S1_NC_TBButtons">
                <a href="javascript:void(0)" class="NCB-close">FORTRYD</a>
                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStep3(true)">FÆRDIG</a>
            </div>
        </div>
    </div>

    <div class="MoveableContainer pos3 visNONE">
        <div class="S1_NC_TB">
            <div class="NC-Header">Adfærd<a class="help help-pos3"
                                            href="javascript:void(0)"></a></div>
            <textarea class="TextFeild" name="textPos3" onclick="$('#step1-4 .tooltip').remove();"></textarea>

            <div class="tooltip-help-pos3"
                 data-toggle="tooltip" data-html="true"
                 data-original-title="Hvad gjorde du i situationen? Hvis du ikke gjorde noget og måske var passiv,
                                                skal du også skrive det."
                 data-placement="bottom"></div>

            <div class="S1_NC_TBButtons">
                <a href="javascript:void(0)" class="NCB-close">FORTRYD</a>
                <a href="javascript:void(0)" class="NCB-tick" onclick="nextStepEnd(true)">FÆRDIG</a>
            </div>
        </div>
    </div>

</div>


<script>

    $(document).ready(function () {
        // Tooltip Help
        $('.NC_StartBut').tooltip();
        $('.help-pos0').click(function () {
            $('.tooltip-help-pos0').tooltip('toggle');
        });
        $('.help-pos1').click(function () {
            $('.tooltip-help-pos1').tooltip('toggle');
        });
        $('.help-pos2').click(function () {
            $('.tooltip-help-pos2').tooltip('toggle');
        });
        $('.help-pos3').click(function () {
            $('.tooltip-help-pos3').tooltip('toggle');
        });
        // End Tooltip Help        
        
        $('textarea[name=textPos0]').click(function () {
            $('.pos0 .S1_NC_TBButtons').show();
            $('.pos0 textarea').removeAttr('readonly');
        });

        $('textarea[name=textPos1]').click(function () {
            $('.pos1 .S1_NC_TBButtons').show();
            $('.pos1 textarea').removeAttr('readonly');
        });

        $('textarea[name=textPos2]').click(function () {
            $('.pos2 .S1_NC_TBButtons').show();
            $('.pos2 textarea').removeAttr('readonly');
        });

        $('textarea[name=textPos3]').click(function () {
            $('.pos3 .S1_NC_TBButtons').show();
            $('.pos3 textarea').removeAttr('readonly');
        });  
    });

    // Steps
    function nextStep0() {
        $('.NC_StartBut').hide();
        $('.pos0').show();
        $('.tooltip-help-pos0').tooltip('show');
        <?php if (!isset($readonly)): ?>
           // updateStep("1.4");
        <?php endif; ?>
    }
    function nextStep1(save) {
        $('.pos0 .S1_NC_TBButtons').hide();
        $('.pos0 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage0').addClass('BC_BG_Stage1');
        $('.pos1').show();
        $('.tooltip-help-pos1').tooltip('show');
        if (save) {
            saveText(0, $('.pos0 textarea').val());
        }
    }
    function nextStep2(save) {
        $('.pos1 .S1_NC_TBButtons').hide();
        $('.pos1 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage1').addClass('BC_BG_Stage3');
        $('.pos2').show();
        $('.tooltip-help-pos2').tooltip('show');
        if (save) {
            saveText(1, $('.pos1 textarea').val());
        }
    }
    function nextStep3(save) {
        $('.pos2 .S1_NC_TBButtons').hide();
        $('.pos2 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage3').addClass('BC_BG_Stage5');
        $('.pos3').show();
        $('.tooltip-help-pos3').tooltip('show');
        if (save) {
            saveText(2, $('.pos2 textarea').val());
        }
    }
    function nextStepEnd(save) {
        $('.pos3 .S1_NC_TBButtons').hide();
        $('.pos3 textarea').attr('readonly', 'readonly');
        $('.Circle').removeClass('BC_BG_Stage5').addClass('BC_BG_Stage6');
        if (save) {
            saveText(3, $('.pos3 textarea').val());

            <?php if (!isset($readonly)): ?>
            // TODO save user treatment_step here and scrollDown page
                setTimeout(function(){unlockDiv("#step1-5")}, 1000);
                updateStep("1.5");
            <?php else: ?>
                setTimeout(function(){unlockDiv("#step1-5")}, 1000);
            
            <?php endif; ?>
        }
    }
    // End Steps

    function saveText(step, text) {
        $.ajax({
            url: "<?php echo $ROOT; ?>/window/negative_circle/save",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { step: step, text: text },
            success: function (data) {
                if (data.status == 'success') {
                    console.log('step saved');
                }
            }
        });
    }

    // Common methods
    $('textarea').focusin(function () {
        $('.tooltip-help-pos0').tooltip('hide');
        $('.tooltip-help-pos1').tooltip('hide');
        $('.tooltip-help-pos2').tooltip('hide');
        $('.tooltip-help-pos3').tooltip('hide');
        if (!$(this).attr('readonly'))
            $(this).parent().children('.S1_NC_TBButtons').show();
    });
    $('.NCB-close').click(function () {
        if ($(this).parent().parent().children().hasClass('TextFeild_Drk')){
           $(this).parent().parent().find('textarea').val('');
         }
        $(this).parent().parent().children('.TextFeild').val('');
        $(this).parent().hide();
    });

</script>

    <script>

        $(document).ready(function () {
            setTimeout(function () {
                // Loader
				
                <?php foreach (($nc?:array()) as $i): ?>
                        <?php if ($i->step == 0): ?>
                            nextStep0();
                            nextStep1(false);
                            $('textarea[name=textPos0]').val("<?php echo $i->text; ?>");
                        <?php endif; ?>
                        <?php if ($i->step == 1): ?>
                            nextStep2(false);
                            $('textarea[name=textPos1]').val("<?php echo $i->text; ?>");
                        <?php endif; ?>
                        <?php if ($i->step == 2): ?>
                            nextStep3(false);
                            $('textarea[name=textPos2]').val("<?php echo $i->text; ?>");
                        <?php endif; ?>
                        <?php if ($i->step == 3): ?>
                            nextStepEnd(false);
                            $('textarea[name=textPos3]').val("<?php echo $i->text; ?>");
                        <?php endif; ?>
                <?php endforeach; ?>
				
                // End Loader
            }, 100);
        });

    </script>

<!--Negative Circle end-->

<!--1.5 VID-->
<br/>
<br/>
<br/><br/>
<br/>
<br/><br/>


<div id="step1-5" class="videoHolderBox lock">
    <div class="ChaptHead">Mere om negative cirkler</div>
    <div class="VideoContainer">
        <video id="step1-5-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.5.mp4" type='video/mp4'/>
        </video>
    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a href="<?php echo $ROOT; ?>/app/data/videos/1.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step1-5-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-6").offset().top
                }, 1000);

                unlockDiv("#step1-6");
                updateStep("1.6");
                <?php else: ?>
                        unlockDiv("#step1-6");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<!--Video holder box end-->
<!--1.6 VID-->
<br/>
<br/>
<br/>

<div id="step1-6" class="videoHolderBox lock">
    <div class="ChaptHead">Negative automatiske tanker<br/>
        og generelle leveregler
    </div>
    <div class="VideoContainer">
        <video id="step1-6-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.6.mp4" type='video/mp4'/>
        </video>
    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a href="<?php echo $ROOT; ?>/app/data/videos/1.6.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step1-6-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-7").offset().top
                }, 1000);

                unlockDiv("#step1-7");
                updateStep("1.7");
                <?php else: ?>
                        unlockDiv("#step1-7");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<!--Video holder box end-->

<!--1.7 VID-->
<br/>
<br/>
<br/>

<div id="step1-7" class="videoHolderBox lock">
    <div class="ChaptHead">Problem- og målliste</div>
    <div class="VideoContainer">
        <video id="step1-7-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.7.mp4" type='video/mp4'/>
        </video>
    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a href="<?php echo $ROOT; ?>/app/data/videos/1.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step1-7-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-8").offset().top
                }, 1000);

                unlockDiv("#step1-8");
                updateStep("1.8");
                <?php else: ?>
                        unlockDiv("#step1-8");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<!--Video holder box end-->


<!--1.8 -Problem List Activity-->
<br/>
<br/>
<br/>

<div id="step1-8" class="videoHolderBox lock">
    <div class="ChaptHead">Problem- og målliste</div>

    <div class="WidgetWidth200 shadow RadCornAll PGLWidget" style="margin: 50px auto;">
        <div class="WidgetHeaderBar">Problem- og målliste
            <a href="javascript:void(0)" class="PG-help"></a>
        </div>

        <div class="ContentWidgetNu">

            <div class="PGLIcon-WH"></div>
            <div class="PGLText-WH">Du har ingen<br/> registrerede<br/> problem/mållister</div>

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

                $('#ModalProblemGoal').on('hidden.bs.modal', function (e) {
                    <?php if (!isset($readonly)): ?>
                        unlockDiv("#step1-9");
                        updateStep("1.9");
                    <?php else: ?>
                             unlockDiv("#step1-9");
                    
                    <?php endif; ?>
                });
            });
        });

    </script>

    <!-- NU Widget --END-->
    <br/>
    <br/>

</div>
<!--1.8 -Problem List Activity END-->

<!--1.9 VID-->
<br/>
<br/>
<br/>

<div id="step1-9" class="videoHolderBox lock">
    <div class="ChaptHead">Dagens positive oplevelse</div>
    <div class="VideoContainer">
        <video id="step1-9-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.9.mp4" type='video/mp4'/>
        </video>
    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a href="<?php echo $ROOT; ?>/app/data/videos/1.9.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step1-9-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-10").offset().top
                }, 1000);

                unlockDiv("#step1-10");
                updateStep("1.10");
                <?php else: ?>
                        unlockDiv("#step1-10");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<!--Video holder box end-->

<!--1.10 -Posotive thought activity-->
<br/>
<br/>
<br/>

<div id="step1-10" class="videoHolderBox lock">
    <div class="ChaptHead">Dagens positive oplevelse</div>

    <!-- Only 1 widget-->

    <!-- Old Widget --START--><!-- Old Widget --END-->

    <!-- NU Widget --START-->

    <div class="WidgetWidth260 shadow RadCornAll PEWidget" style="margin: 50px auto">
        <div class="WidgetHeaderBar">Dagens positive oplevelse
            <a class="PE-help" href="javascript:void(0);"></a>
        </div>
        <div class="ContentWidget contstyle">
            <div class="WD-PE-Date"><?php echo $note; ?>
            </div>
            <div class="WD-PE-Text">
                <div><?php echo $date; ?></div>
            </div>
            <div class="WD-Button WidgetButtons">
                <a id="ButtonPositiveExp" href="javascript:void(0)"
                   class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
            </div>
        </div>

        <div id="ContentPositiveExp"></div>

    </div>

    <div id="PE-HelpContent" class="popover bottom">
        <div class="title">Dagens positive oplevelse</div>
        <p>Meningen med ‘Dagens positive
            oplevelse’ er at du hver aften sætter dig og tænker over hvad der er
            sket i løbet af dagen. Tænk på de ting der har giort dig glad og
            skriv dem ne på en seddel her. <br><br>
            Klik på ‘NY’ for at lave en ny seddel.
        </p>
    </div>

    <script>

        $(document).ready(function () {
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
                    <?php if (!isset($readonly)): ?>
                    unlockDiv("#step1-11");
                    updateStep("1.11");
                    <?php else: ?>
                            unlockDiv("#step1-11");
                    
                    <?php endif; ?>
                });

            });
        });

    </script>

    <!-- NU Widget --END-->

    <br/>
    <br/>

</div>
<!--1.10 -Posotive thought activity END-->

<!--1.11 VID-->
<br/>

<div id="step1-11" class="videoHolderBox lock">
    <div class="ChaptHead">Opsummering</div>
    <div class="VideoContainer">
        <video id="step1-11-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step1.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>1.11.mp4" type='video/mp4'/>
        </video>
    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a href="<?php echo $ROOT; ?>/app/data/videos/1.11.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step1-11-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step1-12").offset().top
                }, 1000);

                unlockDiv("#step1-12");
                updateStep("1.12");
                <?php else: ?>
                        unlockDiv("#step1-12");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<!--Video holder box end-->


<!--END OF STEP-->
<div class="lock" id="step1-12">
    <div class="StepLogo"></div>

    <div class="StepSubHead">Godt gået!
        <br/>
        Du har færdiggjort Trin 1.
    </div>

    <div class="StepTitle">Introduktion</div>

    <div class="StepSubText">Du har fået to nye redskaber på dit arbejdsbord:
        <ul>
            <li>• Problem- og målliste</li>
            <li>• Dagens positive begivenhed</li>
        </ul>
        <div id="HomeButton"><a href="javascript:void(0);">ARBEJDSBORD</a></div>
    </div>
</div>


<script>

    // video player stuff
    videojs.options.flash.swf = "<?php echo $ROOT; ?>/assets/swf/video-js.swf";   

    $("#HomeButton").one('click', function(){
        <?php if (!isset($readonly)): ?>
        //updateStep("1.12");
       <?php endif; ?>
        //notification_mail();
        window.location.href = "<?php echo $ROOT; ?>/";
    });

    function unlockDiv(selector) {
        $('body,html').animate({
            scrollTop: $(selector).offset().top
        }, 1000);

        $(selector).removeClass('lock');
    }

    function updateStep(step){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo $ROOT; ?>/user/update/step",
            data: {id: "<?php echo $user_id; ?>", treatment_step: step},
            success:function(data){
                console.log(data);
            }
        });
    }
    
   
    $(document).ready(function(){
        for(var i = 0; i <= <?php echo $currentSubStep; ?>; i++) {
            unlockDiv("#step<?php echo $currentStep .'-'; ?>" + i);
        }
    });
        
</script>
