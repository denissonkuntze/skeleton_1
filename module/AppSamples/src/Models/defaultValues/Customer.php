<?php
/**
 * Created by PhpStorm.
 * User: Denisson.Kuntze
 * Date: 13/04/2017
 * Time: 10:53
 */

namespace AppSamples\Models\DefaultValues;

use Fw\Lib\FwDefaultValuesAbstract;

class Customer extends FwDefaultValuesAbstract
{

    public function __construct()
    {

        $this->addValue('status', 0, 'Inativo', 'grey');
        $this->addValue('status', 1, 'Ativo', 'success');
        $this->addValue('status', 2, 'Lead', 'info');
        $this->addValue('status', 3, 'Prospect', 'blue');

        $this->addValue('process', 'A', 'Aguardando', 'grey');
        $this->addValue('process', 'I', 'Iniciado', 'success');
        $this->addValue('process', 'F', 'Finalizado', 'indigo');

        $this->addValue('local', 'A', 'Aguardando', 'grey');
        $this->addValue('local', 'B', 'Iniciado', 'success');

    }

}
