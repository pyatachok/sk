<?php
// module/AdManager/src/AdManager/Controller/AdManagerController.php:

namespace AdManager\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager; 
use AdManager\Entity\Ad;

class AdManagerController extends AbstractActionController
{
    protected $adTable;
    
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function indexAction()
    {
//	$objectManager = $this
//	    ->getServiceLocator()
//	    ->get('Doctrine\ORM\EntityManager');
//	$ad = new \AdManager\Entity\Ad();
//	$ad->setCreationDate(date('Y-m-d', time()));
//	$ad->setPublisherId(1);
//	$objectManager->persist($ad);
//	$objectManager->flush();
//	die(var_dump($ad->getId())); 
	return new ViewModel(array(
	'ads' => $this->getEntityManager()->getRepository('AdManager\Entity\Ad')->findAll()
	));

	
	$ads = $this->getAdTable()->fetchAll();
	return new ViewModel(array('ads' => $ads));
	


	$objectManager->persist($user);

    die(var_dump($user->getId())); // yes, I'm lazy
	
    }
    
    

    public function getEntityManager()
    {
	if (null === $this->em)
	{
	    $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
	}
	return $this->em;
    }
    
    public function setEntityManager(EntityManager $em)
    {
	$this->em = $em;
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


