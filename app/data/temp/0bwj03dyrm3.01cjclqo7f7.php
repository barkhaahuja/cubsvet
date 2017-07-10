
    <!-- maintenance window start -->

<!-- maintenance undo -->

<!--
<div id="widgetContainer" class="container"
     style="margin: 0px auto;position: relative; width: 800px;">
	-->
	 
<!-- maintenance undo end -->	 
	 <!-- maintenance window -->
	 
				<br/>
				<br/>
				<style>.maintenance-alert-box {color:#555;border-radius:10px;font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;padding:10px 10px 10px 36px;margin:10px;} .maintenance-alert-box span {font-weight:bold;text-transform:uppercase;} .maintenance-warning { background:#fff8c4; border:1px solid #f2c779;}</style>
				
				<!--<center><div style="width: 50%; text-align:left" class="maintenance-alert-box maintenance-warning"><span>On Friday, October 10/28/2016, </span> NoDep er midlertidig lukket mellem kl. 4.00-16.00 grundet tekniske opdateringer. Hvis du har brug for akut hjælp, skal du kontakte læge eller andet sundhedsfagligt personale.<br/>Lægevagten:<br/>Region Syddanmark: Tlf. 70110707<br/>Fanø : Tlf. 75163222(Kl. 8.00-18.00), Tlf. 70110707(Kl. 18.00-8.00)<br/>Ærø : Tlf. 63523090</div></center>-->
				<center><div style="width: 700px; text-align:left" class="maintenance-alert-box maintenance-warning">Den 28. oktober vil vi foretage en opdatering på systemet. Dette betyder at systemet ikke vil kunne benyttes i tidsrummet mellem kl. 04.00 og 16.00. Vi opfordrer venligst til, at brugen af NoDep planlægges udenom dette tidsrum. Vi beklager ulejligheden.</div></center>
				
	  <div id="widgetContainer" class="container"
     style=" margin: 20px auto;position: relative;width: 800px;"> 
	 
	 
	 
	 <!-- maintenance window end -->
	
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
