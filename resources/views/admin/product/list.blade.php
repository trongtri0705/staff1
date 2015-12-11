@extends('admin.master')
@section('controller','Product')
@section('action','List')
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Cate</th>
                                <th>Price</th>
                                <th>Date</th>
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
                                        <?php                                            
                                            $parent = DB::table('cates')->where('id',$item['cate_id'])->first();
                                            echo $parent->name;                                         
                                         ?>
                                        
                                   
                                </td>
                                <td>{!! number_format( $item['price'],0,",",".")!!} VND</td>                               
                                <td>
                                    {!!
                                        \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at']))->diffForHumans()
                                    !!}
                                </td> 
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Are you sure to delete this item')" href="{!!URL::route('admin.product.destroy',$item['id'])!!}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!!URL::route('admin.product.getEdit',$item['id'])!!}">Edit</a></td>
                            </tr>                                
                            @endforeach                           
                           <!--  <tr class="even gradeC" align="center">
                                <td>2</td>
                                <td>Áo Thun Polo</td>
                                <td>250.000 VNĐ</td>
                                <td>1 Hours Age</td>
                                <td>Ẩn</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection()