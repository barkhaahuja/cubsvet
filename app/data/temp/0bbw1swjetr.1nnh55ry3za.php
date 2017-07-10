<!--left navigation starts-->

<div id="Dash-left-NavBox">
    <ul>
        <?php if (isset($showAdminButton) && $showAdminButton): ?>
        <li>
            <a href="<?php echo $ROOT; ?>/section/settings.profile" class="Dash-Profile noBoarder <?php echo $PARAMS['id'] == 'settings.profile' ? 'active' : ''; ?>">Profil</a></li>
         <li><a href="<?php echo $ROOT.'/section/settings.notification'; ?>" class="Dash-Notification <?php echo $PARAMS['id'] == 'settings.notification' ? 'active' : ''; ?>">Påmindelser</a></li>
            <?php else: ?>
                <li><a href="<?php echo $ROOT.'/section/settings.profile'; ?>" class="Dash-Profile noBoarder <?php echo $PARAMS['id'] == 'settings.profile' ? 'active' : ''; ?>">Profil</a></li>
                <li><a href="<?php echo $ROOT.'/section/settings.notification'; ?>" class="Dash-Notification <?php echo $PARAMS['id'] == 'settings.notification' ? 'active' : ''; ?>">Påmindelser</a></li>
                <li><a href="<?php echo ($is_first_login) ? $ROOT.'/' : $ROOT.'/section/settings.help'; ?>" class="Dash-Help <?php echo $PARAMS['id'] == 'settings.help' ? 'active' : ''; ?>">Hjælp</a></li>
                <li><a href="<?php echo ($is_first_login) ? $ROOT.'/' : $ROOT.'/section/settings.information'; ?>" class="Dash-Info <?php echo $PARAMS['id'] == 'settings.information' ? 'active' : ''; ?>">Information</a></li>
            
        <?php endif; ?>
    </ul>
</div>
<!--left navigation ends-->
<!--<div id="Dash-left-NavBox">
    <ul>
        <?php if (isset($showAdminButton) && $showAdminButton): ?>
        <li><a href="<?php echo $ROOT; ?>/section/settings.profile" class="Dash-Profile noBoarder <?php echo $PARAMS['id'] == 'settings.profile' ? 'active' : ''; ?>">Profil</a></li>
            <?php else: ?>
                <li><a href="<?php echo $ROOT.'/section/settings.profile'; ?>" class="Dash-Profile noBoarder <?php echo $PARAMS['id'] == 'settings.profile' ? 'active' : ''; ?>">Profil</a></li>
                <li><a href="<?php echo $ROOT.'/section/settings.notification'; ?>" class="Dash-Notification <?php echo $PARAMS['id'] == 'settings.notification' ? 'active' : ''; ?>">Påmindelser</a></li>
                <li><a href="<?php echo ($is_first_login) ? $ROOT.'/' : $ROOT.'/section/settings.help'; ?>" class="Dash-Help <?php echo $PARAMS['id'] == 'settings.help' ? 'active' : ''; ?>">Hjælp</a></li>
                <li><a href="<?php echo ($is_first_login) ? $ROOT.'/' : $ROOT.'/section/settings.information'; ?>" class="Dash-Info <?php echo $PARAMS['id'] == 'settings.information' ? 'active' : ''; ?>">Information</a></li>
            
        <?php endif; ?>
    </ul>
</div>-->