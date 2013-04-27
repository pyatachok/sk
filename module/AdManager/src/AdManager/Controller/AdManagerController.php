<?php
// module/AdManager/src/AdManager/Controller/AdManagerController.php:

namespace AdManager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use MyVendor\Model;

class AdManagerController extends AbstractActionController
{
    protected $adTable;




    public function indexAction()
    {
	$m = new Model();
	$m->yo();
	$ads = $this->getAdTable()->fetchAll();
	return new ViewModel(array('ads' => $ads));
    }
    
    
    public function getAdTable()
    {
	if (!$this->adTable)
	{
	    $sm = $this->getServiceLocator();
	    $this->adTable = $sm->get('AdManager\Model\AdTable');
	}
	return $this->adTable;
    }
    
    
    
    public function addAction()
    {
	
    }
    
    
    
    
}


