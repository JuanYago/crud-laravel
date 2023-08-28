<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdemDeServicoController;


// routes/web.php
Route::get('ordens-de-servico', [OrdemDeServicoController::class, 'index'])->name('ordens-de-servico.index');

Route::get('ordens-de-servico/create', [OrdemDeServicoController::class, 'create'])->name('ordens-de-servico.create');

Route::post('ordens-de-servico', [OrdemDeServicoController::class, 'store'])->name('ordens-de-servico.store');

Route::get('ordens-de-servico/{ordens_de_servico}/edit', [OrdemDeServicoController::class, 'edit'])->name('ordens-de-servico.edit');

Route::put('ordens-de-servico/{ordens_de_servico}', [OrdemDeServicoController::class, 'update'])->name('ordens-de-servico.update');

Route::get('painel', [OrdemDeServicoController::class, 'painel'])->name('painel');

Route::delete('ordens-de-servico/{ordens_de_servico}', [OrdemDeServicoController::class, 'destroy'])->name('ordens-de-servico.destroy');

Route::get('ordens-de-servico/{ordens_de_servico}', [OrdemDeServicoController::class, 'show'])->name('ordens-de-servico.show');


