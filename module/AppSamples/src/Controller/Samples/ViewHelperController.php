<?php

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\Lib\FwHelper;
use Fw\Lib\FwIR;
use function realpath;
use const ROOT_PATH;
use Laminas\View\Model\ViewModel;

class ViewHelperController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('viewhelpers', '/fw/samples/viewhelper/');
        $layout->enablePageHeader('ViewHelpers');

        return new ViewModel();

    }

    public function fwTabsAction()
    {

        if (isset($_GET['ajax'])) {
            echo 'Conteúdo AJAX. ' . FwHelper::getDateHourNow(true);
            exit;
        }

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwTabs', '');
        $layout->enablePageHeader('FwTabs');

        $viewModel = new ViewModel();

        return $viewModel;

    }

    public function fwPanelsAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->enablePageHeader('FwPanels - exemplo ' . $_GET['id']);
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwPanels - exemplo ' . $_GET['id'], '');

        $viewModel = new ViewModel();
        $viewModel->setTemplate('app-samples/samples/view-helper/fw-panels-' . $_GET['id']);

        return $viewModel;

    }

    public function fwFormatValueAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->enablePageHeader('FwFormatValue');
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwFormatValue', '');

        $viewModel = new ViewModel();
        #$viewModel->setTemplate('app-samples/samples/view-helper/fw-panels-'.$_GET['id']);

        return $viewModel;

    }

    public function fwBadgeAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->enablePageHeader('FwBadge');
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwBadge', '');

        $viewModel = new ViewModel();
        #$viewModel->setTemplate('app-samples/samples/view-helper/fw-panels-'.$_GET['id']);

        return $viewModel;

    }

    public function fwWizardViewAction()
    {

        $viewModel = new ViewModel();
        $viewModel->setTemplate('app-samples/samples/view-helper/wizard/step_1');

        return $viewModel;

    }

    public function fwWizardAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();
        $layout->addJsHead('controllers/samples/tests.js', 1);

        $layout->enablePageHeader('FwWizard');
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwWizard', '');

        $step1 = new \Fw\ViewHelper\FwWizard\Step();
        $step1->setId('step_1');
        $step1->setClass('class-personalizado-1'); // define uma classe para o passo
        $step1->setName('Seu nome');
        $step1->setDescription('Informações sobre o passo que esta sendo feito');
        $step1->setClassList('alpha-primary');
        $step1->setViewModel($this, 'fwWizardViewAction');
        $step1->setUrlPOST('/samples/view-helper/fw-wizard-post/?test=1');

        $step2 = new \Fw\ViewHelper\FwWizard\Step();
        $step2->setId('step_2');
        $step2->setClass('class-personalizado-2');
        $step2->setName('Seu e-mail');
        $step2->setDescription('Informações sobre o passo que esta sendo feito');
        $step2->setTitleNameDescription('Informe o e-mail', 'As informacoes que constam aqui são diferentes. Aqui podem ter outras informações');
        $step2->setButtonNextLabel('Confirmar e-mail');
        $step2->setCallbackPostSuccessJs('callbackWizardTest');

        $step3 = new \Fw\ViewHelper\FwWizard\Step();
        $step3->setId('step_3');
        $step3->setName('Seu endereço');
        $step3->setBeforePostJs('wizardBeforeSend');
        $step3->setCallbackPostErrorJs('callbackWizardError');
        $step3->setCallbackPostSuccessJs('callbackWizardSuccess');

        $step4 = new \Fw\ViewHelper\FwWizard\Step();
        $step4->setId('step_4');
        $step4->setName('Informações de login');
        $step4->setDescription('Informações sobre o passo que esta sendo feito');
        $step4->setTitleNameDescription('Informe o e-mail', 'As informacoes que constam aqui são diferentes. Aqui podem ter outras informações');

        $wizard = new \Fw\ViewHelper\FwWizard\Wizard('wizard_test', $this->getRequest());
        $wizard->addStep($step1);
        $wizard->addStep($step2);
        $wizard->addStep($step3);
        $wizard->addStep($step4);
        $wizard->setViewPathSteps('app-samples/samples/view-helper/wizard/');
        $wizard->setUrlWizard('/samples/view-helper/fw-wizard/');
        $wizard->setUrlPOST('/samples/view-helper/fw-wizard-post/');
        $wizard->setButtonLast('Finalizar');
        $wizard->setButtonPrevious(true, 'Voltar');

        #$wizard->setFinishUrl('/samples/view-helper/fw-wizard/');
        $wizard->setFinishCallbackJsFunction('callbackWizardTest');
        #$wizard->setTitleSteps();
        #$wizard->setCountSteps();
        #$wizard->setProgressSteps();
        #$wizard->setStepsContentClass('card card-body');
        #$wizard->setCallbackErrorNotification(false,'callbackWizardTest');
        #$wizard->setButtonCancel('callbackWizardTest');
        #$wizard->setDisableButtonsHr();
        #$wizard->setDisableHeaderStepsHr();

        return $wizard->render();

    }

    public function fwWizardPostAction()
    {

        $IR = FwIR::getInstance();
        #$IR->addErrorMsg('erro');

        if ((int)$_POST['_STEP'] == 1) {
            if (empty($_POST['name'])) {
                #$IR->addErrorMsg('o nome deve ser informado');
            }
        }

        if ((int)$_POST['_STEP'] == 2) {
            if (empty($_POST['email'])) {
                #$IR->addErrorMsg('o email deve ser informado');
            }
            if (FwHelper::validateEmail($_POST['email']) == false) {
                #$IR->addErrorMsg('o email é inválido');
            }
        }

        if ((int)$_POST['_STEP'] == 3) {
            if (empty($_POST['address'])) {
                $IR->addErrorMsg('o endereço deve ser informado');
            }
        }

        return $IR->getResponseJsonHeader();

    }

    public function fwButtonsAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwButtons', '');
        $layout->enablePageHeader('FwButtons');

        return new ViewModel();

    }

    public function fwButtonsCardAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwButtonsCard', '');
        $layout->enablePageHeader('FwButtonsCard');

        return new ViewModel();

    }

    public function fwTitlesAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('FwTitles', '');
        $layout->enablePageHeader('FwTitles');

        return new ViewModel();

    }

    /*
    public function formatvalueAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('viewhelpers', '/samples/viewhelper/');
        $layout->addBreadcrumb('FwFormatValue', '');
        $layout->enablePageHeader('FwFormatValue');

        return new ViewModel();

    }

    public function formatvaluelabelAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('viewhelpers', '/samples/viewhelper/');
        $layout->addBreadcrumb('FwFormatValue', '');
        $layout->enablePageHeader('FwFormatValue');

        return new ViewModel();

    }

    public function panelsAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('viewhelpers', '/samples/viewhelper/');
        $layout->addBreadcrumb('FwPanel', '');
        $layout->enablePageHeader('FwPanel');

        $panel1 = new ViewModel();
        $panel1->setTemplate('app-samples/samples/view-helper/panels_panel1');

        $viewModel = new ViewModel();
        $viewModel->addChild($panel1, 'panel_1');

        return $viewModel;

    }

    public function medialistAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('viewhelpers', '/samples/viewhelper/');
        $layout->addBreadcrumb('FwMediaList', '');
        $layout->enablePageHeader('FwMediaList');

        return new ViewModel();

    }

    public function linktoAction()
    {

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('viewhelpers', '/samples/viewhelper/');
        $layout->addBreadcrumb('FwLinkTo', '');
        $layout->enablePageHeader('FwLinkTo');

        return new ViewModel();

    }

    public function formsearchAction()
    {

        if (isset($_GET['q'])) {

            $data[] = [];

            if (\substr(\mb_strtolower($_GET['q']), 1, 1) == 't') {
                $data[] = ['id' => 1, 'name' => 'test 1', 'type' => 'test 1'];
                $data[] = ['id' => 2, 'name' => 'test 2', 'type' => 'test 1'];
                $data[] = ['id' => 3, 'name' => 'test 3', 'type' => 'test 2'];
                $data[] = ['id' => 4, 'name' => 'test 4', 'type' => 'test 2'];
            }

            $IR = FwIR::getInstance();
            $IR->addRecords($data);

            return $IR->getResponseJsonHeader(true);

        }

        $layout = \Fw\ViewHelper\FwLayout::getInstance();

        $layout->enablePageHeader('Form Search');
        $layout->addBreadcrumb('samples', '/samples');
        $layout->addBreadcrumb('viewhelpers', '/samples/viewhelper/');
        $layout->addBreadcrumb('Form Search', '');

        return new ViewModel();

    }
    */

}
