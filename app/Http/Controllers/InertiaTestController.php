<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
// 学習用メモ
// Modelというのは、Laravelにおいて、DBとのやり取りを担う、仲介役である！！！
use App\Models\InertiaTest;

// 学習用メモ
// renderの第２引数には、変数(X) => もらった引数(Y)で、X:Yのような関係にできる！！！！
class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render("Inertia/Index", [
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create()
    {
        return Inertia::render("Inertia/Create");
    }

    public function show($id)
    {
        return Inertia::render(
            "Inertia/Show",
            [
                "id" => $id,
                'blog' => InertiaTest::findOrFail($id)
            ]
        );
    }

    public function store(Request $request)
    {

        // 学習用メモ。「required」や「max」はLaravelに予め備わっているもの。詳しくはググる。
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest();
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        // 学習用メモ。 inertia.indexにリダイレクトするとともに（with）、message : "登録しました" という連想配列を渡す。
        return to_route("inertia.index")
            ->with([
                'message' => '登録しました'
            ]);
    }

    public function delete($id)
    {
        $blog = InertiaTest::findOrFail($id);
        $blog->delete();
        return to_route("inertia.index")
            ->with([
                'message' => '削除しました'
            ]);
    }
}
