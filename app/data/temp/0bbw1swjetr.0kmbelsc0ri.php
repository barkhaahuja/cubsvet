<script src="<?php echo $ROOT; ?>/3rdparty/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/jquery-validation/additional-methods.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.min.js"></script>
<script>
if (navigator.userAgent.toLowerCase().indexOf('chrome') >= 0) {
    //alert("Chrome");
    setTimeout(function () {
        //document.getElementById('phone').autocomplete = 'off';
        document.getElementById('phone').autocomplete = 'off';
    }, 1);
}
</script>
<style>

    label {
        display: initial;
    }
    .email-alert {
        color: red;
        line-height: 15px;
        margin-left: 185px;
    }
    .error
    {
        color:red;
    }

</style>

<div class="row">

    <h2>
        <?php if ($PATTERN == '/user/profile'): ?>
            My Profile
            <?php else: ?>
            <?php if (($logged_user->isAdminGroup() || $logged_user->isDoctorGroup())  && trim($PATTERN)  == '/user/create'): ?>
                Add User
                <?php else: ?>
                 <?php if (isset($discharged) && $discharged == '1'): ?>
                    View Discharged User
                    <?php else: ?>
                    Edit User
                    
                 <?php endif; ?>
                
            <?php endif; ?>
            
        <?php endif; ?>
    </h2>

    <?php if (isset($discharged) && $discharged == '1'): ?>
        <div class="alert alert-info">
            This is a discharged user hence you cannot edit their details.
        </div>
    <?php endif; ?>
    
	<?php if (isset($errmessage) && $errmessage != ''): ?>
        <div class="alert alert-danger">
            <?php echo $errmessage; ?>
        </div>
    <?php endif; ?>
	<?php if (isset($GET['err']) && $GET['err'] == 1): ?>
        <div class="alert alert-danger">
			<?php if (isset($GET['phone']) && $GET['phone'] != ''): ?>
				There is an existing Phone Number associated with <?php echo $GET['phone']; ?>.
			<?php endif; ?>
			<?php if (isset($GET['email']) && $GET['email'] != ''): ?>
				There is an existing account associated with  <?php echo $GET['email']; ?> .
			<?php endif; ?>
		</div>
    <?php endif; ?>
    
	
    <form id="editpage"
          action="<?php echo $BASE; ?>/user/<?php echo ($PATTERN == '/user/profile' OR substr($PATTERN,0,12) == '/user/update' ) ? 'update' : 'create'; ?>"
          method="post" autocomplete="off"
          class="form-horizontal" role="form"
         
          >

        <div class="col-sm-6">

            <?php if ($PATTERN == '/user/profile' OR substr($PATTERN,0,12) == '/user/update'): ?>
                <input type="hidden" name="id" id="userId" value="<?php echo isset($POST['id']) ? $POST['id'] : 0; ?>"/>
            <?php endif; ?>

            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon glyphicon-user icon-black"></i> Name</label>

                <div class="col-sm-8">
                    <input type="text" id="name" name="name"
                           value="<?php echo isset($POST['name']) ? $POST['name'] : ''; ?>" class="form-control" placeholder="Name"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon glyphicon-user icon-black"></i> Last Name</label>

                <div class="col-sm-8">
                    <input type="text" id="last_name" name="last_name"
                           value="<?php echo isset($POST['last_name']) ? $POST['last_name'] : ''; ?>" class="form-control"
                           placeholder="Last Name"/>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon glyphicon-envelope icon-black"></i> Email</label>

                <div class="col-sm-8">
                    <input type="text" id="email" name="email" autocomplete="off"
                           value="<?php echo isset($POST['email']) ? $POST['email'] : ''; ?>" class="form-control"
                           placeholder="Email" onblur=""/>
                </div>
                <span class="email-alert" id="email-alert-check-exists"></span>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-4"></label>

                <div class="col-sm-6">
                     <?php if ($PATTERN == '/user/create'): ?>
                        <label class="checkbox" style="font-weight:normal">
                          <input type="checkbox" name="sendcredentials" value="1" > Send credentials to user
                        </label>
                     <?php endif; ?>
                   
                </div>
                <span class="email-alert" id="email-alert-check-exists"></span>
            </div>
            
            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon glyphicon-headphones icon-black"></i> Phone</label>

                <div class="col-sm-8">
                    <input type="text" id="phone" name="phone" autocomplete="off"
                           value="<?php echo isset($POST['phone']) ? $POST['phone'] : ''; ?>" class="form-control"
                           placeholder="Phone" onblur=""/>
                    <span class="error" id="phone-alert-validation"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon"></i> Password</label>

                <div class="col-sm-8">
					
					<input style="margin-bottom: 10px" type="password" id="password" name="password" autocomplete="off"
						   class="form-control"
						   placeholder="Password"/>
					
			   
                    <div id="messages"></div>
					<div class="well" style="color:#000000"><b>Tip for strong password:</b><br/>Use a minimum password length of 8 to 16 characters.
Include lowercase and uppercase alphabetic characters, numbers and symbols.</div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon"></i> Re-Password</label>

                <div class="col-sm-8">
                    <input type="password" id="c_password" name="c_password" autocomplete="off"
                           class="form-control"
                           placeholder="Confirm password"/>
                </div>
            </div>

        </div>

        <div class="col-sm-6">

            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon"></i> Sex</label>

                <div class="col-sm-8">
                    <select id="sex" name="sex" class="form-control">
                        <?php if (isset($POST['sex']) and $POST['sex']=='Female'): ?>
                            <option selected="selected">Female</option>
                            <?php else: ?>
                            <option>Female</option>
                            
                        <?php endif; ?>
                        <?php if (isset($POST['sex']) and $POST['sex']=='Male'): ?>
                            <option selected="selected">Male</option>
                            <?php else: ?>
                            <option>Male</option>
                            
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-4">
                    <i class="glyphicon"></i> Group</label>

                <div class="col-sm-8">
				
                    <select id="group" name="group_id" class="form-control"
                            <?php echo ($PATTERN == '/user/profile') ? 'disabled="disabled"' : ''; ?>>

                             <?php if (($PATTERN == '/user/profile')): ?>
                                 
                                 <!-- my profile -->
                                 
                                 <?php foreach (($groups?:array()) as $group): ?>
                                         <?php if ($group['id'] == $SESSION['group_id']): ?>
                                            <option value="<?php echo $group['id']; ?>"
                                                <?php echo (isset($POST['group_id']) and $POST['group_id'] == $group['id']) ? 'selected="selected"' : ''; ?>>
                                                <?php echo $group['name']; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                 
                                 <!-- end my profile -->
                                 
                                 
                                 <?php else: ?>
                                             <!-- master admin -->
                                        <?php if ($SESSION['group_id'] == 5): ?>
                                            <?php foreach (($groups?:array()) as $group): ?> 
                                                 <!-- added multiple check for bug P095-348-->
                                                 <?php if ($group['id'] == 4 and (isset($POST['group_id']) and $POST['group_id'] == $group['id'])): ?>
                                    
                                        <option value="<?php echo $group['id']; ?>"
                                            <?php echo (isset($POST['group_id']) and $POST['group_id'] == $group['id']) ? 'selected="selected"' : ''; ?>>
                                            <?php echo $group['name']; ?>
                                         </option>
                                    
                                    <?php else: ?>
                                        <?php if (($group['id'] == 4) and (!isset($POST['group_id']))): ?>
                                            
                                                <option value="<?php echo $group['id']; ?>"
                                                    <?php echo (isset($POST['group_id']) and $POST['group_id'] == $group['id']) ? 'selected="selected"' : ''; ?>>
                                                    <?php echo $group['name']; ?>
                                                </option>
                                            
                                            <?php else: ?>
                                                <?php if ($group['id'] == 3 and (isset($POST['group_id']) and $POST['group_id'] == $group['id'])): ?>
                                                    
                                                        <option value="<?php echo $group['id']; ?>"
                                                             <?php echo (isset($POST['group_id']) and $POST['group_id'] == $group['id']) ? 'selected="selected"' : ''; ?>>
                                                             <?php echo $group['name']; ?>
                                                        </option>
                                                    
                                                <?php endif; ?> 
                                            
                                        <?php endif; ?>
                                    
                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>


                                        <!-- provider admin -->
                                        <?php if ($SESSION['group_id'] == 4): ?>
                                            <?php foreach (($groups?:array()) as $group): ?>
                                                 <?php if ($group['id'] == 3): ?>
                                                    <option value="<?php echo $group['id']; ?>"
                                                        <?php echo (isset($POST['group_id']) and $POST['group_id'] == $group['id']) ? 'selected="selected"' : ''; ?>>
                                                        <?php echo $group['name']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <!-- clinician -->
                                        <?php if ($SESSION['group_id'] == 3): ?>
                                            <?php foreach (($groups?:array()) as $group): ?>
                                                 <?php if (($group['id'] == 2) || ($group['id'] == 1)): ?>
                                                    <option value="<?php echo $group['id']; ?>"
                                                        <?php echo (isset($POST['group_id']) and $POST['group_id'] == $group['id']) ? 'selected="selected"' : ''; ?>>
                                                        <?php echo $group['name']; ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                 
                             <?php endif; ?>
                            
                            
                            
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4">
                <i class="glyphicon glyphicon-home icon-black"></i>
                Address</label>

            <div class="col-sm-8">
                <textarea class="input-xlarge form-control" name="address" id="address"
                          placeholder="Address" rows="5"><?php echo isset($POST['address']) ? $POST['address'] : ''; ?></textarea>
            </div>

        </div>
            <?php if (($SESSION['group_id'] == 3) && ($PATTERN != '/user/profile')): ?>
        <div class="form-group">
            <label class="control-label col-sm-4">
                Step - A</label>

            <div class="col-sm-8">

                <select id="stepA" name="stepA" class="form-control additionalddl stepaorb" style="width:60px">
                    <option value="0" <?php echo (isset($POST['stepA']) and $POST['stepA'] == 0) ? 'selected' : ''; ?>>0</option>
                    <option value="1" <?php echo (isset($POST['stepA']) and $POST['stepA'] == 1) ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo (isset($POST['stepA']) and $POST['stepA'] == 2) ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo (isset($POST['stepA']) and $POST['stepA'] == 3) ? 'selected' : ''; ?>>3</option>

                </select>
            </div>                
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4">
                Step - B</label>

            <div class="col-sm-8">

                <select id="stepB" name="stepB" class="form-control additionalddl stepaorb" style="width:60px">
                    <option value="0" <?php echo (isset($POST['stepB']) and $POST['stepB'] == 0) ? 'selected' : ''; ?>>0</option>
                    <option value="1" <?php echo (isset($POST['stepB']) and $POST['stepB'] == 1) ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo (isset($POST['stepB']) and $POST['stepB'] == 2) ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo (isset($POST['stepB']) and $POST['stepB'] == 3) ? 'selected' : ''; ?>>3</option>

                </select>
            </div>                
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4">
                Step - 6</label>

            <div class="col-sm-8">

                <select id="step6" name="step6" class="form-control additionalddl step6" style="width:60px">
                   
                    <option value="0"  <?php echo (isset($POST['step6']) and $POST['step6'] == 0) ? 'selected' : ''; ?>>0</option>
                    <option value="1"  <?php echo (isset($POST['step6']) and $POST['step6'] == 1) ? 'selected' : ''; ?>>1</option>
                    <option value="2"  <?php echo (isset($POST['step6']) and $POST['step6'] == 2) ? 'selected' : ''; ?>>2</option>
                    <option value="3"  <?php echo (isset($POST['step6']) and $POST['step6'] == 3) ? 'selected' : ''; ?>>3</option>

                </select>
            </div>                
        </div>
            <?php endif; ?>

    </div>

    <div class="clearfix"></div>

    <div class="form-group">
        <div class="pull-right">
            <?php if ($PATTERN == '/user/profile'  OR substr($PATTERN,0,12) == '/user/update'): ?>
                <input type="hidden" name="update" value="update"/>
                <?php else: ?>
                <input type="hidden" name="create" value="create"/>
                
            <?php endif; ?>

            <button id="submitbutton" type="submit" class="btn btn-primary btn-lg" onmousedown="checkSteps()">
                <i class="glyphicon glyphicon-ok icon-white"></i>
                <?php if ($PATTERN == '/user/profile'): ?>Update Profile
                    <?php else: ?>Save
                <?php endif; ?>
            </button>
            <?php if (isset($POST['id'])): ?>
                <button type="button" class="btn btn-primary btn-lg" onclick="chathim()">

                    BESKEDER

                </button>
            <?php endif; ?>
        </div>



    </div>

</form>

<?php if ($PATTERN != '/user/create' AND $PATTERN != '/user/profile' && ($POST['group_id'] == 1 || $POST['group_id'] == 2)): ?>

    <style>
        .key {
            font-weight: bolder;
            width: 150px;
        }
    </style>

    <h2>Actions</h2>

    <div class="col-sm-12">
        <ul class="nav nav-tabs" id="myTab">
            <li><a data-toggle="tab" href="#bigquiz">Pre-Big Questionnaire</a></li>
            <li class="active"><a data-toggle="tab" href="#step1">Step 1</a></li>
            <li><a data-toggle="tab" href="#step2">2</a></li>
            <li><a data-toggle="tab" href="#step3">3</a></li>
            <li><a data-toggle="tab" href="#step4">4</a></li>
            <li><a data-toggle="tab" href="#step5">5</a></li>
            <li><a data-toggle="tab" href="#step9">6</a></li>
            <li><a data-toggle="tab" href="#step7">Step A</a></li>
            <li><a data-toggle="tab" href="#step8">Step B</a></li>    
            <li><a data-toggle="tab" href="#litequiz">Lite Questionnaire</a></li>	
            <li><a data-toggle="tab" href="#lquiz">Graph</a></li> 
            <li><a data-toggle="tab" href="#sixthbigquiz">Post-Big Questionnaire</a></li>
            <li><a data-toggle="tab" href="#followupquiz">Follow Up Questionnaire</a></li>
         
        </ul>
        <div class="tab-content" id="myTabContent" style="padding: 10px;">
            <div id="step1" class="tab-pane fade in active">
                <?php echo $this->render('user/__step1_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="step2" class="tab-pane fade">
                <?php echo $this->render('user/__step2_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="step3" class="tab-pane fade">
                <?php echo $this->render('user/__step3_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="step4" class="tab-pane fade">
                <?php echo $this->render('user/__step4_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="step5" class="tab-pane fade">
                <?php echo $this->render('user/__step5_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="step9" class="tab-pane fade">
                <?php echo $this->render('user/__step6_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="step7" class="tab-pane fade">
                <?php echo $this->render('user/__stepA_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="step8" class="tab-pane fade">
                <?php echo $this->render('user/__stepB_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="bigquiz" class="tab-pane fade">
                <?php echo $this->render('user/__bigquestionnaire_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="sixthbigquiz" class="tab-pane fade">
                
                <?php echo $this->render('user/__sixthbigquestionnaire_data.html',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="litequiz" class="tab-pane fade">
                <?php echo $this->render('user/__litequestionnaire_data.htm',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="followupquiz" class="tab-pane fade">
                <?php echo $this->render('user/__followupquestionnaire_data.html',$this->mime,get_defined_vars()); ?>
            </div>
            <div id="lquiz" class="tab-pane fade">
                <?php echo $this->render('user/__questionnaire_graph.htm',$this->mime,get_defined_vars()); ?>
            </div>
        </div>
    </div>

<?php endif; ?>

</div>
<script>
    $(document).ready(function () {
       
        $.validator.addMethod("validPhone", function (value, element) {
        if(value == "")
            return true;
        else if ((isNaN(value)) || (value.indexOf(" ") != -1) || (value.length < 13) || (value.substring(0, 3) != '+45' && value.substring(0, 3) != '+44'))
            return false;
        else
        {
         return true;
        }
    }, 'Phone number is not valid, please use the format +451234567890 or +441234567890');

        <?php if (substr($PATTERN,0,12) == '/user/update' or $PATTERN == '/user/profile'): ?>
     
                $('#editpage').validate({
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                last_name: {
                    minlength: 2,
                    required: true
                },
                phone: {
                    minlength: 8,
                    required: false,
                    validPhone:true
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    minlength: 2,
                    required: true
                },
                password: {
                    required: false
                },
                c_password: {
                    required: false, equalTo: "#password", minlength: 5
                }
            },
            highlight: function (element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function (element) {
                //element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
            },
            submitHandler: function(form) {
               $("#c_password").val($.trim($("#c_password").val()));
               $("#password").val($.trim($("#password").val()));
              $('#submitbutton').attr('disabled', 'disabled'); // prevent from resubmission
              form.submit();
            }
        });

        <?php else: ?>
                $('#editpage').validate({
            rules: {
                name: {
                    minlength: 2,
                    required: true
                },
                last_name: {
                    minlength: 2,
                    required: true
                },
                phone: {
                    minlength: 8,
                    required: false,
                    validPhone:true
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    minlength: 2,
                    required: true
                },
                password: {
                    required: true
                },
                c_password: {
                    required: true, equalTo: "#password", minlength: 5
                }
            },
            highlight: function (element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function (element) {
                //element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
            },
            submitHandler: function(form) {
                $("#c_password").val($.trim($("#c_password").val()));
               $("#password").val($.trim($("#password").val()));
              $('#submitbutton').attr('disabled', 'disabled'); // prevent from resubmission
              form.submit();
            }
        });

        
                <?php endif; ?>

    });

    function chathim() {
        window.location.href = "/section/messages?uid=<?php echo isset($POST['id']) ? $POST['id'] : 0; ?>";
    }
//  not required as server side check
//    function checkEmailAvailability()
//    {
//        var currentemail = $('#email').val();
//        $('#email-alert-check-exists').html('');
//
//        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
//        if (emailReg.test(currentemail))
//        {
//            //alert(currentemail);
//            if(currentemail=="<?php echo isset($POST['email']) ? $POST['email'] : ''; ?>")
//                return;
//            $.ajax({
//                url: "<?php echo $ROOT; ?>/window/check/email",
//                type: 'POST',
//                dataType: 'json',
//                async: false,
//                data: {email: currentemail},
//                success: function (data) {
//
//                    if (data.status == 'success') {
//                        $('#email-alert-check-exists').html('Email Address already exist');
//                        //$("#email").focus();
//                    }
//                }
//
//            });
//        }
//    }

    /*function validPhone(){
     var phoneVal = $('#phone').val();
     $('#phone-alert-validation').html('');
     
     var phoneRegExp = /^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/;
     
     var numbers = phoneVal.split("").length;
     if (10 <= numbers && numbers <= 20 && phoneRegExp.test(phoneVal)) {
     return true;
     } else {
     $('#phone-alert-validation').html('Phone number is not valid, please use the format +4512345678');
     $( "#phone" ).focus();
     }
     }*/
// no need of validating by method as it is done by jquery validator
//    function validPhone()
//    {
//        var phoneVal = $('#phone').val();
//        $('#phone-alert-validation').html('');
//
//        if($.trim(phoneVal) != "")
//        {
//
//          if ((isNaN(phoneVal)) || (phoneVal.indexOf(" ") != -1) || (phoneVal.length < 13) || (phoneVal.substring(0, 3) != '+45' && phoneVal.substring(0, 3) != '+44'))
//            {
//                $('#phone-alert-validation').html('Phone number is not valid, please use the format +4512345678 or +4412345678');
//                $("#phone").focus();  
//                $('input[type="submit"]').removeAttr('disabled');
//            }
//          else
//            {
//                $('input[type="submit"]').attr('disabled','disabled');
//            }
//            return;
//         }
//
//            // checking for unqieness
//
//            $.ajax({
//                url: "<?php echo $ROOT; ?>/window/check/phone",
//                type: 'POST',
//                dataType: 'json',
//                async: false,
//                data: {phone: phoneVal, userid: $('#userId').val()},
//                success: function (data) {
//
//                    if (data.status == 'success') {
//                         $('#phone-alert-validation').html('This phone no. is already registered.');
//                         $("#phone").focus();
//                    }
//                }
//
//            });
//
//    }
    
    <?php if (isset($discharged) && $discharged == '1'): ?>
    // discharged user
    $(document).ready(function(){
        //$('input').attr("disabled");
        $('input').attr('disabled', true); 
        $('input').prop('disabled', true);
        $('button[type="submit"]').hide(); 
        $('select').prop('disabled', true);
        $('select').attr('disabled', true);
        $('textarea').prop('disabled', true);
        $('textarea').attr('disabled', true);
        
        //alert('ss');
    });
    <?php endif; ?>

</script>


<script src="<?php echo $ROOT; ?>/assets/js/passwordstrength.js"></script>


<script>
    previous = 0;
      jQuery(document).ready(function () {
            var options = {
                onLoad: function () {
                   // $('#messages').text('Start typing password');
                },
                onKeyUp: function (evt) {
                   // $(evt.target).pwstrength("outputErrorList");
                }
            };
            $('#password').pwstrength(options);
        
            //step 6 thing
            
            $(".additionalddl").on('focus', function () {
                // Store the current value on focus and on change
                previous = this.value;
            });

            $('.additionalddl').change(function(){
                
                var thisval = $(this).val();
                
                var stepA = $('#stepA').val();
                var stepB = $('#stepB').val();
                var step6 = $('#step6').val();
                
                var max = Math.max(stepA, stepB, step6);
                
                var arr = [stepA, stepB, step6];
                
                var recipientsArray = arr.sort(); 

                var reportRecipientsDuplicate = [];
                for (var i = 0; i < recipientsArray.length - 1; i++) {
                    if (recipientsArray[i + 1] == recipientsArray[i]) {
                        if(recipientsArray[i] != 0)
                        reportRecipientsDuplicate.push(recipientsArray[i]);
                    }
                }
                console.log(reportRecipientsDuplicate);
                if(reportRecipientsDuplicate.length > 0)
                {
                    alert('There is already value ' + thisval + " defined for one of the steps from A,B and 6.");
                    $(this).val(previous);
                    return false;
                }
                
				/*
                if(step6 !=0 && max!=step6)
                {
                    alert("Step 6 should have maximum value among steps A,B or 6.");
                    $(this).val(previous);
                    return false;
                }
				*/
               
            });
        });
        
        function checkSteps()
        {
               var stepA = $('#stepA').val();
                var stepB = $('#stepB').val();
                var step6 = $('#step6').val();
                
                var max = Math.max(stepA, stepB, step6);
                
                var arr = [stepA, stepB, step6];
                
                var recipientsArray = arr.sort(); 

                var reportRecipientsDuplicate = [];
                for (var i = 0; i < recipientsArray.length - 1; i++) {
                    if (recipientsArray[i + 1] == recipientsArray[i]) {
                        if((recipientsArray[i] != 0) && (recipientsArray[i] != undefined))
                        reportRecipientsDuplicate.push(recipientsArray[i]);
                    }
                }
                console.log(reportRecipientsDuplicate);
                if(reportRecipientsDuplicate.length > 0)
                {
                    alert("There is duplicate defined for one of the steps A,B and 6.");
                    $(this).val(previous);
                    return false;
                }
               
/*			   
                if(step6 !=0 && max!=step6)
                {
                    alert("Step 6 should have maximum value among steps A,B or 6.");
                    $(this).val(previous);
                    return false;
                }
				*/
        }      
</script>