<?php
class Client
{
    private $name;
    private $id;
    private $stylist_id;

    function __construct($name, $id = NULL, $stylist_id)
    {
        $this->name = $name;
        $this->id = $id;
        $this->stylist_id = $stylist_id;
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

    function getStylistId()
    {
        return $this->stylist_id;
    }

    function setStylistId($new_stylist_id)
    {
        $this->stylist_id = $new_stylist_id;
    }

    // functions

    function save()
    {
        $GLOBALS['DB']->exec("INSERT INTO clients (name, stylist_id) VALUES ('{$this->getName()}', {$this->getStylistId()});");
        $this->id = $GLOBALS['DB']->lastInsertId();
    }

    function delete()
    {
        $GLOBALS['DB']->exec("DELETE FROM clients WHERE id = {$this->getId()};");
    }

    function update($new_name, $new_stylist_id)
    {
        if ($new_name === '')
        {
            $new_name = $this->getName();
        }
        if ($new_stylist_id === '')
        {
            $new_stylist_id = $this->getStylistId();
        }

        $GLOBALS['DB']->exec("UPDATE clients SET name = '{$new_name}', stylist_id = {$new_stylist_id} WHERE id = {$this->getId()};");
        $this->setName(addslashes($new_name));
        $this->setStylistId($new_stylist_id);
    }

    // static functions
    static function deleteAll()
    {
        $GLOBALS['DB']->exec("DELETE FROM clients;");
    }

    static function getAll()
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients ORDER BY name;");
        $clients = array();
        foreach($returned_clients as $client)
        {
            $name = $client['name'];
            $id = $client['id'];
            $stylist_id = $client['stylist_id'];
            $new_client = new Client($name, $id, $stylist_id);
            array_push($clients, $new_client);
        }
        return $clients;
    }

    static function search($stylist_id)
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = $stylist_id;");
        $clients = array();
        foreach($returned_clients as $client)
        {
            $name = $client['name'];
            $id = $client['id'];
            $stylist_id = $client['stylist_id'];
            $new_client = new Client($name, $id, $stylist_id);
            array_push($clients, $new_client);
        }
        return $clients;
    }

    static function getClientById($client_id)
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE id = {$client_id};");
        $clients = array();
        foreach($returned_clients as $client)
        {
            $name = $client['name'];
            $id = $client['id'];
            $stylist_id = $client['stylist_id'];
            $new_client = new Client($name, $id, $stylist_id);
            array_push($clients, $new_client);
        }
        return $clients;
    }
}
 ?>
