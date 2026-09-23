<?php

use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\FilaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\RegistroClinicoController;
use App\Http\Controllers\TriagemController;
use App\Models\Atendimento;
use App\Models\Paciente;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas públicas / autenticação
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'show'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.authenticate');

    /*
    |--------------------------------------------------------------------------
    | Recuperação de senha
    |--------------------------------------------------------------------------
    */

    Route::get('/esqueci-senha', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/esqueci-senha', [PasswordResetController::class, 'email'])
        ->name('password.email');

    Route::get('/redefinir-senha/{token}', [PasswordResetController::class, 'showResetPassword'])
        ->name('password.reset');

    Route::post('/redefinir-senha', [PasswordResetController::class, 'reset'])
        ->name('password.update');
});


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Rotas protegidas
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/', function () {

        $totalPacientes = Paciente::count();

        $aguardando = Atendimento::where(
            'status',
            'aguardando'
        )->count();

        $emTriagem = Atendimento::where(
            'status',
            'chamando'
        )->count();

        $totalAtendimentos = Atendimento::count();

        return view(
            'dashboard.index',
            compact(
                'totalPacientes',
                'aguardando',
                'emTriagem',
                'totalAtendimentos'
            )
        );

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Pacientes
    |--------------------------------------------------------------------------
    */

    Route::resource('pacientes', PacienteController::class)
        ->only([
            'index',
            'create',
            'store'
        ]);


    /*
    |--------------------------------------------------------------------------
    | Atendimentos
    |--------------------------------------------------------------------------
    */

    Route::resource('atendimentos', AtendimentoController::class)
        ->only([
            'index',
            'create',
            'store'
        ]);


    /*
    |--------------------------------------------------------------------------
    | Fila
    |--------------------------------------------------------------------------
    */

    Route::get('/fila', [FilaController::class, 'index'])
        ->name('fila.index');

    Route::post('/fila/chamar/{atendimento}', [FilaController::class, 'chamar'])
        ->name('fila.chamar');


    /*
    |--------------------------------------------------------------------------
    | Triagem
    |--------------------------------------------------------------------------
    */

    Route::get('/triagem', [TriagemController::class, 'index'])
        ->name('triagem.index');

    Route::get('/triagem/create', [TriagemController::class, 'create'])
        ->name('triagem.create');

    Route::post('/triagem', [TriagemController::class, 'store'])
        ->name('triagem.store');


    /*
    |--------------------------------------------------------------------------
    | Prontuário
    |--------------------------------------------------------------------------
    */

    Route::get('/prontuario', [RegistroClinicoController::class, 'index'])
        ->name('prontuario.index');

    Route::get('/prontuario/{atendimento}', [RegistroClinicoController::class, 'show'])
        ->name('prontuario.show');

    Route::post('/prontuario/{atendimento}', [RegistroClinicoController::class, 'store'])
        ->name('prontuario.store');

    Route::post('/prontuario/{atendimento}/finalizar', [RegistroClinicoController::class, 'finalizar'])
        ->name('prontuario.finalizar');
});