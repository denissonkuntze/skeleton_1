<?php

namespace AppSamples\DbTables\Schema\Views;

class TstCustomers
{

    public function getScript()
    {

        $script[] = <<<EOL
DROP VIEW IF EXISTS `view_tst_customers_tmp`;
EOL;

        $script[] = <<<EOL
CREATE VIEW `view_tst_customers_tmp` AS 
SELECT id, name FROM tst_customers;
EOL;

        return $script;

    }

}
