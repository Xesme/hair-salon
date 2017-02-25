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

        function test_find()
        {
            // Arrange
            $stylist_name = "Bruce";
            $new_stylist = new Stylist($stylist_name, $id);
            $new_stylist->save();

            $name = "Marge Simpleson";
            $id2 = NULL;
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($name, $id2, $stylist_id);
            $new_client->save();

            $name3 = "Mary Monroe";
            $id3 = NULL;
            $stylist_id3 = $new_stylist->getId();
            $new_client3 = new Client($name3, $id3, $stylist_id3);
            $new_client3->save();

            $name4 = "Patsy Dime";
            $id4 = NULL;
            $stylist_id4 = $new_stylist->getId();
            $new_client4 = new Client($name4, $id4, $stylist_id4);
            $new_client4->save();

            // Act
            $client_search = $new_client4->getId();
            $result = $new_client4->find($client_search);

            // Assert
            $this->assertEquals([$new_client4], $result);
        }

        function test_update()
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

            $new_name = "Margery Simpleson";
            $new_client_test = new Client($new_name, $id2, $stylist_id);

            // Act

            $result = Client::getAll();


            // Assert
            $this->assertEquals($new_client, $result[0]);
        }

        function test_delete()
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
            $new_client->delete();

            // Assert
            $this->assertEquals([], Client::getAll());
        }
    }
 ?>
