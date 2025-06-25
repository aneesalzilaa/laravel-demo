<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('okar_componatnts.about', compact('abouts'));
    }
    public function create()
    {
        $abouts = About::all();
        return view('dashbordcomponant.Aboutcontrooler',compact('abouts'));
    }

    public function update(Request $request, $id)
{
    $about = About::findOrFail($id);

    // تطبيق التحقق من الإدخال
    $request->validate([
        'birthday' => 'required|date',
        'age' => 'required|integer|min:1',
        'phone' => 'required|string|min:8',
        'city' => 'required|string|max:255',
        'degree' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'img' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048', // تحقق من الصورة
    ]);

    // تحديث البيانات
    $about->birthday = $request->birthday;
    $about->age = $request->age;
    $about->phone = $request->phone;
    $about->city = $request->city;
    $about->degree = $request->degree;
    $about->email = $request->email;

    // التحقق من تحميل صورة جديدة
    if ($request->hasFile('img')) {
        // حذف الصورة القديمة إن وجدت
        if ($about->img && file_exists(public_path('uploads/' . $about->img))) {
            unlink(public_path('uploads/' . $about->img));
        }

        // رفع الصورة الجديدة وحفظ المسار
        $fileName = time() . '_' . $request->file('img')->getClientOriginalName();
        $request->file('img')->move(public_path('uploads'), $fileName);
        $about->img = $fileName;
    }

    $about->save();

    // إعادة التوجيه مع رسالة نجاح
    return redirect()->back()->with('success', 'Data updated successfully!');
}

}
