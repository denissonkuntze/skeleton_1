<?php

namespace AppSamples\DbTables;

use Fw\Lib\FwDbTableAbstract;

class TstCustomersContacts extends FwDbTableAbstract
{

    public function init()
    {

        $this->setTableName('tst_customers_contacts');
        $this->setForeignKey('tst_customers_id', \AppSamples\DbTables\TstCustomers::class);

    }

    public function structure(): bool
    {

        $create
            = <<<EOL
CREATE TABLE IF NOT EXISTS `tst_customers_contacts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tst_customers_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(150) NULL,
  `phone` VARCHAR(15) NULL,
  PRIMARY KEY (`id`, `tst_customers_id`))
ENGINE = InnoDB
EOL;

        $this->setStructureScriptDbCreate($create);

        return true;

    }

    public function populate()
    {

        $array[] = ['tst_customers_id' => 1, 'name' => 'TDD CONTACT 1.1', 'email' => 'email@tdd.com'];
        $array[] = ['tst_customers_id' => 1, 'name' => 'TDD CONTACT 1.2', 'email' => 'email@tdd.com'];
        $array[] = ['tst_customers_id' => 2, 'name' => 'TDD CONTACT 2.1', 'email' => 'email@tdd.com'];

        return $array;

    }

    public function populateTDD()
    {

        $array[] = ['tst_customers_id' => 1, 'name' => 'TDD CONTACT 1.1', 'email' => 'email@tdd.com'];
        $array[] = ['tst_customers_id' => 1, 'name' => 'TDD CONTACT 1.2', 'email' => 'email@tdd.com'];
        $array[] = ['tst_customers_id' => 2, 'name' => 'TDD CONTACT 2.1', 'email' => 'email@tdd.com'];

        return $array;

    }

}
