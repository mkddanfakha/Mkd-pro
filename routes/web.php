<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapController;

// Sitemap pour le référencement
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Robots.txt dynamique
Route::get('/robots.txt', function () {
    $sitemapUrl = config('app.url') . '/sitemap.xml';
    $content = "User-agent: *\n";
    $content .= "Allow: /\n\n";
    $content .= "# Sitemap\n";
    $content .= "Sitemap: {$sitemapUrl}\n\n";
    $content .= "# Bloquer les fichiers sensibles\n";
    $content .= "Disallow: /api/\n";
    $content .= "Disallow: /storage/\n";
    $content .= "Disallow: /vendor/\n";
    $content .= "Disallow: /.env\n";
    $content .= "Disallow: /node_modules/\n";
    
    return response($content, 200)
        ->header('Content-Type', 'text/plain');
})->name('robots');

// SPA Vue.js - toutes les routes web pointent vers app.blade.php
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
