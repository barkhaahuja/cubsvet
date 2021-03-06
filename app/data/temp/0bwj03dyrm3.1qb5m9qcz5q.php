<link href="<?php echo $ROOT; ?>/assets/css/S6.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/widget.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/video-js.css" rel="stylesheet">
<script src="<?php echo $ROOT; ?>/assets/js/video.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/jqueryui/jquery-ui-1.10.custom.min.js"></script>

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
        border: 0.175em solid #AC9C78;
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
  /*** close_popover ***/
  .riskmidcontbox .popover.bottom {
        background: none repeat scroll 0 0 #000000;
        position: fixed;
        width: 175px;
        z-index: 9999;
        border-radius: 4px;
  }
  .popover .popover-content h3 {
      color: #fff;
      font-size: 13px;
      padding: 0 20px;
  }
  .popover .popover-content .twoBtn {
      padding: 0 0 10px;
  }
  .popover .twoBtn button {
      padding: 4px;
      border-radius: 22px;
  }
  .popover.bottom .arrow:after {
      border-bottom-color: #000;
      top: 0;
  }
 
  .riskmidcontbox .popover.bottom, .Personhandlemidcontbox .popover.bottom, .Personhandleriskmidcontbox .popover.bottom {
        background: none repeat scroll 0 0 #000000;
        position: fixed;
        width: 175px;
        z-index: 9999;
        border-radius: 4px;
  }
  .popover .popover-content h3 {
      color: #fff;
      font-size: 13px;
      padding: 0 20px;
  }
  .popover .popover-content .twoBtn {
      padding: 0 0 10px;
  }
  .popover .twoBtn button {
      padding: 4px;
      border-radius: 22px;
  }
  .popover.bottom .arrow:after {
      border-bottom-color: #000;
      top: 0;
  }
  
  .popover_cont_top input {
      width: 97%;
  }
  
  .Personhandlemidcontbox .Personhandlemidtitle {
        float: left;
        width: 275px;
    }
    .Personhandleclosebtn{
        margin: 0 5px 0 0;
    }
    .Personhandlemidl .commentBox_1 {
        height: auto;
    }
</style>

<script>
    
    
    function checksixthqstncompleted(){
        $.ajax({
            url: "/window/checksixthqstn/sixthqstncheck",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { },
            success: function(data) {
                if (data.status == "success") {
                    if(data.flag == 1){                       
                        unlockDiv("#step8-14");
                    } else { 
                        $('#quizContainer').load('<?php echo $ROOT; ?>/window/quiz<?php echo $quiz_step; ?>', function () {
                            $('#myModal').modal();
                            
                            // disable closing the modal
                            $('#myModal').data('bs.modal').isShown = false;
                        });
                    }
                }
           },
           error: function(data) {
           }
        });
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

<br/>
<br/>

<!--INTRODUCTION-->
<div id="step8-0">
    <div id="StepLogo"></div>
    <div class="StepTitle">Forebyggelse af tilbagefald<br/></div>
   
    <div class="ContBut" data-next="#step8-1"><a href="javascript:void(0)"></a></div>
    <div class="StepSubText">Scroll ned for at påbegynde behandlingen.</div>
</div>

<!--4.1 VID-->
<br/>
<br/>
<br/>

<div id="step8-1" class="videoHolderBox">
    <div class="ChaptHead">Forebyggelse af tilbagefald</div>
    <div class="VideoContainer">

        <video id="step8-1-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.1.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-1-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.1.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-1-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                    $('body').animate({
                        scrollTop: $("#step8-2").offset().top
                    }, 1000);

                    unlockDiv("#step8-2");
                    // post update user step
                    updateStep("8.2");
                <?php else: ?>
                        unlockDiv("#step8-2");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--4.2 VID-->
<br/>
<br/>
<br/>

<div id="step8-2" class="videoHolderBox lock">
    
<div class="ChaptHead"> Vedligeholde det du har lært</div>
    <div class="VideoContainer">

        <video id="step8-2-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.2.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-2-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step8-3").offset().top
                }, 1000);
                unlockDiv("#step8-3");
                updateStep("8.3");
                <?php else: ?>
                        unlockDiv("#step8-3");
                
                <?php endif; ?>
            });
        });
    </script>

</div>

<!--4.3 VID-->
<br/>
<br/>
<br/>

<div id="step8-3" class="videoHolderBox lock">
    
<div class="ChaptHead"> Kortlægning af nyttige redskaber</div>
    <div class="VideoContainer">

        <video id="step8-3-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.3.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-4-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.4.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-3-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step8-4").offset().top
                }, 1000);
                unlockDiv("#step8-4");
                updateStep("8.4");
                <?php else: ?>
                         unlockDiv("#step8-4");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<br/>
<br/>
<br/>
<div id="step8-4" class="videoHolderBox lock">
    <div class="ChaptHead">Kortlægning af nyttige redskaber</div>
    <div class="VideoContainer">
        <div class="container">
            <div class="widget_box" id="widget_box">
                <ul class="lineOne">
                    <li class="view_one" onclick="selectusefultool('Dagens positive oplevelse',1)">
                        <div class="align_box">
                            <div class="box_head image_large">
                                <img src="<?php echo $ROOT; ?>/assets/img/1.png" alt="image1">
                            </div>
                            <div class="box_footer">
                                <h4>Dagens positive oplevelse</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool1">tick mark</i>
                    </li>
                    <li class="view_one" onclick="selectusefultool('Problem- og målliste',2)">
                        <div class="align_box">
                            <div class="box_head">
                                <img src="<?php echo $ROOT; ?>/assets/img/2.png" alt="image1">
                            </div>
                            <div class="box_footer">
                                <h4>Problem- og målliste</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool2">tick mark</i>
                    </li>
                    <li class="view_one" onclick="selectusefultool('Aktivitetsliste',3)">
                        <div class="align_box">
                            <div class="box_head">
                                <img src="<?php echo $ROOT; ?>/assets/img/3.png" alt="image1">
                            </div>
                            <div class="box_footer">
                                <h4>Aktivitetsliste</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool3">tick mark</i>
                    </li>
                    <li class="view_one" onclick="selectusefultool('Aktivitetskalender',4)">
                        <div class="align_box">
                            <div class="box_head image_large">
                                <img src="<?php echo $ROOT; ?>/assets/img/4.png" alt="image1">
                            </div>
                            <div class="box_footer">
                                <h4>Aktivitetskalender</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool4">tick mark</i>
                    </li>
                </ul>
                <ul class="lineTwo">
                    <li class="view_one" onclick="selectusefultool('Aktivitetskalender Opdeling af opgaver',5)">
                        <div class="align_box">
                            <div class="box_head image_large">
                                <img src="<?php echo $ROOT; ?>/assets/img/4.png" alt="image1">
                            </div>
                            <div class="box_footer">
                                <h4>Aktivitetskalender Opdeling af opgaver</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool5">tick mark</i>
                    </li>
                    <li class="view_two" onclick="selectusefultool('Registrering',6)">
                        <div class="align_box">
                            <div class="box_top">
                                <h3>Negative automatiske tanker</h3>
                            </div>
                            <div class="box_middle">
                                <img src="<?php echo $ROOT; ?>/assets/img/6.png" alt="image1-1">
                            </div>
                            <div class="box_bottom">
                                <h4>Registrering</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool6">tick mark</i>
                    </li>
                    <li class="view_two" onclick="selectusefultool('Den negative cirkel',7)">
                        <div class="align_box">
                            <div class="box_top">
                                <h3>Negative automatiske tanker</h3>
                            </div>
                            <div class="box_middle">
                                <img src="<?php echo $ROOT; ?>/assets/img/7.png" alt="image1-1">
                            </div>
                            <div class="box_bottom">
                                <h4>Den negative cirkel</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool7">tick mark</i>
                    </li>
                    <li class="view_two" onclick="selectusefultool('Udfordring',8)">
                        <div class="align_box">
                            <div class="box_top">
                                <h3>Negative automatiske tanker</h3>
                            </div>
                            <div class="box_middle">
                                <img src="<?php echo $ROOT; ?>/assets/img/8.png" alt="image1-1">
                            </div>
                            <div class="box_bottom">
                                <h4>Udfordring</h4>
                            </div>
                        </div>
                        <i class="tick_Icon" id="tool8">tick mark</i>
                    </li>
                </ul>
                <ul class="lineThree">
                    
                    <?php if (isset($IsStepACompleted)): ?>
                        <li id="levUsefullTool" class="view_one" onclick="selectusefultool('Leveregler',9)">
                            <div class="align_box">
                                <div class="box_head">
                                    <img src="<?php echo $ROOT; ?>/assets/img/9.png" alt="image1">
                                </div>
                                <div class="box_footer">
                                    <h4>Leveregler</h4>
                                </div>
                            </div>
                            <i class="tick_Icon" id="tool9">tick mark</i>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($IsStepBCompleted)): ?>
                        <li id="grubUsefullTool"  class="view_one" onclick="selectusefultool('Depressive grublerier',10)">
                            <div class="align_box">
                                <div class="box_head">
                                    <img src="<?php echo $ROOT; ?>/assets/img/10.png" alt="image1">
                                </div>
                                <div class="box_footer">
                                    <h4>Depressive grublerier</h4>
                                </div>
                            </div>
                            <i class="tick_Icon" id="tool10">tick mark</i>
                        </li>
                    <?php endif; ?>
                </ul>
                <div id="widgetcomment" style="display: block;left: 55px;">
                    <div class="commentBox commentBox_3" >
                        <div class="comment_matter">
                            <p>Klik på de værktøjer du
                                har fundet mest værdifulde
                                for dig.
                                Klik på FÆRDIG, når du er
                                færdig..</p>
                        </div>
                        <i class="bottom_icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<button id="addTool" type="button" class="RadCornAll">TILFØJ NY</button>-->
    
    <div class="toolbtncontr">
        <button id="addTool" class="footerBtn greenBtn" style="display: none;"><i class="tickMark">tick mark</i>FÆRDIG</button>
        <button id="addTool" class="footerBtn grayBtn" style="display: block;" disabled><i class="tickMark">tick mark</i>FÆRDIG</button>
    </div>

    <script>
        
        $(document).ready(function () {
            setTimeout( function(){
                // Loader
                <?php foreach (($usertool?:array()) as $utool): ?>
                    $('#<?php echo $utool['tid']; ?>').show();
                <?php endforeach; ?>
                // End Loader
				
				//checking if tool is already selected
				$('.tick_Icon').each(function(i, obj) {
					if($(obj).is(":visible"))
					{
						$('.grayBtn').hide();
						$('.greenBtn').show();
					}
				});
			
            },100);
			
			
        });
        
		function setUsefullToolButtonStatus()
		{
			//checking if tool is already selected
			var flag = false;
			$('.tick_Icon').each(function(i, obj) {
				if($(obj).is(":visible"))
				{
					flag = true;
				}
			});
			
			if(flag)
			{
				$('.grayBtn').hide();
				$('.greenBtn').show();
			}
			else
			{
				$('.greenBtn').hide();
				$('.grayBtn').show();
			}
		}
		
        function selectusefultool(usrtool,tlid){ 
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usefultool/selusefultool",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { tool: usrtool, toolid: tlid },
                success: function (data) { 
                    if (data.status == 'success') {
                        $('#tool'+tlid).toggle();
                        //$('.grayBtn').hide();
                        //$('.greenBtn').show();
						setUsefullToolButtonStatus();
						
                    } else if(data.status == 'failed'){
                        $('#tool'+tlid).toggle();
                        //$('.greenBtn').hide();
                        //$('.grayBtn').show();                        
						setUsefullToolButtonStatus();
                    }
                }
            });
        }
        
        $('#addTool').click(function () { 
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/usefultool/saveusefultool",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { },
                success: function (data) { 
                    if (data.status == 'success') {
                        unlockDiv("#step8-5");
                        updateStep("8.5");
                    }
                }
            });
        });
       /*   $( ".widget_box" ).hover(      
                 function () {
                    var id = $(this).attr('id');
                     //$('#widgetcomment').show(0).delay(1000).hide(0); 
                     $('#widgetcomment').hide();
               }, 
               function () {
                    $('.Personhandlemidcontbox').removeClass("action-selected");
               }
             );*/

           $( ".widget_box" )
             .mouseover(function() {        
                $('#widgetcomment').hide();
             })
             .mouseout(function() {
               $('#widgetcomment').show();
            }); 
            
           $('#widget_box').click(function () { 
              //alert("Widget box");
              $('#widgetcomment').hide();
           });      
    </script>
    
</div>  

<br/>
<br/>
<br/>

<div id="step8-5" class="videoHolderBox lock">
    <div class="ChaptHead"> Din personlige forebyggelsesplan</div>
    <div class="VideoContainer">

        <video id="step8-5-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.5.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-5-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step8-6").offset().top
                }, 1000);
                unlockDiv("#step8-6");
                updateStep("8.6");
                <?php else: ?>
                        unlockDiv("#step8-6");
                
                <?php endif; ?>
            });
        });
    </script>

</div>
<br/>
<br/>
<br/>

<!--END OF STEP-->

<div id="step8-6" class="videoHolderBox lock">
    <div class="ChaptHead"> Kortlægning af <br/>risikosituationer/udløsende faktorer</div>
    <div class="VideoContainer">

        <video id="step8-6-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.6.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-7-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.7.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-6-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step8-7").offset().top
                }, 1000);
                unlockDiv("#step8-7");
                updateStep("8.7");
                <?php else: ?>
                        unlockDiv("#step8-7");
                
                <?php endif; ?>
            });
        });
    </script>

</div>

<br/>
<br/>
<br/>

<div id="step8-7" class="videoHolderBox lock">
    <div class="ChaptHead">Risikosituationer og udløsende faktorer</div>
    
    <div class="riskcontr">
        <div class="riskleft">
            <div class='risklefttitle'>Typiske udløsende faktorer</div>
            <div class='riskleftcontbox'>
                <div class='riskleftcontent'>Forandringer f.eks. flytning/skift af skole/job </div>
                <div class='riskleftcontent'>Længerevarende overbelastning i forbindelse med arbejde/uddannelse</div>
                <div class='riskleftcontent'>Økonomiske problemer</div>
                <div class='riskleftcontent'>Tab f.eks. i forbindelse skilsmisse</div>
                <div class='riskleftcontent'>kærestebrud eller dødsfald  </div>
                <div class='riskleftcontent'>Fysisk sygdom </div>
                <div class='riskleftcontent'>Konflikter </div>
                <div class='riskleftcontent'>Ensomhed  </div>
            </div>
            <div class='riskleftfooter'></div>
        </div>
        <div class="riskmidl">
            <div class='riskmidltitle'>Dine risikosituationer</div>
            <div id='droppable' class='riskmidcontent'> </div>            
                    <div id="messageBox1" class="popover bottom" style="width:175px;"> 
                    <h3>Er du sikker på, at du vil slette denne risikosituation?</h3>
                         <div class="twoBtn">
                             
                             <button class="btn_left" onclick="deleteconfirmcancel()">Nej</button>
                             <button class="btn_right" onclick="deleteconfirmok()">Ja</button>
                         </div>
                         
                    </div>
            
            <input type="hidden" name="delrskid" class="delrskid" value="" />
                     
            <div class='riskmidlfooter' data-toggle="popover">
                <img src="<?php echo $ROOT; ?>/assets/img/plusiconstep6.png" width="10" height="10" /> TILFØJ NY RISIKOSITUATION
            </div>
        </div>
        <div class="riskright">
            <div class='riskrighttitle'>Situationer hvor du har haft negative automatiske tanker</div>
            <div class='riskrightcont'>
                <?php foreach (($natnegthts?:array()) as $negtht): ?>
                    <div class='riskrightcontbox'><?php echo $negtht['negthts']; ?></div>
                <?php endforeach; ?>                
            </div>
            <div class='riskrightfooter'></div>
        </div>
    </div>
    
    <div id="riskmidlfooterContent" class="popover top">
        <div class="popover_cont_top">
            <div class="title">Beskriv risikosituationen kort og klik på FÆRDIG når du er færdig</div>
            <input type="text" class="risksitn" size="34" value="" />
        </div>
        <div class="riskstnbtncontr">
            <div class="risksitnleftbtn">
                <i class="popover_closeIcon"></i>
                <a href="javascript:void(0)" class="NCB-close rskleftbtnclose" onclick="hideaddnewrisk()">FORTRYD</a>                
           </div>
           <div class="risksitnrightbtn">
                <i class="popover_tickIcon"></i>
                <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserrisk()">FÆRDIG</a>
           </div>
        </div>
    </div>
     <div class="toolbtncontr">
        <button id="addRisk" class="footerBtn greenriskBtn" style="display: none;"><i class="tickMark">tick mark</i>FÆRDIG</button>
        <button id="addRisk" class="footerBtn grayriskBtn " style="display: block;" disabled><i class="tickMark">tick mark</i>FÆRDIG</button>
    </div>
    
    
    <script>
        $('.riskleftcontbox .riskleftcontent').each(function() {
            $(this).draggable({
                helper: 'clone',
                revert: true,
                zIndex: 9999,
                appendTo: '.riskmidcontent'
            });
        });
        
        $('.riskrightcont .riskrightcontbox').each(function() {
            $(this).draggable({
                helper: 'clone',
                revert: true,
                zIndex: 99999,
                appendTo: '.riskmidcontent'
            });
        });
        
        $( "#droppable" ).droppable({
            drop: function( event, ui ) {                
                var usrrisk= $(ui.draggable).text();
                            
                $.ajax({
                    url: "<?php echo $ROOT; ?>/window/risksitn/saveuserrisks",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: { urisk: usrrisk, owner: 0 },
                    success: function (data) { 
                        if (data.status == 'success') {
                            $('.riskmidlfooter').popover('hide');
                            $.ajax({
                                url: "<?php echo $ROOT; ?>/window/risksitn/show",
                                type: 'GET',
                                dataType: 'json',
                                async: false,
                                data: { },
                                beforeSend: function() {
                                //alert("beforeSend");
                                   $('.riskmidcontent').html("<img src='<?php echo $ROOT; ?>/assets/img/loading.gif' />");
                                },
                                success: function (data) { 
                                    if (data.status == 'success') { 
                                        $('.riskmidcontent').html(data.usrrsk);
                                        $('.grayriskBtn').hide();
                                        $('.greenriskBtn').show();
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });
                
        $(document).ready(function (){
            // modal help
            $('.riskmidlfooter').popover({
                content: $('#riskmidlfooterContent').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });
            
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/risksitn/show",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: { },
                success: function (data) { 
                    if (data.status == 'success') { 
                        $('.riskmidcontent').html(data.usrrsk);
                    }
                }
            });            
            
                       
        });
        
       /* $( ".risksitnleftbtn" ).click(function() {
            $('.riskmidlfooter').popover('hide');
        });*/
        function hideaddnewrisk(){
            $('.riskmidlfooter').popover('hide');
        }
        
        function saveuserrisk(){ 
            var risk = $(".risksitn").val();
            
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/risksitn/saveuserrisks",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { urisk: risk, owner: 1 },
                success: function (data) { 
                    if (data.status == 'success') {
                        $('.riskmidlfooter').popover('hide');
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/risksitn/show",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: { },
                            success: function (data) { 
                                if (data.status == 'success') { 
                                    $('.riskmidcontent').html(data.usrrsk);
                                    $('.grayriskBtn').hide();
                                    $('.greenriskBtn').show();
                                }
                            }
                        });
                    }
                }
            });
        }
        
        function deleteconfirmcancel(){
            var riskid = $(".delrskid").val();
            var riskconfrm =riskid;
            var riskconfrmID = '#riskclose_' + riskconfrm; 
            $(riskconfrmID).popover('toggle');
        }
        
       $( ".closeIcon" ).click(function() {
            $('.messageBox').hide();
        });
        
        function showdelconfirm(rkid){
            //alert('riskid='+rkid);
            var riskconfrm =rkid;
            var riskconfrmID = '#riskclose_' + riskconfrm; 
            $(riskconfrmID).popover({
            content: $('#messageBox1').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
           });
            $(".delrskid").val(rkid);
        }
        
        function deleteconfirmok(){
            var riskid = $(".delrskid").val();
            //alert('riskid='+riskid);
            var riskconfrm =riskid;
            var riskconfrmID = '#riskclose_' + riskconfrm; 
            $(riskconfrmID).popover('toggle'); 
            deluserrisk(riskid);
        }
        
        function deluserrisk(rskid){ 
            //alert('riskid='+rskid);
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/risksitn/deluserrisk",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { id: rskid },
                success: function (data) { 
                    if (data.status == 'success') {
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/risksitn/show",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: { },
                            success: function (data) { 
                                if (data.status == 'success') {               
                                    $('.riskmidcontent').html(data.usrrsk);
                                }
                            }
                        });
                    }
                }
            });
        }
        
        $( "#addRisk" ).click(function() {
           //alert("step update");
           unlockDiv("#step8-8");
           updateStep("8.8"); 
        });
    </script>

</div><!--Video holder box end-->

<!--8.7 Risikosituationer og udløsende faktorer -->

<br/>
<br/>
<br/>

<div id="step8-8" class="videoHolderBox lock">
    <div class="ChaptHead"> Kortlægning af tidlige tegn</div>
    <div class="VideoContainer">

        <video id="step8-8-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.8.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-8-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step8-9").offset().top
                }, 1000);
                unlockDiv("#step8-9");
                updateStep("8.9");
                
                <?php else: ?>
                        unlockDiv("#step8-9");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--8.8 Aktivitetsregistrering -->
<br/>
<br/>
<br/>

<div id="step8-9" class="videoHolderBox lock">
    <div class="ChaptHead">  tidlige advarselstegn</div>
    
    <div class="warningcontr">
        <div class="warningleft">
            <div class='warninglefttitle'>Typiske advarselstegn</div>
            <div class='warningleftcontbox'>
                <div class='warningleftcontent' data-title="Se TV">Øget træthed  </div>
                <div class='warningleftcontent' data-title="Læse en bog">Forstyrret søvn f.eks vågner tidligt</div>
                <div class='warningleftcontent'>kan ikke falde i søvn</div>
                <div class='warningleftcontent'>sover dårligt om natten </div>
                <div class='warningleftcontent'>Bliver let urolig og bekymret </div>
                <div class='warningleftcontent'>Begynder at udskyde opgaver du ikke plejer at udskyde </div>
                <div class='warningleftcontent'>Undgår mennesker du plejer at kunne lide at være sammen med </div>
                
            </div>
            <div class='warningleftfooter'></div>
        </div>
        <div class="warningmidl">
            <div class='warningmidltitle'>Dine tidlige advarselstegn</div>
            <div id='droppable_warning' class='warningmidcontent'> </div>
            
            <div id="messageBox2" class="popover bottom">
                    <h3>Er du sikker på, at du vil slette dette advarselstegn?</h3>
                         <div class="twoBtn">
                             
                             <button class="btn_left " onclick="deleteconfirmwarngcancel()">Nej</button>
                             <button class="btn_right" onclick="deleteconfirmwarngok()">Ja</button>
                         </div>
                
            </div>
            <input type="hidden" name="delwarngid" class="delwarngid" value="" />
            <div id="warningcomment" style="display:none;left: 55px;">
                <div class="commentBox commentBox_2" >
                    <div class="comment_matter">
                        <p>Beskriv advarselstegnet kort og 
                            klik på FÆRDIG når du er færdig.</p>
                    </div>
                    <i class="bottom_icon"></i>
                </div>
            </div>
            <div class='warningmidlfooter' data-toggle="popover" id="warningmidlfooter">
                <img src="<?php echo $ROOT; ?>/assets/img/plusiconstep6.png" width="10" height="10" /> TILFØJ NYT ADVARSELSTEGN
            </div>
        </div>
 
    </div>
    
    <!--<div id="warningmidlfooterContent" class="popover top">
        <div class="title">Beskriv aktiviteten kort og klik på FÆRDIG når du er færdig</div>
        <input type="text" class="warningitn" size="34" value="" />

        <div class="warningtnbtncontr">
            <div class="warningitnleftbtn"><a href="javascript:void(0)" class="NCB-close">FORTRYD</a></div>
            <div class="warningitnrightbtn"><a href="javascript:void(0)" class="NCB-tick" onclick="saveuserwarning()">FÆRDIG</a></div>
        </div>
    </div>-->
    
    <div id="warningmidlfooterContent" class="popover top">
        <div class="popover_cont_top">
            <div class="title">Beskriv advarselstegnet kort og klik på FÆRDIG når du er færdig</div>
            <input type="text" class="warningitn" size="34" value="" />
        </div>
        <div class="riskstnbtncontr">
            <div class="risksitnleftbtn">
                <i class="popover_closeIcon"></i>
                <a href="javascript:void(0)" class="NCB-close" onclick="hideaddnewwarning()">FORTRYD</a>
                
           </div>
           <div class="risksitnrightbtn">
               <i class="popover_tickIcon"></i>
                <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserwarning()">FÆRDIG</a>
           </div>
        </div>
    </div>
    <div class="toolbtncontr">
        <button id="addWarning" class="footerBtn greenwarningBtn" style="display: none;"><i class="tickMark">tick mark</i>FÆRDIG</button>
        <button id="addWarning" class="footerBtn graywarningBtn " style="display: block;" disabled><i class="tickMark">tick mark</i>FÆRDIG</button>
    </div>
    
    
    
    <script>
        $('.warningleftcontbox .warningleftcontent').each(function() {
            $(this).draggable({
                helper: 'clone',
                revert: true,
                zIndex: 9999,
                appendTo: '.warningmidcontent'
            });
        });
        
        $('.warningrightcont .warningrightcontbox').each(function() {
            $(this).draggable({
                helper: 'clone',
                revert: true,
                zIndex: 9999,
                appendTo: '.warningmidcontent'
            });
        });
        
        $( "#droppable_warning" ).droppable({
            drop: function( event, ui ) {                
                var usrrisk= $(ui.draggable).text();   
                $.ajax({
                    url: "<?php echo $ROOT; ?>/window/warningitn/saveuserwarnings",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: { urisk: usrrisk, owner: 0 },
                    success: function (data) { 
                        if (data.status == 'success') {
                            $('.riskmidlfooter').popover('hide');
                            $.ajax({
                                url: "<?php echo $ROOT; ?>/window/warningitn/show",
                                type: 'GET',
                                dataType: 'json',
                                async: false,
                                data: { },
                                beforeSend: function() {
                                 //alert("beforeSend");
                                 $('.warningmidcontent').html("<img src='<?php echo $ROOT; ?>/assets/img/loading.gif' />");
                                 },
                                success: function (data) { 
                                    if (data.status == 'success') { 
                                        $('.warningmidcontent').html(data.usrrsk);
                                       /* unlockDiv("#step8-10");
                                        updateStep("6.10");*/
                                        $('.graywarningBtn').hide();
                                        $('.greenwarningBtn').show();
                                    }
                                }
                            });
                        }
                    }
                });
            }
        });
                
        $(document).ready(function (){
            // modal help
            $('.warningmidlfooter').popover({
                content: $('#warningmidlfooterContent').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });
            
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/warningitn/show",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: { },
                success: function (data) { 
                    if (data.status == 'success') { 
                        $('.warningmidcontent').html(data.usrrsk);
                    }
                }
            });
        });
        
        function saveuserwarning(){ 
            var risk = $(".warningitn").val();
            
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/warningitn/saveuserwarnings",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { urisk: risk, owner: 1 },
                success: function (data) { 
                    if (data.status == 'success') {
                        $('.warningmidlfooter').popover('hide');
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/warningitn/show",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: { },
                            success: function (data) { 
                                if (data.status == 'success') { 
                                    $('.warningmidcontent').html(data.usrrsk);
                                  /*  unlockDiv("#step8-10");
                                    updateStep("6.10");*/
                                        $('.graywarningBtn').hide();
                                        $('.greenwarningBtn').show();
                                }
                            }
                        });
                    }
                }
            });
        }
        
        function hideaddnewwarning()
        {
            $('.warningmidlfooter').popover('hide');
        }
        
         function showdelwarngconfirm(warng_id){
            var warngconfrm =warng_id;
            //alert(warngconfrm);
            var warngconfrmID = '#warngclose_'+ warngconfrm; 
            $(warngconfrmID).popover({
            content: $('#messageBox2').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
           });
            $(".delwarngid").val(warng_id);
        }
        
        function deleteconfirmwarngcancel(){
            var warng_id = $(".delwarngid").val();
            var warngconfrm =warng_id;
            var warngconfrmID = '#warngclose_' + warngconfrm; 
            $(warngconfrmID).popover('toggle');
        }
        
        function deleteconfirmwarngok(){
            var warng_id = $(".delwarngid").val();
            var warngconfrm =warng_id;
            var warngconfrmID = '#warngclose_' + warngconfrm; 
            $(warngconfrmID).popover('toggle'); 
            deluserwarning(warng_id);
        }
        function deluserwarning(warng_id){
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/warningitn/deluserwarning",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: { id: warng_id },
                success: function (data) { 
                    if (data.status == 'success') {
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/warningitn/show",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: { },
                            success: function (data) { 
                                if (data.status == 'success') { 
                                    $('.warningmidcontent').html(data.usrrsk);
                                }
                                else
                                {
                                    if(data.usrrsk == "22")
                                    {
                                        $('.warningmidcontent').html("");
                                    }
                                }
                            }
                        });
                    }
                }
            });
        }
        $( "#addWarning" ).click(function() {
           //alert("step update");
           unlockDiv("#step8-10");
           updateStep("8.10"); 
        });
        /*
          $( "#warningmidlfooter" ).hover(      
                 function () {
                     //var id = $(this).attr('id');                 
                     $('#warningcomment').show(0).delay(5000).hide(0); 
                   // alert("Hover")
               }, 
               function () {
                    $('.Personhandlemidcontbox').removeClass("action-selected");
               }
             );*/
    
    
$( "#warningmidlfooter" )
.mouseover(function() {
   $('#warningcomment').show();
})
.mouseout(function() {
  $('#warningcomment').hide();
});
    </script>

</div><!--Video holder box end-->

<!--8.9  -->
<br/>
<br/>
<br/>

<div id="step8-10" class="videoHolderBox lock">
    <div class="ChaptHead"> Personlig handleplan ved risikosituationer
og tidlige tegn på depression</div>
    <div class="VideoContainer">

        <video id="step8-10-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.10.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-10-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                <?php if (!isset($readonly)): ?>
                $('body').animate({
                    scrollTop: $("#step8-11").offset().top
                }, 1000);
                unlockDiv("#step8-11");
                updateStep("8.11");
                
                <?php else: ?>
                        unlockDiv("#step8-11");
                
                <?php endif; ?>
            });
        });
    </script>

</div><!--Video holder box end-->

<!--8.10  -->
<br/>
<br/>
<br/>

<div id="step8-11" class="videoHolderBox lock">
    <div class="ChaptHead"> Personlig handleplan </div>
       <div class="Personhandlecontr">
        <div class="Personhandleleft">
            <div class='Personhandlelefttitle'>Dine risikosituationer</div>
            <div class='Personhandleleftcontbox'>
            </div>
            <div id="messageBox4" class="popover bottom">
                <h3>Er du sikker på, at du vil slette denne risikosituation?</h3>
                <div class="twoBtn">
                    <button class="btn_left" onclick="deleteconfirmrisksitncancel()">Nej</button>
                    <button class="btn_right" onclick="deleteconfirmrisksitnok()">Ja</button>
                </div>                
            </div>
            <input type="hidden" name="delrisksitnid" class="delrisksitnid" value="" />
            <div class='Personhandleleftfooter' data-toggle="popover">
                <img src="<?php echo $ROOT; ?>/assets/img/plusiconstep6.png" width="10" height="10" /> Tilføj ny risikosituation
            </div>
        </div>
        <div class="Personhandlemidl">
            <div class='Personhandlemidltitle'>Dine tidlige advarselstegn</div>   
            <div class='Personhandlemidcontent'> </div>
            <div id="messageBox3" class="popover bottom">
                <h3>Er du sikker på, at du vil slette dette advarselstegn?</h3>
                <div class="twoBtn">                            
                    <button class="btn_left" onclick="deleteconfirmwarngsignscancel()">Nej</button>
                    <button class="btn_right" onclick="deleteconfirmwarngsignsok()">Ja</button>
                </div>
            </div>
            <input type="hidden" name="delwarngsignid" class="delwarngsignid" value="" />
            <div>
                <div class="commentBox commentBox_1" id="commentBox" style="display:none" >
                    <i class="top_icon"></i>
                    <div class="comment_matter">
                        <p>Klik på et af dine tidlige advarselstegn for at beskrive en handleplan for det</p>
                    </div>
                </div>
            </div>
            <div class='Personhandlemidlfooter' data-toggle="popover">
                <img src="<?php echo $ROOT; ?>/assets/img/plusiconstep6.png" width="10" height="10" /> Tilføj nyt advarselstegn
            </div>
        </div>
        <div class="Personhandleright">
            <div class='Personhandlerighttitle'>Handleplan</div>
            <div class='Personhandlerightcont'>       
               <div style="width:219px; height:250px; margin-top:3px; background: #fff; text-align: center;" class="Personhandlerightinner" id="Personhandlerightinner">
                   <div id="Personhandlerightinnercontent"></div>
                    <div id="Personhandletextmessage" style="display:none;position: absolute;top:150px;left: 40px;">
                        <div class="commentBox " id="commentBox5">
                            <i class="top_icon"></i>
                            <div class="comment_matter">
                                <p>Hvad vil du gøre, hvis du  
                                 opdager det valgte advarselstegn? 
                                 Hvad er din plan?
                                 Klik her og beskriv det.</p>
                            </div>
                        </div>
                    </div>
                 <div id="PersonhandletextContent" style="display:none">
                    <input type="hidden" id="userwaningid" name="userwaningid" value="texens" />
                    <div id="PersonhandletextareaContent">
                        <textarea rows="10" cols="19" style="border-style: none; border-color: Transparent; background: #E6E6E3;" class="Personhandlewarncomment" id="Personhandlewarncomment"></textarea>
                    </div>
                    <div class="Personhandletnbtncontr">
                    <div class="Personhandleitnleftbtn">
                        <i class="close_round_right"></i>
                        <a href="javascript:void(0)" class="NCB-close">FORTRYD</a>
                    </div>
                    <div class="Personhandleitnrightbtn">
                        <i class="tick_round_right"></i>
                        <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserwarningcomment()">FÆRDIG</a>
                    </div>
                    </div>
                 </div>
            </div>
            </div>
        </div>
    </div>
    
    <div id="PersonhandleleftlfooterContent" class="popover top">
        <div class="popover_cont_top">
            <div class="title">Beskriv risikosituationen kort og klik på FÆRDIG når du er færdig</div>
            <input type="text" class="Personhandleriskitn" size="34" value="" />
        </div>
        <div class="riskstnbtncontr">
            <div class="risksitnleftbtn">
                <i class="popover_closeIcon"></i>
                <a href="javascript:void(0)" class="NCB-close" onclick="hideuserrisksituations()" >FORTRYD</a>                
           </div>
           <div class="risksitnrightbtn">
               <i class="popover_tickIcon"></i>
                <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserrisksituations()">FÆRDIG</a>
           </div>
        </div>
    </div>
    
    <div id="PersonhandlemidlfooterContent" class="popover top">
        <div class="popover_cont_top">
            <div class="title">Beskriv advarselstegnet kort og klik på FÆRDIG når du er færdig.</div>
            <input type="text" class="Personhandleitn" size="20" value="" />
        </div>
        <div class="riskstnbtncontr">
            <div class="risksitnleftbtn">
                <i class="popover_closeIcon"></i>
                <a href="javascript:void(0)" class="NCB-close" onclick="hideuserwarningsigns()">FORTRYD</a>                
           </div>
           <div class="risksitnrightbtn">
               <i class="popover_tickIcon"></i>
                <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserwarningsigns()">FÆRDIG</a>
           </div>
        </div>
    </div>    

    <div class="toolbtncontr">
        <button id="addComment" class="footerBtn greencommentBtn" style="display: none;"><i class="tickMark">tick mark</i>FÆRDIG</button>
        <button id="addComment" class="footerBtn graycommentBtn " style="display: block;" disabled><i class="tickMark">tick mark</i>FÆRDIG</button>
    </div>    
    
    <script>
        
        
         $(document).ready(function (){
             // modal help
             $('.Personhandlemidlfooter').popover({
                 content: $('#PersonhandlemidlfooterContent').html(),
                 html: true,
                 placement: 'top',
                 trigger: 'click'
             });
          
            
             $('.Personhandleleftfooter').popover({
                 content: $('#PersonhandleleftlfooterContent').html(),
                 html: true,
                 placement: 'top',
                 trigger: 'click'
             });
            
             
                        
                            
         });
         
         
         $( window ).load(function() {
            $.ajax({
                 url: "<?php echo $ROOT; ?>/window/personhandleitn/showrisk",
                 type: 'GET',
                 dataType: 'json',
                 async: false,
                 data: { },
                 beforeSend: function() {
                       //alert("beforeSend");
                      $('.Personhandleleftcontbox').html("<img src='<?php echo $ROOT; ?>/assets/img/loading.gif' />");
                 },
                 success: function (data) { 
                     if (data.status == 'success') { 
                         $('.Personhandleleftcontbox').html(data.usrrsk);
                     }
                 }
             });
            
             $.ajax({
                 url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarnings",
                 type: 'GET',
                 dataType: 'json',
                 async: false,
                 data: { },
                 beforeSend: function() {
                       //alert("beforeSend");
                      $('.Personhandlemidcontent').html("<img src='<?php echo $ROOT; ?>/assets/img/loading.gif' />");
                 },
                 success: function (data) { 
                     if (data.status == 'success') {
                         $(this).parentsUntil('popover', '.popover.fade.top').remove();
                         $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                         $('.Personhandlemidcontent').html(data.usrrsk);
                         
                            var warngsignconfrmID = '.Personhandleclosebtn';    
                            $(warngsignconfrmID).popover({
                              content: $('#messageBox3').html(),
                              html: true,
                              placement: 'bottom',
                              trigger: 'click'

                             });
                     }
                 }
             });
             
             $( ".Personhandlemidtitle" )
             .mouseover(function() {
                $('#commentBox').show();
                //$('#Personhandletextmessage').hide();
             })
             .mouseout(function() {
               //$('#commentBox').hide();
            });  
          });


        
         $('.popover.fade.top').each(function() {
             $(this).remove();
         });
         
         function hideuserwarningsigns()
         {
            $('.Personhandlemidlfooter').popover('toggle');
         }
         
         function saveuserwarningcomment()
         {
              var warningid = $("#userwaningid").val();
              var comment   = $(".Personhandlewarncomment").val();
              
              $.ajax({
                 url: "<?php echo $ROOT; ?>/window/personhandleitn/saveuserwarningcomment",
                 type: 'POST',
                 dataType: 'json',
                 async: false,
                 data: { uwarningid: warningid, ucomment: comment },
                 success: function (data) { 
                     if (data.status == 'success') {
                         $.ajax({
                             url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarningcomment",
                             type: 'GET',
                             dataType: 'json',
                             async: false,
                             data: {uwarningid: warningid },
                             success: function (data) { 
                                 if (data.status == 'success') { 
                                     $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                     $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                     $('#Personhandlewarncomment').val(data.usrrsk);
                                     $('.graycommentBtn').hide();
                                     $('.greencommentBtn').show();
                                 }
                             }
                         });
                     }
                 }
             });             
         }
         
         function rvmcontbox(id){
           
            $("#Personhandlewarncomment").val('');
            
            $('.Personhandlemidcontbox').removeClass('Personhandlemidcontboxactiv');
            
            $('#'+id).addClass('Personhandlemidcontboxactiv');
            
            $.ajax({
               url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarningcomment",
               type: 'GET',
               dataType: 'json',
               async: false,
               data: {uwarningid: id },
               success: function (data) { 

                   if (data.statusID ==100) {
                       $("#Personhandlewarncomment").val(data.usrrsk);
                       document.getElementById('PersonhandletextContent').style.display='block'; 
                       $('#Personhandletextmessage').hide();
                       $('#commentBox').hide();

                   }
                   else{
                         $("#Personhandlewarncomment").val('');
                         document.getElementById('PersonhandletextContent').style.display='block'; 
                         $('#commentBox').hide();
                         $('#Personhandletextmessage').show();
                   }
               }
            });

            $("#userwaningid").val(id); 
        }
        $('textarea').focus(function(){    
            $('#Personhandletextmessage').hide(); 
        });
        
        
        function saveuserwarningsigns(){ 
             var warning = $(".Personhandleitn").val();
                         
             $.ajax({
                 url: "<?php echo $ROOT; ?>/window/personhandleitn/saveuserwarningsigns",
                 type: 'POST',
                 dataType: 'json',
                 async: false,
                 data: { uwarning: warning, owner: 1 },
                 success: function (data) { 
                     if (data.status == 'success') {
                        
                         $('.Personhandlemidlfooter').popover('hide');
                         $.ajax({
                             url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarnings",
                             type: 'GET',
                             dataType: 'json',
                             async: false,
                             data: { },
                             success: function (data) { 
                                if (data.status == 'success') { 
                                     $('.popover.fade.top').each(function() {
                                         $(this).remove();
                                     });
                                     $('.popover.fade.bottom').each(function() {
                                         $(this).remove();
                                     });
                                     
                                     $('.Personhandlemidcontent').html(data.usrrsk);                                     
                                 }
                             }
                         });
                     }
                 }
             });
         }
        
        function showdelwarngsignsconfirm(warng_id){
            var warngsignconfrm =warng_id;
            var warngsignconfrmID = '.Personhandleclosebtn'; 
            $(warngsignconfrmID).popover({
            content: $('#messageBox3').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
            
           });
           $('#Personhandletextmessage').hide();
            $(".delwarngsignid").val(warng_id);
        }
        
         function deleteconfirmwarngsignscancel(){
            var warng_id = $(".delwarngsignid").val();
            var warngsignconfrm =warng_id;
            var warngsignconfrmID = '#warngsignsclose_' + warngsignconfrm; 
            $(warngsignconfrmID).popover('toggle');
        }
        
        function deleteconfirmwarngsignsok(){
            var rskid = $(".delwarngsignid").val();
            var warngsignconfrm =rskid;
            var warngsignconfrmID = '#warngsignsclose_' + warngsignconfrm; 
            $(warngsignconfrmID).popover('toggle'); 
            deleteuserwarningsigns(rskid);
        }
        
         function deleteuserwarningsigns(rskid){             
             $.ajax({
                 url: "<?php echo $ROOT; ?>/window/personhandleitn/deluserwarningsigns",
                 type: 'POST',
                 dataType: 'json',
                 async: false,
                 data: { id: rskid },
                 success: function (data) { 
                     if (data.status == 'success') {
                         $.ajax({
                             url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarnings",
                             type: 'GET',
                             dataType: 'json',
                             async: false,
                             data: { },
                             success: function (data) { 
                                 if (data.status == 'success') { 
                                     $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                     $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                     $('.Personhandlemidcontent').html(data.usrrsk);
                                    
                                 }
                             }
                         });
                     }
                 }
             });
         }
         
         function saveuserrisksituations(){ 
             var risk = $(".Personhandleriskitn").val();
             
             $.ajax({
                 url: "<?php echo $ROOT; ?>/window/personhandleitn/saveuserrisksituations",
                 type: 'POST',
                 dataType: 'json',
                 async: false,
                 data: { urisk: risk, owner: 1 },
                 success: function (data) { 
                     if (data.status == 'success') {
                         $('.Personhandleleftfooter').popover('hide');
                         $.ajax({
                             url: "<?php echo $ROOT; ?>/window/personhandleitn/showrisk",
                             type: 'GET',
                             dataType: 'json',
                             async: false,
                             data: { },
                             success: function (data) { 
                                 if (data.status == 'success') { 
                                     $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                     $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                     $('.Personhandleleftcontbox').html(data.usrrsk);
                                 }
                             }
                         });
                     }
                 }
             });
         }
         
         function hideuserrisksituations()
         {
              $('.Personhandleleftfooter').popover('toggle');
         }
         
         function showdelrisksitnconfirm(risksitnid)
         {
             var risksitnconfrm =risksitnid;
            var risksitnconfrmID = '#risksitnclose_'+ risksitnconfrm; 
            $(risksitnconfrmID).popover({
            content: $('#messageBox4').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
            
           });
            $(".delrisksitnid").val(risksitnid);
         }
         
         function deleteconfirmrisksitncancel(){
            var risksitnid = $(".delrisksitnid").val();
            var risksitnconfrm =risksitnid;
            var risksitnconfrmID = '#risksitnclose_' + risksitnconfrm; 
            $(risksitnconfrmID).popover('toggle');
        }
        
        function deleteconfirmrisksitnok(){
            var rskid = $(".delrisksitnid").val();
            var risksitnconfrm =rskid;
            var risksitnconfrmID = '#risksitnclose_' + risksitnconfrm; 
            $(risksitnconfrmID).popover('toggle'); 
            deluserrisksituation(rskid);
        }
        
         function deluserrisksituation(rskid){ 
             $.ajax({
                 url: "<?php echo $ROOT; ?>/window/personhandleitn/deluserrisksituation",
                 type: 'POST',
                 dataType: 'json',
                 async: false,
                 data: { id: rskid },
                 success: function (data) { 
                     if (data.status == 'success') {
                         $.ajax({
                             url: "<?php echo $ROOT; ?>/window/personhandleitn/showrisk",
                             type: 'GET',
                             dataType: 'json',
                             async: false,
                             data: { },
                             success: function (data) { 
                                 if (data.status == 'success') { 
                                     $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                     $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                     $('.Personhandleleftcontbox').html(data.usrrsk);
                                 }
                             }
                         });
                     }
                 }
             });                                    
         }
        
     $( "#addComment" ).click(function() {
        unlockDiv("#step8-12");
        updateStep("8.12"); 
     });
    </script>    
   
</div><!--Video holder box end-->

<!--8.11 -->
<br/>
<br/>
<br/>


<div id="step8-12" class="videoHolderBox lock">
    <div class="ChaptHead">Afslutning</div>
    <div class="VideoContainer">

        <video id="step8-12-video" class="video-js vjs-default-skin vjs-big-play-centered" controls
               preload="<?php echo $preload; ?>" width="720" height="406"
               poster="<?php echo $ROOT; ?>/assets/img/step6.poster.png"
               data-setup="{}">
            <source src="<?php echo $VIDEOURL; ?>6.12.mp4" type='video/mp4'/>
        </video>

    </div>
    <!--NU Download Box start-->

    <!--<div class="NUDownload">
        <a id="step2-5-download"
           href="<?php echo $ROOT; ?>/app/data/videos/2.5.mp4" class="">DOWNLOAD</a>
    </div>-->
    <!-- NU Download Box end-->
    <script>
        videojs("step8-12-video").ready(function () {
            var myPlayer = this;
            this.on('ended', function () {
                myPlayer.exitFullscreen();
                
                unlockDiv("#step8-14");
                  
              
            });
        });
    </script>

</div><!--Video holder box end-->


<br/>
<br/>
<br/>

<!--END OF STEP-->

<div id="step8-14" class="lock">

    <div id="StepLogo"></div>

    <div class="StepSubHead">Godt gået!<br/>
          Du har færdiggjort Trin 6.
    </div>

    <div class="StepTitle">Forebyggelse af tilbagefald</div>

    <div class="StepSubText">   
          <br/>
        <div id="HomeButton"><a href="<?php echo $ROOT; ?>" onclick='updateStep("8.14")'>ARBEJDSBORD</a></div>
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
           
    <?php if (isset($currentStep) && $currentStep == '8' && $currentSubStep == '13'): ?>      
        unlockDiv("#step8-13");
        //setTimeout(function(){ checksixthqstncompleted() }, 1000);
    <?php endif; ?>

</script>
