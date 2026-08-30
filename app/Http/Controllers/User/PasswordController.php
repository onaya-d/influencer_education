<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index(Request $request)
    {
        $user = $this->getTemporaryUser($request);

        return view('user.password', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = $this->getTemporaryUser($request);

        $validated = $request->validate(
            [
                'old_password' => [
                    'required',
                ],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],
            ],
            [
                'old_password.required' => '旧パスワードを入力してください。',
                'password.required' => '新パスワードを入力してください。',
                'password.string' => '新パスワードは文字列で入力してください。',
                'password.min' => '新パスワードは8文字以上で入力してください。',
                'password.confirmed' => '新パスワード確認が一致していません。',
            ]
        );

        if (!Hash::check($validated['old_password'], $user->password)) {
            return back()
                ->withErrors([
                    'old_password' => '旧パスワードが正しくありません。',
                ])
                ->withInput();
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('user.password')
            ->with('success', 'パスワードを変更しました。');
    }

    private function getTemporaryUser(Request $request): User
    {
        $userId = $request->session()->get('profile_user_id');

        $user = $userId
            ? User::find($userId)
            : null;

        if (!$user) {
            $user = User::firstOrCreate(
                [
                    'email' => 'test@example.com',
                ],
                [
                    'name' => '山田太郎',
                    'kana' => 'ヤマダタロウ',
                    'password' => Hash::make('password'),
                ]
            );

            $request->session()->put('profile_user_id', $user->id);
        }

        return $user;
    }
}