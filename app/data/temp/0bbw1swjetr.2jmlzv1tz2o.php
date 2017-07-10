<h4>Problem Goal List</h4>

<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>Title</th>
        <th>Problem</th>
        <th>Situation</th>
        <th>Goal</th>
    </tr>
    <?php foreach (($pgs?:array()) as $pg): ?>
        <tr>
            <td><?php echo $pg['title']; ?></td>
            <td><?php echo $pg['problem']; ?></td>
            <td><?php echo $pg['situation']; ?></td>
            <td><?php echo $pg['goal']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
