<link href="<?php echo $ROOT; ?>/assets/css/video-js.css" rel="stylesheet">
<script src="<?php echo $ROOT; ?>/assets/js/video.js"></script>

<style>
    .VideoContainer , #modalVideo .modal-body #video-summary{
        height: 406px;
        width: 720px;
        margin: auto;
        padding: 25px;
    }
    #modalVideo .modal-body {
        background-color: #EFEFF0;
        height: 480px;
        overflow-y: auto;
        padding-bottom: 20px;
        padding-top: 5px;
    }

/*    .vjs-default-skin .vjs-big-play-button {
        width: 120px;
        height: 120px;
    }*/
</style>


<!-- Modal -->
<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 1300px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <p class="modal-title">

                </p>
            </div>
            <div class="modal-body">
                <video id="video-summary" class="video-js vjs-default-skin vjs-big-play-centered" controls
                       preload="none" width="720" height="406"
                       <?php if ($video == '0.4.mp4'): ?>
                        poster="<?php echo $ROOT; ?>/assets/img/step0.poster.png"
                        <?php else: ?>
                        <?php if ($video == '0.4.mp4' OR $video == 'X.2.mp4'): ?>
                            poster="<?php echo $ROOT; ?>/assets/img/stepX.poster.png"
                            <?php else: ?>
                            poster="<?php echo $ROOT; ?>/assets/img/step0.poster.png"
                            
                        <?php endif; ?>
                        
                    <?php endif; ?>
                    data-setup="{}">
                    <source src="<?php echo $VIDEOURL; ?><?php echo $video; ?>" type='video/mp4'/>
                </video>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
        // video player stuff
        videojs.options.flash.swf = "<?php echo $ROOT; ?>/assets/swf/video-js.swf";
        < check if = "<?php echo ($video == '0.4.mp4' || $video == 'X.2.mp4'); ?>" >
        videojs("video-summary").ready(function () {
//var myPlayer = this;
this.on('ended', function () {
$.ajax({
type: 'POST',
        dataType: 'json',
        url: "<?php echo $ROOT; ?>/user/update/step",
        data: {
        id: "<?php echo $user_id; ?>",
                treatment_step: "1.0",
                < check if = "<?php echo isset($is_control_user) && $is_control_user; ?>" >
                completed_step: "X",
                < false >
                completed_step: "0",
                < /false>
                < /check>
                completed_step_date: "<?php echo date('Y-m-d H:i', time()); ?>"
        },
        success: function (data) {
        // finish the quiz
        $.ajax({
        url: "<?php echo $ROOT; ?>/quiz_ajax/update_step",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {id: <?php echo $quiz['id']; ?>, completed_date: new Date().toISOString().slice(0, 19).replace('T', ' ')},
                success: function (data) {
                //alert("hello hero");
                window.location.href = "<?php echo $ROOT; ?>/";
                }
        });
        }
});
});
});
        < /check>
</script>
