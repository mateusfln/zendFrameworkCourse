<?php

namespace Pessoa\Model;

use Exception;
use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class PessoaTable
{
    private $tableGateway;

    public function __contruct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getAll() {
        return $this->tableGateway->select();
    }

    public function getPessoa($id)
    {
        $id = $this->parseStringToInt($id);
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if(!$row){
            throw new RuntimeException(sprintf('Não foi encontrado o id %d', $id));
        }
        return $row;
    }

    public function savePessoa(Pessoa $pessoa)
    {
        $data = [
            'nome' => $pessoa->getNome(),
            'sobrenome' => $pessoa->getSobrenome(),
            'email' => $pessoa->getEmail(),
            'situacao' => $pessoa->getSituacao()
        ];
        $id = $this->parseStringToInt($pessoa->getId());

        if($id === 0){
            $this->tableGateway->insert($data);
            return;
        }
        $this->tableGateway->update($data, ['id'=>$id]);
    }

    public function deletePessoa(int $id)
    {
        $this->tableGateway->delete(['id' => $this->parseStringToInt($id)]);
    }

    private function parseStringToInt(String $var)
    {
        if ($var == (String)$var){
            $parsedString = (int) $var;
            return $parsedString;
        }
        return $var;
    }
}