<?php
/**
 * Created by PhpStorm.
 * User: Denisson.Kuntze
 * Date: 11/01/2018
 * Time: 18:26
 */

namespace AppSamples\Lib\ListForm;

use Fw\Lib\ListForm\DataClassInterface;

/**
 * Class DataFormSample1
 * @package AppSamples\Lib\ListForm
 */
class DataFormSample1 implements DataClassInterface
{

    public function fetchOne(int $id): array
    {
        $array['name']  = 'Marcos';
        $array['email'] = 'marcos@tst.com';

        return $array;

    }

    public function fetchAll(array $data = null): array
    {

        $array[0]['name']  = 'Marcos';
        $array[0]['email'] = 'marcos@tst.com';

        $array[1]['name']  = 'Andre';
        $array[1]['email'] = 'andre@tst.com';

        return $array;

    }

    public function insert(array $data): bool
    {

        if ($data['name'] == "TDD_LISTFORM") {

            $return = true;

        } else {

            $ir = \Fw\Lib\FwIR::getInstance();

            if (rand(1, 2) == 1) {
                $return = false;
                $ir->addSuccessMsg('sucesso');
            } else {
                $return = true;
                $ir->addErrorMsg('erro');
            }

        }

        return $return;

    }

    public function update(int $id, array $data): bool
    {
        return $this->insert($data);
    }

    public function delete(int $id, array $data = null): bool
    {
        return $this->insert($data);
    }
}