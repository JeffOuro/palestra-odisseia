<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('LandingPage');
});

Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');
Route::get('/admin/leads', [LeadController::class, 'index'])->name('admin.leads');
