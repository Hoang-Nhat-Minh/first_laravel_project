<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tạo sản phẩm mới</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .login-form input[type="text"],
    .login-form textarea {
      width: 100%;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    .login-form textarea[name="shortInfo"] {
      min-height: 50px;
      max-height: 300px;
      overflow-y: auto;
    }

    .login-form label[name="deltailInfo"] {
      margin-top: 10px;
    }

    .outputImg {
      height: 200px;
      width: 200px;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <div class="container pt-5">
    <div class="row pt-5">

      <form class="login-form" method="POST" action="{{ route('admin.product.storeProduct') }}"
        enctype="multipart/form-data" style="background-color: lightgrey; border-radius: 10px;">
        @csrf
        @method('post')

        <div class="row">
          <div class="col-sm-12 col-md-6">
            <label for="name">Tên sản phẩm:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}"><br>

            <label for="price">Giá:</label><br>
            <input type="number" id="price" name="price" value="{{ old('price') }}"><br>

            <label for="shortInfo">Mô tả ngắn gọn:</label><br>
            <textarea name="shortInfo">{{ old('shortInfo') }}</textarea><br>

            <label for="deltailInfo">Mô tả chi tiết:</label><br>
            <textarea name="deltailInfo">{{ old('deltailInfo') }}</textarea><br>

            <input class="btn btn-success m-3" type="submit" value="Đăng">
          </div>

          <div class="col-sm-12 col-md-6" style="margin-top:auto;margin-bottom:auto;">
            <label for="image">Ảnh Cover:</label><br>
            <input class="btn btn-success mb-2" type="file" accept="image/*" name="productImg" id="file"
              onchange="loadFileCover(event)"><br>
            <img class="outputImg" id="outputCover" /><br>
          </div>
          <script>
            var loadFileCover = function(event) {
              var outputCover = document.getElementById('outputCover');
              outputCover.src = URL.createObjectURL(event.target.files[0]);
              outputCover.onload = function() {
                URL.revokeObjectURL(outputCover.src) // giải phóng bộ nhớ
              }
            };
          </script>
        </div>
      </form>
    </div>
    <div class="row pb-5">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>
</body>

</html>
