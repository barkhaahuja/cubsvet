<div class="list-group">
    <a href="<?php echo $ROOT; ?>/user" class="list-group-item <?php echo $PATTERN == '/user' ? 'active' : ''; ?>">Home</a>
    <a href="<?php echo $ROOT; ?>/user/profile" class="list-group-item <?php echo $PATTERN == '/user/profile' ? 'active' : ''; ?>">My
        Profile</a>
    <?php if ($SESSION['group_id'] == 5): ?>
        <a href="<?php echo $ROOT; ?>/user/provideradmin" class="list-group-item <?php echo $PATTERN == '/user/provideradmin' ? 'active' : ''; ?>">Provider Admins</a>
    <?php endif; ?>
    <?php if ($SESSION['group_id'] > 3): ?>
        <a href="<?php echo $ROOT; ?>/user/clinicians" class="list-group-item <?php echo $PATTERN == '/user/clinicians' ? 'active' : ''; ?>">Clinicians</a>
    <?php endif; ?>
    
    <a href="<?php echo $ROOT; ?>/user/users"
       class="list-group-item <?php echo ( $PATTERN == '/user/users' or $PATTERN == '/user/create' )  ? 'active' : ''; ?>">Users</a>
        <a href="<?php echo $ROOT; ?>/user/dischargedusers"
       class="list-group-item <?php echo ( $PATTERN == '/user/dischargedusers' )  ? 'active' : ''; ?>">Discharged Users</a>
      
<!--    <?php if (!(isset($isadmin) && ($isadmin == 1))): ?>
        <a href="<?php echo $ROOT; ?>/user/users"
       class="list-group-item <?php echo ( $PATTERN == '/user/users' or $PATTERN == '/user/create' )  ? 'active' : ''; ?>">Users</a>
        <a href="<?php echo $ROOT; ?>/user/dischargedusers"
       class="list-group-item <?php echo ( $PATTERN == '/user/dischargedusers' )  ? 'active' : ''; ?>">Discharged Users</a>
      
    <?php endif; ?>
    -->
      <a href="<?php echo $ROOT; ?>/user/invalidpatientlogins" class="list-group-item <?php echo $PATTERN == '/user/invalidpatientlogins' ? 'active' : ''; ?>">Invalid Logins</a>
    
</div>

