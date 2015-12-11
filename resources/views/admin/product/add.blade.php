@extends('admin.master')
<!-- @section('controller','Category');
@section('action','Add') -->
@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Add</small>
                        </h1>
                    </div>
                    @include('admin.block.error')       
                    <!-- /.col-lg-12 -->
                    
                    <form action="{!! route('admin.product.getAdd')!!}" method="POST" enctype="multipart/form-data">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}" />
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="sltParent">
                                    <option value="">Please Choose Category</option>
                                    <?php cate_parent($parent); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Product's Name" />
                            </div>
                            <div class="form-group">
                                <label>Alias</label>
                                <input class="form-control" name="txtAlias" placeholder="Please Enter Alias" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Order</label>
                                <input class="form-control" name="txtOrder" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent"></textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>
                            </div>
                           <!--  <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="fImages">
                            </div> -->
                            <div class="form-group">
                                <label>Image</label>
                                <!-- id="file-4" class="file" data-upload-url="#"-->
                                <input  id="file-4" type="file" class="file" data-upload-url="#"   name="fImages">
                            </div>
                            
                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" name="txtKeywords" placeholder="Please Enter Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="txtDescription" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Invisible
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        @for($i = 1; $i <= 10; $i++)
                        <div class="form-group">
                            <label>Image Prodc Detail {!!$i!!}</label>
                            <input type="file" id="file-0a" class="file" type="file" name="fProductDetail[]">
                            
                        </div>
                        @endfor
                    </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    @endsection()