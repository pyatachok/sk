<?php

namespace AdManager\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 
use AdManager\Entity\Ad;
/**
* Publisher.
*
* @ORM\Entity
* @ORM\Table(name="publisher")
*/
class Publisher implements InputFilterAwareInterface  {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;


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

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
	return get_object_vars($this);
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
			'name' => 'name',
			'required' => true,
			'filters' => array(
			    array('name' => 'StripTags'),
			    array('name' => 'StringTrim'),
			),
			
	    )));

	    $this->inputFilter = $inputFilter;
	}

	return $this->inputFilter;
    }

}