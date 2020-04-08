<?php

namespace OwenIt\Auditing;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SupervisorServiceProvider extends ServiceProvider {
  /**
   * Bootstrap any package services.
   *
   * @return void
   */
  public function boot () {
    if (! config('auditing-supervisor.enable')) {
      return;
    }

    $this->registerRoutes();
    $this->registerPublishing();

    $this->loadViewsFrom(
      __DIR__.'/../resources/views', 'auditing-supervisor'
    );
  }

  /**
   * Register the package routes.
   *
   * @return void
   */
  private function registerRoutes () {
    Route::group($this->routeConfiguration(), function () {
      $this->loadRoutesFrom(__DIR__.'/Http/routes.php');
    });
  }

  /**
   * Get the Auditing Supervisor route group configuration array.
   *
   * @return array
   */
  private function routeConfiguration () {
    return [
      'namespace' => 'OwenIt\AuditingSupervisor\Http\Controllers',
      'prefix' => config('auditing-supervidor.path'),
      'middleware' => 'auditing-supervisor'
    ];
  }

  /**
   * Register the package's publishable resources.
   *
   * @return void
   */
  private function registerPublishing () {
    if ($this->app->runningInConsole()) {
      $this->publishes([
        __DIR__.'/../public' => public_path('vendor/auditing-supervisor'),
      ], 'auditing-supervisor-assets');

      $this->publishes([
        __DIR__.'/../config/auditing-supervisor.php' => config_path('auditing-supervisor.php'),
      ], 'auditing-supervisor-config');
    }
  }
}