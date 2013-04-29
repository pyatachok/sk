<?php
namespace AdManager\Model;

use MyVendor\Model;
use AdManager\Model\PublisherTable;
use ApplicationTest\Bootstrap;

class Ad extends Model
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
    
    public function getPublisher()
    {
	$serviceManager = Bootstrap::getServiceManager();
	
	$publisherTable = $serviceManager->get('AdManager\Model\PublisherTable');
	return $publisherTable->getById($this->publisher_id);
    }
}


