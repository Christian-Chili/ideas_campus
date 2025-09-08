<?php
  //Llamamos al archivo de conexion.php
  require_once __DIR__ . '/../../config/connection.php';
  if(isset($_SESSION["admin_id"])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once __DIR__ . '/../global/Head.php';?>
    <title>Ideas-Campus::Dashboard-Inicio</title>
</head>
<body>
    <?php require_once __DIR__ . '/../global/MenuAdministrador.php';?>
    <?php require_once __DIR__ . '/../global/MainHeader.php'; ?>

<!-- SE PARTE Y EMPIEZA EL MAIN PANEL PRINCIPAL -->

    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Inicio</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Dashboard Principal</h4>
        <p class="mg-b-0">Control de Leads <span style="font-size:18px; font-family:'Poppins', sans-serif; font-weight:700; color:black;">AGOSTO</span></p>
      </div>
      <!-- ACA EMPIEZA EL BODY PRINCIPAL -->
      <!-- CONTENIDO DEL PROYECTO-->
       <div class="parent-grid">
            <div class="row-grid1">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800  tx-bold tx-14 mg-b-10">Totales del Mes</h6>
                        <hr>
                    </div>
                </div> 
            </div>
            <div class="row-grid2">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800  tx-bold tx-14 mg-b-10">Ventas por Asesor</h6>
                        <hr>
                        <canvas id="venta_x_asesor"></canvas>
                    </div>
                </div> 
            </div>
            <div class="row-grid3">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Leads por Programa</h6>
                        <hr>
                        <canvas id="ventasxprograma"></canvas>
                    </div>
                </div> 
            </div>
            <div class="row-grid4">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Evaluación semanal/mensual<h6>
                        <hr>
                        <canvas id="seguimientoHeatmap"></canvas>
                    </div>
                </div> 
            </div>
        </div>
        
     
    </div>

<script>
    const heatmapData = <?php echo $heatmapJson; ?>;
    const asesores = <?php echo json_encode($asesores, JSON_UNESCAPED_UNICODE); ?>;

    console.log("heatmapData:", heatmapData);
    console.log("asesores:", asesores);
</script>   
<script>
    // Inyectamos desde PHP
    const labels = <?php echo $labelsJson; ?>;
    const datasets = <?php echo $datasetsJson; ?>;

    const ctx = document.getElementById('venta_x_asesor').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: { 
            labels: labels, 
            datasets: datasets 
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Fases alcanzadas por cada asesor'
                },
                legend: {
                    position: 'top'
                }
            },
            scales: { 
                x: { 
                    stacked: false, 
                    title: {
                        display: true,
                        text: 'Fases'
                    }
                }, 
                y: { 
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad'
                    }
                } 
            }
        }
    });
    /* ========== 2) Ventas por programa ========== */
    new Chart(document.getElementById('ventasxprograma'), {
        type: 'doughnut',
        data: { 
            labels: <?php echo $labelsVP; ?>, 
            datasets: <?php echo $datasetsVP; ?> 
        },
        options: {
            responsive: true,
            plugins: { title: { display: true, text: 'Leads por programa' } },
            scales: { y: { beginAtZero: true } }
        }
    });
    /** 3) SEGUIMIENTOS DE LEADS POR VENDEDOR */

    const ctx2 = document.getElementById('seguimientoHeatmap').getContext('2d');
    new Chart(ctx2, {
    type: 'matrix',
    data: {
        datasets: [{
        label: 'Seguimiento efectivo',
        data: heatmapData,
        backgroundColor: (c) => {
            const v = c.raw.v;
            return v > 0 ? 'rgba(0,200,83,0.7)' : 'rgba(200,200,200,0.3)';
        },
        width: 5,   // ← fijo para testear
        height: 5   // ← fijo para testear
        }]
    },
    options: {
        scales: {
        x: {
            type: 'category',
            labels: ["SEGUIMIENTO DIA 1","SEGUIMIENTO DIA 2","SEGUIMIENTO DIA 3","SEGUIMIENTO DIA 4","SEGUIMIENTO DIA 5"]
        },
        y: {
            type: 'category',
            labels: <?php echo json_encode($asesores, JSON_UNESCAPED_UNICODE); ?>
        }
        },
        plugins: {
        tooltip: {
            callbacks: {
            label: (c) => `Leads: ${c.raw.v}`
            }
        }
        }
    }
    });

</script>
</body>
</html>
<?php
  }else{
    header("Location:".Conectar::route()."view/404/");
  }
?>