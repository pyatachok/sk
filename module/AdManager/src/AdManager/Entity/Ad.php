<?php

namespace AdManager\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 
use AdManager\Entity\Publisher;
/**
* Advertisment.
*
* @ORM\Entity
* @ORM\Table(name="ad")
* @property datetime $creation_date
* @property integer $publisher_id
* @property AdManager\Entity\Publisher $publisher
* @property int $id
*/
class Ad implements InputFilterAwareInterface  {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="datetime") */
    protected $creation_date;
    
    /** @ORM\Column(type="integer") */
    protected $publisher_id;


    /* 
     * @ManyToOne(targetEntity="Publisher" inversedBy="ads")
     * @JoinColumn(name="publisher_id", referencedColumnName="id")
    */
    protected $publisher;
   
    
//    public function __construct()
//    {
//        $this->publisher = new \Doctrine\Common\Collections\ArrayCollection();
//    }
    
    // getters/setters
    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
	return $this->$property;
    }

    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
	$this->$property = $value;
    }


//    public function getPublisher() 
//    {
//	$em = $this->getDoctrine()->getEntityManager();
//	$publisher = $em->find('Application\Entity\Publisher', $this->publisher_id);
//        return $publisher;
//    }
    
    
    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
	return get_object_vars($this);
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
	$this->id = $data['id'];
	$this->artist = $data['artist'];
	$this->title = $data['title'];
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
	throw new \Exception("Not used");
    }
 
    public function getInputFilter()
    {
	if (!$this->inputFilter)
	{
	    $inputFilter = new InputFilter();

	    $factory = new InputFactory();

	    $inputFilter->add($factory->createInput(array(
			'name' => 'id',
			'required' => true,
			'filters' => array(
			    array('name' => 'Int'),
			),
	    )));

	    $inputFilter->add($factory->createInput(array(
			'name' => 'creation_date',
			'required' => true,
			'filters' => array(
			    array('name' => 'StripTags'),
			    array('name' => 'StringTrim'),
			),
			
	    )));

	    $inputFilter->add($factory->createInput(array(
			'name' => 'publisher_id',
			'required' => true,
			'filters' => array(
			    array('name' => 'Int'),
			),
	    )));

	    $this->inputFilter = $inputFilter;
	}

	return $this->inputFilter;
    }

}