    <?php

    use App\Http\Controllers\ColumnCardUpdateController;
    use App\Http\Controllers\ColumnCardDestroyController;
    use App\Http\Controllers\ColumnCardCreateController;
    use App\Http\Controllers\CardsReorderUpdateController;
    use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ColumnDestroyController;
use App\Http\Controllers\BoardColumnCreateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/boards/{board?}', [BoardController::class, 'show'])->name('boards');

    Route::post('/boards/{board}/columns', BoardColumnCreateController::class)
        ->name('boards.columns.store');

    Route::delete('/columns/{column}', ColumnDestroyController::class)
        ->name('columns.destroy');

    Route::post('/columns/{column}/cards', ColumnCardCreateController::class)
        ->name('columns.cards.store');

    Route::put('/columns/{column}/cards/{card}', ColumnCardUpdateController::class)
        ->scopeBindings()->name('columns.cards.update');

    Route::delete('/columns/{column}/cards/{card}', ColumnCardDestroyController::class)
        ->scopeBindings()->name('columns.cards.destroy');

    Route::put('/cards/reorder', CardsReorderUpdateController::class)
        ->name('cards.reorder');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
