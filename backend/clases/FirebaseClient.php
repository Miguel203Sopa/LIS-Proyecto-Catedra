<?php

class FirebaseClient
{
    private $apiKey =
        "AIzaSyBLqzMYMMjX6o1xiu9YBwe-RrzhnD7Zry4";

    /* ================= LOGIN ================= */

    public function signIn(
        $email,
        $password
    ) {

        $url =
            "https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key="
            . $this->apiKey;

        $data = [

            "email" => trim($email),

            "password" => trim($password),

            "returnSecureToken" => true
        ];

        return $this->request($url, $data);
    }

    /* ================= CAMBIAR PASSWORD ================= */

    public function changePassword(
        $idToken,
        $newPassword
    ) {

        $url =
            "https://identitytoolkit.googleapis.com/v1/accounts:update?key="
            . $this->apiKey;

        $data = [

            "idToken" => $idToken,

            "password" => trim($newPassword),

            "returnSecureToken" => true
        ];

        return $this->request($url, $data);
    }

    /* ================= OBTENER TOKEN POR UID ================= */

    public function loginByEmail(
        $email,
        $password
    ) {
        return $this->signIn($email, $password);
    }

    /* ================= REQUEST GENERAL ================= */

    private function request($url, $data)
    {

        $options = [

            "http" => [

                "header" =>
                    "Content-Type: application/json\r\n",

                "method" => "POST",

                "content" =>
                    json_encode($data),

                "ignore_errors" => true,

                "timeout" => 30
            ]
        ];

        $context =
            stream_context_create($options);

        $response =
            @file_get_contents(
                $url,
                false,
                $context
            );

        if ($response === false) {

            $error =
                error_get_last();

            return [

                "success" => false,

                "message" =>
                    "Error conectando con Firebase",

                "debug" =>
                    $error
            ];
        }

        $result =
            json_decode(
                $response,
                true
            );

        if (!$result) {

            return [

                "success" => false,

                "message" =>
                    "Respuesta inválida de Firebase",

                "raw_response" =>
                    $response
            ];
        }

        if (isset($result['error'])) {

            return [

                "success" => false,

                "message" =>
                    $result['error']['message'] ?? 'Error Firebase',

                "firebase_error" =>
                    $result['error']
            ];
        }

        return [

            "success" => true,

            "data" => $result
        ];
    }
}