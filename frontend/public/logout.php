<?php
require_once __DIR__ . '/../clases/Auth.php';

Auth::logout();

header("Location: /login.php");
exit;