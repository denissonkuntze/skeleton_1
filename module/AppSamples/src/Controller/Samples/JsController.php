<?php
/**
 * Created by PhpStorm.
 * User: Denisson.Kuntze
 * Date: 06/03/2017
 * Time: 10:15
 */

namespace AppSamples\Controller\Samples;

use Laminas\View\Model\ViewModel;
use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\ViewHelper\FwLayout;
use Fw\Lib\FwIR;
use Laminas\View\Model\JsonModel;

class JsController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('JavaScript', '#');
        $layout->enablePageHeader('Geral');

        #$layout->addJsHead( '../samples/js/js.js', $layout::JS_TYPE_APP );

        return new ViewModel();

    }

    public function ajaxGetPostAction()
    {

        $layout = FwLayout::getInstance();
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('JavaScript', '#');
        $layout->enablePageHeader('Ajax - GET e POST');

        return new ViewModel();
        
    }

    public function modalAction()
    {

        $layout = FwLayout::getInstance();
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('JavaScript', '#');
        $layout->enablePageHeader('Janela Modal');

        return new ViewModel();

    }

    public function modalGetPostAction()
    {

        $layout = FwLayout::getInstance();
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('JavaScript', '#');
        $layout->enablePageHeader('Janela Modal - GET e POST');

        return new ViewModel();

    }

    public function notificationAction()
    {

        $layout = FwLayout::getInstance();
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('JavaScript', '#');
        $layout->enablePageHeader('Notificações');

        return new ViewModel();

    }

    public function blockAction()
    {

        $layout = FwLayout::getInstance();
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('JavaScript', '#');
        $layout->enablePageHeader('Block');

        return new ViewModel();

    }

    public function getHtmlAction() {

        //sleep(1);
        usleep(300);

        echo 'Conteúdo HTML';
        exit;

    }

    public function modalPostFormAction() {

        if ($this->getRequest()->isPost() AND isset($_POST['_FW'])) {

            $ir = FwIR::getInstance();

            if (!empty($_POST['name'])) {
                $ir->addSuccessMsg('Sucesso! Name: '.$_POST['name']);
            } else {
                $ir->addErrorMsg('Erro! Informar o nome no fomrulário!');
            }

            return $ir->getResponseJsonHeader();

        }

        $layout = FwLayout::getInstance();
        $layout->setLayoutDisable();

        #$form = new \AppSamples\Controller\Samples\Forms\ContactForm;
        #$form->remove('add');

        $viewModel = new ViewModel();
        #$viewModel->setVariables(['form'=>$form]);
        #$viewModel->setTemplate('lib/listform/form');

        return $viewModel;

    }

    /*
    public function gethtmlautoAction()
    {

        //sleep(1);
        usleep(300);

        echo '<div class="alert alert-info">Este conteúdo abriu automaticamente via Ajax</div>';
        exit;

    }

    public function gethtmljsonAction()
    {

        sleep(2);

        $ir = FwIR::getInstance();
        $ir->setHtmlReturn('Conteúdo HTML que retorna via JSON');

        return $ir->getResponseJsonHeader();

    }

    public function gethtmlviewAction() {

        $layout = FwLayout::getInstance();
        $layout->setResponseTerminal();

        $view = new ViewModel();
        $view->setTerminal( true );

       return $view;

    }

    public function ajaxtimeAction() {

        sleep(5);

        exit;

    }

    public function actiongetAction() {

        if ($this->getRequest()->isPost()) {
            sleep(1);
        }

        $ir = FwIR::getInstance();

        if (rand(1, 2) == 1) {
            $ir->addSuccessMsg('Sucesso!');
        } else {
            $ir->addErrorMsg('Erro!');
            #$ir->setHeaderCode400();
        }

        return $ir->getResponseJsonHeader();

    }


    public function actionpostAction() {

        $ir = FwIR::getInstance();

        if ($this->getRequest()->isPost() AND isset($_POST['name'])) {

            sleep(1);

            if (!empty($_POST['name'])) {
                $ir->addSuccessMsg('Sucesso! Nome: '.$_POST['name']);
            } else {
                $ir->addErrorMsg('Erro! Nome não informado. Preencha o nome no formulário ...');
            }

        }

        return $ir->getResponseJsonHeader();

    }

    public function modalactionAction() {

        $ir = FwIR::getInstance();

        if (rand(1, 2) == 1) {
            $ir->addSuccessMsg('sucesso');
        } else {
            $ir->addErrorMsg('erro 1');
            $ir->setHeaderCode400();
        }

        return $ir->getResponseJsonHeader();

    }

    public function modalactionformAction() {

        $ir = FwIR::getInstance();

        #if ($this->getRequest()->isPost()) {
        if (isset($_POST['_FW'])) {

            if (rand(1, 2) == 1) {
                $ir->addSuccessMsg('sucesso');
            } else {
                $ir->addErrorMsg('erro 1');
                $ir->setHeaderCode400();
            }

        } else {

            $ir->setHtmlReturn('conteudo HTML');

        }

        return $ir->getResponseJsonHeader();

    }

    public function modalactionpostformAction() {

        if ($this->getRequest()->isPost() AND isset($_POST['_FW'])) {

            $ir = FwIR::getInstance();

            if (!empty($_POST['name'])) {
                $ir->addSuccessMsg('Sucesso! Name: '.$_POST['name']);
            } else {
                $ir->addErrorMsg('Erro! Informar o nome no fomrulário!');
            }

            return $ir->getResponseJsonHeader();

        }

        $layout = FwLayout::getInstance();
        $layout->setLayoutDisable();

        $form = new \AppSamples\Controller\Samples\Forms\ContactForm;
        $form->remove('add');

        $viewModel = new ViewModel();
        $viewModel->setVariables(['form'=>$form]);
        $viewModel->setTemplate('lib/listform/form');

        return $viewModel;

    }
    */

}
