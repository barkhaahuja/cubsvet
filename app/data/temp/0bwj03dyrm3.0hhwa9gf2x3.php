<!--<link href="<?php echo $ROOT; ?>/3rdparty/jquery-toggles/toggles.css" rel="stylesheet">-->
<link href="<?php echo $ROOT; ?>/3rdparty/jquery-toggles/themes/toggles-light.css" rel="stylesheet">

<style>

    table {
        border-spacing: 10px;
    }

    table td {
        vertical-align: top;
    }


</style>


<div id="DashboardContainer">

    <div class="Dash-book-title"><?php echo $section_title; ?></div>

    <?php echo $this->render('dashboard/__menu.section.settings.htm',$this->mime,get_defined_vars()); ?>

    <!--right section starts-->
    <div id="Dash-right-MainBox">
        <div style="padding: 30px;overflow-y: scroll;height: 380px;width: 540px">

            <div>Påmindelser</div>

            <div style="font-size: 12px;margin-top: 20px;">

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>Giv mig besked pr. mail når jeg modtager en ny meddelelse.</td>
                        <td>OFF</td>
                        <td>
                            <div class="toggle-light email <?php echo $user['mail_notification'] ? 'on' : ''; ?>" ></div>
                        </td>
                        <td>ON</td>
                    </tr>
                    <tr>
                        <td>Giv mig besked pr. SMS når jeg modtager en ny meddelelse.</td>
                    <?php if ($isPhoneNo == 1): ?>
                        <td>OFF</td>
                        <td>
                           <div class="toggle-light sms <?php echo $user['sms_notification'] ? 'on' : ''; ?>"></div>
                        </td>
                        <td>ON</td>
                        <?php else: ?>
                            <td colspan="3">
                                - No Phone no. Provided -
                            </td>
                        
                    <?php endif; ?>
                    </tr>
                </table>

            </div>

        </div>
    </div>
    <!--right section ends-->

</div>


<script src="<?php echo $ROOT; ?>/3rdparty/jquery-toggles/toggles.min.js"></script>
<script>

    $('.toggle-light').each(function() {
        $(this).toggles({
            drag: true, // can the toggle be dragged
            click: true, // can it be clicked to toggle
            text: {
                on: '', // text for the ON position
                off: '' // and off
            },
            on: $(this).hasClass('on'), // is the toggle ON on init
            animate: 250, // animation time
            transition: 'ease-in-out', // animation transition,
            checkbox: null, // the checkbox to toggle (for use in forms)
            clicker: null, // element that can be clicked on to toggle. removes binding from the toggle itself (use nesting)
            width: 50, // width used if not set in css
            height: 20, // height if not set in css
            type: 'compact' // if this is set to 'select' then the select style toggle will be used
        });
    });

    $('.email').on('toggle', function (e, active) {
        if (active) {
            update_notification('mail_notification',1);
        } else {
            update_notification('mail_notification',0);
        }
    });

    $('.sms').on('toggle', function (e, active) {
        if (active) {
            update_notification('sms_notification',1);
        } else {
            update_notification('sms_notification',0);
        }
    });

    function update_notification( field , value )
    {
        var data = {} ;
        data["id"] = "<?php echo $user['id']; ?>" ;
        data[field] = value ;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo $ROOT; ?>/user/update_ajax",
            data: data
        });
    }

</script>
