<?php

namespace Fw\Controller\Samples;

use Fw\Controller\Abs\AbstractSamplesController;
use Laminas\View\Model\ViewModel;

use Laminas\Db\Sql\Sql;
use Laminas\Db\Sql\Select;

use Fw\Models\FwCustomer;
use Fw\Lib\FwIR;

class ModelController extends AbstractSamplesController
{

    public function __construct() {
        parent::__construct();
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function insertAction()
    {

        $html  = 'model insert<hr>';

        $data['name']  = 'Antonio ModelInsert '.time();
        $data['email'] = 'email@'.time().'com.br';

        $model = new Costumer();
        $retorno = $model->insert( $data );

        $html .= 'Registro inserido: '.$retorno;

        return $this->setView( ['html'=>$html] );

    }

    public function updateAction()
    {

        $html  = 'model update<hr>';

        $data['name']  = 'José '.time().' ModelUpdate';

        $model = new Costumer();
        $retorno = $model->update( 3, $data );

        $html .= 'Registro atualizado: '.$retorno;

        return $this->setView( ['html'=>$html] );

    }

    public function deleteAction()
    {

        $html  = 'model delete<hr>';

        $model = new Costumer();
        $retorno = $model->delete( 7 );

        $html .= 'Registro deletado: '.$retorno;

        return $this->setView( ['html'=>$html] );

    }

    public function fetchoneAction()
    {

        $html    = 'model fetchone<hr>';

        $model   = new Costumer();
        $retorno = $model->fetchone( 1 );

        $html .= json_encode( $retorno );

        return $this->setView( ['html'=>$html] );

    }

    public function fetchoneselectAction()
    {

        $html    = 'model fetchoneselect<hr>';

        $select = new Select();
        #$select->from('customers');
        $select->where( ['id>?'=>5] );

        $model   = new Costumer();
        $model->setDbSelect( $select );
        $retorno = $model->fetchone( 5 );

        $html .= json_encode( $retorno );

        return $this->setView( ['html'=>$html] );

    }

    public function fetchallAction()
    {

        $html    = 'model fetchall<hr>';

        $model   = new Costumer();
        #$model->setPagination( false );
        $retorno = $model->fetchall();

        if ($retorno) {
            foreach ($retorno as $item) {
                $html .= $item['id'] . ' -  ' . $item['name'] . '<br>';
            }
        }

        $html .= '<hr>Total de registros: '.$model->getPaginationFoundRows();

        return $this->setView( ['html'=>$html] );

    }

    public function fetchallpaginationAction()
    {

        $html    = 'model fetchallpagination<hr>';

        $model   = new Costumer();
        $model->setPaginationRecordsPerPage( 10 );
        $retorno = $model->fetchall();

        if ($retorno) {
            foreach ($retorno as $item) {
                $html .= $item['id'] . ' -  ' . $item['name'] . '<br>';
            }
        }

        $html .= '<hr>Total de registros: '.$model->getPaginationFoundRows();
        $html .= '<hr>Dados da paginação: '.json_encode($model->getPaginationInfo());

        return $this->setView( ['html'=>$html] );

    }

    public function fetchallselectAction()
    {

        $html    = 'model fetchallselect<hr>';

        $select = new Select();
        $select->where( ['id>?'=>5] );

        $model   = new Costumer();
        $model->setDbSelect( $select );
        $retorno = $model->fetchall();

        if ($retorno) {
            foreach ($retorno as $item) {
                $html .= $item['id'] . ' -  ' . $item['name'] . '<br>';
            }
        }

        $html .= '<hr>Total de registros: '.$model->getPaginationFoundRows();
        $html .= '<hr>Dados da paginação: '.json_encode($model->getPaginationInfo());

        return $this->setView( ['html'=>$html] );

    }

    public function filterAction()
    {

        $html  = 'model filter<hr>';

        $data['name'] = '  Antonio Marcos (filter) ';

        $model = new FwCustomer();
        $retorno = $model->insert( $data );

        $html .= 'Registro inserido: '.$retorno;

        return $this->setView( ['html'=>$html] );

    }

    public function validateAction()
    {

        $html  = 'model validate<hr>';

        $data['name'] = '  Anto';

        $model = new FwCustomer();
        $retorno = $model->insert( $data );

        if ($retorno) {
            $html .= 'Registro inserido: ' . $retorno;
        } else {
            $html .= FwIR::getInstance()->getResponseJson();
        }

        return $this->setView( ['html'=>$html] );

    }

    public function formatoneAction()
    {

        $html  = 'model formatone<hr>';

        $model   = new Costumer();
        $retorno = $model->fetchone( 6 );

        $html .= json_encode( $retorno );

        return $this->setView( ['html'=>$html] );

    }


    public function formatallAction()
    {

        $html    = 'model formatall<hr>';

        $model   = new Costumer();
        $retorno = $model->fetchall();

        if ($retorno) {
            foreach ($retorno as $item) {
                $html .= $item['id'] . ' -  ' . $item['name'] . '<br>';
            }
        }

        $html .= '<hr>Total de registros: '.$model->getPaginationFoundRows();
        $html .= '<hr>Dados da paginação: '.json_encode($model->getPaginationInfo());

        return $this->setView( ['html'=>$html] );

    }

    private function setView( $arrayView ) {

        $viewModel = new ViewModel();
        $viewModel->setVariables( $arrayView );
        $viewModel->setTemplate('fw/exemplos/db/view');

        return $viewModel;

    }

}
