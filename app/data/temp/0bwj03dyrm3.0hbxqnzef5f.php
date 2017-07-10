
<h2>Invalid Logins</h2>


<table class="table table-striped table-hover table-bordered" id="data">
    <thead> 
        <tr>
            <th>First Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Login Attempt Date and Time (CET)</th>
        </tr>
    </thead>
    
<tbody>
    <?php foreach (($users?:array()) as $user): ?>
        <tr>
            <td><?php echo trim($user['name']); ?></td>
            <td><?php echo trim($user['last_name']); ?></td>
            <td><a href="<?php echo $BASE.'/user/update/'. $user['id']; ?>"><?php echo trim($user['email']); ?></a></td>
            <td><?php echo $user['phone']; ?></td>
            <td><?php echo $user['logindatetime']; ?></td>

        </tr>
    <?php endforeach; ?>
</tbody>
</table>
