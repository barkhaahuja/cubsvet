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
    .ContentWidget .EventLayout textarea {
        max-height: 38px;
        max-width: 235px;
        min-height: 38px;
        min-width: 235px;
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
        <div class="modal-content" style="height: 900px;padding: 15px;">
            <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-hidden="true"></a>

            <div id="calendar"></div>

            <div style='clear:both'></div>

            <div style=" width:100%; background-color:#e6e6e6;">
                <div style="background-color: #f2f2f2; height: 10%">

                    <div align="right" style="padding-top:.3%;padding-right: .5%"><!--<button type="button" >AKTIVITETSLISTE</button>-->
                        <table border="0">
                            <tr>

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

    //alert("hello world");
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
            //reloadrightbox();
            //reloadleftbox();

            calendar.fullCalendar('refetchEvents')


        },
        viewDisplay: function (view) {
            //   var timelineInterval = 0;
            //   window.clearInterval(timelineInterval);
            //  timelineInterval = window.setInterval(setTimeline, 5000);
            try {

                setTimeline(calendar);
            } catch (err) {
            }
        },
        eventRender: function (event, element) {
            var clocks = '<br><br><br><div class="clocks">';
            clocks += '<div class="clock clock-32 fill" data-id="' + event.id + '" data-percent="' + event.clockRight + '" data-type="right"></div>';
            clocks += '<div class="clock clock-32 fill" data-id="' + event.id + '" data-percent="' + event.clockLeft + '" data-type="left"></div>';
            clocks += '</div>';
            $(clocks).insertAfter(element.find('.fc-event-title'));
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
            if(!$(this).hasClass('fc-event-start'))
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
            
            if(left.indexOf('-')>-1){
                $('.popover').css('left','0px');
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


    $(document).on('click', '.removeActivity', function () {

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
                success: function (data) {
                    reloadrightbox();
                    reloadleftbox();
                    calendar.fullCalendar('refetchEvents');
                },
                error: function (data) {
                }
            });
        } else {

            $.ajax({
                url: "<?php echo $ROOT; ?>/calendar/removecatact",
                type: 'POST',
                dataType: 'json',
                async: false,
                data: {
                    id: caid

                },
                success: function (data) {

                    var cid = document.getElementById("cid").value;
                    reloadcatact(cid);

                },
                error: function (data) {
                }
            });
        }


    });

    $(document).on('click', '.removeCategory', function () {

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
                    alert(data.status);
                }

            });

        }


    });


    $(document).on('click', '.listactCategory', function () {

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
                    document.getElementById("cid").value = id;
                    getcatdata(id);

                    $('.innerleftbox1').each(function () {

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

                }
            });
        }


    });



});

        </script>

        <style>
            .timeline {
                position: absolute;
                left: 59px;
                border: none;
                border-top: 1px solid black;
                width: 100%;
                margin: 0;
                padding: 0;
                z-index: 999;
                top:100px;
            }
        </style>
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
            <div style="width: 230px;height: 100px;">
                <p style="font-size: 12px;color: #999">Hvilken opgave vil du geme dele op i mindre dele. Beskriv den kort.</p>
                <input class="CategoryText" type="text" style="width: 95%;" value="" />

                <div style="margin-top: 10px">
                    <div class="Button30x100 But-Cross-30x100"><a onclick="hideCategoryEditor('.ALFtButtonCat');"
                                                                  href="javascript:void(0)">FORTRYD</a></div>
                    <div class="Button30x100 But-Tick-30x100"><a onclick="saveCategory();"
                                                                 href="javascript:void(0)">FÆRDIG</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="ActivityEditorCatAct" class="popover top">
            <div style="width: 230px;height: 100px;">
                <p style="font-size: 12px;color: #999">Beskriv delopgaven kort.</p>
                <input class="ActText" type="text" style="width: 95%;" value="" />

                <div style="margin-top: 10px">
                    <div class="Button30x100 But-Cross-30x100"><a onclick="hideCategoryActEditor('.ALFtButtonAct');"
                                                                  href="javascript:void(0)">FORTRYD</a></div>
                    <div class="Button30x100 But-Tick-30x100"><a onclick="saveCategoryAct();"
                                                                 href="javascript:void(0)">FÆRDIG</a>
                    </div>
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

        <div id="ActivityEditorCatAct" class="popover top">
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

        <div class="click_popOver popover bottom" id="closebox1">

            <p>Man kan ikke planlægge aktiviteter tilbage i tiden.</p>
            <div class="popOver_btn">
                <button class="prevBtn" onclick="hidecloseblock()">OK</button>

            </div>


        </div>
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
            $('.ALFtButtonCat').popover({
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

            $('.ALFtButtonAct').popover({
                content: $('#ActivityEditorCatAct').html(),
                html: true,
                placement: 'top',
                trigger: 'click'
            });


            function hidecloseblock() {

                hidePopovers();

            }

        </script>
