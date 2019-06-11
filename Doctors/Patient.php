<?php


//И самих пациентов, которые будут записываться на приём к определённому врачу на определённое время.
class Patient
{
    private $name=null;
    private $doctor=null;
    private $date=null;


    public function __construct($name)
    {
        $this->name=$name;
    }


    public function setDoctor(TreatingDoctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function setDate(DateTime $date)
    {

        if (count($this->doctor->getPatients())>=1) {
            foreach ($this->doctor->getPatients() as $value) {

                if ($value->getDate() == $date) {
                    echo 'на это время уже есть пациент<br>';
                    continue;
                } else {
                    $this->doctor->addPatient($this);
                    $this->date = $date;
                    return;
                }
            }
        }else {
            $this->doctor->addPatient($this);
            $this->date = $date;
        }
    }
    public function getDate()
    {
        return $this->date;
    }



    public function getDoctor()
    {
        return $this->doctor;
    }

    public function getName(){
        return $this->name;
    }



}