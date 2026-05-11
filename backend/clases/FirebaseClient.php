<?php

class FirebaseClient
{
    private $apiKey =
        "TU_API_KEY";

    public function signIn(
        $email,
        $password
    ) {

        $url =
            "https://identitytoolkit.googleapis.com/v1/accounts:signInWithPassword?key="
            . $this->apiKey;

        $data = [

            "email" => $email,

            "password" => $password,

            "returnSecureToken" => true
        ];

        $options = [

            "http" => [

                "header" =>
                    "Content-Type: application/json",

                "method" => "POST",

                "content" =>
                    json_encode($data),

                "ignore_errors" => true
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

            return [

                "success" => false,

                "message" =>
                    "Error conectando con Firebase"
            ];
        }

        $result =
            json_decode($response, true);

        if (isset($result['error'])) {

            return [

                "success" => false,

                "message" =>
                    $result['error']['message']
            ];
        }

        return [

            "success" => true,

            "data" => $result
        ];
    }
}