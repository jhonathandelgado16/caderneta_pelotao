<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Taf extends Modelo
{
    const BUSCAR_TODOS = 'SELECT * FROM ficha_taf';
    const BUSCAR_ID = 'SELECT * FROM ficha_taf WHERE id_ficha_taf = ?';
    const BUSCAR_SU = 'SELECT * FROM ficha_taf JOIN militar USING(id_militar) WHERE id_su = ?';
    const BUSCAR_SU_PERIODO = 'SELECT * FROM ficha_taf JOIN militar USING(id_militar) WHERE id_su = ? AND id_periodo_taf = ?';
    const BUSCAR_PERIODO = 'SELECT * FROM ficha_taf JOIN militar USING(id_militar) WHERE id_periodo_taf = ?';
    const BUSCAR_SU_PESQUISA = 'SELECT * FROM ficha_taf JOIN militar USING(id_militar) WHERE (nome_guerra LIKE ? or numero LIKE ?) AND id_su = ? AND id_periodo_taf = ?';
    const BUSCAR_ID_MILITAR = 'SELECT * FROM ficha_taf JOIN periodo_taf USING(id_periodo_taf) WHERE id_militar = ? ORDER BY periodo_taf.data';
    const INSERIR = 'INSERT INTO ficha_taf(corrida, flexao, abdominal, barra, ppm, ind_corrida, ind_flexao, ind_abdominal, ind_barra, ind_ppm, suficiencia, id_militar, id_periodo_taf, conceito) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    const ATUALIZAR = 'UPDATE ficha_taf SET corrida = ?, flexao = ?, abdominal = ?, barra = ?, ppm = ?, ind_corrida = ?, ind_flexao = ?, ind_abdominal = ?, ind_barra = ?, ind_ppm = ?, suficiencia = ?, id_militar = ?, id_periodo_taf = ?, conceito = ? WHERE id_ficha_taf = ?';
    const DELETAR = 'DELETE FROM ficha_taf WHERE id_ficha_taf = ?';
    private $corrida;
    private $flexao;
    private $abdominal;
    private $barra;
    private $ppm;
    private $ind_corrida;
    private $ind_flexao;
    private $ind_abdominal;
    private $ind_barra;
    private $ind_ppm;
    private $id_militar;
    private $id_periodo_taf;
    private $conceito;
    private $id_ficha_taf;
    private $militar;
    private $periodo_taf;

    public function __construct(
        $corrida = null, 
        $flexao = null, 
        $abdominal = null, 
        $barra = null, 
        $ppm = null,
        $ind_corrida = null, 
        $ind_flexao = null, 
        $ind_abdominal = null, 
        $ind_barra = null, 
        $ind_ppm = null,
        $suficiencia = null,
        $id_militar = null,
        $id_periodo_taf = null,
        $conceito = null,
        $id_ficha_taf = null,
    ) {
        $this->corrida = $corrida;
        $this->flexao = $flexao;
        $this->abdominal = $abdominal;
        $this->barra = $barra;
        $this->ppm = $ppm;
        $this->ind_corrida = $ind_corrida;
        $this->ind_flexao = $ind_flexao;
        $this->ind_abdominal = $ind_abdominal;
        $this->ind_barra = $ind_barra;
        $this->ind_ppm = $ind_ppm;
        $this->suficiencia = $suficiencia;
        $this->id_militar = $id_militar;
        $this->id_periodo_taf = $id_periodo_taf;
        $this->conceito = $conceito;
        $this->id_ficha_taf = $id_ficha_taf;

    }

     public function getIdTaf()
    {
        return $this->id_ficha_taf;
    }

    public function getCorrida()
    {
        return $this->corrida;
    }

    public function getFlexao()
    {
        return $this->flexao;
    }

    public function getAbdominal()
    {
        return $this->abdominal;
    }

    public function getBarra()
    {
        return $this->barra;
    }    

    public function getPpm()
    {
        return $this->ppm;
    }

     public function getIndCorrida()
    {
        return $this->ind_corrida;
    }

    public function getIndFlexao()
    {
        return $this->ind_flexao;
    }

    public function getIndAbdominal()
    {
        return $this->ind_abdominal;
    }

    public function getIndBarra()
    {
        return $this->ind_barra;
    }    

    public function getIndPpm()
    {
        return $this->ind_ppm;
    }

     public function getSuficiencia()
    {
        return $this->suficiencia;
    }


      public function getSuficienciaConversao()
    {   
        if($this->suficiencia == 1){
            return 'Suficiente';
        }
        return 'Insuficiente';
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

    public function getIdPeriodoTaf()
    {
        return $this->id_periodo_taf;
    }   

    public function getPeriodoTaf()
    {
        if ($this->periodo_taf == null) {
            $this->periodo_taf = PeriodoTaf::buscarId($this->id_periodo_taf);
        }
        return $this->periodo_taf;
    } 

    public function getConceito()
    {
        return $this->conceito;
    }  

    public function setCorrida($corrida)
    {
        $this->corrida = $corrida;
    }

    public function setFlexao($flexao)
    {
        $this->flexao = $flexao;
    }

    public function setAbdominal($abdominal)
    {
        $this->abdominal = $abdominal;
    }

    public function setBarra($barra)
    {
        $this->barra = $barra;
    }

    public function setPpm($ppm)
    {
        $this->ppm = $ppm;
    }

    public function setIndCorrida($ind_corrida)
    {
        $this->ind_corrida = $ind_corrida;
    }

    public function setIndFlexao($ind_flexao)
    {
        $this->ind_flexao = $ind_flexao;
    }

    public function setIndAbdominal($ind_abdominal)
    {
        $this->ind_abdominal = $ind_abdominal;
    }

    public function setIndBarra($ind_barra)
    {
        $this->ind_barra = $ind_barra;
    }

    public function setIndPpm($ind_ppm)
    {
        $this->ind_ppm = $ind_ppm;
    }

    public function setSuficiencia($suficiencia)
    {
        $this->suficiencia = $suficiencia;
    }

    public function setConceito($conceito)
    {
        $this->conceito = $conceito;
    }

    public function setIdPeriodoTaf($id_periodo_taf)
    {
        $this->id_periodo_taf = $id_periodo_taf;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);        
        $comando->bindValue(1, $this->corrida, PDO::PARAM_STR);
        $comando->bindValue(2, $this->flexao, PDO::PARAM_STR);
        $comando->bindValue(3, $this->abdominal, PDO::PARAM_STR);
        $comando->bindValue(4, $this->barra, PDO::PARAM_STR);
        $comando->bindValue(5, $this->ppm, PDO::PARAM_STR);
        $comando->bindValue(6, $this->ind_corrida, PDO::PARAM_STR);
        $comando->bindValue(7, $this->ind_flexao, PDO::PARAM_STR);
        $comando->bindValue(8, $this->ind_abdominal, PDO::PARAM_STR);
        $comando->bindValue(9, $this->ind_barra, PDO::PARAM_STR);
        $comando->bindValue(10, $this->ind_ppm, PDO::PARAM_STR);
        $comando->bindValue(11, $this->suficiencia, PDO::PARAM_STR);
        $comando->bindValue(12, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(13, $this->id_periodo_taf, PDO::PARAM_STR);
        $comando->bindValue(14, $this->conceito, PDO::PARAM_STR);
        $comando->execute();
        $this->id_ficha_taf = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function inserirVarios($militares)
    {
        $query = "INSERT INTO ficha_taf(corrida, flexao, abdominal, barra, ppm, ind_corrida, ind_flexao, ind_abdominal, ind_barra, ind_ppm, suficiencia, id_militar, id_periodo_taf, conceito) VALUES ";

        #0 = id_militar, 1 = ind_corrida, 2 = corrida, 3 = ind_flexao, 4 = flexao, 5 = ind_abdominal, 6 = abdominal, 7 = ind_barra, 8 = barra, 9 = ind_ppm, 10 = ppm, 11 = suficiencia, 12 = conceito, 13 = id_periodo_taf

        $possui_informacoes = false;

        for ($i = 0; $i < count($militares) ; $i++) { 

            $array = $militares[$i];

            if ($array[0] != 0) {
                    $query .= "('$array[2]', '$array[4]', '$array[6]', '$array[8]', '$array[10]', '$array[1]', '$array[3]', '$array[5]', '$array[7]', '$array[9]', '$array[11]', '$array[0]', '$array[13]', '$array[12]'), ";
                    $possui_informacoes = true;
            }            
        }

        $query_final = rtrim($query, ", ");

        DW3BancoDeDados::getPdo()->beginTransaction();
        if($possui_informacoes){
            $comando = DW3BancoDeDados::prepare($query_final);        
            $comando->execute();
            $this->id_ficha_taf = DW3BancoDeDados::getPdo()->lastInsertId();
            DW3BancoDeDados::getPdo()->commit();
        }
        
    }

    public function atualizar()
    {
        $comando = DW3BancoDeDados::prepare(self::ATUALIZAR);
        $comando->bindValue(1, $this->corrida, PDO::PARAM_STR);
        $comando->bindValue(2, $this->flexao, PDO::PARAM_STR);
        $comando->bindValue(3, $this->abdominal, PDO::PARAM_STR);
        $comando->bindValue(4, $this->barra, PDO::PARAM_STR);
        $comando->bindValue(5, $this->ppm, PDO::PARAM_STR);
        $comando->bindValue(6, $this->ind_corrida, PDO::PARAM_STR);
        $comando->bindValue(7, $this->ind_flexao, PDO::PARAM_STR);
        $comando->bindValue(8, $this->ind_abdominal, PDO::PARAM_STR);
        $comando->bindValue(9, $this->ind_barra, PDO::PARAM_STR);
        $comando->bindValue(10, $this->ind_ppm, PDO::PARAM_STR);
        $comando->bindValue(11, $this->suficiencia, PDO::PARAM_STR);
        $comando->bindValue(12, $this->id_militar, PDO::PARAM_STR);
        $comando->bindValue(13, $this->id_periodo_taf, PDO::PARAM_STR);
        $comando->bindValue(14, $this->conceito, PDO::PARAM_STR);
        $comando->bindValue(15, $this->id_ficha_taf, PDO::PARAM_STR);
        $comando->execute();
    }

    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Taf(
                $registro['corrida'],
                $registro['flexao'],
                $registro['abdominal'],
                $registro['barra'],
                $registro['ppm'],                
                $registro['ind_corrida'],
                $registro['ind_flexao'],
                $registro['ind_abdominal'],
                $registro['ind_barra'],
                $registro['ind_ppm'],
                $registro['suficiencia'],
                $registro['id_militar'],
                $registro['id_periodo_taf'],
                $registro['conceito'],
                $registro['id_ficha_taf'],
            );
        }
        return $objetos;
    }

    public static function buscarId($id_indice_taf)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID);
        $comando->bindValue(1, $id_indice_taf, PDO::PARAM_INT);
        $comando->execute();
        $registro = $comando->fetch();
        return new Taf(
                $registro['corrida'],
                $registro['flexao'],
                $registro['abdominal'],
                $registro['barra'],
                $registro['ppm'],                
                $registro['ind_corrida'],
                $registro['ind_flexao'],
                $registro['ind_abdominal'],
                $registro['ind_barra'],
                $registro['ind_ppm'],
                $registro['suficiencia'],
                $registro['id_militar'],
                $registro['id_periodo_taf'],
                $registro['conceito'],
                $registro['id_ficha_taf'],
        );
    }

    public static function buscarTaf($id_su)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_SU);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Taf(
                $registro['corrida'],
                $registro['flexao'],
                $registro['abdominal'],
                $registro['barra'],
                $registro['ppm'],                
                $registro['ind_corrida'],
                $registro['ind_flexao'],
                $registro['ind_abdominal'],
                $registro['ind_barra'],
                $registro['ind_ppm'],
                $registro['suficiencia'],
                $registro['id_militar'],
                $registro['id_periodo_taf'],
                $registro['conceito'],
                $registro['id_ficha_taf'],
            );
        }
        return $objetos;
    }

    public static function buscarTafMilitar($id_militar)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_ID_MILITAR);
        $comando->bindValue(1, $id_militar, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Taf(
                $registro['corrida'],
                $registro['flexao'],
                $registro['abdominal'],
                $registro['barra'],
                $registro['ppm'],                
                $registro['ind_corrida'],
                $registro['ind_flexao'],
                $registro['ind_abdominal'],
                $registro['ind_barra'],
                $registro['ind_ppm'],
                $registro['suficiencia'],
                $registro['id_militar'],
                $registro['id_periodo_taf'],
                $registro['conceito'],
                $registro['id_ficha_taf'],
            );
        }
        return $objetos;
    }

    public static function buscarTafSuPesquisa($pesquisa, $id_su, $id_periodo_taf)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_SU_PESQUISA);
        $comando->bindValue(1, '%'.$pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(2, $pesquisa.'%', PDO::PARAM_STR);
        $comando->bindValue(3, $id_su, PDO::PARAM_STR);
        $comando->bindValue(4, $id_periodo_taf, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Taf(
                $registro['corrida'],
                $registro['flexao'],
                $registro['abdominal'],
                $registro['barra'],
                $registro['ppm'],                
                $registro['ind_corrida'],
                $registro['ind_flexao'],
                $registro['ind_abdominal'],
                $registro['ind_barra'],
                $registro['ind_ppm'],
                $registro['suficiencia'],
                $registro['id_militar'],
                $registro['id_periodo_taf'],
                $registro['conceito'],
                $registro['id_ficha_taf'],
            );
        }
        return $objetos;
    }

    public static function buscarTafSuPeriodo($id_su, $id_periodo_taf)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_SU_PERIODO);
        $comando->bindValue(1, $id_su, PDO::PARAM_STR);
        $comando->bindValue(2, $id_periodo_taf, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Taf(
                $registro['corrida'],
                $registro['flexao'],
                $registro['abdominal'],
                $registro['barra'],
                $registro['ppm'],                
                $registro['ind_corrida'],
                $registro['ind_flexao'],
                $registro['ind_abdominal'],
                $registro['ind_barra'],
                $registro['ind_ppm'],
                $registro['suficiencia'],
                $registro['id_militar'],
                $registro['id_periodo_taf'],
                $registro['conceito'],
                $registro['id_ficha_taf'],
            );
        }
        return $objetos;
    }

    public static function buscarTafPeriodo($id_periodo_taf)
    {
        $comando = DW3BancoDeDados::prepare(self::BUSCAR_PERIODO);
        $comando->bindValue(1, $id_periodo_taf, PDO::PARAM_STR);
        $comando->execute();
        $registros = $comando->fetchAll();
        $objetos = [];
        foreach ($registros as $registro) {
            $objetos[] = new Taf(
                $registro['corrida'],
                $registro['flexao'],
                $registro['abdominal'],
                $registro['barra'],
                $registro['ppm'],                
                $registro['ind_corrida'],
                $registro['ind_flexao'],
                $registro['ind_abdominal'],
                $registro['ind_barra'],
                $registro['ind_ppm'],
                $registro['suficiencia'],
                $registro['id_militar'],
                $registro['id_periodo_taf'],
                $registro['conceito'],
                $registro['id_ficha_taf'],
            );
        }
        return $objetos;
    }

    public static function destruir($id_indice_taf)
    {
        $comando = DW3BancoDeDados::prepare(self::DELETAR);
        $comando->bindValue(1, $id_indice_taf, PDO::PARAM_INT);
        $comando->execute();
    }
}
