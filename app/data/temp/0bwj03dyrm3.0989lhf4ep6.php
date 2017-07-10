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
    
    .Button40x158 {
    margin-right: 0px;
    margin-left: auto;
    margin-bottom: 5px;
    height: 30px;
    width: 120px;
    float: none;
    }
           
    .Button40x158 > a {
    color: #FFFFFF;
    padding: 7px 0px 0px 35px;
    font-size: 14px;
    text-decoration: none;
    display: block;
    }
    
    .chatMainBox{
        width:550px
    }
</style>        
<input type="hidden" value="" id="mid">


<!-- main container -->
<div class="msg_mainBox" style="background-color: #f7f7f4"> 
    <!-- inner container -->
    <div class="msg_sectiondiv">
        <!-- main title -->
        <div class="chatMainBox">

            <div class="chatTopBox"> 
                <div class="chat_headTitle">
                    <h3 style="font-weight:bold">&nbsp;&nbsp;skift kodeord</h3> 
                </div>
            </div>
            
            <!-- left right box div-->
            <div class="chatBottomBox">
                
                <div style="margin:20px; background-color: #fff; padding:20px">
                    
               
                    <form action="<?php echo $ROOT; ?>/password_reset" method="POST" id="frmcp" name="pass-form" style="font-size:14px">
                    <center>
                    <input type="hidden" value="<?php echo $userid; ?>" name="id">
                    <?php if (isset($message) && ($message != '')): ?>
                        <style>.maintenance-alert-box {color:#555;border-radius:10px;font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;padding:10px 10px 10px 36px;margin:10px;} .maintenance-alert-box span {font-weight:bold;text-transform:uppercase;} .maintenance-warning { background:#fff8c4; border:1px solid #f2c779;}</style>
                        <div class="maintenance-alert-box maintenance-warning">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    <table class="table">
                        <tbody><tr>
                            <td style="">Nuværende adgangskode</td>
                            <td style=""><input id="currentpassword" name="currentpassword" type="password" class="pass-input glowing-border" style="width:255px" onblur="checkCurrentPasswordAvailability();" ></td>
                            <td class="pass-alert" id="pass-alert-check"></td>
                        </tr>
                        <tr class="">
                            <td>Ny adgangskode</td>
                            <td><input name="newpassword" id="newpassword" type="password" class="pass-input glowing-border"  style="width:255px" onblur="checkNewpasswordAvailability();"></td>
                            <td class="pass-alert" id="pass-alert-check-exists"></td>
                        </tr>       
                        <tr class="">
                            <td>Gentag ny adgangskode</td>
                            <td><input id="confirmpassword" name="confirmpassword" type="password"  style="width:255px" class="pass-input glowing-border">
                            </td>
                            <td class="pass-alert" id="pass-alert-confirm"></td>
                        </tr>
                         <tr class="">
                             <td></td>
                             <td >
                                 <input type="submit" style="display: none" />
                                <div id="pass-save" class="Button40x158 But-Tick-40x158 hidden" style="display: block; float:left">
                                        <a href="javascript:void(0)" onclick="$('#frmcp').submit()">GEM</a>
                                </div>
                                <div id="pass-back" class="Button40x158 But-Cross-40x158 hidden" style="display: block; float:left; margin-left: 20px">
                                    <a href="javascript:void(0)" onclick="$('#frmcp')[0].reset()">AFBRYD</a>
                                </div>
                               
                                
                            </td>
                            <td class="pass-alert" id="pass-alert-confirm"></td>
                        </tr>
                    </tbody></table>
                    </center>
                </form>

               
                    
                    
                </div>

            </div>
        </div>
        <br class="clear"/>
    </div>

</div>


<script>
    
    
    
   
    window.onload = function(){
        
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
        
  
    
</script>