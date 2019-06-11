<?php

//Создайте больницу, в которой будет главный врач - он сможет просмотреть всех пациентов ,
//лечащие врачи (например, хирург, терапевт, лор) - они могут просмотреть только своих пациентов
class ChiefDoctor extends TreatingDoctor
{
    public function getPatDoc(TreatingDoctor $doctor){

        foreach ($doctor->getPatients() as $patient) {
            var_dump('Врач '. $doctor->getName().' принимает пациента: '. $patient->getName().
                     '. Дата записи: '.$patient->getDate()->format("Y-m-d H:i:s"));
        }
    }
}
