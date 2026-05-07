<?php

require_once "../controllers/AuthController.php";

switch ($method) {

    case "POST":

        if ($id === "login") {
            AuthController::login();
        }
        break;
}