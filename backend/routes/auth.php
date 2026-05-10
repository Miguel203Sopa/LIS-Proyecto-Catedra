<?php

require_once  __DIR__ . "/../controllers/AuthController.php";

switch ($method) {

    case "POST":

        if ($id === "login") {
            AuthController::login();
        }
        break;
}