<?php
    abstract class Model {
        protected $pdo;
        function __construct(){
            $this->pdo =new PDO('mysql:host=localhost;dbname=auto_ecole','root','');
        }
        function __destruct(){
            $this->pdo=null;
        }
    }
?>