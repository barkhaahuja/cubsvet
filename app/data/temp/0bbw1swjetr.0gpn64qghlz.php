<h4>Lite Questionnaire</h4>

<?php foreach (($liteIdsresponses?:array()) as $row): ?>
    <div class="row">
        <div class="col-sm-4">
            <div class="radio">
                <label>Date Started: </label><?php echo empty($row['started_on'])? "Lite Questionnaire not started": $row['started_on']; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="radio">
                <label>Date Ended: </label> <?php echo empty($row['ended_on'])? "Lite Questionnaire not ended": $row['ended_on']; ?>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="radio">
                <label>Created by: </label><?php echo $doctor; ?>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th style="width:150px">Question</th>
            <th>Answer</th>
            <th>Answer Chosen</th>
            <th>Answer value</th>
            <th>Answered On <br/> <span style="font-style: italic; font-weight: bold; font-size: 10px">(yyyy-mm-dd hh:mm:ss)</span></th>
        </tr>
    
        <?php foreach (($literesponses?:array()) as $response): ?>
            
                <?php if ($response['id'] == $row['id']): ?>
                    <tr>
                        <td><?php echo empty($response['rquestion']) ? '' : $response['rquestion']; ?> <br/> <span style="font-style: italic;font-size: 12px"><?php echo empty($response['rsubquestion']) ? '' : $response['rsubquestion']; ?></span></td>  
                        <td><?php echo $response['roption']; ?></td>  
                        <td><?php echo $response['optionvalue']; ?></td>  
                        <td><?php echo $response['remarks']; ?></td>  
                        <td style="white-space: nowrap"><?php echo empty($response['rdate']) ? '' : $response['rdate']; ?></td>  
                    </tr>
                <?php endif; ?>
        <?php endforeach; ?>

    </table>
    <br/>
    <br/>
    

<?php endforeach; ?>