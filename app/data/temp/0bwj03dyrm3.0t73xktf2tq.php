<link href="<?php echo $ROOT; ?>/assets/css/S2.css" rel="stylesheet">
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
        border: 0.175em solid #66A1C7;
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
        color: #66A1C7;
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
<div id="step2-0">
    <div id="StepLogo"></div>
    <div class="StepTitle">Aktivitetsregistrering</div>
    <div class="ContBut" data-next="#step2-1"><a href="javascript:void(0)"></a></div>
    <div class="StepSubText">Scroll ned for at påbegynde behandlingen.</div>
</div>

<!--2.1 VID-->
<br/>
<br/>
<br/>

<div id="step2-1" class="videoHolderBox">
    <div class="ChaptHead">Velkommen til Trin 2</div>
    <div class="VideoContainer">

        <video id="step2-1-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step2.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>2.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-1-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.1.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step2-1-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                    $('body').animate({
                        scrollTop: $("#step2-2").offset().top
                    }, 1000);

                    unlockDiv("#step2-2");
                    // post update user step
                    updateStep("2.2");
                <?php else: ?>
                        unlockDiv("#step2-2");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.2 VID-->
<br/>
<br/>
<br/>

<div id="step2-2" class="videoHolderBox lock">
    <div class="ChaptHead">Aktivitetsliste</div>
    <div class="VideoContainer">

        <video id="step2-2-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step2.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>2.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-2-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.2.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step2-2-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step2-3").offset().top
                }, 1000);

                unlockDiv("#step2-3");
                updateStep("2.3");
                <?php else: ?>
                        unlockDiv("#step2-3");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.3 Activity List -->
<br/>
<br/>
<br/>

<div id="step2-3" class="videoHolderBox lock">
    <div class="ChaptHead">Aktivitetsliste</div>


    <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="margin: 50px auto">
        <div class="WidgetHeaderBar">Aktivitetsliste <a class="PE-help" href="javascript:void(0);"></a></div>

        <div class="ContentWidgetNu">

            <div class="WD-ActivityList_Icon"></div>
        </div>
        <div class="WD-Button WidgetButtons">
            <a href="javascript:void(0)" id="ButtonActivityList" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>

        <div id="ContentActivityList"></div>

    </div>
    
    <div id="PE-HelpContent1" class="popover bottom">
        <div class="title">Aktivitetsliste</div>
        <p>Formålet med dette redskab er, at give dig et overblik over, hvilke aktiviteter der er henholdsvis 
           tilfredsstillende og krævende for dig. <br/><br/>
           Klik på ÅBN for at arbejde med din aktivitetsliste.
        </p>
    </div>
    
    <div id="PE-HelpContent2" class="popover bottom">
        <div class="title">Aktivitetsliste</div>
        <p>Formålet med dette redskab er, at give dig et overblik over, hvilke aktiviteter der er henholdsvis 
           tilfredsstillende og krævende for dig. Aktivitetslisten er også tilgængelig i din kalender.<br/><br/>
           Klik på ÅBN for at arbejde med din aktivitetsliste.
        </p>
    </div>

    <script>
        <?php if (isset($currentStep) && $currentStep == '3' &&  $currentSubStep >= '3'): ?>
            $(document).ready(function(){
                $('.PE-help').popover({
                    content: $('#PE-HelpContent2').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click',
                    container: 'body'
                });
            });
        <?php endif; ?>

        <?php if (isset($currentStep) && $currentStep >= '2' &&  $currentSubStep < '8'): ?>
            $(document).ready(function(){
                $('.PE-help').popover({
                    content: $('#PE-HelpContent1').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click',
                    container: 'body'
                });
            });
        <?php endif; ?>

        $('#ButtonActivityList').click(function () {
            $('#ContentActivityList').load('<?php echo $ROOT; ?>/window/al/show', function () {
                $('#ModalActivityList').modal('show');

                $('#ModalActivityList').on('hidden.bs.modal', function (e) {
                    <?php if (!isset($readonly)): ?>
                        unlockDiv("#step2-4");
                        updateStep("2.4");
                    <?php else: ?>
                            unlockDiv("#step2-4");
                    
                    <?php endif; ?>
                });
            });
        });

    </script>

</div>

<!--2.4 VID-->
<br/>
<br/>
<br/>

<div id="step2-4" class="videoHolderBox lock">
    <div class="ChaptHead">Typiske handlemønstre ved depression</div>
    <div class="VideoContainer">

        <video id="step2-4-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step2.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>2.4.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step2-4-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step2-5").offset().top
                }, 1000);
                unlockDiv("#step2-5");
                updateStep("2.5");
                <?php else: ?>
                        unlockDiv("#step2-5");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.5 VID-->
<br/>
<br/>
<br/>

<div id="step2-5" class="videoHolderBox lock">
    <div class="ChaptHead">Aktivitetsregistrering</div>
    <div class="VideoContainer">

        <video id="step2-5-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step2.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>2.5.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step2-5-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step2-6").offset().top
                }, 1000);
                unlockDiv("#step2-6");
                updateStep("2.6");
                
                <?php else: ?>
                        unlockDiv("#step2-6");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.6 Aktivitetsregistrering -->
<br/>
<br/>
<br/>

<div id="step2-6" class="videoHolderBox lock">
    <div class="ChaptHead">Aktivitetsregistrering</div>

    <div class="WidgetWidth200 shadow RadCornAll" style="margin: 50px auto">
        <div class="EventsWidgetHeaderBar">Aktivitetskalender<a href="javascript:void(0);" class="PE-helpactreg help"></a></div>

        <div class="ContentWidgetEvents">

            <div class="WD-Events-Date"><?php echo date('j', time()); ?></div>
            <div class="WD-HR"></div>
            <div class="WD-Events-Day"><?php echo date('l', time()); ?></div>

        </div>
        <div id="ActivityRegistering" class="WD-Button WidgetButtons">
            <a id="ButtonStepCalendar" href="javascript:void(0)" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>
    </div>

    <div id="ContentCalendar"></div>
    
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
                $('.PE-helpactreg').popover({
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
                $('.PE-helpactreg').popover({
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
                $('.PE-helpactreg').popover({
                    content: $('#PE-HelpContentact3').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click',
                    container: 'body'
                });
            });
        <?php endif; ?>
    

        $('#ButtonStepCalendar').click(function () {
            $('#ContentCalendar').load('<?php echo $ROOT; ?>/window/calendar', function () {
                $('#ModalCalendar').modal('show');
                $('#ModalCalendar').on('shown.bs.modal', function () {
                    $("#calendar").fullCalendar('render');
                });
                
                 $('#ModalCalendar').on('hidden.bs.modal', function (e) {
                    <?php if (!isset($readonly)): ?>
                        unlockDiv("#step2-7");
                        updateStep("2.7");
                    <?php else: ?>
                            unlockDiv("#step2-7");
                    
                    <?php endif; ?>
                });
            });
            
        });


    </script>


</div>

<!--2.7 VID-->
<br/>
<br/>
<br/>

<div id="step2-7" class="videoHolderBox lock">
    <div class="ChaptHead">Opsummering</div>
    <div class="VideoContainer">

        <video id="step2-7-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step2.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>2.7.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step2-7-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step2-8").offset().top
                }, 1000);
                unlockDiv("#step2-8");
                updateStep("2.8");
                <?php else: ?>
                        unlockDiv("#step2-8");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->


<!--END OF STEP-->

<div class="lock" id="step2-8">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du har færdiggjort Trin 2.
    </div>

    <div class="StepTitle">Aktivitetsregistrering</div>

    <div class="StepSubText">Du har fået to nye redskaber på dit arbejdsbord:
        <ul>
            <li>• Aktivitetsliste</li>
            <li>• Aktivitetskalender</li>
        </ul>
        <div id="HomeButton" ><a style="padding-left: 35px;" href="<?php echo $ROOT; ?>">ARBEJDSBORD</a></div>
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
