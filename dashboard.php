<?php
// Este archivo recibe la redirección desde login y carga el dashboard
require_once __DIR__ . '/controller/DashboardController.php';
$controller = new DashboardController();
$controller->index();
