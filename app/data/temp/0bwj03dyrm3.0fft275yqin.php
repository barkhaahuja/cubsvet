<div class="container" xmlns="http://www.w3.org/1999/html">

    <h2><?php echo $question_title; ?></h2>

    <h4 class="text-muted"><?php echo $question_subtitle; ?></h4>

    <div class="divoptions">
   
    <?php foreach (($question_options?:array()) as $question_option): ?>
       
        <div class="row">
        <div class="col-sm-3">
            <div class="radio">
                <label>
                    <input type="radio" name="option" value="<?php echo $question_option->id; ?>">
                                        <?php echo $question_option->option_text; ?>
                </label>
            </div>
        </div>
        <?php if ($question_option->option_type == 2): ?>
            <div class="col-sm-9" style="margin-bottom: 10px">
                <textarea  name="<?php echo 'txt'.$question_option->id.'[]'; ?>" class="form-control" rows="3"></textarea>
            </div>
        <?php endif; ?>
        <?php if ($question_option->option_type == 1): ?>
            <div class="col-sm-9" >
                <input type="text"  name="<?php echo 'txt'.$question_option->id.'[]'; ?>"  class="form-control" value="">
            </div>
        <?php endif; ?>
        <?php if ($question_option->option_type == -1): ?>
            <div class="col-sm-9" >
               
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