<?php
class Client {
    private $name;
    private $id;

    function __construct($name, $id = NULL)
    {
        $this->name = $name;
        $this->id = $id;
    }

    function getName()
    {
        $this->name;
    }

    function setName($new_name)
    {
        $this->name = $new_name;
    }

    function getId()
    {
        $this->id;
    }

    function save()
    {
        
    }
}
 ?>
