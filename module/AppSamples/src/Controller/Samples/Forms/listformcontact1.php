<?php

namespace AppSamples\Controller\Samples\Forms;

use Fw\Lib\FwForm\ElementHtml;
use Fw\Lib\FwForm\ElementLegend;
use Fw\Lib\FwForm\ElementSelect;
use Fw\Lib\FwForm\ElementSubListForm;
use Fw\Lib\FwForm\ElementSubmit;
use Fw\Lib\FwForm\ElementText;
use Fw\Lib\FwForm\FwForm;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator;

class listformcontact1 extends FwForm
{

    public function __construct(array $data = null)
    {

        parent::__construct();

        $this->addInputFilter();

        $name = new ElementText('name');
        $name->setLabel('Name', true)->addClass('class1')->addClass('class2');
        $name->startGridRow()->setGridColumns(6);
        $this->addElement($name);

        $email = new ElementText('email');
        $email->setLabel('Your email address', true);
        $email->setGridColumns(6)->endGridRow();
        $email->setPlaceholder('informe seu email');
        $this->addElement($email);

        $phone = new ElementText('phone');
        $phone->setLabel('Phone', true);
        $phone->startGridRow()->setGridColumns(6)->endGridRow();
        $this->addElement($phone);


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
                'validators-' => [
                    [
                        'name'    => Validator\StringLength::class,
                        'options' => [
                            'min' => 5,
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