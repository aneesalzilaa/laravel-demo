<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('okar_componatnts.comntact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // جلب جميع الرسائل من قاعدة البيانات بترتيب زمني تنازلي
        $messages = Message::latest()->get();

        // تمرير البيانات إلى الـ View
        return view('dashbordcomponant.Correspondence', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^[0-9]+$/', 'min:8', 'max:20'],
            'content' => ['required', 'string'],
        ]);

        // حفظ البيانات في قاعدة البيانات
        Message::create($validatedData);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('contact')->with('success', 'Message added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $message = Message::findOrFail($id);
        return view('dashbordcomponant.Messagedetails', compact('message'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }
    public function updateStatus($id, $status)
    {
        $message = Message::findOrFail($id); // البحث عن الرسالة
        $message->is_answered = $status; // تحديث الحالة
        $message->save(); // حفظ التغيير

        return redirect()->back()->with('success', 'تم تحديث حالة الرسالة بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
