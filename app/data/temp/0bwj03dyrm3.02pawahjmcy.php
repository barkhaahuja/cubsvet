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
    .container h1 {
        margin-top: 40px;
        font-size: 72px;
    }

    .btn.btn-success {
        position: absolute;
        margin-top: -200px;
        margin-left: -570px;
    }

    .btn.btn-success span {
        display: none;
    }

</style>
<div class="container">
    <input name="separator" type="hidden" value="1">
    <h2 style="font-weight: bold;"><?php echo $question_title; ?></h2>
    <br>
    <h3><?php echo $question_subtitle; ?></h3>
</div>