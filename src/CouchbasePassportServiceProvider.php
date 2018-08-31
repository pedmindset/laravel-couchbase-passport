<?php

namespace Pedmindset\Couchbase;

use Illuminate\Support\ServiceProvider;
use Pedmindset\Couchbase\Passport\AuthCode;
use Pedmindset\Couchbase\Passport\Client;
use Pedmindset\Couchbase\Passport\PersonalAccessClient;
use Pedmindset\Couchbase\Passport\Token;
use Pedmindset\Couchbase\Passport\TokenRepository;
use Pedmindset\Couchbase\Passport\RefreshTokenRepository;



class CouchbasePassportServiceProvider extends ServiceProvider
{
    public function register()
    {
        /*
         * Passport client extends Eloquent model by default, so we alias them.
         */
        if (class_exists('Illuminate\Foundation\AliasLoader')) {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Laravel\Passport\AuthCode', AuthCode::class);
            $loader->alias('Laravel\Passport\Client', Client::class);
            $loader->alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            $loader->alias('Laravel\Passport\Token', Token::class);
            $loader->alias('Laravel\Passport\TokenRepository', TokenRepository::class);
            $loader->alias('Laravel\Passport\Bridge\RefreshTokenRepository', RefreshTokenRepository::class);

        } else {
            class_alias('Laravel\Passport\AuthCode', AuthCode::class);
            class_alias('Laravel\Passport\Client', Client::class);
            class_alias('Laravel\Passport\PersonalAccessClient', PersonalAccessClient::class);
            class_alias('Laravel\Passport\Token', Token::class);
            class_alias('Laravel\Passport\TokenRepository', TokenRepository::class);
            class_alias('Laravel\Passport\Bridge\RefreshTokenRepository', RefreshTokenRepository::class);


        }
    }
}
