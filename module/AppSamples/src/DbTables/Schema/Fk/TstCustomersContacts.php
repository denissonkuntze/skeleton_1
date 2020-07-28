<?php

namespace AppSamples\DbTables\Schema\Fk;

class TstCustomersContacts
{

    public function getScript() {

        $fks[] = <<<FK
  ALTER TABLE `tst_customers_contacts` ADD 
  CONSTRAINT `fk_tst_customers_contacts_customers`
    FOREIGN KEY (`tst_customers_id`)
    REFERENCES `tst_customers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
FK;

        return $fks;

    }

}