<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    private function _setupViewPaths()
    {
        $httpType = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https' : 'http';
        $serverName = $_SERVER['SERVER_NAME'];
        $scriptName = trim(dirname($_SERVER['SCRIPT_NAME']), '/');
        $port = $_SERVER['SERVER_PORT'] == 80 ? '' : ':' . $_SERVER['SERVER_PORT'];
        if ($scriptName) {
            $entrancePath = $httpType . '://' . $serverName . $port . '/' . $scriptName;
        } else {
            $entrancePath = $httpType . '://' . $serverName . $port;
        }

        $data = [
            'root' => $entrancePath,
            'cpn' => $entrancePath . '/components',
            'css' => $entrancePath . '/css',
            'js' => $entrancePath . '/js',
            'pic' => $entrancePath . '/img'
        ];

        view()->share('paths', $data);
    }

    private function _setupRepositories()
    {
        $this->app->bind(
            \App\Repositories\User\UserRepositoryContract::class,
            \App\Repositories\User\UserRepository::class
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (php_sapi_name() != 'cli') {
            $this->_setupViewPaths();
        }

        $this->_setupRepositories();
    }
}
