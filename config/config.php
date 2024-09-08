<?php


return [
    /*
    |--------------------------------------------------------------------------
    | Production Mode
    |--------------------------------------------------------------------------
    |
    | This value determines whether the package is in production mode. When set
    | to true, the package will use the production endpoint. Otherwise, it will
    | use the development endpoint. This value can be set via the environment
    | variable "TOKOSHANI_LAPAKGAMING_PRODUCTION".
    |
    */
    'production' => env('TOKOSHANI_LAPAKGAMING_PRODUCTION', true),

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | This is the API key used to authenticate requests to the LapakGaming API.
    | Ensure that this key is kept secret and never exposed in your code. This
    | value can be set via the environment variable "TOKOSHANI_LAPAKGAMING_API_KEY".
    |
    */
    'api_key' => env('TOKOSHANI_LAPAKGAMING_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | API Endpoints
    |--------------------------------------------------------------------------
    |
    | These are the API endpoints for both production and development
    | environments. Depending on the value of the "production" setting,
    | the appropriate endpoint will be used for API requests.
    |
    */
    'endpoint_production' => 'https://www.lapakgaming.com/api/',
    'endpoint_development' => 'https://dev.lapakgaming.com/api/',

      /*
    |--------------------------------------------------------------------------
    | Current Endpoint
    |--------------------------------------------------------------------------
    |
    | This value is dynamically determined based on the 'production' setting.
    | It will either be the production or development endpoint.
    |
    */
    'endpoint' => env('TOKOSHANI_LAPAKGAMING_PRODUCTION', false) 
                  ? 'https://www.lapakgaming.com/api/' 
                  : 'https://dev.lapakgaming.com/api/',
];
