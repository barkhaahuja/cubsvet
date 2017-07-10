
<h2>Clinician Activity Logs </h2>

<h5>Clinician Username : <?php echo $name; ?></h5>

<table class="table table-striped table-hover table-bordered" id="data">
    <thead> 
        <tr>
			<th  style=" white-space: nowrap;">Performed On (CET)</th>
            <th  style=" white-space: nowrap;">Activity Performed</th>
            
            
          
        </tr>
    </thead>
    
<tbody>
    <?php foreach (($users?:array()) as $user): ?>
        <tr>
		    <td style=" white-space: nowrap;"><?php echo $user['createdon']; ?></td>
            <td style=" white-space: nowrap;"><?php echo trim($user['activity_text']); ?></td>
          
           
        </tr>
    <?php endforeach; ?>
</tbody>
</table>

