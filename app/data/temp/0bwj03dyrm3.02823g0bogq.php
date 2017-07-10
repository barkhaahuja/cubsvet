<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/S6.css" rel="stylesheet">
<link href="<?php echo $ROOT; ?>/assets/css/activity_list.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/3rdparty/jqueryui/jquery-ui-1.10.custom.min.js"></script>
<style>

    .click_popOver {
        width: 175px;
        height: auto;
        margin: 0 auto;
    }
    .click_popOverBox {
        background: #191919;
        float: left;
        border-radius: 5px;
    }
    .click_popOver p {
        color: #fff;
        font-size: 14px;
        padding: 15px 20px 10px;
    }
    .click_popOver .popOver_btn {
        bottom: 0;
        float: left;
        padding: 0 28px;
        width: auto;
    }
    .popOver_btn button {
        background: none repeat scroll 0 0 #3B3B3B;
        border: medium none;
        border-radius: 15px;
        color: #FFFFFF;
        float: left;
        padding: 3px 15px;
        text-transform: uppercase;
        width: 47%;
        font-weight: bold;
    }
    .popOver_btn button.prevBtn {
        margin: 0 3px 8px 0;
    }
    .popOver_btn button.nextBn {
        margin: 0 0 8px 3px;
    }
    .bottomIcon {
        background: url("<?php echo $ROOT; ?>/assets/img/commentPeak_bottomDRK.png") no-repeat scroll center 0;
        display: block;
        float: left;
        height: 10px;
        width: 100%;
    }
    /*** clickOver ***/
    .popover {
        background: #fff;
        width: 275px;
    }
    .popover-content p {
        color: #333;
        line-height: 24px;
        margin: 0;
        padding: 8px 12px;
    }


    /*** close_popover ***/
    .riskmidcontbox .popover.bottom {
        background: none repeat scroll 0 0 #000000;
        position: fixed;
        width: 175px;
        z-index: 9999;
        border-radius: 4px;
    }
    .popover .popover-content h3 {
        color: #fff;
        font-size: 13px;
        padding: 0 20px;
    }
    .popover .popover-content .twoBtn {
        padding: 0 0 10px;
    }
    .popover .twoBtn button {
        padding: 4px;
        border-radius: 22px;
    }
    .popover.bottom .arrow:after {
        border-bottom-color: #000;
        top: 0;
    }

    .riskmidcontbox .popover.bottom, .Personhandlemidcontbox .popover.bottom, .Personhandleriskmidcontbox .popover.bottom {
        background: none repeat scroll 0 0 #000000;
        position: fixed;
        width: 175px;
        z-index: 9999;
        border-radius: 4px;
    }
    .popover .popover-content h3 {
        color: #fff;
        font-size: 13px;
        padding: 0 20px;
    }
    .popover .popover-content .twoBtn {
        padding: 0 0 10px;
    }
    .popover .twoBtn button {
        padding: 4px;
        border-radius: 22px;
    }
    .popover.bottom .arrow:after {
        border-bottom-color: #000;
        top: 0;
    }

    .popover_cont_top input {
        width: 97%;
    }
    /*** newStyle ***/
    .Window {
        float: left;
        background-color: #F2F2F2;
        padding: 0 0 10px;
    }
    .riskstnbtncontr .risksitnleftbtn, .riskstnbtncontr .risksitnrightbtn {
        width: 43%;
        padding: 3px;
        border-radius: 15px;
        margin: 7px 3px;
    }
    i.popover_closeIcon {
        background-position: 3px 2px;
        height: 20px;
        width: 28px;
    }
    i.popover_tickIcon {
        background-position: 1px 2px;
        height: 20px;
        width: 19px;
    }
    .popover.top .arrow:after {
        border-top-color: #313131;
    }
    .Personhandlecontr {
        margin-left: 50px;
    }
    .PE-HeaderBar .popover {
        color: #fff;
        width: 225px;
        background-color: #000;
    }
    .WindowHelp {
        background: url("<?php echo $ROOT; ?>/assets/img/WD-HelpIcon.png") no-repeat scroll 0 7px;
    }

    .Personhandlemidcontbox .Personhandlemidtitle {
        float: left;
        width: 275px;
    }
    .Personhandleclosebtn{
        margin: 0 5px 0 0;
    }
    .Personhandlemidl div .commentBox {
        height: auto;
    }
    .Personhandleleftcontbox {
        width: 246px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="ModalForebygg" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 960px;">
        <div class="modal-content shadow Window" style="height: auto;width: auto;">
            <div class="ContentWindow">
                <div id="S1-PGL-Container" class="shadow">

                    <div class="PE-HeaderBar"> Forebyggelsesplan
                        <a href="javascript:void(0)" class="WindowHelp" data-toggle="popover"></a>
                        <a href="#" class="close" data-dismiss="modal" aria-hidden="true"></a>
                        <div class="PGL-DropShaddowDOWN"></div>
                    </div>

                    <div class="PGL-InnerConatiner">
                        <div class="Personhandlecontr">
                            <div class="Personhandleleft">
                                <div class='Personhandlelefttitle'>Dine risikosituationer</div>
                                <div class='Personhandleleftcontbox'>
                                </div>
                                <div id="messageBox4" class="popover bottom">
                                    <h3>Er du sikker på, at du vil slette denne risikosituation?</h3>
                                    <div class="twoBtn">
                                        <button class="btn_left" onclick="deleteconfirmrisksitncancel()">Nej</button>
                                        <button class="btn_right" onclick="deleteconfirmrisksitnok()">Ja</button>
                                    </div>                
                                </div>
                                <input type="hidden" name="delrisksitnid" class="delrisksitnid" value="" />
                                <div class='Personhandleleftfooter' data-toggle="popover">
                                    <img src="<?php echo $ROOT; ?>/assets/img/plusiconstep6.png" width="10" height="10" /> TILFØJ NYT ADVARSELSTEGN 
                                </div>
                            </div>
                            <div class="Personhandlemidl">
                                <div class='Personhandlemidltitle'>Dine tidlige advarselstegn</div>   
                                <div class='Personhandlemidcontent'> </div>
                                <div id="messageBox3" class="popover bottom">
                                    <h3>Er du sikker på, at du vil slette denne risikosituation?</h3>
                                    <div class="twoBtn">                            
                                        <button class="btn_left" onclick="deleteconfirmwarngsignscancel()">Nej</button>
                                        <button class="btn_right" onclick="deleteconfirmwarngsignsok()">Ja</button>
                                    </div>
                                </div>
                                <input type="hidden" name="delwarngsignid" class="delwarngsignid" value="" />
                                <div>
                                    <div class="commentBox commentBox_1" id="commentBox" style="display:none" >
                                        <i class="top_icon"></i>
                                        <div class="comment_matter">
                                            <p>Klik på et af dine tidlige advarselstegn for at beskrive en handleplan for det</p>
                                        </div>
                                    </div>
                                </div>
                                <div class='Personhandlemidlfooter' data-toggle="popover">
                                    <img src="<?php echo $ROOT; ?>/assets/img/plusiconstep6.png" width="10" height="10" /> TILFØJ NY RISIKOSITUATION
                                </div>
                            </div>
                            <div class="Personhandleright">
                                <div class='Personhandlerighttitle'>Handleplan</div>
                                <div class='Personhandlerightcont'>       
                                    <div style="width:219px; height:250px; margin-top:3px; background: #fff; text-align: center;" class="Personhandlerightinner" id="Personhandlerightinner">
                                        <div id="Personhandlerightinnercontent"></div>
                                        <div id="Personhandletextmessage" style="display:none;position: absolute;top:150px;left: 40px;">
                                            <div class="commentBox " id="commentBox5">
                                                <i class="top_icon"></i>
                                                <div class="comment_matter">
                                                    <p>Hvad vil du gøre, hvis du  
                                                        opdager det valgte advarselstegn? 
                                                        Hvad er din plan?
                                                        Klik her og beskriv det.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="PersonhandletextContent" style="display:none">
                                            <input type="hidden" id="userwaningid" name="userwaningid" value="texens" />
                                            <div id="PersonhandletextareaContent">
                                                <textarea rows="10" cols="19" style="border-style: none; border-color: Transparent; background: #E6E6E3;" class="Personhandlewarncomment" id="Personhandlewarncomment"></textarea>
                                            </div>
                                            <div class="Personhandletnbtncontr">
                                                <div class="Personhandleitnleftbtn">
                                                    <i class="close_round_right"></i>
                                                    <a href="javascript:void(0)" class="NCB-close">FORTRYD</a>
                                                </div>
                                                <div class="Personhandleitnrightbtn">
                                                    <i class="tick_round_right"></i>
                                                    <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserwarningcomment()">FÆRDIG</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="PersonhandleleftlfooterContent" class="popover top">
                            <div class="popover_cont_top">
                                <div class="title">Beskriv aktiviteten kort og klik på FÆRDIG når du er færdig</div>
                                <input type="text" class="Personhandleriskitn" size="34" value="" />
                            </div>
                            <div class="riskstnbtncontr">
                                <div class="risksitnleftbtn">
                                    <i class="popover_closeIcon"></i>
                                    <a href="javascript:void(0)" class="NCB-close" onclick="hideuserrisksituations()" >FORTRYD</a>                
                                </div>
                                <div class="risksitnrightbtn">
                                    <i class="popover_tickIcon"></i>
                                    <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserrisksituations()">FÆRDIG</a>
                                </div>
                            </div>
                        </div>

                        <div id="PersonhandlemidlfooterContent" class="popover top">
                            <div class="popover_cont_top">
                                <div class="title">Beskriv advarselstegnet kort og klik på FÆRDIG når du er færdig</div>
                                <input type="text" class="Personhandleitn" size="20" value="" />
                            </div>
                            <div class="riskstnbtncontr">
                                <div class="risksitnleftbtn">
                                    <i class="popover_closeIcon"></i>
                                    <a href="javascript:void(0)" class="NCB-close" onclick="hideuserwarningsigns()">FORTRYD</a>                
                                </div>
                                <div class="risksitnrightbtn">
                                    <i class="popover_tickIcon"></i>
                                    <a href="javascript:void(0)" class="NCB-tick" onclick="saveuserwarningsigns()">FÆRDIG</a>
                                </div>
                            </div>
                        </div>    

                    </div>       
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // modal help
            $('.Personhandlemidlfooter').popover({
                content: $('#PersonhandlemidlfooterContent').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });

            $('.Personhandleleftfooter').popover({
                content: $('#PersonhandleleftlfooterContent').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });

            $('.WindowHelp').popover({
                content: $('#PE-HelpContent3').html(),
                html: true,
                placement: 'bottom',
                trigger: 'hover',
            });

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/showrisk",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {},
                success: function (data) {
                    if (data.status == 'success') {
                        $('.Personhandleleftcontbox').html(data.usrrsk);
                    }
                }
            });

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarnings",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {},
                success: function (data) {
                    if (data.status == 'success') {
                        $(this).parentsUntil('popover', '.popover.fade.top').remove();
                        $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                        $('.Personhandlemidcontent').html(data.usrrsk);
                        var warngsignconfrmID = '.Personhandleclosebtn';
                        $(warngsignconfrmID).popover({
                            content: $('#messageBox3').html(),
                            html: true,
                            placement: 'bottom',
                            trigger: 'click'

                        });
                    }
                }
            });
            $(".Personhandlemidtitle")
                    .mouseover(function () {
                        $('#commentBox').show();
                        //$('#Personhandletextmessage').hide();
                    })
                    .mouseout(function () {
                        //$('#commentBox').hide();
                    });

        });

        $('.popover.fade.top').each(function () {
            $(this).remove();
        });

        function hideuserwarningsigns()
        {
            $('.Personhandlemidlfooter').popover('toggle');
        }

        function saveuserwarningcomment()
        {
            var warningid = $("#userwaningid").val();
            var comment = $(".Personhandlewarncomment").val();

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/saveuserwarningcomment",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {uwarningid: warningid, ucomment: comment},
                success: function (data) {
                    if (data.status == 'success') {
                        //$('.Personhandletnbtncontr').hide();
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarningcomment",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {uwarningid: warningid},
                            success: function (data) {
                                if (data.status == 'success') {
                                    $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                    $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                    $('#Personhandlewarncomment').val(data.usrrsk);
                                    $('.graycommentBtn').hide();
                                    $('.greencommentBtn').show();
                                }
                            }
                        });
                    }
                }
            });
        }

        function rvmcontbox(id) {

            $("#Personhandlewarncomment").val('');

            $('.Personhandlemidcontbox').removeClass('Personhandlemidcontboxactiv');

            $('#' + id).addClass('Personhandlemidcontboxactiv');

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarningcomment",
                type: 'GET',
                dataType: 'json',
                async: false,
                data: {uwarningid: id},
                success: function (data) {

                    if (data.statusID == 100) {
                        $("#Personhandlewarncomment").val(data.usrrsk);
                        document.getElementById('PersonhandletextContent').style.display = 'block';
                        $('#Personhandletextmessage').hide();
                        $('#commentBox').hide();

                    }
                    else {
                        $("#Personhandlewarncomment").val('');
                        document.getElementById('PersonhandletextContent').style.display = 'block';
                        $('#commentBox').hide();
                        $('#Personhandletextmessage').show();
                    }
                }
            });

            $("#userwaningid").val(id);
        }

        $('textarea').focusin(function () {
            $('#Personhandletextmessage').hide();
        });


        function saveuserwarningsigns() {
            var warning = $(".Personhandleitn").val();

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/saveuserwarningsigns",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {uwarning: warning, owner: 1},
                success: function (data) {
                    if (data.status == 'success') {

                        $('.Personhandlemidlfooter').popover('hide');
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarnings",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {},
                            success: function (data) {
                                if (data.status == 'success') {
                                    $('.popover.fade.top').each(function () {
                                        $(this).remove();
                                    });
                                    $('.popover.fade.bottom').each(function () {
                                        $(this).remove();
                                    });

                                    $('.Personhandlemidcontent').html(data.usrrsk);
                                }
                            }
                        });
                    }
                }
            });
        }

        function showdelwarngsignsconfirm(warng_id) {
            var warngsignconfrm = warng_id;
            var warngsignconfrmID = '.Personhandleclosebtn';
            $(warngsignconfrmID).popover({
                content: $('#messageBox3').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'

            });
            $('#Personhandletextmessage').hide();
            $(".delwarngsignid").val(warng_id);
        }

        function deleteconfirmwarngsignscancel() {
            var warng_id = $(".delwarngsignid").val();
            var warngsignconfrm = warng_id;
            var warngsignconfrmID = '#warngsignsclose_' + warngsignconfrm;
            $(warngsignconfrmID).popover('toggle');
        }

        function deleteconfirmwarngsignsok() {
            var rskid = $(".delwarngsignid").val();
            var warngsignconfrm = rskid;
            var warngsignconfrmID = '#warngsignsclose_' + warngsignconfrm;
            $(warngsignconfrmID).popover('toggle');
            deleteuserwarningsigns(rskid);
        }

        function deleteuserwarningsigns(rskid) {
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/deluserwarningsigns",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {id: rskid},
                success: function (data) {
                    if (data.status == 'success') {
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/personhandleitn/showwarnings",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {},
                            success: function (data) {
                                if (data.status == 'success') {
                                    $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                    $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                    $('.Personhandlemidcontent').html(data.usrrsk);

                                }
                            }
                        });
                    }
                }
            });
        }

        function saveuserrisksituations() {
            var risk = $(".Personhandleriskitn").val();

            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/saveuserrisksituations",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {urisk: risk, owner: 1},
                success: function (data) {
                    if (data.status == 'success') {
                        $('.Personhandleleftfooter').popover('hide');
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/personhandleitn/showrisk",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {},
                            success: function (data) {
                                if (data.status == 'success') {
                                    $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                    $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                    $('.Personhandleleftcontbox').html(data.usrrsk);
                                }
                            }
                        });
                    }
                }
            });
        }

        function hideuserrisksituations()
        {
            $('.Personhandleleftfooter').popover('toggle');
        }

        function showdelrisksitnconfirm(risksitnid)
        {
            var risksitnconfrm = risksitnid;
            var risksitnconfrmID = '#risksitnclose_' + risksitnconfrm;
            $(risksitnconfrmID).popover({
                content: $('#messageBox4').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'

            });
            $(".delrisksitnid").val(risksitnid);
        }

        function deleteconfirmrisksitncancel() {
            var risksitnid = $(".delrisksitnid").val();
            var risksitnconfrm = risksitnid;
            var risksitnconfrmID = '#risksitnclose_' + risksitnconfrm;
            $(risksitnconfrmID).popover('toggle');
        }

        function deleteconfirmrisksitnok() {
            var rskid = $(".delrisksitnid").val();
            var risksitnconfrm = rskid;
            var risksitnconfrmID = '#risksitnclose_' + risksitnconfrm;
            $(risksitnconfrmID).popover('toggle');
            deluserrisksituation(rskid);
        }

        function deluserrisksituation(rskid) {
            $.ajax({
                url: "<?php echo $ROOT; ?>/window/personhandleitn/deluserrisksituation",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {id: rskid},
                success: function (data) {
                    if (data.status == 'success') {
                        $.ajax({
                            url: "<?php echo $ROOT; ?>/window/personhandleitn/showrisk",
                            type: 'GET',
                            dataType: 'json',
                            async: false,
                            data: {},
                            success: function (data) {
                                if (data.status == 'success') {
                                    $(this).parentsUntil('popover', '.popover.fade.top').remove();
                                    $(this).parentsUntil('popover', '.popover.fade.bottom').remove();
                                    $('.Personhandleleftcontbox').html(data.usrrsk);
                                }
                            }
                        });
                    }
                }
            });
        }

        $(document).on('click', '.Personhandlewarncomment', function () {
            $('#commentBox').hide();
            $('#Personhandletextmessage').hide();
        });

    </script> 

</div>
<div id="PE-HelpContent3" class="popover bottom">
    <div class="title">Forebyggelsesplan</div>
    <p> For at tilføje en Risikosituation eller
        et Tidligt advarselstegn skal du
        klikke på knappen nedenfor den
        pågældende liste.
        Når du markerer et advarselstegn på
        listen, kan du i højre kolonne
        formulere en personlig handleplan for
        hvad du skal gøre i tilfælde af at du
        oplever det pågældende advarselstegn.

    </p>
</div>













