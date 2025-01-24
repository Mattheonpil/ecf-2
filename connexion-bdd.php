<?php



try {
     $bdd = new PDO('mysql:host=localhost;dbname=ecf_2', 'root', '' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
} catch (PDOExeption $e) {
    echo $e->getMessage();
}