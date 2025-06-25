<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatogotyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $categoty = Category::all();
        return view('dashbordcomponant.catogery',compact('categoty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // التحقق من صحة البيانات
                $request->validate([
                    'title' => 'required|string|max:255|unique:categories',
                ]);

                // إنشاء القسم الجديد
                Category::create([
                    'title' => $request->title,
                ]);

                // إعادة التوجيه مع رسالة نجاح
                return redirect()->back()->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(categoty $categoty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoty =Category::findOrFail($id);
        return view('dashbordcomponant.editcatogart', compact('categoty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'regex:/^[^\d]+$/'],
        ], [
            'title.regex' => 'The title must contain only letters, numbers are not allowed.',
        ]);

        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->save();

        return redirect()->route('catogory')->with('success', 'edit is done ');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('catogory')->with('success', 'catogory deleted successfully');
    }
}
