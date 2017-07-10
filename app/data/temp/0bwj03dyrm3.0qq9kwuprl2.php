<h4>Den negative cirkel</h4>

<?php foreach (($nat_neg_list_count?:array()) as $row): ?>
<div class="row">

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="radio">
                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="radio">
                    
                </div>
            </div>

            <div class="col-sm-4">
                <div class="radio">
<!--                    <label>Lavet af: </label><?php echo $doctor; ?>-->
                </div>
            </div>
        </div>
       
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th style="width:350px">Spørgsmål</th>
            <th>Svar</th>
            <th>Slider Value</th>
            <th>Besvaret On <br/> <span style="font-style: italic; font-weight: bold; font-size: 10px">(yyyy-mm-dd hh:mm:ss)</span></th>
        </tr>
    
        <?php foreach (($nat_neg_list?:array()) as $a): ?>
            <?php if ($a['negtht_id'] == $row['negtht_id']): ?>
                <tr>
                    <?php if ($a['step'] == 0): ?>
                         <td>
                             Situation
                             <br/>
                             <br/>
                             <span style="font-style: italic;font-size: 12px"> I hvilken situation havde du disse tanker? Beskriv situationen kort.
                            <br/><br/>
                            Klik i tekstfeltet for at begynde at skrive.
                            </span>
                         </td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 1): ?>
                         <td>
                             Negative tanker
                             <br/>
                             <br/>
                              <span style="font-style: italic;font-size: 12px">Vis i procent på en skala fra 0-100%, hvor meget du troede på tankerne, da de fór gennem hovedet på dig. Hvis du vil angive 0% kan du bare klikke NÆSTE.
                              </span>
                         </td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 2): ?>
                        <td>
                             Følelser og kropslige reaktioner
                             <br/>
                             <br/>
                              <span style="font-style: italic;font-size: 12px">Beskriv dine følelser og kropslige reaktioner i cirklen. Det kan være følelser som tristhed, vrede og nervøsitet.
                            <br/><br/>
                            Vis følelsernes styrke på en skala fra 0-100%.
                              </span>
                         </td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 3): ?>
                         <td>
                             Adfærd
                             <br/>
                             <br/>
                              <span style="font-style: italic;font-size: 12px">Hvad gjorde du i situationen? Beskriv det kort.
                            <br/><br/>
                            Klik i tekstfeltet for at begynde at skrive.
                              </span>
                         </td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 4): ?>
                         <td>
                             Alternative tanker
                             <br/>
                             <br/>
                              <span style="font-style: italic;font-size: 12px">Prøv at finde alternative tanker til dine negative tanker.
                             <br/><br/>
                             Klik på det store spørgsmålstegn i cirklen og brug de spørgsmål der bliver vist, til at bekæmpe dine negative tanker.
                              </span>
                          </td>
                    <?php endif; ?>
                   
                
                    <td><?php echo $a['text']; ?></td>
                
                   <?php if ($a['step'] == 0): ?>
                       <td> <span style="font-style: italic;font-size: 12px">-NA-</span></td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 1): ?>
                        <td><?php echo $a['slider_val']; ?></td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 2): ?>
                        <td><?php echo $a['slider_val']; ?></td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 3): ?>
                        <td> <span style="font-style: italic;font-size: 12px">-NA-</span></td>
                    <?php endif; ?>
                    <?php if ($a['step'] == 4): ?>
                         <td><?php echo $a['slider_val']; ?></td>
                    <?php endif; ?>
                   
                    <td><?php echo $a['create_date']; ?></td>
                </tr>
                <?php endif; ?>
        <?php endforeach; ?>

    </table>
    
    
    </div>

</div>


<?php endforeach; ?>