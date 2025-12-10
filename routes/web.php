<?php

use Illuminate\Support\Facades\Route;

// SPA Vue.js - toutes les routes web pointent vers app.blade.php
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
