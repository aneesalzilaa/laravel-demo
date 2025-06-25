@extends('layoutsdash.dashbordlayouts')
@section('content')
    <div class="container-fluid p-0 mt-2"> <!-- p-0 لإزالة المسافات و mt-2 لترك مسافة صغيرة -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Next messages</h5>

                    <!-- 🔍 حقل البحث -->
                    <div class="mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="🔍 ابحث عن الرسائل..." onkeyup="searchTable()">
                    </div>

                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0" id="messagesTable">
                            <thead>
                                <tr class="border-2 border-bottom border-primary border-0">
                                    <th scope="col" class="ps-0">User name</th>
                                    <th scope="col">the details</th>
                                    <th scope="col" class="text-center">the condition</th>
                                    <th scope="col" class="text-center">the condition</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($messages as $item)
                                <tr style="border-bottom:3px solid {{ $item->is_answered == 1 ? '#059652' : 'red' }}">
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">{{ $item->name }}</span>
                                    </th>
                                    <td>
                                        <a href="{{ route('massagedetails',$item->id) }}" class="link-primary text-dark fw-medium d-block">massage details</a>
                                    </td>
                                    <td><a href="{{ route('updateStatus',[$item->id,'status' => 1]) }}" class="btn btn-success">Answered</a></td>
                                    <td><a href="{{  route('updateStatus',['id' => $item->id, 'status' => 0]) }}" class="btn btn-danger">Not answered</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 🔍 سكريبت البحث -->
    <script>
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let table = document.getElementById("messagesTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("th")[0];
                let text = cells ? cells.textContent.toLowerCase() : "";

                if (text.includes(input)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>
@endsection

