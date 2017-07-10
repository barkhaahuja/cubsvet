<div class="WidgetWidth200 shadow RadCornAll">
    <div class="WidgetHeaderBar">Ugeoversigt<a class="WP-help" href="javascript:void(0);"></a></div>
    <div class="ContentWidget">
        <!-- STEP - 1 -->
        <?php if ($current_step == 1 || $current_step == 0 || $current_step == ''): ?>
            <div id="WeekProgressWidgetCol">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
        
        <!-- STEP - 2 -->
        <?php if ($current_step == 2): ?>
            <div id="WeekProgressWidget_2">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
        
        <!-- STEP - 3 -->
        <?php if ($current_step == 3): ?>
            <div id="WeekProgressWidget_3">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
        
        <!-- STEP - 4 -->
        <?php if ($current_step == 4): ?>
            <div id="WeekProgressWidget_4">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
        
        <!-- STEP - 5 -->
        <?php if ($current_step == 5): ?>
            <div id="WeekProgressWidget_5">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
        
        <!-- STEP - A -->
        <?php if ($current_step == 6): ?>
            <div id="WeekProgressWidget_6">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
        
        <!-- STEP - B -->
        <?php if ($current_step == 7): ?>
            <div id="WeekProgressWidget_7">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
        
        <!-- STEP - 6 -->
        <?php if ($current_step == 8): ?>
            <div id="WeekProgressWidget_8">
                <div class="Day<?php echo $days; ?>">
                    <div id="WeekProgressWidgetBase">
                        <div class="WeekProgWeekText">uge</div>
                        <div class="WeekProgNumb"><?php echo $weeks; ?></div>
                    </div>
                </div>
            </div>            
        <?php endif; ?>
            
        <br/>
        <br/>
    </div>

    <div id="WP-HelpContent" class="popover bottom">
        <div class="title">Uge-tæller</div>
        <p>Dette redskab tæller de ti uger, som
            denne behandling varer.
            Inde i midten står der hvilken uge du
            er i, i din behandling. Ringen uden
            om viser hvor mange dage der er
            gået i den pågældende uge. En hel
            omgang er altså syv dage.
        </p>
    </div>

</div>


<script>

    $(document).ready(function (){
        // modal help
        $('.WP-help').popover({
            content: $('#WP-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
    });

</script>
