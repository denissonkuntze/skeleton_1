<?php

namespace Fw\Controller\Samples\Forms;

use Fw\Lib\FwForm\ElementHidden;
use Fw\Lib\FwForm\ElementHtml;
use Fw\Lib\FwForm\ElementLegend;
use Fw\Lib\FwForm\ElementSelect;
use Fw\Lib\FwForm\FwForm;
use Fw\Lib\FwForm\ElementText;

use Laminas\Form\Element;
use Laminas\InputFilter\InputFilter;
use Laminas\Validator;

class CustomerFwForm extends FwForm
{

    public function __construct() {

        parent::__construct();

		$this->addInputFilter();

		$name = new ElementText('name');
		$name->setLabel('Name',true)->addClass('class1')->addClass('class2');
		#$name->startColumn(6)->endColumn();
        $name->startGridRow()->setGridColumns(12)->endGridRow();
		$this->addElement( $name );

        $email = new ElementText('email');
        $email->setLabel('Your email address',true);
        $email->startGridRow()->setGridColumns(6)->endGridRow();
        $email->startDiv('class-div','id-div')->endDiv();
        $email->setHelpTextBottom( 'Mensagem de teste <a href="#">link</a>', 'class-add' );
        $email->setHelpTextTop( 'Mensagem de teste <a href="#">link</a>', 'class-add' );
        $email->startSection( 'Teste de section', 'Aqui vai as informacoes', true, 'class-section-add', 'id-section' )->endSection();
        $email->setPlaceholder( 'informe seu email' );
        $email->setMaskDate();
        $this->addElement( $email );

        $hidden = new ElementHidden('hidden');
        $this->addElement( $hidden );

        $html = new ElementHtml('teste_html','<div class="alert alert-info">alert</div>');
        $this->addElement( $html );

        $legend = new ElementLegend('legend_1','Ok. Isso é o titulo','icon-reading');
        $this->addElement( $legend );

        $selectfw = new ElementSelect('select_fw');
        $selectfw->setEmptyOption('Selecione');
        $selectfw->setValueOptions([
            '0' => 'French',
            '1' => 'English',
            '2' => 'Japanese',
            '3' => 'Chinese',
        ]);
        $selectfw->setLabel('Teste',true);

        $this->addElement( $selectfw );

		$select = new Element\Select('language');
		$select->setLabel('Which is your mother tongue?');
		$select->setEmptyOption('Selecione');
		$select->setValueOptions([
			'0' => 'French',
			'1' => 'English',
			'2' => 'Japanese',
			'3' => 'Chinese',
		]);
        $select->setAttributes([
			'id'    => 'language',
			'type'  => 'select',
		]);

		#$this->add($name);
		#$this->add($email);
		#$this->add($select);

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