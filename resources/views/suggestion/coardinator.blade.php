@extends('layouts.main')
@section('m1','Master')
@section('m2',$title)
@section('title',$title)
@section('content')
    <style>
        .task-card {
          border: 1px solid #ddd;
          border-radius: 10px;
          margin-bottom: 20px;
          padding: 15px;
        }
        .task-details {
          display: flex;
          justify-content: space-between;
        }
        .task-title {
          font-size: 1.2rem;
          font-weight: bold;
        }
        .task-meta {
          display: flex;
          flex-wrap: wrap;
          gap: 10px;
        }
        .task-meta span {
          display: inline-block;
          padding: 5px 10px;
          border-radius: 5px;
        }
        .badge-soft-medium {
          background-color: #f0ad4e;
        }
        .badge-soft-high {
          background-color: #d9534f;
        }
        .badge{
            color: black;
        }
    </style>
    <div id="addModal" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" role="document">
        <form action="{{ route('suggestion.store')}}" id="filter-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Filter {{$title}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          @include('suggestion.filter')
        </div>
         </form>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card mb-5">
            
                <div class="card-body"> -->
                    @role(['Zone User','Plant Coordinator','Admin'])
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addModal">Filter</button>
                            <a href="{{ route('suggestion.create') }}" class="btn btn-primary waves-effect waves-light">Add</a>
                            <button id="exportBtn" class="btn btn-primary waves-effect waves-light">Export</button>
                        </div>
                    </div>
                    @endrole
                    <br>
                       
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab" aria-selected="true">
                    <span class="d-block d-sm-none"><i class="far fa-check-circle"></i></span>
                    <span class="d-none d-sm-block">Done</span> 
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false" tabindex="-1">
                    <span class="d-block d-sm-none"><i class="fas fa-user-check"></i></span>
                    <span class="d-none d-sm-block">Created</span> 
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab" aria-selected="false" tabindex="-1">
                    <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                    <span class="d-none d-sm-block">Assigned</span>   
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-3 text-muted">
            
            <div class="tab-pane active show" id="home1" role="tabpanel" >
                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control search-items" id="done_datas" placeholder="Search by Title">
                    </div>
                </div>
                <div class="row" id="done_data">
                   
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" id="pagination">
                        <!-- Pagination items will be rendered here -->
                    </ul>
                </nav>
            </div>

            <div class="tab-pane" id="profile1" role="tabpanel">
                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control search-items" data="" id="created_datas" placeholder="Search by Title">
                    </div>
                </div>
                <div class="row" id="created_data">
                   
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" id="pagination1">
                        <!-- Pagination items will be rendered here -->
                    </ul>
                </nav>
            </div>
            <div class="tab-pane" id="messages1" role="tabpanel">
                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <input type="text" class="form-control search-items" id="assigned_datas" placeholder="Search by Title">
                    </div>
                </div>
                <div class="row" id="assigned_data">
                   
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" id="pagination2">
                        <!-- Pagination items will be rendered here -->
                    </ul>
                </nav>
            </div>
            
        </div>

    </div>
    <!-- <div class="row">
        

        <div class="row">
            <div class="col-lg-12">
                <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
                    <li class="page-item disabled">
                        <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item">
                        <a href="javascript: void(0);" class="page-link">1</a>
                    </li>
                    <li class="page-item active">
                        <a href="javascript: void(0);" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript: void(0);" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript: void(0);" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript: void(0);" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- Button trigger modal -->


@endsection
@section('css')
   @include('layouts.css') 
   <script src="{{ asset('assets/js/xlsx.full.min.js') }}"></script>

@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function formatDate(isoDate) {
        const date = new Date(isoDate);
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');

        return `${year}-${month}-${day}`;
    }

    $(document).ready(function(){
        var done_data = [];
        var assigned_data = [];
        var created_data = [];
        axios.get('{{ url("get-suggestion-data") }}')
        .then(response => {
            done_data = response.data.done_data;
            assigned_data = response.data.assigned_data;
            created_data = response.data.created_data;
            renderProducts(currentPage1,done_data,'done_data');
            renderProducts(currentPage3,assigned_data,'assigned_data');
            renderProducts(currentPage2,created_data,'created_data');
            renderPagination(done_data.length,'pagination');
            renderPagination(created_data.length,'pagination1');
            renderPagination(assigned_data.length,'pagination2');
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });

        function mapData(array) {
            return array.map(function(item) {
                return {
                    // 'Custom ID': item.id,
                    'Type': item.get_type.name,
                    'Title': item.get_suggestion_data.title,
                    'Department': item.get_department.name,
                    'Plant': item.get_plant.name,
                    'Created By': item.get_created_by.name,
                    'Status': item.status,
                    'Due Date': item.due_date,
                    'Target Date': item.target_date,
                    'Description': item.get_suggestion_data.desc,
                    'Priority': item.get_suggestion_data.priority,
                    'Score': item.feedback_score,
                    'Created Date': item.created_at
                };
            });
        }
        function exportToExcel() {
            // Convert JSON objects to worksheet
            var sheet1 = XLSX.utils.json_to_sheet(mapData(done_data));
            var sheet2 = XLSX.utils.json_to_sheet(mapData(created_data));
            var sheet3 = XLSX.utils.json_to_sheet(mapData(assigned_data));

            // Create a new workbook
            var wb = XLSX.utils.book_new();

            // Append sheets to the workbook
            XLSX.utils.book_append_sheet(wb, sheet1, 'Done');
            XLSX.utils.book_append_sheet(wb, sheet2, 'Created');
            XLSX.utils.book_append_sheet(wb, sheet3, 'Assigned');

            // Write the workbook to a file
            XLSX.writeFile(wb, 'data.xlsx');
        }

        $('#exportBtn').click(function () {
            exportToExcel();
        });
        $('#filter-form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ url("/filters") }}',
                method: 'GET',
                data: $(this).serialize(),
                success: function(response) {
                    // done_data = response;
                    $("#addModal").modal('hide');
                    done_data = response.done_data;
                    assigned_data = response.assigned_data;
                    created_data = response.created_data;
                    renderProducts(currentPage1,done_data,'done_data');
                    renderProducts(currentPage3,assigned_data,'assigned_data');
                    renderProducts(currentPage2,created_data,'created_data');
                    renderPagination(done_data.length,'pagination');
                    renderPagination(created_data.length,'pagination1');
                    renderPagination(assigned_data.length,'pagination2');
                }
            });
        });
        // fetch('{{ url("get-suggestion-data") }}')
        // .then(response => response.json())
        // .then(data => {
        //     done_data = data;
        // })
        // .catch(error => console.error('Error fetching data:', error));
        
        
        var currentPage1 = 1;
        var itemsPerPage1 = 9;
        var totalPages1 = Math.ceil(done_data.length / itemsPerPage1);
        var currentPage2 = 1;
        var itemsPerPage2 = 9;
        var totalPages2 = Math.ceil(created_data.length / itemsPerPage2);
        var currentPage3 = 1;
        var itemsPerPage3 = 9;
        var totalPages3 = Math.ceil(assigned_data.length / itemsPerPage3);
        
        function renderProducts(page,done_data,ids) {
            // console.log(done_data);
            $('#'+ids).empty();
            if (ids == 'done_data') {
                var start = (currentPage1 - 1) * itemsPerPage1;
                var end = start + itemsPerPage1;
            }
            if (ids == 'created_data') {
                var start = (currentPage2 - 1) * itemsPerPage2;
                var end = start + itemsPerPage2;
            }
            if (ids == 'assigned_data') {
                var start = (currentPage3 - 1) * itemsPerPage3;
                var end = start + itemsPerPage3;
            }
            var paginatedProducts = done_data.slice(start, end);
            // var paginatedProducts = products.slice(start, end);

            paginatedProducts.forEach(function(product) {
                // var productCard = `
                //     <div class="col-md-4">
                //         <div class="product-card">
                //             <img src="${product.img}" class="img-fluid product-image" alt="${product.name}">
                //             <div class="product-info">
                //                 <h5>${product.name}</h5>
                //                 <p>$${product.price}</p>
                //                 <p>${'★'.repeat(product.rating)}</p>
                //             </div>
                //             <span class="badge badge-pill badge-soft-success">${product.badge}</span>
                //         </div>
                //     </div>
                // `;
                var imageData = '';
                var productCard = `
                    <div class="task-card card">
                      <div class="task-details">
                        <div>
                          <div class="task-title">${product.get_suggestion_data.title}</div>
                          <div class="task-meta">
                            <span class="badge badge-pill badge-soft-primary"><i class="fas fa-tools"></i>&nbsp;${product.get_department.name}</span>
                            <span class="badge badge-pill badge-soft-info"><i class="fas fa-map-marker-alt"></i>&nbsp;${product.get_plant.name}</span>
                            <span class="badge badge-pill badge-soft-success"><i class="fas fa-calendar-alt"></i>&nbsp;${formatDate(product.created_at)}</span>
                            <span class="badge badge-pill badge-soft-warning"><i class="fas fa-calendar-alt"></i>&nbsp;${product.due_date}</span>
                            <span class="badge badge-pill badge-soft-medium"><i class="fas fa-exclamation-circle"></i>&nbsp;${product.get_suggestion_data.priority}</span>
                            <span class="badge badge-pill badge-soft-light"><i class="fas fa-thumbtack"></i>&nbsp;${product.status}</span>
                          </div>
                        </div>
                        <div>
                          <a class="btn btn-primary" href="suggestion/${product.id}"  class="" style="float: right;" >View Detail</a>
                        </div>
                      </div>
                      <div class="mt-2">${product.get_created_by.name}</div>
                    </div>
                `;
                $('#'+ids).append(productCard);
            });
        }
        // function renderPagination(totalItems,ids) {
        //     var ct_page = currentPage1;
        //     var total_Pages = totalPages1;
        //     if (ids == 'pagination') {
        //         var total_Pages = totalPages1;
        //     }
        //     if (ids == 'pagination1') {
        //         var total_Pages = totalPages2;
        //         var ct_page = currentPage2;
        //     }
        //     if (ids == 'pagination2') {
        //         var total_Pages = totalPages3;
        //         var ct_page = currentPage3;
        //     }
        //     $('#'+ids).empty();
        //     $('#'+ids).append(`<li class="page-item ${ct_page === 1 ? 'disabled' : ''}"><a class="page-link" href="#" data-page="prev">Previous</a></li>`);
        //     for (var i = 1; i <= total_Pages; i++) {
        //         var pageItem = `<li class="page-item ${i === ct_page ? 'active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        //         $('#'+ids).append(pageItem);
        //     }
        //     $('#'+ids).append(`<li class="page-item ${ct_page === total_Pages ? 'disabled' : ''}"><a class="page-link" href="#" data-page="next">Next</a></li>`);
        // }
        function renderPagination(totalItems,ids) {
            $('#'+ids).empty();
            var ct_page = currentPage1;
            if (ids == 'pagination') {
                var totalPages = Math.ceil(totalItems / itemsPerPage1);
            }
            if (ids == 'pagination1') {
                var totalPages = Math.ceil(totalItems / itemsPerPage2);
                var ct_page = currentPage2;
            }
            if (ids == 'pagination2') {
                var totalPages = Math.ceil(totalItems / itemsPerPage3);
                var ct_page = currentPage3;
            }
            
            for (var i = 1; i <= totalPages; i++) {
                var pageItem = `
                    <li class="page-item ${i === ct_page ? 'active' : ''}">
                        <a class="page-link" href="#">${i}</a>
                    </li>
                `;
                $('#'+ids).append(pageItem);
            }
        }

        // Initial render
        

        // Handle pagination click
        $('#pagination').on('click', 'a', function(e) {
            e.preventDefault();
            currentPage1 = parseInt($(this).text());
            renderProducts(currentPage1,done_data,'done_data');
            renderPagination(done_data.length,'pagination');
        });
        $('#pagination1').on('click', 'a', function(e) {
            e.preventDefault();
            currentPage2 = parseInt($(this).text());
            renderProducts(currentPage2,created_data,'created_data');
            renderPagination(created_data.length,'pagination1');
        });
        $('#pagination2').on('click', 'a', function(e) {
            e.preventDefault();
            currentPage3 = parseInt($(this).text());
            renderProducts(currentPage3,assigned_data,'assigned_data');
            renderPagination(assigned_data.length,'pagination2');
        });
        // $('.pagination').on('click', 'a', function(e) {
        //     e.preventDefault();
        //     if ($(this).attr('id') == 'pagination') {
        //         currentPage1 = parseInt($(this).text());
        //         renderProducts(currentPage1,done_data,'done_data');
        //         renderPagination(done_data.length,'pagination');
        //     }
        //     if ($(this).attr('id') == 'pagination1') {
                
        //     }
        //     if ($(this).attr('id') == 'pagination2') {
        //         currentPage3 = parseInt($(this).text());
        //         renderProducts(currentPage3,assigned_data,'assigned_data');
        //         renderPagination(done_data.length,'pagination2');
        //     }
        // });

        

        // Search functionality
        $('.search-items').keyup(function(){
            var searchText = $(this).val().toLowerCase();
            if ($(this).attr('id') == 'done_datas') {
                var filteredProducts = done_data.filter(function(product) {
                    return (product.get_suggestion_data.title).toLowerCase().includes(searchText);
                });
                renderPagination(filteredProducts.length,'pagination');
                renderFilteredProducts(filteredProducts,'done_data');
            }
            if ($(this).attr('id') == 'created_datas') {
                var filteredProducts = created_data.filter(function(product) {
                    return (product.get_suggestion_data.title).toLowerCase().includes(searchText);
                });
                renderPagination(filteredProducts.length,'pagination1');
                renderFilteredProducts(filteredProducts,'created_data');
            }
            if ($(this).attr('id') == 'assigned_datas') {
                var filteredProducts = assigned_data.filter(function(product) {
                    return (product.get_suggestion_data.title).toLowerCase().includes(searchText);
                });
                renderPagination(filteredProducts.length,'pagination2');
                renderFilteredProducts(filteredProducts,'assigned_data');
            }
        });

        function renderFilteredProducts(filteredProducts,ids) {
            $('#'+ids).empty();
            if (ids == 'done_data') {
                var start = (currentPage1 - 1) * itemsPerPage1;
                var end = start + itemsPerPage1;
            }
            if (ids == 'created_data') {
                var start = (currentPage1 - 1) * itemsPerPage1;
                var end = start + itemsPerPage1;
            }
            if (ids == 'assigned_datas') {
                var start = (currentPage2 - 1) * itemsPerPage2;
                var end = start + itemsPerPage2;
            }
            
            var paginatedProducts = filteredProducts.slice(start, end);
            // console.log(filteredProducts);
            paginatedProducts.forEach(function(product) {
                var imageData = '';
                
                var productCard = `
                    <div class="task-card card">
                      <div class="task-details">
                        <div>
                          <div class="task-title">${product.get_suggestion_data.title}</div>
                          <div class="task-meta">
                            <span class="badge badge-pill badge-soft-primary"><i class="fas fa-tools"></i>&nbsp;${product.get_department.name}</span>
                            <span class="badge badge-pill badge-soft-info"><i class="fas fa-map-marker-alt"></i>&nbsp;${product.get_plant.name}</span>
                            <span class="badge badge-pill badge-soft-success"><i class="fas fa-calendar-alt"></i>&nbsp;${formatDate(product.created_at)}</span>
                            <span class="badge badge-pill badge-soft-warning"><i class="fas fa-calendar-alt"></i>&nbsp;${product.due_date}</span>
                            <span class="badge badge-pill badge-soft-medium"><i class="fas fa-exclamation-circle"></i>&nbsp;${product.get_suggestion_data.priority}</span>
                            <span class="badge badge-pill badge-soft-light"><i class="fas fa-thumbtack"></i>&nbsp;${product.status}</span>
                          </div>
                        </div>
                        <div>
                          <a class="btn btn-primary" href="suggestion/${product.id}"  class="" style="float: right;" >View Detail</a>
                        </div>
                      </div>
                      <div class="mt-2">${product.get_created_by.name}</div>
                    </div>
                `;
               
                $('#'+ids).append(productCard);
            });
        }
    });
</script>


@endsection
