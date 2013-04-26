<?php
namespace AdManager\Model;
 
use AdManager\Model\PublisherTable;

class Ad
{
    public $id;
    public $creation_date;
    public $publisher_id;
 
    public function exchangeArray($data)
    {
        $this->id     = (isset($data['id'])) ? $data['id'] : null;
        $this->creation_date = (isset($data['creation_date'])) ? $data['creation_date'] : null;
        $this->publisher_id  = (isset($data['publisher_id'])) ? $data['publisher_id'] : null;
    }
}


