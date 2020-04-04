@extends('layouts.main_layout')

@section('stylesheets')
<style type="text/css">

          #roledetails_filter{
              text-align: left;
            margin-right: 35%;
        }

        @media only screen and (min-width: 1028px) {
            #roledetails_filter{
                  text-align: left;
                position: absolute;
                top: -30px;
                right: 0px;

                margin-right: 38%;
            }
        }
    </style>
@endsection

@section('title', 'Role & Permission Management')
@section('heading', 'Role & Permission')@section('headingExtra', 'Management')

@section('content')
    <!-- Main content -->
    <section class="content">

        @if ($message = Session::get('success'))
            <div class="alerts">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif

        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">

                <div class="box box-success">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            @can('export', App\Role::class)
                                <a type="button" class="btn btn-sm btn-success pull-right" href="{{ route('role.export') }} "><i class="fa fa-file-excel-o"></i> Export</a>
                            @endcan

                            @can('create', App\Role::class)
                            <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#addModal" style="margin-right: 15px;"><i class="fa fa-plus-square"></i> Add New Role</button>
                            @endcan

                            <table id="roledetails" class="table table-bordered table-striped" style="margin-top: 42px;">
                                <thead>
                                <tr class="bg-success custom-bold-color" style="font-weight: 600; text-shadow: 1px 1px 1px white;">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            @can('edit', App\Role::class)
                                            <span data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{ $role->id }}')"><i class="fa fa-pencil"></i></button>
                                            </span>
                                            @endcan
                                            @can('delete', App\Role::class)
                                            <span data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                <button class="btn btn-xs btn-danger" onclick="fun_delete('{{ $role->id }}')"><i class="fa fa-trash"></i></button>
                                            </span>
                                            @endcan
                                            @can('edit', App\Role::class)
                                            <span data-toggle="tooltip" data-placement="bottom" title="AssignPermission">
                                                <a class="btn btn-xs btn-info" href="{{ route('role.assign.permission', ['role' => $role]) }}"><i class="fa fa-book"></i></a>
                                            </span>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->

        <!-- Add Modal start -->
        <div class="modal fade" id="addModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Role</h4>
                    </div>

                    <!-- form start -->

                    <form class="form-horizontal" action="{{ route('role.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label>Name</label>
                                            <input type="text" class="form-control" maxlength="255" name="name" id="name" placeholder="Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="4" name="description" id="description" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- add code ends -->

        <!-- Edit Modal start -->
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Role</h4>
                    </div>
                    <form class="form-horizontal" action="/" method="post">
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="col-md-12">
                                   
                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label>Name</label>
                                            <input type="text" class="form-control" maxlength="255" name="names" id="names" placeholder="Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-8">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="4" name="descriptions" id="descriptions" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="button" class="btn btn-primary btn-sm edit-modal"><i class="fa fa-check"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- edit code end -->

    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script type="text/javascript">


        var module_url = "{{ route('role.index') }}";

        function fun_edit(id)
        {         
          var module_url = "{{ route('role.index') }}";
          var view_url = module_url + "/" + id;
            $.ajax({
                url: view_url,
                type:"GET", 
                success: function(result) {
                $("#names").val(result.name);
                $("#descriptions").val(result.description);
                }
            });

            $('.edit-modal').click(function() {
              $.ajax({
                url: view_url,
                type:"PATCH", 
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', "{{ csrf_token() }}");
                },
                data: {'name': $("#names").val(), 'description': $("#descriptions").val()},
                success: function(result) {
                    location.href = module_url; 
                }
              });
            });

        }

        function fun_delete(id) {
            var delete_url = module_url + "/" + id;
            swal({
              title: "Are you sure?",
              text: "Please confirm to delete",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              closeOnConfirm: false,
              closeOnCancel: true
            },
            function(isConfirm){
              if (isConfirm) {

                $.ajax({
                    url: delete_url,
                    type:"DELETE", 
                    beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', "{{ csrf_token() }}");
                    },
                    success: function(result){
                        location.reload(); 
                    }
                });

                swal("Deleted!", "Role Deleted Successfully.", "success");
              } /*else {
                swal("Cancelled", "Your Role Is Safe :)", "error");
              }*/
            });
        };

        $(document).ready(function() {

          $('#roledetails').DataTable({              
            "paging": true,                    
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
              "sSearch": " <i class='fa fa-search'></i> ",
              "searchPlaceholder": "type and search...",
                "sLengthMenu": "_MENU_",
            }  
          });
          
      });


    </script>
@endsection
