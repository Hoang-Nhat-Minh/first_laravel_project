<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Danh sách chỉnh sửa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .shopInfo {
      overflow: hidden;
      text-overflow: ellipsis;
      -webkit-line-clamp: 4;
      display: -webkit-box;
      -webkit-box-orient: vertical;
    }
  </style>
</head>

<body>
  <div class="m-3">
    <a href="{{ route('admin') }}" class="btn btn-info">Quay lại</a>
  </div>
  <div class="container">
    @if (session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <table class="table">
      <thead>
        <tr>
          <th class="col-2">Tên sản phẩm</th>
          <th class="col-1">Giá</th>
          <th class="col-1">Hình ảnh</th>
          <th class="col-2">Mô tả ngắn</th>
          <th class="col-5">Chi tiết</th>
          <th class="col-1 text-center">Chỉnh sửa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td class="col-2">{{ $product->name }}</td>
            <td class="col-1">
              <div class="shopInfo">{{ $product->price }}</div>
            </td>
            <td class="col-1">
              <img src="{{ asset('Pictures/upFormWeb/' . $product->productImg) }}"
                alt="Blog Image"style="height:90px; width:90px; object-fit:cover">
            </td>
            <td class="col-2">
              <div class="shopInfo">{{ $product->shortInfo }}</div>
            </td>
            <td class="col-5">
              <div class="shopInfo">{{ $product->deltailInfo }}</div>
            </td>

            <td class="col-1"><a
                class="btn btn-warning mb-3"href="{{ route('admin.product.edit', ['product' => $product]) }}">Sửa
                món ăn</a>
              <form action="{{ route('admin.product.destroy', ['product' => $product]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Xóa blog">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>
