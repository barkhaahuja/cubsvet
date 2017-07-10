<?php

namespace controllers;

use models\User;
use utilities\LoggingUtility;

class SectionController {

    function section($f3) {
        $id = $f3->get('PARAMS.id');
        
        $this->aclSection($f3, $id);
        $this->getSectionTitle($f3, $id);
        $this->getSectionContent($f3, $id);
        $this->getAditionalParameters($f3, $id);

        if ($f3->get('security')->isDoctorGroup() || $f3->get('security')->isAdminGroup()) {
            $f3->set('showAdminButton', true);
        }

        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));
        $f3->set('is_first_login', $user->isFirstLogin());

        if ($user->isFirstLogin()) {
            //$user->first_login = 0;
            //$user->save();
        }

        $f3->set('currentStep', $user->getCurrentStep() ? : 1);
        $f3->set('currentSubStep', $user->getCurrentSubStep() ? : 0);
        $f3->set('completedStep', $user->getCompletedStep());
        $f3->set('isPhoneNo', $user->isPhoneNo($user));

        if (isset($_REQUEST['stp'])) {
            $step = $_REQUEST['stp'];
        } else {
            $step = 0;
        }

        $f3->set('trinNo', $step);

        if (isset($_SESSION['ldqz'])) {
            $f3->set('lodquz', 1);
        } else {
            $f3->set('lodquz', 0);
        }

        $due = $user->getDueQuiz();
        $f3->set('quiz_step', '/' . $due['id'] . '/' . $due['questionnaire_id'] . '/' . $due['current_step']);

        $f3->set('content', "dashboard/section.$id.htm");
        if($user->group_id==5) //added just to test issue 
           $f3->set('isMasterAdmin', 1); //to resolve P095-287
        echo \Template::instance()->render('dashboard/__layout-dashboard.htm');
    }

    function aclSection($f3, $id) {

        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));
        $step = $user->getCurrentStep();

        $section = explode('.', $id);

        switch ($section[0]) {
            case 'library':
                if ($step == 0 or $step == 1) {
                    //$f3->reroute('/');
                }
                break;
        }
    }

    /**
     * Helper function
     * @param \Base $f3
     * @param int $id
     */
    function getSectionTitle($f3, $id) {

        $section = explode('.', $id);

        switch ($section[0]) {
            case 'library':
                $f3->set('section_title', 'Bibliotek');
                break;
            case 'settings':
                if ($section[1] == 'help') {
                    $f3->set('section_title', 'Hjælp');
                } else {
                    $f3->set('section_title', 'Indstillinger');
                }
                break;
            default:
                $f3->set('section_title', 'Section');
        }
    }

    /**
     * Helper function
     * @param \Base $f3
     * @param int $id
     */
    function getSectionContent($f3, $id) {

        $section = explode('.', $id);
        switch ($section[1]) {
            case 'profile':
                LoggingUtility::LogActivity("Viewed his own profile settings");
                $f3->set('user', $this->getUserData($f3));
                break;
            case 'notification':
                LoggingUtility::LogActivity("Viewed his own notification settings");
                $f3->set('user', $this->getUserData($f3));
                break;
        }
    }

    /**
     * Helper function
     * @param \Base $f3
     * @param int $id
     */
    function getAditionalParameters($f3, $id) {
        
        
        $section = explode('.', $id);

        if (isset($_REQUEST['stp'])) {
            $lnk = $_REQUEST['stp'];
        } else {
            $lnk = 1;
        }

        $user = new User($f3->get('DB'));
        $last_step = $user->get_last_step($f3->get('SESSION.id'));
        $user = $user->getById($f3->get('SESSION.id'));

        $currentStep = $user->getCurrentStep();
        $currentSubStep = $user->getCurrentSubStep();
        $completedStep = $user->getCompletedStep();
        $stepA = $user->stepA;
        $stepB = $user->stepB;
        $step6 = $user->step6;
        $stepa_status = $user->stepa_status;
        $stepb_status = $user->stepb_status;
        $step6_status = $user->step6_status;

        //echo $stepa_status . '#####' . $stepb_status . '#####' . $step6_status;
        if ($currentStep >= $completedStep) {
            $step = $currentStep;
        } else {
            $step = $completedStep;
        }
        $currentStep = $step;
       
        //$step = $currentStep;

        $actual_step = $currentStep . '.' . $currentSubStep;

        switch ($section[0]) {
            case 'library':
                switch ($section[1]) {
                    case 'video':
                        $videos = array();
                        $scanned_directory = array_diff(scandir('assets/videos'), array('..', '.'));
                        foreach ($scanned_directory as $file) {
                            $videos[] = array(
                                'name' => substr($file, 0, -4),
                                'step' => substr($file, 0, 1),
                                'file' => 'app/data/videos/' . $file
                            );
                        }
                        $f3->set('library_videos', $videos);
                        break;
                    case 'pdf' :
                        $pdfs = array();

                        if ($lnk == 2) {
                            $pdf_path = 'assets/pdfs/lister';
                        } else {
                            $pdf_path = 'assets/pdfs/resumeer';
                        }

                        if ($lnk == 1) {
                            if ($dh = opendir($pdf_path)) {
                                $img_path = '';
                                $videos = array();
                                
                              
                                while (($file = readdir($dh)) !== false) {
                                    
                                    if (substr($file, -3) == 'pdf') {
                                    
                                        $pdf_step = substr($file, 4, -4);
                                       
                                       
                                        // deepanshu logic
                                       
                                        if((  ($pdf_step < floor($currentStep))  || ($completedStep == 5)  ) && ($pdf_step <= 5) && is_numeric($pdf_step))
                                        {
                                            
                                            $img_path = 'assets/pdfs/thumbnails/Trin' . substr($file, 4, -4) . '.png';

                                            $videos[] = array(
                                                'name' => substr($file, 0, -4),
                                                'step' => substr($file, 4, -4),
                                                'pdfimg' => $img_path,
                                                'file' => $pdf_path . '/' . $file
                                            );
                                        }
                                        
                                        else if($stepa_status && $pdf_step == "A")
                                        {
                                            $img_path = 'assets/pdfs/thumbnails/Trin' . substr($file, 4, -4) . '.png';

                                            $videos[] = array(
                                                'name' => substr($file, 0, -4),
                                                'step' => substr($file, 4, -4),
                                                'pdfimg' => $img_path,
                                                'file' => $pdf_path . '/' . $file
                                            );
                                        }
                                        else if($stepb_status && $pdf_step == "B")
                                        {
                                            $img_path = 'assets/pdfs/thumbnails/Trin' . substr($file, 4, -4) . '.png';

                                            $videos[] = array(
                                                'name' => substr($file, 0, -4),
                                                'step' => substr($file, 4, -4),
                                                'pdfimg' => $img_path,
                                                'file' => $pdf_path . '/' . $file
                                            );
                                        }
                                        else if($step6_status && $pdf_step == "6")
                                        {
                                            $img_path = 'assets/pdfs/thumbnails/Trin' . substr($file, 4, -4) . '.png';

                                            $videos[] = array(
                                                'name' => substr($file, 0, -4),
                                                'step' => substr($file, 4, -4),
                                                'pdfimg' => $img_path,
                                                'file' => $pdf_path . '/' . $file
                                            );
                                        }
                                        
                                        // end
                                        
                                      
                                    }
                                }
                               
                                
                                closedir($dh);

                                $pdffiles = array();
                                foreach ($videos as $k => $v) {
                                    $pdffiles[$k] = $v['step'];
                                }


                                array_multisort($pdffiles, SORT_ASC, $videos);
                            }
                        }

                        if ($lnk == 2) {
                            if ($dh = opendir($pdf_path)) {
                                $img_path = '';
                                $videos = array();
                                while (($file = readdir($dh)) !== false) {

                                    if (substr($file, -3) == 'pdf') {
                                        $name_arr = explode('_', $file);

                                        if (strlen($name_arr[0]) > 4) {
                                            $pdf_step = substr($name_arr[0], 4, 1);
                                        } else {
                                            $pdf_step = $name_arr[0];
                                        }

                                        $imgstep = $pdf_step;
                                        
                                        /*
                                        if ($pdf_step == 'A') {
                                            $pdf_step = 6;
                                        }
                                        if ($pdf_step == 'B') {
                                            $pdf_step = 7;
                                        }
                                        */
                                        
                                        $img_path = 'assets/pdfs/thumbnails/Trin' . $imgstep . '.png';

                                        
                                         // deepanshu logic
                                        
                                        if(( ($pdf_step < floor($currentStep)) || ($completedStep == 5)) && ($pdf_step <= 5) && is_numeric($pdf_step))
                                        {
                                            $img_path = 'assets/pdfs/thumbnails/Trin' . $pdf_step . '.png';

                                           $videos[] = array(
                                            'name' => substr($file, 0, -4),
                                            'step' => $pdf_step,
                                            'pdfimg' => $img_path,
                                            'file' => $pdf_path . '/' . $file,
                                            );
                                        }
                                        else if($stepa_status && $pdf_step == "A")
                                        {
                                            $img_path = 'assets/pdfs/thumbnails/Trin' . $pdf_step . '.png';

                                            $videos[] = array(
                                            'name' => substr($file, 0, -4),
                                            'step' => $pdf_step,
                                            'pdfimg' => $img_path,
                                            'file' => $pdf_path . '/' . $file,
                                            );
                                        }
                                        else if($stepb_status && $pdf_step == "B")
                                        {
                                            $img_path = 'assets/pdfs/thumbnails/Trin' . $pdf_step . '.png';

                                            $videos[] = array(
                                            'name' => substr($file, 0, -4),
                                            'step' => $pdf_step,
                                            'pdfimg' => $img_path,
                                            'file' => $pdf_path . '/' . $file,
                                            );
                                        }
                                       
                                    }
                                }
                                closedir($dh);

                                $pdffiles = array();
                                foreach ($videos as $k => $v) {
                                    $pdffiles[$k] = $v['step'];
                                }

                                array_multisort($pdffiles, SORT_ASC, $videos);
                            }
                        }

                      
                        $f3->set('library_pdfs', $videos);
                        break;
                }
                break;
        }
    }

    /**
     * Helper function
     * @param \Base $f3
     * @internal param int $id
     * @return FALSE|object
     */
    function getUserData($f3) {
        $user = new \DB\SQL\Mapper($f3->get('DB'), 'user');

        return $user->findone(array('id=?', $f3->get('SESSION.id')));
    }

    function settingsprofile($f3) {
       
        if (isset($_REQUEST['stp'])) {
            $step = $_REQUEST['stp'];
        } else {
            $step = 0;
        }
        echo \Template::instance()->render('dashboard/section.settings.profile.htm');
    }

    /**
     * Helper function
     * @param \Base $f3
     * @param int $id
     */
    function getlibrarypdfs($f3, $id) {
        $user = $f3->get('SESSION.id');
        $step = $_REQUEST['stepno'];

        $pdfs = array();
        $pdfpath = 'app/data/pdfs/Trin' . $step . '/';

        $scanned_directory = array_diff(scandir($pdfpath), array('..', '.'));
        $steppdf = '';
        foreach ($scanned_directory as $file) {
            if (substr($file, -3) == 'pdf') {

                $pdffile = 'app/data/pdfs/Trin' . $step . '/' . $file;

                $steppdf .= '<div id="Dash-Box-Right">                   
                            <a href="' . $f3->get("ROOT") . '/' . $pdffile . '">
                                <div id="Dash-Thumbnail">
                                    <img src="' . $f3->get("ROOT") . '/' . $pdfpath . '/Trin' . $step . '.png" style="width: 120px;height: 80px; cursor: pointer;">
                                </div>
                            </a>' . substr($file, 0, -4) . '</div>';
            }
        }

        echo json_encode(array('status' => 'success', 'pdfdata' => $steppdf));
        exit;
    }

    function beforeRoute($f3) {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }

}
