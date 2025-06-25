@extends('layoutsdash.dashbordlayouts')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Users Page</h5>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <!-- 🔍 حقل البحث -->
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="🔍 ابحث عن المستخدم..." onkeyup="searchTable()">
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0" id="usersTable">
                        <thead>
                            <tr class="border-2 border-bottom border-primary border-0">
                                <th scope="col" class="ps-0">Name User</th>
                                <th scope="col">status</th>
                                <th scope="col" class="text-center">Edit</th>
                                <th scope="col" class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($users as $item)
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">{{ $item['name'] }}</span>
                                    </th>
                                    <td>
                                        <a href="javascript:void(0)" class="link-primary text-dark fw-medium d-block">{{ $item['status'] }}</a>
                                    </td>
                                    <td class="text-center fw-medium">
                                        <a href="{{ route('Users.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td class="text-center fw-medium">
                                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">Delete</button>
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

    <!-- 🔍 سكريبت البحث -->
    <script>
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let table = document.getElementById("usersTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let nameCell = rows[i].getElementsByTagName("th")[0];
                let statusCell = rows[i].getElementsByTagName("td")[0];
                let text = (nameCell?.textContent + " " + statusCell?.textContent).toLowerCase();

                if (text.includes(input)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
