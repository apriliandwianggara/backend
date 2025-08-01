    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\AboutController;
    use App\Http\Controllers\ContactController;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "api" middleware group. Make something great!
    |
    */

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Rute untuk Proyek
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/projects/{project}', [ProjectController::class, 'show']);
    Route::post('/projects/generate-description', [ProjectController::class, 'generateDetailedDescription']);

    // Rute untuk Tentang Saya
    Route::get('/about', [AboutController::class, 'index']);

    // Rute untuk Kontak
    Route::post('/contact', [ContactController::class, 'store']);
    