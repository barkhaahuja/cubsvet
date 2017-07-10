<style>
    .VideoContainer {
        height: 406px;
        width: 720px;
        margin: auto;
        padding: 25px;
    }
</style>

<link href="<?php echo $ROOT; ?>/assets/css/video-js.css" rel="stylesheet">
<script src="<?php echo $ROOT; ?>/assets/js/video.js"></script>
<div id="videosContainer"></div>

<div class="VideoContainer">
    <video id="video" class="video-js vjs-default-skin vjs-big-play-centered" controls
           preload="none" width="720" height="406"
           poster="<?php echo $ROOT; ?>/assets/img/<?php echo $question_subtitle; ?>"
           data-setup="{}">
        <source src="<?php echo $VIDEOURL; ?><?php echo $question_videoURL; ?>" type='video/mp4'/>
    </video>
</div>

<script>
    $(document).ready(function (){
        hideBtnOnVideo();
        // video player stuff
        videojs.options.flash.swf = "<?php echo $ROOT; ?>/assets/swf/video-js.swf";
        videojs("video").ready(function () {
            //var myPlayer = this;
            this.on('ended', function () {
                showBtnOnVideo();
            });
        });
    });
</script>
