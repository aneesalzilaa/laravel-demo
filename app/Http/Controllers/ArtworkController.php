<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\Category;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $catogoty = Category::all();
      return view('dashbordcomponant.addart',compact('catogoty')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'artist' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'contact_number' => 'required|string',
            'email' => 'required|email',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string', // ✅  إضافة التحقق من الوصف
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
              'is_sold' => 'required|boolean'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);
            $imagePath = 'upload/' . $imageName; // ✅ تخزين المسار النسبي في قاعدة البيانات
        }

        Artwork::create([
            'title' => $request->title,
            'artist' => $request->artist,
            'category_id' => $request->category_id,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'price' => $request->price,
            'description' => $request->description, // ✅ إضافة الوصف في الإنشاء
            'image_path' => $imagePath,
            'is_sold' => $request->is_sold
        ]);

        return redirect()->route('artwork')->with('success', 'Artwork added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $artworks = Artwork::with('category')->get(); // جلب جميع اللوحات مع الفئات المرتبطة بها
        return view('dashbordcomponant.showeditart', compact('artworks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artwork = Artwork::findOrFail($id); // ✅ جلب اللوحة أو إرجاع خطأ 404 إذا لم تكن موجودة
        $categories = Category::all(); // ✅ جلب جميع الفئات لإتاحة التعديل عليها
        return view('dashbordcomponant.editartwork', compact('artwork', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // ✅ جلب اللوحة من قاعدة البيانات
        $artwork = Artwork::findOrFail($id);

        // ✅ التحقق من صحة البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'is_sold' => 'required|boolean',
        ]);

        // ✅ تحديث البيانات بدون الصورة
        $artwork->update([
            'title' => $request->title,
            'artist' => $request->artist,
            'category_id' => $request->category_id,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'price' => $request->price,
            'description' => $request->description,
            'is_sold' => $request->is_sold,
        ]);

        // ✅ تحديث الصورة إن وُجدت
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload'), $imageName);
            $artwork->update(['image_path' => 'upload/' . $imageName]);
        }

        // ✅ إعادة التوجيه مع رسالة نجاح
        return redirect()->route('artwork.show')->with('success', 'Artwork updated successfully!!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artwork = Artwork::findOrFail($id); // البحث عن اللوحة أو إرجاع خطأ 404 إذا لم يتم العثور عليها
        $artwork->delete(); // حذف اللوحة

        return redirect()->route('artwork.show')->with('success', 'Artwork deleted successfully!');
    }
}
