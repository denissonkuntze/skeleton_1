<?php

namespace AppSamples\Models;

use AppSamples\DbTables\TstCustomersContacts;
use Fw\Lib\FwModelAbstract;
use Fw\Filter\Field;
use Laminas\InputFilter\InputFilter;

class CustomerContacts extends FwModelAbstract
{

    public function init()
    {

        $this->setTypeSourceDb();
        $this->setDbTable(new TstCustomersContacts());

        #$this->getModelSearch()->addQueryParamFields( ['name'] );
        #$this->setJsonSchema( 'customer_contact.post.put',__DIR__ );
        #$this->setMethodInputFilter();

    }

    public function inputFilter()
    {

        $inputFilter = new InputFilter();

        $inputFilter->merge(new Field\Integer('id_customers', true));
        $inputFilter->merge(new Field\Name('name', true));
        $inputFilter->merge(new Field\Email('email', false));
        $inputFilter->merge(new Field\Alnum('phone', false));

        $this->setInputFilter($inputFilter);

    }

}