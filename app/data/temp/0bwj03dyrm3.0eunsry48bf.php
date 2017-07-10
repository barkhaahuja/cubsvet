<style>
    .WD-Header .redBtn_icon {
        background-color: #c0272d;
        border-radius: 10px;
        color: #fff;
        font-size: 13px;
        font-style: normal;
        font-weight: bold;
        height: 17px;
        left: 66% !important;
        margin: 0;
        padding: 2px 6px;
        position: absolute;
        text-align: center;
        top: 42% !important;
        width: 8px;
    }
    .ContentWidget .WD-Header .popover.right {
        background-color: #000;
        color: #fff;
        font-size: 13px;
        width: 215px;
        padding: 15px;
    }
    .popover.right .arrow:after {
        border-right-color: #000;
    }
    .ContentWidget .WD-Header .popover.right .popover-content {
        padding: 0;
    }
    .WD-Header .popover.right .popOver_btn button {
        background-color: #3a3a39;
        border: medium none;
        border-radius: 21px;
        color: #fff;
        float: left;
        padding: 2px 0;
        text-align: center;
        width: 45%;
    }
    .WD-Header .popover .popOver_btn .prevBtn {
        margin: 0 10px 0 0;
    }
    .WD-Header .popover .popOver_btn .nextBtn {
        margin: 0 0 0 10px;
    }
    #ovevflg{
        display:none;
    }
</style>
<div class="WidgetWidth200 shadow RadCornAll WD-F6-BGC">
    <div class="WidgetHeaderBar">Behandling<a class="TO-help" href="javascript:void(0)"></a></div>

    <div class="ContentWidget">
        <div class="WD-Step<?php echo $current_step; ?>_Icon"></div>
        <div class="WD-Header"><?php echo $steps[$current_step]['title']; ?>
            <i class="redBtn_icon" id="ovevflg">1</i>
        </div>
        <div class="WD-HR"></div>
        <div class="WD-SubHeader"><?php if (isset($steps[$current_step]['sections'][$current_step_complete])): ?>
                <?php echo $steps[$current_step]['sections'][$current_step_complete]; ?>
            <?php endif; ?></div>
        <div class="WD-Button WidgetButtons">
            <a id="ButtonNegativeCircle" href="javascript:void(0)"
               class="WB-overview RadCornAllExtreme">OVERSIGT</a>
            <a href="<?php echo $ROOT; ?>/step/<?php echo $current_step; ?>/<?php echo $current_sub_step; ?>"
               class="WB-continue RadCornAllExtreme">FORTSÆT</a>
        </div>
    </div>

    <div id="ContentSteps"></div>

    <div id="TO-HelpContent" class="popover bottom">
        <p>
            Dette er ét af dine vigtigste redskaber. Det er det, der viser dig, hvor du er i behandlingen. Det er også det, der viser dig, hvordan du kommer videre. Det sker ved at du klikker på FORTSÆT. Du kan også klikke på OVERSIGT og få et større overblik over den del af behandlingen, du har været igennem.
        </p>
    </div>

</div>

<div id="tooltip-overview-eventdate" class="popover bottom">

    <p>
        Tidspunktet er nu passeret, hvor du
        havde aftalt med dig selv at du ville
        afprøve din udfordring.<br>
        Du bedes nu fortsætte trinnet, også
        selvom du ikke har afprøvet din
        udfordring alligevel.<br><br>
        Klik på ‘FORTSÆT’ for at komme
        hen til øvelsen.
    </p>
    <div class="popOver_btn">
        <button class="prevBtn" onclick="oveventexit()">IKKE NU</button> <button class="nextBtn" onclick="ovevtlaunch()">FORTSÆT</button>

    </div>
</div>

<script>

            $(document).ready(function() {
                // modal help
                $('.TO-help').popover({
                    content: $('#TO-HelpContent').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'hover',
                    container: 'body'
                });

                $(".redBtn_icon").popover({
                    content: $('#tooltip-overview-eventdate').html(),
                    html: true,
                    placement: 'right',
                    trigger: 'click'
                });
                
        //$(".redBtn_icon").popover('show');
                
                
                <?php if ($current_step == 5): ?>
                
                oveventcheckn();
                
                <?php endif; ?>
        
                 <?php if ($current_step == 6): ?>
                
                oveventcheckl();
                
                <?php endif; ?>
        
                <?php if ($current_step == 7): ?>
                
                oveventcheckd1();
                oveventcheckd2();
                oveventcheckd3();
                
                <?php endif; ?>
            });

            $('#ButtonNegativeCircle').click(function() {
                $('#ContentSteps').load('<?php echo $ROOT; ?>/window/behandeling', function() {
                    $('#ModalBehandeling').modal('show');
                });
            });



            function oveventcheckn() {
                $.ajax({
                    url: "/window/nat/eventcheck",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            if (data.flag == 1) {
                                document.getElementById("ovevflg").style.display = "block";
                              
                
                            }
                        }
                    },
                    error: function(data) {
                    }
                });
            }
            
            function oveventcheckl() {
                $.ajax({
                    url: "/window/leveregler/eventcheck",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            if (data.flag == 1) {
                                document.getElementById("ovevflg").style.display = "block";
                              
                
                            }
                        }
                    },
                    error: function(data) {
                    }
                });
            }
            
             function oveventcheckd1() {
                $.ajax({
                    url: "/window/depressive/eventcheck",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            if (data.flag == 1) {
                                document.getElementById("ovevflg").style.display = "block";
                              
                
                            }
                        }
                    },
                    error: function(data) {
                    }
                });
            }
            function oveventcheckd2() {
                $.ajax({
                    url: "/window/depressive/eventcheck1",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            if (data.flag == 1) {
                                document.getElementById("ovevflg").style.display = "block";
                              
                
                            }
                        }
                    },
                    error: function(data) {
                    }
                });
            }
            function oveventcheckd3() {
                $.ajax({
                    url: "/window/depressive/eventcheck2",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                    },
                    success: function(data) {
                        if (data.status == "success") {

                            if (data.flag == 1) {
                                document.getElementById("ovevflg").style.display = "block";
                              
                
                            }
                        }
                    },
                    error: function(data) {
                    }
                });
            }

            function oveventexit() {
                document.getElementById("ovevflg").style.display = "none";
                 $(".redBtn_icon").popover('toggle');
            }
            
            function ovevtlaunch() { 
            $(".redBtn_icon").popover('toggle');
            window.location.href="<?php echo $ROOT; ?>/step/<?php echo $current_step; ?>/<?php echo $current_sub_step; ?>";
            }
</script>

