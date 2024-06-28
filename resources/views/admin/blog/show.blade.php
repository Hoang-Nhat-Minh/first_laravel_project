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
    .blogInfo {
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
          <th class="col-2">Ngày Blog</th>
          <th class="col-1">Tiêu đề</th>
          <th class="col-1">Hình ảnh</th>
          <th class="col-2">Mô tả ngắn</th>
          <th class="col-5">Chi tiết</th>
          <th class="col-1 text-center">Chỉnh sửa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($blogs as $blog)
          <tr>
            <td class="col-2">{{ $blog->ngayBlog }}</td>
            <td class="col-1">
              <div class="blogInfo">{{ $blog->header }}</div>
            </td>
            <td class="col-1">
              <img src="{{ asset('Pictures/upFormWeb/' . $blog->blogImg) }}"
                alt="Blog Image"style="height:90px; width:90px; object-fit:cover">
            </td>
            <td class="col-2">
              <div class="blogInfo">{{ $blog->shortInfo }}</div>
            </td>
            <td class="col-5">
              <div class="blogInfo">{{ $blog->deltailInfo1 }}</div>
            </td>

            <td class="col-1"><a class="btn btn-warning mb-3"href="{{ route('admin.blogs.edit', ['blog' => $blog]) }}">Sửa
                blog</a>
              <form action="{{ route('admin.blogs.destroy', ['blog' => $blog]) }}" method="post">
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
