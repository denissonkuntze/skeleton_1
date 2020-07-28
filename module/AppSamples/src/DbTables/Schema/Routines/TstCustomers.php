<?php

namespace AppSamples\DbTables\Schema\Routines;

class TstCustomers
{

    public function getScript()
    {

        $script[] = <<<EOL
DROP PROCEDURE IF EXISTS `procedure_tst_customers`;
EOL;

        $script[] = <<<EOL
CREATE PROCEDURE `procedure_tst_customers` ()
BEGIN
	UPDATE tst_customers SET name = 'ROTINA EXECUTADA' WHERE name = 'dbroutine';
END
EOL;

        return $script;

    }

}
