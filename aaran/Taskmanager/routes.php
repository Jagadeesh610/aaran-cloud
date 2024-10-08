<?php

use Illuminate\Support\Facades\Route;

//master
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/task', App\Livewire\TaskManger\Index::class)->name('task');
    Route::get('/task/{id}/upsert', App\Livewire\TaskManger\Upsert::class)->name('task.upsert');

});
