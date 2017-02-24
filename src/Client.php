<?php
class Client {
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

    // functions

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO clients (name) VALUES ('{$this->name}');");
        $this->id = $GLOBALS['DB']->lastInsertId();

    }

    // static functions below

    static function getAll()
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
        $clients = array();
        foreach($returned_clients as $client)
        {
            $name = $client['name'];
            $id = $client['id'];
            $new_client = new Client($name, $id);
            array_push($clients, $new_client);
        }
        return $clients;
    }
}
 ?>
