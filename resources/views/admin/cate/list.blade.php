@extends('admin.master')
@section('controller','Category')
@section('action','List')
@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category
                        <small>List</small>
                    </h1>
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('danger'))
                    <div class="alert alert-danger">
                        {{ Session::get('danger') }}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Parent</th>
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
                            <td>{!!$item['name']!!}</td>
                            <td>                                    
                                
                                    @if($item['parent_id']==0)
                                        {!!"No Parent"!!}
                                    @else
                                    
                                    <?php                                            
                                        $parent = DB::table('cates')->where('id',$item['parent_id'])->first();
                                        echo $parent->name;                                         
                                     ?>
                                    @endif
                               
                            </td>
                            <td>Ẩn</td>                               
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Are you sure to delete this item')" href="{!!URL::route('admin.cate.destroy',$item['id'])!!}"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.cate.getEdit',$item['id'])!!}">Edit</a></td>
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
