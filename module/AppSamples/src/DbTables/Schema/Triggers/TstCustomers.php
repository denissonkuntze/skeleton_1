<?php

namespace AppSamples\DbTables\Schema\Triggers;

class TstCustomers
{

    public function getScript()
    {

        $triggers[] = <<<TRIGGER
DROP TRIGGER IF EXISTS `tst_customers_AFTER_INSERT`;
TRIGGER;

        $triggers[] = <<<TRIGGER
CREATE TRIGGER `tst_customers_AFTER_INSERT` AFTER INSERT ON `tst_customers` FOR EACH ROW
BEGIN
	-- IF (new.name = 'TRIGGER') THEN
		-- UPDATE tst_customers SET name = 'TRIGGER EXECUTADA AQUI' WHERE id = new.id;
	-- END IF;		
END;
TRIGGER;

        return $triggers;

    }

}