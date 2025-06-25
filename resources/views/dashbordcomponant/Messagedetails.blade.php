@extends('layoutsdash.dashbordlayouts')
@section('content')
    <div class="col-lg-12 mt-5">
      <div class="card hover-img">
        <div class="position-relative">
          <span class="badge text-bg-light text-dark fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
            min Read</span>
          <img src="../assets/images/profile/user-3.jpg" alt="matdash-img" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9 " width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Georgeanna Ramero">
        </div>
        <div class="card-body p-4">
          <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Name :  <span> {{ $message->name }}</span></span>
          <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm mt-3">
            Phone:
            <a href="https://wa.me/{{ $message->phone }}" target="_blank" class="text-decoration-none text-dark">{{ $message->phone }}</a>
        </span>

        <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm mt-3">
            Email:
            <a href="mailto:{{ $message->email }}" class="text-decoration-none text-dark">{{ $message->email }}</a>
        </span>

          <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="">
            {{ $message->content}}
          </a>
          <div class="d-flex align-items-center gap-4">
            <div class="d-flex align-items-center fs-2 ms-auto">
              <i class="ti ti-point text-dark"></i>{{ $message->created_at }}
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
