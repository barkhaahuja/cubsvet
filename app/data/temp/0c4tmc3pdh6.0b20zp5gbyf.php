<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Login</title>
        <style type="text/css">

        </style>
        <link href="<?php echo $ROOT; ?>/assets/css/login.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo $ROOT; ?>/3rdparty/jquery/jquery.min.js"></script>
    </head>

    <body>

        <!--login pannel start-->
        <div id="LoginHolding">

		
            <div id="LoginLogo"></div>

            <?php if (isset($GET['notification']) AND  $GET['notification'] == 'success.mail'): ?>
                <div id="loginAlertG">
                    <div class="loginAlertTick"></div>
                    <p>Din adgangskode er nu blevet sendt til din email.</p>
                </div>
            <?php endif; ?>

<?php if (isset($GET['notification'])): ?>
   <div id="loginAlertR">
      <div class="loginAlertCross"></div>
      <p>
		<?php if ($GET['notification'] == 'error.invalidemail'): ?>
                    Ugyldig e-mail
		    <?php else: ?>
                        <?php if ($GET['notification'] == 'error.accountnotfound'): ?>
                        Den e-mail-adresse, som du har indtastet, svarer ikke til nogen konto.
                            <?php else: ?>
                                <?php if ($GET['notification'] == 'error.credentials'): ?>
                                     Password Forkert.
                                <?php endif; ?>
                            
                        <?php endif; ?>
                    
                <?php endif; ?>    
	  <br><br></p>
   </div>
<?php endif; ?>

<?php if (isset($notification) AND  $notification == 'error.email'): ?>

                    <div id="loginAlertR" >
                    <div class="loginAlertCross"></div>
                    <p>Ugyldig e-mail<br><br></p>
                                </div>

<?php endif; ?>
            
                                          

    <form id="form-login" method="post" action="/check_login">



        <?php if (isset($passwordreset) && $passwordreset == '1'): ?>

        <!-- code for displaying auto logout message -->

        <style>.maintenance-alert-box {color:#555;border-radius:10px;font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;padding:10px 10px 10px 36px;margin:10px;} .maintenance-alert-box span {font-weight:bold;text-transform:uppercase;} .maintenance-warning { background:#fff8c4; border:1px solid #f2c779;}</style>
        <center><div style=" text-align:left" class="maintenance-alert-box maintenance-warning"><b>Your password is reset. Login using new password send via SMS.</b> </div></center>

        <!-- end  -->

        <?php endif; ?>

        <?php if (isset($credentialsrequired) && $credentialsrequired == '1'): ?>

        <!-- code for displaying auto logout message -->

        <style>.maintenance-alert-box {color:#555;border-radius:10px;font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;padding:10px 10px 10px 36px;margin:10px;} .maintenance-alert-box span {font-weight:bold;text-transform:uppercase;} .maintenance-warning { background:#fff8c4; border:1px solid #f2c779;}</style>
        <center><div style=" text-align:left" class="maintenance-alert-box maintenance-warning"><b>Both username and password are required.</b> </div></center>

        <!-- end  -->

        <?php endif; ?>


        <?php if (isset($timeout) && $timeout == '1'): ?>

        <!-- code for displaying auto logout message -->

        <style>.maintenance-alert-box {color:#555;border-radius:10px;font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;padding:10px 10px 10px 36px;margin:10px;} .maintenance-alert-box span {font-weight:bold;text-transform:uppercase;} .maintenance-warning { background:#fff8c4; border:1px solid #f2c779;}</style>
        <center><div style=" text-align:left" class="maintenance-alert-box maintenance-warning"><b>You have been automatically logged out due to inactivity.</b> </div></center>

        <!-- end  -->

        <?php endif; ?>

        <?php if (isset($grace_expired) && $grace_expired == '1'): ?>

        <!-- code for displaying grace period expired message -->

        <style>.maintenance-alert-box {color:#555;border-radius:10px;font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;padding:10px 10px 10px 36px;margin:10px;} .maintenance-alert-box span {font-weight:bold;text-transform:uppercase;} .maintenance-warning { background:#fff8c4; border:1px solid #f2c779;}</style>
        <center><div style=" text-align:left" class="maintenance-alert-box maintenance-warning"><b>Your grace period of 180 days has expired. You do not have access to this program.</b> </div></center>

        <!-- end  -->

        <?php endif; ?>
        <?php if (isset($accountblocked) && $accountblocked == '1'): ?>

        <!-- code for displaying grace period expired message -->

        <style>.maintenance-alert-box {color:#555;border-radius:10px;font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;padding:10px 10px 10px 36px;margin:10px;} .maintenance-alert-box span {font-weight:bold;text-transform:uppercase;} .maintenance-warning { background:#fff8c4; border:1px solid #f2c779;}</style>
        <center><div style=" text-align:left" class="maintenance-alert-box maintenance-warning"><b>Your account is blocked due to 5 or more unsuccessful login attempts. Please contact NoDep to get this resolved.</b> </div></center>

        <!-- end  -->

        <?php endif; ?>



        <div class="InputTextBox user"><input class="InputText" name="username" type="text"
                                              placeholder="Brugernavn (din email adresse)" maxlength="200"/></div>

        <div class="InputTextBox pass"><input class="InputText" id="password" name="password" type="password"
                                              placeholder="Adgangskode"
                                              maxlength="200"/></div>
        <input type='submit' onclick="login();" accesskey="enter" value='LOG IND' id="LoginButton" />
    </form>



    <a class="lostpass" href="/recover_password">Glemt din adgangskode?</a>

    </div>

    <br/>

    <div id="thawteseal" style="text-align:center;" title="Click to Verify - This site chose Thawte SSL for secure e-commerce and confidential communications.">
        <div><script type="text/javascript" src="https://seal.thawte.com/getthawteseal?host_name=nodep21-dev.cbtprogram.com&amp;size=L&amp;lang=en"></script></div>
        <div><a href="http://www.thawte.com/ssl-certificates/" target="_blank" style="color:#000000; text-decoration:none; font:bold 10px arial,sans-serif; margin:0px; padding:0px;">ABOUT SSL CERTIFICATES</a></div>
    </div>

    <!--login pannel end-->

    <span style="height:90px; display:block;"></span>
    <!--password pannel start-->

    <span style="height:90px; display:block;"></span>

    <script>
        function login(){
       $("#password").val($.trim($("#password").val()));
       $('#form-login').submit();

   }
    </script>

    </body>
    </html>
