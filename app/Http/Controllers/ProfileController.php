<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    // تعبئة البيانات المدخلة في نموذج التحديث
    $user = $request->user();
    $user->fill($request->validated());

    // إذا تم تغيير البريد الإلكتروني، قم بإلغاء التحقق من البريد الإلكتروني
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    // إذا تم تغيير حالة المستخدم (status)، قم بتحديثها
    if ($user->isDirty('status')) {
        // يمكن إضافة منطق إضافي هنا إذا لزم الأمر
    }

    // حفظ التغييرات في قاعدة البيانات
    $user->save();

    // إعادة التوجيه مع رسالة النجاح
    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
