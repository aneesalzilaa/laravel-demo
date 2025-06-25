@extends('layoutsdash.dashbordlayouts')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Add New Artwork</h5>

                {{-- ✅ إظهار رسالة النجاح --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('artwork.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- ✅ عنوان العمل الفني --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ✅ اسم الفنان --}}
                            <div class="mb-3">
                                <label for="artist" class="form-label">Artist Name</label>
                                <input type="text" class="form-control @error('artist') is-invalid @enderror"
                                    id="artist" name="artist" value="{{ old('artist') }}">
                                @error('artist')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ✅ اختيار الفئة --}}
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id">
                                    <option value="">Select a category</option>
                                    @foreach ($catogoty as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
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
                                    id="contact_number" name="contact_number" value="{{ old('contact_number') }}">
                                @error('contact_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ✅ البريد الإلكتروني --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ✅ السعر --}}
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" step="0.01" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- ✅ حالة البيع --}}
                            <div class="mb-3">
                                <label for="is_sold" class="form-label">Is Sold?</label>
                                <select class="form-control @error('is_sold') is-invalid @enderror" id="is_sold"
                                    name="is_sold">
                                    <option value="0" {{ old('is_sold') == '0' ? 'selected' : '' }}>Available</option>
                                    <option value="1" {{ old('is_sold') == '1' ? 'selected' : '' }}>Sold</option>
                                </select>
                                @error('is_sold')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ✅ وصف العمل الفني --}}
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ✅ تحميل الصورة --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Artwork Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Add Artwork</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
