<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Dashboard</title>
        <style type="text/css">
            body {
                background-color: #e7e8e6;
                font-family: Arial, Helvetica, sans-serif;
            }
            /*  li .MM-Speach:hover, li .MM-Book:hover, li .MM-Sett:hover, li .MM-Help:hover, li .MM-Close:hover {
                background: #61636C;
            }*/
            /*            .subMenu {
                            width: 175px;
                            height: auto;
                            background: #000; 
                            color: #fff;
                        }*/
            .sub-menu, .sub-menu-2 {
                background: none repeat scroll 0 0 #83888B;
                float: left;
                height: auto;
                margin: 0 0 0 -34px !important;
                position: absolute;
                top: 52px;
                width: 175px;
                z-index: 99999;
                display:none;
            }
            i.topIcon {
                background: url("<?php echo $ROOT; ?>/assets/img/dd_boxpeakgrey.8.png") no-repeat scroll 72px -1px rgba(0, 0, 0, 0);
                display: block;
                float: left;
                height: 10px;
                margin: -10px 0 0;
                width: 100%;
            }
            i.topIcon1 {
                background: url("<?php echo $ROOT; ?>/assets/img/Arrow_Green.png") no-repeat scroll 72px -1px rgba(0, 0, 0, 0);
                display: block;
                float: left;
                height: 10px;
                margin: -10px 0 0;
                width: 100%;
            }

            #MainMenu .sub-menu li, #MainMenu .sub-menu-2 li {
                border: medium none;
                float: left;
                padding: 0;
                width: 100%;
                cursor: pointer;
            }
            #MainMenu .sub-menu li:hover, #MainMenu .sub-menu li.active1 {
                background: #99CF9B;
            }
            #MainMenu .sub-menu-2 li:hover, #MainMenu .sub-menu-2 li.active1 {
                background: #99CF9B;
            }
            .sub-menu li:hover i.subIcon, .sub-menu li.active1 i.subIcon {
                background: url("<?php echo $ROOT; ?>/assets/img/dd_message.png") no-repeat scroll 8px 8px #99CF9B;
                display: block;
            }
            .sub-menu-2 li:hover i.subIcon, .sub-menu-2 li.active1 i.subIcon {
                background: url("<?php echo $ROOT; ?>/assets/img/dd_info.png") no-repeat scroll 8px 8px #99CF9B;
            }
            #MainMenu .sub-menu li a, #MainMenu .sub-menu-2 li a {
                line-height: 38px;
                padding: 0;
            }
            .sub-menu li h3, .sub-menu-2 li h3 {
                float: left;
                margin: 0;
                padding: 0 5px;
                font-size: 14px;
                font-weight: normal;
            }
            .sub-menu li i.subIcon {
                background: url("<?php echo $ROOT; ?>/assets/img/dd_message.png") no-repeat scroll 8px 8px #929799;
                display: block;
                float: left;
                height: 20px;
                padding: 10px 8px;
                width: 20px;
            }
            .sub-menu-2 li i.subIcon {
                background: url("<?php echo $ROOT; ?>/assets/img/dd_info.png") no-repeat scroll 8px 8px #929799;
                display: block;
                float: left;
                height: 20px;
                padding: 10px 8px;
                width: 20px;
            }
            
         

        </style>
        <link href="<?php echo $ROOT; ?>/3rdparty/bootstrap/css/bootstrap.custom.css" rel="stylesheet"/>
        <link href="<?php echo $ROOT; ?>/assets/css/dashboard.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $ROOT; ?>/assets/css/sections.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $ROOT; ?>/assets/css/widget.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $ROOT; ?>/assets/css/dd_menu.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $ROOT; ?>/3rdparty/jquery-dropdown-master/jquery.dropdown.css" rel="stylesheet" type="text/css"/>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <script src="<?php echo $ROOT; ?>/3rdparty/jquery/jquery-1.10.min.js"></script>
    </head>

    <body>

        <div id="PageHolder">

             <?php if (!(isset($force_password_change))): ?>
                 <?php if (!(isset($isMasterAdmin))): ?>
                    <div id="homeButton">
                        <?php if ($is_first_login): ?>
                            <a href="<?php echo $ROOT.'/?show_help_guide'; ?>" class="MM-Home Shadow">ARBEJDSBORD</a>
                            <?php else: ?>
                                <a href="<?php echo $ROOT; ?>" class="MM-Home Shadow">ARBEJDSBORD</a>
                            
                        <?php endif; ?>                
                    </div>
                 <?php endif; ?>
             <?php endif; ?>
            <div id="MainMenu">

                <ul>
                    <li><a id="logout" href="javascript:void(0)" data-vertical-offset="-8" data-horizontal-offset="-70"
                           data-dropdown="#dd_box_logout" class="MM-Close Shadow">LOG UD</a></li>
                    <div class="MainMenDivLine"></div>
                <?php if (!(isset($force_password_change))): ?>
                    <?php if (isset($showAdminButton) && $showAdminButton): ?>

                        <li><a href="<?php echo $ROOT; ?>/user" class="MM-Sett Shadow">ENTERPRISE</a></li>
                        
                        <div class="MainMenDivLine"></div>
                        <?php else: ?>
                            <li><a href="javascript:void(0)" id="main-help" data-vertical-offset="-8" data-horizontal-offset="-80" data-dropdown="#dd_box"
                                   class="MM-Help<?php echo (isset($PARAMS['id']) AND substr($PARAMS['id'],9,13) == 'help') ? '-Active' : ''; ?> Shadow">HJÆLP</a></li>
                            <div class="MainMenDivLine"></div>
                            <li><a href="<?php echo $ROOT; ?>/section/settings.profile"
                                   class="MM-Sett<?php echo (isset($PARAMS['id']) AND substr($PARAMS['id'],0,8) == 'settings' AND substr($PARAMS['id'],9,13) != 'help') ? '-Active' : ''; ?> Shadow">INDSTILLINGER</a>
                            </li>
                            <div class="MainMenDivLine"></div>
                            <li class="bibliotek">
                               
                                
                                <a href="<?php echo $ROOT.'/section/library.pdf?stp=1'; ?>"
                                   class="MM-Book<?php echo (isset($PARAMS['id']) AND substr($PARAMS['id'],0,7) == 'library') ? '-Active' : ''; ?> Shadow">BIBLIOTEK</a>

                                
                            </li>
                            <div class="MainMenDivLine"></div>
                            <li id="MainMenuChat">
                                
                                        <a href="<?php echo $ROOT.'/section/messages'; ?>" class="MM-Speach Shadow">BESKEDER</a>
                                        <div id="remchat" style="display:none;border-radius: 100%; width:18px;height:18px; background-color: #D50000;color: white;text-align: center;margin-left: 98px;margin-top: -45px; position:relative;border:1px solid #D50000;"><b>1</b></div>
                                        <?php if (isset($messages)): ?>
                                       
                                        <?php endif; ?>

                            </li>
                        
                    <?php endif; ?>
  <?php endif; ?>
                </ul>
            </div>
        </div>

        <br>

            <div id="content-container">
                
                <br/>
                <br/>
                
               <!-- discharge user method start -->
               <?php if (isset($discharged) && $discharged == '1' && $PATTERN == '/'): ?>
       
               <style>
                    .alert {
                        padding: 15px;
                        margin-bottom: 0px;
                        border: 1px solid transparent;
                        border-radius: 4px;
                    }
                    .alert-info {
                        color: #31708f;
                        background-color: #d9edf7;
                        border-color: #bce8f1;
                    }
                </style>
                <script>
                    $('#widgetContainer').css('margin','40px auto');
                </script>
                <div class="alert alert-info" style="width:800px; margin: auto; margin-bottom: 0px" >
                    Du har nu afsluttet din behandlingsperiode, enten fordi din psykolog har afsluttet dig eller fordi du har været igennem alle trin i programmet. Du kan fortsat anvende programmet i <?php echo $grace_period_left; ?> dage og arbejde videre med de redskaber, du har fået adgang til.
                    <br/>
                    <br/>
                    Du skal være opmærksom på, at du ikke længere bliver fulgt af din psykolog herinde og at du ikke længere kan sende og modtage beskeder. 
                    <br/>
                    <br/>
                    Hvis du har brug for akut hjælp, skal du klikke på redskabet ”Brug for akut psykiatrisk hjælp?” på dit skrivebord. Uanset hvad vil vi også ringe dig op, så vi kan snakke om, hvad det er du oplever. 
                </div>
                <?php endif; ?>
                <!-- discharge user message end -->

                <?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
            </div>

            <div id="ClinicContact" class="popover bottom">
                <p>

                </p>
            </div>

            <?php echo $this->render('dashboard/guides/dashboard.htm',$this->mime,get_defined_vars()); ?>
            <div id="ContentPsychiatricHelp"></div>

            <div id="dd_box" class="dropdown">
                <div class="dd_box_peak"></div>
                <ul class="Shadow">
                    <li><a id="MM-HelpWidget" class="dd_exclamation" href="javascript:void(0)">Brug for akut psykiatrisk hjælp?</a></li>
                    <li><a id="MM-HelpContact" class="dd_contact" href="<?php echo $ROOT.'/section/settings.help'; ?>">Kontakt til klinikken</a></li>
                    <li><a id="MM-Help" class="dd_info" href="<?php echo $ROOT.'?show_help_guide'; ?>">Introduktion til Arbejdsbordet</a></li>
                    <!--<li><a id="MM-IntroVideo" class="dd_info" href="#">Introduktion til programmet</a></li>-->
                </ul>
            </div>

            <div id="dd_box_logout" class="dropdown">
                <div class="dd_box_peak"></div>
                <ul class="Shadow">
                    <li><a id="MM-Fortryd" class="dd_back" href="javascript:void(0)">Fortryd</a></li>
                    <li><a id="MM-Logud" class="dd_close" href="<?php echo $ROOT; ?>/logout">Log ud</a></li>
                </ul>
            </div>

            <script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.custom.min.js"></script>
            <script src="<?php echo $ROOT; ?>/3rdparty/blocksit.js/blocksit.js"></script>
            <script src="<?php echo $ROOT; ?>/3rdparty/jquery-dropdown-master/jquery.dropdown.min.js"></script>

            <script type="text/javascript">
            
             <?php if ((isset($SESSION['group_id'])) && (($SESSION['group_id'] == 1) || ($SESSION['group_id'] == 2) )): ?>
               
               $(document).ready(function(){
              
                    if(document.URL.indexOf("#")==-1)
                    {
                        url = document.URL+"#";
                        location = "#";

                        location.reload(true);
                    }
                });

             <?php endif; ?>
             
            $(document).ready(function() {
                
                msgchecktimer()
                
                /*$('li.bibliotek').hover(function() {
                    $(this).find('.sub-menu-2').fadeIn(300);
                }, function() {
                    $(this).find('.sub-menu-2').fadeOut(300);
                });
                $("li.bibliotek").click(function() {
                    $(".sub-menu-2").toggle();
                });*/
        

                $(".dd_exclamation").hover(
                    function() {
                        $("div.dd_box_peak").addClass("peak_green");
                    },
                    function() {
                        $("div.dd_box_peak").removeClass("peak_green");
                    }
                );

                $(".dd_back").hover(
                    function() {
                        $("div.dd_box_peak").addClass("peak_green");
                    },
                    function() {
                        $("div.dd_box_peak").removeClass("peak_green");
                    }
                );

                $('#MM-Fortryd').click(function() {
                    $('#logout').dropdown('hide');
                });

                $('#MM-HelpWidget, .Dash-Help').click(function(evt) {
                    $('#main-help').dropdown('hide');
                    $('#ContentPsychiatricHelp').load('<?php echo $ROOT; ?>/window/psychiatrichelp', function() {
                        $('#modalPsychiatricHelp').modal('show');
                    });

                    evt.preventDefault();
                    return false;
                });

                $("#MM-IntroVideo").click(function() {
                    $('#main-help').dropdown('hide');
                    $('#videosContainer').load('<?php echo $ROOT; ?>/window/video/0.1.mp4', function() {
                        $('#modalVideo').modal('show');
                    });
                });

               

                $('#MainMenuChat').hover(function() {
                    jQuery(this).find('.sub-menu').fadeIn(300);
                },
            function() {
                        jQuery(this).find('.sub-menu').fadeOut(300);
                    });
                $("#MainMenuChat").click(function() {
                    $(".sub-menu").toggle();
                });
            });


            $(".messagetitle1").unbind("click").click(function() {
                window.location.href = "/section/messages";
            });
            
            
            function checkmsg(){
                
                 $.ajax({
                    url: "/section/checkmessagef",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    success: function(data) {
                        
                        // to work on session expiry
                        if(data.mflag == "-1")
                        {
                            //location.reload();
							window.location = "/login/timeout";
                        }
                        
                        var mflag = data.mflag;

                        if (mflag) {
                            $("#m-" + mflag).addClass("active1");
                            $("#toparrow").removeClass("topIcon");
                            $("#toparrow").addClass("topIcon1");
                            if(document.getElementById("remchat")){
                            document.getElementById("remchat").style.display = "block";
                            }
                        }else{
                            document.getElementById("remchat").style.display = "none";
                        }
                    }
                });
        }
        
        function msgchecktimer(){
                        
                        // deepanshu stopping message calls
                        //checkmsg();
                        
                        setTimeout(function(){msgchecktimer()},3000)
                        
        }
                        
                        

            </script>

    </body>
</html>
