<!--
<h2>Users
    <?php if ($logged_user->isDoctorGroup()): ?>
        <a href="<?php echo $BASE.'/user/create'; ?>" class="btn btn-primary btn-md pull-right"><i
                class="glyphicon glyphicon-plus"></i> Add</a>
    <?php endif; ?>
</h2>
-->
<h2>Discharged Users</h2>

<?php if (isset($unblocked) && $unblocked == '1'): ?>

        <!-- code for displaying unblock message -->

            <center><div style=" text-align:left" class="alert alert-info"><b>User unblocked successfully.</b> </div></center>

        <!-- end  -->

<?php endif; ?>

<table class="table table-striped table-hover table-bordered" id="data">
    <thead>
        <tr>
             <?php if (($SESSION['group_id'] == 4) || ($SESSION['group_id'] == 5)): ?>
                <th>ID</th>
                <?php else: ?>
                     <th>First Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Group</th>
                    <th>Current Step</th>
                    <th>Last Login(CET)</th>
                    <th>Discharged On(CET)</th>
                
            <?php endif; ?>
 
            <?php if ($logged_user->isDoctorGroup() || $logged_user->isAdminGroup()): ?>
                <th>Actions</th>
            <?php endif; ?>
</tr>
</thead>
<tbody>
<?php foreach (($users?:array()) as $user): ?>
    <tr>
        
         <?php if (($SESSION['group_id'] == 4) || ($SESSION['group_id'] == 5)): ?>
             <td style="width:90%"><?php echo trim($user['id']); ?></td>
             <?php else: ?>
                 <td><?php echo trim($user['name']); ?></td>
                <td><?php echo trim($user['last_name']); ?></td>
                <td><a href="<?php echo $BASE.'/user/update/'. $user['id']; ?>"><?php echo trim($user['email']); ?></a></td>
                <td><?php echo trim($user->getGroupName()); ?></td>
                <td>Step <?php echo trim($user->treatment_step); ?></td>
                <td><?php echo trim($user['access_date']); ?></td>
                <td><?php echo trim($user['discharge_date']); ?></td>
             
        <?php endif; ?>
    
       
    <?php if ($logged_user->isDoctorGroup() || $logged_user->isAdminGroup()): ?>
        <td style="white-space: nowrap;">
            
        <?php if (($SESSION['group_id'] == 4) || ($SESSION['group_id'] == 5)): ?>
                <?php if ($user->is_blocked): ?>
                    <a href="<?php echo $BASE.'/user/unblock/'. $user['id']; ?>" style="margin-top:10px" onclick="return confirm('Er du sikker på, du vil fjerne blokeringen denne bruger?')" class="btn btn-primary btn-xs">
                        <i class="glyphicon glyphicon-ok icon-white"></i> Unblock 
                    </a>
                <?php endif; ?>
        
                <a href="<?php echo $BASE.'/user/download/'. $user['id']; ?>" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-export icon-white"></i> Export 
                </a>
            <?php else: ?>
                     <a href="<?php echo $BASE.'/user/update/'. $user['id']; ?>" class="btn btn-primary btn-xs">
                        <i class="glyphicon glyphicon-edit"></i> View
                    </a>


                     <!-- fix for unblock button -->
                     <?php if ($user->is_blocked): ?>
                        <a href="<?php echo $BASE.'/user/unblock/'. $user['id']; ?>" style="margin-top:10px" onclick="return confirm('Er du sikker på, du vil fjerne blokeringen denne bruger?')" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-ok icon-white"></i> Unblock 
                        </a>
                    <?php endif; ?>

                        <a href="<?php echo $BASE.'/user/download/'. $user['id']; ?>" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-export icon-white"></i> Export 
                        </a>
                    <!-- fix for unblock button end -->

                    <!--
                    &nbsp;
                <?php if ($user['disable_lite_questionnaires']): ?>
                    <a href="<?php echo $BASE.'/user/finish/'. $user['id']; ?>" class="btn btn-primary btn-xs">
                        <i class="glyphicon glyphicon-remove icon-white"></i>Discharged
                    </a>
                    <?php else: ?>
                        <a href="<?php echo $BASE.'/user/finish/'. $user['id']; ?>" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-remove icon-white"></i>Discharge
                        </a>
                    
                <?php endif; ?>
                    &nbsp;
                    <a href="<?php echo $BASE.'/user/delete/'. $user['id']; ?>" onclick="return confirm('Er du sikker på, at du vil slette brugeren?')" class="btn btn-danger btn-xs">
                        <i class="glyphicon glyphicon-remove icon-white"></i>Delete
                    </a>
                    -->
                </td>
            
        <?php endif; ?>
           
    <?php endif; ?>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
