<!--<div id="widgetContainer" class="container"
     style=" margin: 100px auto;position: relative;width: 800px;">
-->
<div id="widgetContainer" class="container"
     style="margin: 0px auto;position: relative; width: 800px;">
    
    <?php if (isset($useWPWidget) && $useWPWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.progress.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>

    <?php if (isset($useTOWidget) && $useTOWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.behandling.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>

    <?php if (isset($usePHWidget) && $usePHWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.psychiatrichelp.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>

    <?php if (isset($usePEWidget) && $usePEWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.oplevelse.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>

    <?php if (isset($usePGWidget) && $usePGWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.problemgoal.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>

    <?php if (isset($useCWidget) && $useCWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.calendar.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>

    <?php if (isset($useALWidget) && $useALWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.activitylist.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>
    
    <?php if (isset($useNATRegistrationWidget) && $useNATRegistrationWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.NATregistration.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>
    
    <?php if (isset($useNATNegativeCircleWidget) && $useNATNegativeCircleWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.NATregistration.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>
    
    <?php if (isset($useNATChallengeWidget) && $useNATChallengeWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.NATregistration.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>
    
    <?php if (isset($useLevereglerWidget) && $useLevereglerWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.leveregler.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>
    
    <?php if (isset($useDepressiveWidget) && $useDepressiveWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.depressive.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>
    
    <?php if (isset($useForebyggeWidget) && $useForebyggeWidget): ?>
        <?php echo $this->render('dashboard/widgets/widget.Forebyggelsesplan.htm',$this->mime,get_defined_vars()); ?>
    <?php endif; ?>

</div>


<div id="videosContainer"></div>

<div id="quizContainer"></div>

<script>

    $(document).ready(function () {
        <?php if (isset($pending_quiz) && ! isset($GET['show_help_guide'])): ?>
                setTimeout(showQuiz, 1000);
        <?php endif; ?>

        $('#widgetContainer').BlocksIt({
            numOfCol: 3,
            offsetX: 20,
            offsetY: 20,
            blockElement: '.WidgetWidth200, .WidgetWidth260'
        });
    })

    <?php if (isset($pending_quiz)): ?>
        function showQuiz() {
            $('#quizContainer').load('<?php echo $ROOT; ?>/window/quiz<?php echo $pending_quiz_step; ?>', function () {
                $('#myModal').modal();
                
                // disable closing the modal
                $('#myModal').data('bs.modal').isShown = false;
            });
        }
    <?php endif; ?>

    <?php if (isset($video)): ?>
        function showVideo() {
            
            $('#videosContainer').load('<?php echo $ROOT; ?>/window/video/<?php echo $video; ?>', function () {
                $('#modalVideo').modal('show');
            });
        };
        showVideo();
    <?php endif; ?>


</script>
