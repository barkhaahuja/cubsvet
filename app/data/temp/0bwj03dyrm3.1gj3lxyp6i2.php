<link href="<?php echo $ROOT; ?>/assets/css/SA.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/widget.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/video-js.css" rel="stylesheet">
<script src="<?php echo $ROOT; ?>/assets/js/video.js"></script>
<link href="<?php echo $ROOT; ?>/assets/css/levengler.css" rel="stylesheet" type="text/css"/>
  
<script>   
window.onload=function(){
  
    $.ajax({
        url: "/window/leveregler/eventcheck",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {

        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                    <?php if (!isset($readonly)): ?>
                   document.getElementById("step6-10").style.display='none';
                   document.getElementById("step6-11").style.display='block';
                   unlockDiv("#step6-11");
                   <?php endif; ?>
                  }else{
                     
                
                $.ajax({
        url: "/window/leveregler/eventcheckforload",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {

        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                    <?php if (!isset($readonly)): ?>
                 
                   document.getElementById("step6-10").style.display='block';
                   unlockDiv("#step6-10");
                    <?php endif; ?>
                  }
                
            }
       },
       error: function(data) {
       }
    });
                  }
                
            }
       },
       error: function(data) {
       }
    });
    
    
   
} 

function checkstep(){       
    $.ajax({
        url: "/window/leveregler/eventcheckforload",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {

        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){            
                   document.getElementById("step6-10-A").style.display='block';
                   unlockDiv("#step6-10-A");
                  }else{
                  unlockDiv("#step6-9");
                  }
                
            }
       },
       error: function(data) {
       }
    });
}



function ifcase(){

    document.getElementById("step6-10").style.display='none';
    document.getElementById("step6-11").style.display='none';
    document.getElementById("step6-12").style.display='none';
   
   $.ajax({
        url: "/window/leveregler/updateeventstatus",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {},
        success: function(data) {
           
       },
       error: function(data) {
       }
    });
    updateStep("6.13");
    unlockDiv("#step6-13");
}

function elsecase(){
    
    document.getElementById("step6-10").style.display='none';
    document.getElementById("step6-11").style.display='none';
    document.getElementById("step6-12").style.display='block';
    unlockDiv("#step6-12");
}

function skipcase(){
    
    document.getElementById("step6-10").style.display='none';
    document.getElementById("step6-11").style.display='none';
    document.getElementById("step6-12").style.display='none';
    updateStep("6.14");
    unlockDiv("#step6-14");
}
</script>

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
        border: 0.175em solid #AEA7D3;
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
        color: #AEA7D3;
  }
  
   .popover{
        background-color: black;
        color:white;    
    }
    
    .popover.bottom .arrow:after{
        border-bottom-color: #000000;
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
<div id="step6-0">
    <div id="StepLogo"></div>
    <div class="StepTitle">Basale leveregler</div>
    <div class="ContBut" data-next="#step6-1"><a href="javascript:void(0)"></a></div>
    <div class="StepSubText">Scroll ned for at påbegynde behandlingen.</div>
</div>

<!--2.1 VID-->
<br/>
<br/>
<br/>

<div id="step6-1" class="videoHolderBox">
    <div class="ChaptHead">Introduktion til øvelsen</div>
    <div class="VideoContainer">

        <video id="step6-1-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-1-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.1.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-1-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                    $('body').animate({
                        scrollTop: $("#step6-2").offset().top
                    }, 1000);

                    unlockDiv("#step6-2");
                    // post update user step
                    updateStep("6.2");
                <?php else: ?>
                         unlockDiv("#step6-2");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.2 VID-->
<br/>
<br/>
<br/>

<div id="step6-2" class="videoHolderBox lock">
    <div class="ChaptHead">Leveregler og strategier</div>
    <div class="VideoContainer">

        <video id="step6-2-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-2-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.2.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-2-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step6-3").offset().top
                }, 1000);

                unlockDiv("#step6-3");
                updateStep("6.3");
                <?php else: ?>
                       unlockDiv("#step6-3");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--A.3 Activity List -->
<br/>
<br/>
<br/>

<div id="step6-3" class="videoHolderBox lock">
    <div class="ChaptHead">Kortlægning og analyse af<br/>
     uhensigtsmæssig leveregel</div>
    <div class="VideoContainer">

        <video id="step6-3-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.3.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-2-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.2.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-3-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step6-4").offset().top
                }, 1000);

                unlockDiv("#step6-4");
                updateStep("6.4");
                <?php else: ?>
                        unlockDiv("#step6-4");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--A.3 Activity List -->
<br/>
<br/>
<br/>

<div id="step6-4" class="videoHolderBox lock">
    <div class="ChaptHead">Kortlægning og analyse af<br/>
     uhensigtsmæssig leveregel</div>
    <div class="VideoContainer">

        <video id="step6-4-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.4.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-2-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.2.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-4-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step6-5").offset().top
                }, 1000);

                unlockDiv("#step6-5");
                updateStep("6.5");
                <?php else: ?>
                       unlockDiv("#step6-5");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--A.3 Activity List -->
<br/>
<br/>
<br/>

<div id="step6-5" class="videoHolderBox lock">
    <div class="ChaptHead">Leveregler og strategier</div>
    <div class="WidgetWidth200 shadow RadCornAll" style="margin: 50px auto; background-color: #ada6d2;">
        <div class="WidgetHeaderBar">Leveregler<a href="javascript:void(0);" class="help"></a></div>

        <div class="ContentWidgetNu">

            <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/leverengler.png" /></div>
        </div>
        <div class="WD-Button WidgetButtons" style="background-color: #b9b3d9;">
            <a href="javascript:void(0)" id="ButtonLeveregler1" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>

        <div id="ContentLeveregler1"></div>
        <script>
            $('#ButtonLeveregler1').click(function () {
                 var rnumber=Math.floor((Math.random() * 1000) + 1); 
                $('#ContentLeveregler1').load('<?php echo $ROOT; ?>/window/leveregler/show?id='+rnumber, function () {
                    $('#ModalLevereglerWidget').modal('show');

                    $('#ModalLevereglerWidget').on('hidden.bs.modal', function (e) { 
                        $(this).removeData('hidden.bs.modal').empty();
                        $(document.body).removeClass('modal-open');
                        <?php if (!isset($readonly)): ?>
                        
                           unlockDiv("#step6-6");
                           updateStep("6.6");
                           

                        <?php else: ?>
                                unlockDiv("#step6-6");
                        
                        <?php endif; ?>
                    });
                });
            });
        </script>
    </div>

    </div><!--Video holder box end-->

<!--A.5 VID-->
<br/>
<br/>
<br/>


<div id="step6-6" class="videoHolderBox lock">
    <div class="ChaptHead">Udfordring af unyttig leveregel<br/>
ved at ændre adfærd i praksis</div>
    <div class="VideoContainer">

        <video id="step6-6-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.6.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-6-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step6-7").offset().top
                }, 1000);
                unlockDiv("#step6-7");
                updateStep("6.7");
                
                <?php else: ?>
                        unlockDiv("#step6-7");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.6 Aktivitetsregistrering -->
<br/>
<br/>
<br/>

<div id="step6-7" class="videoHolderBox lock">
    <div class="ChaptHead">Udfordring af unyttig leveregel<br/>
ved at ændre adfærd i praksis</div>
    <div class="VideoContainer">

        <video id="step6-7-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.7.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-7-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step6-8").offset().top
                }, 1000);
                unlockDiv("#step6-8");
                updateStep("6.8");
                
                <?php else: ?>
                         unlockDiv("#step6-8");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.6 Aktivitetsregistrering -->
<br/>
<br/>
<br/>

<div id="step6-8" class="videoHolderBox lock">
    <div class="ChaptHead">Udfordring af unyttig leveregel<br/>
ved at ændre adfærd i praksis</div>
    <div class="VideoContainer">

        <video id="step6-8-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.8.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-8-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step6-9").offset().top
                }, 1000);
                unlockDiv("#step6-9");
                updateStep("6.9");
                
                <?php else: ?>
                        unlockDiv("#step6-9");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.6 Aktivitetsregistrering -->
<br/>
<br/>
<br/>

<div id="step6-9" class="videoHolderBox lock">
    <div class="ChaptHead">Adfærdseksperiment</div>
    <div class="WidgetWidth200 shadow RadCornAll" style="margin: 50px auto; background-color: #ada6d2;">
        <div class="WidgetHeaderBar">Leveregler<a href="javascript:void(0);" class="help"></a></div>

        <div class="ContentWidgetNu">

            <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/leverengler.png" /></div>
        </div>
        <div class="WD-Button WidgetButtons" style="background-color: #b9b3d9;">
            <a href="javascript:void(0)" id="ButtonLeveregler2" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>

        <div id="ContentLeveregler2"></div>
        <script>
            $('#ButtonLeveregler2').click(function () {
                 var rnumber=Math.floor((Math.random() * 1000) + 2); 
                $('#ContentLeveregler2').load('<?php echo $ROOT; ?>/window/leveregler/leveregler1?id='+rnumber, function () {
                    $('#ModalLevereglerWidget1').modal('show');

                    $('#ModalLevereglerWidget1').on('hidden.bs.modal', function (e) { 
                        $(this).removeData('hidden.bs.modal').empty();
                        $(document.body).removeClass('modal-open');
                        <?php if (!isset($readonly)): ?>
                        
                            checkstep();
                        <?php else: ?>
                                 unlockDiv("#step6-13");
                        
                        <?php endif; ?>
                    });
                });
            });
        </script>
    </div>

</div><!--Video holder box end-->

<div class="lock" id="step6-10-A" style="display:block;">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du har færdiggjort første del af Trin A.
    </div>

    <div class="StepTitle">Leveregler</div>

    <div class="StepSubText">1 nyt redskab er blevet tilføjet til dit arbejdsbord:<br/><br/>
        <div id="HomeButton"><a style="padding-left: 35px;" href="<?php echo $ROOT; ?>">ARBEJDSBORD</a></div>
    </div>

</div>

<br/>
<br/>
<br/>

<div id="step6-10" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Tiden er endnu ikke passeret for, hvornår du har lavet aftalen med dig selv om at gennemføre din opgave. Du skal først gennemføre din opgave og herefter vende tilbage til programmet og fortsætte. Har du allerede gennemført den eller ønsker du at ændre tidspunktet, kan du gå til redskabet Aktivitetskalender. </div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="<?php echo $ROOT; ?>">NÆSTE</a></div>
    </div>
   
</div>
<br/>
<br/>
<br/>

<div id="step6-11" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Velkommen tilbage! Har du gennemført øvelsen? </div>
<br><br><br><div id="HomeButton" style="float: left;"><a href="#" onclick="ifcase()">JA</a></div><div id="HomeButton" style="float: right;"><a href="#" onclick="elsecase()">NEJ</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step6-12" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Det er ok. Det er vigtigt at du gennemfører den opgave du har sat dig, men du kan godt fortsætte programmet alligevel. Hvis opgaven er for vanskelig, så del den op i mindre dele i redskabet Aktivitetskalender eller spørg din psykolog til råds.</div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="#" onclick="skipcase()">NÆSTE</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step6-13" class="videoHolderBox lock">
    <div class="ChaptHead">Evaluering af adfærdseksperiment</div>
    <div class="WidgetWidth200 shadow RadCornAll" style="margin: 50px auto; background-color: #ada6d2;">
        <div class="WidgetHeaderBar">Leveregler<a href="javascript:void(0);" class="help"></a></div>

        <div class="ContentWidgetNu">

            <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/leverengler.png" /></div>
        </div>
        <div class="WD-Button WidgetButtons" style="background-color: #b9b3d9;">
            <a href="javascript:void(0)" id="ButtonLeveregler3" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>

        <div id="ContentLeveregler3"></div>
        <script>
            $('#ButtonLeveregler3').click(function () {
                var rnumber=Math.floor((Math.random() * 1000) + 3); 
                $('#ContentLeveregler3').load('<?php echo $ROOT; ?>/window/leveregler/leveregler2?id='+rnumber, function () {
                    $('#ModalLevereglerWidget2').modal('show');

                    $('#ModalLevereglerWidget2').on('hidden.bs.modal', function (e) { 
                        $(this).removeData('hidden.bs.modal').empty();
                        $(document.body).removeClass('modal-open');
                        <?php if (!isset($readonly)): ?>
                       
                            updateStep("6.14");
                            unlockDiv("#step6-14");
                        <?php else: ?>
                            //updateStep("6.14");
                            unlockDiv("#step6-14");
                        
                        <?php endif; ?>
                    });
                });
            });
        </script>
    </div>

</div><!--Video holder box end-->

<!--END OF STEP-->

<div id="step6-14" class="videoHolderBox lock">
    <div class="ChaptHead">Opsummering</div>
    <div class="VideoContainer">

        <video id="step6-14-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepA.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>A.11.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step6-14-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step6-15").offset().top
                }, 1000);
                unlockDiv("#step6-15");
                updateStep("6.15");
                
                <?php else: ?>
                        unlockDiv("#step6-15");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2.6 Aktivitetsregistrering -->
<br/>
<br/>
<br/>
<div class="lock" id="step6-15">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du har færdiggjort Trin A.
    </div>

    <div class="StepTitle">Leveregler</div>

    <div class="StepSubText">1 nyt redskab er blevet føjet til dit arbejdsbord:
        <div id="HomeButton"><a style="padding-left: 35px;" href="<?php echo $ROOT; ?>">ARBEJDSBORD</a></div>
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
                    if(i != 10 && i != 11 && i != 12){
                    unlockDiv("#step<?php echo $currentStep .'-'; ?>" + i);
                    }                     
                }
                
                // popover 
                $('.help').popover({
                    content: 'popovertext',//$('#PE-HelpCont').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click'
                });

                function hidePopover(){
                    $('.help').popover('hide');

                    $('.help').popover({
                        content:  'popovertext',//$('#PE-HelpCont').html(),
                        html: true,
                        placement: 'bottom',
                        trigger: 'click'
                    });
                }
                  
            });
   
</script>
