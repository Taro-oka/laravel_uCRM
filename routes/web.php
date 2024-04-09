<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\ItemController;

// 学習用メモ
// 'items'という部分は、resouceメソッドによって、適宜適切なURLに書き換えてくれる！
Route::resource('items', ItemController::class)->middleware(['auth', 'verified']);

// 学習用メモ
// Route::getの第１引数は、pages内のパスである！！！コントローラーをかませて呼ぶことも多い！！（InertiaTestController）
// Route::postの第１引数は、LaravelのルーターがHTTPリクエストを受け取り、適切なコントローラーとメソッドに処理を委譲するためのもの。
// 本ファイルで言うと、"/inertia"というURLの作業場を提供するイメージ。でもサーバー側でその作業場で勝手に動いているので、そのURLに遷移することも当然ない（クラス内のstoreメソッド内のreturn toで別のページに遷移するのは、視覚的に処理が済んだことを分からせるため。これをしないと画面上では何も変わらないうちに、データベースに保存されてる）。
// なので、/inertiaに対応する物理的なファイルは不要！！だし、別に"/apple"とかでも良いっちゃ良い。
// ただ、Vue.js側でInertia.postを実行する時は、その引数には↓のパスと同じのを渡す必要がある（この場合は、Inertia.post("/inertia", オブジェクト)）

Route::get("/inertia-test", function () {
    return Inertia::render("InertiaTest");
});

Route::get("/inertia/index", [InertiaTestController::class, "index"])->name("inertia.index");

Route::get("/inertia/create", [InertiaTestController::class, "create"])->name("inertia.create");

Route::get("/inertia/show/{id}", [InertiaTestController::class, "show"])->name("inertia.show");

Route::delete("/inertia/delete/{id}", [InertiaTestController::class, "delete"])->name("inertia.delete");

Route::post("/inertia", [InertiaTestController::class, "store"])->name("inertia.store");

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
