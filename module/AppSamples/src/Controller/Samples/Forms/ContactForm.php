<?php

namespace AppSamples\Controller\Samples\Forms;

use Laminas\Captcha;
use Laminas\Form\Element;
use Laminas\Form\Fieldset;
use Laminas\Form\Form;
use Laminas\InputFilter\Input;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator;

class ContactForm extends Form
{

    public function __construct( $data=null ) {

        parent::__construct('contact-form');

        $this->setAttribute('action', 'formpost');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class',  'form-class');

        $this->addInputFilter();

        // PreCreate a text element to capture the user name:
        $name = new Element('name');
        $name->setLabel('Your name');
        $name->setAttributes([
            'id' => 'name',
            'type' => 'text',
            'class' => 'form-control'
        ]);

        // PreCreate a text element to capture the user email address:
        $email = new Element('email');
        $email->setLabel('Your email address');
        $email->setAttributes([
            'id' => 'email',
            'type' => 'text',
            'class' => 'form-control'
        ]);

        if (isset($data['subject']) AND $data['subject'] == false) {
        } else {

            // PreCreate a text element to capture the message subject:
            $subject = new Element('subject');
            $subject->setLabel('Subject');
            $subject->setAttributes([
                'id' => 'subject',
                'type' => 'text',
                'class' => 'form-control'
            ]);

        }

        // PreCreate a textarea element to capture a message:
        $message = new Element\Textarea('message');
        $message->setLabel('Message');
        $message->setAttributes([
            'id' => 'message',
            #'type' => 'text',
            'class' => 'form-control'
        ]);

        // PreCreate a CAPTCHA:
        #$captcha = new Element\Captcha('captcha');
        #$captcha->setCaptcha(new Captcha\Dumb());
        #$captcha->setLabel('Please verify you are human');

        // PreCreate a CSRF token:
        $csrf = new Element\Csrf('security');
        $csrf->setOptions([
            'csrf_options' => [
                'timeout' => 120
            ]
        ]);

        // PreCreate a submit button:
        $send = new Element('add');
        $send->setValue('Submit');
        $send->setAttributes([
            'type' => 'submit',
        ]);

        // PreCreate the form and add all elements:
        #$form = new Form('contact');

        $this->add($name);
        $this->add($email);

        if (isset($subject)) {
            $this->add($subject);
        }

        $this->add($message);
        #$form->add($captcha);
        $this->add($csrf);
        $this->add($send);

    }

    private function addInputFilter()
    {

        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
                'name'     => 'name',
                'required' => true,
                'filters'  => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => Validator\StringLength::class,
                        'options' => [
                            'min' => 3,
                            'max' => 50
                        ],
                    ],
                ],
            ]
        );

        $inputFilter->add([
                'name'     => 'email',
                'required' => true,
                'filters'  => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                        'options' => [
                            'allow' => \Laminas\Validator\Hostname::ALLOW_DNS,
                            'useMxCheck' => false,
                        ],
                    ],
                ],
            ]
        );

        $inputFilter->add([
                'name'     => 'subject',
                'required' => true,
                'filters'  => [
                    ['name' => 'StringTrim'],
                    ['name' => 'StripTags'],
                    ['name' => 'StripNewlines'],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'min' => 1,
                            'max' => 128
                        ],
                    ],
                ],
            ]
        );

    }

}