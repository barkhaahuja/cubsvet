<link href="<?php echo $ROOT; ?>/3rdparty/zurb-joyride/joyride-2.1.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/tour.css" rel="stylesheet">


<div class="modal fade" id="modalGuide" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-hidden="true"></a>
            <p style="margin: auto;width: 400px;height: 100px;text-align: center;margin-top: 50px;">
               Du skal indledningsvist opsætte dine profildata (personlige oplysninger).<br>
               For at gå videre, skal du lukke denne box, ved at klikke på krydset i øvre højre hjørne..
            </p>
        </div>
    </div>
</div>

<ol id="joyRideTipContent">
    <li data-class="Dash-Profile" data-text="&rarr; NÆSTE" class="tour">
        <div class="tour-title">Profil-faneblad</div>
        <p>Fra denne fane kan du få adgang til at indskrive/rette din personlige oplysninger</p>
    </li>
    <li data-id="info-edit" data-text="&rarr; NÆSTE" class="tour">
        <div class="tour-title">Knappen redigér</div>
        <p>Tryk på denne knap for at redigere dine personlige oplysninger</p>
    </li>
    <li data-id="pass-edit" data-text="&rarr; NÆSTE" class="tour">
        <div class="tour-title">Adgangskode</div>
        <p>Det er vigtigt, at du ændrer din adgangskode!</p>
        <p>Vi anbefaler, at du ændrer den til én, du nemt kan huske.</p>
    </li>
</ol>

<script src="<?php echo $ROOT; ?>/3rdparty/zurb-joyride/jquery.joyride-2.1.js"></script>

<script>

    $(document).ready(function () {

        $('#modalGuide').modal('hide');

        $('#joyRideTipContent').joyride({
            autoStart: true,
            postStepCallback: function (index, tip) {
                if (index == 2) { 
                    $(this).joyride('set_li', false, 1);
                    //window.parent.location.href = "<?php echo $ROOT; ?>/";
                    /*$('#quizContainer').load('<?php echo $ROOT; ?>/window/quiz<?php echo $quiz_step; ?>', function () {
                        $('#myModal').modal();
                    });*/
                }                
            },
            modal: true,
            expose: true
        });

    }) ;
</script>
