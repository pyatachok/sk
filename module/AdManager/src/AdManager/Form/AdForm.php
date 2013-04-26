<?php
// module/AdManager/src/AdManager/Form/AdForm.php:
namespace AdForm;
 
use Zend\Form\Form;

class AdForm extends Form 
{
    public function __construct($name = null)
    {
	parent::__construct('ad');
	
	$this->setAttribute('method', 'post');
	
	$this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'creation_date',
            'attributes' => array(
                'type'  => 'datetime',
		'min'  => '2010-01-01T00:00:00Z',
		'max'  => '2020-01-01T00:00:00Z',
		'step' => '1', // minutes; default step interval is 1 min
            ),
            'options' => array(
                'label' => 'Created',
            ),
        ));
        $this->add(array(
            'name' => 'publisher_id',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Publisher',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
	
    }
}