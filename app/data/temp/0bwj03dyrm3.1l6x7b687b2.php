

<!-- new table -->

<h4>Depressive grublerier</h4>

<?php foreach (($deprstask_list?:array()) as $a): ?>
<div class="row">

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="radio">
                    <label>Depressive grublerier </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="radio">
                    <label>Oprettet den: </label><?php echo $a['created_at']; ?>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="radio">
                    <label>Lavet af: </label><?php echo $doctor; ?>
                </div>
            </div>
        </div>
       
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th style="width:350px">Spørgsmål</th>
            <th>Svar</th>
        </tr>
        <tr>
            <td>
               Situation hvor du grublede
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    
                </span>
            </td>
            <td><?php echo $a['m1']; ?></td>
        </tr>
        <tr>
            <td>
                Hvad udløste grublerierne?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                   Hvad var det, der udløste dine grublerier?
                </span>
            </td>
            <td><?php echo $a['l1']; ?></td>
        </tr>
        <tr>
            <td>
                Indledende negative tanker
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvilken negativ tanke havde du indledningsvis?
                </span>
            </td>
            <td><?php echo $a['m2l']; ?></td>
            
        </tr>
        <tr>
            <td>
                Efterfølgende tanker
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvilken negativ tanke havde du efterfølgende?
                </span>
            </td>
            <td><?php echo $a['m2r']; ?></td>
        </tr>
        
        <tr>
            <td>
                Følelser mens du grublede
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvad skete der med dine følelser undervejs? Beskriv dine følelser og kropslige reaktioner i situationen. Det kan være følelser, som tristhed, vrede og nervøsitet.
                </span>
            </td>
            <td><?php echo $a['m3']; ?></td>
        </tr>
        
        <tr>
            <td>
                Handlinger
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvordan påvirkede grublerierne dine handlinger i situationen?
                </span>
            </td>
            <td><?php echo $a['m4']; ?></td>
        </tr>
        
        <tr>
            <td>
                Fordele ved at gruble
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Var der nogle fordele ved at gruble i den situation?
                </span>
            </td>
            <td><?php echo $a['m5l']; ?></td>
        </tr>
        
         <tr>
            <td>
                Ulemper ved at gruble
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Var der nogle ulemper ved at gruble i den situation?
                </span>
            </td>
            <td><?php echo $a['m5r']; ?></td>
        </tr>
        
        <tr>
            <td>
                Hvordan sluttede grublerierne?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvordan sluttede grublerierne?
                </span>
            </td>
            <td><?php echo $a['m6']; ?></td>
        </tr>
        
        <tr>
            <td>
                Kunne du have gjort noget for at afslutte grublerierne tidligere?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                   
                </span>
            </td>
            <td>
                <?php if (!empty($a['m8'])): ?>


                    <?php if ($a['m7'] == 1): ?>
                        JA
                    <?php endif; ?>
                    <?php if ($a['m7'] == 2): ?>
                        NEJ
                    <?php endif; ?>

                <?php endif; ?>
            </td>
        </tr>
        
        <tr>
            <td>
                Hvad kunne du have gjort?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Havd kunne du have gjort?
                </span>
            </td>
            <td><?php echo $a['m8']; ?></td>
        </tr>
        <tr>
            <td>
                Afledende Aktiviteter
                <br/><br/>
                Aftale
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Du har nu lavet en aftale med dig selv om, hvornår du vil afprøve din udfordring. Du skal nu forlade trinnet og vil blive spurgt om du har afprøvet din udfordring, når det pågældene tidspunkt er passeret. Du kan ændre din aftale fra din aktivitetskalender på arbejdsbordet.
                </span>
            </td>
            <td>
                <?php if (!empty($a['m9'])): ?>
                    Planlagt fra <?php echo $a['m9_event_start']; ?> - <?php echo $a['m9_event_end']; ?>
                <?php endif; ?>
        <br/><br/><br/><br/>
        
        <?php if (!empty($a['m9'])): ?>
                
                <?php if (($a['m9_status']==1)): ?>JA<?php endif; ?>
                <?php if (($a['m9_status']==2)): ?>NEJ<?php endif; ?>
            <?php endif; ?>
            </td>
        </tr>
        
        <tr>
            <td>
                Afledende Aktiviteter
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                Hvordan virkede øvelsen for dig? Beskriv kort.    
                </span>
            </td>
            <td><?php echo $a['m9']; ?></td>
        </tr>
        <tr>
            <td>
                Problemløsning
                <br/><br/>
                Aftale
                <br/><br/>
                Har du udført udfordringen?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                
                </span>
            </td>
              <td>
                <?php if (!empty($a['m10'])): ?>
                  Planlagt fra <?php echo $a['m10_event_start']; ?> - <?php echo $a['m10_event_end']; ?>
                <?php endif; ?>
        <br/><br/><br/><br/>
        <?php if (!empty($a['m10'])): ?>
                 <?php if (($a['m10_status']==1)): ?>JA<?php endif; ?>
                 <?php if (($a['m10_status']==2)): ?>NEJ<?php endif; ?>
        <?php endif; ?>
        </td>
        </tr>
          <tr>
            <td>
                Problemløsning
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                Hvordan virkede øvelsen for dig? Beskriv kort.    
                </span>
            </td>
            <td><?php echo $a['m10']; ?></td>
        </tr>
        
         <tr>
            <td>
                Grubletid
                <br/><br/>
                Aftale
                <br/><br/>
                Har du udført udfordringen?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                
                </span>
            </td>
             <td>
                 <?php if (!empty($a['m11'])): ?>
                    Planlagt fra <?php echo $a['m11_event_start']; ?> - <?php echo $a['m11_event_end']; ?>
                 <?php endif; ?>
             <br/><br/><br/><br/>
             <?php if (!empty($a['m11'])): ?>
                <?php if (($a['m11_status']==1)): ?>JA<?php endif; ?>
                <?php if (($a['m11_status']==2)): ?>NEJ<?php endif; ?> 
             <?php endif; ?>
             </td>
        </tr>
         <tr>
            <td>
                Grubletid
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                Hvordan virkede øvelsen for dig? Beskriv kort.    
                </span>
            </td>
            <td><?php echo $a['m11']; ?></td>
        </tr>
        
        
        <!-- above only -->
        
        
    </table>
    
    
    </div>

</div>


<?php endforeach; ?>

<br/><br/>
<!-- diversionary activity -->
<h4>afledende activititet</h4>


<div class="row">

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="radio">
                    <label>Dine afledende aktiviteter </label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="radio">
                  
                </div>
            </div>

            <div class="col-sm-4">
                <div class="radio">
                    <label>Lavet af: </label><?php echo $doctor; ?>
                </div>
            </div>
        </div>
       
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th style="width:350px">Aktivitet</th>
            <th>skabt på</th>
        </tr>
        <?php foreach (($deprstask_lst_1?:array()) as $a): ?>
        <tr>
            <td>
              <?php echo $a['div_activity']; ?>
            </td>
            <td><?php echo $a['created_date']; ?></td>
        </tr>
       <?php endforeach; ?>
        
        
        <!-- above only -->
        
        
    </table>
    
    
    </div>

</div>















