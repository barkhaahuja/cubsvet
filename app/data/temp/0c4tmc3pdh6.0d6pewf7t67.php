<!-- Custom styles for this template -->
<link href="<?php echo $ROOT; ?>/assets/css/quiz.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/quiz_numeric_answer.css" rel="stylesheet">

<div class="quiz-header">

    <ol class="carousel-indicators">
        <?php echo $this->render('quiz/__carousel-indicators.htm',$this->mime,get_defined_vars()); ?>
    </ol>

</div>

<form name="quizform" id="quizform" role="form" style="margin-top: 50px;">

    <input type="hidden" name="templateid" value="<?php echo $question_template; ?>" />
    <input type="hidden" name="step" value="<?php echo $questionnaire_step; ?>" />
    <input type="hidden" name="questionnaire" value="<?php echo $questionnaire_id; ?>" />
    <input type="hidden" name="quiz" value="<?php echo $questionnaire_mappingquestionnaireuser; ?>" />
    <input type="hidden" name="islastquestion" value="<?php echo $questionnaire_islastquestion; ?>" />
    <input type="hidden" name="isfirstquestion" value="<?php echo $questionnaire_isfirstquestion; ?>" />
    <input type="hidden" name="questionid" value="<?php echo $questionnaire_questionid; ?>" />
         
    <div class="quiz-container">

        <?php if (isset($quizURL)): ?>
            <?php echo $this->render($quizURL,$this->mime,get_defined_vars()); ?>
        <?php endif; ?>

    </div>

    <div class="form-group container" style="margin-top: 20px;">
        <div class="pull-right">
            
            
            
             <a id="next-btn" class="btn btn-success btn-lg"
                   onclick="showQuiz(<?php echo $quiz_id; ?>, <?php echo $questionnaire_id; ?>,<?php echo $questionnaire_step + 1; ?>);"><span
                        class="glyphicon glyphicon-arrow-right"></span>
                    <?php if (($questionnaire_islastquestion == 'true')): ?>
                        AFSLUT
                        <?php else: ?>
                        <?php echo (($questionnaire_isfirstquestion == 'true')?"NÆSTE":"NÆSTE"); ?>
                        
                    <?php endif; ?>
                </a>
            
        </div>
    </div>

</form>

<script>
    // to be called on quiz step iframes
    var showBtnOnVideo = function() {
        $("a#next-btn").show("slow");
    };
    // to be called on quiz step iframes
    var hideBtnOnVideo = function() {
        $("a#next-btn").hide();
    };

    function showQuiz(quiz, id, step) {
        $('#next-btn').addClass('disabled');
            
        $('.alert.alert-danger').remove();
        $.ajax({
            url: "<?php echo $ROOT; ?>/quiz_ajax/" + quiz + "/" + id + "/" + step,
            type: 'POST',
            dataType: 'json',
            async: false,
            data: $('#quizform').serialize(),
            success: function(data) {
                if (data.status == 'success') {
                    
                    if(data.close == true)
                    {
                      parent.location.reload();
                    }
                    else
                    {
                        if(data.suicidalmessage == 1)
                        {
                            window.parent.alert("Vi kan se, at du har krydset af, at du har tanker eller planer om eller har haft forsøg på selvmord. Hvis du har brug for akut hjælp, skal du klikke på redskabet ”Brug for akut psykiatrisk hjælp?” på dit skrivebord. Uanset hvad vil vi også ringe dig op, så vi kan snakke om, hvad det er, du oplever.");
                        }
                        
                        $(".pull-right").hide();
                        var container = $('.quiz-container');
                        container.fadeOut('slow', function() {
                            $('#quizIframe',window.parent.document).attr('src','/quiz/'+ data.quiz + '/' + data.questionnaire + '/' + data.nextStep).on("load", function () {
                                container.fadeIn('slow');
                                $(".pull-right").show();
                            });
                        });  
                    }
                    
                   
                
                  
                  /* var container = $('.quiz-container');
                    container.fadeOut('slow', function() {
                        $('.carousel-indicators').html(data.ci);
                        container.html(data.quiz);
                        $('a.btn.btn-success.btn-lg').attr('onclick', 'showQuiz(' + quiz + ',' + data.carousel_indicators.id + ',' + (data.carousel_indicators.active + data.carousel_indicators.offset + 1) + ')');
                    });
                    container.fadeIn();
                    $("a#next-btn").html('<span class="glyphicon glyphicon-arrow-right"></span> NÆSTE');
                */
                $('#next-btn').removeClass('disabled');
                }
                if (data.status == 'error') {
                    var alert = '<div class="alert alert-dismissable alert-danger">';
                    alert += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    alert += data.msg;
                    alert += '</div>';
                    $(alert).insertAfter('h2');
                    $('#next-btn').removeClass('disabled');
                }
            }
        });
    }

</script>
