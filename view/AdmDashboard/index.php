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
        <p class="mg-b-0">Control de Leads <span style="font-size:18px; font-family:'Poppins', sans-serif; font-weight:700; color:black;">SEPTIEMBRE(DIA 1 - 5)</span></p>
      </div>
      <!-- ACA EMPIEZA EL BODY PRINCIPAL -->
      <!-- CONTENIDO DEL PROYECTO-->
        <div class="parent-grid">
            <div class="row-grid1">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800  tx-bold tx-14 mg-b-10">Totales del Mes</h6>
                        <hr>
                        <canvas id="leadsTiempo"></canvas>
                            <!-- <div class="seguimiento-sub">
                                <p class="seguimiento-titulo">Mayor número de seguimientos por asesora</p>
                                <p class="seguimientos-all">Seguimiento 1: <span></span></p>
                                <p class="seguimientos-all">Seguimiento 2: <span></span></p>
                                <p class="seguimientos-all">Seguimiento 3: <span></span></p>
                                <p class="seguimientos-all">Seguimiento 4: <span></span></p>
                                <p class="seguimientos-all">Seguimiento 5: <span></span></p>
                            </div> -->
                    </div>
                </div> 
            </div>
            <div class="row-grid2">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800  tx-bold tx-14 mg-b-10">Ventas por Asesor</h6>
                        <hr>
                        <canvas id="venta_x_asesor"></canvas>
                        <!-- <div class="seguimiento-sub">
                            <p class="seguimiento-titulo">Mayor número de seguimientos por asesora</p>
                            <p class="seguimientos-all">Seguimiento 1: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 2: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 3: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 4: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 5: <span></span></p>
                        </div> -->
                    </div>
                </div> 
            </div>
            <div class="row-grid3">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Leads por Programa</h6>
                        <hr>
                        <canvas id="ventasxprograma" style="max-height:270px;" ></canvas>

                    </div>
                </div> 
            </div>
            <div class="row-grid4">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Evaluación semanal/mensual</h6>
                        <hr>
                        <canvas id="seguimientoHeatmap" style=""></canvas>
                        <!-- <div class="seguimiento-sub">
                            <p class="seguimiento-titulo">Mayor número de seguimientos por asesora</p>
                            <p class="seguimientos-all">Seguimiento 1: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 2: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 3: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 4: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 5: <span></span></p>
                        </div> -->
                    </div>
                </div> 
            </div>
            <div class="row-grid5">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Evaluación semanal/mensual</h6>
                        <hr>
                        <canvas id="leads_programa_semana" style=""></canvas>
                        <!-- <div class="seguimiento-sub">
                            <p class="seguimiento-titulo">Mayor número de seguimientos por asesora</p>
                            <p class="seguimientos-all">Seguimiento 1: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 2: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 3: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 4: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 5: <span></span></p>
                        </div> -->
                    </div>
                </div> 
            </div>
            <div class="row-grid6">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Evaluación semanal/mensual</h6>
                        <hr>
                        <canvas id="leads_programa_fase_semana" style=""></canvas>
                        <!-- <div class="seguimiento-sub">
                            <p class="seguimiento-titulo">Mayor número de seguimientos por asesora</p>
                            <p class="seguimientos-all">Seguimiento 1: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 2: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 3: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 4: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 5: <span></span></p>
                        </div> -->
                    </div>
                </div> 
            </div>
            <div class="row-grid7">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Evaluación semanal/mensual</h6>
                        <hr>
                        <canvas id="leads_programa_fase_asesor" style=""></canvas>
                        <!-- <div class="seguimiento-sub">
                            <p class="seguimiento-titulo">Mayor número de seguimientos por asesora</p>
                            <p class="seguimientos-all">Seguimiento 1: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 2: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 3: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 4: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 5: <span></span></p>
                        </div> -->
                    </div>
                </div> 
            </div>
            <div class="row-grid8">
                <div class="br-pagebody">
                    <div class="br-section-wrapper">
                        <h6 class="tx-gray-800 tx-bold tx-14 mg-b-10">Evaluación semanal/mensual</h6>
                        <hr>
                        <canvas id="base_asesor_fase_fecha" style=""></canvas>
                        <!-- <div class="seguimiento-sub">
                            <p class="seguimiento-titulo">Mayor número de seguimientos por asesora</p>
                            <p class="seguimientos-all">Seguimiento 1: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 2: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 3: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 4: <span></span></p>
                            <p class="seguimientos-all">Seguimiento 5: <span></span></p>
                        </div> -->
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
    const isMobile = window.innerWidth <= 794; // detectar celular
    new Chart(ctx, {
        type: 'bar',
        data: { 
            labels: labels, 
            datasets: datasets 
        },
        options: {
            responsive: true,
            maintainAspectRatio: isMobile ? false : true, // 👈 desactiva proporción fija
            aspectRatio: isMobile ? 1 : 1,    
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
                    suggestedMax: 21, // 👈 fuerza hasta 20
                    ticks: {
                        stepSize: isMobile ? 1 : 5    // 👈 muestra 0,5,10,15,20
                    },
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
            aspectRatio: 1,
            plugins: { 
                legend: {
                display: true,
                labels: {
                    generateLabels: function(chart) {
                        const data = chart.data;
                        if (data.labels.length && data.datasets.length) {
                            return data.labels.map((label, i) => {
                                const value = data.datasets[0].data[i]; // valor del dataset
                                return {
                                    text: `${label}: ${value}`, // 👉 nombre + número
                                    fillStyle: data.datasets[0].backgroundColor[i],
                                    strokeStyle: data.datasets[0].backgroundColor[i],
                                    index: i
                                };
                            });
                        }
                        return [];
                    }
                }}
            }
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
        width: 10,   // ← fijo para testear
        height: 10   // ← fijo para testear
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
        aspectRatio: 1,
        plugins: {
        tooltip: {
            callbacks: {
            label: (c) => `Leads: ${c.raw.v}`
            }
        }
        }
    }
    });
    //** 4.-leads por fecha*/
    const ctx3 = document.getElementById('leadsTiempo').getContext('2d');
    new Chart(ctx3, {
        type: 'line',
        data: {
            labels: <?php echo $labelsFechasJson; ?>,
            datasets: [{
                label: 'Leads generados',
                data: <?php echo $valuesFechasJson; ?>,
                fill: true,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.3, // curva suave
                pointRadius: 4,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)'
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 1,
            plugins: {
                title: {
                    display: true,
                    text: 'Evolución diaria de Leads'
                },
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    title: { display: true, text: 'Fecha' }
                },
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Número de Leads' }
                }
            }
        }
    });
    /** 5.-Leads por programa por sermana */
    const labelsSemana = <?php echo $labelsSemanaJson; ?>;
    const datasetsSemana = <?php echo $datasetsSemanaJson; ?>;

    new Chart(document.getElementById('leads_programa_semana').getContext('2d'), {
        type: 'line',
        data: { labels: labelsSemana, datasets: datasetsSemana },
        options: {
            responsive: true,
            aspectRatio: 1,
            plugins: {
                title: { display: true, text: 'Leads por programa por semana' }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
    /** 6.- Leads por programa_fase_semana */
    const leadsCompleto = <?php echo $leadsCompletoJson; ?>;
    const labels2 = [...new Set(Object.values(leadsCompleto).flatMap(obj => Object.keys(obj)))];
    const datasets2 = Object.keys(leadsCompleto).map((clave, idx) => {
        return {
            label: clave,
            data: labels2.map(sem => leadsCompleto[clave][sem] ?? 0),
            backgroundColor: `rgba(${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)},0.6)`
        };
    });

    new Chart(document.getElementById('leads_programa_fase_semana').getContext('2d'), {
        type: 'bar',
        data: { labels: labels2, datasets: datasets2 },
        options: {
            responsive: true,
            aspectRatio: 1,
            plugins: {
                title: { display: true, text: 'Leads por programa y fase por semana' },
                legend: { position: 'top' }
            },
            scales: {
                x: { stacked: true },
                y: { stacked: true, beginAtZero: true }
            }
        }
    });
    /** 7.- leads_programa_fase_asesor*/
    const data3 = <?php echo $leadsProgramaFaseAsesorJson; ?>;

    // Preparamos: cada combinación PROGRAMA+FASE es un grupo, con barras por ASESOR
    let labels3 = [];
    let datasets3 = {};
    for (const programa in data3) {
        for (const fase in data3[programa]) {
            const group = programa + ' - ' + fase;
            labels3.push(group);
            for (const asesor in data3[programa][fase]) {
                if (!datasets3[asesor]) {
                    datasets3[asesor] = {
                        label: asesor,
                        data: [],
                        backgroundColor: `rgba(${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)},0.6)`
                    };
                }
            }
        }
    }

    // Rellenar los datos alineados
    for (const programa in data3) {
        for (const fase in data3[programa]) {
            const group = programa + ' - ' + fase;
            for (const asesor in datasets3) {
                const valor = data3[programa][fase][asesor] ?? 0;
                datasets3[asesor].data.push(valor);
            }
        }
    }

    new Chart(document.getElementById('leads_programa_fase_asesor').getContext('2d'), {
        type: 'bar',
        data: { labels: labels3, datasets: Object.values(datasets3) },
        options: {
            responsive: true,
            aspectRatio: 1,
            plugins: {
                title: { display: true, text: 'Leads por programa / fase / asesor' },
                legend: { position: 'top' }
            },
            scales: { y: { beginAtZero: true } }
        }
    });
    /** 8.- base total por asesor_fecha_fase*/
    const data4 = <?php echo $baseAsesorFaseFechaJson; ?>;

    // Sacamos todas las fechas
    let labels4 = [...new Set(Object.values(data4).flatMap(fases => 
        Object.values(fases).flatMap(obj => Object.keys(obj))
    ))].sort();

    // Construimos datasets por ASESOR+FASE
    let datasets4 = [];
    for (const asesor in data4) {
        for (const fase in data4[asesor]) {
            const dataset = {
                label: asesor + ' - ' + fase,
                data: labels4.map(fecha => data4[asesor][fase][fecha] ?? 0),
                borderColor: `rgba(${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)},${Math.floor(Math.random()*255)},1)`,
                fill: false
            };
            datasets4.push(dataset);
        }
    }

    new Chart(document.getElementById('base_asesor_fase_fecha').getContext('2d'), {
        type: 'line',
        data: { labels: labels4, datasets: datasets4 },
        options: {
            responsive: true,
            aspectRatio: 1,
            plugins: {
                title: { display: true, text: 'Base total por asesor / fase / fecha' }
            },
            scales: { 
                x: {
                    stacked:false,
                },
                y: { 
                    beginAtZero: true, 
                    suggestedMax:5,
                }
                
        }
        }
    });

</script>
<?php require_once __DIR__ . '/../global/MainJs.php'; ?>
</body>
</html>
<?php
  }else{
    header("Location:".Conectar::route()."view/404/");
  }
?>