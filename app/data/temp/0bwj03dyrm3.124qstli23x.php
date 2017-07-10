<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/css/slider.css" rel="stylesheet">

<style>
    .container-slider {
        height: 60px;
        background-color: #8F8D8D;
        padding-top: 20px;
    }

    .indicator-slider {
        height: 60px;
        background-color: #8FE28F;
    }

    .indicator-slider p {
        color: white;
        font-size: 36px;
        margin-top: 7px;
        text-align: center;
    }

    .slider-handle {
        background-color: #8FE28F;
        background-image: none;
    }
</style>

<div class="container">
  
    <h2><?php echo $question_title; ?></h2>

    <div class="row">
        <div class="col-sm-12">
            <p>
               <?php echo $question_description; ?>
            </p>
        </div>
    </div>

    <hr class="visible-xs">
    <?php foreach (($question_options?:array()) as $question_option): ?>
        <div class="row" style="margin-top: 150px;">
            <input type="hidden" name="option" value="<?php echo $question_option->id; ?>" />
            <div class="col-sm-2">
                <p>Værst tænkelige helbredstilstand</p>
            </div>
            <div class="col-sm-6 container-slider">
                <input type="text" id="foo" class="span2" value="11" data-slider-min="0" data-slider-max="100"
                       data-slider-step="1" data-slider-value="10" data-slider-orientation="horizontal"
                       data-slider-selection="after" data-slider-tooltip="hide" style="width: 100%"
                       name="<?php echo 'txt'.$question_option->id; ?>">
            </div>
            <div class="col-sm-2 indicator-slider">
                <p>11%</p>
            </div>
            <div class="col-sm-2">
                <p>Bedst tænkelige helbredstilstand</p>
            </div>
        </div>
    <?php endforeach; ?>
    


</div>
<!-- /container -->

<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/js/bootstrap-slider.js"></script>

<script>

    $(document).ready(function () {
        hideBtnOnVideo();
        $('#foo').slider()
                .on('slide', function (ev) {
                    $('.indicator-slider p').html(ev.value + '%');
                    showBtnOnVideo();
                });
    });

</script>
