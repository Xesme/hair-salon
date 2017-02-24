<?php
class Client
{
    private $stylist;
    private $id;
    private $stylist_id;

    function __construct($stylist, $id = NULL, $stylist_id)
    {
        $this->stylist = $stylist;
        $this->id = $id;
        $this->stylist_id = $stylist_id;
    }

    // getters and setters

    function getClient()
    {
        return $this->stylist;
    }

    function setClient($new_stylist)
    {
        $this->stylist = $new_stylist;
    }
}
 ?>
