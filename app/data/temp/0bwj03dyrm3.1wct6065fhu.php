<link href="<?php echo $ROOT; ?>/assets/css/SB.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/widget.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/video-js.css" rel="stylesheet">
<script src="<?php echo $ROOT; ?>/assets/js/video.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.custom.min.js"></script>

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
        border: 0.175em solid #8ED2CC;
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
        color: #8ED2CC;
  }
  
     .popover{
        background-color: black;
        color:white;    
    }
</style>
<script>
    
     <?php if ($currentSubStep == 9): ?>
    
    window.onload=function(){
    
    $.ajax({
        url: "/window/depressive/eventcheck",
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
                   document.getElementById("step7-10").style.display='none';
                   document.getElementById("step7-11").style.display='block';
                   unlockDiv("#step7-11");
                   <?php endif; ?>
                  }else{
                     
                
                $.ajax({
        url: "/window/depressive/eventcheckforload",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {
            flg:'m9'
        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                   
                  <?php if (!isset($readonly)): ?>
                   document.getElementById("step7-10").style.display='block';
                   unlockDiv("#step7-10");
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


<?php endif; ?>


<?php if ($currentSubStep ==16): ?>
   
    window.onload=function(){
    
    $.ajax({
        url: "/window/depressive/eventcheck1",
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
                   document.getElementById("step7-17").style.display='none';
                   document.getElementById("step7-18").style.display='block';
                   unlockDiv("#step7-18");
                   <?php endif; ?>
                  }else{
                     
                
                $.ajax({
        url: "/window/depressive/eventcheckforload1",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {
            flg:'m10'
        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                   
                  <?php if (!isset($readonly)): ?>
                   document.getElementById("step7-17").style.display='block';
                   unlockDiv("#step7-17");
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


<?php endif; ?>


<?php if ($currentSubStep == 23): ?>
    
    window.onload=function(){
    
    $.ajax({
        url: "/window/depressive/eventcheck2",
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
                   document.getElementById("step7-24").style.display='none';
                   document.getElementById("step7-25").style.display='block';
                   unlockDiv("#step7-25");
                   <?php endif; ?>
                  }else{
                     
                
                $.ajax({
        url: "/window/depressive/eventcheckforload2",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {
            flg:'m11'
        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                   
                  <?php if (!isset($readonly)): ?>
                   document.getElementById("step7-24").style.display='block';
                   unlockDiv("#step7-24");
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
<?php endif; ?>


function checkstep(){       
    $.ajax({
        url: "/window/depressive/eventcheckforload",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {
            flg:'m9'
        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                   
                  
                   document.getElementById("step7-10-A").style.display='block';
                   unlockDiv("#step7-10-A");
                  }else{
                  unlockDiv("#step7-9");
                  }
                
            }
       },
       error: function(data) {
       }
    });
}



function ifcase(){

    document.getElementById("step7-10").style.display='none';
    document.getElementById("step7-11").style.display='none';
    document.getElementById("step7-12").style.display='none';
   
   $.ajax({
        url: "/window/depressive/updateeventstatus",
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
    updateStep("7.13");
    unlockDiv("#step7-13");
}

function elsecase(){
    
    document.getElementById("step7-10").style.display='none';
    document.getElementById("step7-11").style.display='none';
    document.getElementById("step7-12").style.display='block';
    unlockDiv("#step7-12");
}

function skipcase(){
    
    document.getElementById("step7-10").style.display='none';
    document.getElementById("step7-11").style.display='none';
    document.getElementById("step7-12").style.display='none';
    updateStep("7.15");
    unlockDiv("#step7-15");
}

//------------------------

function checkstep1(){
    
   
    $.ajax({
        url: "/window/depressive/eventcheckforload1",
        type: 'POST',
        dataType: 'json',
        async: false,
        
        data: {
            flg:'m10'
        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                   
                  
                   document.getElementById("step7-17-A").style.display='block';
                   unlockDiv("#step7-17-A");
                  }else{
                  unlockDiv("#step7-16");
                  
                  }
                
            }
       },
       error: function(data) {
       }
    });
}



function ifcase1(){

    document.getElementById("step7-17").style.display='none';
    document.getElementById("step7-18").style.display='none';
    document.getElementById("step7-19").style.display='none';
   
   $.ajax({
        url: "/window/depressive/updateeventstatus1",
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
    updateStep("7.20");
    unlockDiv("#step7-20");
}

function elsecase1(){
    
    document.getElementById("step7-17").style.display='none';
    document.getElementById("step7-18").style.display='none';
    document.getElementById("step7-19").style.display='block';
    unlockDiv("#step7-19");
}

function skipcase1(){
    
    document.getElementById("step7-17").style.display='none';
    document.getElementById("step7-18").style.display='none';
    document.getElementById("step7-19").style.display='none';
    updateStep("7.22");
    unlockDiv("#step7-22");
}
//------------------------------------

function checkstep2(){       
    $.ajax({
        url: "/window/depressive/eventcheckforload2",
        type: 'POST',
        dataType: 'json',
        async: false,
        cache: false,
        data: {

        },
        success: function(data) {
            if (data.status == "success") {
             
                  if(data.flag==1){
                   
                  
                   document.getElementById("step7-24-A").style.display='block';
                   unlockDiv("#step7-24-A");
                  }else{
                  unlockDiv("#step7-23");
                  }
                
            }
       },
       error: function(data) {
       }
    });
}



function ifcase2(){

    document.getElementById("step7-24").style.display='none';
    document.getElementById("step7-25").style.display='none';
    document.getElementById("step7-26").style.display='none';
   
   $.ajax({
        url: "/window/depressive/updateeventstatus2",
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
    updateStep("7.27");
    unlockDiv("#step7-27");
}

function elsecase2(){
    
    document.getElementById("step7-24").style.display='none';
    document.getElementById("step7-25").style.display='none';
    document.getElementById("step7-26").style.display='block';
    unlockDiv("#step7-26");
}

function skipcase2(){
    
    document.getElementById("step7-24").style.display='none';
    document.getElementById("step7-25").style.display='none';
    document.getElementById("step7-26").style.display='none';
    updateStep("7.29");
    unlockDiv("#step7-29");
}
    </script>

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
<div id="step7-0">
    <div id="StepLogo"></div>
    <div class="StepTitle">Depressive grublerier</div>
    <div class="ContBut" data-next="#step7-1"><a href="javascript:void(0)"></a></div>
    <div class="StepSubText">Scroll ned for at påbegynde behandlingen.</div>
</div>

<!--B.1 VID-->
<br/>
<br/>
<br/>

<div id="step7-1" class="videoHolderBox">
    <div class="ChaptHead">Velkommen til Trin B</div>
    <div class="VideoContainer">

        <video id="step7-1-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-1-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.1.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-1-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                    $('body').animate({
                        scrollTop: $("#step7-2").offset().top
                    }, 1000);

                    unlockDiv("#step7-2");
                    // post update user step
                    updateStep("7.2");
                <?php else: ?>
                        unlockDiv("#step7-2");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.2 VID-->
<br/>
<br/>
<br/>

<div id="step7-2" class="videoHolderBox lock">
    <div class="ChaptHead">Depressive grublerier</div>
    <div class="VideoContainer">

        <video id="step7-2-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-2-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.2.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-2-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-3").offset().top
                }, 1000);

                unlockDiv("#step7-3");
                updateStep("7.3");
                <?php else: ?>
                       unlockDiv("#step7-3");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--A.3 Activity List -->
<br/>
<br/>
<br/>

<div id="step7-3" class="videoHolderBox lock">
    <div class="ChaptHead">Fordele og ulemper ved depressive grublerier</div>
    <div class="VideoContainer">

        <video id="step7-3-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.3.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-2-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.2.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-3-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-4").offset().top
                }, 1000);

                unlockDiv("#step7-4");
                updateStep("7.4");
                <?php else: ?>
                        unlockDiv("#step7-4");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--A.3 Activity List -->
<br/>
<br/>
<br/>

<div id="step7-4" class="videoHolderBox lock">
    <div class="ChaptHead">Om at håndtere grublerier</div>
    <div class="VideoContainer">

        <video id="step7-4-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.4.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-4-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-5").offset().top
                }, 1000);
                unlockDiv("#step7-5");
                updateStep("7.5");
                <?php else: ?>
                        unlockDiv("#step7-5");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--A.5 VID-->
<br/>
<br/>
<br/>

<div id="step7-5" class="videoHolderBox lock">
    <div class="ChaptHead">Beskrivelse og takling af unyttige grublerier</div>
    <div class="VideoContainer">

        <video id="step7-5-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.5.mp4" type='video/mp4'/>
        </video>

    </div>

    <!-- NU Download Box end-->
    <script>
        videojs("step7-5-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-6").offset().top
                }, 1000);
                unlockDiv("#step7-6");
                updateStep("7.6");
                
                <?php else: ?>
                        unlockDiv("#step7-6");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.6  -->
<br/>
<br/>
<br/>

<div id="step7-6" class="videoHolderBox lock">
    <div class="ChaptHead">Kortlægning af grubleri</div>
    
    <div class="deprscontr">
        <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="background-color: #8dd1cb;">
            <div class="WidgetHeaderBar">Depressive grublerier<a href="javascript:void(0);" class="help"></a></div>

            <div class="ContentWidgetNu">

                <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/depressive.png" /></div>
            </div>
            <div class="WD-Button WidgetButtons" style="background-color: #9ed8d3;">
                <a href="javascript:void(0)" id="ButtonDepressive1" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
            </div>

            <div id="ContentDepressive1"></div>

        </div>
        

        <script>
               $('#ButtonDepressive1').click(function () {
                   var rnumber=Math.floor((Math.random() * 1000) + 1); 
                   $('#ContentDepressive1').load('<?php echo $ROOT; ?>/window/depressive/depressive3?id='+rnumber, function () {
                       
         //$(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
        
        $('#ModalDepressiveWidget3').modal('show');

       $('#ModalDepressiveWidget3').on('hidden.bs.modal', function (e) { 
        
        $(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
        
                           <?php if (!isset($readonly)): ?>
                               unlockDiv("#step7-7");
                               updateStep("7.7");

                           <?php else: ?>
                                    unlockDiv("#step7-7");
                           
                           <?php endif; ?>
                       });
                   });
               });
               
               
        </script>
    
    </div>
    
    <div id="PE-HelpCont" class="popover bottom">
        <div class="title">Depressive grublerier</div>
        <p>Dette er dit redskab til at arbejde
        med depressive grublerier, som blev
        introduceret i Trin B. Du skal bruge
        det til at tænke over, og kortlægge,
        nogle af dine depressive grublerier,
        og efterfølgende arbejde med dem
        udfra tre værktøjer.
        </p>
        <p>Klik på ÅBN for at bruge redskabet.</p>
        <button class="btnOk" onclick="hidePopover()">Ok</button>
    </div>
    
    <script>
        $('.help').popover({
            content: $('#PE-HelpCont').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        function hidePopover(){
            $('.help').popover('hide');
            
            $('.help').popover({
                content: $('#PE-HelpCont').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }
        
    </script>

</div>

<div id="step7-7" class="videoHolderBox lock">
    <div class="ChaptHead">Afledning</div>
    <div class="VideoContainer">

        <video id="step7-7-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.7.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-7-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-8").offset().top
                }, 1000);
                unlockDiv("#step7-8");
                updateStep("7.8");
                $('.listBox_footer').tooltip('show');
                <?php else: ?>
                        unlockDiv("#step7-8");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.8 VID -->
<br/>
<br/>
<br/>

<div id="step7-8" class="videoHolderBox lock">
    <div class="ChaptHead">Liste over afledende aktiviteter</div>
    <div class="divsactcontr">

        <div class="wrapper">
            <div id="listBox">
                <div class="listBox_top">
                    <h3>Dine afledende aktiviteter</h3>
                    <i class="spedSheet1">spedSheet</i>
                    <i class="spedSheet2">spedSheet</i>                    
                </div>
                <div class="listBox_content">   
                    <div class="usrdivactlist">
                        
                    </div>                
                </div>
                
                <div id="popupleft" style="display:none;">
                    <div class="popup_top">
                        <i class="arrowTop"></i>
                        <p>Vælg en af dine tidligere registrerede TILFREDSSTILLENDE AKTIVITETER ved at klikke på dem. Klik på FÆRDIG for at tilføje dem til din liste.</p>
                    </div>
                    <div class="popup_cenetr">

                    </div>
                    <div class="popup_bottom">
                        <button class="btn_bottom" onclick="savePleasurableActivity()">FÆRDIG</button>
                    </div>
                </div>

                <div id="popupright" style="display:none;">
                    <div class="popup_top">
                        <i class="arrowTop"></i>
                        <p>Dette er en liste med forslag til afledende aktiviteter. Klik på dem du vil tilføje til din liste og klik på FÆRDIG når du er færdig.</p>
                    </div>
                    <div class="popup_cenetr_right">
                        <ul class="multiple">
                            <li id="actvli_1" onclick="selectplractivity('Se TV',0,'actvli_1')">Se TV</li>                    
                            <li id="actvli_2" onclick="selectplractivity('Læse en bog',0,'actvli_2')">Læse en bog</li>                    
                            <li id="actvli_3" onclick="selectplractivity('Høre musik',0,'actvli_3')">Høre musik</li>
                            <li id="actvli_4" onclick="selectplractivity('Høre lydbog',0,'actvli_4')">Høre lydbog</li>
                            <li id="actvli_5" onclick="selectplractivity('Løbe',0,'actvli_5')">Løbe</li>
                            <li id="actvli_6" onclick="selectplractivity('Gå tur',0,'actvli_6')">Gå tur</li>
                        </ul>
                    </div>
                    <div class="popup_bottom">
                        <button class="btn_bottom" onclick="savePleasurableActivity()">FÆRDIG</button>
                    </div>
                </div>

                <div class="listBox_footer" data-toggle="popover" data-html="true"
                     data-original-title="<p>Klik her for at tilføje en ny aktivitet, som du tror vil hjælpe til at aflede dig fra at gruble.</p>
                     <p>Du kan også tilføje aktiviteter fra din liste over TILFREDSSTILLENDE aktiviteter eller listen vi præsenterede for lidt siden. 
                     Klik på de to små knapper lige ovenover i højre side.</p>" data-placement="top">
                    <div class="addbtn">
                        <i class="plusIcon">plus</i>
                        <h4>TILFØJ NY AKTIVITET</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <div id="DivnActivityEditor" class="popover top" style="z-index:9999 !important;">        
        <div class="popover_cont_top">
            <div class="title">Beskriv aktiviteten kort og klik på FÆRDIG når du er færdig</div>
            <input type="text" class="DivnActivityText" size="34" value="" />
        </div>
        <div class="divactcontr">
            <div class="divactleftbtn">
                <i class="popover_closeIcon"></i>
                <a href="javascript:void(0)" onclick="hideDivnActivityEditor('.addbtn');" class="NCB-close">FORTRYD</a>                
           </div>
           <div class="divactrightbtn">
                <i class="popover_tickIcon"></i>
                <a href="javascript:void(0)" class="NCB-tick" onclick="saveDivnActivity('.listBox_footer');">FÆRDIG</a>
           </div>
        </div>
    </div>
    
    <div class="msgboxright" style="display: none;">
        Du har nu tilføjet nogle aktiviteter til din liste over afledende aktiviteter. Det næste kapittel er blevet tilgængeligt, men du
må meget gerne tilføje yderligere til din liste inden du fortsætter.

        <div class="msgbox_bottom">
            <button class="msgboxbtn_bottom">OK</button>
        </div>
    </div>    
    
    <script>
        $( window ).load(function() {
           $('.listBox_footer').tooltip('show');
        });
        
        $(document).ready(function () {           
            $('.addbtn').popover({
                content: $('#DivnActivityEditor').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });
            
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usrdivact/useractivitylist",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: { },
                success: function (data) { 
                    if (data.status == 'success') {                         
                        $('.usrdivactlist').html(data.userdivact);  
                    }
                }
            });            
        });
        
        function showplact(){ 
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usrdivact/show",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { },
                success: function (data) { 
                    if (data.status == 'success') { 
                        $('.popup_cenetr').html('');
                        $('.popup_cenetr').html(data.userplract);
                    }
                }
            });
        }  
        
        $(".addbtn").click(function() {   
            $('.tooltip.fade.top').each(function() {
                $(this).remove();
            });
            $('.tooltip.fade.bottom').each(function() {
                $(this).remove();
            });
        });    
        
        $( ".listBox_footer" ).mouseover(function() {
            $('.listBox_footer').tooltip('destroy');
        });

        $( ".listBox_footer" ).mouseout(function() {
            $('.listBox_footer').tooltip('destroy');
        });
        
        $( "#DivnActivityEditor" ).mouseover(function() {
            $('.listBox_footer').tooltip('destroy');
        });        
        
        $(".spedSheet2").click(function() {
            $('#popupright').hide();
            $('#popupleft').toggle();
            showplact();
        });
        
        $(".spedSheet1").click(function() {
            $('#popupleft').hide();
            $('#popupright').toggle();
        });
        
        $(".msgboxbtn_bottom").click(function() {   
            $('.msgboxright').hide();
             <?php if (!isset($readonly)): ?>
                               updateStep("7.9");
                        unlockDiv("#step7-9");

            <?php else: ?>
                               unlockDiv("#step7-9");
            
            <?php endif; ?>
           
        });        
        
        function selectplractivity(actvy,wgtactid,elmid){ 
            var test = actvy;
            //var activity = actvy;
            //activity = activity.replace(/\s+/g, '@#$');
            
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usrdivact/selplractivity",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { "divact": actvy, "owner": 0, "wgtactid": wgtactid},
                success: function (data) { 
                    if (data.status == 'success') { 
                          var newli = "<li id='"+elmid+"' class='line_B' onclick=deselectplractivity('"+actvy.replace(/\s+/g, '#')+"',"+wgtactid+",'"+elmid+"')>" + actvy.replace(/#/g, ' ') + "<i class='tickMark'></i></li>";
                          $('#'+elmid).replaceWith(newli);
                    }
                }
            });
        }
        
        function deselectplractivity(actvy,wgtactid,elmid){ 
           var test = actvy;
            //var activity = actvy;
            //activity = activity.replace(/\s+/g, '@#$');
            
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usrdivact/deselplractivity",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { "divact": actvy},
                success: function (data) { 
                    if (data.status == 'success') {                        
                          var newli = "<li id='"+elmid+"' onclick=selectplractivity('"+actvy+"',"+wgtactid+",'"+elmid+"')>" + actvy.replace(/#/g, ' ') + "</li>";
                          $('#'+elmid).replaceWith(newli);
                    }
                }
            });
        }
        
        function hideDivnActivityEditor(selector) {
            $(selector).popover('hide');
        }
        
        function savePleasurableActivity(){      
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usrdivact/saveuserdivact",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { },
                success: function (data) { 
                    if (data.status == 'success') {                         
                        $('.spedSheet2').popover('hide');
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/usrdivact/useractivitylist",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: { },
                            success: function (data) { 
                                if (data.status == 'success') {    
                                    $('#popupleft').hide();
                                    $('#popupright').hide();
                                    $('.usrdivactlist').html(data.userdivact);  
                                    $('.msgboxright').show();
                                }
                            }
                        });
                    }
                }
            });
        }
        
        function deluserdivact(usrdivid){ 
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usrdivact/deluserdivact",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { id: usrdivid },
                success: function (data) { 
                    if (data.status == 'success') {  
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/usrdivact/useractivitylist",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: { },
                            success: function (data) { 
                                if (data.status == 'success') {                        
                                    $('.usrdivactlist').html(data.userdivact);                                      
                                }
                            }
                        });
                    }
                }
            });
        }
        
        function saveDivnActivity() {
            var text = $('.DivnActivityText').val(); 
            
            if (text) {
                $.ajax({
                    url: "<?php echo $ROOT; ?>/window/usrdivact/savediversact",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: { owner: 1, divact: text },
                    success: function (data) {
                        if (data.status == 'success') {
                            $.ajax({
                                url: "<?php echo $ROOT; ?>/window/usrdivact/useractivitylist",
                                type: 'GET',
                                dataType: 'json',
                                async: false,
                                data: { },
                                success: function (data) { 
                                    if (data.status == 'success') {     
                                        $('.popover.fade.top').each(function() {
                                            $(this).remove();
                                        });
                                        $('.usrdivactlist').html(data.userdivact);   
                                        $('.msgboxright').show();
                                    }
                                }
                            });
                        }
                    }
                });
                
                hideDivnActivityEditor('.addbtn');                
            }
        }
    </script>

</div><!--Video holder box end-->

<!--B.9-->
<br/>
<br/>
<br/>





<div id="step7-9" class="videoHolderBox lock">
    <div class="ChaptHead">Afledende aktiviteter - Evaluering
</div>
    <div class="deprscontr">
        <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="background-color: #8dd1cb;">
            <div class="WidgetHeaderBar">Depressive grublerier<a href="javascript:void(0)" class="help"></a></div>

            <div class="ContentWidgetNu" id="dp1">

                <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/depressive.png" /></div>
            </div>
            <div class="WD-Button WidgetButtons" style="background-color: #9ed8d3;">
                <a href="javascript:void(0)" id="ButtonDepressive2" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
            </div>

            <div id="ContentDepressive2"></div>

        </div>
                <div id="tooltip-s9" class="popover bottom">

                <p>
                Du skal nu planlægge
hvornår du vil afprøve
‘afledende aktiviteter’
værktøjet. Klik på ÅBN.

                </p>
            </div>

        <script>
               $('#ButtonDepressive2').click(function () {
                   var rnumber=Math.floor((Math.random() * 1000) + 2); 
                   $('#ContentDepressive2').load('<?php echo $ROOT; ?>/window/depressive/show?id='+rnumber, function () {
                       
         
        $(document.body).removeClass('modal-open');
        $('#ModalDepressiveWidget').modal('show');

      $('#ModalDepressiveWidget').on('hidden.bs.modal', function (e) { 
        $(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
                           <?php if (!isset($readonly)): ?>
                              checkstep();

                           <?php else: ?>
                                   unlockDiv("#step7-13");
                           
                           <?php endif; ?>
                       });
                   });
               });
               
              
               $("#dp1").popover({
                content: $('#tooltip-s9').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        </script>

    </div>
    
    <div id="PE-HelpCont1" class="popover bottom">
        <div class="title">Depressive grublerier</div>
        <p>Dette er dit redskab til at arbejde
        med depressive grublerier, som blev
        introduceret i Trin B. Du skal bruge
        det til at tænke over, og kortlægge,
        nogle af dine depressive grublerier,
        og efterfølgende arbejde med dem
        udfra tre værktøjer.
        </p>
        <p>Klik på ÅBN for at bruge redskabet.</p>
        <button class="btnOk" onclick="hidePopover1()">Ok</button>
    </div>
    
    <script>
        $('.help').popover({
            content: $('#PE-HelpCont1').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        function hidePopover1(){
            $('.help').popover('hide');
            
            $('.help').popover({
                content: $('#PE-HelpCont').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }
        
    </script>

</div><!--Video holder box end-->

<!--B.11 -->
<br/>
<br/>
<br/>

<!--B.7 VID-->
<br/>
<br/>
<br/>

<div class="lock" id="step7-10-A" style="display:none;">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du er godt på vej med Trin B.
    </div>

    <div class="StepTitle">Grublerier</div>

    <div class="StepSubText">

        <div id="HomeButton"><a style="padding-left: 35px;" href="<?php echo $ROOT; ?>">ARBEJDSBORD</a></div>
    </div>

</div>

<br/>
<br/>
<br/>

<div id="step7-10" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Tiden er endnu ikke passeret for, hvornår du har lavet aftalen med dig selv om at gennemføre din opgave. Du skal først gennemføre din opgave og herefter vende tilbage til programmet og fortsætte. Har du allerede gennemført den eller ønsker du at ændre tidspunktet, kan du gå til redskabet Aktivitetskalender. </div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="<?php echo $ROOT; ?>">NÆSTE</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step7-11" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Velkommen tilbage! Har du gennemført øvelsen? </div>
<br><br><br><div id="HomeButton" style="float: left;"><a href="#" onclick="ifcase()">JA</a></div><div id="HomeButton" style="float: right;"><a href="#" onclick="elsecase()">NEJ</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step7-12" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Det er ok. Det er vigtigt at du gennemfører den opgave du har sat dig, men du kan godt fortsætte programmet alligevel. Hvis opgaven er for forvanskelig, så del den op i mindre dele i redskabet Aktivitetskalender eller spørg din psykolog til råds.</div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="#" onclick="skipcase()">NÆSTE</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>


<div id="step7-13" class="videoHolderBox lock">
    <div class="ChaptHead">Velkommen tilbage</div>
    <div class="VideoContainer">

        <video id="step7-13-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.9.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-13-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-14").offset().top
                }, 1000);
                unlockDiv("#step7-14");
                updateStep("7.14");
                
                <?php else: ?>
                        unlockDiv("#step7-14");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.12 -->
<br/>
<br/>
<br/>

<div id="step7-14" class="videoHolderBox lock">
    <div class="ChaptHead">Afledende aktiviteter
Planlæg hvornår du vil gøre det
</div>
    <div class="deprscontr">
   <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="background-color: #8dd1cb;">
    <div class="WidgetHeaderBar">Depressive grublerier<a href="javascript:void(0)" class="help"></a></div>

    <div class="ContentWidgetNu" id="dp2">

        <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/depressive.png" /></div>
    </div>
    <div class="WD-Button WidgetButtons" style="background-color: #9ed8d3;">
        <a href="javascript:void(0)" id="ButtonDepressive3" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentDepressive3"></div>

</div>
        <div id="tooltip-s14" class="popover bottom">

                <p>
                Du skal nu evaluere
øvelsen, eller planlægge
den igen, hvis du ikke fik
prøvet den. Klik på ÅBN.

                </p>
            </div>
     <script>
            $('#ButtonDepressive3').click(function () {
                 var rnumber=Math.floor((Math.random() * 1000) + 3); 
                $('#ContentDepressive3').load('<?php echo $ROOT; ?>/window/depressive/show?id='+rnumber, function () {
                    
       
         $(document.body).removeClass('modal-open');
 
         $('#ContentDepressive3 #ModalDepressiveWidget').modal('show');
          

                    $('#ContentDepressive3 #ModalDepressiveWidget').on('hidden.bs.modal', function (e) { 
                     
                        
        $(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
                        <?php if (!isset($readonly)): ?>
                            unlockDiv("#step7-15");
                            updateStep("7.15");
                          
                        <?php else: ?>
                                 unlockDiv("#step7-15");
                        
                        <?php endif; ?>
                    });
                });
            });
            
             
            
             $("#dp2").popover({
                content: $('#tooltip-s14').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        </script>
    </div>
    
    <div id="PE-HelpCont2" class="popover bottom">
        <div class="title">Depressive grublerier</div>
        <p>Dette er dit redskab til at arbejde
        med depressive grublerier, som blev
        introduceret i Trin B. Du skal bruge
        det til at tænke over, og kortlægge,
        nogle af dine depressive grublerier,
        og efterfølgende arbejde med dem
        udfra tre værktøjer.
        </p>
        <p>Klik på ÅBN for at bruge redskabet.</p>
        <button class="btnOk" onclick="hidePopover2()">Ok</button>
    </div>
    
    <script>
        $('.help').popover({
            content: $('#PE-HelpCont2').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        function hidePopover2(){
            $('.help').popover('hide');
            
            $('.help').popover({
                content: $('#PE-HelpCont2').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }
        
    </script>

</div><!--Video holder box end-->

<!--B.13 -->
<br/>
<br/>
<br/>



<div id="step7-15" class="videoHolderBox lock">
    <div class="ChaptHead">Problemløsning</div>
    <div class="VideoContainer">

        <video id="step7-15-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.11.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-15-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-16").offset().top
                }, 1000);
                unlockDiv("#step7-16");
                updateStep("7.16");
                
                <?php else: ?>
                         unlockDiv("#step7-16");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.12 -->
<br/>
<br/>
<br/>

<div id="step7-16" class="videoHolderBox lock">
    <div class="ChaptHead">Problemløsning
Planlæg hvornår du vil gøre det
</div>
    <div class="deprscontr">
   <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="background-color: #8dd1cb;">
    <div class="WidgetHeaderBar">Depressive grublerier<a href="javascript:void(0)" class="help"></a></div>

    <div class="ContentWidgetNu" id="dp3">

        <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/depressive.png" /></div>
    </div>
    <div class="WD-Button WidgetButtons" style="background-color: #9ed8d3;">
        <a href="javascript:void(0)" id="ButtonDepressive4" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentDepressive4"></div>

</div>
        <div id="tooltip-s16" class="popover bottom">

                <p>
                Du skal nu planlægge
hvornår du vil afprøve
‘problemløsning’ værk-
tøjet. Klik på ÅBN.

                </p>
            </div>
     <script>
            $('#ButtonDepressive4').click(function () {
                 var rnumber=Math.floor((Math.random() * 1000) + 4); 
                $('#ContentDepressive4').load('<?php echo $ROOT; ?>/window/depressive/depressive1?id='+rnumber, function () {
                    
         
        $(document.body).removeClass('modal-open');
        $('#ModalDepressiveWidget1').modal('show');

                    $('#ModalDepressiveWidget1').on('hidden.bs.modal', function (e) { 
       $(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
                        <?php if (!isset($readonly)): ?>
                            checkstep1();

                        <?php else: ?>
                                unlockDiv("#step7-20");
                        
                        <?php endif; ?>
                    });
                });
            });
            
            
             $("#dp3").popover({
                content: $('#tooltip-s16').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        </script>
    </div>
    
    <div id="PE-HelpCont3" class="popover bottom">
        <div class="title">Depressive grublerier</div>
        <p>Dette er dit redskab til at arbejde
        med depressive grublerier, som blev
        introduceret i Trin B. Du skal bruge
        det til at tænke over, og kortlægge,
        nogle af dine depressive grublerier,
        og efterfølgende arbejde med dem
        udfra tre værktøjer.
        </p>
        <p>Klik på ÅBN for at bruge redskabet.</p>
        <button class="btnOk" onclick="hidePopover3()">Ok</button>
    </div>
    
    <script>
        $('.help').popover({
            content: $('#PE-HelpCont3').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        function hidePopover3(){
            $('.help').popover('hide');
            
            $('.help').popover({
                content: $('#PE-HelpCont3').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }
        
    </script>

</div><!--Video holder box end-->

<!--B.13 -->
<br/>
<br/>
<br/>


<div class="lock" id="step7-17-A" style="display:none;">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
         Du er godt på vej i Trin B.
    </div>

    <div class="StepTitle">Grublerier</div>

    <div class="StepSubText">
        <div id="HomeButton"><a style="padding-left: 35px;" href="<?php echo $ROOT; ?>">ARBEJDSBORD</a></div>
    </div>

</div>

<br/>
<br/>
<br/>

<div id="step7-17" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Tiden er endnu ikke passeret for, hvornår du har lavet aftalen med dig selv om at gennemføre din opgave. Du skal først gennemføre din opgave og herefter vende tilbage til programmet og fortsætte. Har du allerede gennemført den eller ønsker du at ændre tidspunktet, kan du gå til redskabet Aktivitetskalender. </div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="<?php echo $ROOT; ?>">NÆSTE</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step7-18" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Velkommen tilbage! Har du gennemført øvelsen? </div>
<br><br><br><div id="HomeButton" style="float: left;"><a href="#" onclick="ifcase1()">JA</a></div><div id="HomeButton" style="float: right;"><a href="#" onclick="elsecase1()">NEJ</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step7-19" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Det er ok. Det er vigtigt at du gennemfører den opgave du har sat dig, men du kan godt fortsætte programmet alligevel. Hvis opgaven er for forvanskelig, så del den op i mindre dele i redskabet Aktivitetskalender eller spørg din psykolog til råds.</div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="#" onclick="skipcase1()">NÆSTE</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>


<div id="step7-20" class="videoHolderBox lock">
    <div class="ChaptHead">Velkommen tilbage</div>
    <div class="VideoContainer">

        <video id="step7-20-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.12.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-20-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-21").offset().top
                }, 1000);
                unlockDiv("#step7-21");
                updateStep("7.21");
                
                <?php else: ?>
                        unlockDiv("#step7-21");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.15 -->
<br/>
<br/>
<br/>


<div id="step7-21" class="videoHolderBox lock">
    <div class="ChaptHead">Problemløsning
Planlæg hvornår du vil gøre det</div>
    <div class="deprscontr">
        <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="background-color: #8dd1cb;">
            <div class="WidgetHeaderBar">Depressive grublerier<a href="javascript:void(0)" class="help"></a></div>

            <div class="ContentWidgetNu" id="dp4">

                <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/depressive.png" /></div>
            </div>
            <div class="WD-Button WidgetButtons" style="background-color: #9ed8d3;">
                <a href="javascript:void(0)" id="ButtonDepressive5" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
            </div>

            <div id="ContentDepressive5"></div>

        </div>
        <div id="tooltip-s21" class="popover bottom">

                <p>
                Du skal nu evaluere
øvelsen, eller planlægge
den igen, hvis du ikke fik
prøvet den. Klik på ÅBN.

                </p>
            </div>
        <script>
               $('#ButtonDepressive5').click(function () {
                    var rnumber=Math.floor((Math.random() * 1000) + 5); 
                   $('#ContentDepressive5').load('<?php echo $ROOT; ?>/window/depressive/depressive1?id='+rnumber, function () {
                       
       
        $(document.body).removeClass('modal-open');
        $('#ContentDepressive5 #ModalDepressiveWidget1').modal('show');

                       $('#ContentDepressive5 #ModalDepressiveWidget1').on('hidden.bs.modal', function (e) { 
       $(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
                           <?php if (!isset($readonly)): ?>
                               updateStep("7.22");
                               unlockDiv("#step7-22");

                           <?php else: ?>
                                   unlockDiv("#step7-22");
                           
                           <?php endif; ?>
                       });
                   });
               });
               
                
                $("#dp4").popover({
                content: $('#tooltip-s21').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        </script>

    </div>
    
    <div id="PE-HelpCont4" class="popover bottom">
        <div class="title">Depressive grublerier</div>
        <p>Dette er dit redskab til at arbejde
        med depressive grublerier, som blev
        introduceret i Trin B. Du skal bruge
        det til at tænke over, og kortlægge,
        nogle af dine depressive grublerier,
        og efterfølgende arbejde med dem
        udfra tre værktøjer.
        </p>
        <p>Klik på ÅBN for at bruge redskabet.</p>
        <button class="btnOk" onclick="hidePopover4()">Ok</button>
    </div>
    
    <script>
        $('.help').popover({
            content: $('#PE-HelpCont4').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        function hidePopover4(){
            $('.help').popover('hide');
            
            $('.help').popover({
                content: $('#PE-HelpCont4').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }
        
    </script>

</div><!--Video holder box end-->

<!--B.14 -->
<br/>
<br/>
<br/>

<div id="step7-22" class="videoHolderBox lock">
    <div class="ChaptHead">Grubletid</div>
    <div class="VideoContainer">

        <video id="step7-22-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.14.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-22-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-23").offset().top
                }, 1000);
                unlockDiv("#step7-23");
                updateStep("7.23");
                
                <?php else: ?>
                         unlockDiv("#step7-23");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.15 -->
<br/>
<br/>
<br/>

<div id="step7-23" class="videoHolderBox lock">
    <div class="ChaptHead">Grubletid
Planlæg hvornår du vil gøre det
</div>
    <div class="deprscontr">
    <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="background-color: #8dd1cb;">
    <div class="WidgetHeaderBar">Depressive grublerier<a href="javascript:void(0)" class="help"></a></div>

    <div class="ContentWidgetNu" id="dp5">

        <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/depressive.png" /></div>
    </div>
    <div class="WD-Button WidgetButtons" style="background-color: #9ed8d3;">
        <a href="javascript:void(0)" id="ButtonDepressive6" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentDepressive6"></div>

</div>
        <div id="tooltip-s23" class="popover bottom">

                <p>
                Du skal nu planlægge
hvornår du vil afprøve
'grubletid' værktøjet. Klik
på ÅBN.
                </p>
            </div>
     <script>
            $('#ButtonDepressive6').click(function () {
                 var rnumber=Math.floor((Math.random() * 1000) + 6); 
                $('#ContentDepressive6').load('<?php echo $ROOT; ?>/window/depressive/depressive2?id='+rnumber, function () {
                    
         
        $(document.body).removeClass('modal-open');
        $('#ModalDepressiveWidget2').modal('show');

                    $('#ModalDepressiveWidget2').on('hidden.bs.modal', function (e) { 
         $(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
                        <?php if (!isset($readonly)): ?>
                           
                          checkstep2();

                        <?php else: ?>
                                unlockDiv("#step7-27");
                        
                        <?php endif; ?>
                    });
                });
            });
            
             
             $("#dp5").popover({
                content: $('#tooltip-s23').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        </script>
    </div>
    
    <div id="PE-HelpCont5" class="popover bottom">
        <div class="title">Depressive grublerier</div>
        <p>Dette er dit redskab til at arbejde
        med depressive grublerier, som blev
        introduceret i Trin B. Du skal bruge
        det til at tænke over, og kortlægge,
        nogle af dine depressive grublerier,
        og efterfølgende arbejde med dem
        udfra tre værktøjer.
        </p>
        <p>Klik på ÅBN for at bruge redskabet.</p>
        <button class="btnOk" onclick="hidePopover5()">Ok</button>
    </div>
    
    <script>
        $('.help').popover({
            content: $('#PE-HelpCont5').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        function hidePopover5(){
            $('.help').popover('hide');
            
            $('.help').popover({
                content: $('#PE-HelpCont5').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }
        
    </script>

</div><!--Video holder box end-->

<!--B.16 -->
<br/>
<br/>
<br/>

<div class="lock" id="step7-24-A" style="display:none;">
    
    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du er nu igang med sidste øvelse i Trin B.
    </div>

    <div class="StepTitle">Grublerier</div>

    <div class="StepSubText">
        <div id="HomeButton"><a style="padding-left: 35px;" href="<?php echo $ROOT; ?>">ARBEJDSBORD</a></div>
    </div>

</div>

<br/>
<br/>
<br/>


<div id="step7-24" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Tiden er endnu ikke passeret for, hvornår du har lavet aftalen med dig selv om at gennemføre din opgave. Du skal først gennemføre din opgave og herefter vende tilbage til programmet og fortsætte. Har du allerede gennemført den eller ønsker du at ændre tidspunktet, kan du gå til redskabet Aktivitetskalender. </div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="<?php echo $ROOT; ?>">NÆSTE</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step7-25" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Velkommen tilbage! Har du gennemført øvelsen? </div>
<br><br><br><div id="HomeButton" style="float: left;"><a href="#" onclick="ifcase2()">JA</a></div><div id="HomeButton" style="float: right;"><a href="#" onclick="elsecase2()">NEJ</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step7-26" class="videoHolderBox lock" style="display:none;">
    <div class="ChaptHead"></div>
    <div id="VideoContainers" class="VideoContainer">
      <div class="StepSubText">Det er ok. Det er vigtigt at du gennemfører den opgave du har sat dig, men du kan godt fortsætte programmet alligevel. Hvis opgaven er for forvanskelig, så del den op i mindre dele i redskabet Aktivitetskalender eller spørg din psykolog til råds.</div>
<br><br><br><div id="HomeButton" style="float: right;"><a href="#" onclick="skipcase2()">NÆSTE</a></div>
    </div>

   

</div>
<br/>
<br/>
<br/>

<div id="step7-27" class="videoHolderBox lock">
    <div class="ChaptHead">Grubletid</div>
    <div class="VideoContainer">

        <video id="step7-27-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.16.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-27-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-28").offset().top
                }, 1000);
                unlockDiv("#step7-28");
                updateStep("7.28");
                
                <?php else: ?>
                        unlockDiv("#step7-28");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--2. -->
<br/>
<br/>
<br/>


<div id="step7-28" class="videoHolderBox lock">
    <div class="ChaptHead">Grubletid - Evaluering</div>
    <div class="deprscontr">
    <div class="WidgetWidth200 shadow RadCornAll WD-AL-BGC" style="background-color: #8dd1cb;">
    <div class="WidgetHeaderBar">Depressive grublerier<a href="javascript:void(0)" class="help"></a></div>

    <div class="ContentWidgetNu" id="dp6">

        <div style="text-align: center; padding: 10px;"><img src="<?php echo $ROOT; ?>/assets/img/depressive.png" /></div>
    </div>
    <div class="WD-Button WidgetButtons" style="background-color: #9ed8d3;">
        <a href="javascript:void(0)" id="ButtonDepressive7" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
    </div>

    <div id="ContentDepressive7"></div>

</div>
        <div id="tooltip-s28" class="popover bottom">

                <p>
                Du skal nu evaluere
øvelsen, eller planlægge
den igen, hvis du ikke fik
prøvet den. Klik på ÅBN.

                </p>
            </div>
     <script>
            $('#ButtonDepressive7').click(function () {
                 var rnumber=Math.floor((Math.random() * 1000) + 7); 
                $('#ContentDepressive7').load('<?php echo $ROOT; ?>/window/depressive/depressive2?id='+rnumber, function () {
        
        $(document.body).removeClass('modal-open');            
        $('#ContentDepressive7 #ModalDepressiveWidget2').modal('show');

        $('#ContentDepressive7 #ModalDepressiveWidget2').on('hidden.bs.modal', function (e) { 
       $(this).removeData('hidden.bs.modal').empty();
        $(document.body).removeClass('modal-open');
                        <?php if (!isset($readonly)): ?>
                           
                          unlockDiv("#step7-29");
                          updateStep("7.29");

                        <?php else: ?>
                                unlockDiv("#step7-29");
                        
                        <?php endif; ?>
                    });
                });
            });
            
              
             $("#dp6").popover({
                content: $('#tooltip-s28').html(),
                html: true,
                placement: 'left',
                trigger: 'hover'
            });
        </script>
    </div>
    
    <div id="PE-HelpCont6" class="popover bottom">
        <div class="title">Depressive grublerier</div>
        <p>Dette er dit redskab til at arbejde
        med depressive grublerier, som blev
        introduceret i Trin B. Du skal bruge
        det til at tænke over, og kortlægge,
        nogle af dine depressive grublerier,
        og efterfølgende arbejde med dem
        udfra tre værktøjer.
        </p>
        <p>Klik på ÅBN for at bruge redskabet.</p>
        <button class="btnOk" onclick="hidePopover6()">Ok</button>
    </div>
    
    <script>
        $('.help').popover({
            content: $('#PE-HelpCont6').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        function hidePopover6(){
            $('.help').popover('hide');
            
            $('.help').popover({
                content: $('#PE-HelpCont6').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });
        }
        
    </script>

</div><!--Video holder box end-->

<!--B.16 -->
<br/>
<br/>
<br/>


<div id="step7-29" class="videoHolderBox lock">
    <div class="ChaptHead">Opsummering</div>
    <div class="VideoContainer">

        <video id="step7-29-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/stepB.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>B.18.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step7-29-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step7-30").offset().top
                }, 1000);
                unlockDiv("#step7-30");
                updateStep("7.30");
                
                <?php else: ?>
                         unlockDiv("#step7-30");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--B.15 -->
<br/>
<br/>
<br/>




<div class="lock" id="step7-30">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
        Du har færdiggjort Trin B.
    </div>

    <div class="StepTitle">Depressive grublerier</div>

    <div class="StepSubText">1 nyt redskab er blevet tilføjet til dit instrumentbrædt:<br/>
        <ul>
           Depressive grublerier
          </ul>
          </br>
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
        
      
            
        //unlockDiv("#step<?php echo $currentStep .'-'; ?><?php echo $currentSubStep; ?>");
                for(var i = 0; i <= <?php echo $currentSubStep; ?>; i++) {
                    if(i != 10 && i != 11 && i != 12 && i != 17 && i != 18 && i != 19 && i != 24 && i != 25 && i != 26){
                  unlockDiv("#step<?php echo $currentStep .'-'; ?>" + i);
                    }
                     
                }
        
            });
   

</script>