<?php

namespace App\Controller;

use Fw\Lib\FwIR;
use Fw\ViewHelper\FwLayout;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Stdlib\RequestInterface as Request;
use Laminas\Stdlib\ResponseInterface as Response;

abstract class AbstractAppActionController extends AbstractActionController
{

    protected function getIR(): FwIR
    {
        return FwIR::getInstance();
    }

    /**
     * @return \Fw\ViewHelper\FwLayout
     */
    protected function getLayout(): FwLayout
    {
        return FwLayout::getInstance();
    }

    protected function isFwPost() : bool
    {
        if ($this->getRequest()->isPost() AND isset($_POST['_FW'])) {
            return true;
        } else {
            return false;
        }
    }

}
