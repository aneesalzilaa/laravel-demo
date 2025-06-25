@extends('layoutsdash.dashbordlayouts')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Artworks List</h5>

                {{-- ✅ إظهار رسالة نجاح عند الحذف أو التعديل --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ✅ شريط البحث --}}
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search artworks...">

                {{-- ✅ رسالة عدم العثور --}}
                <div id="noResults" class="alert alert-warning text-center d-none">
                    No artworks found.
                </div>

                {{-- ✅ جدول عرض اللوحات --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Sold Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="artworkTable">
                            @foreach ($artworks as $artwork)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $artwork->title }}</td>
                                    <td>{{ $artwork->artist }}</td>
                                    <td>{{ $artwork->category->title ?? 'Uncategorized' }}</td>
                                    <td>${{ $artwork->price ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $artwork->is_sold ? 'success' : 'warning' }}">
                                            {{ $artwork->is_sold ? 'Sold' : 'Available' }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- زر تعديل --}}
                                        <a href="{{ route('artwork.edit',$artwork->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>

                                        {{-- زر حذف --}}
                                        <form action="{{ route('artwork.destroy',$artwork->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- ✅ JavaScript للبحث عن اللوحات --}}
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#artworkTable tr");
            let noResults = document.getElementById("noResults");
            let found = false;

            rows.forEach(function(row) {
                let text = row.textContent.toLowerCase();
                if (text.includes(filter)) {
                    row.style.display = "";
                    found = true;
                } else {
                    row.style.display = "none";
                }
            });

            // ✅ إظهار أو إخفاء إشعار "لا يوجد نتائج"
            noResults.classList.toggle("d-none", found);
        });
    </script>
@endsection
