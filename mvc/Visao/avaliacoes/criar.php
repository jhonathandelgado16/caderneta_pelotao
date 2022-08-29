<div class="row justify-content-md-center">
    <div class="col-6">
        <h2 class="">Avaliação de Atributos Disciplinar</h2>
        <form action="<?= URL_RAIZ . 'avaliacoes' ?>" method="post" class="margin-bottom row">

            <div class="form-group col-12 text-center">
                <label class="control-label" for="militar">Militar</label>
                <input type="hidden" name="id_militar" value="<?= $militar->getId() ?>">
                <p><?= $militar->getMilitarCompleto() ?></p>
            </div>

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
                            <input type="radio" name="cooperacao" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="cooperacao" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="cooperacao" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>AUTOCONFIANÇA</td>
                        <td>
                            <input type="radio" name="autoconfianca" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="autoconfianca" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="autoconfianca" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>PERSISTÊNCIA</td>
                        <td>
                            <input type="radio" name="persistencia" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="persistencia" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="persistencia" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>INICIATIVA</td>
                        <td>
                            <input type="radio" name="iniciativa" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="iniciativa" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="iniciativa" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>CORAGEM</td>
                        <td>
                            <input type="radio" name="coragem" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="coragem" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="coragem" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>RESPONSABILIDADE</td>
                        <td>
                            <input type="radio" name="responsabilidade" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="responsabilidade" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="responsabilidade" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>DISCIPLINA</td>
                        <td>
                            <input type="radio" name="disciplina" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="disciplina" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="disciplina" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>EQUILÍBRIO EMOCIONAL</td>
                        <td>
                            <input type="radio" name="equilibrio_emocional" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="equilibrio_emocional" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="equilibrio_emocional" value="3" required>  
                        </td> 
                    </tr>
                    <tr>
                        <td>ENTUSIASMO PROFISSIONAL</td>
                        <td>
                            <input type="radio" name="entusiasmo_profissional" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="entusiasmo_profissional" value="2" required>  
                        </td>
                        <td>
                            <input type="radio" name="entusiasmo_profissional" value="3" required>  
                        </td> 
                    </tr>
                </tbody>
            </table>

            <br>

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
                            <input type="radio" name="matricula_cfc" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="matricula_cfc" value="2" required>  
                        </td>
                    </tr>
                    <tr>
                        <td>FOI PUNIDO DURANTE A FASE</td>
                        <td>
                            <input type="radio" name="punido" value="1" required>                          
                        </td>
                        <td>
                            <input type="radio" name="punido" value="2" required>  
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>

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
                            <input type="radio" name="avaliacao_global" value="MB" required>                          
                        </td>
                        <td>
                            <input type="radio" name="avaliacao_global" value="B" required>  
                        </td>                        
                        <td>
                            <input type="radio" name="avaliacao_global" value="R" required>                          
                        </td>
                        <td>
                            <input type="radio" name="avaliacao_global" value="I" required>  
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="col-12">
                <button type="submit" class="btn btn-success col-8 offset-2">Cadastrar</button>
                 
                <p class="col-12 text-center">
                    <a class="text-success" href="<?= URL_RAIZ . 'avaliacoes' ?>">Voltar para a tela de Avaliações</a>
                </p>
            </div>
            
        </form>
       
    </div>
</div>
