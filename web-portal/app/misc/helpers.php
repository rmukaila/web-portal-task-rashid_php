<?php
use GuzzleHttp\Client;
// namespace routes\Helpers;
// class Helpers {

//     public function __construct(){
//         return "initialized construct function";
//     }


    // public function fetchDataOrToken($token, $requestPurpose){
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

            $bearerResponse = $client->get($bearerUrl, [
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

            $basicResponse = $client->post($basicUrl, [
                'headers' => $basicHeaders,
                'json' => $data,
            ]);

            
            $bearer_token = json_decode((string)$basicResponse->getBody());
            $bearer_token = $bearer_token->oauth->access_token;
            var_dump("Bearer ".$bearer_token);
            return "Bearer ".$bearer_token;

        }
    

    }


    // public function fetchOrUpdateData(){
        function fetchOrUpdateData(){

        #first fetch and cache the authorization token 
        #use cached token to fetch actual data 

        // $cachedValue = apc_fetch('cache_key');

        $cachedValue = cache()->remember("cache_key_0", 1200, function(){
            return fetchDataOrToken("None","token");}
        );

        // if ($cachedValue) {
        // Use the cached value

        $tasks = fetchDataOrToken($cachedValue,"data");
        return $tasks;
        
        // } 
        //else {
        // Generate token value and store it in cache
        // $value = fetchDataOrToken("token");
        // apc_store('cache_key', $value, 3600);

        //now make another request for the data
       // $tasks = fetchDataOrToken($value,"data");
       // return $tasks;
    }

    // }
// }