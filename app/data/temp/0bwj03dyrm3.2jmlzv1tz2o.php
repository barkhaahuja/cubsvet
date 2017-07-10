<h4>Problem- og målliste</h4>

<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>Titel</th>
        <th>Problem</th>
        <th>Situation</th>
        <th>Mål</th>
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
