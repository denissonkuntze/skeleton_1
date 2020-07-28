<?php

namespace App\Controller;

use Laminas\View\Model\ViewModel;
use Laminas\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractAuthActionController #class IndexController extends AbstractActionController
{

    public function indexAction()
    {

        return new ViewModel();

    }

    /**
     * @Route("/cron/")
     */
    public function cronAction()
    {

        $contratsPeriods = new \App\Lib\SaasContracts\Periods();
        $contratsPeriods->cronVerify();

        $contractsBills = new \App\Lib\SaasContracts\Bills();
        $contractsBills->cronVerify();

        echo date('Y-m-d');
        die();

    }

}
