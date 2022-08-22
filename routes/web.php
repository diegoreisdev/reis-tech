<?php

use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Servico\ServicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('/servicos', ServicoController::class)->except('show');

Route::resource('/clientes', ClienteController::class);

Route::get('/pdf/{id}/', [ClienteController::class, 'gerarPdf'] )->name('cliente.pdf');