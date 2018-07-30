<?php
/**
 * Created by PhpStorm.
 * User: dharmy-ko
 * Date: 7/27/2018
 * Time: 5:36 PM
 */


class User extends Account {
    private $firstname, $middlename, $lastname, $email, $phonenumber, $accountnumber, $balance, $password, $accounttype;

    public function __set($name,$value) {
        switch($name) { //this is kind of silly example, bt shows the idea
            case 'firstname':
                return $this->firstname = $value;
            case 'middlename':
                return $this->middlename = $value;
            case 'lastname':
                return $this->lastname = $value;
            case 'email':
                return $this->email = $value;
            case 'phonenumber':
                return $this->phonenumber = $value;
            case 'accountnumber':
                return $this->accountnumber = $value;
            case 'balance':
                return $this->balance = $value;
            case 'password':
                return $this->password = $value;
            case 'accounttype':
                return $this->$accounttype = $value;
        }
    }

    public function __get($name) {
        switch($name) {
            case 'firstname':
                return $this->firstname;
            case 'middlename':
                return $this->middlename;
            case 'lastname':
                return $this->lastname;
            case 'email':
                return $this->email;
            case 'phonenumber':
                return $this->phonenumber;
            case 'accountnumber':
                return $this->accountnumber;
            case 'balance':
                return $this->balance;
            case 'password':
                return $this->password;
            case 'accounttype':
                return $this->accounttype;
        }
    }

    public function getFullName(){
        return $this->firstname . ' '. $this->middlename . ', '. strtoupper($this->lastname);
    }

    public function firstname($value){
        return $this->firstname = $value;
    }

    public function lastname($value){
        return $this->lastname = $value;
    }
    public function middlename($value){
        return $this->middlename = $value;
    }
    public function password($value){
        return $this->password = $value;
    }
    public function balance($value){
        return $this->balance = $value;
    }
    public function accountnumber($value){

        return $this->accountnumber = $value;
    }
    public function email($value)
    {
        return $this->email = $value;
    }
    public function phonenumber($value)
    {
        return $this->phonenumber = $value;
    }
    public function accounttype($value)
    {
        return $this->accounttype = $value;
    }


    public function login($firstname, $password) {
        $this->firstname($firstname);
        $this->password($password);
        return true;
    }
}