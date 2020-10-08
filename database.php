<?php
class basedados{

    function __construct(){
        // cria a conexao da base de dados
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=processo_seletivo', 'dev', 'dev');
            
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

    public function listar(){

        $query = $this->db->query('SELECT * FROM doadores');

        $this->db = null;
        
        return $query->fetchAll(PDO::FETCH_ASSOC);


    }

    public function adicionar($dados){

        // cria um novo registro na tabela doadores
        $novo = $this->db->prepare('INSERT INTO doadores (nome, email, cpf, telefone, data_nascimento, 
                                            data_cadastro, intervalo, valor, forma_pagamento, endereco)
                                        VALUES (:nome, :email, :cpf, :telefone, :data_nascimento, 
                                            :data_cadastro, :intervalo, :valor, :forma_pagamento, :endereco)');
        if($novo->execute([
            'nome'              => $dados['nome'], 
            'email'             => $dados['email'], 
            'cpf'               => $this->somenteNumeros($dados['cpf']), 
            'telefone'          => $this->somenteNumeros($dados['telefone']), 
            'data_nascimento'   => $dados['data_nascimento'],
            'data_cadastro'     => date('Y-m-d H:i:s'), 
            'intervalo'         => $dados['intervalo'], 
            'valor'             => str_replace(',', '.', $dados['valor']), 
            'forma_pagamento'   => $dados['forma_pagamento'], 
            'endereco'          => $dados['endereco']
        ]))
        {
            $this->db = null;        
            return true;

        }else{
            // echo 'lll';die;
            $this->db = null;        
            return false;
        }
        
    }

    public function retornaDados($id){

        // retorna os dados da tabela doadores de acordo com o id
        $query = $this->db->prepare('SELECT * FROM doadores WHERE id = :id LIMIT 1');

        if($query->execute([
            'id' => $id
        ])){
            $this->db = null;
        
            return $query->fetch(PDO::FETCH_ASSOC);

        }        

    }

    public function atualizar($dados){

        // atualiza o registro na tabela doadores de acordo com o id
        $registro = $this->db->prepare('UPDATE doadores SET nome = :nome, email = :email, cpf = :cpf, 
                                            telefone = :telefone, data_nascimento = :data_nascimento, 
                                            data_cadastro = :data_cadastro, intervalo = :intervalo, 
                                            valor = :valor, forma_pagamento = :forma_pagamento, 
                                            endereco = :endereco
                                    WHERE id = :id');
        if($registro->execute([
            'nome'              => $dados['nome'], 
            'email'             => $dados['email'], 
            'cpf'               => $this->somenteNumeros($dados['cpf']), 
            'telefone'          => $this->somenteNumeros($dados['telefone']), 
            'data_nascimento'   => $dados['data_nascimento'],
            'intervalo'         => $dados['intervalo'], 
            'valor'             => str_replace(',', '.', $dados['valor']), 
            'forma_pagamento'   => $dados['forma_pagamento'], 
            'endereco'          => $dados['endereco'],
            'id'                => $dados['id']
        ]))
        {
            // echo 'aqui';die;
            $this->db = null;        
            return true;

        }else{
            $this->db = null;        
            return false;
        }
        
    }

    public function deletar($id){
        // exclui o registro na tabela doadores de acordo com o id
        $registro = $this->db->prepare('DELETE FROM doadores WHERE id = :id');

        if($registro->execute([
            
            'id' => $id
        ]))
        {
            // echo 'aqui';die;
            $this->db = null;        
            return true;

        }else{
            $this->db = null;        
            return false;
        }
        

    }

    private function somenteNumeros($cpf){
        // limpa os caracteres       
        return preg_replace('/[^0-9]/', '', $cpf);
    }
}
