<?php
require_once __DIR__ . '/../models/DashboardModel.php';

class DashboardController {
    private $model;

    public function __construct() {
        $this->model = new DashboardModel();
    }

    public function index() {
        $csvPath = __DIR__ . '/../public/data/datos.csv';
        $data = $this->model->getCsvData($csvPath);

        // Extraer datos únicos de ASESOR y FASE
        /* ==========================
           1) FASES ALCANZADAS POR ASESOR
        ========================== */
        $asesores = array_unique(array_column($data, 'ASESOR'));
        $fases    = array_unique(array_column($data, 'FASE'));

        // Inicializar conteo
        $conteo = [];
        foreach ($asesores as $asesor) {
            foreach ($fases as $fase) {
                $conteo[$asesor][$fase] = 0;
            }
        }

        // Contar fases por asesor
        foreach ($data as $fila) {
            if (!isset($fila['ASESOR']) || !isset($fila['FASE'])) continue;
            $asesor = $fila['ASESOR'];
            $fase   = $fila['FASE'];
            $conteo[$asesor][$fase]++;
        }

        // Preparar Chart.js
        $labels = array_values($fases);
        $datasets = [];
        foreach ($asesores as $asesor) {
            $datasets[] = [
                "label" => $asesor,
                "data" => array_values($conteo[$asesor]),
                "backgroundColor" => sprintf(
                    'rgba(%d,%d,%d,0.6)',
                    rand(0,255), rand(0,255), rand(0,255)
                )
            ];
        }

        $labelsJson = json_encode($labels, JSON_UNESCAPED_UNICODE);
        $datasetsJson = json_encode($datasets, JSON_UNESCAPED_UNICODE);
        /* ==========================
           2) LEADS POR PROGRAMA
        ========================== */
    // tu conteo (mantén tu lógica)
    $programas = array_unique(array_column($data, 'PROGRAMA'));
    $conteoVP = array_fill_keys($programas, 0);

    foreach ($data as $fila) {
        if (!isset($fila['PROGRAMA'])) continue;
        $conteoVP[$fila['PROGRAMA']]++;
    }

    $labelsVP = json_encode(array_keys($conteoVP), JSON_UNESCAPED_UNICODE);

    // Opción A: colores equidistantes HSL
    $backgroundColors = [];
    $n = count($conteoVP);
    $i = 0;
    foreach ($conteoVP as $programa => $cnt) {
        $h = round(($i * 360) / max(1, $n)); // evita división por cero
        $backgroundColors[] = "hsla($h,70%,50%,0.6)";
        $i++;
    }

    $datasetsVP = json_encode([[
        "label" => "Leads",
        "data" => array_values($conteoVP),
        "backgroundColor" => $backgroundColors,
        "borderColor" => "rgba(255,255,255,0.8)",
        "borderWidth" => 1
    ]], JSON_UNESCAPED_UNICODE);



        /* ==========================
        3) SEGUIMIENTO EFECTIVO
        ========================== */
        $dias = ["SEGUIMIENTO DIA 1", "SEGUIMIENTO DIA 2", "SEGUIMIENTO DIA 3", "SEGUIMIENTO DIA 4", "SEGUIMIENTO DIA 5"];
        $asesores = array_map('strtoupper', array_values($asesores));  
        // Inicializar matriz [asesor][dia] = 0
        $seguimiento = [];
        foreach ($asesores as $asesor) {
            foreach ($dias as $dia) {
                $seguimiento[$asesor][$dia] = 0;
            }
        }

        // Contar seguimientos realizados
        foreach ($data as $fila) {
            if (!isset($fila['ASESOR'])) continue;
            $asesor = $fila['ASESOR'];
            foreach ($dias as $dia) {
                if (!empty($fila[$dia])) {
                    $seguimiento[$asesor][$dia]++;
                }
            }
        }

        // Preparar data estilo "heatmap"
        $heatmapData = [];
        foreach ($asesores as $asesor) {
            foreach ($dias as $i => $dia) {
                $heatmapData[] = [
                    "x" => $dia,
                    "y" => $asesor,
                    "v" => $seguimiento[$asesor][$dia]
                ];
            }
        }

        $heatmapJson = json_encode($heatmapData, JSON_UNESCAPED_UNICODE);
        $asesoresJson  = json_encode($asesores, JSON_UNESCAPED_UNICODE);
                /* ==========================
        4) LEADS POR FECHA
        ========================== */

        $leadsporfecha = [];

        foreach ($data as $row) {
        $fecha = $row['FECHA'];
            if (!empty($fecha)) {
        // Agrupamos por fecha
                if (!isset($leadsPorFecha[$fecha])) {
                    $leadsPorFecha[$fecha] = 0;
                }
            $leadsPorFecha[$fecha]++;
            }
        }
        // Ordenar por fecha (importante para el gráfico)
        ksort($leadsPorFecha);

        $labelsFechas = array_keys($leadsPorFecha);
        $valuesFechas = array_values($leadsPorFecha);

        $labelsFechasJson = json_encode($labelsFechas, JSON_UNESCAPED_UNICODE);
        $valuesFechasJson = json_encode($valuesFechas, JSON_UNESCAPED_UNICODE);

        /* ==========================
        Render a la vista
        ========================== */
        
        

        


        /** holaaaa*/


    /* ==========================
       5) LEADS POR PROGRAMA POR SEMANA
    ========================== */
    $leadsPorProgramaSemana = [];
    foreach ($data as $fila) {
        if (empty($fila['PROGRAMA']) || empty($fila['FECHA'])) continue;
        $programa = $fila['PROGRAMA'];
        $semana   = date('o-W', strtotime($fila['FECHA'])); // formato Año-Semana
        $leadsPorProgramaSemana[$programa][$semana] = 
            ($leadsPorProgramaSemana[$programa][$semana] ?? 0) + 1;
    }

    $labelsSemana = [];
    $datasetsSemana = [];
    foreach ($leadsPorProgramaSemana as $programa => $valores) {
        ksort($valores); // ordenar semanas
        $labelsSemana = array_keys($valores);
        $datasetsSemana[] = [
            "label" => $programa,
            "data" => array_values($valores),
            "fill" => false,
            "borderColor" => sprintf(
                'rgba(%d,%d,%d,1)',
                rand(0,255), rand(0,255), rand(0,255)
            )
        ];
    }

    /* ==========================
       6) LEADS TOTAL POR SEMANA / LANZAMIENTO / CURSO / FASE
    ========================== */
    $leadsCompleto = [];
    foreach ($data as $fila) {
        if (empty($fila['FECHA']) || empty($fila['LANZAMIENTO']) || empty($fila['CURSO']) || empty($fila['FASE'])) continue;
        $semana = date('o-W', strtotime($fila['FECHA']));
        $clave = $fila['LANZAMIENTO'] . '-' . $fila['CURSO'] . '-' . $fila['FASE'];
        $leadsCompleto[$clave][$semana] = ($leadsCompleto[$clave][$semana] ?? 0) + 1;
    }

    /* ==========================
       7) LEADS POR PROGRAMA / FASE / ASESOR
    ========================== */
    $leadsProgramaFaseAsesor = [];
    foreach ($data as $fila) {
        if (empty($fila['PROGRAMA']) || empty($fila['FASE']) || empty($fila['ASESOR'])) continue;
        $leadsProgramaFaseAsesor[$fila['PROGRAMA']][$fila['FASE']][$fila['ASESOR']] =
            ($leadsProgramaFaseAsesor[$fila['PROGRAMA']][$fila['FASE']][$fila['ASESOR']] ?? 0) + 1;
    }

    /* ==========================
       8) BASE TOTAL POR ASESOR / FASE / FECHA INICIO
    ========================== */
    $baseAsesorFaseFecha = [];
    foreach ($data as $fila) {
        if (empty($fila['ASESOR']) || empty($fila['FASE']) || empty($fila['FECHA'])) continue;
        $fecha = date('Y-m-d', strtotime($fila['FECHA']));
        $baseAsesorFaseFecha[$fila['ASESOR']][$fila['FASE']][$fecha] =
            ($baseAsesorFaseFecha[$fila['ASESOR']][$fila['FASE']][$fecha] ?? 0) + 1;
    }

    // Convertir a JSON
    $labelsSemanaJson = json_encode($labelsSemana, JSON_UNESCAPED_UNICODE);
    $datasetsSemanaJson = json_encode($datasetsSemana, JSON_UNESCAPED_UNICODE);

    $leadsCompletoJson = json_encode($leadsCompleto, JSON_UNESCAPED_UNICODE);
    $leadsProgramaFaseAsesorJson = json_encode($leadsProgramaFaseAsesor, JSON_UNESCAPED_UNICODE);
    $baseAsesorFaseFechaJson = json_encode($baseAsesorFaseFecha, JSON_UNESCAPED_UNICODE);

    include __DIR__ . '/../views/dashboard.php';
    require __DIR__ . '/../view/AdmDashboard/index.php';




        /** hollaaaaa  */

        


    }
}
?>
