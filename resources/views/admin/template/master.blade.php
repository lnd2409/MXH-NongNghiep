<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Victory Admin</title>
  {{-- CSS --}}
  @include('admin.template.css')
</head>
<body>
  <div class="container-scroller">
    @include('admin.template.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        @include('admin.template.right-sidebar')
        @include('admin.template.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


  {{-- Javascript --}}
  @include('admin.template.script')
</body>

</html>
