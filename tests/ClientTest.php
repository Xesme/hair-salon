<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    // 
    // class StylistTest extends PHPUnit_Framework_TestCase
    // {
    //     function test_save()
    //     {
    //         // Arrange
    //         $stylist = "Lisa";
    //         $id = NULL;
    //         $new_stylist = Stylist($stylist, $id, $client_id)
    //         $new_stylist->save();
    //         // Act
    //
    //         // Assert
    //
    //     }
    // }


 ?>
