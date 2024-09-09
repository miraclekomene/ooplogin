<?php

class Dbh{

    protected function connect() { // use "protected" to enable other classes extend to the "Dbh" class
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO("mysql:host=localhost;dbname=ooplogin",$username, $password);
            return $dbh;
        } catch (PDOException $e) {
            //throw $th;
            print "Error!: ". $e->getMessage()."<br/>";
            die();
        }
    }
}