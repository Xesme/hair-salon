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

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_save()
        {
            // Arrange
            $stylist_name = "Lisa";
            $id = NULL;
            $new_stylist = new Stylist($stylist_name, $id);
            $new_stylist->save();


            // Act
            $result = Stylist::getAll();

            // Assert
            $this->assertEquals($new_stylist, $result[0]);
        }

        function test_getAll()
        {
            // Arrange
            $stylist_name = "Lisa";
            $id = NULL;
            $new_stylist = new Stylist($stylist_name, $id);
            $new_stylist->save();

            $stylist_name2 = "Bruce";
            $new_stylist2 = new Stylist($stylist_name2, $id);
            $new_stylist2->save();

            // Act
            $result = Stylist::getAll();

            // Assert
            $this->assertEquals([$new_stylist, $new_stylist2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $stylist_name = "Lisa";
            $id = NULL;
            $new_stylist = new Stylist($stylist_name, $id);
            $new_stylist->save();

            $stylist_name2 = "Bruce";
            $new_stylist2 = new Stylist($stylist_name2, $id);
            $new_stylist2->save();

            // Act
            Stylist::deleteAll();
            $result = Stylist::getAll();


            // Assert
            $this->assertEquals([], $result);
        }
    }

 ?>
