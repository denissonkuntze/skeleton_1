<?php

namespace AppSamples\Controller\Samples;

use Fw\Lib\FwHelper;
use Laminas\View\Model\ViewModel;
use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\ViewHelper\FwLayout;

class LayoutController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '#');
        $layout->addBreadcrumb('layout', '/samples/layout/');

        return new ViewModel();

    }

    public function titleAction()
    {

        $layout = FwLayout::getInstance();

        $layout->enablePageHeader('Título da página');
        $layout->addBreadcrumb('samples', '#');
        $layout->addBreadcrumb('layout', '/samples/layout/');

        return false;

    }

    public function viewheaderfooterAction()
    {

        $layout = FwLayout::getInstance();

        $layout->enablePageHeader('Adiciona views no cabecalho e rodape');
        $layout->addBreadcrumb('samples', '#');
        $layout->addBreadcrumb('layout', '/samples/layout/');

        $layout->setViewHeader('app-samples/samples/layout/header', ['time' => FwHelper::getDateHourNow()]);
        $layout->setViewFooter('app-samples/samples/layout/footer', ['time' => FwHelper::getDateHourNow()]);

        return false;

    }

    public function titlebuttonsAction()
    {

        $layout = FwLayout::getInstance();

        $layout->enablePageHeader('Título da página com botões');
        $layout->addBreadcrumb('samples', '#');
        $layout->addBreadcrumb('layout', '/samples/layout/');

        // button
        // group button
        // dropdown
        // icon button

        $panelButtons = new \Fw\ViewHelper\Widgets\FwButtons();
        $panelButtons->addButton('Editar', 'btn-edit-tmp', 'success');
        $panelButtons->addButton('Excluir', 'btn-edit-tmp');

        $panelButtons->setGroupButton();
        $panelButtons->addGroupButton($panelButtons::ICON_EDIT, '');
        $panelButtons->addGroupButton($panelButtons::ICON_DELETE, '', 'danger');
        $panelButtons->addGroupButton('B', '');
        $panelButtons->addGroupButton('C', '');

        $panelButtons->setDropdownButton();
        $panelButtons->addButtonDropdown('Duplicar', 'btn-edit-tmp');
        $panelButtons->addButtonDropdown('divider', '');
        $panelButtons->addButtonDropdown('Excluir', 'btn-edit-tmp');

        $panelButtons->setDropdownButton('Menu', 'info');
        $panelButtons->addButtonDropdown('Anexar', 'btn-edit-tmp');

        $panelButtons->addButton('Mais', 'btn-edit-tmp');

        $layout->setBtnPageHeader($panelButtons->getHTML());

        return false;

    }

    public function sampleAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('samples', '#');
        $layout->addBreadcrumb('layout', '/samples/layout/');
        $layout->addBreadcrumb('exemplo simples', '#');

        return false;

    }

    public function alterhomeAction()
    {

        $layout = FwLayout::getInstance();
        $layout->setFirstBreadcrumbUrl('/fw');

        $layout->addBreadcrumb('samples', '#');
        $layout->addBreadcrumb('layout', '/samples/layout/');
        $layout->addBreadcrumb('alterar a URL do link raiz (inicial)', '#');

        return false;

    }

    public function addcssAction()
    {

        $layout = FwLayout::getInstance();
        $layout->setFirstBreadcrumbUrl('/fw');

        $layout->addBreadcrumb('samples', '#');
        $layout->addBreadcrumb('layout', '/samples/layout/');
        $layout->addBreadcrumb('adicionando arquivo .css ao layout', '#');

        $layout->addCssHead('../samples/css/test.addcss.css', $layout::CSS_TYPE_APP);

        $view = new ViewModel(['html' => 'adicionado arquivo test.addcss.css, veja q a cor do painel foi alterada']);
        $view->setTemplate('app-samples/samples/layout/add');

        return $view;

    }

    public function addjsAction()
    {

        $layout = FwLayout::getInstance();
        $layout->setFirstBreadcrumbUrl('/fw');

        $layout->addBreadcrumb('exemplos', '#');
        $layout->addBreadcrumb('layout', '/fw/samples/layout/');
        $layout->addBreadcrumb('adicionando arquivo .js ao layout', '#');

        $layout->addJsHead('../samples/js/test.addjs.js', $layout::JS_TYPE_APP);

        $view = new ViewModel(['html' => 'adicionado arquivo test.addjs.css, veja q abriu uma mensagen de alert() e um registro no console.log()']);
        $view->setTemplate('app-samples/samples/layout/add');

        return $view;

    }

    public function addjscodeAction()
    {

        $layout = FwLayout::getInstance();
        $layout->setFirstBreadcrumbUrl('/fw');

        $layout->addBreadcrumb('exemplos', '#');
        $layout->addBreadcrumb('layout', '/fw/samples/layout/');
        $layout->addBreadcrumb('adicionando código javascript ao layout', '#');

        $data = ['tst' => 1, 'name' => 'is the name', 'var' => "i's not"];
        $data = json_encode($data);

        $JS = <<<HTML
        alert('olá');
        console.log('inseriu código javascript no layout');     
        dataJson = {$data};
        console.log( dataJson );
HTML;


        $layout->addJavaScriptCode($JS);

        $view = new ViewModel(['html' => 'adicionado código javascript diretamente no código do layout, um alert foi executado e adicionada uma informação no console']);
        $view->setTemplate('app-samples/samples/layout/add');

        return $view;

    }

}