<style>

    .readonly {
        border: none;
        resize: none;
    }

    .hidden {
        display: none;
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

    .table {
        width: 100%;
        line-height: 30px;
        vertical-align: top;
        font-size: 12px;
    }

    .pass-input {
        width: 130px;
    }

    .pass-alert {
        color: red;
        line-height: 15px;
    }

    .glowing-border {
        border: 1px solid #b7b7b7;
        outline: none;
        box-shadow: 2px 4px 10px #8b8b8b;
    }

    input {
        height: 20px;
        width: 305px;
    }


</style>

<div id="DashboardContainer">

    <div class="Dash-book-title"><?php echo $section_title; ?></div>

    <?php echo $this->render('dashboard/__menu.section.settings.htm',$this->mime,get_defined_vars()); ?>

    <!--right section starts-->
    <div id="Dash-right-MainBox">
        <div style="padding: 30px;">

            <div class="Label-Profile"><b>Personlige oplysninger</b></div>

            <div style="font-size: 14px;margin-top: 20px;">

                <form action="<?php echo $ROOT; ?>/user/update_simple" method="POST" name="info-form" >
                    <input type="hidden" value="<?php echo $user['id']; ?>" name="id"/>
                    <table class="table">
                        <tr>
                            <td>Navn</td>
                            <td><input name="name" value="<?php echo $user['name']; ?>" data-original="<?php echo $user['name']; ?>"
                                       class="info-input readonly" readonly/></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Adresse</td>
                            <td>
                                <textarea name="address" rows="3" style="width: 300px;" class="info-input readonly"
                                          readonly data-original="<?php echo $user['address']; ?>"><?php echo $user['address']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input id="email" name="email" value="<?php echo $user['email']; ?>" class="info-input readonly"
                                       data-original="<?php echo $user['email']; ?>" readonly/>
								   <br/><span class="error" style="color:red; max-width: 300px" id="email-alert-validation"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefon</td>
                            <td><input id="phone" name="phone" value="<?php echo $user['phone']; ?>" class="info-input readonly"
                                     onblur="validPhone();"  data-original="<?php echo $user['phone']; ?>" readonly/>
                                <br/><span class="error" style="color:red; max-width: 300px" id="phone-alert-validation"></span>
                            </td>
                        </tr>
                    </table>
                </form>

                <div id="info-container">
                    <div id="info-back" class="Button40x158 But-Cross-40x158 hidden"
                            ><a href="javascript:void(0)" onclick="removeMessage()">AFBRYD</a>
                    </div>
                    <div id="info-save" class="Button40x158 But-Tick-40x158 hidden"
                            ><a href="javascript:void(0)">GEM</a>
                    </div>
                    <div id="info-edit" class="Button40x158 But-edit-40x158"
                            ><a href="javascript:void(0)">REDIGER</a>
                    </div>
                </div>

            </div>

            <hr style="margin-left: -20px;">

            <div style="margin-top:15px;"><b>Adgangskode</b></div>
            
            <div class="chgpwdtxt">
                Når du har redigeret det, du ønsker, skal du klikke på “ARBEJDSBORD” i øverste venstre hjørne for at komme igang
            </div>

            <div style="font-size: 14px;margin-top: 20px;">
                <form action="<?php echo $ROOT; ?>/user/update_simple" method="POST" name="pass-form">
                    <input type="hidden" value="<?php echo $user['id']; ?>" name="id"/>
                    <table class="table">
                        <tr>
                            <td style="width: 150px;">Nuværende adgangskode</td>
                            <td style="width: 80px;"><input id="password" type="password" class="pass-input readonly" onblur="checkCurrentPasswordAvailability();"
                                                            readonly value="Password" /></td>
                            <td class="pass-alert" id="pass-alert-check"></td>
                        </tr>
                        <tr class="hidden">
                            <td>Ny adgangskode</td>
                            <td><input name="password" id="new_password" type="password" class="pass-input readonly" onblur="checkNewpasswordAvailability();"
                                       readonly/></td>
                            <td class="pass-alert" id="pass-alert-check-exists"></td>
                        </tr>       
                        <tr class="hidden">
                            <td>Gentag ny adgangskode</td>
                            <td><input id="confirm_new_password" type="password" class="pass-input readonly"
                                       readonly/>
                            </td>
                            <td class="pass-alert" id="pass-alert-confirm"></td>
                        </tr>
                    </table>
                </form>

                <div id="pass-container">
                    <div id="pass-back" class="Button40x158 But-Cross-40x158 hidden">
                            <a href="javascript:void(0)">AFBRYD</a>
                    </div>
                    <div id="pass-save" class="Button40x158 But-Tick-40x158 hidden">
                            <a href="javascript:void(0)">GEM</a>
                    </div>
                    <div id="pass-edit" class="Button40x158 But-edit-40x158">
                            <a href="javascript:void(0)">REDIGER</a>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <!--right section ends-->

</div>

<div id="quizContainer"></div>

<?php if ($is_first_login): ?>
    <?php echo $this->render('dashboard/guides/profile.htm',$this->mime,get_defined_vars()); ?>
<?php endif; ?>

<script>
    
    function removeMessage()
    {
        $('#phone-alert-validation').html('');
		$('#email-alert-validation').html('');
    }

    function validPhone()
    {
        var phoneVal = $('#phone').val();
        $('#phone-alert-validation').html('');

        if($.trim(phoneVal) != "")
        {

          if (isNaN(phoneVal) || phoneVal.indexOf(" ") != -1)
            {
                $('#phone-alert-validation').html('Phone number is not valid, <br/>please use the format +4512345678 or +4412345678');
                $("#phone").focus();
                return false;
            }
            if (phoneVal.length < 11)
            {
                $('#phone-alert-validation').html('Phone number is not valid, <br/>please use the format +4512345678 or +4412345678');
                $("#phone").focus();
                  return false;
            }

            if (phoneVal.substring(0, 3) != '+45' && phoneVal.substring(0, 3) != '+44') {
                $('#phone-alert-validation').html('Please use the format<br/> +4512345678 or +4412345678');
                $("#phone").focus();
                  return false;
            }   
         }
         // checking for unqieness

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/check/phoneprofile",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {phone: phoneVal, userid:<?php echo $user['id']; ?>},
                success: function (data) {

                    if (data.status == 'success') {
                         $('#phone-alert-validation').html('This phone no. is already registered.');
                         $("#phone").focus();
                          return false;
                    }
                    else
                    {   
                        return true;
                    }
                }

            });
          
    }
    
    function CheckifValidPhoneAndSubmit()
    {
        var phoneVal = $('#phone').val();
        $('#phone-alert-validation').html('');

        if($.trim(phoneVal) != "")
        {

          if (isNaN(phoneVal) || phoneVal.indexOf(" ") != -1)
            {
                $('#phone-alert-validation').html('Phone number is not valid, <br/>please use the format +4512345678 or +4412345678');
                $("#phone").focus();
                return false;
            }
            if (phoneVal.length < 11)
            {
                $('#phone-alert-validation').html('Phone number is not valid, <br/>please use the format +4512345678 or +4412345678');
                $("#phone").focus();
                  return false;
            }

            if (phoneVal.substring(0, 3) != '+45' && phoneVal.substring(0, 3) != '+44') {
                $('#phone-alert-validation').html('Please use the format<br/> +4512345678 or +4412345678');
                $("#phone").focus();
                  return false;
            }   
         }
         // checking for unqieness

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/check/phoneprofile",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {phone: phoneVal, userid:<?php echo $user['id']; ?>},
                success: function (data) {

                    if (data.status == 'success') {
                         $('#phone-alert-validation').html('This phone no. is already registered.');
                         $("#phone").focus();
                          return false;
                    }
                    else
                    {   
                        $('form[name=info-form]').submit();
                    }
                }

            });
          
    }

	function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
	 function CheckifValidEmailAndSubmit()
    {
        var emailVal = $('#email').val();
        $('#email-alert-validation').html('');

        if($.trim(emailVal) != "")
        {

			if (validateEmail(emailVal))
            {
                $.ajax({
					url: "<?php echo $ROOT; ?>/window/check/emailprofile",
					type: 'POST',
					dataType: 'json',
					async: false,
					data: {email: emailVal, userid:<?php echo $user['id']; ?>},
					success: function (data) {

						if (data.status == 'success') {
							 $('#email-alert-validation').html('This email is already registered.');
							 $("#email").focus();
							  return false;
						}
						else
						{   
							CheckifValidPhoneAndSubmit();
						}
					}

				});
            }
			else{
				
				$('#email-alert-validation').html('Email is not of valid format.');
                $("#email").focus();
                return false;
			}
             
         }
		 else{
				$('#email-alert-validation').html('Email is required.');
                $("#email").focus();
                return false;
		 }
         
          
    }


    <?php if ($lodquz): ?>
    $('#quizContainer').load('<?php echo $ROOT; ?>/window/quiz<?php echo $quiz_step; ?>', function () {
        $('#myModal').modal();
    });
    <?php endif; ?>

    // Info

    $('#info-edit').click(function () {
        $('#info-edit').hide();
        $('#info-back').show();
        $('#info-save').show();
        $('.info-input').removeClass('readonly').removeAttr('readonly').addClass('glowing-border');
        $('#info-container').css('margin-top', '-45px');
    });

    $('#info-back').click(function () {
        $('#info-edit').show();
        $('#info-back').hide();
        $('#info-save').hide();
        $('.info-input').addClass('readonly').attr('readonly', 'readonly').removeClass('glowing-border');
        $('#info-container').css('margin-top', '0');
        $('input[name=name]').val($('input[name=name]').data('original'));
        $('textarea[name=address]').val($('textarea[name=address]').data('original'));
        $('input[name=email]').val($('input[name=email]').data('original'));
        $('input[name=phone]').val($('input[name=phone]').data('original'));
    });

    $('#info-save').click(function () {
        
		CheckifValidEmailAndSubmit();
       
    })

    // Password

    $('#pass-edit').click(function () {
        $('#pass-edit').hide();
        $('.chgpwdtxt').show();
        $('#pass-back').show();
        $('#pass-save').show();
        $('#password').val('');
        $('#new_password').parent().parent().removeClass('hidden');
        $('#confirm_new_password').parent().parent().removeClass('hidden');
        $('.pass-input').removeClass('readonly').removeAttr('readonly').addClass('glowing-border');
        $('#pass-container').css('margin-top', '-60px');
    });

    $('#pass-back').click(function () {
        $('#pass-edit').show();
        $('#pass-back').hide();
        $('#pass-save').hide();
        $('#password').val('Password');
        $('#new_password').parent().parent().addClass('hidden');
        $('#confirm_new_password').parent().parent().addClass('hidden');
        $('.pass-input').addClass('readonly').attr('readonly', 'readonly').removeClass('glowing-border');
        $('#pass-container').css('margin-top', '0');
        $('#pass-alert-confirm').html('');
        $('#pass-alert-check').html('');
    })

    $('#pass-save').click(function () {

        $('#pass-alert-confirm').html('');
        $('#pass-alert-check').html('');

        var password = $('#password').val();

        $.ajax({
            url: "<?php echo $ROOT; ?>/user/check_password_simple",
            type: 'post',
            dataType: 'json',
            async: false,
            data: {password: password },
            success: function (data) {
                if (data.status != 'success') {
                    $('#pass-alert-check').html('*Forkert adgangskode');
                } else {
                    if ($('#new_password').val() == '' || ( $('#new_password').val() != $('#confirm_new_password').val())) {
                        $('#pass-alert-confirm').html('*Ny adgangskode<br>stemmer ikke overens');
                    } else {
                        $('form[name=pass-form]').submit();
                    }
                }
            }
        });

    })
    
    function checkNewpasswordAvailability()
    {
        var currentpassword = $('#new_password').val();
        //alert(currentpassword);
        $.ajax({
                url: "<?php echo $ROOT; ?>/window/check/password",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {password: currentpassword},
                success: function (data) {
                     //alert(data.usrrsk);
                    if (data.status == 'success') { 
                        $('#pass-alert-check-exists').html('already exists');
                        $( "#new_password" ).focus();
                    }
                }
            });
        //alert("available");
    }
    
  /*  function checkCurrentPasswordAvailability()
    {
        var currentpassword = $('#password').val();
        alert(currentpassword);
        $.ajax({
                url: "<?php echo $ROOT; ?>/window/check/password",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {password: currentpassword},
                success: function (data) {
                     //alert(data.usrrsk);
                    if (data.status == 'success') { 
                        $('#pass-alert-check-exists').html('already exists');
                    }
                }
            });
        //alert("available");
    }*/
</script>