<?php

namespace AppSamples\Controller\Samples\Forms;

use Fw\Lib\FwForm\ElementCheckbox;
use Fw\Lib\FwForm\ElementHtml;
use Fw\Lib\FwForm\ElementLegend;
use Fw\Lib\FwForm\ElementPassword;
use Fw\Lib\FwForm\ElementRadio;
use Fw\Lib\FwForm\ElementSelect;
use Fw\Lib\FwForm\ElementSubmit;
use Fw\Lib\FwForm\ElementText;
use Fw\Lib\FwForm\FwForm;

#use Fw\Filter\DateToSQL;
#use Fw\Filter\PriceToSQL;

use Fw\Filter\Field;

use Laminas\InputFilter\InputFilter;
use Laminas\Validator;

class fwformmasks extends FwForm
{

    public function __construct()
    {

        parent::__construct();

        $this->addInputFilter();

        $integer = new ElementText('integer');
        $integer->setMaskInteger();
        $integer->setLabel('Integer');
        $integer->startGridRow()->setGridColumns(6);
        $this->addElement($integer);

        $number = new ElementText('number');
        $number->setMaskNumber();
        $number->setLabel('Number');
        $number->setGridColumns(6)->endGridRow();
        $this->addElement($number);

        $price = new ElementText('price');
        $price->setMaskPrice();
        $price->setLabel('Price');
        $price->setGridColumns(6)->startGridRow();
        $this->addElement($price);

        $phone = new ElementText('phone');
        $phone->setMaskPhone();
        $phone->setLabel('Phone');
        $phone->setGridColumns(6)->endGridRow();
        $this->addElement($phone);

        $postalCode = new ElementText('postalcode');
        $postalCode->setMaskPostalCode();
        $postalCode->setLabel('PostalCode');
        $postalCode->setGridColumns(6)->startGridRow();
        $this->addElement($postalCode);

        $date = new ElementText('date');
        $date->setMaskDate();
        $date->setLabel('Date');
        $date->setGridColumns(6)->endGridRow();
        $this->addElement($date);

        $cpf = new ElementText('cpf');
        $cpf->setMaskCPF();
        $cpf->setLabel('CPF');
        $cpf->setGridColumns(6)->startGridRow();
        $this->addElement($cpf);

        $cnpj = new ElementText('cnpj');
        $cnpj->setMaskCNPJ();
        $cnpj->setLabel('CNPJ');
        $cnpj->setGridColumns(6)->endGridRow();
        $this->addElement($cnpj);

        $checkbox = new ElementCheckbox('checkbox');
        $checkbox->setLabel('Checkbox');
        $checkbox->setCheckedValue(1)->setUncheckedValue(0);
        $checkbox->setGridColumns(6)->startGridRow();
        $this->addElement($checkbox);

        $radio = new ElementRadio('radio');
        $radio->setLabel('Radio');
        $radio->setValueOptions([1=>'Sim',2=>'Não']);
        $radio->setGridColumns(6)->endGridRow();
        $this->addElement($radio);

        $password = new ElementPassword('password');
        $password->setLabel('Password');
        $password->setGridColumns(6)->startGridRow()->endGridRow();
        $this->addElement($password);

        $legendDatePicker = new ElementLegend('legendDatePicker','Date Pickers');
        $this->addElement( $legendDatePicker );

        $pickerDate = new ElementText('picker_date');
        $pickerDate->setPickerDate()->setMaskDate();
        $pickerDate->setLabel('Picker Date');
        $pickerDate->setGridColumns(6)->startGridRow();
        $this->addElement($pickerDate);

        $pickerDateRange = new ElementText('picker_date_range');
        $pickerDateRange->setPickerDateRange();
        $pickerDateRange->setLabel('Picker Date Range');
        $pickerDateRange->setGridColumns(6)->endGridRow();
        $this->addElement($pickerDateRange);

        $legendMultiselect = new ElementLegend('legendMultiselect','Selects');
        $this->addElement( $legendMultiselect );

        $arrayOptions = ['1'=>'Opcao 1','2'=>'Opcao 2',3=>'Opcao 3'];

        $selectSimple = new ElementSelect('select_simple');
        $selectSimple->setLabel('Select Simple');
        $selectSimple->setValueOptions( $arrayOptions );
        $selectSimple->setGridColumns(6)->startGridRow();
        $this->addElement($selectSimple);

        $selectData = new ElementSelect('select_data');
        $selectData->setLabel('Select Data');
        $selectData->setGridColumns(6)->endGridRow();
        $this->addElement($selectData);

        $selectRemote1 = new ElementSelect('select_remote_1');
        $selectRemote1->setLabel('Select Remote 1');
        $selectRemote1->setGridColumns(6)->startGridRow()->endGridRow();
        $this->addElement($selectRemote1);

        $submit = new ElementSubmit('submitmasks','Enviar','btn btn-success');
        $this->addElement($submit);

    }

    private function addInputFilter()
    {

        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

//        $inputFilter->add([
//                'name'       => 'name',
//                'required'   => true,
//                'filters'    => [
//                    [ 'name' => 'StringTrim' ],
//                ],
//                'validators' => [
//                    [
//                        'name'    => Validator\StringLength::class,
//                        'options' => [
//                            'min' => 3,
//                            'max' => 50,
//                        ],
//                    ],
//                ],
//            ]
//        );
//
//        $inputFilter->add([
//                'name'       => 'email',
//                'required'   => true,
//                'filters'    => [
//                    [ 'name' => 'StringTrim' ],
//                ],
//                'validators' => [
//                    [
//                        'name'    => 'EmailAddress',
//                        'options' => [
//                            'allow'      => \Laminas\Validator\Hostname::ALLOW_DNS,
//                            'useMxCheck' => false,
//                        ],
//                    ],
//                ],
//            ]
//        );

        $inputFilter->merge( new Field\Integer('integer') );
        $inputFilter->merge( new Field\Number('number') );
        $inputFilter->merge( new Field\Price('price') );
        $inputFilter->merge( new Field\Phone('phone') );
        $inputFilter->merge( new Field\Alnum('postalcode') );
        $inputFilter->merge( new Field\CPF('cpf') );
        $inputFilter->merge( new Field\CNPJ('cnpj') );
        $inputFilter->merge( new Field\Date('date') );
        $inputFilter->merge( new Field\Date('picker_date') );


    }

}