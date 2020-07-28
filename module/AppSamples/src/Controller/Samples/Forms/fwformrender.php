<?php

namespace AppSamples\Controller\Samples\Forms;

use Fw\Lib\FwForm\ElementHtml;
use Fw\Lib\FwForm\ElementLegend;
use Fw\Lib\FwForm\ElementSelect;
use Fw\Lib\FwForm\ElementSubmit;
use Fw\Lib\FwForm\ElementText;
use Fw\Lib\FwForm\FwForm;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator;

class fwformrender extends FwForm
{

    public function __construct()
    {

        parent::__construct();

        $this->addInputFilter();

        $legend = new ElementLegend('legend', 'E aqui é um sub-titulo (legend)', 'icon-reading');
        $this->addElement($legend);

        $name = new ElementText('name');
        $name->setLabel('Name', true)->addClass('class1')->addClass('class2');
        $name->startGridRow()->setGridColumns(6);
        $this->addElement($name);

        $email = new ElementText('email');
        $email->setLabel('Your email address', true);
        $email->setGridColumns(6)->endGridRow();
        $email->setPlaceholder('informe seu email');
        $this->addElement($email);

        $html = new ElementHtml('teste_html', '<div class="alert alert-danger">este é um exemplo de HTML que pode ser adicionado</div>');
        $this->addElement($html);

        $selectfw = new ElementSelect('language');
        $selectfw->setEmptyOption('Selecione');
        $selectfw->setValueOptions([
            '0' => 'French',
            '1' => 'English',
            '2' => 'Japanese',
            '3' => 'Chinese',
        ]);
        $selectfw->setLabel('Language', true);
        $this->addElement($selectfw);

        $submit = new ElementSubmit('submit','Enviar','btn btn-success');
        $this->addElement($submit);

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

        $inputFilter->add([
                'name'     => 'language',
                'required' => true,
                'filters'  => [
                    [ 'name' => 'ToInt' ],
                ],
            ]
        );

    }

}