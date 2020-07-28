<?php

namespace Fw\Controller\Samples\Forms;

use Laminas\Captcha;
use Laminas\Form\Element;
use Laminas\Form\Fieldset;
use Laminas\Form\Form;
use Laminas\InputFilter\Input;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator;

class CustomerForm extends Form
{

    public function __construct( $data=null ) {

        parent::__construct('contact-form');

        #$this->setAttribute('action', 'formpost');
        #$this->setAttribute('method', 'post');
        #$this->setAttribute('class',  'form-class');

        $this->addInputFilter();

        // PreCreate a text element to capture the user name:
        $name = new Element('name');
        $name->setLabel('Your name');
		$name->setLabelAttributes([
			'class' => 'bold'
		]);
        $name->setAttributes([
            'id'   => 'name',
            'type' => 'text',
            #'class' => 'form-control'
        ]);

        // PreCreate a text element to capture the user email address:
        $email = new Element('email');
        $email->setLabel('Your email address');
        $email->setAttributes([
            'id'    => 'email',
            'type'  => 'text',
            'class' => 'atx',
        ]);

        $this->add($name);
        $this->add($email);

    }

    private function addInputFilter()
    {

        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
                'name'       => 'name',
                'required'   => true,
                'filters'    => [
                    [ 'name' => 'StringTrim' ],
                ],
                'validators' => [
                    [
                        'name'    => Validator\StringLength::class,
                        'options' => [
                            'min' => 3,
                            'max' => 50,
                        ],
                    ],
                ],
            ]
        );

        $inputFilter->add([
                'name'       => 'email',
                'required'   => true,
                'filters'    => [
                    [ 'name' => 'StringTrim' ],
                ],
                'validators' => [
                    [
                        'name'    => 'EmailAddress',
                        'options' => [
                            'allow'      => \Laminas\Validator\Hostname::ALLOW_DNS,
                            'useMxCheck' => false,
                        ],
                    ],
                ],
            ]
        );

    }

}