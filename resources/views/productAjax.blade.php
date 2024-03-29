
<!DOCTYPE html>
<html>
<head>
<title>IRD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    
        <!-- Scripts -->
       
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
 
   

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">  
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 

   
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
               <img src='ird.png' alt="logo_IRD" id="logoird" /></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        @if (Route::has('register'))
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li> --}}
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
        
    @toastr_css

<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center"><img src="admin.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">  {{ Auth::user()->name }}</h4>
        <p class="font-weight-light text-muted mb-0">Admin</p>
      </div>
    </div>
  </div>



  <ul class="nav flex-column bg-white mb-0">
    <li class="nav-item">
      <a href="{{ route('home') }}" class="nav-link text-dark font-italic bg-light">
                <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                {{__('Users management' )}}
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('home') }}"class="nav-link text-dark font-italic">
                <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                {{__(   'News')}}
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('message.user') }}"  class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Send a Message')}}
            </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('message.index') }}" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Messages received')}}
            </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('message.show') }}" class="nav-link text-dark font-italic">
                <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                {{__(  'Messages sent')}}
            </a>
    </li>
  
  </ul>

  </div>
<!-- End vertical navbar -->


<!-- Page content holder -->

<div class="row backgrounding" id="box">

<div class="container"id="contenu">
    <h3 id="titre">{{__('Welcome to administrator panel')}}</h3>
    {{-- <a class="btn btn-warning" href="#" id="modeadmin"> {{__('Change To Maintenance Mode')}}</a> --}}
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> {{__('Create New User')}}</a>
   
    <br>
     
     

    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th >{{__('Name')}}</th>
                <th>{{__('Mail')}}</th>
                <th>{{__('Role')}}</th>
                <th >{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<!-- Create -->




   <!-- Table + Show/ edit -->
   <div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nom</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Nom" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="" maxlength="50" required="">
                        </div>
                    </div>

                 
                    

                    <div class="form-group">
                        <label for="company-content"class="col-sm-12 control-label">Role</label>
                        <div class="col-sm-12">
                        <select name="role" id="role" class="form-control">
                        <option>{{__('admin')}}</option>
                        <option>{{__('user')}}</option>
                        <option>{{__('visiteur')}}</option>
                        </select>
                        </div>
                        </div>


                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">{{__('Save changes')}}
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>   



</div>
</body>
    

   <style>
body{
    overflow: hidden !important;
}

#contenu{
    margin-left:16rem;
}

#sidebar.active {
  margin-left: -20rem;
}

#content.active {
  width: 100%;
  margin: 0;
}

.vertical-nav {
  
  width: 15rem;
  height:100%;
  position: absolute;

  
  
  box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
  transition: all 0.4s;
}

       .backgrounding{
        background-image: url('spacex--p-KCm6xB9I-unsplash.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        width:100% !important;
     
    }
    #titre{
        color:white;
    }
    thead{
        background: rgba(20, 40, 40, 0.8);
        color: white;
    }
   </style>



</html>


@toastr_js
@toastr_render
<script type="text/javascript">
$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});

    $(function () {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('ajaxproducts.index') }}",
          columns: [
             // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'role', name: 'role'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
       
      $('#createNewProduct').click(function () {
          $('#saveBtn').val("create-product");
          $('#product_id').val('');
          $('#productForm').trigger("reset");
          $('#modelHeading').html("Create New Product");
          $('#ajaxModel').modal('show');
      });
      
      $('body').on('click', '.editProduct', function () {
        var product_id = $(this).data('id');
        $.get("{{ route('ajaxproducts.index') }}" +'/' + product_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Product");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#role').val(data.role);
           
            
        })
     });
      
      $('#saveBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Sending..');
      
          $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ route('ajaxproducts.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                
                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();
           
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
      });
      
      $('body').on('click', '.deleteProduct', function () {
       
          var product_id = $(this).data("id");
        if ( confirm("Are You sure want to delete !")){
        
          $.ajax({
              type: "DELETE",
              url: "{{ route('ajaxproducts.store') }}"+'/'+product_id,
              success: function (data) {
                  table.draw();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        }
      });
       
    });
  </script>


