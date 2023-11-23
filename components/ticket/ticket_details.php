<?php
class TicketDetails
{
    private $Fname = 0;
    private $Mname = 0;
    private $Lname = 0;
    private $IDnumber = 0;
    private $Gender = 0;
    private $DOB = 0;
    private $Age = 0; // replace zero to current date - DOB
    private $Tel = 0;
    private $Email = 0;

    private $Type = 0;
    private $DCity = []; // make it array
    private $ACity = []; // make it array
    private $DDate = []; // make it array
    private $RDate = []; // make it array
    private $Price = []; // make it array
    private $Totalprice = 0;

    private $progress_bar = 0;

    public function getProgressBar()
    {
        return $this->progress_bar;
    }

    public function setProgressBar($value)
    {
        $this->progress_bar = $value;
    }

    public function incrementProgressBar()
    {
        $this->progress_bar++;
    }

    public function decrementProgressBar()
    {
        if ($this->progress_bar > 0) {
            $this->progress_bar--;
        }
    }

    // Getter and Setter for Fname
    public function getFname()
    {
        return $this->Fname;
    }

    public function setFname($Fname)
    {
        $this->Fname = $Fname;
    }

    // Getter and Setter for Mname
    public function getMname()
    {
        return $this->Mname;
    }

    public function setMname($Mname)
    {
        $this->Mname = $Mname;
    }

    // Getter and Setter for Lname
    public function getLname()
    {
        return $this->Lname;
    }

    public function setLname($Lname)
    {
        $this->Lname = $Lname;
    }

    // Getter and Setter for IDnumber
    public function getIDnumber()
    {
        return $this->IDnumber;
    }

    public function setIDnumber($IDnumber)
    {
        $this->IDnumber = $IDnumber;
    }

    // Getter and Setter for Gender
    public function getGender()
    {
        return $this->Gender;
    }

    public function setGender($Gender)
    {
        $this->Gender = $Gender;
    }

    // Getter and Setter for DOB
    public function getDOB()
    {
        return $this->DOB;
    }

    public function setDOB($DOB)
    {
        $this->DOB = $DOB;
        // Update Age when setting DOB
        $this->Age = $this->calculateAge();
    }

    // Getter and Setter for Age
    public function getAge()
    {
        return $this->Age;
    }

    // The calculateAge method is used internally to calculate age based on DOB
    private function calculateAge()
    {
        // Calculate age based on DOB and return
        $dobTimestamp = strtotime($this->DOB);
        $currentTimestamp = time();
        $ageInSeconds = $currentTimestamp - $dobTimestamp;
        $ageInYears = floor($ageInSeconds / (365 * 24 * 60 * 60));
        return $ageInYears;
    }

    // Getter and Setter for Tel
    public function getTel()
    {
        return $this->Tel;
    }

    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }

    // Getter and Setter for Email
    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    // Getter and Setter for Type
    public function getType()
    {
        return $this->Type;
    }

    public function setType($Type)
    {
        $this->Type = $Type;
    }

    // Getter and Setter for DCity
    public function getDCity()
    {
        return $this->DCity;
    }

    public function setDCity($DCity)
    {
        $this->DCity[] = $DCity;
    }

    // Getter and Setter for ACity
    public function getACity()
    {
        return $this->ACity;
    }

    public function setACity($ACity)
    {
        $this->ACity[] = $ACity;
    }

    // Getter and Setter for DDate
    public function getDDate()
    {
        return $this->DDate;
    }

    public function setDDate($DDate)
    {
        $this->DDate[] = $DDate;
    }

    // Getter and Setter for RDate
    public function getRDate()
    {
        return $this->RDate;
    }

    public function setRDate($RDate)
    {
        $this->RDate[] = $RDate;
    }

    // Getter and Setter for Price
    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($Price)
    {
        $this->Price[] = $Price;
    }

    // Getter and Setter for Totalprice
    public function getTotalprice()
    {
        return $this->Totalprice;
    }

    public function setTotalprice($Totalprice)
    {
        $this->Totalprice = $Totalprice;
    }
}
