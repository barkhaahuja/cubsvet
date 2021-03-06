<div id="DashboardContainer">

    <div class="Dash-book-title"><?php echo $section_title; ?></div>

    <?php echo $this->render('dashboard/__menu.section.library.htm',$this->mime,get_defined_vars()); ?>

    <!--right section starts-->
    <div id="Dash-right-MainBox">

        <div class="dash_lib_pdf">
            <?php foreach (($library_pdfs?:array()) as $pdf): ?>
                <?php if ($currentStep >= $pdf['step']): ?>
                    <div id="Dash-Box-Right">                    
                        <a href="<?php echo $ROOT; ?>/<?php echo $pdf['file']; ?>" target="_blank">
                            <div id="Dash-Thumbnail">
                                <img src="<?php echo $ROOT; ?>/<?php echo $pdf['pdfimg']; ?>" style="width: 120px;height: 80px; cursor: pointer;" />
                            </div>
                        </a>
                        <?php echo $pdf['name']; ?>
                    </div>
                <?php endif; ?>
                <?php if ($currentStep == 6 && $currentSubStep == 5 && $pdf['step'] == 6): ?>
                    <div id="Dash-Box-Right">                    
                        <a href="<?php echo $ROOT; ?>/<?php echo $pdf['file']; ?>" target="_blank">
                            <div id="Dash-Thumbnail">
                                <img src="<?php echo $ROOT; ?>/<?php echo $pdf['pdfimg']; ?>" style="width: 120px;height: 80px; cursor: pointer;" />
                            </div>
                        </a>
                        <?php echo $pdf['name']; ?>
                    </div>
                <?php endif; ?>
                <?php if ($currentStep == 7 && $currentSubStep >= 4 && $pdf['step'] == 7 && $pdf['name'] != 'B_7_2'): ?>
                    <div id="Dash-Box-Right">                    
                        <a href="<?php echo $ROOT; ?>/<?php echo $pdf['file']; ?>" target="_blank">
                            <div id="Dash-Thumbnail">
                                <img src="<?php echo $ROOT; ?>/<?php echo $pdf['pdfimg']; ?>" style="width: 120px;height: 80px; cursor: pointer;" />
                            </div>
                        </a>
                        <?php echo $pdf['name']; ?>
                    </div>
                <?php endif; ?>
                <?php if ($currentStep == 7 && $currentSubStep >= 8 && $pdf['step'] >= 7 && $pdf['name'] == 'B_7_2'): ?>
                    <div id="Dash-Box-Right">                    
                        <a href="<?php echo $ROOT; ?>/<?php echo $pdf['file']; ?>" target="_blank">
                            <div id="Dash-Thumbnail">
                                <img src="<?php echo $ROOT; ?>/<?php echo $pdf['pdfimg']; ?>" style="width: 120px;height: 80px; cursor: pointer;" />
                            </div>
                        </a>
                        <?php echo $pdf['name']; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>
    <!--right section ends-->

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <p class="modal-title" style="font-size: 20px;">Øvelses titell</p>
                <div id="Button40x150" class="But-Download-40x150" style="float: right;margin-top: -30px;"><a href="#">DOWNLOAD</a></div>
            </div>
            <div class="modal-body">
                <div style="height: 120px;">
                    <img src="<?php echo $ROOT; ?>/assets/img/gray.png" style="float: left; margin-right: 20px;" />
                    <p style="font-size: 12px;">
                        Beskrivelse: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam congue viverra
                        aliquam. Integer quis massa leo. Suspendisse purus neque, laoreet nec purus nec, vulputate auctor mauris. Ut adipiscing dapibus facilisis. Quisque in consectetur lectus, non placerat lorem. Donec molestie diam nec mauris porttitor consequat.
                    </p>
                </div>
                <hr>
                <p style="font-size: 20px;">Øvelses indhold</p>
                <p style="font-size: 12px;">
                    Beskrivelse: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam congue viverra
                    aliquam. Integer quis massa leo. Suspendisse purus neque, laoreet nec purus nec, vulputate auctor mauris. Ut adipiscing dapibus facilisis. Quisque in consectetur lectus, non placerat lorem. Donec molestie diam nec mauris porttitor consequat.
                </p>
                <div style="height: 120px;">
                    <img src="<?php echo $ROOT; ?>/assets/img/gray.png" style="float: left;" />
                    <img src="<?php echo $ROOT; ?>/assets/img/gray.png" style="float: left; margin-left: 70px;" />
                    <img src="<?php echo $ROOT; ?>/assets/img/gray.png" style="float: left; margin-left: 70px;" />
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->