<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Recover</title>
        <link href="<?php echo $ROOT; ?>/assets/css/login.css" rel="stylesheet" type="text/css"/>
		  <script src="<?php echo $ROOT; ?>/3rdparty/jquery/jquery.min.js"></script>
                  
      <style type="text/css">
          #LoginButton:hover{
              font-weight: bold;
          }
      </style>
                  
    </head>

    <body>

        <!--login pannel start-->
        <div id="LoginHolding">

            <div id="LoginLogo"></div>

        </div>
        <!--login pannel end-->

        <?php if (isset($notification) AND  $notification == 'error.phonenotfound'): ?>
            <center><div id="loginAlertR" style="width:600px">
                <div class="loginAlertCross"></div>
                <p>Vi kan ikke finde denne telefon er registreret hos os. bedes du kontakte din behandler eller ringe til klinikken på tlf. 99 44 95 60.<br><br></p> <!-- We can not find this phone is registered with us. please contact your healthcare professional or call the clinic at tel. 99 44 95 60 -->
                            </div></center>
        <?php endif; ?>
        
        <?php if (isset($notification) AND  $notification == 'error.notconfirmed'): ?>
            <center><div id="loginAlertR" style="width:600px">
                <div class="loginAlertCross"></div>
                <p>e-mail ikke bekræftet. tjekke din mail for at komme i gang.<br><br></p> <!--  email not confirmed. check your mail to get started.-->
                            </div></center>
        <?php endif; ?>
        
        
        <div id="PassHolding" style="height: 400px">
            <div id="close">
                <a href="login">
                    <img src="<?php echo $ROOT; ?>/assets/img/closeIcon.png" alt="close" width="11" height="11" border="0"/>
                </a>
            </div>
            
            <div id="textholder1">
                
               
                <h1>Har du glemt din adgangskode?</h1>

                <p>Hvis du har glemt din adgangskode, kan vi sende en ny på SMS.</p>

               
                
                <div id="LoginHolding">
                    
                    
                    
                    <?php if (isset($notification) AND  $notification == 'error.otpsent'): ?>
                        <script>$(document).ready(function(){alert('OTP er blevet sendt til din telefon . Indtast det på denne side for at nulstille din adgangskode. OTP udløber i 15 minutter.')});</script> 
                        <form id="form-login" action="otp" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="phone" value="<?php echo $phone; ?>" />    
                            <div class="InputTextBox noShadow user2">
                                    <input class="InputText" autocomplete="off"  id="otp" name="otp" type="text" placeholder="OTP"  maxlength="6"/>
                                </div>
                              
                                <div id="LoginButton" class="noShadow">
                                    <input type="submit" accesskey="enter" value="RESET PASSWORD" id="LoginButton">
                                </div>
                         </form>
                        <?php else: ?>
                            
                            <?php if (isset($notification) AND  $notification == 'error.otpexpired'): ?>
                            <script>$(document).ready(function(){alert('OTP udløbet prøv igen.')});</script> 
                            <?php endif; ?>
                            
                            <?php if (isset($notification) AND  $notification == 'error.otpnomatch'): ?>
                            <script>$(document).ready(function(){alert('OTP passer ikke.')});</script> 
                            <?php endif; ?>
                            
                            <form id="form-login" onsubmit="return validPhone();" action="login" method="POST" enctype="multipart/form-data">
                                    <div class="InputTextBox noShadow user2">
                                        <input class="InputText" autocomplete="off" onblur="validPhone();" id="email" name="email" type="text" placeholder="Dit telefonnummer"  maxlength="20"/>
                                    </div>
                               <div class="error" id="phone-alert-validation" style="color:red"></div>

                                <div id="LoginButton" class="noShadow">
                                    <input type="submit" accesskey="enter" value="SEND OTP" id="LoginButton">
                                </div>
                                     </form>
                        
                    <?php endif; ?>
        
                    
                    
                </div>
                
                <hr/>
                
                
                <p>Hvis du ikke ønsker at modtage SMS, bedes du kontakte din behandler eller ringe til klinikken på tlf. 99 44 95 60. </p>

                <!-- <div id="passCode">99 44 95 60</div> -->
                
            </div>
            <!--text holder end-->
            
        </div>
        <!--password pannel end-->
        
        <span style="height:90px; display:block;"></span>


        <script>
            function formSubmit() {
                document.getElementById("form-login").submit();
            }

             // P0120-19
             function validPhone()
             {
                var phoneVal = $('#email').val();
                $('#phone-alert-validation').html('');

                if($.trim(phoneVal) != "")
                {

                  if (isNaN(phoneVal) || phoneVal.indexOf(" ") != -1)
                    {
                        $('#phone-alert-validation').html('Phone number is not valid, please use the format +4512345678 or +4412345678');
                        $("#email").focus();
                        return false;
                    }
                    if (phoneVal.length < 11)
                    {
                        $('#phone-alert-validation').html('Phone number is not valid, please enter atleast 11 characters');
                        $("#email").focus();
                        return false;
                    }

                    if (phoneVal.substring(0, 3) != '+45' && phoneVal.substring(0, 3) != '+44') {
                        //$('#phone-alert-validation').html('Please use the format +4512345678 or +4412345678');
                        //$("#email").focus();
                        //return false;
                    }   
                    return true;
                 }
                 else {
                     $('#phone-alert-validation').html('Phone number empty, please enter a valid phone number.');
                     $("#email").focus();
                     return false;
                 }

            }
        </script>

    </body>
</html>
