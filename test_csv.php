<?php
$archivo = __DIR__ . '/public/data/datos.csv';

if (!file_exists($archivo)) {
    die("Archivo no encontrado en $archivo");
}

$handle = fopen($archivo, 'r');
if ($handle === false) {
    die("No se pudo abrir el archivo");
}

$headers = fgetcsv($handle, 1000, ';');
if ($headers === false) die("No se pudieron leer los encabezados");

echo "Encabezados:\n";
print_r($headers);

while (($row = fgetcsv($handle, 1000, ';')) !== false) {
    print_r($row);
}

fclose($handle);


