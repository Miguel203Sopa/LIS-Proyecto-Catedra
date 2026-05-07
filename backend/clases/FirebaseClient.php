<?php

class FirebaseClient
{
    private $apiKey = "AIzaSyBLqzMYMMjX6o1xiu9YBwe-RrzhnD7Zry4";

    public function signIn($email, $password)
    {
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
                "header"  => "Content-Type: application/json",
                "method"  => "POST",
                "content" => json_encode($data),
                "ignore_errors" => true
            ]
        ];

        $context = stream_context_create($options);

        $response = @file_get_contents(
            $url,
            false,
            $context
        );

        if ($response === FALSE) {

            return [
                "error" => true,
                "message" => "Error conectando con Firebase"
            ];
        }

        return json_decode($response, true);
    }
}