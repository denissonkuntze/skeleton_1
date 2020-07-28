<?php

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Abs\AbstractSamplesController;
use Laminas\View\Model\ViewModel;
use Fw\ViewHelper\FwLayout;


class ZendFrameworkController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('basic', '/fw/samples/basic/');
        $layout->enablePageHeader('Zend Framework');

        return new ViewModel();

    }

}
