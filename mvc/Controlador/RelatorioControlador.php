<?php
namespace Controlador;

use \Modelo\Militar;
use \Modelo\Vacina;
use \Modelo\InstrucaoMinistrada;
use \Framework\DW3Sessao;

class RelatorioControlador extends Controlador
{
    public function index()
    {

        $this->verificarLogado();
        $this->verificarPermissao(['administrador']);

        $vacinas = Vacina::buscarTodos();
        $vacinas_quantidade = [];

        foreach ($vacinas as $vacina) {
            array_push($vacinas_quantidade, ['vacina' => $vacina->getVacina(), 'qtd' => Militar::quantidadeVacinadosVacina($vacina->getIdVacina())]);
        }

        $informacoes = [
            # MILITARES
            'relacao_militares_su' => ['bc' => Militar::buscarMilitarSu(2), '1' => Militar::buscarMilitarSu(3), '2' => Militar::buscarMilitarSu(4), '3' => Militar::buscarMilitarSu(5)], 
            'militares_su' => ['bc' => Militar::militaresSu(2), '1' => Militar::militaresSu(3), '2' => Militar::militaresSu(4), '3' => Militar::militaresSu(5)],            
            # VISITA
            'possuem_visita' => Militar::possuemVisitaMedica(),
            'possuem_visita_bc' => Militar::possuemVisitaMedicaSu(2),
            'possuem_visita_1' => Militar::possuemVisitaMedicaSu(3),
            'possuem_visita_2' => Militar::possuemVisitaMedicaSu(4),
            'possuem_visita_3' => Militar::possuemVisitaMedicaSu(5),
            'visita_meses' => [Militar::visitaMedicaMes('01'), Militar::visitaMedicaMes('02'), Militar::visitaMedicaMes('03'), Militar::visitaMedicaMes('04'), Militar::visitaMedicaMes('05'), Militar::visitaMedicaMes('06'), Militar::visitaMedicaMes('07'), Militar::visitaMedicaMes('08'), Militar::visitaMedicaMes('09'), Militar::visitaMedicaMes('10'), Militar::visitaMedicaMes('11'), Militar::visitaMedicaMes('12')],
            # VACINACAO
            'possuem_vacinacao' => Militar::possuemVacinacao(),
            'possuem_vacinacao_bc' => Militar::possuemVacinacaoSu(2),
            'possuem_vacinacao_1' => Militar::possuemVacinacaoSu(3),
            'possuem_vacinacao_2' => Militar::possuemVacinacaoSu(4),
            'possuem_vacinacao_3' => Militar::possuemVacinacaoSu(5),
            'vacinas_quantidade' => $vacinas_quantidade,
            # PUNICAO
            'punicoes_om' => Militar::quantidadePunicaoOM(),
            'punicoes_su' => ['bc' => Militar::quantidadePunicaoSu(2), '1' => Militar::quantidadePunicaoSu(3), '2' => Militar::quantidadePunicaoSu(4), '3' => Militar::quantidadePunicaoSu(5)],
             # RECOMPENSA
            'recompensas_om' => Militar::quantidadeRecompensaOM(),
            'recompensas_su' => ['bc' => Militar::quantidadeRecompensaSu(2), '1' => Militar::quantidadeRecompensaSu(3), '2' => Militar::quantidadeRecompensaSu(4), '3' => Militar::quantidadeRecompensaSu(5)],
             # AVALIAÇÃO
            'avaliacoes_om' => Militar::quantidadeAvaliacoesOM(),
            'avaliacoes_su' => ['bc' => Militar::quantidadeAvaliacoesSu(2), '1' => Militar::quantidadeAvaliacoesSu(3), '2' => Militar::quantidadeAvaliacoesSu(4), '3' => Militar::quantidadeAvaliacoesSu(5)],
            'matricula_cfc' => Militar::matriculaCfc(),
             # TAF
            'taf_om' => Militar::quantidadeTafOM(),
            'taf_su' => ['bc' => Militar::quantidadeTafSu(2), '1' => Militar::quantidadeTafSu(3), '2' => Militar::quantidadeTafSu(4), '3' => Militar::quantidadeTafSu(5)],
            'suficiencia' => Militar::suficienteTaf(),
            # INSTRUCOES
            'instrucoes_iib' => Militar::quantidadeInstrucoesFaseOM('IIB'),
            'instrucoes_pab' => Militar::quantidadeInstrucoesFaseOM('PAB GLO'),
            'instrucoes_iiq' => Militar::quantidadeInstrucoesFaseOM('IIQ'),
            'ministradas' => InstrucaoMinistrada::buscarTodosData(),
        ];

        $this->visao('relatorios/index.php',['informacoes' =>  $informacoes, 'mensagem' => DW3Sessao::getFlash('mensagem', null)]);
    }
}
