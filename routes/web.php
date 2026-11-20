
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;

Route::get('/', function () {
    return redirect()->route('kegiatans.index');
});

Route::resource('kegiatans', KegiatanController::class);
