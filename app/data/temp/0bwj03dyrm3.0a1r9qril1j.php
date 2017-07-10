<!--<form action="#">
    <fieldset>
        <input type="text" name="search" value="" id="id_search" placeholder="Search" autofocus />
    </fieldset>
</form>-->
<h2>Provider Admins
    
    <?php if ($logged_user->isAdminGroup()): ?>
        <a href="<?php echo $BASE.'/user/create'; ?>" class="btn btn-primary btn-md pull-right"><i
                class="glyphicon glyphicon-plus"></i> Add</a>
    <?php endif; ?>
</h2>

<?php if (isset($unblocked) && $unblocked == '1'): ?>

        <!-- code for displaying unblock message -->

            <center><div style=" text-align:left" class="alert alert-info"><b>User unblocked successfully.</b> </div></center>

        <!-- end  -->

<?php endif; ?>

<table class="table table-striped table-hover table-bordered" id="data">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone</th>
    <?php if ($logged_user->isAdminGroup()): ?>
        <th>Actions</th>
    <?php endif; ?>
</tr>
</thead>
<tbody>
<?php foreach (($users?:array()) as $user): ?>
    <tr>
        <td><?php echo trim($user['name']); ?></td>
        <td><?php echo trim($user['last_name']); ?></td>
        <td><a href="<?php echo $BASE.'/user/update/'. $user['id']; ?>"><?php echo trim($user['email']); ?></a></td>
        <td><?php echo trim($user['phone']); ?></td>
    <?php if ($logged_user->isAdminGroup()): ?>
        <td>
            <a href="<?php echo $BASE.'/user/update/'. $user['id']; ?>" class="btn btn-primary btn-xs">
                <i class="glyphicon glyphicon-edit"></i> Edit
            </a>
            &nbsp;
            
            <!-- fix for unblock button -->
            <?php if ($user->is_blocked): ?>
                <a href="<?php echo $BASE.'/user/unblock/'. $user['id']; ?>" onclick="return confirm('Er du sikker på, du vil fjerne blokeringen denne bruger?')" class="btn btn-primary btn-xs">
                    <i class="glyphicon glyphicon-ok icon-white"></i> Unblock 
                </a>
            <?php endif; ?>
            <!-- fix for unblock button end -->
          
            <a href="<?php echo $BASE.'/user/delete/'. $user['id']; ?>"  onclick="return confirm('Er du sikker på, at du vil slette brugeren?')" class="btn btn-danger btn-xs">
                <i class="glyphicon glyphicon-remove icon-white"></i>Delete
            </a>
        </td>
    <?php endif; ?>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
