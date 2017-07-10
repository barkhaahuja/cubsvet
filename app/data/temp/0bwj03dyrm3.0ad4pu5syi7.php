

<div class="WidgetWidth200 shadow RadCornAll ">
    <div class="WidgetHeaderBar">Negative automatiske tanker
        <a href="javascript:void(0)" class="NATREG-help"></a>
    </div>
  
    <?php if (($current_step.'.'.$current_sub_step) < 4.6): ?>
        <div class="ContentWidgetNu NATRegWidget">

            <div class="NATREGIcon-WH"></div>
            <div class="NATREGText-WH">Registrering</div>

        </div>
    <?php endif; ?>
    
    <?php if ((($current_step.'.'.$current_sub_step)>= 4.6) && (($current_step.'.'.$current_sub_step)< 5.3)): ?>
        <div class="ContentWidgetNu NATRegWidget">

            <div class="NATWtTabContr">
                <div class="NATWtRegIcon">
                    <img src="<?php echo $ROOT; ?>/assets/img/NATRegisterIcon.png" width="32" height="32" />
                </div>               
                
                <div class="NATWtRegTxt">Registrering</div>
            </div>
            
            <div class="NATWtDenCrcContr">
                <div class="NATWtDenCirIcon">
                    <img src="<?php echo $ROOT; ?>/assets/img/NAT_negcircle_icon.png" width="32" height="24" />
                </div>
                
                <div class="NATWtDenTxt">Den negative cirkel</div>
            </div>

        </div>
    <?php endif; ?>
   
    <?php if (($current_step.'.'.$current_sub_step) >= 5.3): ?>
         <div class="ContentWidgetNu NATRegWidget">
            
            <div class="NATWtRegContrChl">
                <div class="NATWtRegIconChl">
                    <img src="<?php echo $ROOT; ?>/assets/img/NATRegisterIcon.png" width="32" height="32" />
                </div>
                
                <div class="NATWtRegTxtChl">Registrering</div>
            </div>
            
            <div class="NATWtDenCrcContrChl">
                <div class="NATWtDenCirIconChl">
                    <img src="<?php echo $ROOT; ?>/assets/img/NAT_negcircle_icon.png" width="32" height="24" />
                </div>
                
                <div class="NATWtDenTxtChl">Den negative cirkel</div>
            </div>
            
            <div class="NATWtChlgContrChl">
                <div class="NATWtChlgIconChl">
                    <img src="<?php echo $ROOT; ?>/assets/img/nat_challenge_icon.png" width="32" height="24" />
                </div>
                
                <div class="NATWtChlgTxtChl">Udfordring</div>
            </div>

        </div>
        
        
    <?php endif; ?>   
    
    <?php if ($current_step > 5): ?>
         <!-- <div class="ContentWidgetNu NATRegWidget">
            
            <div class="NATWtRegContrChl">
                <div class="NATWtRegIconChl">
                    <img src="<?php echo $ROOT; ?>/assets/img/NATRegisterIcon.png" width="32" height="32" />
                </div>
                
                <div class="NATWtRegTxtChl">Registrering</div>
            </div>
            
            <div class="NATWtDenCrcContrChl">
                <div class="NATWtDenCirIconChl">
                    <img src="<?php echo $ROOT; ?>/assets/img/NAT_negcircle_icon.png" width="32" height="24" />
                </div>
                
                <div class="NATWtDenTxtChl">Den negative cirkel</div>
            </div>
            
            <div class="NATWtChlgContrChl">
                <div class="NATWtChlgIconChl">
                    <img src="<?php echo $ROOT; ?>/assets/img/nat_challenge_icon.png" width="32" height="24" />
                </div>
                
                <div class="NATWtChlgTxtChl">Udfordring</div>
            </div>

        </div> -->
        <?php endif; ?>
        
    <?php if (($current_step.'.'.$current_sub_step) >= 4.6): ?>
        <div class="WD-Button WidgetButtons">
          
            <a id="ButtonNATRegister" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
        </div>
        <?php else: ?>
            <div class="WD-Button WidgetButtons">
                <a id="ButtonNATRegister" href="javascript:void(0);" class="WB-FullBlank RadCornAllExtreme">ÅBN</a>
            </div>
        
    <?php endif; ?>

    <div id="ContentNATRegister"></div>

    <div id="NATREG-HelpContent" class="popover bottom">
        <div class="title">Negative automatiske tanker</div>
        <p>
            Dette redskab kan du bruge til at
            formulere målsætninger i forhold til
            forskellige problemer du har i
            forbindelse med din depression.
            Redskabet viser en tilfældig udvalgt,
            af de målsætninger du har
            formuleret.
            Klik på ÅBN for at bruge redskabet.
        </p>
    </div>
</div>

<script>

    $(document).ready(function (){
        // modal help
        $('.NATREG-help').popover({
            content: $('#NATREG-HelpContent').html(),
            html: true,
            placement: 'bottom',
            trigger: 'hover',
            container: 'body'
        });
       
    });

    $('#ButtonNATRegister').click(function () {
      
        <?php if (($current_step.'.'.$current_sub_step) < 4.6): ?>
            $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/show?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                $('#ModalNATWidget').modal('show');
                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                   
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                    $('#ContentNATRegister').html('');
                });
            });
        <?php endif; ?>
       
        <?php if ((($current_step.'.'.$current_sub_step)>= 4.6) && (($current_step.'.'.$current_sub_step)< 5.3)): ?>
            $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negcircle?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                $('#ModalNATWidget').modal('show');
                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                    
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                    $('#ContentNATRegister').html('');
                });
            });
        <?php endif; ?>
        <?php if (($current_step.'.'.$current_sub_step) >= 5.3): ?>
            $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negativechallenge?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                $('#ModalNATWidget').modal('show');
                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                  
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                    $('#ContentNATRegister').html('');
                });
            });
        <?php endif; ?>
        <?php if ($current_step > 5): ?>
           /* $('#ContentNATRegister').load('<?php echo $ROOT; ?>/window/nat/negativechallenge?id=<?php echo date("Ymdhis", time()); ?>&dhbrd=1', function () {
                $('#ModalNATWidget').modal('show');
                $('#ModalNATWidget').on('hidden.bs.modal', function (e) { 
                    $(this).removeData('hidden.bs.modal').empty();
                    $(document.body).removeClass('modal-open');
                });
            });*/
        <?php endif; ?>
    });

</script>
