@extends('admin.master')
@section('content')

        <!-- Page Content -->
         <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    @include('admin.block.error')       
                    <!-- /.col-lg-12 -->
                    <form action="" method="POST" name="frmEditProduct" enctype="multipart/form-data">
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="sltParent">
                                    <option value="">Please Choose Category</option>
                                    <?php cate_parent($cate,0,"",$product['cate_id']); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="txtName" placeholder="Please Enter Product's Name" value="{!! old('txtName',isset($product)? $product['name'] :null)!!}" />
                            </div>
                            <div class="form-group">
                                <label>Alias</label>
                                <input class="form-control" name="txtAlias" placeholder="Please Enter Alias" value="{!! old('txtAlias',isset($product)? $product['alias'] :null)!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="txtPrice" placeholder="" value="{!! old('txtPrice',isset($product)? $product['price'] :null)!!}"/>
                            </div>
                            <div class="form-group">
                                <label>Intro</label>
                                <textarea class="form-control" rows="3" name="txtIntro" value="{!! old('txtIntro',isset($product)? $product['intro'] :null)!!}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Order</label>
                                <input class="form-control" name="txtOrder" placeholder="" value="{!! old('txtOrder',isset($product)? $product['order'] :null)!!}" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" rows="3" name="txtContent" value="{!! old('txtContent',isset($product)?  html_entity_decode($product['content']) :null)!!}"></textarea>
                                <script type="text/javascript">ckeditor("txtContent")</script>
                            </div>  
                            <div class="form-group">
                                <input type="hidden" name="img_cur" value="{!!$product['image']!!}">
                            </div>                          
                            <div class="form-group">
                                <label>Image</label>
                                <input id="file-4" type="file" class="file" data-upload-url="#" name="fImages" title="{!! old('fImages',isset($product)?  ($product['image']) :null)!!}" value="{!! old('fImages',isset($product)?  url('resources/upload/images').'/'.$product['image'] :null)!!}">
                            </div>
                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" name="txtKeywords" placeholder="Please Enter Keywords" value="{!! old('txtKeywords',isset($product)?  ($product['keywords']) :null)!!}" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="txtDescription" class="form-control" rows="3" value="{!! old('txtDescription',isset($product)?  ($product['description']) :null)!!}"></textarea>
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
                            <button type="submit" class="btn btn-default">Product Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        @foreach($product_img as $key=> $item)
                            <div class="form-group" id="hinh{!!$key+1!!}">                                
                                <img idHinh="{!!$item['id']!!}" id="hinh{!!$key+1!!}" src="{!!asset('resources/upload/detail/'.$item['image'])!!}" >    
                                <a title="Xóa" href="javascript:void(0)" type="button" id="del_img_demo" class="btn btn-default btn-circle icon_del"><i class="fa fa-times"></i></a>
                            </div>                            
                        @endforeach
                        <button type="button" class="btn btn-primary" id="addImages">Add Images</button>
                        <div id="insert"></div>

                    </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <script type="text/javascript">
            
        </script>
        <style type="text/css">
            .col-md-4 img{
                width: 100px;
            }
            .col-md-4 >div{
                position: relative;
            }
            .icon_del{
                color: red;
                position: absolute;
                left: 27%;
                top: -10%;
                vertical-align: middle;
                /*display: none;              */
            }
            .btn{
                padding: 3px !important;
            }
            #addImages{
                margin-bottom: 15px;
            }
        </style>
        <script type="text/javascript">
        var x = document.getElementById("file-4").getAttribute("value");
        var y = document.getElementById("file-4").getAttribute("title");
        $("#file-4").fileinput({
            initialPreview: [
            "<img src= " +x+" class='file-preview-image' alt='Desert' title='Desert'>",

            ],
            initialPreviewConfig: [
            ]
           
        });
        $(".file-caption-name").html(y);
        </script>
@endsection()
