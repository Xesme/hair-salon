<?php

class Stylist {
    private $name;
    private $id;

    function __construct($name, $id = NULL)
    {
        $this->name = $name;
        $this->id = $id;
    }

    // getters and setters
    function getName()
    {
        return $this->name;
    }

    function setName($new_name)
    {
        $this->name = $new_name;
    }

    function getId()
    {
        return $this->id;
    }

    // functions

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO stylists (name) VALUES ('{$this->name}');");
        $this->id = $GLOBALS['DB']->lastInsertId();

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
            $name = $stylist['name'];
            $id = $stylist['id'];
            $new_stylist = new Stylist($name, $id);
            array_push($stylists, $new_stylist);
        }
        return $stylists;
    }
}
 ?>
