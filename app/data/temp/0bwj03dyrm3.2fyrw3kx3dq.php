<h4>NAT Registrering</h4>


<div class="row">

    <div class="col-sm-6">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>negative tanker</th>
            </tr>
            <?php foreach (($nat_list?:array()) as $a): ?>
                <tr>
                    <td><?php echo $a['negative_thoughts']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="col-sm-6">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Muligt svar</th>
            </tr>
            <?php foreach (($nat_list?:array()) as $a): ?>
                <tr>
                    <td><?php echo $a['possible_response']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</div>



