<?php

namespace AppSamples\Controller\Samples\Forms;

use Fw\Lib\FwForm\ElementHidden;
use Fw\Lib\FwForm\ElementHtml;
use Fw\Lib\FwForm\ElementLegend;
use Fw\Lib\FwForm\ElementSelect;
use Fw\Lib\FwForm\FwForm;
use Fw\Lib\FwForm\ElementText;

use Laminas\Form\Element;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator;

class fwformview extends FwForm
{

    public function __construct() {

        parent::__construct();

		$this->addInputFilter();

		$name = new ElementText('name');
		$name->setLabel('Name',true)->addClass('class1')->addClass('class2');
        $name->startGridRow()->setGridColumns(12)->endGridRow();
		$this->addElement( $name );

        $email = new ElementText('email');
        $email->setLabel('Your email address',true);
        $email->startGridRow()->setGridColumns(6)->endGridRow();
        $email->setPlaceholder( 'informe seu email' );
        $this->addElement( $email );

        $html = new ElementHtml('teste_html','<div class="alert alert-info">alert</div>');
        $this->addElement( $html );

        $legend = new ElementLegend('legend','Ok. Isso é o titulo','icon-reading');
        $this->addElement( $legend );

        $selectfw = new ElementSelect('language');
        $selectfw->setEmptyOption('Selecione');
        $selectfw->setValueOptions([
            '0' => 'French',
            '1' => 'English',
            '2' => 'Japanese',
            '3' => 'Chinese',
        ]);
        $selectfw->setLabel('Language',true);
        $this->addElement( $selectfw );

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
				'name'       => 'language',
				'required'   => true,
				'filters'    => [
					[ 'name' => 'ToInt' ],
				],
			]
		);

	}


}