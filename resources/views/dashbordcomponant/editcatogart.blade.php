@extends('layoutsdash.dashbordlayouts')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">>Edit classification </h5>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('catogory.update', $categoty->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- نستخدم PUT لأننا نقوم بالتحديث -->

                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" value="{{ old('title', $categoty->title) }}">

                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
