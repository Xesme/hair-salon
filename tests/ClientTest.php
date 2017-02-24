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

            // Act
            $result = Client::getAll();

            // Assert
            $this->assertEquals($new_client, $result[0]);
        }

        function test_getAll()
        {
            // Arrange
            $name = "Marge Simpleson";
            $id = NULL;
            $new_client = new Client($name, $id);
            $new_client->save();

            $name2 = "Mary Monroe";
            $new_client2 = new Client($name2, $id);
            $new_client2->save();

            // Act
            $result = Client::getAll();

            // Assert
            $this->assertEquals([$new_client, $new_client2], $result);
        }

        function test_delete()
        {
            // Arrange
            $name = "Marge Simpleson";
            $id = NULL;
            $new_client = new Client($name, $id);
            $new_client->save();

            $name2 = "Mary Monroe";
            $new_client2 = new Client($name2, $id);
            $new_client2->save();

            // Act
            Client::deleteAll();
            $result = Client::getAll();


            // Assert
            $this->assertEquals([], $result);
        }
    }

 ?>
