<style>
    .quiz-container {
        background-color: #ffffff;
    }
    .carousel-indicators {
        display: none;
    }
    .container {
        text-align: center;
    }
    
    <?php if ($question_title=='logo_end'): ?>

    .btn.btn-success {
        position: absolute;
        margin-top: -200px;
        margin-left: -570px;
    }

    .btn.btn-success span {
        display: none;
    }
    
<?php endif; ?>

</style>

<div class="container">
    <input name="separator" type="hidden" value="1">
    
    <img src="<?php echo $ROOT; ?>/assets/img/<?php echo $question_title; ?>.png">

    <h2><?php echo $question_subtitle; ?></h2>

    <p>
        <!-- htmlentities-->
        <?php echo Base::instance()->raw($question_description); ?>
    </p>

</div>
<!-- /container -->
