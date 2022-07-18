<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pessoas')->name('pessoas/')->group(static function() {
            Route::get('/',                                             'PessoasController@index')->name('index');
            Route::get('/create',                                       'PessoasController@create')->name('create');
            Route::post('/',                                            'PessoasController@store')->name('store');
            Route::get('/{pessoa}/edit',                                'PessoasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PessoasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pessoa}',                                    'PessoasController@update')->name('update');
            Route::delete('/{pessoa}',                                  'PessoasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('enderecos')->name('enderecos/')->group(static function() {
            Route::get('/',                                             'EnderecosController@index')->name('index');
            Route::get('/create',                                       'EnderecosController@create')->name('create');
            Route::post('/',                                            'EnderecosController@store')->name('store');
            Route::get('/{endereco}/edit',                              'EnderecosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EnderecosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{endereco}',                                  'EnderecosController@update')->name('update');
            Route::delete('/{endereco}',                                'EnderecosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('p-fisicas')->name('p-fisicas/')->group(static function() {
            Route::get('/',                                             'PFisicasController@index')->name('index');
            Route::get('/create',                                       'PFisicasController@create')->name('create');
            Route::post('/',                                            'PFisicasController@store')->name('store');
            Route::get('/{pFisica}/edit',                               'PFisicasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PFisicasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pFisica}',                                   'PFisicasController@update')->name('update');
            Route::delete('/{pFisica}',                                 'PFisicasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('p-juridicas')->name('p-juridicas/')->group(static function() {
            Route::get('/',                                             'PJuridicasController@index')->name('index');
            Route::get('/create',                                       'PJuridicasController@create')->name('create');
            Route::post('/',                                            'PJuridicasController@store')->name('store');
            Route::get('/{pJuridica}/edit',                             'PJuridicasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PJuridicasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pJuridica}',                                 'PJuridicasController@update')->name('update');
            Route::delete('/{pJuridica}',                               'PJuridicasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('veiculos')->name('veiculos/')->group(static function() {
            Route::get('/',                                             'VeiculosController@index')->name('index');
            Route::get('/create',                                       'VeiculosController@create')->name('create');
            Route::post('/',                                            'VeiculosController@store')->name('store');
            Route::get('/{veiculo}/edit',                               'VeiculosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'VeiculosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{veiculo}',                                   'VeiculosController@update')->name('update');
            Route::delete('/{veiculo}',                                 'VeiculosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('planos')->name('planos/')->group(static function() {
            Route::get('/',                                             'PlanosController@index')->name('index');
            Route::get('/create',                                       'PlanosController@create')->name('create');
            Route::post('/',                                            'PlanosController@store')->name('store');
            Route::get('/{plano}/edit',                                 'PlanosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PlanosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{plano}',                                     'PlanosController@update')->name('update');
            Route::delete('/{plano}',                                   'PlanosController@destroy')->name('destroy');
        });
    });
});