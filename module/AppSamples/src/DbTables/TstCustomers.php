<?php

namespace AppSamples\DbTables;

use Fw\Lib\FwDbTableAbstract;

class TstCustomers extends FwDbTableAbstract
{

    public function init()
    {

        $this->setTableName('tst_customers');

        $this->setFieldCreatedAt();
        $this->setFieldUpdatedAt();
        $this->setFieldDeletedAt();
        #$this->setFieldStatus();

    }

    public function structure(): bool
    {

        $create = <<<EOL
CREATE TABLE IF NOT EXISTS `tst_customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `status` INT NULL DEFAULT 1,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `hash` VARCHAR(32) NULL,
  `day` INT NULL,
  `value` DOUBLE NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  `deleted_at` INT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;
EOL;

        $this->setStructureScriptDbCreate($create);

        return true;

    }

    public function populate()
    {

        $array[] = ['name' => 'Maria dos Santos', 'email' => 'email@email'];
        $array[] = ['name' => 'Antonio José', 'email' => 'email@email'];
        $array[] = ['name' => 'Felipe Souza', 'email' => 'email@email'];

        return $array;

    }

    public function populateTDD()
    {

        $array[] = ['name' => 'TDD', 'email' => 'email@tdd.com'];
        $array[] = ['name' => 'TDD_ADD', 'email' => 'email@tddadd.com'];
        $array[] = ['name' => 'TDD 2', 'email' => 'email@tdd2.com'];
        $array[] = ['name' => 'TDD 3', 'email' => 'email@tdd3.com'];
        $array[] = ['name' => 'TDD 4', 'email' => 'email@tdd4.com'];

        return $array;

    }

 }
