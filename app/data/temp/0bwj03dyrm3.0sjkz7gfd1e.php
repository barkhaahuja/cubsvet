<h4>Aktivitetsliste</h4>


<div class="row">

    <div class="col-sm-6">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Tilfredsstillende aktiviteter</th>
            </tr>
            <?php foreach (($all?:array()) as $a): ?>
                <tr>
                    <td><?php echo $a['activity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="col-sm-6">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Krævende aktiviteter</th>
            </tr>
            <?php foreach (($alr?:array()) as $a): ?>
                <tr>
                    <td><?php echo $a['activity']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>



