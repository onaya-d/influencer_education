<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCurriculumRequest;

class CurriculumController extends Controller
{
    // 授業一覧
   public function showCurriculumList()
    {
        // $curriculums = Curriculum::with('grade')->get(); // 授業一覧をDB取得
        // $grades = Grade::all(); // 学年一覧をDB取得
        return view('admin.culliculum_list');
        // return view('admin.culliculum_list', compact('curriculums', 'grades'));
    }

    // 授業新規登録画面
    public function showCurriculumCreate()
    {
        // $grades = Grade::all(); // 学年一覧をDB取得
        return view('admin.culliculum_create');
        // return view('admin.culliculum_create', compact('grades'));
    }

    // 授業新規登録処理
    public function store(StoreCurriculumRequest $request)
    {
        // DB::beginTransaction();
        // try {
        //     Curriculum::create([
        //         'grade_id'    => $request->grade,
        //         'title'       => $request->title,
        //         'movie_url'   => $request->movie_url,
        //         'description' => $request->description,
        //     ]);
        // DB::commit();
        // return redirect()->route('admin.show.curriculum.list')->with('success', '授業を登録しました。');
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return back()->with('error', '登録に失敗しました。');
        // }
    }
}