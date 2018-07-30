<?php

require_once ("connection.php");
class Account {
    private $balance, $accountnumber;

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'balance':
                return $this->balance = $value;
            case 'accountnumber':
                return $this->accountnumber = $value;
        }
    }

    public function __get($name) {
        switch($name) {
            case 'balance':
                return $this->balance;
            case 'accountnumber':
                return $this->accountnumber;

        }
    }

    public function depositMoney($value){
        return $this->balance += $value;
    }

    public function withdrawMoney($value){
        return $this->balance -= $value;
    }

//    public function balance($value){
//
//        return $this->balance = $value;
//    }
    public function accountnumber($value){
        return $this->accountnumber = $value;
    }



    function getbalance($custid) {
        global $connection;

        $query = "SELECT * FROM user WHERE user_id = $custid";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);

            return $this->balance = $row['balance'];
        }
    }




}









?>