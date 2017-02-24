<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."src/Stylist.php";
    require_once __DIR__."src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname= hair_salon_test';
    $username = 'root';
    $password = 'password';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function test_save()
        {
            // Arrange
            $name = "Marge Simpleson";
            $id = NULL;
            $new_client = Client($name, $id);
            $new_client->save();

            // Act
            $result = Client::getAll();

            // Assert
            $result = ($new_client, $result);
        }
    }

 ?>
