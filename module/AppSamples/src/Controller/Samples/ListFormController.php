<?php

namespace AppSamples\Controller\Samples;

use AppSamples\Controller\Samples\Forms\listformcontact1;
use AppSamples\Controller\Samples\Forms\listformsub1;
use AppSamples\Controller\Samples\Forms\tableformsample1;
use AppSamples\Controller\Samples\Tables\TableListContacts1;
use AppSamples\Controller\Samples\Tables\TableSample1;
use AppSamples\Lib\ListForm\DataFormSample1;
use AppSamples\Models\Customer;
use Fw\Lib\ListForm\ListFormInfo;
use Fw\Lib\ListForm\ListFormInfoResume;
use Fw\Lib\ListForm\ListFormList;
use Fw\Lib\ListForm\ListFormListSub;
use Fw\Lib\ListForm\ListFormPanel;
use Fw\Lib\ListForm\ListFormWelcome;
use Fw\Models\FwTddArray;
use Fw\Models\Contact;
use Laminas\View\Model\ViewModel;

use AppSamples\Controller\Abs\AbstractSamplesController;
use Fw\Lib\ListForm\ListFormForm;

use Laminas\Db\Sql\Select;

class ListFormController extends AbstractSamplesController
{

    public function form1Action()
    {

        $tableform = new ListFormForm('form', $this->getRequest());

        // seta o formulário

        $form = tableformsample1::class;
        $tableform->setForm($form);

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        $tableform->run();

        return $tableform->getView();

    }

    public function form2Action()
    {

        $tableform = new ListFormForm('form1', $this->getRequest());

        // seta o formulário

        $form = tableformsample1::class;
        $tableform->setForm($form);

        // seta a classe que recebe os dados

        $tableform->setModelDataClass(new DataFormSample1());

        $tableform->run();

        return $tableform->getView();

    }


    public function form3Action()
    {

        $tableform = new ListFormForm('form', $this->getRequest());
        $tableform->setSaveAndBack(false);

        // seta o formulário

        $form = tableformsample1::class;
        $tableform->setForm($form);

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        $tableform->run();

        return $tableform->getView();

    }

    public function form4Action()
    {

        $tableform = new ListFormForm('form', $this->getRequest());
        $tableform->setSaveAndBack(false);

        // seta o formulário

        $form = \AppSamples\Controller\Samples\Forms\tableformsample1::class;
        $tableform->setForm($form);

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        $tableform->run();

        return $tableform->getView();

    }

    public function form5Action()
    {

        $tableform = new ListFormForm('form', $this->getRequest());
        $tableform->setSaveAndBack(false);

        // seta o formulário

        $form = tableformsample1::class;
        $tableform->setForm($form);

        // seta a classe que recebe os dados

        $tableform->setModelDataClass(new DataFormSample1());

        $tableform->run();

        return $tableform->getView();

    }

    #$welcome = new ListFormWelcome('Meus clientes','Veja aqui informações de seus clientes','clientes.png');
    #$welcome->setButtonNew( 'Incluir um novo cliente' );
    #$welcome->setButtonAction( 'Importar clientes', 'btn-importar' );
    #$welcome->setHelp( 'Veja informações de como cadastrar e importar clientes clicando aqui' );

    #$tableform->setFirstBreadcrumbUrl( '/fw' );
    #$tableform->addBreadcrumb( 'ListForm','/fw/samples/listform/table' );
    #$tableform->setTitle( 'Table' );
    #$tableform->setSearch( true );
    #$tableform->setModal( true, 'wide' );
    #$tableform->setActionInfoType( 'modal' );

    #$tableform->setWelcome( $welcome );

    #$tableform->setBtnMenuActions( true );
    #$tableform->addBtnMenuActions( 'Importar', 'btn-importar' );
    #$tableform->addBtnMenuActions( 'divider', '' );
    #$tableform->addBtnMenuActions( 'Exportar', 'btn-exportar' );
    #$tableform->setBtnHeader( '<button type="button" class="btn border-warning text-warning-600 btn-flat btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-pin-alt"></i> &nbsp;<span class="caret"></span></button>' );

    #$tableform->setInsertRecordWithId();
    #$tableform->setInitialData( ['name'=>'TESTE'] );

    // set um select inicial para a model

    #$select = new Select();
    #$select->where( ['id>?'=>2] );

    #$tableform->setModelSelect( $select );

    public function list1Action()
    {

        $tableform = new ListFormList('list1', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list1');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        $tableform->run();

        return $tableform->getView();

    }

    public function listformAction()
    {

        $tableform = new ListFormForm('listform', $this->getRequest());

        $tableform->setActionList('/samples/listform/list1');
        $tableform->setActionForm('/samples/listform/listform');

        // seta o formulário

        $form = tableformsample1::class;
        $tableform->setForm($form);

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        $tableform->run();

        return $tableform->getView();

    }

    public function list2Action()
    {

        $tableform = new ListFormList('list2', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list2');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model array

        $model = new FwTddArray();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        $tableform->run();

        return $tableform->getView();

    }

    public function list3Action()
    {

        $tableform = new ListFormList('list3', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list3');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model class

        $tableform->setModelDataClass(new DataFormSample1());

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        $tableform->run();

        return $tableform->getView();

    }

    public function list4Action()
    {

        $tableform = new ListFormList('list4', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list4');
        $tableform->setActionForm('/samples/listform/listform');

        $model = new Customer();
        $tableform->setModel($model);

        // seta a view que vai listar os registros

        $content = new ViewModel();
        $content->setTemplate( 'app-samples/samples/list-form/table-view' );

        $tableform->setViewToRender($content);

        $tableform->run();

        return $tableform->getView();

    }

    public function list5Action()
    {

        $tableform = new ListFormList('list1', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list5');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        // seta a janela como modal

        $tableform->setModal(true,'listform','wide');

        $tableform->run();

        return $tableform->getView();

    }

    public function list6Action()
    {

        $tableform = new ListFormList('list6', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list6');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        // seta um select adicional

        $select = new Select();
        $select->from('tst_customers'); // lembrar de colocar o nome da tabela !!!
        $select->where( ['id > ?'=>5] );

        $tableform->setModelSelect($select);

        $tableform->run();

        return $tableform->getView();

    }

    public function list7Action()
    {

        $welcome = new ListFormWelcome('Meus clientes', 'Veja aqui informações de seus clientes', 'clientes.png');
        $welcome->setButtonNew('Incluir um novo cliente');
        $welcome->setButtonAction('Importar clientes', 'btn-importar');
        $welcome->setHelp('Veja informações de como cadastrar e importar clientes clicando aqui');

        $tableform = new ListFormList('list6', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list7');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

//        // seta um select adicional
//
//        $select = new Select();
//        $select->from('tst_customers'); // lembrar de colocar o nome da tabela !!!
//        $select->where( ['id > ?'=>5000] );
//
//        $tableform->setModelSelect($select);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        // seta o welcome

        $tableform->setWelcome($welcome,true);

        $tableform->run();

        return $tableform->getView();

    }

    public function list8Action()
    {

        $tableform = new ListFormList('list6', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list8');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        // seta menu de acoes

        $tableform->setBtnMenuActions( true );
        $tableform->addBtnMenuActions( 'Importar', 'btn-importar' );
        $tableform->addBtnMenuActions( 'divider', '' );
        $tableform->addBtnMenuActions( 'Exportar', 'btn-exportar' );

        $tableform->run();

        return $tableform->getView();

    }

    public function list9Action()
    {

        $tableform = new ListFormList('list6', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list9');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        // seta botao adicional no cabecalho

        $tableform->setBtnHeader( '<button type="button" class="btn border-warning text-warning-600 btn-flat btn-icon dropdown-toggle" data-toggle="dropdown"><i class="icon-pin-alt"></i> &nbsp;<span class="caret"></span></button>' );

        $tableform->run();

        return $tableform->getView();

    }

    public function list10Action()
    {

        $tableform = new ListFormList('list6', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list10');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        // seta busca

        $tableform->setSearch(true);

        $tableform->run();

        return $tableform->getView();

    }

    public function list15Action()
    {

        $tableform = new ListFormList('list15', $this->getRequest());
        $tableform->setBtnAdd();

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/list15');
        $tableform->setActionForm('/samples/listform/listform');

        $tableform->setInsertRecordWithId();

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        $tableform->run();

        return $tableform->getView();

    }

    public function listsub1Action()
    {

        $tableform = new ListFormForm('listsub_1', $this->getRequest());

        // seta o formulário

        $form = listformsub1::class;
        $tableform->setForm($form);

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        $tableform->run();

        return $tableform->getView();

    }

    public function listsub1listcontactsAction()
    {

        $listform = new ListFormListSub('listsub_1_list_contacts', $this->getRequest(), 'contact_form');

        #$listform->disablePanelButtons();
        #$listform->setForeignKeyIsRequired();
        #$listform->setSubFormForeignKey('saas_id');

        $listform->setSearch(true);

        #$listform->setBtnAdd(true);
        $listform->setBtnDelete(true);
        $listform->setTableCheckbox(true);

        #$listform->setDataEmptyMessage('Clique no botão acima para incluir os serviços associados a este plano.');
        #$listform->setBtnAddRecordToListForm('/plans/searchservices/','Incluir serviço','informe o nome do servico');

        #$listform->setTitle( 'Serviços do plano' );

        $listform->setActionList('/samples/listform/listsub1listcontacts');
        $listform->setActionForm('/samples/listform/listsub1formcontacts');

        // seta a model

//        $select = new Select();
//        $select->from('tst_customers_contacts');
//        $select->order(['id ASC']);
//        $listform->setModelSelect($select);

        $listform->setModel(new Contact());
        #$listform->setModelMethodFetch('listFetchAll');

        #$listform->setInsertRecordWithId();
        #$listform->setInitialData( ['name'=>'TESTE'] );

        // seta a table

        $listform->setTable(new TableListContacts1());

        $listform->run();

        return $listform->getView();
        
    }

    public function listsub1formcontactsAction()
    {

        $listform = new ListFormForm('contact_form', $this->getRequest());
        #$listform->setTitle('Ciclo de faturamento');

        #$listform->setForeignKeyId('saas_id');

        #$listform->setForeignKeyIsRequired();
        #$listform->setSubFormForeignKey('id_services');

        #$listform->setJavaScript( 'customers/form.js' );
        #$listform->disablePanelContentClass();

        #$listform->setFirstBreadcrumbUrl( '/' );
        #$listform->addBreadcrumb('Planos','/plans/' );

        #$listform->setInitialData( ['pricing_schema_type'=>'flat'] );

        $listform->setActionList('/samples/listform/listsub1listcontacts');
        $listform->setActionForm('/samples/listform/listsub1formcontacts');

        // seta o formulário

        $listform->setForm(listformcontact1::class);

        // seta a model

        $listform->setModel(new Contact());

        $listform->run();

        return $listform->getView();

    }

    public function info1Action()
    {

        $tableform = new ListFormList('info1', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/info1');
        $tableform->setActionForm('/samples/listform/listform');
        $tableform->setActionInfo('/samples/listform/info1info');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        $tableform->run();

        return $tableform->getView();

    }

    public function info1infoAction()
    {

        $listform = new ListFormInfo( 'customer_info', $this->getRequest() );

        #$content = new ViewModel();
        #$content->setTemplate( 'app-samples/samples/list-form/simple-test' );
        #$listform->setViewToRender($content);

        $listform->setUrlInitialOpen( '/samples/listform/info1main' );

        $listform->setBtnEdit( true );
        $listform->setBtnDelete( true );

        $listform->setBtnMenuActions( true );
        $listform->addBtnMenuActions( 'Acao 1', 'btn-acao1', null, '/url1/' );
        $listform->addBtnMenuActions( 'Acao 2', 'btn-acao2', null, '/url2/' );

        $listform->setMenuSidebar();
        $listform->addMenuSidebarItem( 'Informações', '', '/samples/listform/info1main' );
        $listform->addMenuSidebarItem( 'Contatos', '', '/samples/listform/info1contacts' );
        #$listform->addMenuSidebarItem( 'Observaçoes', '', '/customers/infonotes/' );
        #$listform->addMenuSidebarItem( 'Logs', '', '/customers/infologs/' );

        $listform->setActionList( '/samples/listform/info1' );
        $listform->setActionForm( '/samples/listform/listform' );

        $listform->run();

        return $listform->getView();
        
    }

    public function info1mainAction()
    {

        #echo time(); exit;

        $listform = new ListFormPanel( 'customer_infomain', $this->getRequest() );
        #$listform->setTitle('Informações');

        #$model = new Customer();
        #$dataFormated = $model->formatDataToInfo( $this->params()->fromQuery('id') );

        $model  = new Customer();
        $record = $model->fetchOne( (int)$_GET['id'] );

        $content = new ViewModel();
        $content->setTemplate( 'app-samples/samples/list-form/infomain' );
        $content->setVariable( 'data', $record );

        $listform->setViewToRender( $content );

        $listform->run();

        return $listform->getView();
        
    }

    public function info1contactsAction()
    {

        $tableform = new ListFormListSub('info1contactssub', $this->getRequest(), 'listform');

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/info1contacts');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        $tableform->run();

        return $tableform->getView();

    }

    public function resume1Action()
    {

        $tableform = new ListFormList('info1', $this->getRequest());

        $tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/resume1');
        $tableform->setActionForm('/samples/listform/listform');
        $tableform->setActionInfo('/samples/listform/info1info');
        $tableform->setActionResume( '/samples/listform/resume1panel' );

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        $tableform->run();

        return $tableform->getView();

    }

    public function resume1panelAction()
    {

        #echo time(); exit;

        $listform = new ListFormInfoResume( 'customer_resume', $this->getRequest() );

        $model  = new Customer();
        $record = $model->fetchOne( (int)$_GET['id'] );

        $record['test'] = ['name'=>'John Doe','id'=>123];

        $content = new ViewModel();
        $content->setTemplate( 'app-samples/samples/list-form/resume_tabs' );
        $content->setVariable( 'data', $record );

//        $contentMain = new ViewModel();
//        $contentMain->setTemplate( 'app/customers/resume/main' );
//        $contentMain->setVariable( 'dataFormated', $dataFormated );
//
//        $content = new ViewModel();
//        $content->setTemplate( 'app/customers/resume/tabs_resume' );
//        $content->addChild( $contentMain, 'contentMain' );

        $listform->setViewToRender( $content );

        #$listform->setTitle( 'Cliente' );
        $listform->setSubTitle( 'Informações do cliente' );

        $listform->setBtnInfoInfo();
        $listform->setBtnInfoEdit();
        $listform->setBtnInfoDelete();

        $listform->setBtnMenuActions( true );
        $listform->addBtnMenuActions( 'Acao 1', 'btn-acao1', null, '/url1/' );
        $listform->addBtnMenuActions( 'Acao 2', 'btn-acao2', null, '/url2/' );

        $listform->setActionList( '/samples/listform/resume1' );
        $listform->setActionForm( '/samples/listform/listform' );
        $listform->setActionInfo( '/samples/listform/info1info' );

        $listform->run();

        return $listform->getView();
        
    }

    public function js1Action()
    {

        $tableform = new ListFormList('js1', $this->getRequest());

        #$tableform->setPaginator(true, 5);

        $tableform->setActionList('/samples/listform/js1');
        $tableform->setActionForm('/samples/listform/listform');

        // seta a model

        $model = new Customer();
        $tableform->setModel($model);

        // seta a table

        $table = new TableSample1();
        $tableform->setTable($table);

        // seta um arquivo javascript

        $tableform->setJavaScript('samples/listform/js1.js');

        $tableform->run();

        return $tableform->getView();

    }

}
