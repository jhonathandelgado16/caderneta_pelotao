<div class="row justify-content-md-center">
    <div class="col-10">
        <h2 class="">Ficha do Militar</h2>
            
            <div class="row">
                <p class="col-12 text-left">
                    <a class="text-success" href="<?= URL_RAIZ . 'militares' ?>">Voltar para a tela de Militares</a>
                </p>

                
            <h3 class="col-12 text-center">Informações pessoais</h3>

            <div class="form-group col-2">
                <label class="control-label" for="posto-grad">Posto/Graduação</label>
                <input id="posto-grad" name="" value="<?= $militar->getPostoGrad()->getPostoGrad() ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-2">
                <label class="control-label" for="numero">Número (SFC)</label>
                <input id="numero" name="numero" value="<?= $militar->getNumero() ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-4">
                <label class="control-label" for="qualificacao">Qualificação Militar</label>
                <input id="qualificacao" name="" value="<?php if($militar->getIdQualificacaoMilitar() != null){ echo $militar->getQualificacaoMilitar()->getQualificacaoMilitar(); } ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-2">
                <label class="control-label" for="su">SU do Militar</label>
                <input id="su" name="" value="<?= $militar->getSu()->getNome() ?>" class="form-control" readonly>
            </div>
            <div class="form-group col-2">
                <label class="control-label" for="pelotao">Pelotão</label>
                <input id="pelotao" name="" value="<?= $militar->getPelotao() ?>" class="form-control" readonly>
            </div>

            <div class="form-group col-8">
                <label class="control-label" for="nome">Nome completo</label>
                <input id="nome" name="nome" value="<?= $militar->getNome() ?>" class="form-control" value="" readonly>
            </div>

            <div class="form-group col-4">
                <label class="control-label" for="nome-guerra">Nome de Guerra</label>
                <input id="nome-guerra" value="<?= $militar->getNomeGuerra() ?>" name="nome-guerra" class="form-control" readonly>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="cpf">CPF</label>
                <input id="cpf" name="cpf" value="<?= $militar->getCpf() ?>" oninput="mascaraCpf(this)" type="text" class="form-control" readonly>
            </div>
            <div class="form-group col-6">
                <label class="control-label" for="idt">Identidade Militar</label>
                <input id="idt" name="idt"  value="<?= $militar->getIdtMilitar() ?>" oninput="mascaraIdt(this)" type="text" class="form-control" readonly>
            </div>

            <div class="form-group col-12">
                <label class="control-label" for="endereco">Endereço</label>
                <input id="endereco" value="<?= $militar->getEndereco() ?>" type="text" class="form-control" readonly>
            </div>

            <div class="col-4">
                <div class="form-group ficha">
                    <div class="card-titulo row">
                        <h3 class="col">Visitas Médicas</h3>
                        <img class="col-3" src="<?= URL_PUBLICO . '/img/saude.png'  ?>" alt="" height="50" width="50">
                    </div>
                    <table class="table">
                        <tbody class="col-12">
                        <tr>
                            <th class="">Médico</th>
                            <th class="">Motivo</th>
                            <th class="">Data</th>
                        </tr>
                        <?php if (empty($visitas_medicas)) : ?>
                            <tr>
                                <td colspan="99" class="text-center">Nenhuma Visita encontrada.</td>
                            </tr>
                        <?php endif ?>
                        <?php foreach ($visitas_medicas as $visita_medica) : ?>
                            <tr>
                                <td><?= $visita_medica->getMedico()->getNome() ?></td>
                                <td><?= $visita_medica->getMotivo() ?></td>
                                <td><?= date('d/m/Y',  strtotime($visita_medica->getData())) ?></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                <div class="form-group ficha">
                    <div class="card-titulo">
                        <div class="row">
                            <h3 class="col">Punições</h3>
                            <img class="col-3" src="<?= URL_PUBLICO . '/img/punicao-fundo.png'  ?>" alt="" height="50" width="50">
                        </div>                        
                    </div>
                    <table class="table">
                        <tbody class="col-12">
                            <tr>
                                <th class="">Punição</th>
                                <th class="">Boletim Interno</th>
                                <th class="">Início - Fim</th>
                            </tr>
                            <?php if (empty($punicoes)) : ?>
                                <tr>
                                    <td colspan="99" class="text-center">Nenhuma Punição encontrada.</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($punicoes as $punicao) : ?>
                                <tr>
                                    <td><?= $punicao->getPunicao() ?></td>
                                    <td><?= $punicao->getBi() ?></td>
                                    <td><?= date('d/m/Y', strtotime($punicao->getDataInicio())) .' - '. date('d/m/Y', strtotime($punicao->getDataTermino()))?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

                <div class="col-4">
                    <div class="form-group text-center ficha">
                        <label class="control-label" for="militar">Militar</label>
                        <p><?= $militar->getMilitarCompleto() ?></p>
                    </div>
                    <div class="form-group avaliacao">
                    <div class="card-titulo">
                        <div class="row">
                            <h3 class="col">Avaliação</h3>
                            <img class="col-3" src="<?= URL_PUBLICO . '/img/avaliacao-fundo.png'  ?>" alt="" height="50" width="50">
                        </div>                        
                    </div>
                    <?php if (empty($avaliacoes)){ ?>
                        <tr>
                            <td colspan="99" class="text-center">Nenhuma Avaliação encontrada.</td>
                        </tr>
                    <?php } else {
                    $avaliacao = $avaliacoes[0]; ?>
                    <table class="table text-center">
                            <tbody class="col-xs-12">
                                <tr>
                                    <th colspan="99" class="">FICHA DE AVALIAÇÃO DE ATRIBUTOS</th>
                                </tr>
                                <tr>
                                    <th rowspan="2" class="col-6">Identificação</th>
                                    <th colspan="3" class="col-6">Padrão Evidenciado</th>
                                </tr>
                                <tr>
                                    <th class="col-2">SIM</th>
                                    <th class="col-2">NÃO</th>
                                    <th class="col-2">NÃO OBS</th>
                                </tr>
                               <tr>
                                    <td>COOPERAÇÃO</td>
                                    <td>
                                        <input type="radio" name="cooperacao" value="1" required <?php if($avaliacao->getCooperacao() == 1){ echo "checked";} ?>>                          
                                    </td>
                                    <td>
                                        <input type="radio" name="cooperacao" value="2" required <?php if($avaliacao->getCooperacao() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="cooperacao" value="3" required <?php if($avaliacao->getCooperacao() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>AUTOCONFIANÇA</td>
                                    <td>
                                        <input type="radio" name="autoconfianca" value="1" required <?php if($avaliacao->getAutoconfianca() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="autoconfianca" value="2" required <?php if($avaliacao->getAutoconfianca() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="autoconfianca" value="3" required <?php if($avaliacao->getAutoconfianca() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>PERSISTÊNCIA</td>
                                    <td>
                                        <input type="radio" name="persistencia" value="1" required <?php if($avaliacao->getPersistencia() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="persistencia" value="2" required <?php if($avaliacao->getPersistencia() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="persistencia" value="3" required <?php if($avaliacao->getPersistencia() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>INICIATIVA</td>
                                    <td>
                                        <input type="radio" name="iniciativa" value="1" required <?php if($avaliacao->getIniciativa() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="iniciativa" value="2" required <?php if($avaliacao->getIniciativa() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="iniciativa" value="3" required <?php if($avaliacao->getIniciativa() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>CORAGEM</td>
                                    <td>
                                        <input type="radio" name="coragem" value="1" required <?php if($avaliacao->getCoragem() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="coragem" value="2" required <?php if($avaliacao->getCoragem() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="coragem" value="3" required <?php if($avaliacao->getCoragem() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>RESPONSABILIDADE</td>
                                    <td>
                                        <input type="radio" name="responsabilidade" value="1" required <?php if($avaliacao->getResponsabilidade() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="responsabilidade" value="2" required <?php if($avaliacao->getResponsabilidade() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="responsabilidade" value="3" required <?php if($avaliacao->getResponsabilidade() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>DISCIPLINA</td>
                                    <td>
                                        <input type="radio" name="disciplina" value="1" required <?php if($avaliacao->getDisciplina() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="disciplina" value="2" required <?php if($avaliacao->getDisciplina() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="disciplina" value="3" required <?php if($avaliacao->getDisciplina() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>EQUILÍBRIO EMOCIONAL</td>
                                    <td>
                                        <input type="radio" name="equilibrio_emocional" value="1" required <?php if($avaliacao->getEquilibrioEmocional() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="equilibrio_emocional" value="2" required <?php if($avaliacao->getEquilibrioEmocional() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="equilibrio_emocional" value="3" required <?php if($avaliacao->getEquilibrioEmocional() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                                <tr>
                                    <td>ENTUSIASMO PROFISSIONAL</td>
                                    <td>
                                        <input type="radio" name="entusiasmo_profissional" value="1" required <?php if($avaliacao->getEntusiasmoProfissional() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="entusiasmo_profissional" value="2" required <?php if($avaliacao->getEntusiasmoProfissional() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                    <td>
                                        <input type="radio" name="entusiasmo_profissional" value="3" required <?php if($avaliacao->getEntusiasmoProfissional() == 3){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td> 
                                </tr>
                            </tbody>
                        </table>
                        <table class="table text-center">
                            <tbody class="col-xs-12">
                                <tr>
                                    <th colspan="99" class="">APRECIAÇÃO FINAL DO PERÍODO</th>
                                </tr>
                                <tr>
                                    <th class="col-6"></th>
                                    <th class="col-3">SIM</th>
                                    <th class="col-3">NÃO</th>
                                </tr>
                                <tr>
                                    <td>PODE SER MATRICULADO NO CURSO DE FORMAÇÃO DE CABOS?</td>
                                    <td>
                                        <input type="radio" name="matricula_cfc" value="1" required <?php if($avaliacao->getMatriculaCfc() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="matricula_cfc" value="2" required <?php if($avaliacao->getMatriculaCfc() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                </tr>
                                <tr>
                                    <td>FOI PUNIDO DURANTE A FASE?</td>
                                    <td>
                                        <input type="radio" name="punido" value="1" required <?php if($avaliacao->getPunido() == 1){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="punido" value="2" required <?php if($avaliacao->getPunido() == 2){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table text-center">
                            <tbody class="col-xs-12">
                                <tr>
                                    <th rowspan="2" class="col-4">AVALIAÇÃO GLOBAL SUBJETIVA</th>
                                    <th class="col-2">MB</th>
                                    <th class="col-2">B</th>
                                    <th class="col-2">R</th>
                                    <th class="col-2">I</th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="radio" name="avaliacao_global" value="MB" required <?php if($avaliacao->getAvaliacaoGlobal() == 'MB'){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="avaliacao_global" value="B" required <?php if($avaliacao->getAvaliacaoGlobal() == 'B'){ echo "checked";} ?> onclick="javascript: return false;">  
                                    </td>                        
                                    <td>
                                        <input type="radio" name="avaliacao_global" value="R" required <?php if($avaliacao->getAvaliacaoGlobal() == 'R'){ echo "checked";} ?> onclick="javascript: return false;">                          
                                    </td>
                                    <td>
                                        <input type="radio" name="avaliacao_global" value="I" required <?php if($avaliacao->getAvaliacaoGlobal() == 'I'){ echo "checked";} ?>  onclick="javascript: return false;">  
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group ficha vacina">
                        <h3>Vacinas</h3>
                        <table class="table">
                            <tbody class="col-xs-12">
                            <tr>
                                <th class="">Vacina</th>
                                <th class="">Lote</th>
                                <th class="">Aplicação</th>
                            </tr>
                            <?php if (empty($vacinacoes)) : ?>
                                <tr>
                                    <td colspan="99" class="text-center">Nenhuma Vacina encontrada.</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($vacinacoes as $vacinacao) : ?>
                                <tr>
                                    <td><?= $vacinacao->getVacina()->getVacina(); ?></td>
                                    <td><?= $vacinacao->getLote(); ?></td>
                                    <td><?= date('d/m/Y',  strtotime($vacinacao->getData())); ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group ficha recompensa">
                        <h3>Recompensas</h3>
                        <table class="table">
                            <tbody class="col-12">
                            <tr>
                                <th class="">Recompensa</th>
                                <th class="">Data</th>
                            </tr>
                            <?php if (empty($recompensas)) : ?>
                                <tr>
                                    <td colspan="99" class="text-center">Nenhuma Recompensa encontrada.</td>
                                </tr>
                            <?php endif ?>
                            <?php foreach ($recompensas as $recompensa) : ?>
                                <tr>                                
                                    <td><?= $recompensa->getRecompensa() ?></td>
                                    <td><?= date('d/m/Y', strtotime($recompensa->getData())); ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 fib row">
                    <h3 class="col-12 text-center">FICHA DA INSTRUÇÃO INDIVIDUAL BÁSICA</h3>
                    <div class="col-4 info">Nº: <?= $militar->getNumero() ?></div>
                    <div class="col-8 info">NOME: <?= $militar->getNome() ?></div>
                    <div class="col-4 info">OM: 26º GAC</div>
                    <div class="col-4 info">SU: <?= $militar->getSu()->getNome() ?></div>
                    <div class="col-4 info">FRAÇÃO: <?= $militar->getConversaoPelotao() ?></div>
                    <?php if (empty($instrucoes)) : ?>
                                <p>Nenhuma Recompensa encontrada.</p>
                            <?php
                             endif;
                                $grupoInstrucoes = array_chunk($instrucoes, 18);
    
                                $n = 0;
                                foreach ($grupoInstrucoes as $grupo) {
                                    $n++;
                                    ?>
                                    <div class="col-2 oii">
                                    <div class="row">
                                    <h3 class="col-12 text-center">OII</h3>
                                    <div class="col-6 text-left">Identificação</div>
                                    <div class="col-6 text-center">Padrão Mínimo</div>
                                    <div class="col-6"></div>
                                    <div class="col-3 text-center">Sim</div>
                                    <div class="col-3 text-center">Não</div>
                                    <?php 
                                    foreach($grupo as $instrucao) {
                                        ?>
                                            <div class="col-6">
                                                <label><?= substr($instrucao->getMateria(), 0, 3).' '.$instrucao->getIdentificacao(); ?></label>
                                            </div>
                                            <?php if($instrucao->participou($instrucao->getIdinstrucao() , $militar->getId()) != 0){
                                                if($instrucao->participou($instrucao->getIdinstrucao() , $militar->getId()) == 1){
                                            ?>
                                                <div class="col-3 text-center"><img class="icone" src="<?= URL_PUBLICO . '/img/concluido.png'  ?>" alt=""></div>
                                                <div class="col-3 text-center"></div>
                                            <?php } else { ?>
                                                <div class="col-3 text-center"></div>
                                                <div class="col-3 text-center"><img class="icone" src="<?= URL_PUBLICO . '/img/nao.png'  ?>" alt=""></div>
                                            <?php
                                                }
                                            }
                                            else { 
                                            ?>
                                                <div class="col-3 text-center"></div>
                                                <div class="col-3 text-center"></div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </div>
                                    </div>
                                    <?php
                                }
                            ?>
                </div>

                <p></p>

                <div class="col-12 row quadro-taf">
                    <h3 class="col-12 text-center">FICHA DE DESEMPENHO FÍSICO INDIVIDUAL</h3>
                    <div class="col-4 info">Nº: <?= $militar->getNumero() ?></div>
                    <div class="col-8 info">NOME: <?= $militar->getNome() ?></div>
                    <div class="col-4 info">OM: 26º GAC</div>
                    <div class="col-4 info">SU: <?= $militar->getSu()->getNome() ?></div>
                    <div class="col-4 info">FRAÇÃO: <?= $militar->getConversaoPelotao() ?></div>
                        <div class="col-3 taf">
                            <div class="col-12">TAF</div>
                            <div>PROVAS</div>
                            <div>CORRIDA</div>
                            <div>FLEXÃO DE BRAÇO</div>
                            <div>ABDOMINAL</div>
                            <div>BARRA FIXA</div>
                            <div>AVALIAÇÃO GLOBAL DO PADRÃO</div>
                        </div>
                        <?php if (empty($tafs)) : ?>
                                <div class="col-12">NÃO EXISTEM TAFS CADASTRADOS</div>
                                <?php endif ?>
                                <?php foreach ($tafs as $taf) : ?>
                                    <div class="col-3 taf row text-center">
                                        <div class="col-12"><?= $taf->getPeriodoTaf()->getNumeroTaf() ?></div>
                                        <div class="col-6">DESEMPENHO</div><div class="col-6">CONCEITO</div>
                                        <div class="col-6"><?= $taf->getCorrida() ?></div><div class="col-6"><?= $taf->getIndCorrida() ?></div>
                                        <div class="col-6"><?= $taf->getFlexao() ?></div><div class="col-6"><?= $taf->getIndFlexao() ?></div>
                                        <div class="col-6"><?= $taf->getAbdominal() ?></div><div class="col-6"><?= $taf->getIndAbdominal() ?></div>
                                        <div class="col-6"><?= $taf->getBarra() ?></div><div class="col-6"><?= $taf->getIndBarra() ?></div>
                                        <div class="col-6"><?= $taf->getSuficienciaConversao() ?></div><div class="col-6"><?= $taf->getConceito() ?></div>
                                    </div>
                                <?php endforeach ?>                        
                </div>

                
                <div class="col-12 obs row">
                    <h3 class="col-12 text-center titulo">OBSERVAÇÕES</h3>
                    <?php if (empty($observacoes)) : ?>
                        <div class="form-group col-12 text-center">
                            <p>Nenhuma Observação encontrada.</p>
                        </div>
                    <?php endif ?>
                    <?php foreach ($observacoes as $observacao) : ?>
                        <h3 class="col-12"><?= $observacao->getMilitarResponsavel() .' - '. $observacao->getDataBr() ?></h3>
                        <p class="col-12"><?= $observacao->getObservacao() ?></p>                        
                    <?php endforeach ?>
                </div>

            </div>
       
    </div>
</div>
