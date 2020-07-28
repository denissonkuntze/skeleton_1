<?php

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\ViewHelper\FwLayout;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();
        $layout->enablePageHeader('Biblioteca de exemplos do framework');

        return new ViewModel();

    }

}
