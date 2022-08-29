<?php
namespace Modelo;


use \PDO;
use \Framework\DW3BancoDeDados;

class Avaliacao extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM avaliacao';
    const BUSCAR_ID = 'SELECT * FROM avaliacao WHERE id_avaliacao = ?';
    const BUSCAR_SU = 'SELECT * FROM avaliacao JOIN militar USING(id_militar) WHERE id_su = ?';
    const BUSCAR_ID_MILITAR = 'SELECT * FROM avaliacao JOIN militar USING(id_militar) WHERE id_militar = ?';
    const BUSCAR_PELOTAO = 'SELECT * FROM avaliacao JOIN militar USING(id_militar) WHERE pelotao = ?';
    const BUSCAR_SU_PESQUISA = 'SELECT * FROM avaliacao JOIN militar USING(id_militar) WHERE (nome_guerra LIKE ? or numero LIKE ?) AND id_su = ?';
    const BUSCAR_PELOTAO_PESQUISA = 'SELECT * FROM avaliacao JOIN militar USING(id_militar) WHERE (nome_guerra LIKE ? or numero LIKE ?) AND pelotao = ?';
    const INSERIR = 'INSERT INTO avaliacao(cooperacao, autoconfianca, persistencia, iniciativa, coragem, responsabilidade, disciplina, equilibrio_emocional, entusiasmo_profissional, matricula_cfc, punido, avaliacao_global, id_militar, data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE avaliacao SET cooperacao = ?, autoconfianca = ?, persistencia = ?, iniciativa = ?, coragem = ?, responsabilidade = ?, disciplina = ?, equilibrio_emocional = ?, entusiasmo_profissional = ?, matricula_cfc = ?, punido = ?, avaliacao_global = ?, id_militar = ?, data = ? WHERE id_avaliacao = ?';
    const DELETAR = 'DELETE FROM avaliacao WHERE id_avaliacao = ?';
    private $cooperacao;
    private $autoconfianca;
    private $persistencia;
    private $iniciativa;
    private $coragem;
    private $responsabilidade;
    private $disciplina;
    private $equilibrio_emocional;
    private $entusiasmo_profissional;
    private $matricula_cfc;
    private $punido;
    private $avaliacao_global;
    private $id_militar;
    private $id_avaliacao;
    private $militar;
    private $data;
    

    public function __construct(
        $cooperacao = null, 
        $autoconfianca = null, 
        $persistencia = null, 
        $iniciativa = null, 
        $coragem = null,
        $responsabilidade = null, 
        $disciplina = null, 
        $equilibrio_emocional = null, 
        $entusiasmo_profissional = null, 
        $matricula_cfc = null,
        $punido = null,
        $avaliacao_global = null,
        $id_militar = null,
        $data = null,
        $id_avaliacao = null,
    ) {
        $this->cooperacao = $cooperacao;
        $this->autoconfianca = $autoconfianca;
        $this->persistencia = $persistencia;
        $this->iniciativa = $iniciativa;
        $this->coragem = $coragem;
        $this->responsabilidade = $responsabilidade;
        $this->disciplina = $disciplina;
        $this->equilibrio_emocional = $equilibrio_emocional;
        $this->entusiasmo_profissional = $entusiasmo_profissional;
        $this->matricula_cfc = $matricula_cfc;
        $this->punido = $punido;
        $this->avaliacao_global = $avaliacao_global;
        $this->id_militar = $id_militar;
        $this->data = $data;
        $this->id_avaliacao = $id_avaliacao;
    }

     public function getIdAvaliacao()
    {
        return $this->id_avaliacao;
    }

    public function getCooperacao()
    {
        return $this->cooperacao;
    }

    public function getAutoconfianca()
    {
        return $this->autoconfianca;
    }

    public function getPersistencia()
    {
        return $this->persistencia;
    }

    public function getIniciativa()
    {
        return $this->iniciativa;
    }    

    public function getCoragem()
    {
        return $this->coragem;
    }

     public function getResponsabilidade()
    {
        return $this->responsabilidade;
    }

    public function getDisciplina()
    {
        return $this->disciplina;
    }

    public function getEquilibrioEmocional()
    {
        return $this->equilibrio_emocional;
    }

    public function getEntusiasmoProfissional()
    {
        return $this->entusiasmo_profissional;
    }    

    public function getMatriculaCfc()
    {
        return $this->matricula_cfc;
    }

     public function getPunido()
    {
        return $this->punido;
    }

    public function getAvaliacaoGlobal()
    {
        return $this->avaliacao_global;
    }

    public function getIdMilitar()
    {
        return $this->id_militar;
    }

    public function getMilitar()
    {
        if ($this->militar == null) {
            $this->militar = Militar::buscarId($this->id_militar);
        }
        return $this->militar;
    }

    public function getData()
    {
        return $this->data;
    } 

    public function getDataBr()
    {
        return date('d/m/Y',  strtotime($this->data));
    } 

    public function setCooperacao($cooperacao)
    {
        $this->cooperacao = $cooperacao;
    }

    public function setAutoconfianca($autoconfianca)
    {
        $this->autoconfianca = $autoconfianca;
    }

    public function setPersistencia($persistencia)
    {
        $this->persistencia = $persistencia;
    }

    public function setIniciativa($iniciativa)
    {
        $this->iniciativa = $iniciativa;
    }

    public function setCoragem($coragem)
    {
        $this->coragem = $coragem;
    }

    public function setResponsabilidade($responsabilidade)
    {
        $this->responsabilidade = $responsabilidade;
    }

    public function setDisciplina($disciplina)
    {
        $this->disciplina = $disciplina;
    }

    public function setEquilibrioEmocional($equilibrio_emocional)
    {
        $this->equilibrio_emocional = $equilibrio_emocional;
    }

    public function setEntusiasmoProfissional($entusiasmo_profissional)
    {
        $this->entusiasmo_profissional = $entusiasmo_profissional;
    }

    public function setMatriculaCfc($matricula_cfc)
    {
        $this->matricula_cfc = $matricula_cfc;
    }

    public function setPunido($punido)
    {
        $this->punido = $punido;
    }

    public function setAvaliacaoGlobal($avaliacao_global)
    {
        $this->avaliacao_global = $avaliacao_global;
    }

    public function setIdMilitar($id_militar)
    {
        $this->id_militar = $id_militar;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->cooperacao, PDO::PARAM_STR);
        $comando->bindValue(2, $this->autoconfianca, PDO::PARAM_STR);
        $comando->bindValue(3, $this->persistencia, PDO::PARAM_STR);
        $comando->bindValue(4, $this->iniciativa, PDO::PARAM_STR);
        $comando->bindValue(5, $this->coragem, PDO::PARAM_STR);
        $comando->bindValue(6, $this->responsabilidade, PDO::PARAM_STR);
        $comando->bindValue(7, $this->disciplina, PDO::PARAM_STR);
        $comando->bindValue(8, $this->equilibrio_emocional, PDO::PARAM_STR);
        $comando->bindValue(9, $this->entusiasmo_profissional, PDO::PARAM_STR);
        $comando->bindValue(10, $this->matricula_cfc, PDO::PARAM_STR);
        $comando->bindValue(11, $this->punido, PDO::PARAM_STR);
        $comando->bindValue(12, $this->avaliacao_global, PDO::PARAM_STR);
        $comando->bindValue(13, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(14, $this->data, PDO::PARAM_STR);
        $comando->execute();
        $this->id_avaliacao = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->cooperacao, PDO::PARAM_STR);
        $comando->bindValue(2, $this->autoconfianca, PDO::PARAM_STR);
        $comando->bindValue(3, $this->persistencia, PDO::PARAM_STR);
        $comando->bindValue(4, $this->iniciativa, PDO::PARAM_STR);
        $comando->bindValue(5, $this->coragem, PDO::PARAM_STR);
        $comando->bindValue(6, $this->responsabilidade, PDO::PARAM_STR);
        $comando->bindValue(7, $this->disciplina, PDO::PARAM_STR);
        $comando->bindValue(8, $this->equilibrio_emocional, PDO::PARAM_STR);
        $comando->bindValue(9, $this->entusiasmo_profissional, PDO::PARAM_STR);
        $comando->bindValue(10, $this->matricula_cfc, PDO::PARAM_STR);
        $comando->bindValue(11, $this->punido, PDO::PARAM_STR);
        $comando->bindValue(12, $this->avaliacao_global, PDO::PARAM_STR);
        $comando->bindValue(13, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(14, $this->data, PDO::PARAM_STR);
        $comando->bindValue(15, $this->id_avaliacao, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Avaliacao(
                $registro['cooperacao'],
                $registro['autoconfianca'],
                $registro['persistencia'],
                $registro['iniciativa'],
                $registro['coragem'],                
                $registro['responsabilidade'],
                $registro['disciplina'],
                $registro['equilibrio_emocional'],
                $registro['entusiasmo_profissional'],
                $registro['matricula_cfc'],
                $registro['punido'],
                $registro['avaliacao_global'],
                $registro['id_militar'],
                $registro['data'],
                $registro['id_avaliacao'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_avaliacao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_avaliacao, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Avaliacao(
                $registro['cooperacao'],
                $registro['autoconfianca'],
                $registro['persistencia'],
                $registro['iniciativa'],
                $registro['coragem'],                
                $registro['responsabilidade'],
                $registro['disciplina'],
                $registro['equilibrio_emocional'],
                $registro['entusiasmo_profissional'],
                $registro['matricula_cfc'],
                $registro['punido'],
                $registro['avaliacao_global'],
                $registro['id_militar'],
                $registro['data'],
                $registro['id_avaliacao'],
        );
    }

    public static function buscarIdMilitar($id_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_MILITAR);
        $comando->bindValue(1, $id_militar, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Avaliacao(
                $registro['cooperacao'],
                $registro['autoconfianca'],
                $registro['persistencia'],
                $registro['iniciativa'],
                $registro['coragem'],                
                $registro['responsabilidade'],
                $registro['disciplina'],
                $registro['equilibrio_emocional'],
                $registro['entusiasmo_profissional'],
                $registro['matricula_cfc'],
                $registro['punido'],
                $registro['avaliacao_global'],
                $registro['id_militar'],
                $registro['data'],
                $registro['id_avaliacao'],
            );
        }
        return $objetos;
    }

    public static function buscarSu($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Avaliacao(
                $registro['cooperacao'],
                $registro['autoconfianca'],
                $registro['persistencia'],
                $registro['iniciativa'],
                $registro['coragem'],                
                $registro['responsabilidade'],
                $registro['disciplina'],
                $registro['equilibrio_emocional'],
                $registro['entusiasmo_profissional'],
                $registro['matricula_cfc'],
                $registro['punido'],
                $registro['avaliacao_global'],
                $registro['id_militar'],
                $registro['data'],
                $registro['id_avaliacao'],
            );
        }
        return $objetos;
    }

     public static function buscarPelotao($pelotao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_PELOTAO);
        $comando->bindValue(1, $pelotao, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Avaliacao(
                $registro['cooperacao'],
                $registro['autoconfianca'],
                $registro['persistencia'],
                $registro['iniciativa'],
                $registro['coragem'],                
                $registro['responsabilidade'],
                $registro['disciplina'],
                $registro['equilibrio_emocional'],
                $registro['entusiasmo_profissional'],
                $registro['matricula_cfc'],
                $registro['punido'],
                $registro['avaliacao_global'],
                $registro['id_militar'],
                $registro['data'],
                $registro['id_avaliacao'],
            );
        }
        return $objetos;
    }

    public static function buscarAvaliacaoSuPesquisa($pesquisa, $id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_SU_PESQUISA);
        $comando->bindValue(1, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(2, $pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(3, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Avaliacao(
                $registro['cooperacao'],
                $registro['autoconfianca'],
                $registro['persistencia'],
                $registro['iniciativa'],
                $registro['coragem'],                
                $registro['responsabilidade'],
                $registro['disciplina'],
                $registro['equilibrio_emocional'],
                $registro['entusiasmo_profissional'],
                $registro['matricula_cfc'],
                $registro['punido'],
                $registro['avaliacao_global'],
                $registro['id_militar'],
                $registro['data'],
                $registro['id_avaliacao'],
            );
        }
        return $objetos;
    }

    public static function buscarAvaliacaoPelotaoPesquisa($pesquisa, $pelotao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_PELOTAO_PESQUISA);
        $comando->bindValue(1, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(2, $pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(3, $pelotao, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Avaliacao(
                $registro['cooperacao'],
                $registro['autoconfianca'],
                $registro['persistencia'],
                $registro['iniciativa'],
                $registro['coragem'],                
                $registro['responsabilidade'],
                $registro['disciplina'],
                $registro['equilibrio_emocional'],
                $registro['entusiasmo_profissional'],
                $registro['matricula_cfc'],
                $registro['punido'],
                $registro['avaliacao_global'],
                $registro['id_militar'],
                $registro['data'],
                $registro['id_avaliacao'],
            );
        }
        return $objetos;
    }

    public static function destruir($id_avaliacao)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_avaliacao, PDO::PARAM_INT);
        $comando->execute();
    }
}
