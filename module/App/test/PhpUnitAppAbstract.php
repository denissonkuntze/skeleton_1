<?php

namespace AppTest;

class PhpUnitAppAbstract extends \Fw\Lib\PhpUnitAbstract
{

    public function setUp()
    {

        $_SERVER['HTTP_HOST'] = 'erp.localhost';

        parent::setUp();

        $_ENV['DB_DATABASE']   = 'erp_app_tdd';
        $_ENV['AWS_S3_BUCKET'] = 'tst.eua';

        #$this->initDb();
        $this->truncateInit();

    }

    protected function truncateInit()
    {

        $tables[] = 'log_bills';
        $tables[] = 'log_customers';
        $tables[] = 'log_saas_contracts';
        $tables[] = 'log_saas_contracts_test';
        $tables[] = 'log_payments_transactions';

        $db = new \Fw\Lib\FwDb();

        foreach ($tables AS $table) {
            try {
                $db->queryexecute("TRUNCATE TABLE {$table}");
            } catch (\Exception $e) {
                continue;
            }

        }

    }

}