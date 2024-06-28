<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  @if ($allow_all)
    <h1>Admin</h1>
    <div class="container">
      <div class="row">
        <h3>Quản lý Blog</h3>
        <a href="{{ route('admin.blogs.createBlog') }}" class="custom-link">Thêm Blog</a>
        <a href="{{ route('admin.blogs.showBlog') }}" class="custom-link">Chỉnh sửa blog</a>
      </div>

      <div class="row mt-5">
        <h3>Quản lý Shop</h3>
        <a href="{{ route('admin.product.createProduct') }}" class="custom-link">Thêm sản phẩm</a>
        <a href="{{ route('admin.product.showProduct') }}" class="custom-link">Chỉnh sửa sản phẩm</a>
      </div>

      <div class="row mt-5">
        <h3>Quản lý Users</h3>
        <a href="{{ route('admin.users.showUsers') }}" class="custom-link">Xem các users</a>
      </div>
    </div>
  @endif

</body>

</html>
