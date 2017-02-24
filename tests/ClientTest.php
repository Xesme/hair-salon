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

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
        }
        
        function test_save()
        {
            // Arrange
            $name = "Marge Simpleson";
            $id = NULL;
            $new_client = new Client($name, $id);
            $new_client->save();
            var_dump($new_client);

            // Act
            $result = Client::getAll();

            // Assert
            $this->assertEquals($new_client, $result[0]);
        }
    }

 ?>
