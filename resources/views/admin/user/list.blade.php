@extends('admin.master')
<!-- @section('controller','Category');
@section('action','Add') -->
@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Delete</th>                                
                                <th>Edit</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item) 
                            @if($item['id']%2==0)                          
                            <tr class="gradeC" align="center">
                            @else
                            <tr class="gradeX" align="center">
                            @endif                            
                                <td>{!!$item['id']!!}</td>
                                <td>{!!$item['username']!!}</td>
                                <td>
                                @if($item['level']==1)
                                    {!!'Admin'!!}
                                @else
                                    {!!'User'!!}
                                @endif
                                </td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Are you sure to delete this item')" href="{!!URL::route('admin.user.destroy',$item['id'])!!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.user.getEdit',$item['id'])!!}"">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    @endsection()