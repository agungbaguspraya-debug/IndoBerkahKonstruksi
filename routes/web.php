<?php
use App\Models\review;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserFileController;
use App\Http\Controllers\PenawaranController;




// User files (upload desain)
Route::middleware(['auth'])->group(function () {
    Route::post('/user-files', [UserFileController::class, 'store'])->name('user-files.store');
    Route::delete('/user-files/{userFile}', [UserFileController::class, 'destroy'])->name('user-files.destroy');
});

Route::get('/penawaran', [PenawaranController::class, 'index'])->name('penawaran.index');
Route::post('/penawaran', [PenawaranController::class, 'store'])->name('penawaran.store');

Route::get('/portofolio', function () { return view('frontend.portofolio');
})->name('portofolio');

Route::get('/tentang-kami', function () { return view('frontend.tentang-kami');
})->name('tentang-kami');

Route::get('/logo-client', function () { return view('frontend.logo-client');
})->name('logo-client');

Route::get('/parent-client', function () { return view('frontend.partner-client');
})->name('partner-client');

// user
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/dashbord', function () {
        return view('user.dashbord');
    });
});

// login
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::view('/login', 'auth.login')-> name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');



Route::get('/', function () {

    $reviews = review::with('user')
        ->where('is_approved', true)
        ->latest()
        ->take(6)
        ->get();

    return view('index', compact('reviews'));
});