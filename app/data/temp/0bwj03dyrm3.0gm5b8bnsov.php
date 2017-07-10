<link href="<?php echo $ROOT; ?>/assets/css/message.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.custom.min.js"></script>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap/css/bootstrap.custom.css" rel="stylesheet"/>
<style>
    .msg_okBtn {
        background-color: #303030;
        color: #fff;
        border: none;
        border-radius: 15px;
        padding: 0 22px;
        margin: 0 65px;
        text-transform: uppercase;
        cursor: pointer;
    }
</style>        
<input type="hidden" value="" id="mid">
<input type="hidden" value="<?php echo $uid; ?>" id="uid">

<!-- main container -->
<div class="msg_mainBox"> 
    <!-- inner container -->
    <div class="msg_sectiondiv">
        <!-- main title -->
        <div class="chatMainBox">

            <div class="chatTopBox"> 
                <div class="chat_headBox"><img src="<?php echo $ROOT; ?>/assets/img/Msg_arrow.png" /></div>
                <div class="chat_headTitle">
                    <h3>&nbsp;Beskeder</h3> <?php if ($firstChat == 1): ?><a href="javascript:void(0)" class="help"></a><?php endif; ?>  <b><?php echo $sendername; ?></b>
                </div>
            </div>
            
            <!-- left right box div-->
            <div class="chatBottomBox">
                
                <?php if ($discharged == '1'): ?>
                
                <style>
                    .alert {
                        padding: 15px;
                        margin-bottom: 10px;
                        margin-right: 20px;
                        border: 1px solid transparent;
                        border-radius: 4px;
                    }
                    .alert-info {
                        color: #31708f;
                        background-color: #d9edf7;
                        border-color: #bce8f1;
                    }
                </style>
               
                <div class="alert alert-info">
                    Din behandling er ophørt, og du kan derfor ikke sende nye beskeder
                </div>
            <?php endif; ?>
                
                <div id='test' class="chat_leftSide">

                    <div id="titlecontainer" class="chat_leftSideBox">

                        <div id='cssmenu'>

                            <ul>
                                <?php foreach (($messages?:array()) as $data): ?>
                                    <li class="" id="mtitle<?php echo $data['id']; ?>" tempclass="msgli">
                                        <a href='javascript:void(0)' id="messagetitle"  class="messagetitle" data-text="<?php echo $data['title']; ?>" data-id="<?php echo $data['id']; ?>" data-uid="<?php echo $uid; ?>">
                                            <span><?php echo $data['title']; ?> </span>
                                            <span class="d_t_Left"> <?php echo $data['created_at']; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <div id="reml1" class="remll_icon"><b>1</b></div>
                        </div>
                    </div>

                    <div class="chat_leftBtnBox">
                        <div class="chat_leftBtn">
                            <a class="newmessage"  href='#' >
                                <img src="<?php echo $ROOT; ?>/assets/img/New_Msgbox.png" align="center"  />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="msg_rightBox">
                    <div class="msg_right_top" id="messagecontainer">

                        <div class="msg_chatTitle" id="mtitle"></div>
                        <div id="chatcontent">

                        </div>
                    </div>

                    <div class="msg_right_bottom">
                        <textarea rows="4" cols="69" id="message" class="footerMessage" onclick="cleardata();">Skriv besked</textarea>
                        <div class="footersendBtn">
                            <a href="javascript:void(0)" class="send">
                                <img src="<?php echo $ROOT; ?>/assets/img/Send_Butten.png" align="center"  />
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br class="clear"/>
    </div>

</div>

<div id="MSG-HelpContent" class="popover bottom">
    <div class="title">Beskeder</div>
    <p>
        For at komme igang, skal du starte en ny samtale ved at klikke på NY SAMTALE. 
        Du kan skrive med din psykolog i samme samtale hele vejen gennem forløbet, 
        eller du kan lave nye samtale for hvert emne eksempelvis.
    </p>
    <button class="msg_okBtn" onclick="cancelpopup()">Ok</button>
</div>

<script>
    
    
    
    <?php if ($firstChat == 1): ?>
        $('.help').popover({
            content: $('#MSG-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
        });
        
        $('.help').popover('show');
       
    <?php endif; ?>

    window.onload = function(){
        launchmessage(<?php echo $uid; ?>);
    }
    
    $(document).on('click', '.messagetitle', function(){
	
        var mid = $(this).data('id');
        var uid = $(this).data('id');
        var title = $(this).data('text');
        
        $('#mtitle').html(title);
        //document.getElementById("mtitle" + document.getElementById("mid").value).className = "";
		
        $('li[tempclass="msgli"]').removeClass();
		setTimeout(function(){
				document.getElementById("mtitle" + mid).className = "active";
				document.getElementById("mid").value = mid;
				timer(1,0);
		}, 100);
		
    });
    
    $(".send").unbind("click").click(function() {
        var message = document.getElementById("message").value;
        var mid = document.getElementById("mid").value;
        var uid = document.getElementById("uid").value;
        var titles;
        
        if (document.getElementById("titles")) {
            titles = document.getElementById("titles").value;
        } else {
            titles = '-';
        }
        if (!mid) {
            mid = 0;
        }


        if (message != "Skriv besked"){
            $.ajax({
                url: "/section/addmessage",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {
                mid: mid,
                        uid:uid,
                        message: message,
                        title: titles

                },
                success: function(data) {
                    if (data.status == "success") {
                        document.getElementById("mid").value = data.mid;
                        if (titles != '-') {
                            $('#mtitle').html(titles);
                                updatetitles();
                        }
                        
                        timer(1,data.mid);
                        
                        document.getElementById("message").value = "Skriv besked";
                        
                    }
                },
                error: function(data) {

                }
            });
        }
    });
    
    $(".newmessage").unbind("click").click(function() {
        
        $('.help').popover('hide');
        document.getElementById("mid").value = 0;
        $('#chatcontent').html('');
        var data = '<input type="text" size="30" id="titles" class="textboxstl" value="Navngiv samtalen" onclick="tclear()">';
        $('#mtitle').html(data);
    });
    
    function updatemessages(t) {
        var mid = document.getElementById("mid").value;
        var uid = document.getElementById("uid").value;
        
        if (mid) {
            $.ajax({
                url: "<?php echo $ROOT; ?>/section/mcontent",
                type: 'GET',
                data: {
                    mid: mid,
                    uid:uid
                },
                success: function(data) {
                    $('#chatcontent').html(data);
                    if(t==1){
                    var objDiv = document.getElementById("messagecontainer");
                    objDiv.scrollTop = objDiv.scrollHeight;
                    }
                }
            });
        }
    }

    function updatetitles() {
        var mid = document.getElementById("mid").value;
        var uid = document.getElementById("uid").value;
        
       
        $.ajax({
            url: "<?php echo $ROOT; ?>/section/tcontent",
            type: 'GET',
            data: {
                    mid: mid,
                    uid:uid
                },
            success: function(data) {
            $('#cssmenu').html(data);
           
                   
                    document.getElementById("mtitle" + mid).className = "active";
            }

        });
    }

    function timer(t,m){
        var mid = document.getElementById("mid").value;
        
        if (mid){
            updatemessages(t);
            if(m){
            sendmail(m);
            }
            setTimeout(function(){timer(2,0)}, 3000);
        }
        
    }

    function tclear(){
        document.getElementById("titles").value = "";
    }

    function launchmessage(uid) {
      
      if(uid){
        $.ajax({
            url: "/section/checkmessage",
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
            uid:uid
            },
            success: function(data) {
                var mid = data.mid;
               
                var title = data.title;
                var uid = data.uid;
                
                if (mid){
                    $('#mtitle').html(title);
                    document.getElementById("mtitle" + mid).className = "";
                    document.getElementById("mtitle" + mid).className = "active";
                    document.getElementById("mid").value = mid;
                    
                    timer(1,0);
                }
            }
        });
      }else{
      $.ajax({
            url: "/section/checkmessage",
            type: 'GET',
            dataType: 'json',
            async: false,
            data: {
            //uid:uid
            },
            success: function(data) {
                var mid = data.mid;
               
                var title = data.title;
                var uid = data.uid;
                
                if (mid){
                    $('#mtitle').html(title);
                    document.getElementById("mtitle" + mid).className = "";
                    document.getElementById("mtitle" + mid).className = "active";
                    document.getElementById("mid").value = mid;
                    
                    timer(1,0);
                }
            }
        });
      }
    }

    function cleardata(){
        var message = document.getElementById("message").value;
        
        if (message == "Skriv besked"){
            document.getElementById("message").select();
        }
    }

    function sendmail(mid){
       
        $.ajax({
            url: "/section/sendmail",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: {
                mid: mid
               
            },
            success: function(data) {
                
            },
            error: function(data) {

            }
        });
        return true;
    }
   function cancelpopup()
   {
       $('.popover.fade.bottom').each(function() {
           $(this).remove();
       });
        
       $('.help').popover({
            content: $('#MSG-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
       });
   }
   
        
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
                       
                    }
                });
        }
        
        function msgchecktimer(){
                        
                        // deepanshu stopping message calls
                        checkmsg();
                        
                        setTimeout(function(){msgchecktimer()},3000)
                        
        }
        
        $(document).ready(function(){
             msgchecktimer();
        });
        
      <?php if ($discharged == '1'): ?>
            // discharged user
            $(document).ready(function(){
                
                $('textarea').prop('disabled', true);
                $('textarea').attr('disabled', true);
                $('.send').hide(); 
                $('.newmessage').hide(); 
           });
     <?php endif; ?>
    
</script>