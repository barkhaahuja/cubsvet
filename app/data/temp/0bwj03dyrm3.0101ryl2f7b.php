<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
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
    .ActivityContent .popover {
        background: #000;
        width: 175px;
    }
    .popover.bottom .arrow:after {
        border-bottom-color: #fff;
    }
    .WindowHeaderBar .popover-content p, .ActivityContent .popover-content p {
        color: #fff;
        line-height: 24px;
        margin: 0;
        padding: 8px 12px;
    }
    /*** ***/
    .WindowHeaderBar .popover {
        background-color: #000;
    }
    .ActivityContent .popover.bottom .arrow:after, .WindowHeaderBar .popover.bottom .arrow:after {
        border-bottom-color: #000;
    }


</style>
<!-- Modal -->
<div class="modal fade" id="ModalActivityList" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow Window" style="height: 450px;">

            <div class="WindowHeaderBar"> Aktivitetsliste
                <a href="javascript:void(0)" class="WindowHelp" data-toggle="popover"></a>
                <a href="#" class="WindowClose" data-dismiss="modal"></a>
            </div>

            <div class="ContentWindow">

                <div class="ALHeader">
                    <div class="ALHeaderLeft">
                        <div class="ALHeaderLabel">Tilfredsstillende aktiviteter</div>
                    </div>
                    <div class="ALHeaderRight">
                        <div class="ALHeaderLabel">Krævende aktiviteter</div>
                    </div>
                </div>

                <div class="ALContent">
                    <div class="ALContentLeft ALContentSortable" id='leftboxdata'>
                        <?php foreach (($activities_left?:array()) as $activity): ?>
                            <div id="<?php echo $activity['id']; ?>" data-sort="<?php echo empty($activity['srt_order']) ? $activity['id'] : $activity['srt_order']; ?>" class="Activity">
                                <div class="ActivityContent">
                                    <?php echo $activity['activity']; ?>
                                    <a href="javascript:void(0)" class="removeActivity" onclick="closeicon(<?php echo $activity['id']; ?>)"></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="ALContentRight ALContentSortable" id='rightboxdata'>
                        <?php foreach (($activities_right?:array()) as $activity): ?>
                            <div id="<?php echo $activity['id']; ?>" data-sort="<?php echo empty($activity['srt_order']) ? $activity['id'] : $activity['srt_order']; ?>" class="Activity">
                                <div class="ActivityContent">
                                    <?php echo $activity['activity']; ?>
                                    <a href="javascript:void(0)" class="removeActivity" onclick="closeicon(<?php echo $activity['id']; ?>)"></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="ALFooter">
                    <a class="ALFooterButtonLeft" data-toggle="popover" href="javascript:void(0)">TILFØJ TILFREDSSTILLENDE
                        AKTIVITET</a>
                    <a class="ALFooterButtonRight" data-toggle="popover" href="javascript:void(0)">TILFØJ
                        KRÆVENDE AKTIVITET</a>
                </div>

            </div>

        </div>
    </div>

</div>


<div id="WindowHelpContent" class="popover bottom">
    <div class="WindowHelpContentTitle" style="font-weight: bolder">
        Aktivitetsliste
    </div>
    <p>For at tilføje en en tilfredsstillende
        aktivitet, skal du klikke på ‘TILFØJ
        TILFREDSSTILLENDE AKTIVITET’.
        For at tilføje en en krævende aktivitet,
        skal du klikke på ‘TILFØJ KRÆVENDE
        AKTIVITET’.
    </p>

    <p>
        For at forlade redskabet, klikker du på
        krydset i hjørnet. Alt vil være gemt
        automatisk.
    </p>

    <div class="WindowHelpContentFooter" style="background-color: #999;">
        <div class="WindowHelpButton"></div>
    </div>
</div>

<div id="ActivityEditorLeft" class="popover top">
    <div style="width: 230px;height: 100px;">
        <p style="font-size: 12px;color: #999">Beskriv din tilfredsstillende aktivitet:</p>
        <input class="ActivityTextLeft" type="text" style="width: 100%;"/>

        <div style="margin-top: 10px">
            <div class="Button30x100 But-Cross-30x100"><a onclick="hideActivityEditor('.ALFooterButtonLeft');"
                                                          href="javascript:void(0)">FORTRYD</a></div>
            <div class="Button30x100 But-Tick-30x100"><a onclick="saveActivity('.ALContentLeft');"
                                                         href="javascript:void(0)">GEM</a>
            </div>
        </div>
    </div>
</div>

<div id="ActivityEditorRight" class="popover top">
    <div style="width: 230px;height: 100px;">
        <p style="font-size: 12px;color: #999">Beskriv din krævende aktivitet:</p>
        <input class="ActivityTextRight" type="text" style="width: 100%;"/>

        <div style="margin-top: 10px">
            <div class="Button30x100 But-Cross-30x100"><a onclick="hideActivityEditor('.ALFooterButtonRight');"
                                                          href="javascript:void(0)">FORTRYD</a></div>
            <div class="Button30x100 But-Tick-30x100"><a onclick="saveActivity('.ALContentRight');"
                                                         href="javascript:void(0)">GEM</a>
            </div>
        </div>
    </div>
</div>


<div class="click_popOver popover bottom" id="closebox">

    <p>Ønsker du at
        slette denne?</p>
    <div class="popOver_btn">
        <button class="prevBtn" onclick="hidecloseblock()">NEJ</button>
        <button class="nextBn" onclick="delact()">JA</button>
    </div>


</div>
<input type="hidden" id="rmida" value="0">


<script>
            $('.removeActivity').popover({
    content: $('#closebox').html(),
            html: true,
            placement: 'bottom',
            trigger: 'click'
    });
            // ActivityEditorLeft
            $('.ALFooterButtonLeft').popover({
    content: $('#ActivityEditorLeft').html(),
            html: true,
            placement: 'top',
            trigger: 'click'
    });
            // ActivityEditorRight
            $('.ALFooterButtonRight').popover({
    content: $('#ActivityEditorRight').html(),
            html: true,
            placement: 'top',
            trigger: 'click'
    });
            // Drag & Drop
            $('.ALContentSortable').sortable({
    connectWith: '.ALContentSortable',
            placeholder: 'ActivityPlaceholder',
            stop: function(event, ui) {
            var sorted = $(this).sortable('toArray').toString();
                    // update sorted order of activities
                    $.ajax({
                    url: "<?php echo $ROOT; ?>/window/al/sort",
                            type: 'POST',
                            dataType: 'json',
                            async: false,
                            data: { sort: sorted }
                    });
            }
    });
            function hidecloseblock(){

            hidePopovers();
                    document.getElementById("rmida").value = 0;
            }

    function hideActivityEditor(selector) {
    hidePopovers();
    }

    function saveActivity(destination) {
        
            if (destination == '.ALContentLeft') {
    var text = $('.ActivityTextLeft').val(),
            type = 'left';
    } else {
    var text = $('.ActivityTextRight').val(),
            type = 'right';
    }
    if (text) {
    $.ajax({
    url: "<?php echo $ROOT; ?>/window/al/create",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { ubication: type, activity: text },
            success: function (data) {

            if (data.status == 'success') {
            var activity = '<div id="' + data.id + '" data-sort="' + data.id + '" class="Activity">';
                    activity += '<div class="ActivityContent">';
                    activity += text;
                    activity += '<a href="javascript:void(0)" class="removeActivity"></a>';
                    activity += '</div>';
                    activity += '</div>';
                    $(destination).append(activity);
            }
            }
    });
            if (destination == '.ALContentLeft') {
    hideActivityEditor('.ALFooterButtonLeft');
    } else {
    hideActivityEditor('.ALFooterButtonRight');
    }
    }
    }


    $('.WindowHelp').popover({
    content: $('#PE-HelpContent2').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
    });
            function closeicon(id){


            document.getElementById("rmida").value = id;
                    hidePopovers();
                    var content = $('#closebox').html();
                    $('.removeActivity').popover({
            content: content,
                    html: true,
                    placement: 'bottom'

            }).show();
            }

    function delact(){
    var id = document.getElementById("rmida").value;
            $.ajax({
            url: "<?php echo $ROOT; ?>/calendar/removeact",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                    id: id

                    },
                    success: function(data) {
                    reloadright();
                            reloadleft();
                    },
                    error: function(data) {
                    }
            });
    }


    function reloadright() {

    $.ajax({
    url: "/window/al/rightload",
            type: 'GET',
            success: function(data) {
            document.getElementById("rightboxdata").innerHTML = data;
                    // $('#rightcontainer').html(data);
            }
    });
    }

    function reloadleft() {

    $.ajax({
    url: "/window/al/leftload",
            type: 'GET',
            success: function(data) {
            document.getElementById("leftboxdata").innerHTML = data;
                    // $('#rightcontainer').html(data);
            }
    });
    }


    function hidePopovers() {
    $('.popover.fade.bottom').each(function() {
    $(this).remove();
    });
            $('.popover.fade.top').each(function() {
    $(this).remove();
    });
            $('.popover.fade.left').each(function() {
    $(this).remove();
    });
            $('.popover.fade.right').each(function() {
    $(this).remove();
    });
    }

</script>
<div id="PE-HelpContent2" class="popover bottom">
    <div class="title">Aktivitetsliste</div>
    <p>Formålet med dette redskab er, at give dig et overblik over, hvilke aktiviteter der er henholdsvis 
        tilfredsstillende og krævende for dig. Aktivitetslisten er også tilgængelig i din kalender.<br/><br/>
        Klik på ÅBN for at arbejde med din aktivitetsliste.
    </p>
</div>