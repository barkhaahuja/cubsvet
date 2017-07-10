<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/behandeling.css" rel="stylesheet" type="text/css"/>

<!-- Modal -->
<div class="modal fade" id="ModalBehandeling" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow" id="container">
            <div id="StepSelectorModBox" class="shadow">

                <div class="SS-HeaderBar"> Behandlingsoversigt
                    <a href="javascript:void(0);" class="PE-help-big"></a>
                    <a href="javascript:void(0);" class="close" data-dismiss="modal"
                       style="padding-right: 11px;"></a>
                </div>

                <div class="SS-S1-Box">
                    <?php $section_c=0; foreach (($steps['1']['sections']?:array()) as $section): $section_c++; ?>
                        <?php if ($current_step == 1): ?>
                            <?php if ($current_sub_step == $section_c - 1): ?>
                                <a href="javascript:void(0)"
                                   class="SS-S1-Box-active S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                   data-toggle="popover" data-id="1" data-step="<?php echo $steps['1']['title']; ?>"
                                   data-section="<?php echo $section; ?>"
                                   data-url="javascript:void(0)">
                                    <div class="SS-HR HRvis1"></div>
                                </a>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="1" data-step="<?php echo $steps['1']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/1/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                            <?php else: ?>
                                <a href="javascript:void(0)"
                                   class="S1-But"
                                   data-toggle="popover" data-id="1" data-step="<?php echo $steps['1']['title']; ?>"
                                   data-section="<?php echo $section; ?>"
                                   data-url="<?php echo $ROOT; ?>/step/readonly/1/<?php echo $section_c - 1; ?>">
                                </a>
                            
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <?php if ($current_step > 1): ?>
                    <div class="SS-S2-Box">
                        <?php $section_c=0; foreach (($steps['2']['sections']?:array()) as $section): $section_c++; ?>
                            <?php if ($current_step == 2): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S2-Box-active S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="2" data-step="<?php echo $steps['2']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis2"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="2" data-step="<?php echo $steps['2']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/2/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="2" data-step="<?php echo $steps['2']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/2/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($current_step > 2): ?>
                    <div class="SS-S3-Box">
                         <?php $section_c=0; foreach (($steps['3']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 3): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S3-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="3" data-step="<?php echo $steps['3']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis3"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="3" data-step="<?php echo $steps['3']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/3/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="3" data-step="<?php echo $steps['3']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/3/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($current_step > 3): ?>
                    <div class="SS-S4-Box">
                         <?php $section_c=0; foreach (($steps['4']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 4): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S4-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="4" data-step="<?php echo $steps['4']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis4"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="4" data-step="<?php echo $steps['4']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/4/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="4" data-step="<?php echo $steps['4']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/4/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($current_step > 4): ?>
                    <div class="SS-S5-Box">
                       <?php $section_c=0; foreach (($steps['5']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 5): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S5-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="5" data-step="<?php echo $steps['5']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis5"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="5" data-step="<?php echo $steps['5']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/5/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="5" data-step="<?php echo $steps['5']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/5/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                
                <?php if ($mod==1 || $mod==0): ?>
                    
                <?php if ($stepa && ($stepa_flag || $current_step == 6)): ?>
                    <div class="SS-S6-Box">
                        <?php $section_c=0; foreach (($steps['6']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 6): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S6-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis6"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($stepb && ($stepb_flag || $current_step == 7)): ?>
                    <div class="SS-S7-Box">
                        <?php $section_c=0; foreach (($steps['7']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 7): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S7-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis7"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($step6 && ($step6_flag || $current_step == 8)): ?>
                    <div class="SS-S8-Box">
                        <?php $section_c=0; foreach (($steps['8']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 8): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S8-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis8"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php endif; ?>
                
                
                 <?php if ($mod==2): ?>
                     
                <?php if ($stepa && ($stepa_flag || $current_step == 6)): ?>
                    <div class="SS-S6-Box">
                        <?php $section_c=0; foreach (($steps['6']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 6): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S6-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis6"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                     <?php if ($step6 && ($step6_flag || $current_step == 8)): ?>
                    <div class="SS-S8-Box">
                        <?php $section_c=0; foreach (($steps['8']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 8): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S8-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis8"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ($stepb && ($stepb_flag || $current_step == 7)): ?>
                    <div class="SS-S7-Box">
                        <?php $section_c=0; foreach (($steps['7']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 7): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S7-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis7"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                
                <?php endif; ?>
                
                 <?php if ($mod==3): ?>
                     
                   <?php if ($stepb && ($stepb_flag || $current_step == 7)): ?>
                    <div class="SS-S7-Box">
                        <?php $section_c=0; foreach (($steps['7']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 7): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S7-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis7"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ($stepa  && ($stepa_flag || $current_step == 6)): ?>
                    <div class="SS-S6-Box">
                        <?php $section_c=0; foreach (($steps['6']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 6): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S6-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis6"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                     <?php if ($step6 && ($step6_flag || $current_step == 8)): ?>
                    <div class="SS-S8-Box">
                        <?php $section_c=0; foreach (($steps['8']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 8): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S8-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis8"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
         
                
                
                <?php endif; ?>
                
                
                <?php if ($mod==4): ?>
                     
                   <?php if ($stepb && ($stepb_flag || $current_step == 7)): ?>
                    <div class="SS-S7-Box">
                        <?php $section_c=0; foreach (($steps['7']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 7): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S7-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis7"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                    
                     <?php if ($step6 && ($step6_flag || $current_step == 8)): ?>
                    <div class="SS-S8-Box">
                        <?php $section_c=0; foreach (($steps['8']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 8): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S8-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis8"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ($stepa && ($stepa_flag || $current_step == 6)): ?>
                    <div class="SS-S6-Box">
                        <?php $section_c=0; foreach (($steps['6']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 6): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S6-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis6"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php endif; ?>
                
                 <?php if ($mod==5): ?>
                     
                    <?php if ($step6  && ($step6_flag || $current_step == 8)): ?>
                    <div class="SS-S8-Box">
                        <?php $section_c=0; foreach (($steps['8']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 8): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S8-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis8"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                     
                     <?php if ($stepa && ($stepa_flag || $current_step == 6)): ?>
                    <div class="SS-S6-Box">
                        <?php $section_c=0; foreach (($steps['6']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 6): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S6-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis6"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                   <?php if ($stepb && ($stepb_flag || $current_step == 7)): ?>
                    <div class="SS-S7-Box">
                        <?php $section_c=0; foreach (($steps['7']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 7): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S7-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis7"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
  
                <?php endif; ?>
                
                
                
                 <?php if ($mod==6): ?>
                     
                    <?php if ($step6 && ($step6_flag || $current_step == 8)): ?>
                    <div class="SS-S8-Box">
                        <?php $section_c=0; foreach (($steps['8']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 8): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S8-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis8"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="8" data-step="<?php echo $steps['8']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/8/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                     
                      <?php if ($stepb && ($stepb_flag || $current_step == 7)): ?>
                    <div class="SS-S7-Box">
                        <?php $section_c=0; foreach (($steps['7']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 7): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S7-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis7"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="7" data-step="<?php echo $steps['7']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/7/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                     
                     <?php if ($stepa && ($stepa_flag || $current_step == 6)): ?>
                    <div class="SS-S6-Box">
                        <?php $section_c=0; foreach (($steps['6']['sections']?:array()) as $section): $section_c++; ?>
                            <!--<a href="#" class="S1-But locked8"></a>-->
                            <?php if ($current_step == 6): ?>
                                <?php if ($current_sub_step == $section_c - 1): ?>
                                    <a href="javascript:void(0)"
                                       class="SS-S6-Box-active video S1-But <?php echo ( ( $section_c - 1 ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="javascript:void(0)">
                                        <div class="SS-HR HRvis6"></div>
                                    </a>
                                    <?php else: ?>
                                        <a href="javascript:void(0)"
                                           class="S1-But <?php echo ( ( $section_c ) <= $current_sub_step ) ? '' : 'locked8'; ?>"
                                           data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                           data-section="<?php echo $section; ?>"
                                           data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                        </a>
                                    
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="S1-But"
                                       data-toggle="popover" data-id="6" data-step="<?php echo $steps['6']['title']; ?>"
                                       data-section="<?php echo $section; ?>"
                                       data-url="<?php echo $ROOT; ?>/step/readonly/6/<?php echo $section_c - 1; ?>">
                                    </a>
                                
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                  
  
                <?php endif; ?>
                
                

                
                <div class="SS-Info S<?php echo $current_step; ?>Info"
                <?php if (($current_sub_step > 8)): ?>
                    style="margin-top: 240px"
                <?php endif; ?>
                >
                <div class="WD-SubHeader">Du er nået til:</div>
                <div class="WD-Step<?php echo $current_step; ?>_Icon"></div>
                <div class="WD-Header"><?php echo $steps[$current_step]['title']; ?></div>
                <div class="WD-HR"></div>
                <div class="WD-SubHeader"><?php echo $steps[$current_step]['sections'][$current_step_complete]; ?></div>
                <div class="SS-InfoButtons">
                    <a href="<?php echo $ROOT; ?>/step/<?php echo $current_step; ?>/<?php echo $current_sub_step; ?>" class="SS-continue RadCornAll">FORTSÆT</a>
                </div>
            </div>

        </div>

    </div>

</div>
</div>

<div id="TO-HelpContent" class="popover bottom">
    <p>
        Dette er ét af dine vigtigste redskaber. Det er det, der viser dig, hvor du er i behandlingen. Det er også det, der viser dig, hvordan du kommer videre. Det sker ved at du klikker på FORTSÆT. Du kan også klikke på OVERSIGT og få et større overblik over den del af behandlingen, du har været igennem.
    </p>
</div>


<style>

    #StepSelectorModBox .popover.right {
        margin-top: -40px;
    }

    #StepSelectorModBox .popover-content {
        padding: 0;
    }

    .But-Cross-30x100 {
        margin-left: 10px;
        margin-bottom: 10px;
        width: 80px;
    }

    .But-Tick-30x100 {
        float: left;
        margin-left: 10px;
        width: 140px;
    }

    .WD-Preview-Footer {
        border-top: 1px solid #D5D5D5;
        padding-top: 10px;
        height: 40px;
        background-color: rgba(228, 228, 228, 0.65);
    }
</style>

<div id="WD-Preview" class="popover top">
    <div class="SS-Info" style="margin:0;border: none;height: 100%;width:250px;">
        <div class="WD-Preview_Icon"></div>
        <div class="WD-Header WD-Preview-Header">Introduktion</div>
        <div class="WD-SubHeader WD-Preview-SubHeader" style="height: 30px;">Problem- og målliste</div>
        <div class="WD-Preview-Footer">
            <div class="Button30x100 But-Cross-30x100">
                <a class="WD-Preview-Close" href="javascript:void(0)">LUK</a>
            </div>
            <div class="Button30x100 But-Tick-30x100">
                <a class="WD-Preview-Continue" href="javascript:void(0)">GÅ TIL KAPITEL</a>
            </div>
        </div>
    </div>
</div>

<script>

    $('.PE-help-big').popover({
        content: $('#TO-HelpContent').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });

    var element =  $('.S1-But') ;
     
    element.mouseenter(function () {
        //$('.S1-But').popover('hide');
        $('.popover').css('display', 'none');
        $('.hovered').removeClass("hovered");
        $(this).popover('show');
        $(this).addClass("hovered");
        return false;
    });

    element.popover({
        content: $('#WD-Preview').html(),
        html: true,
        placement: 'right',
        trigger: 'manual',
        delay: 200
    });

    element.on('shown.bs.popover', function () {
        $('.WD-Preview_Icon').addClass('WD-Step' + $(this).data('id') + '_Icon');
        $('.WD-Preview-Header').html($(this).data('step'));
        $('.WD-Preview-SubHeader').html($(this).data('section'));
        $('.WD-Preview-Continue').attr('href', $(this).data('url'));
    });

    $(document).on('click', '.WD-Preview-Close', function () {
        $('.S1-But').popover('hide');
        $('.popover').css('display', 'none');
        $(".S1-But").removeClass("hovered");
    });

</script>
