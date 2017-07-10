<div class="container" xmlns="http://www.w3.org/1999/html">

    <h2><?php echo $question_title; ?></h2>

    <h4 class="text-muted"><?php echo $question_subtitle; ?></h4>

   
    <div class="row">
        <div class="col-sm-1">
            <div class="radio">
                <label>
                    <input type="radio" name="mainRadio" value="Ja" > 
                                   Ja
                </label>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="radio">
                <label>
                    <input type="radio" name="mainRadio" value="Nej"  >
                                    Nej
                </label>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="field-description">
                <p>Hvis ja, noter venligst grundigt hvilke(t) præparat(er) og dosis herunder:</p>
            </div>
        </div>
    </div>

    <hr class="visible-xs">
   
    <div class="divoptions">
   
    <input type="hidden" name="option" value="<?php echo $question_options['0']->id; ?>"   /> 
    <?php foreach (($question_options?:array()) as $question_option): ?>
       
        <div class="row">
        <div class="col-sm-2">
            <div class="radio">
                <label>
                   <?php echo $question_option->option_text; ?>
                </label>
            </div>
        </div>
       
        <?php if ($question_option->option_type==1): ?>
            <div class="col-sm-6">
            <input type="text"  name="<?php echo 'txtprepare'.$question_option->option_order_index.''; ?>"  class="form-control" value="">
            </div>
            <div class="col-sm-1">
                <div class="field-description">
                    <p> Dosis:</p>
                </div>
            </div>
            <div class="col-sm-3">
                <input type="text" name="<?php echo 'txt'.$question_option->option_order_index.''; ?>"  class="form-control" value="">
            </div>
        <?php endif; ?>
       
       
    </div>

    <hr class="visible-xs">
    
    <?php endforeach; ?>
    
   
</div>
      

</div>

<script>
    $(document).ready(function(){
        /*
        $('#quizform input[name=mainRadio]').on('change', function() {
           
            $(".divoptions :input").prop('disabled', false);
            $(".divoptions :input").val('');
            $(".divoptions input[name=option]").prop('checked', false);
            
            var radioval = $('input[name=mainRadio]:checked', '#quizform').val(); 
        
            if(radioval != "yes")
            {
               // disable all inputs
               $(".divoptions :input").prop('disabled', true);
            }
            else
            {
                $(".divoptions :input").prop('disabled', false);
            }
            
        });
           */ 
    });
</script>