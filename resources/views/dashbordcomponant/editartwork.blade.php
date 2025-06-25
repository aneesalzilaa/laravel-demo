@extends('layoutsdash.dashbordlayouts')

@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit Artwork</h5>

        {{-- ✅ إظهار رسالة النجاح --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
          <div class="card-body">
            <form action="{{ route('artwork.update', $artwork->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT') {{-- ✅ جعل الطلب PUT لتحديث البيانات --}}

              {{-- ✅ عنوان اللوحة --}}
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="title" name="title" value="{{ old('title', $artwork->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ اسم الفنان --}}
              <div class="mb-3">
                <label for="artist" class="form-label">Artist Name</label>
                <input type="text" class="form-control @error('artist') is-invalid @enderror"
                       id="artist" name="artist" value="{{ old('artist', $artwork->artist) }}">
                @error('artist')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ اختيار الفئة --}}
              <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror"
                        id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ old('category_id', $artwork->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ رقم التواصل --}}
              <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" class="form-control @error('contact_number') is-invalid @enderror"
                       id="contact_number" name="contact_number"
                       value="{{ old('contact_number', $artwork->contact_number) }}">
                @error('contact_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ البريد الإلكتروني --}}
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" value="{{ old('email', $artwork->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ السعر --}}
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror"
                       id="price" name="price" step="0.01"
                       value="{{ old('price', $artwork->price) }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ وصف اللوحة --}}
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror"
                          id="description" name="description" rows="3">{{ old('description', $artwork->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ حالة البيع --}}
              <div class="mb-3">
                <label for="is_sold" class="form-label">Is Sold?</label>
                <select class="form-control @error('is_sold') is-invalid @enderror"
                        id="is_sold" name="is_sold">
                    <option value="0" {{ old('is_sold', $artwork->is_sold) == '0' ? 'selected' : '' }}>Available</option>
                    <option value="1" {{ old('is_sold', $artwork->is_sold) == '1' ? 'selected' : '' }}>Sold</option>
                </select>
                @error('is_sold')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- ✅ تحميل صورة جديدة --}}
              <div class="mb-3">
                <label for="image" class="form-label">Artwork Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror"
                       id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                {{-- ✅ عرض الصورة الحالية --}}
                @if($artwork->image_path)
                    <div class="mt-2">
                        <img src="{{ asset($artwork->image_path) }}" alt="Artwork Image"
                             style="max-width: 150px; border-radius: 5px;">
                    </div>
                @endif
              </div>

              <button type="submit" class="btn btn-primary">Update Artwork</button>
            </form>
          </div>
        </div>
    </div>
  </div>
@endsection
