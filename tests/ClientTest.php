<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_save()
        {
            // Arrange
            $stylist_name = "Beth";
            $id = NULL;
            $new_stylist = new Stylist($stylist_name, $id);
            $new_stylist->save();


            $name = "Marge Simpleson";
            $id2 = NULL;
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($name, $id2, $stylist_id);
            $new_client->save();


            // Act
            $result = Client::getAll();


            // Assert
            $this->assertEquals($new_client, $result[0]);

        }

        function test_getAll()
        {
            // Arrange
            $stylist_name = "Beth";
            $id = NULL;
            $new_stylist = new Stylist($stylist_name, $id);
            $new_stylist->save();


            $name = "Marge Simpleson";
            $id3 = NULL;
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($name, $id3, $stylist_id);
            $new_client->save();

            $name2 = "Mary Monroe";
            $id2 = NULL;
            $new_client2 = new Client($name2, $id2, $stylist_id);
            $new_client2->save();


            // Act
            $result = Client::getAll();


            // Assert
            $this->assertEquals([$new_client, $new_client2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $stylist_name = "Beth";
            $id = NULL;
            $new_stylist = new Stylist($stylist_name, $id);
            $new_stylist->save();


            $name = "Marge Simpleson";
            $id2 = NULL;
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($name, $id2, $stylist_id);
            $new_client->save();


            // Act
            Client::deleteAll();
            $result = Client::getAll();


            // Assert
            $this->assertEquals([], $result);
        }
    }
 ?>
