<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ url(asset('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')) }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ url(asset('public/admin/bower_components/metisMenu/dist/metisMenu.min.css')) }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ url(asset('public/admin/dist/css/sb-admin-2.css')) }}" rel="stylesheet">
    <link href="{{ url(asset('public/admin/css/fileinput.min.css')) }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ url(asset('public/admin/bower_components/font-awesome/css/font-awesome.min.css')) }}" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="{{ url(asset('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')) }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ url(asset('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css')) }}" rel="stylesheet">
   
    <script src="{{ url(asset('public/admin/js/ckeditor/ckeditor.js')) }}"></script>
    <script src="{{ url(asset('public/admin/js/ckfider/ckfinder.js')) }}"></script>
    <script type="text/javascript">
        var baseURL = "{!!url('')!!}";
    </script>
    <script src="{{ url(asset('public/admin/js/func_ckfinder.js')) }}"></script>
    <!--  -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="{{ url(asset('public/css/app.css')) }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ url(asset('public/css/fileinput.css')) }}" media="all" rel="stylesheet" type="text/css" />
    <script src="{{ url(asset('public/js/fileinput.js')) }}" type="text/javascript"></script>
    <script src="{{ url(asset('public/js/fileinput_locale_fr.js')) }}" type="text/javascript"></script>
    <script src="{{ url(asset('public/js/fileinput_locale_es.js')) }}" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/laravel">Admin</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {!!Auth::user()->username!!}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!!url('auth/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL('admin/cate/list')!!}">List Category</a>
                                </li>
                                <li>
                                    <a href="{!!URL('admin/cate/add')!!}">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL('admin/product/list')!!}">List Product</a>
                                </li>
                                <li>
                                    <a href="{!!URL('admin/product/add')!!}">Add Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!url('admin/user/list')!!}">List User</a>
                                </li>
                                <li>
                                    <a href="{!!url('admin/user/add')!!}">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Page Content -->
      
                    @yield('content');
               
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ url(asset('public/admin/bower_components/jquery/dist/jquery.min.js')) }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url(asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')) }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url(asset('public/admin/bower_components/metisMenu/dist/metisMenu.min.js')) }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ url(asset('public/admin/dist/js/sb-admin-2.js')) }}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{ url(asset('public/admin/bower_components/DataTables/media/js/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ url(asset('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')) }}"></script>
    <script type="text/javascript" src="{{ url('') }}/public/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="{{ url('') }}/public/tinymce/tinymce_editor.js"></script>
    <script type="text/javascript">
    // editor_config.selector = "textarea";
    // editor_config.path_absolute = "http://laravel-filemanager.rhcloud.com/";
    // tinymce.init(editor_config);
    </script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        function xacnhanxoa(msg){
            if(window.confirm(msg)){
                return true;
            }
            return false;
        }
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        $("div.alert").delay(5000).slideUp();
        
    </script>
    <script src="{{ url(asset('public/admin/js/myscript.js')) }}"></script>
</body>
<script>
    $('#file-fr').fileinput({
        language: 'fr',
        uploadUrl: '#',
        allowedFileExtensions : ['jpg', 'png','gif'],
    });
    $('#file-es').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions : ['jpg', 'png','gif'],
    });
   
    /*
    $(".file").on('fileselect', function(event, n, l) {
        alert('File Selected. Name: ' + l + ', Num: ' + n);
    });
    */
    
    $("#file-4").fileinput({
        // uploadExtraData: {kvId: '10'},        
        allowedFileExtensions: ['jpg', 'png','gif'],
        uploadAsync: false,
        uploadUrl: "http://localhost/laravel/resources/upload/images/"
    
    });
    $(".btn-warning").on('click', function() {
        if ($('#file-4').attr('disabled')) {
            $('#file-4').fileinput('enable');
        } else {
            $('#file-4').fileinput('disable');
        }
    });    
    $(".btn-info").on('click', function() {
        $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
    });
    /*
    $('#file-4').on('fileselectnone', function() {
        alert('Huh! You selected no files.');
    });
    $('#file-4').on('filebrowse', function() {
        alert('File browse clicked for #file-4');
    });
    */
    $(document).ready(function() {        
        $("#test-upload").fileinput({            
            'showPreview' : false,
            'allowedFileExtensions' : ['jpg', 'png','gif'],
            'elErrorContainer': '#errorBlock',

        });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
    });    
    </script>
    
</html>
