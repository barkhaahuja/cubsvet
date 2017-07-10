<!-- new table -->

<h4>NAT Challenge</h4>

<?php foreach (($nat_ch_list?:array()) as $a): ?>
<div class="row">

    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="radio">
                    <label>Negative tanker: </label><?php echo $a['m1']; ?>
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
                For
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvad taler for den negative tanke?
                </span>
            </td>
            <td><?php echo $a['l1']; ?></td>
        </tr>
        <tr>
            <td>
                Imod
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvad taler imod den negative tanke?
                </span>
            </td>
            <td><?php echo $a['r1']; ?></td>
        </tr>
        <tr>
            <td>
                Udfordring
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Udtænk en bestemt situation hvor du kan afprøve om din tanke holder stik. Hvad vil du konkret gøre?
                </span>
            </td>
            <td><?php echo $a['m2']; ?></td>
            
        </tr>
        <tr>
            <td>
                Fordele
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvilke fordele kan der være ved at gøre dette?
                </span>
            </td>
            <td><?php echo $a['l2']; ?></td>
        </tr>
        <tr>
            <td>
                Ulemper
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                    Hvilke ulemper kan der være ved at gøre dette?
                </span>
            </td>
            <td><?php echo $a['r2']; ?></td>
        </tr>
        <tr>
            <td>
                Aftale
                <br/><br/>
                <span style="font-style: italic;font-size: 12px">
                   Hvornår vil du gøre det? Skriv det i din kalender. Klik på ÅBN KALENDER
                   <br/>
                   <br/>
                 
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
<!--        bug P095-360-->
        <tr>
            <td>Hvad skete der?</td>
            <td><?php echo $a['m4']; ?></td>
        </tr>
        <tr>
            <td>Blev din automatiske negative tanke bekræftet eller afkræftet?</td>
            <td>
                <?php if ($a['m5']==1): ?>
                 AFKRÆFTET
                 <?php else: ?> BEKRÆFTET 
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Kan du generalisere denne erfaring til andre situationer?</td>
            <td>
                <?php if ($a['m6']==1): ?>
                 JA
                 <?php else: ?> NEJ 
                <?php endif; ?>                 
            </td>
        </tr>
        <tr>
            <td>Hvilke situationer?</td>
            <td><?php echo $a['m7']; ?></td>
        </tr>        
    </table>
    
    
    </div>

</div>


<?php endforeach; ?>



