<link href="<?php echo $ROOT; ?>/assets/css/window.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/assets/css/problem_goal.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $ROOT; ?>/3rdparty/bootstrap/css/bootstrap.custom.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo $ROOT; ?>/3rdparty/jquery/jquery-1.10.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/jqueryui/jquery-ui-1.10.custom.min.js"></script>
<script src="<?php echo $ROOT; ?>/3rdparty/bootstrap/js/bootstrap.custom.min.js"></script>

<style>
    .PGL-C4-Guide .popover {
        background-color: black;
    }

    .PGL-C4-Guide .popover input {
        background-color: rgb(199, 199, 199); border: none;
    }

    .PGL-C4-Guide .popover.bottom .arrow:after {
        border-bottom-color: #000000;
    }
    
    .PGL-C4-Guide .popover-content div {
        width: 160px !important;
    }
    
    .PGL-C4-Guide .popover-content .WD-Button .WB-overview, .PGL-C4-Guide .popover-content .WD-Button .WB-continue {
        width: 70px; margin:0 5px;
    }
    
    .PGL-C4-Input-Span{
        cursor: pointer
    }
</style>
<!-- Modal -->
<div class="modal fade" id="ModalProblemGoal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" style="width: 960px;">
        <div class="modal-content shadow Window" style="height: 320px;width: 960px;">

            <div class="ContentWindow">
                
                <input type="hidden" name="pbglhide" id="pbglhide" value="" />

                <div id="S1-PGL-Container" class="shadow">

                    <div class="PE-HeaderBar"> Problem- og målliste
                        <a href="javascript:void(0)" class="PE-help"
                           data-toggle="tooltip"
                           data-html="true"
                           data-original-title="Tænk på en bestemt situation, som du har haft for nylig, hvor du var særlig trist. 
                           Beskriv situationen kort. Klik på TILFØJ NY for at starte med at skrive"
                           data-placement="bottom"></a>
                        <a href="#" class="close" data-dismiss="modal" aria-hidden="true"></a>

                        <div class="PGL-DropShaddowDOWN"></div>
                    </div>

                    <div class="PGL-InnerConatiner">

                        <!--Next section is split into 4 columns 240px width total of 960px-->

                        <!--Coulmn 1-->
                        <div class="PGL-Column PGL-ColumnProb">

                            <div class="PGL-ProbIconDis">Problem</div>

                            <textarea class="PGL-TextFeild PGL-TextProb" readonly
                                      data-toggle="tooltip"
                                      data-html="true"
                                      data-trigger="manual"
                                      data-original-title="Hvilket problem vil du<br>
                                      arbejde med her?<br><br>Klik i tekstfeltet for at<br>begynde at skrive."
                                      data-placement="bottom"></textarea>

                            <div class="PGL-TextBoxButtons PGL-TextBoxButtonsEdit visOFF">
                                <a href="javascript:void(0)" onclick="text_undo('problem')" class="TB-close">FORTRYD</a>
                                <a href="javascript:void(0)" onclick="text_save('problem')" class="TB-tick">FÆRDIG</a>
                            </div>

                            <div class="PGL-TextBoxButtons PGL-TextBoxButtonsGuide visOFF">
                                <a href="javascript:void(0)" class="TB-default"></a>
                                <a href="javascript:void(0)" class="TB-default tb_iconPrev " onclick="next_sit()">NÆSTE</a>
                            </div>

                        </div>

                        <div class="PGL-Divider"></div>
                        <!--Coulmn 2-->
                        <div class="PGL-Column PGL-ColumnSit">
                            <div class="PGL-SitIconDis">Situation</div>
                            <textarea class="PGL-TextFeild PGL-TextSit" readonly
                                      data-toggle="tooltip"
                                      data-html="true"
                                      data-trigger="manual"
                                      data-original-title="Beskriv kort en situation hvor problemet opstod<br>
                                      <br>Klik i tekstfeltet for <br>at begynde at skrive."
                                      data-placement="bottom"></textarea>

                            <div class="PGL-TextBoxButtons PGL-TextBoxButtonsEdit visOFF">
                                <a href="javascript:void(0)" onclick="text_undo('situation')"
                                   class="TB-close">FORTRYD</a>
                                <a href="javascript:void(0)" onclick="text_save('situation')" class="TB-tick">FÆRDIG</a>
                            </div>

                            <div class="PGL-TextBoxButtons PGL-TextBoxButtonsGuide visOFF">
                                <a href="javascript:void(0)" class="TB-default tb_iconNext active_tbIcons_nxt" onclick="back_prob()">TILBAGE</a>
                                <a href="javascript:void(0)" class="TB-default tb_iconPrev " onclick="next_goal()">NÆSTE</a>
                            </div>

                        </div>

                        <div id="PGL-Divider"></div>
                        <!--Coulmn 3-->
                        <div class="PGL-Column PGL-ColumnGoal">
                            <div class="PGL-GoalIconDis">Mål</div>
                            <textarea class="PGL-TextFeild PGL-TextGoal" readonly
                                      data-toggle="tooltip"
                                      data-html="true"
                                      data-trigger="manual"
                                      data-original-title="Hvad er dit mål i<br>
                                      forhold til problemet?<br><br>Klik i tekstfeltet for at<br>begynde at skrive."
                                      data-placement="bottom"></textarea>

                            <div class="PGL-TextBoxButtons PGL-TextBoxButtonsEdit visOFF">
                                <a href="javascript:void(0)" onclick="text_undo('goal')" class="TB-close">FORTRYD</a>
                                <a href="javascript:void(0)" onclick="text_save('goal')" class="TB-tick">FÆRDIG</a>
                            </div>

                            <div class="PGL-TextBoxButtons PGL-TextBoxButtonsGuide visOFF">
                                <a href="javascript:void(0)" class="TB-default tb_iconNext" onclick="back_sit()">TILBAGE</a>
                                <a href="javascript:void(0)" class="TB-default tb_iconPrev" onclick="next_finish()">NÆSTE</a>
                            </div>

                        </div>

                        <!--Coulmn 4-->
                        <div class="PGL-Column PGL-C4" id="prbglsortable">

                            <?php if (! $activities): ?>
                                <div id="PGL-VOID">
                                    Beskriv kort en situation hvor problemet opstod.<br><br>
                                    Klik på “TILFØJ NY” <br/>
                                    for at komme igang.<br/>
                                </div>
                            <?php endif; ?>                            
                            
                            <?php foreach (($activities?:array()) as $activity): ?>
                                <div class="PGL-C4-List PBGL<?php echo $activity['id']; ?>" id="<?php echo $activity['id']; ?>"
                                     data-title="<?php echo $activity['title']; ?>"
                                     data-problem="<?php echo $activity['problem']; ?>"
                                     data-situation="<?php echo $activity['situation']; ?>"
                                     data-goal="<?php echo $activity['goal']; ?>"
                                     data-sorder="<?php echo $activity['sorder']; ?>">
                                    <div class="C4-Text">
                                        <span class="PGL-C4-Input-Span"><?php echo $activity['title']; ?></span>
                                        <input style="display: none" type="text" class="PGL-C4-Input" value="<?php echo $activity['title']; ?>" readonly />
                                        <a class="listClose" href="javascript:void(0)"></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>                            

                        </div>

                        <br></div>
                    <div id="PE-ButtonBar">
                        <div class="PGL-DropShaddowUP"></div>
                        <a class="S1_PE_ButBot RadCornAll" href="javascript:void(0)">TILFØJ NY</a></div>
                </div>

            </div>

        </div>
    </div>

</div>

<div id="PGLEditor" class="popover">
    <div style="width: 230px;height: 120px;">
        <p style="font-size: 12px;color: #999">Giv dit problem/mål en titel.<br>Du kan altid ændre den igen senere.</p>

        <input class="PGLEditorText" type="text" style="width: 100%;"/>

        <div class="WD-Button WidgetButtons" style="margin-top: 10px;">
            <a href="javascript:void(0)" onclick="back_goal()" class="PGLEditorButton WB-overview RadCornAllExtreme">TILBAGE</a>
            <a href="javascript:void(0)" onclick="next_save()" class="PGLEditorButton WB-continue RadCornAllExtreme">GEM</a>
        </div>

    </div>
</div>

<div id="click_popOverBox" class="click_popOverBox_NC popover bottom">
    <p>Er du sikker på, at du vil slette dette problem?</p>
    <div class="popOver_btn_nc">
        <button class="prevBtnNC" onclick="confirmCancel(this)">NEJ</button>
        <button class="nextBnNC" onclick="confirmOk(this); return false;">JA</button>
    </div>
</div>

<script>

var changes = false ;

$('.PE-help').tooltip();
$('.PGL-TextFeild').tooltip();

$('.listClose').popover({
    content: $('#click_popOverBox').html(),
    html: true,
    placement: 'bottom',
    trigger: 'click'
});

// fix
$(document).ready(function(){
    
    /*
    $('.PGL-C4-Input').change(function(){
     
     $(this).parent().find('.PGL-C4-Input-Span').html($(this).val());
     
    });
    */
});

function confirmCancel(){        
    remPopover();
    
    $('.listClose').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
}

function confirmOk(){ 
    var pbglid = $('#pbglhide').val();

    $.ajax({
        url: "<?php echo $ROOT; ?>/window/pg/delete/" + pbglid,
        type: 'POST',
        dataType: 'json',
        success: function (data) {
            if (data.status == 'success') {
                //remPopover();
                
                clean_pg();
                unselect_pg();
                
                $('.PBGL'+pbglid).remove();
                
				/*
                $('.listClose').popover({
                    content: $('#click_popOverBox').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click'
                });*/
				
            }

            if (data.status == 'error') {

            }
        }
    });
}

// Add Problem-Objective
$('.S1_PE_ButBot').click(function () {
    add_pg();
});

// TextField Focus
$('.PGL-TextFeild').focus(function () {
    $('.PGL-TextFeild').tooltip('hide');
    if ($('.PGL-C4-Selected').length == 1 && $('.PGL-C4-Guide').length == 0) {
        text_undo('problem');
        text_undo('situation');
        text_undo('goal');
        $(this).parent().children('.PGL-TextBoxButtonsEdit').removeClass('visOFF');
    }
});

$(document).ready(function() {
    $('div.PGL-ColumnProb .PGL-TextProb').focus(function () {
        $('div.PGL-ColumnProb .tb_iconPrev').addClass("active_tbIcons_pre");
    });

    $('div.PGL-ColumnSit .PGL-TextSit').focus(function () {
        $('div.PGL-ColumnSit .tb_iconPrev').addClass("active_tbIcons_pre");
    });

    $('div.PGL-ColumnGoal .PGL-TextGoal').focus(function () {
        $('div.PGL-ColumnGoal .tb_iconPrev').addClass("active_tbIcons_pre");
    });
});

$(document).on('click', '.PGL-C4-List .C4-Text', function (event) {
    
	
	if(event.target.nodeName == "BUTTON" && $(event.target).text() == "JA")
	{
		return false;
	}
	
	clean_pg();
    unselect_pg();
    select_pg($(this).parent());
});

$(document).on('click', '.PGL-C4-List-Sel .C4-Text', function (event) {

    if ($('.PGL-C4-Guide').length == 0) {
        clean_pg();
        unselect_pg();
        select_pg($(this).parent());
    }
	
});

$(document).on('click', '.listClose', function (event) { 
    
	
    changes = true ;
    clean_pg();
    unselect_pg();

    //$(this).parent().parent().remove();
    
    $('.listClose').not(this).popover('hide');
    
    var pbglid = $(event.currentTarget).parent().parent().attr("id");
            
    $('#pbglhide').val('');
    $('#pbglhide').val(pbglid);
                    
    /*$('.listClose').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    }).parent().on('click', 'button.nextBnNC', function(evt) {
        $(evt.delegateTarget).parent().remove();
    });*/
        
    $('.listClose').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
	
    event.stopPropagation();
        
    var elmpos = $(this).position().top;
    
    if(elmpos > 70){
        document.getElementById('prbglsortable').scrollTop = 9999999;
    }

});

function add_pg() {

    clean_pg();
    unselect_pg();

    $('.PGL-ProbIconDis').removeClass('PGL-ProbIconDis').addClass('PGL-ProbIcon');
    $('.PGL-ColumnProb').children('.PGL-TextBoxButtonsGuide').removeClass('visOFF');
    $('.PGL-TextProb').removeAttr('readonly');
    $('.PGL-TextProb').tooltip('show');

    var html = '<div class="PGL-C4-List-Sel  PGL-C4-Guide">';
    html += '<div class="PGL-C4-Selected"></div><div class="C4-Text">';
    html += '<input type="text" class="PGL-C4-Input" readonly value="Ny problem/målliste" />';
    html += '<a class="listClose" href="javascript:void(0)"></a>';
    html += '</div> </div>';
    $('.PGL-C4').append(html);

    $('#PGL-VOID').hide();

}

function clean_pg() {


    $('.PGL-ProbIcon').removeClass('PGL-ProbIcon').addClass('PGL-ProbIconDis');
    $('.PGL-TextProb').attr('readonly', 'readonly');
    $('.PGL-TextProb').val('');
//    $('.PGL-TextProb').tooltip('hide');

    $('.PGL-SitIcon').removeClass('PGL-SitIcon').addClass('PGL-SitIconDis');
    $('.PGL-TextSit').attr('readonly', 'readonly');
    $('.PGL-TextSit').val('');
    $('.PGL-TextSit').tooltip('hide');

    $('.PGL-GoalIcon').removeClass('PGL-GoalIcon').addClass('PGL-GoalIconDis');
    $('.PGL-TextGoal').attr('readonly', 'readonly');
    $('.PGL-TextGoal').val('');
    $('.PGL-TextGoal').tooltip('hide');

    $('.PGL-TextBoxButtons').removeClass('visOFF').addClass('visOFF');
    $('.PGL-C4-Input').attr('readonly', 'readonly');
    //fix
    $('.PGL-C4-Input').hide();
    $('.PGL-C4-Input-Span').show();


}

function unselect_pg() {

    title_undo();

    $('.PGL-C4-Guide').remove();
    $('.PGL-C4-List-Sel').removeClass('PGL-C4-List-Sel').addClass('PGL-C4-List');
    $('.PGL-C4-Selected').remove();
    $('.PGL-SelectedBut').remove();

}


function select_pg(pgl_c4_list) {

	$('.listClose').popover('hide');
	
	$('.PGL-ProbIconDis').removeClass('PGL-ProbIconDis').addClass('PGL-ProbIcon');
    $('.PGL-TextProb').removeAttr('readonly');
    $('.PGL-TextProb').val(pgl_c4_list.data('problem'));
    $('.PGL-TextProb').data('original', pgl_c4_list.data('problem'));

    $('.PGL-SitIconDis').removeClass('PGL-SitIconDis').addClass('PGL-SitIcon');
    $('.PGL-TextSit').removeAttr('readonly');
    $('.PGL-TextSit').val(pgl_c4_list.data('situation'));
    $('.PGL-TextSit').data('original', pgl_c4_list.data('situation'));

    $('.PGL-GoalIconDis').removeClass('PGL-GoalIconDis').addClass('PGL-GoalIcon');
    $('.PGL-TextGoal').removeAttr('readonly');
    $('.PGL-TextGoal').val(pgl_c4_list.data('goal'));
    $('.PGL-TextGoal').data('original', pgl_c4_list.data('goal'));

    pgl_c4_list.removeClass('PGL-C4-List').addClass('PGL-C4-List-Sel');
    $('<div class="PGL-C4-Selected"></div>').insertBefore(pgl_c4_list.children('.C4-Text'));

    pgl_c4_list.children().children('.PGL-C4-Input').removeAttr('readonly');
    pgl_c4_list.children().children('.PGL-C4-Input-Span').hide();
    pgl_c4_list.children().children('.PGL-C4-Input').show();
    pgl_c4_list.children().children('.PGL-C4-Input').focus();
 
    var html = '<div class="PGL-SelectedBut PGL-TextBoxButtons pgl_nextB_prevB visOFF" id="savbtn">';
	
	html += '<a href="javascript:void(0)" onclick="title_undo()" class="TB-close">FORTRYD</a>';
    html += '<a href="javascript:void(0)" onclick="title_save(this)" class="TB-tick">GEM</a>';
	
    html += '</div>';
    $(html).insertAfter(pgl_c4_list);
    $('.PGL-SelectedBut').removeClass('visOFF');
	
	

}



function next_sit() {
    if($('.PGL-TextProb').val() != ''){
        $('.PGL-TextProb').attr('readonly', 'readonly');
        $('.PGL-ColumnProb').children('.PGL-TextBoxButtonsGuide').addClass('visOFF');

        $('.PGL-SitIconDis').removeClass('PGL-SitIconDis').addClass('PGL-SitIcon');
        $('.PGL-ColumnSit').children('.PGL-TextBoxButtonsGuide').removeClass('visOFF');
        $('.PGL-TextSit').removeAttr('readonly');
        $('.PGL-TextSit').tooltip('show');
        if($('.PGL-TextGoal').val() != ''){
            $('.PGL-TextGoal').tooltip('show');
        }
    }
}

function back_prob() {

    $('.PGL-TextProb').removeAttr('readonly');
    $('.PGL-ColumnProb').children('.PGL-TextBoxButtonsGuide').removeClass('visOFF');

    $('.PGL-TextSit').attr('readonly', 'readonly');
    $('.PGL-SitIcon').removeClass('PGL-SitIcon').addClass('PGL-SitIconDis');
    $('.PGL-ColumnSit').children('.PGL-TextBoxButtonsGuide').addClass('visOFF');
}

function next_goal() {

    $('.PGL-TextSit').attr('readonly', 'readonly');
    $('.PGL-ColumnSit').children('.PGL-TextBoxButtonsGuide').addClass('visOFF');

    $('.PGL-GoalIconDis').removeClass('PGL-GoalIconDis').addClass('PGL-GoalIcon');
    $('.PGL-ColumnGoal').children('.PGL-TextBoxButtonsGuide').removeClass('visOFF');
    $('.PGL-TextGoal').removeAttr('readonly');
    $('.PGL-TextGoal').tooltip('show');
}

function back_sit() {

    $('.PGL-TextSit').removeAttr('readonly');
    $('.PGL-ColumnSit').children('.PGL-TextBoxButtonsGuide').removeClass('visOFF');

    $('.PGL-TextGoal').attr('readonly', 'readonly');
    $('.PGL-GoalIcon').removeClass('PGL-GoalIcon').addClass('PGL-GoalIconDis');
    $('.PGL-ColumnGoal').children('.PGL-TextBoxButtonsGuide').addClass('visOFF');
}

function next_finish() {

    $('.PGL-TextGoal').attr('readonly', 'readonly');
    $('.PGL-ColumnGoal').children('.PGL-TextBoxButtonsGuide').addClass('visOFF');

    $('.PGL-C4-List-Sel .C4-Text').popover({
        content: $('#PGLEditor').html(),
        html: true,
        placement: 'bottom',
        trigger: 'manual'
    });

    $('.PGL-C4-List-Sel .C4-Text').popover('show');

    $('.PGLEditorText').val($('.PGL-C4-List-Sel .PGL-C4-Input').val());
    
    document.getElementById('prbglsortable').scrollTop = 9999999;
}

function back_goal() {

    $('.PGL-TextGoal').removeAttr('readonly');
    $('.PGL-ColumnGoal').children('.PGL-TextBoxButtonsGuide').removeClass('visOFF');

    $('.PGL-C4-List-Sel .C4-Text').popover('hide');
    $('.popover').css('display', 'none');

}
function next_save(event) { 

    var title = $('.PGLEditorText').val();
    var problem = $('.PGL-TextProb').val();
    var situation = $('.PGL-TextSit').val();
    var goal = $('.PGL-TextGoal').val();

    $('.PGL-C4-List-Sel').data('title', title);
    $('.PGL-C4-List-Sel').data('problem', problem);
    $('.PGL-C4-List-Sel').data('situation', situation);
    $('.PGL-C4-List-Sel').data('goal', goal);

    $('.PGL-C4-List-Sel').removeClass('PGL-C4-Guide');
    $('.PGL-C4-List-Sel .C4-Text .PGL-C4-Input').val(title);
    $('.PGL-C4-List-Sel .C4-Text').popover('hide');
    $('.popover').css('display', 'none');

	changes = true ;
	
	// ###################### saving values - pradeep 
	title_save(this);
	//selecting newly added item
	select_pg_add($('.PGL-C4 .PGL-C4-List-Sel'));
	
}

function text_save(section) {

    var textfield;

    if (section == 'problem') {
        textfield = $('.PGL-TextProb');
        textfield.data('original', textfield.val());
        $('.PGL-C4-List-Sel').data('problem', textfield.val());
    }
    if (section == 'situation') {
        textfield = $('.PGL-TextSit');
        textfield.data('original', textfield.val());
        $('.PGL-C4-List-Sel').data('situation', textfield.val());
    }
    if (section == 'goal') {
        textfield = $('.PGL-TextGoal');
        textfield.data('original', textfield.val());
        $('.PGL-C4-List-Sel').data('goal', textfield.val());
    }

    changes = true ;

    textfield.parent().children('.PGL-TextBoxButtonsEdit').addClass('visOFF');       
}

function text_undo(section) {

    var textfield;

    if (section == 'problem') {
        textfield = $('.PGL-TextProb');
        textfield.val(textfield.data('original'));
    }
    if (section == 'situation') {
        textfield = $('.PGL-TextSit');
        textfield.val(textfield.data('original'));
    }
    if (section == 'goal') {
        textfield = $('.PGL-TextGoal');
        textfield.val(textfield.data('original'));
    }

    textfield.parent().children('.PGL-TextBoxButtonsEdit').addClass('visOFF');
}

function title_undo() {
    $('.PGL-SelectedBut').addClass('visOFF');
    $('.PGL-C4-Input').attr('readonly', 'readonly');
    $('.PGL-C4-Input').hide();
    $('.PGL-C4-Input-Span').show();
    
    $(".PGL-C4-Input").each(function () {
        $(this).val($(this).parent().parent().data('title'));
    });
}

function title_save(evt) {

    changes = true ;

    var input = $('.PGL-C4-List-Sel').children().children('.PGL-C4-Input');
    
    //fix
    if(input.parent().find('span').length == 0)
    { input.parent().prepend("<span class='PGL-C4-Input-Span'>" + input.val() + "</span>");}
    else
    { 
        
        input.parent().find('.PGL-C4-Input-Span').html(input.val());
    }
  
    
    $('.PGL-C4-List-Sel').data('title', input.val());
    title_undo();
    
    /*if ( changes ){
        save_changes();
    }*/
        
    var title = $('.PGL-C4-List-Sel').data('title');
    var problem = $('.PGL-C4-List-Sel').data('problem');
    var situation = $('.PGL-C4-List-Sel').data('situation');
    var goal = $('.PGL-C4-List-Sel').data('goal');
    var id = $('.PGL-C4-List-Sel').attr('id');
    
    if(!id){
       id = 0; 
    }
        
     $.ajax({
        url: "<?php echo $ROOT; ?>/window/pg/saveprbgl",
        type: 'POST',
        dataType: 'json',
        async: false,
        data: { 
            id: id,
            title: title,
            problem: problem,
            situation: situation,
            goal: goal
        },
        success: function (data) {
            if (data.status == 'success') {
                $('.PGL-C4-List-Sel').attr('id', data.id);
                $('.PGL-C4-List-Sel').addClass('PBGL'+data.id);
				 
				$('.PGL-C4-List-Sel').attr('data-title', title);
				$('.PGL-C4-List-Sel').attr('data-problem', problem);
				$('.PGL-C4-List-Sel').attr('data-situation', situation);
				$('.PGL-C4-List-Sel').attr('data-goal', goal);
				
				$('.listClose').popover({
                    content: $('#click_popOverBox').html(),
                    html: true,
                    placement: 'bottom',
                    trigger: 'click'
                });
				
				$('.listClose').on('click', function()
				{
					$('.tooltip').hide();
				});
				
                //fix
                $('.PGL-C4-Input').hide();
                $('.PGL-C4-Input-Span').show();
                
            }
        }
     });
}

function save_changes() {

    /*var activities = [];

    unselect_pg();

    $(".PGL-C4-List").each(function (index) {
        activities.push({
            title: $(this).data('title'),
            problem: $(this).data('problem'),
            situation: $(this).data('situation'),
            goal: $(this).data('goal')
        });
    });

    $.ajax({
        url: "<?php echo $ROOT; ?>/window/pg/update",
        type: 'POST',
        dataType: 'json',
        async: false,
        data: { activities: activities },
        success: function (data) {
            if (data.status == 'success') {
                $("div.PGL-C4-List:last-child").attr('id', data.id);
            }
        }
    });*/

}

function remPopover() {    
    $('.listClose').popover('toggle');
    
    $('.popover.fade.bottom').each(function() {
        $(this).remove();
    });

    $('.popover.fade.top').each(function() {
        $(this).remove();
    });

    $('.popover.fade.left').each(function() {
        $(this).remove();
    });

    $('.popover.fade.right').each(function() {
        $(this).remove();
    });
    
    $('.listClose').popover({
        content: $('#click_popOverBox').html(),
        html: true,
        placement: 'bottom',
        trigger: 'click'
    });
}

$('#prbglsortable').sortable({
    connectWith: '#prbglsortable',
    placeholder: 'PrblmgoalPlaceholder',
    start: function(event,ui)
    {
       
    },
    stop: function( event, ui) { 
        
        var sorted = $('#prbglsortable').sortable('toArray').toString();

        //fix
        if($('.PGL-SelectedBut').is(":visible"))
        {
            $('.PGL-C4-List-Sel input').trigger("click");
        }
        
        // update sorted order
        $.ajax({
            url: "<?php echo $ROOT; ?>/window/pg/updatesort",
            type: 'POST',
            dataType: 'json',
            async: false,
            data: { sort: sorted },
            success: function (data) {
                if (data.status == 'success') {
                    
                } 
            }
        });
    }
});

$('#ModalProblemGoal').on('hidden.bs.modal', function () {
    if ( changes ){
        //save_changes();
    }
})

// pradeep for removing extra click on save and edit
function select_pg_add(pgl_c4_list) {
	
	$('.PGL-ProbIconDis').removeClass('PGL-ProbIconDis').addClass('PGL-ProbIcon');
    $('.PGL-TextProb').removeAttr('readonly');
    $('.PGL-TextProb').val(pgl_c4_list.data('problem'));
    $('.PGL-TextProb').data('original', pgl_c4_list.data('problem'));

    $('.PGL-SitIconDis').removeClass('PGL-SitIconDis').addClass('PGL-SitIcon');
    $('.PGL-TextSit').removeAttr('readonly');
    $('.PGL-TextSit').val(pgl_c4_list.data('situation'));
    $('.PGL-TextSit').data('original', pgl_c4_list.data('situation'));

    $('.PGL-GoalIconDis').removeClass('PGL-GoalIconDis').addClass('PGL-GoalIcon');
    $('.PGL-TextGoal').removeAttr('readonly');
    $('.PGL-TextGoal').val(pgl_c4_list.data('goal'));
    $('.PGL-TextGoal').data('original', pgl_c4_list.data('goal'));

    pgl_c4_list.removeClass('PGL-C4-List').addClass('PGL-C4-List-Sel');
    $('<div class="PGL-C4-Selected"></div>').insertBefore(pgl_c4_list.children('.C4-Text'));

    pgl_c4_list.children().children('.PGL-C4-Input').removeAttr('readonly');

  
    $('.PGL-SelectedBut').removeClass('visOFF');
	
}


</script>
