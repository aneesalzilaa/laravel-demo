@extends('layoutsdash.dashbordlayouts')
@section('content')
    <div class="col-12">
        <div class="container">
            <div class="row g-4 mt-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="icon-box blue">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <h6>Users</h6>
                            <h4>{{ \App\Models\User::count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="icon-box blue">
                            <i class="bi bi-palette-fill"></i>
                        </div>
                        <div>
                            <h6>All Art Panels</h6>
                            <h4>{{ $artworks->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="icon-box green">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div>
                            <h6>Assets</h6>
                            <h4>{{ $artworks->count() }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="icon-box purple">
                            <i class="bi bi-cart-fill"></i>
                        </div>
                        <div>
                            <h6>Sales</h6>
                            <h4>{{ $artworksold->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-0 mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View the artwork</h5>

                        <!-- ✅ شريط البحث -->
                        <input type="text" id="searchInput" class="form-control mb-3" placeholder="Search artworks...">

                        <!-- ✅ رسالة عدم العثور -->
                        <div id="noResults" class="alert alert-warning text-center d-none">
                            No artwork found.
                        </div>

                        <div class="table-responsive">
                            <table class="table text-nowrap align-middle mb-0">
                                <thead>
                                    <tr class="border-2 border-bottom border-primary border-0">
                                        <th scope="col" class="ps-0">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col" class="text-center">Is Sold</th>
                                    </tr>
                                </thead>
                                <tbody id="artworkTable" class="table-group-divider">
                                    @foreach ($artworksold as $item)
                                        <tr>
                                            <th scope="row" class="ps-0 fw-medium">
                                                <span class="table-link1 text-truncate d-block">{{ $item->title }}</span>
                                            </th>
                                            <td>
                                                <a href="javascript:void(0)"
                                                    class="link-primary text-dark fw-medium d-block">
                                                    ${{ number_format($item->price, 2) }}
                                                </a>
                                            </td>
                                            <td class="text-center fw-medium">
                                                @if ($item->is_sold == 0)
                                                    <p class="text-success fw-bold">Available</p>
                                                @else
                                                    <p class="text-danger fw-bold" style="text-decoration: line-through;">Sold Out</p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="text-end mt-3">
                            <h5 class="fw-bold">Total Sales: <span class="text-success">${{ number_format($salesTotal, 2) }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ✅ JavaScript للبحث وإظهار إشعار عند عدم العثور على نتائج --}}
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
