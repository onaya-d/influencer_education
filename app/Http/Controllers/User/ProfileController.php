<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
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

    public function update(ProfileUpdateRequest $request)
    {
        $userId = $request->session()->get('profile_user_id');

        $user = User::findOrFail($userId);

        $validated = $request->validated();

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