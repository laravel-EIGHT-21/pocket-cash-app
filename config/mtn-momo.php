<?php

return [

    /*
     * Momo API client application name.
     *
     * This could be indicated in the message sent to the payee.
     */
    'app' => env('MOMO_APP', 'Laravel MTN Momo'),

    // Momo API transaction currency code.
    'currency' => env('MOMO_CURRENCY', 'EUR'),

    /*
     * Target environment.
     *
     * Also called; targetEnvironment
     */
    'environment' => env('MOMO_ENVIRONMENT', 'sandbox'),

    /*
     * Product.
     *
     * The product you subscribed too.
     *
     * @see https://momodeveloper.mtn.com/products
     */
    'product' => env('MOMO_PRODUCT', 'remittance'),

    /*
     * Provider Callback Host.
     *
     * It's basically the host for your server domain.
     */
    'provider_callback_host' => env('MOMO_PROVIDER_CALLBACK_HOST', '127.0.0.1'),

    'api' => [
        // API base URI.
        'base_uri' => env('MOMO_API_BASE_URI', 'https://sandbox.momodeveloper.mtn.com/'),

        // Register client ID URI
        'register_id_uri' => env('MOMO_API_REGISTER_ID_URI', 'v1_0/apiuser'),

        // Validate client ID URI
        'validate_id_uri' => env('MOMO_API_VALIDATE_ID_URI', 'v1_0/apiuser/{clientId}'),

        // Generate client secret URI
        'request_secret_uri' => env('MOMO_API_REQUEST_SECRET_URI', 'v1_0/apiuser/{clientId}/apikey'),
    ],

    'products' => [
        
        'remittance' => [

             /*
             * Client app ID.
             *
             * Also called; X-Reference-Id and api_user_id interchangeably
             *
             * User generated UUID4 string, and it has to be registered with the API.
             */
            'id' => env('MOMO_REMITTANCE_ID'),


             /*
             * Callback URI.
             *
             * Also called; providerCallbackHost
             */
            'callback_uri' => env('MOMO_REMITTANCE_CALLBACK_URI'),


             /*
             * Client app secret.
             *
             * Also called; apiKey
             *
             * Requested for secret from the MTN Momo API.
             */
            'secret' => env('MOMO_REMITTANCE_SECRET'),


             /*
             * Production subscription key.
             *
             * Also called; Ocp-Apim-Subscription-Key
             */
            'key' => env('MOMO_REMITTANCE_SUBSCRIPTION_KEY'),


            // Party ID type
            'party_id_type' => env('MOMO_REMITTANCE_PARTY_ID_TYPE', 'msisdn'),

            // Token uri
            'token_uri' => env('MOMO_REMITTANCE_TOKEN_URI', 'remittance/token/'),

            // Transact (remit)
            'transaction_uri' => env('MOMO_REMITTANCE_TRANSACTION_URI', 'remittance/v1_0/transfer'),

            // Transaction status
            'transaction_status_uri' => env(
                'MOMO_REMITTANCE_TRANSACTION_STATUS_URI',
                'remittance/v1_0/transfer/{momoTransactionId}'
            ),

            // Account balance
            'account_balance_uri' => env('MOMO_REMITTANCE_APP_BALANCE_URI', 'remittance/v1_0/account/balance'),

            // Account status
            'account_status_uri' => env(
                'MOMO_REMITTANCE_USER_ACCOUNT_URI',
                'remittance/v1_0/accountholder/{partyIdType}/{partyId}/active'
            ),

            // Account Holder Info
            'account_holder_info_uri' => env(
                'MOMO_REMITTANCE_USER_ACCOUNT_HOLDER_INFO_URI',
                'remittance/v1_0/accountholder/msisdn/{partyId}/basicuserinfo'
            ),
        ],
    ],

    /*
     * GuzzleHttp client request options.
     * http://docs.guzzlephp.org/en/stable/request-options.html
     */
    'guzzle' => [
        'options' => [
            // 'verify' => false,
        ],
    ],
];
