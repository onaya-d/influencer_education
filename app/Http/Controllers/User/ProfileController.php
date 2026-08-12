<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(Request $request)
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

        return view('user.profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $userId = $request->session()->get('profile_user_id');

        $user = User::findOrFail($userId);

        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'kana' => [
                    'required',
                    'string',
                    'max:255',
                ],
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email,' . $user->id,
                ],
                'profile_image' => [
                    'nullable',
                    'image',
                    'max:2048',
                ],
            ],
            [
                'name.required' => 'ユーザーネームを入力してください。',
                'name.string' => 'ユーザーネームは文字列で入力してください。',
                'name.max' => 'ユーザーネームは255文字以内で入力してください。',

                'kana.required' => 'カナを入力してください。',
                'kana.string' => 'カナは文字列で入力してください。',
                'kana.max' => 'カナは255文字以内で入力してください。',

                'email.required' => 'メールアドレスを入力してください。',
                'email.email' => 'メールアドレスの形式が正しくありません。',
                'email.max' => 'メールアドレスは255文字以内で入力してください。',
                'email.unique' => 'このメールアドレスはすでに使用されています。',

                'profile_image.image' => '画像ファイルを選択してください。',
                'profile_image.max' => 'プロフィール画像は2MB以下にしてください。',
            ]
        );

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $validated['profile_image'] = $request
                ->file('profile_image')
                ->store('profiles', 'public');
        }

        $user->update($validated);

        return redirect()
            ->route('user.profile')
            ->with('success', 'プロフィールを更新しました。');
    }
}