<link href="<?php echo $ROOT; ?>/assets/css/S3.css" rel="stylesheet">
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
        border: 0.175em solid #E37874;
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
        color: #E37874;
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
<div id="step3-0">
    <div id="StepLogo"></div>
    <div class="StepTitle">Aktivitetsplanlægning</div>

    <div class="ContBut" data-next="#step3-1"><a href="javascript:void(0)"></a></div>

    <div class="StepSubText">Scroll ned for at påbegynde behandlingen.</div>
</div>

<!--2.1 VID-->
<br/>
<br/>
<br/>

<div id="step3-1" class="videoHolderBox">
    <div class="ChaptHead">Velkommen til Trin 3</div>
    <div class="VideoContainer">

        <video id="step3-1-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step3.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>3.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-1-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.1.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step3-1-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                    $('body').animate({
                        scrollTop: $("#step3-2").offset().top
                    }, 1000);

                    unlockDiv("#step3-2");
                    // post update user step
                    updateStep("3.2");
                <?php else: ?>
                       unlockDiv("#step3-2");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.2 VID-->
<br/>
<br/>
<br/>

<div id="step3-2" class="videoHolderBox lock">
    <div class="ChaptHead">Udviddelse af aktivitetsliste</div>


    <div class="WidgetWidth200 shadow RadCornAll" style="margin: 50px auto">
        <div class="EventsWidgetHeaderBar">Aktivitetskalender<a href="javascript:void(0);" class="CAL-help help"></a></div>

        <div class="ContentWidgetEvents">

            <div class="WD-Events-Date"><?php echo date('j', time()); ?></div>
            <div class="WD-HR"></div>
            <div class="WD-Events-Day"><?php echo cdaycal; ?></div>

        </div>
        <div id="ActivityRegistering" class="WD-Button WidgetButtons">
            <a id="ButtonStepCalendar1" href="javascript:void(0)" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>
    </div>

    <div id="ContentCalendar1"></div>
    
    <div id="PE-HelpContentact1" class="popover bottom">
        <div class="title">Aktivitetskalender</div>
        <p>Dette er din aktivitetskalender. Den skal du bruge til at lave registrere dine aktiviteter. 
           Aktivitetsregistrering hjælper dig til at få overblik over de aktiviteter du laver hver dag. <br/><br/>
           Klik på ÅBN for at bruge redskabet.
        </p>
    </div>
    
    <div id="PE-HelpContentact2" class="popover bottom">
        <div class="title">Aktivitetskalender</div>
        <p>Dette er din Aktivitetskalender. Den skal du bruge til at planlægge og registrere dine aktiviteter.
           For at gøre det nemmere at få overblik over dine aktiviteter, er din aktivitetsliste med Tilfredsstillende og kærvende aktiviteter, 
           er også blevet tilgængelig i kalenderen.<br/><br/>
           Klik på ÅBN for at bruge redskabet.
        </p>
    </div>
    
    <div id="PE-HelpContentact3" class="popover bottom">
        <div class="title">Aktivitetskalender</div>
        <p>Dette er din aktivitetskalender. Den skal du bruge til at registrere dine aktiviteter. Din Aktivitetsliste er også tilgængelig i kalenderen, 
           samt værktøjet til at opdele opgaver i mindre dele.<br/><br/>
           Klik på ÅBN for at bruge redskabet.
        </p>
    </div>

    <script>
        
        <?php if (isset($currentStep) && $currentStep == '3' &&  $currentSubStep >= '2' &&  $currentSubStep < '8'): ?>
            $(document).ready(function(){
                $('.help').popover({
                    content: $('#PE-HelpContentact2').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click',
                    container: 'body'
                });
            });
        <?php endif; ?>

        <?php if (isset($currentStep) && $currentStep >= '2' &&  $currentSubStep < '8'): ?>
            $(document).ready(function(){
                $('.help').popover({
                    content: $('#PE-HelpContentact1').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click',
                    container: 'body'
                });
            });
        <?php endif; ?>

        <?php if (isset($currentStep) && $currentStep >= '3' &&  $currentSubStep >= '8'): ?>
            $(document).ready(function(){
                $('.help').popover({
                    content: $('#PE-HelpContentact3').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click',
                    container: 'body'
                });
            });
        <?php endif; ?>

        $('#ButtonStepCalendar1').click(function () {
            $('#ContentCalendar1').load('<?php echo $ROOT; ?>/window/calendar32', function () {
                $('#ModalCalendar').modal('show');
                $('#ModalCalendar').on('shown.bs.modal', function () {
                    $("#calendar").fullCalendar('render');
                });
                
                 $('#ModalCalendar').on('hidden.bs.modal', function (e) {
                    <?php if (!isset($readonly)): ?>
                        unlockDiv("#step3-3");
                        updateStep("3.3");
                    <?php else: ?>
                             unlockDiv("#step3-3");
                    
                    <?php endif; ?>
                });
            });
            
        });


    </script>



</div><!--Video holder box end-->

<!--2.3 Activity List -->
<br/>
<br/>
<br/>

<div id="step3-3" class="videoHolderBox lock">
    
    <div class="ChaptHead">Bryd den negative cirkel</div>
    <div class="VideoContainer">

        <video id="step3-3-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step3.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>3.3.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step3-3-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step3-4").offset().top
                }, 1000);
                unlockDiv("#step3-4");
                updateStep("3.4");
                <?php else: ?>
                        unlockDiv("#step3-4");
                
                <?php endif; ?>
            });
        });
    </script>

</div>

<!--2.4 VID-->
<br/>
<br/>
<br/>

<div id="step3-4" class="videoHolderBox lock">
    <div class="ChaptHead">Opdeling af opgaver</div>
    <div class="VideoContainer">

        <video id="step3-4-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step3.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>3.4.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step3-4-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step3-5").offset().top
                }, 1000);
                unlockDiv("#step3-5");
                updateStep("3.5");
                <?php else: ?>
                        unlockDiv("#step3-5");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.5 VID-->
<br/>
<br/>
<br/>

<div id="step3-5" class="videoHolderBox lock">
    <div class="ChaptHead">At planlægge aktiviteter</div>
    <div class="VideoContainer">

        <video id="step3-5-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step3.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>3.5.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step3-5-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step3-6").offset().top
                }, 1000);
                unlockDiv("#step3-6");
                updateStep("3.6");
                //unlockDiv("#step2-7");
                <?php else: ?>
                         unlockDiv("#step3-6");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.6 Aktivitetsregistrering -->
<br/>
<br/>
<br/>

<div id="step3-6" class="videoHolderBox lock">
     <div class="ChaptHead">Aktivitetsplanlægning</div>


    <div class="WidgetWidth200 shadow RadCornAll" style="margin: 50px auto">
        <div class="EventsWidgetHeaderBar">Aktivitetskalender<a href="javascript:void(0);" class="CAL-help help"></a></div>

        <div class="ContentWidgetEvents">

            <div class="WD-Events-Date"><?php echo date('j', time()); ?></div>
            <div class="WD-HR"></div>
            <div class="WD-Events-Day"><?php echo cdaycal; ?></div>

        </div>
        <div id="ActivityRegistering" class="WD-Button WidgetButtons">
            <a id="ButtonStepCalendar2" href="javascript:void(0)" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>
    </div>

    <div id="ContentCalendar2"></div>

    <script>

        $('#ButtonStepCalendar2').click(function () {
            $('#ContentCalendar1').html('');
          
            $('#ContentCalendar2').load('<?php echo $ROOT; ?>/window/calendar36', function () {
                $('#ModalCalendar').modal('show');
                $('#ModalCalendar').on('shown.bs.modal', function () {
                    $("#calendar").fullCalendar('render');
                });
                 $('#ModalCalendar').on('hidden.bs.modal', function (e) {
                    <?php if (!isset($readonly)): ?>
                        unlockDiv("#step3-7");
                        updateStep("3.7");
                    <?php else: ?>
                            unlockDiv("#step3-7");
                    
                    <?php endif; ?>
                });
            });
           
             
        });
        

    </script>

</div>

<!--3.7 VID-->
<br/>
<br/>
<br/>

<div id="step3-7" class="videoHolderBox lock">
    <div class="ChaptHead">At dele en opgave op i mindre dele</div>
    <div class="VideoContainer">

        <video id="step3-7-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step3.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>3.7.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step3-7-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step3-8").offset().top
                }, 1000);
                unlockDiv("#step3-8");
                updateStep("3.8");
                <?php else: ?>
                        unlockDiv("#step3-8");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->
<br/>
<br/>
<br/>

<div id="step3-8" class="videoHolderBox lock">
  <div class="ChaptHead">Aktivitetsplanlægning med opdeling af opgaver</div>


    <div class="WidgetWidth200 shadow RadCornAll" style="margin: 50px auto">
        <div class="EventsWidgetHeaderBar">Aktivitetskalender<a href="javascript:void(0);" class="CAL-help help"></a></div>

        <div class="ContentWidgetEvents">

            <div class="WD-Events-Date"><?php echo date('j', time()); ?></div>
            <div class="WD-HR"></div>
            <div class="WD-Events-Day"><?php echo cdaycal; ?></div>

        </div>
        <div id="ActivityRegistering" class="WD-Button WidgetButtons">
            <a id="ButtonStepCalendar3" href="javascript:void(0)" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>
    </div>

    <div id="ContentCalendar3"></div>

    <script>

        $('#ButtonStepCalendar3').click(function () {
            $('#ContentCalendar1').html('');
            $('#ContentCalendar2').html('');
            $('#ContentCalendar3').load('<?php echo $ROOT; ?>/window/calendar39', function () {
                $('#ModalCalendar').modal('show');
                $('#ModalCalendar').on('shown.bs.modal', function () {
                    $("#calendar").fullCalendar('render');
                });
                
                 $('#ModalCalendar').on('hidden.bs.modal', function (e) {
                    <?php if (!isset($readonly)): ?>
                        unlockDiv("#step3-9");
                        updateStep("3.9");
                    <?php else: ?>
                             unlockDiv("#step3-9");
                    
                    <?php endif; ?>
                });
            });
            
        });

         
    </script>
</div>    
<br/>
<br/>
<br/>

<div id="step3-9" class="videoHolderBox lock">
    <div class="ChaptHead">At kortlægge negative og selvkritiske tanker</div>
    <div class="VideoContainer">

        <video id="step3-9-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step3.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>3.9.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step3-9-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step3-10").offset().top
                }, 1000);
                unlockDiv("#step3-10");
                updateStep("3.10");
                <?php else: ?>
                         unlockDiv("#step3-10");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<br/>
<br/>
<br/>

<div id="step3-10" class="videoHolderBox lock">
    <div class="ChaptHead">Registrering af negative automatiske tanker</div>
    
    <div class="WidgetWidth260 shadow RadCornAll" style="margin: 50px auto">
    <div class="WidgetHeaderBar">Negative automatiske tanker
        <a href="javascript:void(0)" class="NATREG-help"></a>
    </div>

    <div class="ContentWidgetNu NATRegWidget">

        <div class="NATREGIcon-WH"></div>
        <div class="NATREGTextOVW-WH">Registrering</div>

    </div>
    <div class="WD-Button WidgetButtons">
        <a id="ButtonNATRegister" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentNATRegister"></div>

    <div id="NATREG-HelpContent" class="popover bottom">
        <div class="title">Negative automatiske tanker</div>
        <p>
            Dette redskab kan du bruge til at formulere målsætninger i forhold til
            forskellige problemer du har i forbindelse med din depression.
            Redskabet viser en tilfældig udvalgt, af de målsætninger du har
            formuleret. Klik på ÅBN for at bruge redskabet.
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
    });

    $('#ButtonNATRegister').click(function () {
        $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/show?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=0', function () {
            $('#ModalNATWidget').modal('show');
            
            $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                <?php if (!isset($readonly)): ?>
                    unlockDiv("#step3-11");
                    updateStep("3.11");
                <?php else: ?>
                         unlockDiv("#step3-11");
                
                <?php endif; ?>
            });
        });
        
        
    });
    
    

</script>
</div>

<br/>
<br/>
<br/>

<div id="step3-11" class="videoHolderBox lock">
    <div class="ChaptHead"> Opsummering af opgaver</div>
    <div class="VideoContainer">

        <video id="step3-11-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step3.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>3.11.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step3-11-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step3-12").offset().top
                }, 1000);
                unlockDiv("#step3-12");
                updateStep("3.12");
                <?php else: ?>
                        unlockDiv("#step3-12");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<br/>
<br/>
<br/>
<!--END OF STEP-->

<div class="lock" id="step3-12">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du har færdiggjort Trin 3.
    </div>

    <div class="StepTitle">Aktivitetsplanlægning</div>

    <div class="StepSubText">Der er blevet tilføjet et nyt redskab til dit arbejdsbord: Negative automatiske tanker<br/>
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
