<h2>Home</h2>
<p><?php echo $logged_user['name']; ?></p>
<p><?php echo $logged_user['last_name']; ?></p>
<p>Email Address : <?php echo $logged_user['email']; ?></p>
<p>Role : <?php echo $logged_user->getGroupName(); ?></p>
