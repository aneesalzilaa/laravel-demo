@extends('layoutsdash.dashbordlayouts')

@section('content')
    <div class="container-fluid p-0 mt-2">
        <div class="col-lg-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h5 class="card-title">category Controller</h5>

                    <!-- زر إضافة قسم جديد بمحاذاة العنوان وأقصى اليمين -->
                    <!-- Button trigger modal -->
                    <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        +
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">add category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('catogory.store') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputtext1" class="form-label">title:</label>
                                            <input type="text" class="form-control" id="exampleInputtext1"
                                                name="title">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">add</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">Category Title</th>
                                <th scope="col" class="text-center">Edit</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        @foreach ($categoty as $item)
                            <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">{{ $item->title }}</span>
                                    </th>

                                    <!-- زر التعديل -->
                                    <td class="text-center fw-medium">
                                        <a href="{{ route('catogory.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                    </td>

                                    <!-- زر الحذف -->
                                    <td class="text-center fw-medium">
                                        <form action="{{ route('catogory.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('هل أنت متأكد؟')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
