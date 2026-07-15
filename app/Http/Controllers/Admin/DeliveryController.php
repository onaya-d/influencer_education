<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeliveryRequest;

class DeliveryController extends Controller
{
    // 配信日時設定画面
    public function showDeliveryEdit($id)
    {
        // $curriculum = Curriculum::with('deliveryTimes')->find($id); // 授業と配信日時をDB取得
        return view('admin.delivery');
        // return view('admin.delivery', compact('curriculum'));
    }

    // 配信日時設定登録処理
    public function store(StoreDeliveryRequest $request)
    {
        // DB::beginTransaction();
        // try {
        //     DeliveryTime::create([
        //         'curriculum_id' => $request->curriculum_id,
        //         'start_date'    => $request->start_date,
        //         'start_time'    => $request->start_time,
        //         'end_date'      => $request->end_date,
        //         'end_time'      => $request->end_time,
        //     ]);
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return back()->with('error', '登録に失敗しました。');
        // }
    }
}