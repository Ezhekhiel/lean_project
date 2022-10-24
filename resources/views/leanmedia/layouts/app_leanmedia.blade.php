<!DOCTYPE html>
<html>
<head>
    @include('leanmedia.partial_galery.head')
</head>
<body>
<div class="site-wrap">

    <!-- Navbar -->

    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
            @yield ('contentheader')
        <!-- /.content-header -->

        <!-- Main content -->
            @yield ('content')
        <!-- /.content -->


    <!-- Footer-->
    @include('leanmedia/partial_galery/footer')

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('leanmedia.partial_galery.scripts')
@include('leanmedia.partial_galery.js')
@include('leanmedia.partial_galery.modal')
</body>
</html>
