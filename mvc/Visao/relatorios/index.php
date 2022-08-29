<div class="row justify-content-md-center back-relatorio">
    <div class="col-xs-12 col-md-12 row justify-content-md-center">
    <h2 class="col-12">Relatório Caderneta de Pelotão</h1>
    <script type="text/javascript" src=<?= URL_JS . 'jquery-3.6.0.min.js' ?>>
     
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.

     

      google.charts.setOnLoadCallback(drawChartPunicoesOm);

      google.charts.setOnLoadCallback(drawChartRecompensasOm);

      google.charts.setOnLoadCallback(drawChartAvaliacoesBc);
      google.charts.setOnLoadCallback(drawChartAvaliacoesOm);


      google.charts.setOnLoadCallback(drawChartTafOm);

      google.charts.setOnLoadCallback(drawChartInstrucoesOmIib);
      google.charts.setOnLoadCallback(drawChartInstrucoesOmPab);
      google.charts.setOnLoadCallback(drawChartInstrucoesOmIiq);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.

      $(document).ready(function(){
        $("#visita").click(function(){
          $('#grafico_visitas').hide();
          $('#grafico_visitas_su').show();
        });


         $('#punicao_bc').click(function(){
            google.charts.setOnLoadCallback(drawChartPunicoesBc);
            $('#chart_punicoes_su').fadeIn(400);
         });

         $('#punicao_1').click(function(){
            google.charts.setOnLoadCallback(drawChartPunicoes1);            
            $('#chart_punicoes_su').fadeIn(400);
         });

         $('#punicao_2').click(function(){
            google.charts.setOnLoadCallback(drawChartPunicoes2);
            $('#chart_punicoes_su').fadeIn(400);
         });

         $('#punicao_3').click(function(){
            google.charts.setOnLoadCallback(drawChartPunicoes3);
            $('#chart_punicoes_su').fadeIn(400);
         });

         $('#recompensa_bc').click(function(){
            google.charts.setOnLoadCallback(drawChartRecompensaBc);
            $('#chart_recompensas_su').fadeIn(400);
         });

         $('#recompensa_1').click(function(){
            google.charts.setOnLoadCallback(drawChartRecompensa1);            
            $('#chart_recompensas_su').fadeIn(400);
         });

         $('#recompensa_2').click(function(){
            google.charts.setOnLoadCallback(drawChartRecompensa2);
            $('#chart_recompensas_su').fadeIn(400);
         });

         $('#recompensa_3').click(function(){
            google.charts.setOnLoadCallback(drawChartRecompensa3);
            $('#chart_recompensas_su').fadeIn(1400);
         });


         $('#avaliacoes_bc').click(function(){
            google.charts.setOnLoadCallback(drawChartAvaliacoesBc);
            $('#chart_avaliacoes_su').fadeIn(400);
         });

         $('#avaliacoes_1').click(function(){
            google.charts.setOnLoadCallback(drawChartAvaliacoes1);            
            $('#chart_avaliacoes_su').fadeIn(400);
         });

         $('#avaliacoes_2').click(function(){
            google.charts.setOnLoadCallback(drawChartAvaliacoes2);
            $('#chart_avaliacoes_su').fadeIn(400);
         });

         $('#avaliacoes_3').click(function(){
            google.charts.setOnLoadCallback(drawChartAvaliacoes3);
            $('#chart_avaliacoes_su').fadeIn(1500);
         });

         $('#taf_bc').click(function(){
            google.charts.setOnLoadCallback(drawChartTafBc);
            $('#chart_taf_su').fadeIn(400);
         });

         $('#taf_1').click(function(){
            google.charts.setOnLoadCallback(drawChartTaf1);            
            $('#chart_taf_su').fadeIn(400);
         });

         $('#taf_2').click(function(){
            google.charts.setOnLoadCallback(drawChartTaf2);
            $('#chart_taf_su').fadeIn(400);
         });

         $('#taf_3').click(function(){
            google.charts.setOnLoadCallback(drawChartTaf3);
            $('#chart_taf_su').fadeIn(1500);
         });

         $('#instrucoes_bc').click(function(){
            google.charts.setOnLoadCallback(drawChartInstrucoesBc);
            $('#chart_instrucoes_su').fadeIn(400);
         });

         $('#instrucoes_1').click(function(){
            google.charts.setOnLoadCallback(drawChartInstrucoes1);            
            $('#chart_instrucoes_su').fadeIn(400);
         });

         $('#instrucoes_2').click(function(){
            google.charts.setOnLoadCallback(drawChartInstrucoes2);
            $('#chart_instrucoes_su').fadeIn(400);
         });

         $('#instrucoes_3').click(function(){
            google.charts.setOnLoadCallback(drawChartInstrucoes3);
            $('#chart_instrucoes_su').fadeIn(1500);
         });


         $('#btn-visitas').click(function(){
            $('#btn-visitas').hide();
            $('#btn-fechar-visitas').show();
            $('#grafico_detalhado_visitas').fadeIn(300);
            google.charts.setOnLoadCallback(drawChartVisitasSu);
            google.charts.setOnLoadCallback(drawChartVisitasMes);
              
         });

         $('#btn-fechar-visitas').click(function(){
            $('#btn-visitas').show();
            $('#btn-fechar-visitas').hide();
            $('#grafico_detalhado_visitas').fadeOut(300);
         });

        $('#btn-vacinas').click(function(){
            $('#btn-vacinas').hide();
            $('#btn-fechar-vacinas').show();
            $('#grafico_detalhado_vacinas').fadeIn(300);
            google.charts.setOnLoadCallback(drawChartVacinacaoSu);
            google.charts.setOnLoadCallback(drawChartQuantidadeVacinas);
              
         });

         $('#btn-fechar-vacinas').click(function(){
            $('#btn-vacinas').show();
            $('#btn-fechar-vacinas').hide();
            $('#grafico_detalhado_vacinas').fadeOut(300);
         });

         $('#btn-punicoes').click(function(){
            $('#btn-punicoes').hide();
            $('#btn-fechar-punicoes').show();
            $('#grafico_detalhado_punicoes').fadeIn(300);
            google.charts.setOnLoadCallback(drawChartPunicoesBc);
            $('#chart_punicoes_su').fadeIn(400);
              
         });

         $('#btn-fechar-punicoes').click(function(){
            $('#btn-punicoes').show();
            $('#btn-fechar-punicoes').hide();
            $('#grafico_detalhado_punicoes').fadeOut(300);
         });

         $('#btn-recompensas').click(function(){
            $('#btn-recompensas').hide();
            $('#btn-fechar-recompensas').show();
            $('#grafico_detalhado_recompensas').fadeIn(300);
            google.charts.setOnLoadCallback(drawChartRecompensaBc);
            $('#chart_recompensas_su').fadeIn(400);
              
         });

         $('#btn-fechar-recompensas').click(function(){
            $('#btn-recompensas').show();
            $('#btn-fechar-recompensas').hide();
            $('#grafico_detalhado_recompensas').fadeOut(300);
         });


         $('#btn-avaliacoes').click(function(){
            $('#btn-avaliacoes').hide();
            $('#btn-fechar-avaliacoes').show();
            $('#grafico_detalhado_avaliacoes').fadeIn(300);
            google.charts.setOnLoadCallback(drawChartAvaliacoesBc);
            $('#chart_avaliacoes_su').fadeIn(400);
              
         });

         $('#btn-fechar-avaliacoes').click(function(){
            $('#btn-avaliacoes').show();
            $('#btn-fechar-avaliacoes').hide();
            $('#grafico_detalhado_avaliacoes').fadeOut(300);
         });

         $('#btn-taf').click(function(){
            $('#btn-taf').hide();
            $('#btn-fechar-taf').show();
            $('#grafico_detalhado_taf').fadeIn(300);
            google.charts.setOnLoadCallback(drawChartTafBc);
            $('#chart_taf_su').fadeIn(400);
              
         });

         $('#btn-fechar-taf').click(function(){
            $('#btn-taf').show();
            $('#btn-fechar-taf').hide();
            $('#grafico_detalhado_taf').fadeOut(300);
         });

         $('#btn-instrucoes').click(function(){
            $('#btn-instrucoes').hide();
            $('#btn-fechar-instrucoes').show();
            $('#instrucoes').fadeIn(300);
            google.charts.setOnLoadCallback(drawChartInstrucoesBc);
            $('#chart_instrucoes_su').fadeIn(400);
              
         });

         $('#btn-fechar-instrucoes').click(function(){
            $('#btn-instrucoes').show();
            $('#btn-fechar-instrucoes').hide();
            $('#instrucoes').fadeOut(300);
         });


         $('#btn-militares-bc').click(function(){
            $('#btn-militares-bc').hide();
            $('#btn-fechar-militares-bc').show();
            $('#militares-bc').fadeIn(300);
            $('#militares-1').fadeOut(300);
            $('#militares-2').fadeOut(300);
            $('#militares-3').fadeOut(300);              
         });

          $('#btn-fechar-militares-bc').click(function(){
            $('#btn-militares-bc').show();
            $('#btn-fechar-militares-bc').hide();
            $('#militares-bc').fadeOut(300);             
         });

          $('#btn-militares-1').click(function(){
            $('#btn-militares-1').hide();
            $('#btn-fechar-militares-1').show();
            $('#militares-1').fadeIn(300);
            $('#militares-bc').fadeOut(300);
            $('#militares-2').fadeOut(300);
            $('#militares-3').fadeOut(300);              
         });

          $('#btn-fechar-militares-1').click(function(){
            $('#btn-militares-1').show();
            $('#btn-fechar-militares-1').hide();
            $('#militares-1').fadeOut(300);             
         });

           $('#btn-militares-2').click(function(){
            $('#btn-militares-2').hide();
            $('#btn-fechar-militares-2').show();
            $('#militares-2').fadeIn(300);
            $('#militares-bc').fadeOut(300);
            $('#militares-1').fadeOut(300);
            $('#militares-3').fadeOut(300);              
         });

          $('#btn-fechar-militares-2').click(function(){
            $('#btn-militares-2').show();
            $('#btn-fechar-militares-2').hide();
            $('#militares-2').fadeOut(300);             
         });

          $('#btn-militares-3').click(function(){
            $('#btn-militares-3').hide();
            $('#btn-fechar-militares-3').show();
            $('#militares-3').fadeIn(300);
            $('#militares-bc').fadeOut(300);
            $('#militares-1').fadeOut(300);
            $('#militares-2').fadeOut(300);              
         });

          $('#btn-fechar-militares-3').click(function(){
            $('#btn-militares-3').show();
            $('#btn-fechar-militares-3').hide();
            $('#militares-3').fadeOut(300);             
         });



      });

      

      function drawChartVisitasSu() {

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Quantidade de Visitas Médicas', { role: 'style' }],
         ['Bia C', <?= $informacoes['possuem_visita_bc'] ?>, '#28a745'],
         ['1ª Bia O', <?= $informacoes['possuem_visita_1'] ?>, '#28a745'],
         ['2ª Bia O', <?= $informacoes['possuem_visita_2'] ?>, '#28a745'],
         ['3ª Bia O', <?= $informacoes['possuem_visita_3'] ?>, '#28a745'],
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Visitas médicas das Subunidades',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '80%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_visitas_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartVisitasMes(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Quantidade de Visitas Médicas', { role: 'style' }],
         ['JAN', <?= $informacoes['visita_meses'][0] ?>, '#28a745'],
         ['FEV', <?= $informacoes['visita_meses'][1] ?>, '#28a745'],
         ['MAR', <?= $informacoes['visita_meses'][2] ?>, '#28a745'],
         ['ABR', <?= $informacoes['visita_meses'][3] ?>, '#28a745'],
         ['MAIO', <?= $informacoes['visita_meses'][4] ?>, '#28a745'],
         ['JUN', <?= $informacoes['visita_meses'][5] ?>, '#28a745'],
         ['JUL', <?= $informacoes['visita_meses'][6] ?>, '#28a745'],
         ['AGO', <?= $informacoes['visita_meses'][7] ?>, '#28a745'],
         ['SET', <?= $informacoes['visita_meses'][8] ?>, '#28a745'],
         ['OUT', <?= $informacoes['visita_meses'][9] ?>, '#28a745'],
         ['NOV', <?= $informacoes['visita_meses'][10] ?>, '#28a745'],
         ['DEZ', <?= $informacoes['visita_meses'][11] ?>, '#28a745'],
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Visitas Médicas no ano de <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_visitas_mes'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartVacinacaoSu() {

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Quantidade de Vacinas', { role: 'style' }],
         ['Bia C', <?= $informacoes['possuem_vacinacao_bc'] ?>, '#28a745'],
         ['1ª Bia O', <?= $informacoes['possuem_vacinacao_1'] ?>, '#28a745'],
         ['2ª Bia O', <?= $informacoes['possuem_vacinacao_2'] ?>, '#28a745'],
         ['3ª Bia O', <?= $informacoes['possuem_vacinacao_3'] ?>, '#28a745'],
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Vacinas realizadas nas Subunidades',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '80%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };



        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_vacinacao_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartQuantidadeVacinas(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares vacinados', { role: 'style' }],
         <?php foreach ($informacoes['vacinas_quantidade'] as $vacina) { ?>
          ['<?= $vacina["vacina"] ?>', <?= $vacina["qtd"] ?>, '#28a745'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares vacinados de <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_vacinas_quantidade'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartPunicoesOm(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares punidos', { role: 'style' }],
         <?php foreach ($informacoes['punicoes_om'] as $punicao) { ?>
          ['<?= $punicao["punicao"] ?>', <?= $punicao["qtd"] ?>, 'red'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares punidos no 26º GAC em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_punicoes_om'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartPunicoesBc(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares punidos', { role: 'style' }],
         <?php foreach ($informacoes['punicoes_su']['bc'] as $punicao) { ?>
          ['<?= $punicao["punicao"] ?>', <?= $punicao["qtd"] ?>, 'red'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares punidos na Bia Cmdo em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_punicoes_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartPunicoes1(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares punidos', { role: 'style' }],
         <?php foreach ($informacoes['punicoes_su']['1'] as $punicao) { ?>
          ['<?= $punicao["punicao"] ?>', <?= $punicao["qtd"] ?>, 'red'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares punidos na 1ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_punicoes_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartPunicoes2(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares punidos', { role: 'style' }],
         <?php foreach ($informacoes['punicoes_su']['2'] as $punicao) { ?>
          ['<?= $punicao["punicao"] ?>', <?= $punicao["qtd"] ?>, 'red'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares punidos na 2ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_punicoes_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartPunicoes3(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares punidos', { role: 'style' }],
         <?php foreach ($informacoes['punicoes_su']['3'] as $punicao) { ?>
          ['<?= $punicao["punicao"] ?>', <?= $punicao["qtd"] ?>, 'red'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares punidos na 3ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_punicoes_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartRecompensasOm(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares', { role: 'style' }],
         <?php foreach ($informacoes['recompensas_om'] as $recompensa) { ?>
          ['<?= $recompensa["recompensa"] ?>', <?= $recompensa["qtd"] ?>, '#28a745'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares que receberam recompensas em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_recompensas_om'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartRecompensaBc(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares', { role: 'style' }],
         <?php foreach ($informacoes['recompensas_su']['bc'] as $recompensa) { ?>
          ['<?= $recompensa["recompensa"] ?>', <?= $recompensa["qtd"] ?>, '#28a745'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares que receberam recompensas na Bia Cmdo em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_recompensas_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartRecompensa1(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares', { role: 'style' }],
         <?php foreach ($informacoes['recompensas_su']['1'] as $recompensa) { ?>
          ['<?= $recompensa["recompensa"] ?>', <?= $recompensa["qtd"] ?>, '#28a745'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares que receberam recompensas na 1ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_recompensas_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartRecompensa2(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares', { role: 'style' }],
         <?php foreach ($informacoes['recompensas_su']['2'] as $recompensa) { ?>
          ['<?= $recompensa["recompensa"] ?>', <?= $recompensa["qtd"] ?>, '#28a745'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares que receberam recompensas na 2ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_recompensas_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartRecompensa3(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares', { role: 'style' }],
         <?php foreach ($informacoes['recompensas_su']['3'] as $recompensa) { ?>
          ['<?= $recompensa["recompensa"] ?>', <?= $recompensa["qtd"] ?>, '#28a745'],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        title: 'Militares que receberam recompensas na 3ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'none'},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        is3D: true,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_recompensas_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartAvaliacoesOm(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php
         $colors = [];

          foreach ($informacoes['avaliacoes_om'] as $avaliacao) {?>
          ['<?= $avaliacao["avaliacao"] ?>', <?= $avaliacao["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Avaliações globais em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_avaliacoes_om'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartAvaliacoesBc(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['avaliacoes_su']['bc'] as $avaliacao) { ?>
          ['<?= $avaliacao["avaliacao"] ?>', <?= $avaliacao["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Avaliações globais da Bia Cmdo em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_avaliacoes_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartAvaliacoes1(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['avaliacoes_su']['1'] as $avaliacao) { ?>
          ['<?= $avaliacao["avaliacao"] ?>', <?= $avaliacao["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Avaliações globais da 1ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_avaliacoes_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartAvaliacoes2(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['avaliacoes_su']['2'] as $avaliacao) { ?>
          ['<?= $avaliacao["avaliacao"] ?>', <?= $avaliacao["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Avaliações globais da 2ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_avaliacoes_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartAvaliacoes3(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['avaliacoes_su']['3'] as $avaliacao) { ?>
          ['<?= $avaliacao["avaliacao"] ?>', <?= $avaliacao["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Avaliações globais da 3ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_avaliacoes_su'));
        chart.draw(data_visitas, options_visitas);
      }


      function drawChartTafOm(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php
         $colors = [];

          foreach ($informacoes['taf_om'] as $taf) {?>
          ['<?= $taf["conceito"] ?>', <?= $taf["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453','#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Conceito TAF em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_taf_om'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartTafBc(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['taf_su']['bc'] as $taf) { ?>
          ['<?= $taf["conceito"] ?>', <?= $taf["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453','#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Conceito TAF da Bia Cmdo em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_taf_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartTaf1(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['taf_su']['1'] as $taf) { ?>
          ['<?= $taf["conceito"] ?>', <?= $taf["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', '#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Conceito TAF da 1ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_taf_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartTaf2(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['taf_su']['2'] as $taf) { ?>
          ['<?= $taf["conceito"] ?>', <?= $taf["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', '#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Conceito TAF da 2ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_taf_su'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartTaf3(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php foreach ($informacoes['taf_su']['3'] as $taf) { ?>
          ['<?= $taf["conceito"] ?>', <?= $taf["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#0d3d19', '#166328', '#239e3f', '#2cd453', '#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Conceito TAF da 3ª Bia O em <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_taf_su'));
        chart.draw(data_visitas, options_visitas);
      }

      // INSTRUCOES ##############################################
      function drawChartInstrucoesOmIib(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php
         $colors = [];

          foreach ($informacoes['instrucoes_iib'] as $instrucoes) {?>
          ['<?= $instrucoes["fase"] ?>', <?= $instrucoes["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Instruções IIB <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_instrucoes_om_iib'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartInstrucoesOmPab(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php
         $colors = [];

          foreach ($informacoes['instrucoes_pab'] as $instrucoes) {?>
          ['<?= $instrucoes["fase"] ?>', <?= $instrucoes["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Instruções PAB GLO <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_instrucoes_om_pab'));
        chart.draw(data_visitas, options_visitas);
      }

      function drawChartInstrucoesOmIiq(){

        // Create the data table.
        var data_visitas = google.visualization.arrayToDataTable([
         ['Element', 'Militares'],
         <?php
         $colors = [];

          foreach ($informacoes['instrucoes_iiq'] as $instrucoes) {?>
          ['<?= $instrucoes["fase"] ?>', <?= $instrucoes["qtd"] ?>],
         <?php } ?>
        ]);

        // Set chart options
        var options_visitas = {
                        colors: ['#32fa60', 'red'],
                        pieHole: 0.5,
                        pieSliceBorderColor: '#011c03',
                        title: 'Instruções IIQ <?= date('Y') ?>',
                        titleTextStyle: {
                          color: 'white',
                          fontSize: 15,
                        },
                        backgroundColor: '#011c03',
                        legend: {position: 'bottom', textStyle: {color: 'white'}},
                        chartArea: {
                          height: '70%',
                          width: '90%',
                          backgroundColor: '#011c03',
                        },
                       'height': 200,
                        hAxis: {
                                  gridlines: {
                                    color: 'white',
                                  },
                                  viewWindow: {
                                      min: 0,
                                      backgroundColor: '#011c03',
                                  },
                                  baselineColor: {
                                    color: 'white',
                                  },
                                  textStyle: {
                                    color: 'white',
                                    fontSize: 10,
                                  }
                               },
                        vAxis: {
                           gridlines: {
                                    color: 'white',
                                  },
                          textStyle: {
                            fontSize: 10,
                            bold: true,
                            color: 'white',
                          },
                        }
                      };


        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_instrucoes_om_iiq'));
        chart.draw(data_visitas, options_visitas);
      }
    </script>

    <div class="col-11 row card-relatorio card-militares">
      <h3 class="col-12">Militares cadastrados na Caderneta de Pelotão </h3>
      <div class="col-3 text-center" id="grafico_visitas">        
        <h4 class="text-center">Bia Cmdo</h4>
        <h5><?= $informacoes['militares_su']['bc'] ?></h5>
        <h4 class="text-center">militares</h4>
        <button id="btn-militares-bc" type="submit" class="btn btn-success col-12">Visualizar Militares</button>
         <button id="btn-fechar-militares-bc" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar militares</button>
      </div>

      <div class="col-3 text-center" id="grafico_visitas">        
        <h4 class="text-center">1ª Bia O</h4>
        <h5><?= $informacoes['militares_su']['1'] ?></h5>
        <h4 class="text-center">militares</h4>
        <button  id="btn-militares-1" type="submit" class="btn btn-success col-12">Visualizar Militares</button>
        <button id="btn-fechar-militares-1" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar militares</button>
      </div>

      <div class="col-3 text-center" id="grafico_visitas">        
        <h4 class="text-center">2ª Bia O</h4>
        <h5><?= $informacoes['militares_su']['2'] ?></h5>
        <h4 class="text-center">militares</h4>
        <button  id="btn-militares-2" type="submit" class="btn btn-success col-12">Visualizar Militares</button>
        <button id="btn-fechar-militares-2" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar militares</button>
      </div>

      <div class="col-3 text-center" id="grafico_visitas">        
        <h4 class="text-center">3ª Bia O</h4>
        <h5><?= $informacoes['militares_su']['3'] ?></h5>
        <h4 class="text-center">militares</h4>
        <button  id="btn-militares-3" type="submit" class="btn btn-success col-12">Visualizar Militares</button>
        <button id="btn-fechar-militares-3" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar militares</button>
      </div>
      
    </div>

    <div id="militares-bc" class="col-11 row card-relatorio card-militares" style="display:none">
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="">Posto/Grad</th>
            <th class="">Número</th>
            <th class="">Nome de Guerra</th>
            <th class="">Opções</th>
        </tr>
        <?php if (empty($informacoes['relacao_militares_su']['bc'])) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($informacoes['relacao_militares_su']['bc'] as $militar) : ?>
            <tr>
                <td><?= $militar->getPostoGrad()->getPostoGrad() ?></td>
                <td><?= $militar->getNumero() ?></td>
                <td><?= $militar->getNomeGuerra() ?></td>
                <td>
                    <a target="_blank" href="<?= URL_RAIZ . 'militares/' . $militar->getId() . '/ficha' ?>" class="btn btn-xs btn-edit-branco" title="Visualizar Ficha do Militar">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/ficha.png'  ?>" alt="">
                        </a> 
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>

    <div id="militares-1" class="col-11 row card-relatorio card-militares" style="display:none">
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="">Posto/Grad</th>
            <th class="">Número</th>
            <th class="">Nome de Guerra</th>
            <th class="">Opções</th>
        </tr>
        <?php if (empty($informacoes['relacao_militares_su']['1'])) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($informacoes['relacao_militares_su']['1'] as $militar) : ?>
            <tr>
                <td><?= $militar->getPostoGrad()->getPostoGrad() ?></td>
                <td><?= $militar->getNumero() ?></td>
                <td><?= $militar->getNomeGuerra() ?></td>
                <td>
                        <a target="_blank" href="<?= URL_RAIZ . 'militares/' . $militar->getId() . '/ficha' ?>" class="btn btn-xs btn-edit-branco" title="Visualizar Ficha do Militar">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/ficha.png'  ?>" alt="">
                        </a>   
                    
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>

    <div id="militares-2" class="col-11 row card-relatorio card-militares" style="display:none">
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="">Posto/Grad</th>
            <th class="">Número</th>
            <th class="">Nome de Guerra</th>
            <th class="">Opções</th>
        </tr>
        <?php if (empty($informacoes['relacao_militares_su']['2'])) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($informacoes['relacao_militares_su']['2'] as $militar) : ?>
            <tr>
                <td><?= $militar->getPostoGrad()->getPostoGrad() ?></td>
                <td><?= $militar->getNumero() ?></td>
                <td><?= $militar->getNomeGuerra() ?></td>
                <td>
                        <a target="_blank" href="<?= URL_RAIZ . 'militares/' . $militar->getId() . '/ficha' ?>" class="btn btn-xs btn-edit-branco" title="Visualizar Ficha do Militar">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/ficha.png'  ?>" alt="">
                        </a>        
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>

    <div id="militares-3" class="col-11 row card-relatorio card-militares" style="display:none">
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="">Posto/Grad</th>
            <th class="">Número</th>
            <th class="">Nome de Guerra</th>
            <th class="">Opções</th>
        </tr>
        <?php if (empty($informacoes['relacao_militares_su']['3'])) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhum Militar encontrado.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($informacoes['relacao_militares_su']['3'] as $militar) : ?>
            <tr>
                <td><?= $militar->getPostoGrad()->getPostoGrad() ?></td>
                <td><?= $militar->getNumero() ?></td>
                <td><?= $militar->getNomeGuerra() ?></td>
                <td>
                        <a target="_blank" href="<?= URL_RAIZ . 'militares/' . $militar->getId() . '/ficha' ?>" class="btn btn-xs btn-edit-branco" title="Visualizar Ficha do Militar">
                            <img class="icone" src="<?= URL_PUBLICO . '/img/ficha.png'  ?>" alt="">
                        </a>  
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>

    <div class="col-3 row card-relatorio">
      <h3 class="col-12">Visitas Médicas </h3>
      <div class="col-12 text-center" id="grafico_visitas">        
        <h4 class="text-left">Quantidade em <?= date('Y') ?></h4>
        <h5><?= $informacoes['possuem_visita'] ?></h5>
        <h4 class="text-center">realizadas</h4>
        <button id="btn-visitas" type="submit" class="btn btn-success col-12">Visualizar visitas médicas</button>
        <button id="btn-fechar-visitas" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar visitas médicas</button>
      </div>
      
    </div>

    <div id="grafico_detalhado_visitas" class="col-8 card-detalhado row card-relatorio grafico" style="display:none">
      <h3 class="col-12">Informações Visitas Médicas</h3>
      <div class="col-12" id="grafico_visitas_su">
        <div id="chart_visitas_su"></div>
      </div>
      <div class="col-12" id="grafico_visitas_su">
        <div id="chart_visitas_mes"></div>
      </div>
    </div>

    <div class="col-3 row card-relatorio">
      <h3 class="col-12">Vacinações</h3>
      <div class="col-12 text-center" id="grafico_visitas">        
        <h4 class="text-left">Quantidade em <?= date('Y') ?></h4>
        <h5><?= $informacoes['possuem_vacinacao'] ?></h5>
        <h4 class="text-center">realizadas</h4>
        <button id="btn-vacinas" type="submit" class="btn btn-success col-12">Visualizar vacinas</button>
        <button id="btn-fechar-vacinas" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar vacinas</button>
      </div>      
    </div>

    <div id="grafico_detalhado_vacinas" class="col-5 card-detalhado row card-relatorio grafico" style="display: none;">
      <h3 class="col-12">Informações Vacinações</h3>
      <div class="col-12">
        <div id="chart_vacinacao_su"></div>
      </div>
      <div class="col-12">
        <div id="chart_vacinas_quantidade"></div>
      </div>
    </div>

    <div class="col-5 row card-relatorio">
      <h3 class="col-12">Punições</h3>
      <div class="col-12 text-center">        
        <div class="col-12" id="grafico_punicoes">
          <div id="chart_punicoes_om"></div>
        </div>
        <button id="btn-punicoes" type="submit" class="btn btn-success col-12">Visualizar punições das SU</button>
        <button id="btn-fechar-punicoes" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar punições SU</button>
      </div>      
    </div>

    <div id="grafico_detalhado_punicoes" class="col-6 card-detalhado row card-relatorio grafico" style="display: none;">
      <h3 class="col-12">Punições dentro das Subunidades</h3>
      <div class="col-3">
        <button id="punicao_bc" type="button" class="btn btn-success col-12">Bia Cmdo</button>
        <button id="punicao_1" type="button" class="btn btn-success col-12">1ª Bia O</button>
        <button id="punicao_2" type="button" class="btn btn-success col-12">2ª Bia O</button>
        <button id="punicao_3" type="button" class="btn btn-success col-12">3ª Bia O</button>
      </div>
      
      <div class="col-9">
        <div id="chart_punicoes_su" style="display: none;"></div>
      </div>
    </div>

    <div class="col-5 row card-relatorio">
      <h3 class="col-12">Recompensas</h3>
      <div class="col-12 text-center">        
        <div class="col-12" id="grafico_recompensas">
          <div id="chart_recompensas_om"></div>
        </div>
        <button id="btn-recompensas" type="submit" class="btn btn-success col-12">Visualizar recompensas das SU</button>
        <button id="btn-fechar-recompensas" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar recompensas SU</button>
      </div>      
    </div>

    <div id="grafico_detalhado_recompensas" class="col-6 card-detalhado row card-relatorio grafico" style="display: none;">
      <h3 class="col-12">Recompensas dentro das Subunidades</h3>
      <div class="col-3">
        <button id="recompensa_bc" type="button" class="btn btn-success col-12">Bia Cmdo</button>
        <button id="recompensa_1" type="button" class="btn btn-success col-12">1ª Bia O</button>
        <button id="recompensa_2" type="button" class="btn btn-success col-12">2ª Bia O</button>
        <button id="recompensa_3" type="button" class="btn btn-success col-12">3ª Bia O</button>
      </div>
      
      <div class="col-9">
        <div id="chart_recompensas_su" style="display: none;"></div>
      </div>
    </div>

    <div class="col-6 row card-relatorio">
      <h3 class="col-12">Avaliações</h3>
      <div class="col-12 text-center row">        
        <div class="col-8" id="grafico_avaliacoes">
          <div id="chart_avaliacoes_om"></div>
        </div>
        <div class="col-4">
            <h4 class="text-center matricula-cfc">Podem ser matriculados no CFC</h4>
            <h5><?= $informacoes['matricula_cfc'] ?></h5>
            <h4 class="text-center">militares</h4>
        </div>
        <button id="btn-avaliacoes" type="submit" class="btn btn-success col-12">Visualizar avaliações das SU</button>
        <button id="btn-fechar-avaliacoes" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar avaliações SU</button>
      </div>      
    </div>

    <div id="grafico_detalhado_avaliacoes" class="col-6 row card-relatorio card-detalhado grafico" style="display: none;">
      <h3 class="col-12">Avaliações dentro das Subunidades</h3>
      <div class="col-3">
        <button id="avaliacoes_bc" type="button" class="btn btn-success col-12">Bia Cmdo</button>
        <button id="avaliacoes_1" type="button" class="btn btn-success col-12">1ª Bia O</button>
        <button id="avaliacoes_2" type="button" class="btn btn-success col-12">2ª Bia O</button>
        <button id="avaliacoes_3" type="button" class="btn btn-success col-12">3ª Bia O</button>
      </div>
      
      <div class="col-9">
        <div id="chart_avaliacoes_su" style="display: none;"></div>
      </div>
    </div>

    <div class="col-4 row card-relatorio">
      <h3 class="col-12">Testes de Aptidão Física</h3>
      <div class="col-12 text-center row">        
        <div class="col-12" id="grafico_taf">
          <div id="chart_taf_om"></div>
        </div>
        <button id="btn-taf" type="submit" class="btn btn-success col-12">Visualizar TAF das SU</button>
        <button id="btn-fechar-taf" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar TAF SU</button>
      </div>      
    </div>

    <div id="grafico_detalhado_taf" class="col-7 row card-relatorio card-detalhado grafico" style="display: none;">
      <h3 class="col-12">Testes de Aptidão Física das Subunidades</h3>
      <div class="col-3">
        <button id="taf_bc" type="button" class="btn btn-success col-12">Bia Cmdo</button>
        <button id="taf_1" type="button" class="btn btn-success col-12">1ª Bia O</button>
        <button id="taf_2" type="button" class="btn btn-success col-12">2ª Bia O</button>
        <button id="taf_3" type="button" class="btn btn-success col-12">3ª Bia O</button>
      </div>
      
      <div class="col-9">
        <div id="chart_taf_su" style="display: none;"></div>
      </div>
    </div>


    <div class="col-7 row card-relatorio">
      <h3 class="col-12">Instruções Realizadas</h3>
      <div class="col-12 text-center row">        
        <div class="col-4" id="grafico_instrucoes">
          <div id="chart_instrucoes_om_iib"></div>
        </div>     
        <div class="col-4" id="grafico_instrucoes">
            <div id="chart_instrucoes_om_pab"></div>
        </div>
        <div class="col-4" id="grafico_instrucoes">
            <div id="chart_instrucoes_om_iiq"></div>
        </div>
        <button id="btn-instrucoes" type="submit" class="btn btn-success col-12">Visualizar Instruções ministradas</button>
        <button id="btn-fechar-instrucoes" style="display: none;" type="submit" class="btn btn-danger col-12">Fechar Instruções ministradas</button>
      </div>      
    </div>

    <div id="instrucoes" class="col-11 row card-relatorio card-militares" style="display:none">
    <h2 class="col-12">Instruções Ministradas</h1>
    <table class="table">
        <tbody class="col-12">
        <tr>
            <th class="col-3 hidden-xs">Matéria</th>
            <th class="col-2 hidden-xs">Instrutor</th>
            <th class="col-2">Identificação</th>
            <th class="col-1">Fase</th>
            <th class="col-1">Data de Realização</th>
            <th class="col-2">Opções</th>
        </tr>
        <?php if (empty($informacoes['ministradas'])) : ?>
            <tr>
                <td colspan="99" class="text-center">Nenhuma Instrução ministrada.</td>
            </tr>
        <?php endif ?>
        <?php foreach ($informacoes['ministradas'] as $ministrada) : ?>
            <tr>
                <td><?= $ministrada->getInstrucao()->getMateria() ?></td>
                <td><?= $ministrada->getInstrutor() ?></td>
                <td><?= $ministrada->getInstrucao()->getIdentificacao() ?></td>
                <td><?= $ministrada->getInstrucao()->getFase(); ?></td>
                <td><?= $ministrada->getData(); ?></td>
                <td>
                    <a target="_blank" href="<?= URL_RAIZ . 'instrucoes/' . $ministrada->getIdinstrucao() . '/visualizar' ?>" class="btn btn-xs btn-edit-branco" title="Editar">
                        <img class="icone" src="<?= URL_PUBLICO . '/img/visualizar.png'  ?>" alt="">
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </div>

    
    
</div>
