<?php
class DashboardModel {
    public function getCsvData($archivo)
    {
        $data = [];
        if (($handle = fopen($archivo, 'r')) !== false) {
            // Leer encabezados con delimitador ;
            $headers = fgetcsv($handle, 1000, ';');

            // Normalizar encabezados (quitar espacios/BOM y mayúsculas)
            $headers = array_map(function($h) {
                return strtoupper(trim(preg_replace('/\x{FEFF}/u', '', $h))); // quita BOM
            }, $headers);

            while (($row = fgetcsv($handle, 1000, ';')) !== false) {
                if ($row === null || count($row) === 0) {
                    continue;
                }

                // Ajustar tamaño
                if (count($row) < count($headers)) {
                    $row = array_pad($row, count($headers), "0");
                } elseif (count($row) > count($headers)) {
                    $row = array_slice($row, 0, count($headers));
                }

                // Reemplazar vacíos
                $row = array_map(function($value) {
                    return ($value === null || trim($value) === '') ? "0" : trim($value);
                }, $row);

                $data[] = array_combine($headers, $row);
            }
            fclose($handle);
        }
        return $data;
    }
}
?>
