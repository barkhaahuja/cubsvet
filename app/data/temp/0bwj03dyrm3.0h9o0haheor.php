<link href="<?php echo $ROOT; ?>/assets/css/S4.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/widget.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/video-js.css" rel="stylesheet">
<script src="<?php echo $ROOT; ?>/assets/js/video.js"></script>

<style>
    .lock {
        pointer-events: none;
        opacity: 0.1;
        filter: alpha(opacity=10); /* For IE8 and earlier */
    }
/*    .vjs-default-skin .vjs-big-play-button {
        left: 310px;
        top: 120px;
        font-size: 4.5em;
        display: block;
        z-index: 2;
        position: absolute;
        width: 130px;
        height: 130px;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        opacity: 1;
         Need a slightly gray bg so it can be seen on black backgrounds 
         background-color-with-alpha 
        background-color: #07141e;
        background-color: rgba(7, 20, 30, 0.7);
        border: 0.175em solid #75A3A1;
         border-radius 
        -webkit-border-radius: 70px;
        -moz-border-radius: 70px;
        border-radius: 70px;
         box-shadow
        -webkit-box-shadow: 0px 0px 1em rgba(255, 255, 255, 0.25);
        -moz-box-shadow: 0px 0px 1em rgba(255, 255, 255, 0.25);
        box-shadow: 0px 0px 1em rgba(255, 255, 255, 0.25);
         transition 
        -webkit-transition: all 0.4s;
        -moz-transition: all 0.4s;
        -o-transition: all 0.4s;
        transition: all 0.4s;
  }*/
  .vjs-default-skin {
        color: #75A3A1;
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

<!--INTRODUCTION-->
<div id="step4-0">
    <div id="StepLogo"></div>
    <div id="step4-0" class="StepTitle">Negative automatiske tanker</div>
    <div class="ContBut" data-next="#step4-1"><a href="javascript:void(0)"></a></div>
    <div class="StepSubText">Scroll ned for at påbegynde behandlingen.</div>
</div>

<!--4.1 VID-->
<br/>
<br/>
<br/>

<div id="step4-1" class="videoHolderBox">
    <div class="ChaptHead">Velkommen til Trin 4</div>
    <div class="VideoContainer">

        <video id="step4-1-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step4.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>4.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-1-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.1.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step4-1-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                    $('body').animate({
                        scrollTop: $("#step4-2").offset().top
                    }, 1000);

                    unlockDiv("#step4-2");
                    // post update user step
                    updateStep("4.2");
                <?php else: ?>
                       unlockDiv("#step4-2");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--4.2 VID-->
<br/>
<br/>
<br/>

<div id="step4-2" class="videoHolderBox lock">
    
<div class="ChaptHead">Negative automatiske tanker</div>
    <div class="VideoContainer">

        <video id="step4-2-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step4.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>4.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step4-2-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step4-3").offset().top
                }, 1000);
                unlockDiv("#step4-3");
                updateStep("4.3");
                <?php else: ?>
                        unlockDiv("#step4-3");
                
                <?php endif; ?>
            });
        });
    </script>

</div>

<!--4.3 VID-->
<br/>
<br/>
<br/>

<div id="step4-3" class="videoHolderBox lock">
    <div class="ChaptHead">Typiske fejlfortolkninger</div>
    <div class="VideoContainer">

        <video id="step4-3-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step4.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>4.3.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step4-3-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step4-4").offset().top
                }, 1000);
                unlockDiv("#step4-4");
                updateStep("4.4");
                <?php else: ?>
                        unlockDiv("#step4-4");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.5 VID-->
<br/>
<br/>
<br/>

<div id="step4-4" class="videoHolderBox lock">
    <div class="ChaptHead">Bryd den negative cirkel <br/>
          med tilfredsstillende aktiviteter</div>
    <div class="VideoContainer">

        <video id="step4-4-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step4.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>4.4.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step4-4-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step4-5").offset().top
                }, 1000);
                unlockDiv("#step4-5");
                updateStep("4.5");
                <?php else: ?>
                         unlockDiv("#step4-5");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.6 Aktivitetsregistrering -->
<br/>
<br/>
<br/>

<div id="step4-5" class="videoHolderBox lock">
    <div class="ChaptHead">Introduktion til øvelsen</div>
    <div class="VideoContainer">

        <video id="step4-5-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step4.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>4.5.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step4-5-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step4-6").offset().top
                }, 1000);
                unlockDiv("#step4-6");
                updateStep("4.6");
                <?php else: ?>
                        unlockDiv("#step4-6");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->
<br/>
<br/>
<br/>

<div id="step4-6" class="videoHolderBox lock">
   <div class="ChaptHead">Udfordre negative, automatiske tanker</div>
    
    <div class="WidgetWidth260 shadow RadCornAll" style="margin: 50px auto">
    <div class="WidgetHeaderBar">Negative automatiske tanker
        <a href="javascript:void(0)" class="NATREG-help"></a>
    </div>

    <div class="ContentWidgetNu NATRegWidget">

        <div class="NATWtTabContrOvw">
            <div class="NATWtRegIconOvw">
                <img src="<?php echo $ROOT; ?>/assets/img/NATRegisterIcon.png" width="32" height="32" />
            </div>

            <div class="NATWtRegTxtOvw">Registrering</div>
        </div>

        <div class="NATWtDenCrcContrOvw">
            <div class="NATWtDenCirIconOvw">
                <img src="<?php echo $ROOT; ?>/assets/img/NAT_negcircle_icon.png" width="32" height="24" />
            </div>

            <div class="NATWtDenTxtOvw">Den negative cirkel</div>
        </div>

    </div>
    <div class="WD-Button WidgetButtons">
        <a id="ButtonNATRegister" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentNATRegister"></div>

    <div id="NATREG-HelpContent" class="popover bottom">
        <div class="title">Negative automatiske tanker</div>
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
        $('.NATREG-help').popover({
            content: $('#NATREG-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
        
        $('#ButtonNATRegister').click(function () { 
            $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negcircle?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=0', function () {
                $('#ModalNATWidget').modal('show');

                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                    <?php if (!isset($readonly)): ?>
                        unlockDiv("#step4-7");
                        updateStep("4.7");
                    <?php else: ?>
                        unlockDiv("#step4-7");
                    
                    <?php endif; ?>
                });
            });
        });
    
    });

</script>
</div>    
<br/>
<br/>
<br/>

<div id="step4-7" class="videoHolderBox lock">
    <div class="ChaptHead">Opsummering</div>
    <div class="VideoContainer">

        <video id="step4-7-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step4.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>4.7.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step4-7-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step4-8").offset().top
                }, 1000);
                unlockDiv("#step4-8");
                updateStep("4.8");
                <?php else: ?>
                        unlockDiv("#step4-8");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<br/>
<br/>
<br/>

<!--END OF STEP-->

<div class="lock" id="step4-8">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du har færdiggjort Trin 4.
    </div>

    <div class="StepTitle">Negative automatiske tanker</div>

    <div class="StepSubText">Dit værktøj "Negative automatiske tanker" har fået tilføjet en øvelse: Den negative cirkel <br/>
        <div id="HomeButton"><a href="<?php echo $ROOT; ?>">ARBEJDSBORD</a></div>
    </div>

</div>


<script>

    // video player stuff
    videojs.options.flash.swf = "<?php echo $ROOT; ?>/assets/swf/video-js.swf";

 

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
            data: {id: "<?php echo $user_id; ?>", treatment_step: step}
        });
    }

    
            $(document).ready(function(){
                for(var i = 0; i <= <?php echo $currentSubStep; ?>; i++) {
                    unlockDiv("#step<?php echo $currentStep .'-'; ?>" + i);
                }
            });
   

</script>
