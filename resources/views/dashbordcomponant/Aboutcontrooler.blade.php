@extends('layoutsdash.dashbordlayouts')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Modify on About</h5>
                <div class="card">
                    <div class="card-body">

                        <!-- عرض رسائل النجاح -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @foreach ($abouts as $item)
                            <form action="{{ route('aboutupdate', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label">Birthday:</label>
                                    <input type="date" name="birthday" value="{{ old('birthday', $item->birthday) }}"
                                        class="form-control @error('birthday') is-invalid @enderror">
                                    @error('birthday')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Age:</label>
                                    <input type="number" name="age" value="{{ old('age', $item->age) }}"
                                        class="form-control @error('age') is-invalid @enderror">
                                    @error('age')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone:</label>
                                    <input type="text" name="phone" value="{{ old('phone', $item->phone) }}"
                                        class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">City:</label>
                                    <input type="text" name="city" value="{{ old('city', $item->city) }}"
                                        class="form-control @error('city') is-invalid @enderror">
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Degree:</label>
                                    <input type="text" name="degree" value="{{ old('degree', $item->degree) }}"
                                        class="form-control @error('degree') is-invalid @enderror">
                                    @error('degree')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="email" name="email" value="{{ old('email', $item->email) }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- عرض الصورة الحالية -->
                                <div class="mb-3">
                                    <label class="form-label">Current Image:</label> <br>
                                    <img src="{{ asset('uploads/' . $item->img) }}" width="100" alt="Current Image">
                                </div>

                                <!-- رفع صورة جديدة -->
                                <div class="mb-3">
                                    <label class="form-label">Upload New Image:</label>
                                    <input type="file" name="img"
                                        class="form-control @error('img') is-invalid @enderror">
                                    @error('img')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary"
                                    @if (auth()->check()&& auth()->user()->status !=='admin') disabled @endif>
                                    Update
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
