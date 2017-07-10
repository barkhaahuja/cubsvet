<div class="container">
 
    <h2><?php echo $question_title; ?></h2>

    <h4 class="text-muted"><?php echo $question_subtitle; ?></h4>

    <table class="table table-striped table-hover" style="margin-top:40px;">
        <tbody>
            
            <tr>
                <th style="vertical-align:bottom">
                    Inden for de seneste 2 uger , hvor ofte har du været <br/> generet af følgende problemer? <br/><i style="font-size:12px">(Marker dit svar med “<i class="glyphicon glyphicon-ok"></i>”)</i>
                </th>
                <th style="vertical-align:bottom; width:100px">Slet<br/>ikke</th>
                <th style="vertical-align:bottom; width:100px">Flere<br/>dage</th>
                <th style="vertical-align:bottom; width:100px">Mere end<br/>halvdelen<br/> af <br/> dagene</th>
                <th style="vertical-align:bottom; width:100px">Næsten<br/>hver dag</th>
                
            </tr>
        <?php foreach (($question_options?:array()) as $question_option): ?>
       
            <?php if ($question_option->option_type==1): ?>
                
           
        <tr>
            <td><?php echo $question_option->option_text; ?></td>
            <td>
                                <button type="button" class="btn btn-xs btn-default checkclass" name="<?php echo 'radio'.$question_option->id; ?>" value="0">
                   <b>0</b>
                  </button>
            </td>
            <td>
              
                                <button type="button" class="btn btn-xs btn-default checkclass" name="<?php echo 'radio'.$question_option->id; ?>" value="1">
                   <b>1</b>
                  </button>
            </td><td>
                                              <button type="button" class="btn btn-xs btn-default checkclass" name="<?php echo 'radio'.$question_option->id; ?>" value="2">
                   <b>2</b>
                  </button>
            </td>
            <td>
                                <button type="button" class="btn btn-xs btn-default checkclass" name="<?php echo 'radio'.$question_option->id; ?>" value="3">
                   <b>3</b>
                  </button>
                
              
                    <input type="hidden" name="options[<?php echo $question_option->id; ?>]" id="<?php echo 'inputradio'.$question_option->id; ?>" value="">
            </td>
        </tr>
         <?php endif; ?>
         <?php endforeach; ?>
       
       
        
        </tbody>
    </table>

    <div class="well" style="padding-left: 30px; padding-right: 30px">
        <?php foreach (($question_options?:array()) as $question_option): ?>
            <?php if ($question_option->option_type==2): ?>
                <div class="row">
                     <?php echo $question_option->option_text; ?>
                </div>
                <input type="hidden" name="additionalQuestionId" value="<?php echo $question_option->id; ?>" />
            <?php endif; ?>
        <?php endforeach; ?>
        
        <?php foreach (($question_options?:array()) as $question_option): ?>
            <?php if ($question_option->option_type==3): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="additionalQuestionAnswer" value="<?php echo $question_option->id; ?>">
                                                        <?php echo $question_option->option_text; ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr class="visible-xs">
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    
</div>
<!--<script src="<?php echo $ROOT; ?>/assets/js/quiz_answer_numeric.js"></script>-->
<!-- /container -->

<script>
    $(document).ready(function(){
        
     
            $(".checkclass").click(function(){
                var group = ".checkclass[name='"+$(this).attr("name")+"']";
                $(group).removeClass('button_selected');
                $(this).addClass('button_selected');
               $('#input'+ $(this).attr("name")).val($(this).val());
            });
      
        
    });
</script>