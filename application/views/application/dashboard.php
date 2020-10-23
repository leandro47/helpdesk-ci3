<?php
defined('BASEPATH') or exit('URL inválida.');
?>

<?php $this->load->view('includes/head') ?>
<?php $this->load->view('includes/menu') ?>

<div class="container-fluid" id="container-wrapper">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Inicio</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    </ol>
  </div>

  <div class="row mb-3">

    <!-- Pendentes -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Pendentes</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-exclamation-triangle fa-2x text-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Andamento -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Andamento</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-truck fa-2x text-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Concluido -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Concluído</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check-circle fa-2x text-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Grafico de tickets aberto e encerrado dentro do Mês -->
    <div class="col-lg-12 col-md-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-2">Tickets por dia</h6>
        </div>
        <div class="card-body text-4">
          <div class="chart-bar">
            <canvas id="ticketMesAtual"></canvas>
          </div>
          <hr>
          Aberto e encerrado dentro do mês.
        </div>
      </div>
    </div>

  </div>

</div>

<?php $this->load->view('includes/footer') ?>
<?php $this->load->view('includes/scripts') ?>

</body>

<script>
  //Executa funções ao finalizar o carregamento da pagina 
  $(document).ready(function() {
    getTickets();
  });

  function getTickets() {
    $.ajax({
        url: `${BASE_URL}Welcome/getTicketsMonth`,
        type: 'GET',
        dataType: "json",
        cache: false,
        beforeSend: function() {

        }
      })
      .done(function(data) {

        //Exibi os graficos 
        chartMovimentacaoDiaria(['01', '02', '03', '01', '02', '03', '01', '02', '03', '01', '02', '03', '01', '02', '03', '01', '02', '03', '01', '02', '03', '01', '02', '03', '01', '02', '03'], [5, 8, 10, 5, 8, 10, 5, 8, 10, 5, 8, 10, 5, 8, 10, 5, 8, 10, 5, 8, 10, 5, 8, 10, 5, 8, 10], [9, 12, 15, 9, 12, 15, 9, 12, 15, 9, 12, 15, 9, 12, 15, 9, 12, 15, 9, 12, 15, 9, 12, 15, 9, 12, 15]);
     
      })
      .fail(function(jqXHR, textStatus, msg) {
        console.log(msg);
      });
  }


  //Carrega o grafico linha 
  function chartMovimentacaoDiaria(arrMesses = ['Vazio'], arrEntradas = [0], arrSaidas = [0]) {
    var ctx = document.getElementById("ticketMesAtual").getContext('2d');;
    var grafico = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: arrMesses,
        datasets: [{
            label: 'Aberto',
            data: arrEntradas,
            backgroundColor: 'rgb(89, 13, 130)',
            hoverBackgroundColor: 'rgb(89, 13, 130, 0.5)',
            hoverBorderColor: "rgba(234, 236, 244, 1)"
          },
          {
            label: 'Encerrado',
            data: arrSaidas,
            backgroundColor: 'rgb(182, 26, 174)',
            hoverBackgroundColor: 'rgb(182, 26, 174, 0.5)',
            hoverBorderColor: "rgba(234, 236, 244, 1)"
          }
        ],

      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 15,
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              maxTicksLimit: 8,
              padding: 10,
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {}
        }
      }
    });
  }
</script>

</html>