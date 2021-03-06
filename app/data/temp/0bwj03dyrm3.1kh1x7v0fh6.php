<link href="<?php echo $ROOT; ?>/assets/css/calendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/activity_list.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/calf.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/assets/js/calf.js" /></script>
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
    .footer_wrapper {
        background-color: #F2F2F2;
        width: 960px;
        height: auto;
        margin: 0 auto;
        border: 1px solid #DDDCDD;
        height: 212px;
    }
    ol, ul {
        list-style: none;
    }
    blockquote {
        quotes: none;
    }
    blockquote:before, blockquote:after {
        content: '';
        content: none;
    }
    del {
        text-decoration: line-through;
    }
    .calender_left {
        width: 505px;
        height: auto;
        float: left;
    }
    .calender_right {
        float: left;
        width: 450px;
        height: 210px;
    }
    .block_content {
        width: 250px;
        height: auto;
        float: left;
    }
    .block_content_1 {
        /*background-color: #E6E6E6;*/
        background-color: #fff;
        border-left: 1px solid #B3B3B3;
/*        border-right: 1px solid #B3B3B3;*/
    }
    .block_content_2 {
        background-color: #fff;
        border-left: 1px solid #B3B3B3;
        border-right: 1px solid #B3B3B3;
    }
    .block_l_1, .block_l_2 {
        height: 185px;
        margin: 0;
        overflow-y: scroll;
        padding: 0;
        width: auto;
    }
    .block_r_1, .block_r_2 {
        float: left;
        margin: 15px 7px;
    }
    .block_r_1 .PE-TextBoxButtons1, .block_r_2 .PE-TextBoxButtons1 {
        bottom: 0;
        width: 200px;
    }
    .calender_textarea #obstblock .TB-close1, .calender_textarea #obstblock .TB-tick1,
    .calender_textarea #solblock .TB-close1, .calender_textarea #solblock .TB-tick1 {
        width: 87px !important;
        font-size: 13px;
        line-height: 23px;
        padding-top: 0;
    }
    p.headingText {
/*        color: #D2D2D2;*/
        color: #000;
        margin: 0;
    }
    .calender_textarea textarea {
/*        background-color: #E6E6E6;*/
        border: none;
        padding: 10px 5px;
        width: 190px !important;
        margin: 0;
        min-height: 126px;
        min-width: 190px;
        max-height: 126px;
        max-width: 190px;
    }
    li.one_innerBox, li.two_innerBox {
        background-color: #FFFFFF;
        border-bottom: 1px solid #E6E6E6;
        float: left;
        height: 40px;
        list-style: none;
        line-height: 0;
        width: 237px;
        cursor:pointer;
    }

    .cathoverclass, li.one_innerBox:hover{
        background-color: #808080 !important;
        color: #fff !important;
    }

    .one_innerBox .listing h4, .two_innerBox .listing h4 {
        float: left;
        font-size: 13px;
        line-height: 22px;
        margin: 0;
        padding: 12px 0 0 12px;
        font-weight: normal;
    }
    .block_l_1 .one_innerBox .listing i.closeIcon {
        background: url("<?php echo $ROOT; ?>/assets/img/top_corner_cross.png") no-repeat scroll 0 8px rgba(0, 0, 0, 0);
        display: block;
        float: right;
        height: 20px;
        padding: 10px 10px 0 0;
        text-indent: -9999px;
        width: 20px;
    }
    i.closeIcon1 {
        background: url("<?php echo $ROOT; ?>/assets/img/top_corner_cross.png") no-repeat scroll 0 8px rgba(0, 0, 0, 0);
        display: block;
        float: right;
        height: 20px;
        padding: 10px 10px 0 0;
        text-indent: -9999px;
        width: 20px;
    }
    .two_innerBox .listing i.closeIcon {
        background: url("<?php echo $ROOT; ?>/assets/img/top_corner_cross.png") no-repeat scroll 0 8px rgba(0, 0, 0, 0);
        display: block;
        float: left;
        height: 20px;
        padding: 10px 10px 0 0;
        text-indent: -9999px;
        width: 20px;
    }
    .listing_numberBox {
        border-right: 1px solid #999999;
        color: #999999;
        float: left;
        font-size: 15px;
        height: 41px;
        line-height: 44px;
        text-align: center;
        width: 26px;
    }
    .listing_boxRight {
        float: right;
        width: auto;
        height: auto;
    }
    .two_innerBox .listing input {
        float: left;
        padding: 0;
        margin: 12px 7px 0 0;
    }
    .calender_textarea i {
/*        background: url("<?php echo $ROOT; ?>/assets/img/grey_triangle.png") no-repeat scroll 30px 0;*/
        display: block;
        height: 10px;
        text-indent: -9999px;
        width: 23px;
        padding: 0 0 0 30px;
    }

    .footerBtn {
        background-color: #DADADA;
        bottom: 0;
        height: 25px;
        line-height: 22px;
        width: 100%;
        border-top: 1px solid #B3B3B3;
        border-bottom: 1px solid #B3B3B3;
    }
    .footerBtn a {
        color: #424242;
        text-decoration: none;
        font-size: 13px;
    }
    .footerBtn a:hover {
        color: #fff;
    }

    .footerBtnAct {
        background-color: #DADADA;
        bottom: 0;
        height: 25px;
        line-height: 22px;
        width: 100%;
        border-top: 1px solid #B3B3B3;
        border-bottom: 1px solid #B3B3B3;
    }
    .footerBtnAct a {
        color: #424242;
        text-decoration: none;
        font-size: 13px;
    }
    .footerBtnAct a:hover {
        color: #fff;
    }

    i.plusBtn {
        background: url("<?php echo $ROOT; ?>/assets/img/plus_button_3.8.png") no-repeat scroll 54px 4px rgba(0, 0, 0, 0);
        display: block;
        float: left;
        height: 25px;
        text-indent: -9999px;
        width: 75px;
    }
    /*** popover ***/
    .footerBtnAct .popover, .footerBtn .popover {
        width: 240px;
        height: auto;
        padding: 0;
    }
    #ContentCalendar .popover-content {
        float: left;
        width: 100%;
    }
    .popover.top .arrow:after {
        border-top-color: #303030 !important;
    }
    .footerBtnAct .popover.top, .footerBtn .popover.top {
        background: #191919;
    }
    .popover-content .btn_bottom {
        background: #303030;
        float: left;
        padding: 7px;
        width: auto;
    }
    .top_popover {
        width: auto;
        height: auto;
        padding: 10px 10px 5px;
    }
    .btn_bottom .Button30x100 {
        margin: 0 4px;
        width: 105px;
        border-radius: 20px;
    }
    .btn_bottom .Button30x100 a {
        padding: 4px 31px;
    }
    /*.footerBtn .popover {
        left: 10.222% !important;
        top: 37% !important;
    }
    .footerBtnAct .popover {
        left: 31.222% !important;
        top: 39% !important;
    }*/
    li.two_innerBox, li.one_innerBox {
        background: #fff;
    }
    .one_innerBox .listing h4, .two_innerBox .listing h4 {
        color: #000;
    }
    .two_innerBox .listing h4 {
        color: #000;
    }
    .block_l_1 .one_innerBox .listing i.closeIcon {
        background: url("<?php echo $ROOT; ?>/assets/img/Closebutton.png") no-repeat scroll 0 10px;
        height: 20px;
        float: right;
    }
    #catcomp-3 {
        margin: 10px 5px 0 0 !important;
        float: right !important;
    }
    #catcomp-3 img {
        width: 19px !important;
        height: 19px !important;
    }
    .one_innerBox .listing h4, .two_innerBox .listing h4 {
        padding: 0 0 0 12px;
        line-height: 40px;
    }
    .popover-content .btn_bottom .But-Cross-30x100 {
        background: url("<?php echo $ROOT; ?>/assets/img/popover_icon_close.png") no-repeat scroll 10px 7px #454545;
    }
    .popover-content .btn_bottom .But-Tick-30x100 {
        background: url("<?php echo $ROOT; ?>/assets/img/popover_icon_tick.png") no-repeat scroll 10px 7px #454545;
    }
    .popover-content .btn_bottom .But-Cross-30x100 a, .popover-content .btn_bottom .But-Tick-30x100 a {
        color: #fff;
    }
    .listing_boxRight i.closeIcon1 {
        background: url("<?php echo $ROOT; ?>/assets/img/Closebutton.png") no-repeat scroll 0 10px;
    }
    /*    .popover .popover-content {
        padding: 0;
    }*/


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
    i.bottomIcon {
        background: url("<?php echo $ROOT; ?>/assets/img/commentPeak_bottomDRK.png") no-repeat scroll center 0;
        display: block;
        float: left;
        height: 10px;
        width: 100%;
    }

    /*** fc-event Popover ***/
    .fc-event .popover {
        background: #000;
        width: 175px;
    }
    .fc-event .popover-content p {
        color: #fff;
        line-height: 24px;
        margin: 0;
        padding: 8px 12px;
    }

    .fc-event .popover.bottom .arrow:after {
        border-bottom-color: #000;
    }
    .fc-event .popOver_btn button.prevBtn {
        margin: 0 1% 2% 25%;
        font-size: 13px;
    }
    /*** clickOver ***/
    .listing .popover {
        background: #303030;
        width: 175px;
    }
    .listing .popover-content p {
        color: #fff;
        line-height: 24px;
        margin: 0;
        padding: 8px 12px;
    }
    /***  ***/
    .lefttitlebox_btm .popover, .righttitlebox_btm .popover {
        padding: 0 8px;
    }
    .lefttitlebox_btm .popover.top .arrow:after, .righttitlebox_btm .popover.top .arrow:after {
        border-top-color: #fff !important;
    }
    .innerrightbox {
        line-height: 10px;
        padding: 8px 0;
        height: auto;
    }
    .popover.bottom .arrow:after {
        border-bottom-color: #303030;
    }
    .ContentWidget .EventLayout textarea {
        max-height: 38px;
        max-width: 235px;
        min-height: 38px;
        min-width: 235px;
    }
    .footerBtn .popover-content, .footerBtnAct .popover-content {
        padding: 0;
    }
    .innerrightbox .popover {
        background-color: #000;
        color: #fff;
        width: 175px;
    }
    .innerrightbox .popover-content h3 {
        font-weight: normal;
        font-size: 13px;
        line-height: 17px;
        padding: 8px 12px;
        margin: 0;
    }
    .innerrightbox .popover.bottom .arrow:after {
        border-bottom-color: #000;
    }
    .innerrightbox .twoBtn button {
        background: none repeat scroll 0 0 #3b3b3b;
        border: medium none;
        border-radius: 15px;
        color: #ffffff;
        float: left;
        font-weight: bold;
        padding: 3px 15px;
        text-transform: uppercase;
        width: 47%;
    }
    .innerrightbox button.btn_left {
        margin: 0 0 8px 3px;
    }
    .innerrightbox button.btn_left {
        margin: 0 3px 8px 0;
    }
    .one_innerBox .listing span {
        float: right !important;
        margin: 10px 3px 0 0 !important;
    }
    /*** ***/
    .fc-newslot .popover.bottom {
        background-color: #000;
        color: #fff;
        width: 175px;
        height: auto;
        font-size: 13px;
        padding: 0 8px;
    }
    .fc-newslot .popover .popOver_btn {
        margin: 0 59px 0 45px;
    }
    .fc-newslot .popover .popOver_btn button {
        width: 100%;
    }

</style>

<!-- Modal -->
<div class="modal fade" id="ModalCalendar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width:auto;">
        <div class="modal-content" style="height: 800px;padding: 15px;">
            <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-hidden="true"></a>

            <div id="calendar" class="calendar"></div>

            <div style='clear:both'></div>

            <div style=" width:100%; background-color:#e6e6e6;">
                <div style="background-color: #f2f2f2; height: 10%">

                    <div align="right" style="padding-top:.3%;padding-right: .5%"><!--<button type="button" >AKTIVITETSLISTE</button>-->
                        <table border="0">
                            <tr>
                                <td> <div style="border:1px solid #fff;margin-right:25px; background-color: #616161;color:#fff; border-radius:30px; width:225px; height:28px;text-align:center; padding-top:6px;"><img src="<?php echo $ROOT; ?>/assets/img/Openbutten.png"/>&nbsp;<a href="javascript:void(0)" id="actcatbtn">OPDELING AF OPGAVER</a></div></td>
                                <td><div style="border:1px solid #fff; background-color: #616161;color:#fff; border-radius:15px; width:175px; height:28px;text-align:center; padding-top:6px; padding: left;"><a href="javascript:void(0)" id="actlistbtn"><img src="<?php echo $ROOT; ?>/assets/img/BUttengraphics.png"/>&nbsp;AKTIVITETSLISTE</a></div></td>
                            </tr>
                        </table>

                    </div>
                </div>
                <div id="container" style="width:900px;height:255px; background-color:#e6e6e6; margin:auto; display: none;">

                    <div align="left" class="lefttitlebox"> <div class="ALHeaderLabel">Tilfredsstillende aktiviteter</div></div>
                    <div align="right" class="righttitlebox"><div class="ALHeaderLabel">Krævende aktiviteter</div></div>
                    <!-- left Box -->
                    <div align="left" id="leftbox">

                    </div>

                    <div id="messageBox3" class="popover bottom">
                        <h3>Er du sikker på, at du vil slette dette advarselstegn?</h3>
                        <div class="twoBtn">
                            <button class="btn_left" onclick="deleteconfirmactlistcancel()">Nej</button>
                            <button class="btn_right" onclick="deleteconfirmactlistsok()">Ja</button>
                        </div>
                    </div>
                    <input type="hidden" name="delaclistid" class="delaclistid" value="" />
                    <!-- right Box --->
                    <div align="right" id="rightbox">

                    </div>

                    <div align="left" class="lefttitlebox_btm">
                        <div style="float:left; width:17px; margin-left:44px;margin-top: 7px;"><img src="<?php echo $ROOT; ?>/assets/img/Plusbutten.png" align="center"/></div>
                        <div style="float:right; padding-top:4px; width:345px;"><a class="ALFtButtonLeft" data-toggle="popover" href="javascript:void(0)">TILFØJ TILFREDSSTILLENDE AKTIVITET</a></div>
                    </div>
                    <div align="right" class="righttitlebox_btm">
                        <div style="float:left; width:17px; margin-left:44px;margin-top: 7px;"><img src="<?php echo $ROOT; ?>/assets/img/Plusbutten.png" align="center"/></div>
                        <div style="float:right; padding-top:4px; width:345px;"><a class="ALFtButtonRight" data-toggle="popover" href="javascript:void(0)">TILFØJ KRÆVENDE AKTIVITET</a></div>
                    </div>

                </div>



                <div style='clear:both'></div>



                <div id="container1"  style="width:86%;height:255px; background-color:#e6e6e6; margin:auto; display: none;">

                    <input type="hidden" value="" id="cid">
                    <div class="footer_wrapper">
                        <div class="calender_left">
                            <div class="block_content block_content_1">
                                <ul class="block_l_1" id="actcatblock">
                                </ul>
                                <div class="footerBtn">
                                    <a href="#" class="footerBtn1" data-toggle="popover" data-original-title="" title="">
                                        <i class="plusBtn">plus Btn</i>
                                        TILFØJ OPGAVE
                                    </a>
                                </div>
                            </div>
                            <div class="block_content block_content_2">
                                <ul class="block_l_2" id="catactblock">
                                </ul>
                                <div class="footerBtnAct">
                                    <a href="#" class="footerBtnAct1" data-toggle="popover" data-original-title="" title="">
                                        <i class="plusBtn">plus Btn</i>
                                        TILFØJ DELOPGAVE
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="calender_right">
                            <div class="block_r_1">
                                <p class="headingText">Forhindringer</p>
                                <div class="calender_textarea">
                                    <i>Top Arow</i>
                                    <textarea id="obst" style="height: 126px; width: 196px;" onclick="switchobstblock()"></textarea>
                                    <div class="PE-TextBoxButtons1" id="obstblock" style="display:none;">
                                        <a class="TB-close1" href="#" onclick="document.getElementById('obstblock').style.display = 'none';
                                                document.getElementById('obst').value = ''">FORTRYD</a>
                                        <a class="TB-tick1" href="#" onclick='saveobst()'>FÆRDIG</a>
                                    </div>
                                </div>
                            </div>
                            <div class="block_r_2">
                                <p class="headingText">Løsninger</p>
                                <div class="calender_textarea">
                                    <i>Top Arow</i>
                                    <textarea id="sol" style="height: 126px; width: 196px;" onclick="switchsolblock()"></textarea>
                                    <div class="PE-TextBoxButtons1" id="solblock" style="display:none;">
                                        <a class="TB-close1" href="#" onclick="document.getElementById('solblock').style.display = 'none';
                                                document.getElementById('sol').value = ''">FORTRYD</a>
                                        <a class="TB-tick1" href="#" onclick='savesol()'>FÆRDIG</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div style="background-color:#f2f2f2;height:30px;">
                </div>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div id="leftcontainer">

        </div>
        <div id="rightcontainer">

        </div>


        <script src="<?php echo $ROOT; ?>/3rdparty/jqueryui/jquery-ui-1.10.custom.min.js"></script>
        <script src="<?php echo $ROOT; ?>/3rdparty/fullcalendar/fullcalendar.js"></script>
        <script src="<?php echo $ROOT; ?>/3rdparty/bootstrap-slider/js/bootstrap-slider.js"></script>


        <script>




                                            $(document).ready(function () {



                                                $('#leftbox .innerrightbox').each(function () {

                                                    var eventObject = {
                                                        title: $.trim($(this).text()),
                                                        position: 'left'

                                                    };

                                                    $(this).data('eventObject', eventObject);

                                                    $(this).draggable({
                                                        helper: 'clone',
                                                        revert: true,
                                                        zIndex: 10000,
                                                        appendTo: "body"
                                                    });

                                                });

                                                $('#rightbox .innerrightbox').each(function () {

                                                    var eventObject = {
                                                        title: $.trim($(this).text()),
                                                        position: 'right'

                                                    };

                                                    $(this).data('eventObject', eventObject);

                                                    $(this).draggable({
                                                        helper: 'clone',
                                                        revert: true,
                                                        zIndex: 10000,
                                                        appendTo: "body"
                                                    });

                                                });



                                                var date = new Date();
                                                var d = date.getDate();
                                                var m = date.getMonth();
                                                var y = date.getFullYear();

                                                var calendar = $('#calendar').fullCalendar({
                                                    header: {
                                                        left: '',
                                                        center: 'prev,agendaDay,agendaWeek,next',
                                                        right: ''
                                                    },
                                                    selectable: true,
                                                    allDaySlot: false,
                                                    dayNames: ['Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag'],
                                                    dayNamesShort: ['Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag'],
                                                    defaultView: 'agendaWeek',
                                                    snapMinutes: 10,
                                                    allDayDefault: false,
                                                    firstDay: 1,
                                                    firstHour: 8,
                                                    height: 654,
                                                    selectHelper: true,
                                                    editable: true,
                                                    events: "/calendar/events",
                                                    droppable: true,
                                                    drop: function (start, allDay, jsEvent) { // this function is called when something is dropped


                                                        var originalEventObject = $(this).data('eventObject');


                                                        // we need to copy it, so that multiple events don't have a reference to the same object
                                                        var copiedEventObject = $.extend({}, originalEventObject);

                                                        // assign it the date that was reported
                                                        copiedEventObject.start = start;
                                                        copiedEventObject.allDay = allDay;


                                                        dropAct(start, copiedEventObject.id)


                                                        calendar.fullCalendar('refetchEvents')


                                                    },
                                                    eventRender: function (event, element) {
                                                        var clocks = '<br><br><br><div class="clocks">';
                                                        clocks += '<div class="clock clock-32 fill" data-id="' + event.id + '" data-percent="' + event.clockRight + '" data-type="right"></div>';
                                                        clocks += '<div class="clock clock-32 fill" data-id="' + event.id + '" data-percent="' + event.clockLeft + '" data-type="left"></div>';
                                                        clocks += '</div>';
                                                        $(clocks).insertAfter(element.find('.fc-event-title'));
                                                    },
                                                    viewDisplay: function (view) {
                                                        //   var timelineInterval = 0;
                                                        //   window.clearInterval(timelineInterval);
                                                        //   timelineInterval = window.setInterval(setTimeline, 5000);
                                                        try {
                                                            setTimeline(calendar);
                                                        } catch (err) {
                                                        }
                                                    },
                                                    eventAfterAllRender: function (view) {
                                                        renderClocks();
                                                        hidePopovers();
                                                        //reloadright();
                                                        reloadleft();
                                                    },
                                                    eventDrop: function (event, dayDelta, minuteDelta, allDay, revertFunc, jsEvent, ui, view) {

                                                        updateTime32(event, revertFunc);
                                                        //reloadright();
                                                        //reloadleft();
                                                    },
                                                    eventResize: function (event, dayDelta, minuteDelta, revertFunc) {

                                                        updateTime32(event, revertFunc);
                                                        //reloadright();
                                                        //reloadleft();
                                                    },
                                                    select: function (start, end, allDay) {

                                                        var rstd = new Date(start);
                                                        var rend = new Date(end);


                                                        var startm = rstd.getMinutes();
                                                        var endm = rend.getMinutes();
                                                        var diff = (endm - startm);


                                                        if (diff == 10 || diff == -50) {

                                                        } else {

                                                            createAct(start, end)
                                                            //reloadright();
                                                            reloadleft();
                                                            calendar.fullCalendar('refetchEvents');

//                if (checkDate(start)) {
//
//                    createAct(start, end)
//                    //reloadright();
//                    reloadleft();
//                    calendar.fullCalendar('refetchEvents');
//
//                } else {
//
//                    $('#renjufalse').popover({
//                        content: $('#closebox1').html(),
//                        html: true,
//                        placement: 'bottom',
//                        trigger: 'manual',
//                        container: '.fc-newslot'
//
//                    }).popover('show');
//
//                }
                                                        }

                                                    },
                                                    eventClick: function (calEvent, jsEvent, view) {

                                                        var dt = calEvent.start;

                                                        var evtDate = new Date(dt);
                                                        var hr = evtDate.getHours();
                                                        var placement;
                                                        var dy = evtDate.getDay();

                                                        if (hr > 18) {
                                                            placement = 'top';
                                                        } else {
                                                            placement = 'bottom';
                                                        }

                                                        if (dy == 1 && (hr <= 3 || hr == 0)) {
                                                            placement = 'bottom';
                                                        } else if (dy == 1 && hr > 3 && hr < 20) {
                                                            placement = 'right';
                                                        } else if (dy == 1 && hr >= 20) {
                                                            placement = 'top';
                                                        }


                                                        if (dy == 0 && hr <= 3) {
                                                            placement = 'bottom';
                                                        } else if (dy == 0 && hr > 3 && hr < 20) {
                                                            placement = 'left';
                                                        } else if (dy == 0 && hr >= 20) {
                                                            placement = 'top';
                                                        }

                                                        var dom_event = $(this).children().children('.fc-event-time');

                                                        hidePopovers();

                                                        //setting placement for event without start on the same day
                                                        if (!$(this).hasClass('fc-event-start'))
                                                        {
                                                            placement = 'bottom';
                                                        }

                                                        // create & show popover
                                                        dom_event.popover({
                                                            content: $('#EventEditor-' + calEvent.id).html(),
                                                            html: true,
                                                            placement: placement,
                                                            trigger: 'manual',
                                                            container: '.fc-agenda-slots'
                                                        }).on('shown.bs.popover', function () {
															// correcting left right top and bottom for popover - pradeep
															AdjustingCalendarPopOver(); // added by pradeep in calf.js for display
                                                            renderClocks();
                                                        });
                                                        dom_event.popover('show');

                                                        var left = $('.popover').css('left');
                                                        
                                                        if (left.indexOf('-') > -1) {
                                                            $('.popover').css('left', '0px');
                                                        }
                                                        // create & show slider
                                                        $('.slider-percent').slider().on('slide', function (ev) {

                                                            var type = $(this).parentsUntil(".EventLayout", ".EventSlider");
                                                            if ($(type).hasClass('EventSliderLeft')) {
                                                                var clock = type.parent().children(".clocks").children(".clock:first-child");
                                                                document.getElementById("leftcircle").value = ev.value;
                                                            } else {
                                                                var clock = type.parent().children(".clocks").children(".clock:last-child");
                                                                document.getElementById("rightcircle").value = ev.value;
                                                            }

                                                            $('.slider-indicator').html(ev.value + '%');
                                                            clock.data("percent", ev.value);

                                                            // get also smaller clock
                                                            var smallClock = $(".fc-event-container")
                                                                    .find(".clock[data-id='" + clock.data("id") + "'][data-type='" + clock.data("type") + "']")
                                                                    .first();
                                                            //smallClock.data("percent", ev.value);

                                                            renderClock(clock);
                                                            renderClock(smallClock);
                                                        });
                                                    }
                                                });




                                                $(document).on('click', '.CloseEventEditor', function () {
                                                    hidePopovers();
                                                    renderClocks();
                                                });



                                                $(document).on('click', '.clock', function () {
                                                    var type = $(this).data('type');
                                                    var percent = $(this).data('percent');
                                                    if (type == 'left') {
                                                        $('.EventSlider').attr('class', 'popover bottom EventSlider EventSliderLeft');
                                                        $('#slide_text').html("Hvor <b>tilfredsstillende</b> var denne aktivitet?");
                                                    } else {
                                                        $('.EventSlider').attr('class', 'popover bottom EventSlider EventSliderRight');
                                                        $('#slide_text').html("Hvor <b>krævende</b> var denne aktivitet?");
                                                    }
                                                    $('.slider-percent').slider('setValue', percent);
                                                    $('.slider-indicator').html(percent + '%');


                                                });

                                                $(document).on('click', '.SaveEventEditor', function () {
                                                    var activity_id = document.getElementById("pinfo").value;
                                                    var activity = document.getElementById("actvt-" + activity_id).value;
                                                    var lcircle = document.getElementById("leftcircle").value;
                                                    var rcircle = document.getElementById("rightcircle").value;


                                                    if (activity) {
                                                        $.ajax({
                                                            url: "<?php echo $ROOT; ?>/calendar/update",
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            async: false,
                                                            data: {
                                                                id: activity_id,
                                                                activity: activity,
                                                                lcircle: lcircle,
                                                                rcircle: rcircle
                                                            },
                                                            success: function (data) {

                                                            },
                                                            error: function (data) {
                                                            }
                                                        });
                                                    }
                                                    hidePopovers();
                                                    renderClocks();
                                                    //reloadright();
                                                    reloadleft();
                                                    reloadrightbox();
                                                    reloadleftbox();
                                                    calendar.fullCalendar('refetchEvents');
                                                });

                                                $("#actlistbtn").unbind("click").click(function () {


                                                    document.getElementById("container1").style.display = 'none';
                                                    if (document.getElementById("container").style.display == 'block') {
                                                        document.getElementById("container").style.display = 'none';
                                                        calendar.fullCalendar('option', 'height', 654);
                                                    } else {
                                                        document.getElementById("container").style.display = 'block'
                                                        calendar.fullCalendar('option', 'height', 400);
                                                    }

                                                    reloadrightbox();
                                                    reloadleftbox();


                                                });

                                                $("#actcatbtn").unbind("click").click(function () {
                                                    document.getElementById("container").style.display = 'none';
                                                    if (document.getElementById("container1").style.display == 'block') {
                                                        document.getElementById("container1").style.display = 'none';
                                                        calendar.fullCalendar('option', 'height', 654);
                                                    } else {
                                                        document.getElementById("container1").style.display = 'block'
                                                        calendar.fullCalendar('option', 'height', 400);
                                                        reloadcat();
                                                    }


                                                });



                                                $(document).on('click', '.DeleteEventEditor', function () {

                                                    var id = $(this).data('id');

                                                    if (confirm("Er du sikker på at du vil slette denne aktivitet?")) {

                                                        $.ajax({
                                                            url: "<?php echo $ROOT; ?>/calendar/removeact",
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            async: false,
                                                            data: {
                                                                id: id

                                                            },
                                                            success: function (data) {
                                                                reloadrightbox();
                                                                reloadleftbox();
                                                                calendar.fullCalendar('refetchEvents');
                                                            },
                                                            error: function (data) {
                                                            }
                                                        });
                                                    }
                                                    hidePopovers();

                                                });

                                                $(document).on('click', '.closeIcon0', function () {

                                                    var id = $(this).data('id');

                                                    if (id) {
                                                        $.ajax({
                                                            url: "<?php echo $ROOT; ?>/calendar/removecat",
                                                            type: 'POST',
                                                            dataType: 'json',
                                                            async: false,
                                                            data: {
                                                                id: id

                                                            },
                                                            success: function (data) {

                                                                reloadcat();
                                                            },
                                                            error: function (data) {

                                                            }

                                                        });

                                                    }


                                                });


                                                $(document).on('click', '.catlist', function () {

                                                    var id = $(this).data('id');

                                                    if (id) {
                                                        $.ajax({
                                                            url: "<?php echo $ROOT; ?>/calendar/catactload",
                                                            type: 'GET',
                                                            data: {
                                                                id: id
                                                            },
                                                            success: function (data) {
                                                                document.getElementById("catactblock").innerHTML = data;
                                                                $("#catb-" + document.getElementById("cid").value).removeClass("cathoverclass");
                                                                document.getElementById("cid").value = id;
                                                                $("#catb-" + id).addClass("cathoverclass");

                                                                getcatdata(id);

                                                                $('.two_innerBox').each(function () {
                                                                    var id = $(this).data('id');
                                                                    var eventObject = {
                                                                        title: $.trim($(this).text()),
                                                                        position: 'left',
                                                                        id: id

                                                                    };

                                                                    $(this).data('eventObject', eventObject);

                                                                    $(this).draggable({
                                                                        helper: 'clone',
                                                                        revert: true,
                                                                        zIndex: 10000,
                                                                        appendTo: "body"
                                                                    });

                                                                });

                                                            }
                                                        });
                                                    }


                                                });



                                            });

        </script>

        <div id="ActivityEditorLeft" class="popover top">
            <div style="width: 230px;height: 100px;">
                <p style="font-size: 12px;color: #999">Beskriv din tilfredsstillende aktivitet:</p>
                <input class="ActivityTextLeft" type="text" style="width: 95%;"/>

                <div style="margin-top: 10px">
                    <div class="Button30x100 But-Cross-30x100"><a onclick="hideActivityEditor('.ALFtButtonLeft');"
                                                                  href="javascript:void(0)">FORTRYD</a></div>
                    <div class="Button30x100 But-Tick-30x100"><a onclick="saveActivity('.ALContentLeft');"
                                                                 href="javascript:void(0)">FÆRDIG</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="ActivityEditorCat" class="popover top" style="background-color: black;">
            <div class="top_popover">
                <p style="font-size: 13px;color: #999">
                    Hvilken opgave vil du gerne dele op i mindre dele. Beskriv den kort.
                </p>
                <input class="CategoryText" type="text" style="width: 95%;" value="" />
            </div>
            <div class="btn_bottom" style="margin-top: 10px">
                <div class="Button30x100 But-Cross-30x100"><a onclick="hideCategoryEditor('.footerBtn1');"
                                                              href="javascript:void(0)">FORTRYD</a></div>
                <div class="Button30x100 But-Tick-30x100"><a onclick="saveCategory();"
                                                             href="javascript:void(0)">FÆRDIG</a>
                </div>
            </div>

        </div>

        <div id="ActivityEditorCatAct" class="popover top">
            <div class="top_popover">
                <p style="font-size: 14px;color: #999">
                    Beskriv delopgaven kort.</p>
                <input class="ActText" type="text" style="width: 95%;" value="" />
            </div>
            <div class="btn_bottom" style="margin-top: 10px">
                <div class="Button30x100 But-Cross-30x100"><a onclick="hideCategoryEditor('.footerBtnAct1');"
                                                              href="javascript:void(0)">FORTRYD</a></div>
                <div class="Button30x100 But-Tick-30x100"><a onclick="saveCategoryAct();"
                                                             href="javascript:void(0)">FÆRDIG</a>
                </div>
            </div>

        </div>

        <div id="ActivityEditorRight" class="popover top">
            <div style="width: 230px;height: 100px;">
                <p style="font-size: 12px;color: #999">Beskriv din krævende aktivitet:</p>
                <input class="ActivityTextRight" type="text" style="width: 95%;"/>

                <div style="margin-top: 10px">
                    <div class="Button30x100 But-Cross-30x100"><a onclick="hideActivityEditor('.ALFtButtonRight');"
                                                                  href="javascript:void(0)">FORTRYD</a></div>
                    <div class="Button30x100 But-Tick-30x100"><a onclick="saveActivity('.ALContentRight');"
                                                                 href="javascript:void(0)">FÆRDIG</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="click_popOver popover top" id="closebox">

            <p>Ønsker du at
                slette denne?</p>
            <div class="popOver_btn">
                <button class="prevBtn" onclick="hidecloseblock()">NEJ</button>
                <button class="nextBn" onclick="deleteact('cat')">JA</button>
            </div>


        </div>
        <div class="click_popOver popover top" id="closebox1">

            <p>Ønsker du at
                slette denne?</p>
            <div class="popOver_btn">
                <button class="prevBtn" onclick="hidecloseblock()">NEJ</button>
                <button class="nextBn" onclick="deleteact('act')">JA</button>
            </div>


        </div>

        <div class="popover bottom" id="closebox2">

            <p>Man kan ikke planlægge aktiviteter tilbage i tiden.</p>
            <div class="popOver_btn">
                <button class="prevBtn" onclick="hidecloseblock2()">OK</button>

            </div>

        </div>

        <input type="hidden" id="rmidc" value="0">
        <input type="hidden" id="rmida" value="0">

        <script>

            // Help
            $('.WindowHelp').popover({
                content: $('#WindowHelpContent').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });


            // ActivityEditorLeft
            $('.ALFtButtonLeft').popover({
                content: $('#ActivityEditorLeft').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });

            // ActivityEditorLeft
            $('.footerBtn1').popover({
                content: $('#ActivityEditorCat').html(),
                html: true,
                placement: 'top',
                trigger: 'click'


            });
           

            // ActivityEditorRight
            $('.ALFtButtonRight').popover({
                content: $('#ActivityEditorRight').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });

            $('.footerBtnAct1').popover({
                content: $('#ActivityEditorCatAct').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });

            $('.footerBtnAct1').popover({
                content: $('#ActivityEditorCatAct').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });


            $('.closeIcon').popover({
                content: $('#closebox').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });

            $('.closeIcon1').popover({
                content: $('#closebox1').html(),
                html: true,
                placement: 'bottom',
                trigger: 'click'
            });




            function closeicon(id) {
                hidePopovers();
                document.getElementById("rmidc").value = id;

                var content = $('#closebox').html();


                $('.closeIcon').popover({
                    content: content,
                    html: true,
                    placement: 'bottom'


                }).show();
            }
            function closeicon1(id) {
                hidePopovers();
                document.getElementById("rmida").value = id;
                var content = $('#closebox1').html();

                $('.closeIcon1').popover({
                    content: content,
                    html: true,
                    placement: 'bottom'


                }).show();
            }

            function confirmactleftdel(id)
            {
                hidePopovers();
                // var actlistconfrmID =id;
                var actlistconfrmID = '.closeactlistbtn';
                $(actlistconfrmID).popover({
                    content: $('#messageBox3').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click'

                });
                $(".delaclistid").val(id);

            }

            function deleteconfirmactlistsok()
            {
                var id = $(".delaclistid").val();
                $.ajax({
                    url: "<?php echo $ROOT; ?>/calendar/removeact",
                    type: 'POST',
                    dataType: 'json',
                    async: false,
                    data: {
                        id: id

                    },
                    success: function (data) {
                        reloadrightbox();
                        reloadleftbox();
                        calendar.fullCalendar('refetchEvents');
                    },
                    error: function (data) {
                    }
                });
                hidePopovers();
            }

            function deleteconfirmactlistcancel()
            {
                var actlistid = $(".delaclistid").val();

                var actlistconfrmID = '.closeactlistbtn';
                hidePopovers();
            }
            function hidecloseblock() {

                hidePopovers();
                document.getElementById("rmidc").value = 0;
                document.getElementById("rmida").value = 0;
            }
            function hidecloseblock2() {

                hidePopovers();

            }

            function deleteact(area) {

                if (area == "cat") {
                    var caid = document.getElementById("rmidc").value;
                } else {
                    var id = document.getElementById("rmida").value;
                }


                if (id) {
                    $.ajax({
                        url: "<?php echo $ROOT; ?>/calendar/removecatact",
                        type: 'POST',
                        dataType: 'json',
                        async: false,
                        data: {
                            id: id

                        },
                        success: function (data) {
                            reloadrightbox();
                            reloadleftbox();
                            var cid = document.getElementById("cid").value;
                            if (cid) {
                                reloadcatact(cid);
                            }
                            calendar.fullCalendar('refetchEvents');
                        },
                        error: function (data) {
                        }
                    });
                } else {

                    $.ajax({
                        url: "<?php echo $ROOT; ?>/calendar/removecat",
                        type: 'POST',
                        dataType: 'json',
                        async: false,
                        data: {
                            id: caid

                        },
                        success: function (data) {

                            reloadcat();

                        },
                        error: function (data) {
                        }
                    });
                }
                hidePopovers();
                document.getElementById("rmidc").value = 0;
                document.getElementById("rmida").value = 0;
            }

            /*
             $(document).on('click', '.removeActivity', function() {
             
             var id = $(this).data('id');
             var caid = $(this).data('caid');
             if (id) {
             $.ajax({
             url: "<?php echo $ROOT; ?>/calendar/removeact",
             type: 'POST',
             dataType: 'json',
             async: false,
             data: {
             id: id
             
             },
             success: function(data) {
             reloadrightbox();
             reloadleftbox();
             calendar.fullCalendar('refetchEvents');
             },
             error: function(data) {
             }
             });
             }else{
             
             $.ajax({
             url: "<?php echo $ROOT; ?>/calendar/removecatact",
             type: 'POST',
             dataType: 'json',
             async: false,
             data: {
             id: caid
             
             },
             success: function(data) {
             
             var cid = document.getElementById("cid").value;
             reloadcatact(cid);
             
             },
             error: function(data) {
             }
             });
             }
             
             
             });*/

        </script>
