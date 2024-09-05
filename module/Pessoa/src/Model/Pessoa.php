<?php

namespace Pessoa\Model;


class Pessoa {

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $situacao;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->nome = !empty($data['nome']) ? $data['nome'] : null;
        $this->sobrenome = !empty($data['sobrenome']) ? $data['sobrenome'] : null;
        $this->email = !empty($data['email']) ? $data['email'] : null;
        $this->situacao = !empty($data['situacao']) ? $data['situacao'] : null;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setNome(String $nome)
    {
        $this->nome = $nome;
    }

    public function getNome(): String
    {
        return $this->nome;
    }

    public function setSobrenome(String $sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function getSobrenome(): String
    {
        return $this->sobrenome;
    }

    public function setEmail(int $email)
    {
        $this->email = $email;
    }

    public function getEmail(): int
    {
        return $this->email;
    }
    
    public function setSituacao(int $situacao)
    {
        $this->situacao = $situacao;
    }

    public function getSituacao(): int
    {
        return $this->situacao;
    }
}