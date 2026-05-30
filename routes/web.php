<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', fn() => redirect()->route('users.index'));

Route::resource('users', Controller::class);