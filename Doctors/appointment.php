<?php
require_once 'TreatingDoctor.php';
require_once 'ChiefDoctor.php';
require_once 'Patient.php';

$bigDoctor=new ChiefDoctor('Glavnuk');
$patient1=new Patient('Mike');
$patient2=new Patient('Roza');
$patient3=new Patient('Lili');
$patient4=new Patient('Alex');
$patient5=new Patient('Sam');
$patient6=new Patient('Amanda');
$patient7=new Patient('Carla');
$patient8=new Patient('Monro');



$patient1->setDoctor($bigDoctor);
$patient2->setDoctor($bigDoctor);
$patient3->setDoctor($bigDoctor);
$patient4->setDoctor($bigDoctor);
$patient5->setDoctor($bigDoctor);

$patient1->setDate(date_create("2012-10-30 11:30" ));;
$patient2->setDate(date_create("2012-10-30 11:30" ));;
$patient3->setDate(date_create("2012-12-30 14:00" ));;
$patient4->setDate(date_create("2012-10-30 12:00" ));;
$patient5->setDate(date_create("2012-10-30 12:30" ));;


foreach ($bigDoctor->getPatients() as $patient) {
    var_dump('Врач '. $bigDoctor->getName().' принимает пациента: '. $patient->getName().
             '. Дата записи: '.$patient->getDate()->format("Y-m-d H:i:s"));
}

$lor=new TreatingDoctor('Носовик');
$patient6->setDoctor($lor);
$patient6->setDate(date_create("2012-12-30 14:00"));
$patient7->setDoctor($lor);
$patient7->setDate(date_create("2012-12-30 12:00"));
$patient8->setDoctor($lor);
$patient8->setDate(date_create("2012-12-31 11:00"));


$bigDoctor->getPatDoc($lor);
