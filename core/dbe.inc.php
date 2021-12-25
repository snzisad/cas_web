<?php
    
    function connect() {
        
        $mysql_host = 'localhost';
        $mysql_user = 'id8698077_zisad';
        $mysql_pass = 'zisad';

        $mysql_db = 'id8698077_cas_app';
    
    
        static $connection;

        if(!isset($connection)) {
        
            $connection = mysqli_connect($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
        }

        if($connection === false) {
            return mysqli_connect_error(); 
        }

        return $connection;
    }

    function error() {
        $connection = connect();
        return mysqli_error($connection);
    }

    function query($query) {

        $connection = connect();

        $result = mysqli_query($connection,$query);

        return $result;
    }

    function queryLastInsertedID($query) {

        $connection = connect();

        $result = mysqli_query($connection,$query);
        $lastID  = last_insert_id($connection,$result);

        return $lastID;
    }

    function fetchData($query) {
        $rows = array();
        $result = query($query);

        if($result === false) {
            return false;
        }
        try{
        
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            return $rows;
        }
        catch(Exception $e){
            echo($e->getMessage());
        }
    }

    function fetchDataWithID($query) {
        $result = query($query);
        $rows = array();
        if($result === false) {
            return false;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $rows = $row;
        }
        return $rows;
    }

   //function for login form
    function login($log_query) {
            $check = numRows($log_query);
            return $check;
    }

    function stripQuotes($strWords) {
        return str_replace("'", "''", $strWords);
    }
    
    function insertID() {
        $connection = connect();
        return (@mysqli_insert_id($connection));
    }
    
    //Function for load data in array list
    function loadData() {
        //
    }

    //Function for List Creation
    function createList() {
        //
    }

    //Read a CSV File
    function readCSV($csvFile) {
       $file_handle = fopen($csvFile, 'r');
       while (!feof($file_handle) ) {
          $line_of_text[] = fgetcsv($file_handle, 1024);
       }
       fclose($file_handle);
       return $line_of_text;
    }

    //Image Resize

    // Escape 
    function escape($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function numRows($result) {
        return (@mysqli_num_rows(query($result)));
    }
?>