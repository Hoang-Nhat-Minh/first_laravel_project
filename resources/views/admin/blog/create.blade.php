<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tạo Blog Mới</title>
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

      <form class="login-form" method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data"
        style="background-color: lightgrey; border-radius: 10px;">
        @csrf
        @method('post')

        <div class="row">
          <div class="col-sm-12 col-md-6">
            <label for="date">Ngày đăng:</label><br>
            <input type="date" name="ngayBlog" value="{{ old('ngayBlog') }}"><br>

            <label for="Header">Header:</label><br>
            <input type="text" name="header"value="{{ old('header') }}"><br>

            <label for="shortInfo">Mô tả ngắn gọn:</label><br>
            <textarea name="shortInfo">{{ old('shortInfo') }}</textarea><br>

            @for ($i = 1; $i <= 5; $i++)
              <label for="deltailInfo">Chi tiết đoạn {{ $i }}:</label><br>
              <textarea name="deltailInfo{{ $i }}">{{ old('deltailInfo' . $i) }}</textarea>
              <label for="image">Hình ảnh {{ $i }}:</label><br>
              <input class="btn btn-success mb-2" type="file" accept="image/*"
                name="blogDeltailImg{{ $i }}" id="file{{ $i }}"
                onchange="loadFile1(event, 'output{{ $i }}')"><br>
              <img class="outputImg" id="output{{ $i }}" /><br>
            @endfor
            <script>
              var loadFile1 = function(event, outputId) {
                var output = document.getElementById(outputId);
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                  URL.revokeObjectURL(output.src) // giải phóng bộ nhớ
                }
              };
            </script>

            <input class="btn btn-success mt-3" type="submit" value="Đăng">
          </div>

          <div class="col-sm-12 col-md-6" style="margin-top:auto;margin-bottom:auto;">
            <label for="image">Ảnh Cover:</label><br>
            <input class="btn btn-success mb-2" type="file" accept="image/*" name="blogImg" id="file"
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
