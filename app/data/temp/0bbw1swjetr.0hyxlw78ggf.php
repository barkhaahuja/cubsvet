
<!-- new table -->

<h4>Leveregler tasks</h4>

<?php foreach (($livglr_list?:array()) as $a): ?>
<div class="row">

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="radio">
                    <label>Unyttig leveregel: </label><?php echo $a['m1']; ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="radio">
                    <label>Created on: </label><?php echo $a['created_at']; ?>
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
            <th style="width:350px">Question</th>
            <th>Answer</th>
        </tr>
        <tr>
            <td>
                Baggrund for leveregel
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvor kommer den fra? Er der nogle faktorer i dit liv, der har bidraget til udviklingen af din unyttige leveregel? Hvis ja, hvilke?
                </span>
            </td>
            <td><?php echo $a['m2']; ?></td>
        </tr>
        <tr>
            <td>
                Fordele
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvilke fordele er der ved at du har denne leveregel?
                </span>
            </td>
            <td><?php echo $a['l1']; ?></td>
        </tr>
        <tr>
            <td>
                Ulemper
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvilke ulemper er der ved at du har denne leveregel?
                </span>
            </td>
            <td><?php echo $a['r1']; ?></td>
            
        </tr>
        <tr>
            <td>
                Situationer hvor den viser sig
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    I hvilke konkrete situationer viser levereglen sig? Hvordan påvirker den din adfærd? Tænk på tre situationer, hvor den har vist sig.
                </span>
            </td>
            <td><?php echo $a['m3']; ?></td>
        </tr>
        <tr>
            <td>
                Er det muligt at omformulere den unyttige leveregel, så den bliver mere nuanceret og fleksibel ?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                   Er det muligt at omfor- mulere den unyttige leveregel, så den bliver mere nuanceret og fleksibel ?
                </span>
            </td>
            <td>
                
              <?php if (!empty($a['m5'])): ?>
                    <?php if ($a['m4'] == 1): ?>
                        JA
                        <?php else: ?>
                        NEJ
                        
                    <?php endif; ?>
              <?php endif; ?> 
            </td>
        </tr>
        <tr>
            <td>
                Mere nyttig leveregel
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                Hvordan kan en ny mere hensigtsmæssig og samtidig realistisk leveregel lyde?
                </span>
            </td>
            <td>
               <?php echo $a['m5']; ?>
        
            </td>
        </tr>
        
        <tr>
            <td>
                Udfordring
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
               
                </span>
            </td>
            <td>
               <?php echo $a['m6']; ?>
        
            </td>
        </tr>
        <tr>
            <td>
                Fordele
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                
                </span>
            </td>
            <td>
               <?php echo $a['l2']; ?>
        
            </td>
        </tr>
        <tr>
            <td>
                Ulemper
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
               
                </span>
            </td>
            <td>
               <?php echo $a['r2']; ?>
        
            </td>
        </tr>
        <tr>
            <td>
                Aftale
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                Du har nu lavet en aftale med dig selv om, hvornår du vil afprøve din udfordring. Du skal nu forlade trinnet og vil blive spurgt om du har afprøvet din udfordring, når det pågældene tidspunkt er passeret. Du kan ændre din aftale fra din aktivitetskalender på arbejdsbordet.
                </span>
            </td>
            
               <td>
                    <?php if (!empty($a['date_start'] )): ?>
                    Challenge starts at : <?php echo $a['date_start']; ?>
                    <?php endif; ?>
                    <?php if (!empty($a['date_end'] )): ?>
                        , ends at : <?php echo $a['date_end']; ?>
                    <?php endif; ?>
               </td>
        
            
        </tr>
        <tr>
            <td>
                Velkommen tilbage! Har du gennemført øvelsen?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
               
                </span>
            </td>
           
               <td>
                   
            <?php if (!empty($a['m8'])): ?>
            
        
                   <?php if ($a['status'] == 1): ?>
                    JA
                    <?php else: ?>
                    NEJ
                    
                    <?php endif; ?>
            <?php endif; ?>
           
            </td>
        </tr>
        
        <tr>
            <td>
                Hvad skete der?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
               Hvad skete der? Hvad gjorde du? Beskriv kort.
                </span>
            </td>
            
              <td><?php echo $a['m8']; ?></td>
        
            
        </tr>
        <tr>
            <td>
               Blev din leveregel bekræftet eller afkræftet?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
              
                </span>
            </td>
           
              <td>
                <?php if (!empty($a['m11'])): ?>
                  <?php if ($a['m9'] == 1): ?>
                    AFKRÆFTET
                    <?php else: ?>
                    BEKRÆFTET
                    
                  <?php endif; ?>
                <?php endif; ?>  
        
            </td>
        </tr>
        
         <tr>
            <td>
              Kan du generalisere denne erfaring til andre situationer?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
              
                </span>
            </td>
            
              <td>
                 <?php if (!empty($a['m11'])): ?>
                      <?php if ($a['m10'] == 1): ?>
                        JA
                        <?php else: ?>
                        NEJ
                        
                      <?php endif; ?>
                 <?php endif; ?> 
             
        
            </td>
        </tr>
        
        <tr>
            <td>
              Hvilke situationer?
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                I hvilke situationer kan du bruge denne erfaring?
                </span>
            </td>
            
              <td><?php echo $a['m11']; ?></td>
        
           
        </tr>
        
    </table>
    
    
    </div>

</div>


<?php endforeach; ?>






