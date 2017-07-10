<h4>Negative Circle</h4>
<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>Section</th>
        <th>Value</th>
        <th>Date</th>
    </tr>
    <?php foreach (($ncs?:array()) as $nc): ?>
        <tr>
            <td>
                <?php switch ($nc['step']): ?><?php case 0: ?>
                        Situation
                    <?php if (true) break; ?><?php case 1: ?>
                        Negative tanker
                    <?php if (true) break; ?><?php case 2: ?>
                        Følelser og kropslige reaktioner
                    <?php if (true) break; ?><?php case 3: ?>
                        Adfærd
                    <?php if (true) break; ?><?php endswitch; ?>
            </td>
            <td><?php echo $nc['text']; ?></td>
            <td><?php echo $nc['date_modified']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h4>Positive Experience</h4>
<table class="table table-striped table-hover table-bordered">
    <tr>
        <th style="width: 80%">Notes</th>
        <th>Date</th>
    </tr>
    <?php foreach (($notes?:array()) as $note): ?>
        <tr>
            <td><?php echo $note['note']; ?></td>
            <td><?php echo $note['create_date']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php echo $this->render('user/__problemgoal_data.htm',$this->mime,get_defined_vars()); ?>
