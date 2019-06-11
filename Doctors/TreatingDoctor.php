<?php


class TreatingDoctor
{
    protected $name=null;
    protected $patients=[];
    public function __construct($name)
    {
        $this->name=$name;
    }

    public function addPatient(Patient $patient){
        array_push($this->patients, $patient);
    }


    public function getPatients(): array
    {
        return $this->patients;
    }

    public function getName() {
        return $this->name;
    }

}