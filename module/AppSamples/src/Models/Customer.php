<?php

namespace AppSamples\Models;

use AppSamples\DbTables\TstCustomers;
use Fw\Lib\FwModelAbstract;

class Customer extends FwModelAbstract
{

    public function init()
    {

        $this->setTypeSourceDb();
        $this->setDbTable(new TstCustomers());

        $this->getFwModelSearch()->setQueryParamFields(['name','email']);

    }

}