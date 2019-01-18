<?php

namespace App\Providers;

use App\Entity\Coleta;
use App\Entity\ConsolidacaoLotacao;
use App\Entity\HistoricoOperacao;
use App\Entity\Inventario;
use App\Entity\MaterialColetaEnvio;
use App\Entity\MaterialColeta;
use App\Entity\MembroAuxiliarLotacao;
use App\Entity\MembroInventario;
use App\Entity\Lotacao;
use App\Entity\VerificacaoInconsistencia;
use App\Entity\VwHistoricoTramiteColeta;
use App\Policies\ColetaPolicy;
use App\Policies\ConsolidacaoLotacaoPolicy;
use App\Policies\HistoricoOperacaoPolicy;
use App\Policies\InventarioPolicy;
use App\Policies\MaterialColetaEnvioPolicy;
use App\Policies\MaterialColetaPolicy;
use App\Policies\MembroAuxiliarLotacaoPolicy;
use App\Policies\MembroInventarioPolicy;
use App\Policies\LotacaoPolicy;
use App\Policies\VerificacaoInconsistenciaPolicy;
use App\Policies\VwHistoricoTramiteColetaPolicy;
use App\Service\KeycloakGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Coleta::class => ColetaPolicy::class,
        Lotacao::class => LotacaoPolicy::class,
        Inventario::class => InventarioPolicy::class,
        MaterialColeta::class => MaterialColetaPolicy::class,
        MembroInventario::class => MembroInventarioPolicy::class,
        HistoricoOperacao::class => HistoricoOperacaoPolicy::class,
        ConsolidacaoLotacao::class => ConsolidacaoLotacaoPolicy::class,
        MaterialColetaEnvio::class => MaterialColetaEnvioPolicy::class,
        MembroAuxiliarLotacao::class => MembroAuxiliarLotacaoPolicy::class,
        VwHistoricoTramiteColeta::class => VwHistoricoTramiteColetaPolicy::class,
        VerificacaoInconsistencia::class => VerificacaoInconsistenciaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Auth::provider('keycloak', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            return new KeycloakUserProvider();
        });
        Auth::extend('keycloak', function ($app, $name, array $config) {
            return new KeycloakGuard(Auth::createUserProvider($config['provider']), $app['request']);
        });
    }
}
