<?php
use GuzzleHttp\Client;

    function fetchDataOrToken($token, $requestPurpose){

    #if $requestPurpose is 'token' then this is the initial post request 
    #to get the actual authorization token, else if it's 'data' then make
    #request to get the actual data

    // Note: Move all the following parameters to an env file/variable
    //for initial request

    $basicToken = "Basic QVBJX0V4cGxvcmVyOjEyMzQ1NmlzQUxhbWVQYXNz";
    $basicUrl = "https://api.baubuddy.de/index.php/login";

    //for subsequent requests
    $bearer_token = $token;
    $bearerUrl = 'https://api.baubuddy.de/dev/index.php/v1/tasks/select';
    $data = [
        'username' => '365',
        'password' => '1',
    ];


    $client = new Client();

    //make a get request for the data
    if ($requestPurpose==='data'){
        $bearerHeaders = [
            'Content-Type' => 'application/json',
            'Authorization' => $bearer_token,
        ];

        $bearerResponse = $client->get($bearerUrl,
            [
            'headers' => $bearerHeaders,
            'json' => $data,
        ]);
        $tasks = json_decode((string)$bearerResponse->getBody());
        return $tasks;

        //else make a post request for a new token
    }else{
        $basicHeaders = [
            'Content-Type' => 'application/json',
            'Authorization' => $basicToken,
        ];

        $basicResponse = $client->post($basicUrl,
            [
            'headers' => $basicHeaders,
            'json' => $data,
        ]);

        
        $bearer_token = json_decode((string)$basicResponse->getBody());
        $bearer_token = $bearer_token->oauth->access_token;
        // var_dump("Bearer ".$bearer_token);
        return "Bearer ".$bearer_token;

        }   
    }


    function fetchOrUpdateData(){

    #first fetch and cache the authorization token 
    #use cached token to fetch actual data
    $cachedValue = cache()->remember("cache_key_0", 1200, function(){
        return fetchDataOrToken("None","token");}
    );

    // Use the cached value

    $tasks = fetchDataOrToken($cachedValue,"data");
    return $tasks;
        
    }