<?php
/**
 * Created by PhpStorm.
 * User: Denisson.Kuntze
 * Date: 06/03/2017
 * Time: 17:28
 */

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\Lib\FwTable\FwTable;
use Fw\ViewHelper\FwLayout;
use Laminas\View\Model\ViewModel;

class TableController extends AbstractSamplesController
{

    public function indexAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');

        return new ViewModel();

    }

    public function simplesAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('simples', '/fw/samples/table/simples');

        $table = new FwTable();

        $table->addColumnHead('Id')->setWidth('35%');
        $table->addColumnHead('Nome');

        $table->addColumnBody('id');
        $table->addColumnBody('name');

        foreach ($this->getdata() AS $record) {
            $table->addRecord($record);
        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    private function getdata()
    {

        $data[] = ['id' => 1, 'name' => 'José', 'date' => date("Y-m-d H:i:s")];
        $data[] = ['id' => 2, 'name' => 'Maria', 'date' => date("Y-m-d H:i:s")];
        $data[] = ['id' => 3, 'name' => 'João', 'date' => date("Y-m-d H:i:s")];
        $data[] = ['name' => 'Marcos', 'date' => date("Y-m-d H:i:s")];
        $data[] = ['id' => 5, 'name' => 'Antonio', 'date' => date("Y-m-d H:i:s")];

        return $data;

    }

    public function noheaderAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('noheader', '/fw/samples/table/noheader');

        $table = new FwTable();
        $table->disableHead();

        $table->addColumnBody('id')->setWidth('35');
        $table->addColumnBody('name');

        foreach ($this->getdata() AS $record) {
            $table->addRecord($record);
        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function checkboxAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('checkbox', '/fw/samples/table/checkbox');

        $table = new FwTable();

        $table->addColumnHead('Id')->setWidth('25%');
        $table->addColumnHead('Nome');

        $table->addColumnBody('id');
        $table->addColumnBody('name');

        $table->setTableCheckbox();

        foreach ($this->getdata() AS $record) {

            if (isset($record["id"])) {
                if ($record["id"] == 2) {
                    $table->disableRecordCheckbox();
                }
                if ($record["id"] == 3) {
                    $table->checkCheckbox();
                }
            }

            $table->addRecord($record);

        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function urleditAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('com link para editar', '/fw/samples/table/urledit');

        $table = new FwTable();
        $table->setTableTableFormId('users');

        $table->addColumnHead('Id')->setWidth('25');
        $table->addColumnHead('Nome');

        $table->addColumnBody('id');
        $table->addColumnBody('name')->setUrlEditInline();

        foreach ($this->getdata() AS $record) {
            $table->addRecord($record);
        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function btnfunctiondeleteAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('com botão de função (delete)', '/fw/samples/table/btnfunctiondelete');

        $table = new FwTable();

        $table->addColumnHead('Id')->setWidth('25');
        $table->addColumnHead('Nome');

        $table->addColumnBody('id');
        $table->addColumnBody('name')->setUrlEditInline();

        foreach ($this->getdata() AS $record) {

            $table->addButtonActionDelete();

            $table->addRecord($record);

        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function btnfunctionAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('com botões de função personalizados', '/fw/samples/table/btnfunction');

        $table = new FwTable();
        $table->setBtnActionsWidth(120);

        $table->addColumnHead('Id')->setWidth('25');
        $table->addColumnHead('Nome');

        $table->addColumnBody('id');
        $table->addColumnBody('name')->setUrlEditInline();

        foreach ($this->getdata() AS $record) {

            $table->addButtonAction("", 'btn-config', 'Configurar');

            $table->addRecord($record);

        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function menuactionAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('com menu de ações', '/fw/samples/table/menuaction');

        $table = new FwTable();
        $table->setBtnActionsWidth(120);

        $table->addColumnHead('Id')->setWidth('25');
        $table->addColumnHead('Nome');

        $table->addColumnBody('id');
        $table->addColumnBody('name')->setUrlEditInline();

        foreach ($this->getdata() AS $record) {

            $table->addItemMenuAction("Editar", "btn-menu-editar");

            if (isset($record["id"])) {

                $table->addItemMenuAction("divider");
                $table->addItemMenuAction("Excluir", "btn-menu-excluir");

            }

            $table->addRecord($record);

        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function firstlastAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('class first, last', '/fw/samples/table/menuactionhtml');

        $table = new FwTable();
        $table->setRecordsPerPageAndTotal(5, count($this->getdata()));

        $table->addColumnHead('Id')->setWidth('25');
        $table->addColumnHead('Nome');

        $table->addColumnBody('id');
        $table->addColumnBody('name')->setUrlEditInline();

        foreach ($this->getdata() AS $record) {
            $table->addRecord($record);
        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function centerrightleftAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('alinhamento center, right, left das colunas', 'centerrightleft');

        $table = new FwTable();
        $table->setRecordsPerPageAndTotal(5, count($this->getdata()));

        $table->addColumnHead('Id')->setWidth('33%')->setAlignLeft();
        $table->addColumnHead('Nome')->setAlignCenter();
        $table->addColumnHead('Data')->setAlingRight();

        $table->addColumnBody('id')->setAlignLeft();
        $table->addColumnBody('name')->setAlignCenter();
        $table->addColumnBody('date')->setAlingRight();

        foreach ($this->getdata() AS $record) {
            $table->addRecord($record);
        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function formatfieldsAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('formatação das colunas: date, datetime, double, money, int, double-trace', 'formatfields');

        $table = new FwTable();

        $table->addColumnHead('Data')->setColumnTypeDate();
        $table->addColumnHead('Data Hora')->setColumnTypeDateTime();
        $table->addColumnHead('Double')->setColumnTypeDouble();
        $table->addColumnHead('Moeda')->setColumnTypeMoney();
        $table->addColumnHead('Int')->setColumnTypeInt();
        $table->addColumnHead('Double Trace')->setColumnTypeDoubleTrace();

        $table->addColumnBody('date')->setColumnTypeDate();
        $table->addColumnBody('datetime')->setColumnTypeDateTime();
        $table->addColumnBody('double')->setColumnTypeDouble();
        $table->addColumnBody('money')->setColumnTypeMoney();
        $table->addColumnBody('int')->setColumnTypeInt();
        $table->addColumnBody('double_trace')->setColumnTypeDoubleTrace();

        foreach ($this->getdata() AS $record) {

            $record['datetime']     = $record['date'];
            $record['double']       = 123.45;
            $record['money']        = 1234.57;
            $record['int']          = 123.00;
            $record['double_trace'] = $record['double'];

            if (isset($record['id'])) {
                if ($record['id'] == 2) {
                    $record['double_trace'] = 0;
                }
            }

            $table->addRecord($record);

        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

    public function helperclassfieldsAction()
    {

        $layout = FwLayout::getInstance();

        $layout->addBreadcrumb('class', '#');
        $layout->addBreadcrumb('table', '/fw/samples/table/');
        $layout->addBreadcrumb('helper class das colunas: bold, active, font-mini, font-gray', 'helperclassfields');

        $table = new FwTable();

        $table->addColumnHead('Bold')->setColumnClassBold();
        $table->addColumnHead('Active')->setColumnTypeActive();
        $table->addColumnHead('Active Bg')->setColumnTypeActive(true);
        $table->addColumnHead('Font-Mini')->setWidth(200);

        $table->addColumnBody('bold')->setColumnClassBold();
        $table->addColumnBody('active')->setColumnTypeActive();
        $table->addColumnBody('active_bg')->setColumnTypeActive(true);
        $table->addColumnBody('font_mini')->setColumnTypeFontMini();

        foreach ($this->getdata() AS $record) {

            $record['bold']      = 'Asperiores quis lectus';
            $record['font_mini'] = 'Donec at rerum massa mauris vitae vel nulla donec augue justo ornare.';
            $record['active']    = 1;

            if (isset($record['id'])) {
                if ($record['id'] == 2) {
                    $record['active'] = 0;
                }
                if ($record['id'] == 3) {
                    unset($record['active']);
                }
            }

            if (isset($record['active'])) {
                $record['active_bg'] = $record['active'];
            }

            $table->addRecord($record);

        }

        $view = new ViewModel(['html' => $table->getHtml()]);
        $view->setTemplate('app-samples/samples/table/tableview');

        return $view;

    }

}