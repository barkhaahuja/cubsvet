<h4>User Risk and warnings</h4>


<div class="row">

    <div class="col-sm-6">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Risk</th>
            </tr>
            <?php foreach (($risk_list?:array()) as $a): ?>
                <tr>
                    <td><?php echo $a['risk']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

  <div class="col-sm-6">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Warnings</th>
            </tr>
            <?php foreach (($warning_list?:array()) as $w): ?>
                <tr>
                    <td><?php echo $w['warning']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>



