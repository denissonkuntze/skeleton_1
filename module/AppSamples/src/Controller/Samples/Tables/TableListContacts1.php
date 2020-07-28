<?php
/**
 * Created by PhpStorm.
 * User: Denisson.Kuntze
 * Date: 09/03/2017
 * Time: 10:54
 */

namespace AppSamples\Controller\Samples\Tables;

use Fw\Lib\FwTable\FwTable;
use Fw\Lib\ListForm\TableInterface;

class TableListContacts1 implements TableInterface
{

    public function getTable() : FwTable
    {

        $table = new FwTable();

        $table->addColumnHead('Id')->setWidth('35');
        $table->addColumnHead('Nome');
        $table->addColumnHead('Telefone');

        $table->addColumnBody('id');
        $table->addColumnBody('name')->setUrlEdit();
        $table->addColumnBody('phone')->setUrlEdit();

        $table->setBtnActionsWidth( 120 );

        return $table;

    }

    public function setData( FwTable $table, array $data ) : FwTable
    {

        foreach ( $data AS $record ) {

            #$table->addButtonActionInfo();

            $table->addRecord($record);

        }

        return $table;

    }

}