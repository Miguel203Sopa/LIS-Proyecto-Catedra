<?php

require 'Conexion.php';

$pdo = Conexion::obtenerInstancia();

$stmt = $pdo->query("SELECT 1");