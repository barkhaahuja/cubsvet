<?php

namespace controllers;

use models\User;

class WidgetTreatmentController
{
    function index($f3)
    {

        $user = new User($f3->get('DB'));
        $user = $user->getById($f3->get('SESSION.id'));

        // Steps Info
        // TODO implement in DB.
        $f3->set('steps', array(
            '1' => array(
                'title' => 'Introduktion',
                'sections' => array(
                    '1.0' => 'Velkommen',
                    '1.1' => 'Velkommen til Trin 1',
                    '1.2' => 'Hvordan viser depression sig?',
                    '1.3' => 'Den negative cirkel',
                    '1.4' => 'Den negative cirkel',
                    '1.5' => 'Mere om negative cirkler',
                    '1.6' => 'Negative automatiske tanker og generelle leveregler',
                    '1.7' => 'Problem- og målliste',
                    '1.8' => 'Problem- og målliste',
                    '1.9' => 'Dagens positive oplevelse',
                    '1.10' => 'Dagens positive oplevelse',
                    '1.11' => 'Opsummering',
                    '1.12' => 'Godt gået!')
            ),
            '2' => array(
                'title' => 'Aktivitetsregistrering',
                'sections' => array(
                    '2.0' => 'Velkommen',
                    '2.1' => 'Velkommen til Trin 2',
                    '2.2' => 'Aktivitetsliste',
                    '2.3' => 'Behageligt Aktivitetsliste',
                    '2.4' => 'Mønstre i depression',
                    '2.5' => 'Aktivitet Optagelse',
                    '2.6' => 'Aktivitets registrering',
                    '2.7' => 'Resumé',
                    '2.8' => 'Godt gået!'
                )
            ),
            '3' => array(
                'title' => 'Aktivitetsplanlægning',
                'sections' => array(
                    '3.0' => 'Velkommen',
                    '3.1' => 'Velkommen til Trin 3',
                    '3.2' => 'Udviddelse af aktivitetsliste',
                    '3.3' => 'Bryd den negative cirkel med tilfredsstillende aktiviteter',
                    '3.4' => 'Opdeling af opgaver',
                    '3.5' => 'At planlægge aktiviteter',
                    '3.6' => 'Aktivitetsplanlægning',
                    '3.7' => 'At dele en opgave op i mindre dele',
                    '3.8' => 'Aktivitetsplanlægning med opdeling af opgaver',
                    '3.9' => 'At kortlægge negative og selvkritiske tanker',
                    '3.10' => 'Registrering af negative automatiske tanker',
                    '3.11' => 'Opsummering af opgaver',
                    '3.12' => 'Godt gået!'
                    )
               ),
            '4' => array(
                'title' => 'Negative automatiske tanker',
                'sections' => array(
                    '4.0' => 'Velkommen',
                    '4.1' => 'Velkommen til Trin 4',
                    '4.2' => 'Negative automatiske tanker',
                    '4.3' => 'Typiske fejlfortolkninger',
                    '4.4' => 'Bryd den negative cirkel med tilfredsstillende aktiviteter',
                    '4.5' => 'Introduktion til øvelsen',
                    '4.6' => 'Udfordre negative, automatiske tanker',
                    '4.7' => 'Opsummering',
                    '4.8' => 'Godt gået!'
                )
            ),
            '5' => array(
                'title' => 'Udfordring af negative automatiske tanker',
                'sections' => array(
                    '5.0' => 'Velkommen',
                    '5.1' => 'Udfordring af negative tanker gennem ændring af handlemåde',
                    '5.2' => 'Udfordring af negative tanker gennem ændring af handlemåde',
                    '5.3' => 'Udfordring af negativ automatisk tanke',
                    '5.7' => 'Udfordring af negative tanker gennem ændring af handlemåde',
                    '5.8' => 'Godt gået!'
                )
            ),
            '6' => array(
                'title' => 'Leveregler',
                'sections' => array(
                    '6.0' => 'Introduktion til øvelsen',
                    '6.1' => 'Leveregler og strategier',
                    '6.2' => 'Kortlægning og analyse af uhensigtsmæssig leveregel',
                    '6.3' => 'Kortlægning og analyse af uhensigtsmæssig leveregel',
                    '6.4' => 'Kortlægning og analyse af uhensigtsmæssig leveregel',
                    '6.5' => 'Leveregler og strategier',
                    '6.6' => 'Udfordring af unyttig leveregel ved at ændre adfærd i praksis',
                    '6.7' => 'Udfordring af unyttig leveregel ved at ændre adfærd i praksis',
                    '6.8' => 'Udfordring af unyttig leveregel ved at ændre adfærd i praksis',
                    '6.9' => 'Adfærdseksperiment',
                    '6.13' => 'Evaluering af adfærdseksperiment',
                    '6.14' => 'Opsummering',
                    '6.15' => 'Godt gået!'
                 )
            ),
            '7' => array(
                'title' => 'Grublerier',
                'sections' => array(
                    '7.0' => 'Depressive grublerier',
                    '7.1' => 'Velkommen til Trin B',
                    '7.2' => 'Depressive grublerier',
                    '7.3' => 'Fordele og ulemper ved depressive grublerier',
                    '7.4' => 'Om at håndtere grublerier',
                    '7.5' => 'Beskrivelse og takling af unyttige grublerier',
                    '7.6' => 'Kortlægning af grubleri',
                    '7.7' => 'Afledning',                    
                    '7.8' => 'Liste over afledende aktiviteter',
                    '7.9' => 'Afledende aktiviteter - Evaluering',                
                    '7.13' => 'Velkommen tilbage',
                    '7.14' => 'Afledende aktiviteter Planlæg hvornår du vil gøre det',
                    '7.15' => 'Problemløsning',
                    '7.16' => 'Problemløsning Planlæg hvornår du vil gøre det',
                    '7.20' => 'Velkommen tilbage',
                    '7.21' => 'Problemløsning Planlæg hvornår du vil gøre det',
                    '7.22' => 'Grubletid',
                    '7.23' => 'Grubletid Planlæg hvornår du vil gøre det', 
                    '7.27' => 'Grubletid', 
                    '7.28' => 'Grubletid - Evaluering', 
                    '7.29' => 'Opsummering',
                    '7.30' => 'Godt gået!'
                )             
             ),
            '8' => array(
                'title' => 'Tilbagefalds forebyggelse',
                'sections' => array(
                    '8.0' => 'Forebyggelse af tilbagefald',
                    '8.1' => 'Forebyggelse af tilbagefald',
                    '8.2' => 'Vedligeholde det du har lært',
                    '8.3' => 'Kortlægning af nyttige redskaber',
                    '8.4' => 'Kortlægning af nyttige redskaber',
                    '8.5' => 'Din personlige forebyggelsesplan',
                    '8.6' => 'Kortlægning af risikosituationer/udløsende faktorer',
                    '8.7' => 'Risikosituationer og udløsende faktorer',
                    '8.8' => 'Kortlægning af tidlige tegn',
                    '8.9' => 'Tidlige advarselstegn',
                    '8.10' => 'Personlig handleplan ved risikosituationer og tidlige tegn på depression',
                    '8.11' => 'Personlig handleplan',
                    '8.12' => 'Afslutning',
                    '8.14' => 'Godt gået!'
                )
            )
        ));
        // End Steps Info;
        
         $uid=$f3->get('SESSION.id');
                
       $cdata = $f3->get('DB')->exec('SELECT stepA,stepB,step6,stepa_status,stepb_status,step6_status FROM user where id=' . $uid);
       if ($cdata) {
            
       foreach ($cdata as $key => $data);
         $aflag=$data['stepA'];
         $bflag=$data['stepB'];
         $flag6=$data['step6'];
         $stepa_status=$data['stepa_status'];
         $stepb_status=$data['stepb_status'];
         $step6_status=$data['step6_status'];
                 
         $mod=0;
         
         
            if ($aflag == 1 && $bflag == 2 && $flag6 == 3) { // a,b,c
                $mod = 1;     
            }else if ($aflag == 1 && $flag6 == 2 && $bflag == 3) { // a,c,b
                $mod = 2;
            }else if ($bflag == 1 && $aflag == 2 && $flag6 == 3) { // b,a,c
                $mod = 3;
            }else if ($bflag == 1 && $flag6 == 2 && $aflag == 3) { // b,c,a
                $mod = 4;
            }else if ($flag6 == 1 && $aflag == 2 && $bflag == 3) { // c,a,b
                $mod = 5;
            }else if ($flag6 == 1 && $bflag == 2 && $aflag == 3) { // c,b,a
                $mod = 6;
            }else if ($aflag == 1 && $bflag == 2 && $flag6 == 0) { // a,b
                $mod = 1;     
            }else if ($aflag == 1 && $flag6 == 2 && $bflag == 0) { // a,c
                $mod = 2;
            }else if ($bflag == 1 && $aflag == 2 && $flag6 == 0) { // b,a
                $mod = 3;
            }else if ($bflag == 1 && $flag6 == 2 && $aflag == 0) { // b,c
                $mod = 4;
            }else if ($flag6 == 1 && $aflag == 2 && $bflag == 0) { // c,a
                $mod = 5;
            }else if ($flag6 == 1 && $bflag == 2 && $aflag == 0) { // c,b
                $mod = 6;
            }else if ($aflag == 1 && $bflag == 0 && $flag6 == 2) { // a,c
                $mod = 1;     
            }else if ($aflag == 1 && $flag6 == 0 && $bflag == 2) { // a,b
                $mod = 2;
            }else if ($bflag == 1 && $aflag == 0 && $flag6 == 2) { // b,c
                $mod = 3;
            }else if ($bflag == 1 && $flag6 == 0 && $aflag == 2) { // b,a
                $mod = 4;
            }else if ($flag6 == 1 && $aflag == 0 && $bflag == 2) { // c,b
                $mod = 5;
            }else if ($flag6 == 1 && $bflag == 0 && $aflag == 2) { // c,a
                $mod = 6;
            }else if ($aflag == 0 && $bflag == 1 && $flag6 == 2) { // b,c
                $mod = 1;     
            } else if ($aflag == 0 && $flag6 == 1 && $bflag == 2) { // c,b
                $mod = 2;
            } else if ($bflag == 0 && $aflag == 1 && $flag6 == 2) { // a,c
                $mod = 3;
            }else if ($bflag == 0 && $flag6 == 1 && $aflag == 2) { // c,a
                $mod = 4;
            }else if ($flag6 == 0 && $aflag == 1 && $bflag == 2) { // a,b
                $mod = 5;
            }else if ($flag6 == 0 && $bflag == 1 && $aflag == 2) { // b,a
                $mod = 6;
            }else{ //other combination
                $mod=0;
            }
       }

        $f3->set('stepa', $aflag ? : 0);
         $f3->set('stepb', $bflag ? : 0);
          $f3->set('step6', $flag6 ? : 0);
           $f3->set('stepa_flag', $stepa_status ? : 0);
            $f3->set('stepb_flag', $stepb_status ? : 0);
             $f3->set('step6_flag', $step6_status ? : 0);
           $f3->set('mod', $mod ? : 0);
          
          
        $f3->set('current_step', $user->getCurrentStep() ? : 1);
        $f3->set('current_step_complete', $user->treatment_step ? : '1.0');
        $f3->set('current_sub_step', $user->getCurrentSubStep() ? : 0);

        echo \Template::instance()->render('dashboard/windows/window.behandeling.htm');
    }

    function beforeRoute($f3)
    {
        if (!$f3->get('security')->check_login())
            $f3->reroute('/login');
    }
}
