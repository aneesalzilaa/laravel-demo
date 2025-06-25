@extends('layoutsdash.dashbordlayouts')

@section('content')

<div class="d-flex align-items-center justify-content-center w-100">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
                <div class="card-body">
                    <p class="text-center">Update User</p>
                    <!-- form starts here -->
                    <form action="{{ route('Users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- This indicates that this is a PUT request -->

                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputtext1" name="name" value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label">User Role</label>
                            <select name="status" class="form-control" id="status" required>
                                <option value="admin" {{ $user->status == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->status == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4">Update</button>
                    </form>
                    <!-- form ends here -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
