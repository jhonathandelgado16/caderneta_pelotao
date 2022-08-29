<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Militar extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM militar order by numero';
    const BUSCAR_ID = 'SELECT * FROM militar WHERE id_militar = ? order by numero';
    const BUSCAR_NOME = 'SELECT * FROM militar WHERE nome LIKE ? order by numero';
    const BUSCAR_NOME_NUMERO = 'SELECT * FROM militar WHERE nome_guerra LIKE ? or numero LIKE ?';
    const BUSCAR_NOME_NUMERO_SU = 'SELECT * FROM militar WHERE (nome_guerra LIKE ? or numero LIKE ?) AND id_su = ? order by numero';
    const BUSCAR_NOME_NUMERO_PELOTAO = 'SELECT * FROM militar WHERE (nome_guerra LIKE ? or numero LIKE ?) AND pelotao = ? order by numero';
    const BUSCAR_QUALIFICACAO_MILITAR = 'SELECT * FROM militar WHERE id_qualificacao_militar = ? order by numero';
    const BUSCAR_QUALIFICACAO_MILITAR_SU = 'SELECT * FROM militar WHERE id_qualificacao_militar = ? AND id_su = ? order by numero';
    const BUSCAR_SU = 'SELECT * FROM militar WHERE id_su = ? order by numero';
    const BUSCAR_PEL = 'SELECT * FROM militar WHERE pelotao = ? order by numero';
    const INSERIR = 'INSERT INTO militar(nome, nome_guerra, numero, idt_militar, cpf, endereco, id_su, id_posto_grad, pelotao, id_qualificacao_militar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE militar SET nome = ?, nome_guerra = ?, numero = ?, idt_militar = ?, cpf = ?, endereco = ?, id_su = ?, id_posto_grad = ?, pelotao = ?, id_qualificacao_militar = ? WHERE id_militar = ?';
    const DELETAR = 'DELETE FROM militar WHERE id_militar = ?';

    # PESQUISAS PARA O RELATÓRIO
    const MILITARES_SU = 'SELECT COUNT(id_militar) AS resultado from militar where id_su = ?';

    const POSSUEM_VISITA_MEDICA = 'SELECT COUNT(id_militar) AS resultado FROM visita_medica';
    const POSSUEM_VISITA_MEDICA_SU = 'SELECT COUNT(id_militar) AS resultado FROM visita_medica JOIN militar USING(id_militar) WHERE id_su = ?';
    const VISITA_MEDICA_MES = 'SELECT COUNT(id_militar) AS resultado FROM visita_medica WHERE MONTH(visita_medica.data) = ?';


    const POSSUEM_VACINACAO = 'SELECT COUNT(id_militar) AS resultado FROM vacinacao';
    const POSSUEM_VACINACAO_SU = 'SELECT COUNT(id_militar) AS resultado FROM vacinacao JOIN militar USING(id_militar) WHERE id_su = ?';
    const QUANTIDADE_VACINADOS_VACINA = 'SELECT COUNT(id_militar) AS resultado FROM vacinacao WHERE id_vacinacao = ?';

    const PUNICOES_OM = 'SELECT COUNT(id_militar) AS resultado from punicao where punicao = ? AND YEAR(CURDATE()) = YEAR(data_inicio)';
    const PUNICOES_SU = 'SELECT COUNT(id_militar) AS resultado from punicao JOIN militar USING(id_militar) where punicao = ? and id_su = ?  AND YEAR(CURDATE()) = YEAR(data_inicio)';

    const RECOMPENSAS_OM = 'SELECT COUNT(id_militar) AS resultado from recompensa where recompensa = ? AND YEAR(CURDATE()) = YEAR(data)';
    const RECOMPENSAS_SU = 'SELECT COUNT(id_militar) AS resultado from recompensa JOIN militar USING(id_militar) where recompensa = ? and id_su = ?  AND YEAR(CURDATE()) = YEAR(data)';


    const AVALIACOES_OM = 'SELECT COUNT(id_militar) AS resultado from militar WHERE id_militar IN (SELECT id_militar from avaliacao where avaliacao_global = ? AND YEAR(CURDATE()) = YEAR(data))';
    const AVALIACOES_SU = 'SELECT COUNT(id_militar) AS resultado from militar WHERE id_militar IN (SELECT id_militar from avaliacao where avaliacao_global = ? AND YEAR(CURDATE()) = YEAR(data)) AND id_su = ?';
    const NAO_POSSUEM_AVALIACOES_SU = 'SELECT COUNT(id_militar) AS resultado FROM militar WHERE id_militar NOT IN (SELECT id_militar FROM avaliacao) AND id_su = ?';
    const NAO_POSSUEM_AVALIACOES = 'SELECT COUNT(id_militar) AS resultado FROM militar WHERE id_militar NOT IN (SELECT id_militar FROM avaliacao)';
    const MATRICULA_CFC = 'SELECT COUNT(id_militar) AS resultado from militar WHERE id_militar IN (SELECT id_militar from avaliacao where matricula_cfc = 1 AND YEAR(CURDATE()) = YEAR(data))';


    const TAF_OM = 'SELECT COUNT(id_militar) AS resultado from militar WHERE id_militar IN (SELECT id_militar from ficha_taf JOIN periodo_taf USING (id_periodo_taf) where UPPER(conceito) = ? AND YEAR(CURDATE()) = YEAR(data))';
    const TAF_SU = 'SELECT COUNT(id_militar) AS resultado from militar WHERE id_militar IN (SELECT id_militar from ficha_taf JOIN periodo_taf USING (id_periodo_taf) where UPPER(conceito) = ? AND YEAR(CURDATE()) = YEAR(data)) AND id_su = ?';
    const NAO_POSSUEM_TAF_SU = 'SELECT COUNT(id_militar) AS resultado FROM militar WHERE id_militar NOT IN (SELECT id_militar FROM ficha_taf) AND id_su = ?';
    const NAO_POSSUEM_TAF = 'SELECT COUNT(id_militar) AS resultado FROM militar WHERE id_militar NOT IN (SELECT id_militar FROM ficha_taf)';
    const SUFICIENTE = 'SELECT COUNT(id_militar) AS resultado from militar WHERE id_militar IN (SELECT id_militar from ficha_taf JOIN periodo_taf USING (id_periodo_taf) where suficiencia = 1 AND YEAR(CURDATE()) = YEAR(data))';


    const INSTRUCOES_FASE = 'SELECT COUNT(id_instrucao) AS resultado FROM instrucao WHERE id_instrucao IN (SELECT id_instrucao FROM instrucao_militar JOIN militar USING(id_militar)) AND fase = ?;';
    const INSTRUCOES_FASE_SU = 'SELECT COUNT(id_instrucao) AS resultado FROM instrucao WHERE id_instrucao IN (SELECT id_instrucao FROM instrucao_militar JOIN militar USING(id_militar) where id_su = ?) AND fase = ?;';
    const NAO_POSSUEM_INSTRUCOES_FASE = 'SELECT COUNT(id_instrucao) AS resultado FROM instrucao WHERE id_instrucao NOT IN (SELECT id_instrucao FROM instrucao_militar JOIN militar USING(id_militar)) AND fase = ?;';
    const NAO_POSSUEM_INSTRUCOES_FASE_SU = 'SELECT COUNT(id_instrucao) AS resultado FROM instrucao WHERE id_instrucao NOT IN (SELECT id_instrucao FROM instrucao_militar JOIN militar USING(id_militar) where id_su = ?) AND fase = ?;';
    #

    private $id;
    private $nome;
    private $nome_guerra;
    private $numero;
    private $idt_militar;
    private $cpf;
    private $endereco;
    private $id_su;    
    private $su;  
    private $id_posto_grad;
    private $posto_grad;  
    private $pelotao;
    private $id_qualificacao_militar;
    private $qualificacao_militar;

    public function __construct($nome = null, $nome_guerra = null, $numero = null, $idt_militar = null, $cpf = null, $endereco = null, $id_su = null, $id_posto_grad = null, $pelotao = null, $id_qualificacao_militar = null, $id = null)
    {
        $this->nome = $nome;
        $this->nome_guerra = $nome_guerra;
        $this->numero = $numero;
        $this->idt_militar = $idt_militar;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->id_su = $id_su;
        $this->id_posto_grad = $id_posto_grad;
        $this->pelotao = $pelotao;
        $this->id_qualificacao_militar = $id_qualificacao_militar;
        $this->id = $id;
    }

    public function getMilitarCompleto()
    {
        return $this->getPostoGrad()->getPostoGrad().' '.$this->numero.' '.$this->nome_guerra;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNomeGuerra()
    {
        return $this->nome_guerra;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getIdtMilitar()
    {
        return $this->idt_militar;
    }    

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getIdSu()
    {
        return $this->id_su;
    }

    public function getIdPostoGrad()
    {
        return $this->id_posto_grad;
    }

    public function getPostoGrad()
    {
        if ($this->posto_grad == null) {
            $this->posto_grad = PostoGraduacao::buscarId($this->id_posto_grad);
        }
        return $this->posto_grad;
    }

     public function getId()
    {
        return $this->id;

    }

    public function getSu()
    {
        if ($this->su == null) {
            $this->su = Su::buscarId($this->id_su);
        }
        return $this->su;
    }

    public function getPelotao(){
        return $this->pelotao;
    }

    public function getConversaoPelotao(){
        switch ($this->pelotao) {
            case 'pelotaoforpron':
                    return 'Pelotão Forpron';
                break;
            case '1ºpelotao':
                    return '1º Pelotão';
                break;
            case '2ºpelotao':
                    return '2º Pelotão';
                break;
            case '3ºpelotao':
                    return '3º Pelotão';
                break;
            case '4ºpelotao':
                    return '4º Pelotão';
                break;
            case '5ºpelotao':
                    return '5º Pelotão';
                break;
            case '6ºpelotao':
                    return '6º Pelotão';
                break;
        }
    }

    public function getIdQualificacaoMilitar()
    {
        return $this->id_qualificacao_militar;
    }

    public function getQualificacaoMilitar()
    {
        if ($this->qualificacao_militar == null) {
            $this->qualificacao_militar = QualificacaoMilitar::buscarId($this->id_qualificacao_militar);
        }
        return $this->qualificacao_militar;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setNomeGuerra($nome_guerra)
    {
        $this->nome_guerra = $nome_guerra;
    }


    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setIdtMilitar($idt_militar)
    {
        $this->idt_militar = $idt_militar;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setIdSu($id_su)
    {
        $this->id_su = $id_su;
    }

    public function setIdPostoGrad($id_posto_grad)
    {
        $this->id_posto_grad = $id_posto_grad;
    }

    public function setPelotao($pelotao){
        $this->pelotao = $pelotao;
    }

    public function setIdQualificacaoMilitar($id_qualificacao_militar)
    {
        $this->id_qualificacao_militar = $id_qualificacao_militar;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->nome_guerra, PDO::PARAM_STR);
        $comando->bindValue(3, $this->numero, PDO::PARAM_STR);
        $comando->bindValue(4, $this->idt_militar, PDO::PARAM_STR);
        $comando->bindValue(5, $this->cpf, PDO::PARAM_STR);
        $comando->bindValue(6, $this->endereco, PDO::PARAM_STR);
        $comando->bindValue(7, $this->id_su, PDO::PARAM_STR);
        $comando->bindValue(8, $this->id_posto_grad, PDO::PARAM_STR);
        $comando->bindValue(9, $this->pelotao, PDO::PARAM_STR);
        $comando->bindValue(10, $this->id_qualificacao_militar, PDO::PARAM_STR);
        $comando->execute();
        $this->id_militar = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->nome_guerra, PDO::PARAM_STR);
        $comando->bindValue(3, $this->numero, PDO::PARAM_STR);
        $comando->bindValue(4, $this->idt_militar, PDO::PARAM_STR);
        $comando->bindValue(5, $this->cpf, PDO::PARAM_STR);
        $comando->bindValue(6, $this->endereco, PDO::PARAM_STR);
        $comando->bindValue(7, $this->id_su, PDO::PARAM_STR);
        $comando->bindValue(8, $this->id_posto_grad, PDO::PARAM_INT);
        $comando->bindValue(9, $this->pelotao, PDO::PARAM_STR);
        $comando->bindValue(10, $this->id_qualificacao_militar, PDO::PARAM_STR);
        $comando->bindValue(11, $this->id, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
        );
    }

    public static function buscarMilitar($militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME);
        $comando->bindValue(1, $militar, PDO::PARAM_STR);
        $comando->execute();
        $registro = $comando->fetch();
        $militar = null;
        if ($registro) {
            $militar = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $militar;
    }

    public static function buscarMilitarNumero($pesquisa)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME_NUMERO);
        $comando->bindValue(1, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(2, $pesquisa.'%', PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
    }

    public static function buscarMilitarSu($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $objetos = [];
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
        
    }

    public static function buscarMilitarNumeroSu($pesquisa, $id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME_NUMERO_SU);
        $comando->bindValue(1, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(2, $pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(3, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
    }

    public static function buscarMilitarNumeroPelotao($pesquisa, $pelotao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_NOME_NUMERO_PELOTAO);
        $comando->bindValue(1, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(2, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(3, $pelotao, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
    }

    public static function buscarMilitarPelotao($pelotao)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_PEL);
        $comando->bindValue(1, $pelotao, PDO::PARAM_STR);
        $comando->execute();
        $objetos = [];
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
        
    }

    public static function buscarQualificacaoMilitar($id_qualificacao_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_QUALIFICACAO_MILITAR);
        $comando->bindValue(1, $id_qualificacao_militar, PDO::PARAM_STR);
        $comando->execute();
        $objetos = [];
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
        
    }

    public static function buscarQualificacaoMilitarSu($id_qualificacao_militar, $id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_QUALIFICACAO_MILITAR_SU);
        $comando->bindValue(1, $id_qualificacao_militar, PDO::PARAM_STR);
        $comando->bindValue(2, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $objetos = [];
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $objetos[] = new Militar(
                $registro['nome'],
                $registro['nome_guerra'],
                $registro['numero'],
                $registro['idt_militar'],
                $registro['cpf'],
                $registro['endereco'],
                $registro['id_su'],
                $registro['id_posto_grad'],
                $registro['pelotao'],
                $registro['id_qualificacao_militar'],
                $registro['id_militar'],
            );
        }
        return $objetos;
        
    }

    # PESQUISAS RELATÓRIO

    public static function militaresSu($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::MILITARES_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }

    # VISITA MEDICA

    public static function possuemVisitaMedica()
    {
        $comando = DW3BancoDeDados::prepare(self::POSSUEM_VISITA_MEDICA);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }

    public static function possuemVisitaMedicaSu($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::POSSUEM_VISITA_MEDICA_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }

    public static function visitaMedicaMes($mes)
    {
        $comando = DW3BancoDeDados::prepare(self::VISITA_MEDICA_MES);
        $comando->bindValue(1, $mes, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }

    # Vacinas

     public static function possuemVacinacao()
    {
        $comando = DW3BancoDeDados::prepare(self::POSSUEM_VACINACAO);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }

    public static function possuemVacinacaoSu($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::POSSUEM_VACINACAO_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }

    public static function quantidadeVacinadosVacina($id_vacina)
    {
        $comando = DW3BancoDeDados::prepare(self::QUANTIDADE_VACINADOS_VACINA);
        $comando->bindValue(1, $id_vacina, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }

    # Punições
    public static function quantidadePunicaoOM()
    {
        $resposta_punicoes = [];

        $punicoes = ['fo-', 'advertencia', 'impedimento', 'repreensao', 'detencao', 'prisao'];

        $punicoes_convert = ['fo-' => 'FO-', 'advertencia' => 'Advertência', 'impedimento' => 'Impedimento', 'repreensao' => 'Repreensão', 'detencao' => 'Detenção', 'prisao' => 'Prisão'];

        foreach ($punicoes as $punicao) {
            $comando = DW3BancoDeDados::prepare(self::PUNICOES_OM);
            $comando->bindValue(1, $punicao, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_punicoes,['punicao' => $punicoes_convert[$punicao], 'qtd' => $registro['resultado']]);
            }                
        }

        return $resposta_punicoes;            
    }

    public static function quantidadePunicaoSu($id_su)
    {
        $resposta_punicoes = [];

        $punicoes = ['fo-', 'advertencia', 'impedimento', 'repreensao', 'detencao', 'prisao'];

        $punicoes_convert = ['fo-' => 'FO-', 'advertencia' => 'Advertência', 'impedimento' => 'Impedimento', 'repreensao' => 'Repreensão', 'detencao' => 'Detenção', 'prisao' => 'Prisão'];

        foreach ($punicoes as $punicao) {
            $comando = DW3BancoDeDados::prepare(self::PUNICOES_SU);
            $comando->bindValue(1, $punicao, PDO::PARAM_STR);
            $comando->bindValue(2, $id_su, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_punicoes,['punicao' => $punicoes_convert[$punicao], 'qtd' => $registro['resultado']]);
            }                
        }

        return $resposta_punicoes;            
    }

    # recompensa
    public static function quantidadeRecompensaOM()
    {
        $resposta_recompensa = [];

        $recompensas = ['Referência Elogiosa', 'Elogio', 'FO+', 'Dispensa como Recompensa'];

        foreach ($recompensas as $recompensa) {
            $comando = DW3BancoDeDados::prepare(self::RECOMPENSAS_OM);
            $comando->bindValue(1, $recompensa, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_recompensa,['recompensa' => $recompensa, 'qtd' => $registro['resultado']]);
            }                
        }

        return $resposta_recompensa;            
    }

    public static function quantidadeRecompensaSu($id_su)
    {
        $resposta_recompensas = [];

        $recompensas = ['Referência Elogiosa', 'Elogio', 'FO+', 'Dispensa como Recompensa'];

        foreach ($recompensas as $recompensa) {
            $comando = DW3BancoDeDados::prepare(self::RECOMPENSAS_SU);
            $comando->bindValue(1, $recompensa, PDO::PARAM_STR);
            $comando->bindValue(2, $id_su, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_recompensas,['recompensa' => $recompensa, 'qtd' => $registro['resultado']]);
            }                
        }

        return $resposta_recompensas;            
    }

    # avaliação

    public static function quantidadeAvaliacoesOM()
    {
        $resposta_avaliacao = [];

        $avaliacoes_global = ['I', 'R', 'B', 'MB'];

        foreach ($avaliacoes_global as $avaliacao) {
            $comando = DW3BancoDeDados::prepare(self::AVALIACOES_OM);
            $comando->bindValue(1, $avaliacao, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_avaliacao,['avaliacao' => $avaliacao, 'qtd' => $registro['resultado']]);
            }                
        }

        $comando = DW3BancoDeDados::prepare(self::NAO_POSSUEM_AVALIACOES);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            array_push($resposta_avaliacao,['avaliacao' => 'Não possuem', 'qtd' => $registro['resultado']]);
        }     

        return $resposta_avaliacao;            
    }

    public static function quantidadeAvaliacoesSu($id_su)
    {
        $resposta_avaliacao = [];

        $avaliacoes_global = ['I', 'R', 'B', 'MB'];

        foreach ($avaliacoes_global as $avaliacao) {
            $comando = DW3BancoDeDados::prepare(self::AVALIACOES_SU);
            $comando->bindValue(1, $avaliacao, PDO::PARAM_STR);
            $comando->bindValue(2, $id_su, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_avaliacao,['avaliacao' => $avaliacao, 'qtd' => $registro['resultado']]);
            }                
        }

        $comando = DW3BancoDeDados::prepare(self::NAO_POSSUEM_AVALIACOES_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            array_push($resposta_avaliacao,['avaliacao' => 'Não possuem', 'qtd' => $registro['resultado']]);
        }   



        return $resposta_avaliacao;           
    }

    public static function matriculaCfc()
    {
        $comando = DW3BancoDeDados::prepare(self::MATRICULA_CFC);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }
    # 

    # TAF

    public static function quantidadeTafOM()
    {
        $resposta_taf = [];

        $conceito_global = ['I', 'R', 'B', 'MB', 'E'];

        foreach ($conceito_global as $conceito) {
            $comando = DW3BancoDeDados::prepare(self::TAF_OM);
            $comando->bindValue(1, $conceito, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_taf,['conceito' => $conceito, 'qtd' => $registro['resultado']]);
            }                
        }

        $comando = DW3BancoDeDados::prepare(self::NAO_POSSUEM_TAF);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            array_push($resposta_taf,['conceito' => 'Não possuem', 'qtd' => $registro['resultado']]);
        }     

        return $resposta_taf;            
    }

    public static function quantidadeTafSu($id_su)
    {
        $resposta_taf = [];

        $conceito_global = ['I', 'R', 'B', 'MB', 'E'];

        foreach ($conceito_global as $conceito) {
            $comando = DW3BancoDeDados::prepare(self::TAF_SU);
            $comando->bindValue(1, $conceito, PDO::PARAM_STR);
            $comando->bindValue(2, $id_su, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_taf,['conceito' => $conceito, 'qtd' => $registro['resultado']]);
            }                
        }

        $comando = DW3BancoDeDados::prepare(self::NAO_POSSUEM_TAF_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            array_push($resposta_taf,['conceito' => 'Não possuem', 'qtd' => $registro['resultado']]);
        }   

        return $resposta_taf;           
    }

    public static function suficienteTaf()
    {
        $comando = DW3BancoDeDados::prepare(self::SUFICIENTE);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            $resposta = $registro['resultado'];
        }
        return $resposta;        
    }
    #


    # INSTRUÇÕES

    public static function quantidadeInstrucoesFaseOM($fase)
    {
        $resposta_instrucoes = [];

            $comando = DW3BancoDeDados::prepare(self::INSTRUCOES_FASE);
            $comando->bindValue(1, $fase, PDO::PARAM_STR);
            $comando->execute();
            $resposta = 0;
            $registros = $comando->fetchAll();
            foreach ($registros as $registro) {
                array_push($resposta_instrucoes,['fase' => $fase, 'qtd' => $registro['resultado']]);
            }              

        $comando = DW3BancoDeDados::prepare(self::NAO_POSSUEM_INSTRUCOES_FASE);
        $comando->bindValue(1, $fase, PDO::PARAM_STR);
        $comando->execute();
        $resposta = 0;
        $registros = $comando->fetchAll();
        foreach ($registros as $registro) {
            array_push($resposta_instrucoes,['fase' => 'Não foram realizadas', 'qtd' => $registro['resultado']]);
        }     

        return $resposta_instrucoes;            
    }
    #  

    public static function destruir($id)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id, PDO::PARAM_INT);
        $comando->execute();
    }
}
