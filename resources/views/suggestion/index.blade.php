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
  <div class="modal-dialog modal-fullscreen" role="document">
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
                    
                    <div class="d-sm-flex flex-wrap">
                        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
                        <div class="ms-auto">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addModal">Filter</button>
                            @role('Zone User')
                            <a href="{{ route('suggestion.create') }}" class="btn btn-primary waves-effect waves-light">Add</a>
                            @endrole
                        </div>
                    </div>
                    
                    <br>
                       <!--  <div class="gallery">
                        <main id="image-gallery" class="images"></main>
                        <footer id="gallery-pagination">
                          <button id="btnPrevious">&larr; <span class="sr-only">Previous</span></button>
                          <div>
                            <div id="gallery-dots"></div>
                            <span id="page"></span>
                          </div>
                          <button id="btnNext"><span class="sr-only">Next </span>&rarr;</button>
                        </footer>
                      </div> -->
                      {{-- 
                    <div class="row" id="jobgrid-list">
                        @foreach($data as $val)
                            <?php 
                                $getSuggestionData = $val->getSuggestionData;
                            ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="favorite-icon">
                                            <a href="javascript:void(0)"><i class="uil uil-heart-alt fs-18"></i></a>
                                        </div>
                                        <img src="assets/images/companies/adobe.svg" alt="" height="50" class="mb-3">
                                        <h5 class="fs-17 mb-2"><a href="javascript:void(0);" class="text-dark">{{$getSuggestionData->title}}</a> 
                                            <!-- <small class="text-muted fw-normal">(0-2 Yrs Exp.)</small> -->
                                        </h5>
                                        <div class="mt-4 hstack gap-2">
                                            <a href="#!" data-bs-toggle="modal" class="btn btn-soft-success w-100">{{$val->getDepartment->name}}</a>
                                            <a href="#applyJobs" data-bs-toggle="modal" class="btn btn-soft-primary w-100">{{date('d-m-Y',strtotime($val->due_date))}}</a>
                                        </div>
                                        <div class="mt-4 hstack gap-2">
                                            <a href="#!" data-bs-toggle="modal" class="btn btn-soft-warning w-100">{{$getSuggestionData->priority}}</a>
                                            <a href="#applyJobs" data-bs-toggle="modal" class="btn btn-soft-info w-100">{{$val->status}}</a>
                                        </div>
                                        <br>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <h5 class="text-dark">{{$val->getCreatedBy->name }}</h5>
                                            </li>
                                        </ul>
                                        
                                        <div class="mt-4 hstack gap-2">
                                            <!-- <a href="#!" data-bs-toggle="modal" class="btn btn-soft-success w-100">View Profile</a> -->
                                            <a href="#applyJobs" data-bs-toggle="modal" class="btn btn-info float-right" style="float: right;" >View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        @endforeach
                    </div><!--end row-->
                    --}}
                <!-- </div>
            </div> -->
        </div>
    </div>
    <div class="row">
        <div class="row mb-3">
                    <div class="col-md-4"></div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="search-items" placeholder="Search by Title">
            </div>
        </div>
        <div class="row" id="done_data">
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" id="pagination">
                <!-- Pagination items will be rendered here -->
            </ul>
        </nav>

        <!-- <div class="row">
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
        </div> -->
    </div>
    <!-- Button trigger modal -->


@endsection
@section('css')
   @include('layouts.css') 
@endsection
@section('js')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
   
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
        axios.get('{{ url("get-suggestion-data") }}')
        .then(response => {
            done_data = response.data;
            renderProducts(currentPage);
            renderPagination(done_data.length);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });

        $('#filter-form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ url("/filters") }}',
                method: 'GET',
                data: $(this).serialize(),
                success: function(response) {
                    done_data = response;
                    $("#addModal").modal('hide');
                    renderProducts(currentPage);
                    renderPagination(done_data.length);
                }
            });
        });
        // fetch('{{ url("get-suggestion-data") }}')
        // .then(response => response.json())
        // .then(data => {
        //     done_data = data;
        // })
        // .catch(error => console.error('Error fetching data:', error));
        
        
        var currentPage = 1;
        var itemsPerPage = 9;
        
        function renderProducts(page) {
            console.log(done_data);
            $('#done_data').empty();
            var start = (page - 1) * itemsPerPage;
            var end = start + itemsPerPage;
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
                // ((product.get_suggestion_data.img)).forEach(function(img) {
                //     imageData += `
                //         <div class="avatar-group-item">
                //             <a href="javascript: void(0);" class="d-inline-block">
                //                 <img src="(${img})" alt="" class="rounded-circle avatar-xs">
                //             </a>
                //         </div>
                //     `;
                // });
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
                $('#done_data').append(productCard);
            });
        }

        function renderPagination(totalItems) {
            $('#pagination').empty();
            var totalPages = Math.ceil(totalItems / itemsPerPage);
            for (var i = 1; i <= totalPages; i++) {
                var pageItem = `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a class="page-link" href="#">${i}</a>
                    </li>
                `;
                $('#pagination').append(pageItem);
            }
        }

        // Initial render
        

        // Handle pagination click
        $('#pagination').on('click', 'a', function(e) {
            e.preventDefault();
            currentPage = parseInt($(this).text());
            renderProducts(currentPage);
            renderPagination(done_data.length);
        });

        // Sort functionality
        $('#sort-price').change(function(){
            var sortBy = $(this).val();
            done_data.sort(function(a, b) {
                return sortBy === 'asc' ? a.price - b.price : b.price - a.price;
            });
            renderProducts(currentPage);
        });

        // Search functionality
        $('#search-items').keyup(function(){
            var searchText = $(this).val().toLowerCase();
            var filteredProducts = done_data.filter(function(product) {
                return (product.get_suggestion_data.title).toLowerCase().includes(searchText);
                // return product.name.toLowerCase().includes(searchText);
            });
            renderPagination(filteredProducts.length);
            renderFilteredProducts(filteredProducts);
        });

        function renderFilteredProducts(filteredProducts) {
            $('#done_data').empty();
            var start = (currentPage - 1) * itemsPerPage;
            var end = start + itemsPerPage;
            var paginatedProducts = filteredProducts.slice(start, end);
            console.log(filteredProducts);
            paginatedProducts.forEach(function(product) {
                var imageData = '';
                // console.log(product.get_suggestion_data.img);
                // ((product.get_suggestion_data.img)).forEach(function(img) {
                //     imageData += `
                //         <div class="avatar-group-item">
                //             <a href="javascript: void(0);" class="d-inline-block">
                //                 <img src="(${img})" alt="" class="rounded-circle avatar-xs">
                //             </a>
                //         </div>
                //     `;
                // });
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
                // <div class="col-md-4">
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
                // <div class="col-xl-4 col-sm-6">
                //             <div class="card">
                //                 <div class="card-body">
                //                         <div class="d-flex">
                //                             <div class="flex-grow-1 overflow-hidden">
                //                                 <h5 class="text-truncate font-size-15"><a href="javascript: void(0);" class="text-dark">${product.get_suggestion_data.title}</a></h5>
                //                                 <p class="text-muted mb-4">${product.get_created_by.name}</p>
                //                                 <a href="suggestion/${product.id}"  class="btn btn-info float-right" style="float: right;" >View Detail</a>
                //                             </div>
                //                         </div>
                //                     <!-- </a> -->
                //                 </div>
                //                 <div class="px-4 py-3 border-top">
                //                     <ul class="list-inline mb-0">
                //                         <!-- <li class="list-inline-item me-3">
                                            
                //                         </li> -->
                //                         <li class="list-inline-item me-3">
                //                             <span class="badge bg-success">${product.get_suggestion_data.priority}</span>
                //                         </li>
                //                         <li class="list-inline-item me-3">
                //                             <i class="bx bx-calendar me-1"></i>${product.due_date} 
                //                         </li>
                //                         <li class="list-inline-item me-3">
                //                             <i class="bx bx-comment-dots me-1"></i> ${product.get_department.name}
                //                         </li>
                //                         <li class="list-inline-item me-3">
                //                             <span class="badge bg-success">${product.status}</span>
                //                         </li>
                //                     </ul>
                //                 </div>
                //             </div>
                //         </div>
                $('#done_data').append(productCard);
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        
    });
</script>
@endsection
