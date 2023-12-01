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
    private $Slist = 0;
    private $Rlist = 0;

    private $Type = 0;
    private $DCity = []; // make it array
    private $ACity = []; // make it array
    private $DDate = []; // make it array
    private $RDate = []; // make it array
    private $Price = []; // make it array
    private $Totalprice = 0;

    private $progress_bar = 0;

    public function clearArrays() {
        $this->DCity = [];
        $this->ACity = [];
        $this->DDate = [];
        $this->RDate = [];
        $this->Price = [];
    }

    public function showData() {
        echo "Personal Information:\n";
        echo "First Name: " . $this->Fname . "<br>";
        echo "Middle Name: " . $this->Mname . "<br>";
        echo "Last Name: " . $this->Lname . "<br>";
        echo "ID Number: " . $this->IDnumber . "<br>";
        echo "Gender: " . $this->Gender . "<br>";
        echo "Date of Birth: " . $this->DOB . "<br>";
        echo "Age: " . $this->Age . "<br>";
        echo "Telephone: " . $this->Tel . "<br>";
        echo "Email: " . $this->Email . "<br>";

        echo "\nBooking Information:\n";
        echo "Type: " . $this->Type . "<br>";
        echo "Departure Cities: " . implode("<br>", $this->DCity) . "<br>";
        echo "Arrival Cities: " . implode("<br>", $this->ACity) . "<br>";
        echo "Departure Dates: " . implode("<br>", $this->DDate) . "<br>";
        echo "Return Dates: " . implode("<br>", $this->RDate) . "<br>";
        echo "Prices: " . implode("<br>", $this->Price) . "<br>";
        echo "Total Price: " . $this->Totalprice . "<br>";
        echo "SLIST " . $this->Slist . "<br>";
        echo "RLIST: " . $this->Rlist . "<br>";

        echo "\nOther Information:\n";
        echo "Progress Bar: " . $this->progress_bar . "<br>";
    }
    
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
        $this->calculateAge();
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
        $this->Age = $ageInYears;
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

    // Getter and Setter for Slist
    public function getSlist()
    {
        return $this->Slist;
    }

    public function setSlist($slist)
    {
        $this->Slist = $slist;
    }

    // Getter and Setter for Rlist
    public function getRlist()
    {
        return $this->Rlist;
    }

    public function setRlist($Rlist)
    {
        $this->Rlist = $Rlist;
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
    public function getDCity($index) {
        if (isset($this->DCity[$index])) {
            return $this->DCity[$index];
        } else {
            return null;  // or handle the case when the index is out of bounds
        }
    }

    public function setDCity($DCity)
    {
        $this->DCity[] = $DCity;
    }

    // Getter and Setter for ACity
    public function getACity($index) {
        if (isset($this->ACity[$index])) {
            return $this->ACity[$index];
        } else {
            return null;  // or handle the case when the index is out of bounds
        }
    }

    public function setACity($ACity)
    {
        $this->ACity[] = $ACity;
    }

    // Getter and Setter for DDate
    public function getDDate($index) {
        if (isset($this->DDate[$index])) {
            return $this->DDate[$index];
        } else {
            return null;  // or handle the case when the index is out of bounds
        }
    }

    public function setDDate($DDate)
    {
        $this->DDate[] = $DDate;
    }

    // Getter and Setter for RDate
    public function getRDate($index) {
        if (isset($this->RDate[$index])) {
            return $this->RDate[$index];
        } else {
            return null;  // or handle the case when the index is out of bounds
        }
    }

    public function setRDate($RDate)
    {
        $this->RDate[] = $RDate;
    }

    // Getter and Setter for Price
    public function getPrice($index) {
        if (isset($this->Price[$index])) {
            return $this->Price[$index];
        } else {
            return null;  // or handle the case when the index is out of bounds
        }
    }

    public function setPrice($Price)
    {
        $this->Price[] = $Price;
        $this->calculateTotalprice();
    }

    // Getter and Setter for Totalprice
    public function getTotalprice()
    {
        return $this->Totalprice;
    }

    public function calculateTotalprice()
    {
        $this->Totalprice = array_sum($this->Price);
        return $this->Totalprice;
    }

    public function setTotalprice($Totalprice)
    {
        $this->Totalprice = $Totalprice;
    }
}
