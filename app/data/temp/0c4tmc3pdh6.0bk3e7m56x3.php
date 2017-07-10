<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 1300px;">
        <div class="modal-content">
            <!--<div class="modal-header">-->
            <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
            <!--</div>-->
            
           <iframe id="quizIframe" src="<?php echo $ROOT; ?>/quiz/<?php echo $quiz; ?>/<?php echo $questionnaire; ?>/<?php echo $step; ?>" frameborder="0" style="width: 100%;height: 680px;"></iframe>
           
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
