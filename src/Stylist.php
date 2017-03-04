<?php

class Stylist {
    private $stylist_name;
    private $id;

    function __construct($stylist_name, $id = NULL)
    {
        $this->stylist_name = $stylist_name;
        $this->id = $id;
    }

    // getters and setters
    function getName()
    {
        return $this->stylist_name;
    }

    function setName($new_stylist_name)
    {
        $this->stylist_name = $new_stylist_name;
    }

    function getId()
    {
        return $this->id;
    }

    // functions

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stylists (stylist_name) VALUES ('{$this->getName()}');");
        $this->id = $GLOBALS['DB']->lastInsertId();

    }

    function delete()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
    }


    // static functions below
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM stylists;");
    }


    static function getAll()
    {
        $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
        $stylists = array();
        foreach($returned_stylists as $stylist)
        {
            $stylist_name = $stylist['stylist_name'];
            $id = $stylist['id'];
            $new_stylist = new Stylist($stylist_name, $id);
            array_push($stylists, $new_stylist);
        }
        return $stylists;
    }

    static function getStylistId($stylist_id)
    {

        $returned_stylist = $GLOBALS['DB']->query("SELECT * FROM stylists WHERE id = '{$stylist_id}'");
        $stylist = ' ';
        foreach ($returned_stylist as $stylist)
        {
            $stylist_name = $stylist['stylist_name'];
            $id = $stylist['id'];
            $stylist = New Stylist($stylist_name, $id);
        }
        return $stylist;
    }

}
 ?>
