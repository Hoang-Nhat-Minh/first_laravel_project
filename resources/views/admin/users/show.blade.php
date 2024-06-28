<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Danh sách chỉnh sửa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
          <th class="col-2">Tên user</th>
          <th class="col-1">Giới tính</th>
          <th class="col-2">Số điện thoại</th>
          <th class="col-2">Email</th>
          <th class="col-2">Địa chỉ</th>
          <th class="col-2">Tình trạng</th>
          <th class="col-1">Tháo tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <?php
          $userdata = \App\Userdata::where('email', $user->email)->first();
          ?>
          <tr>
            <td class="col-2">{{ $user->name }}</td>
            <td class="col-1">{{ $userdata->gioitinh }}</td>
            <td class="col-2">{{ $userdata->sodt }}</td>
            <td class="col-2">{{ $user->email }}</td>
            <td class="col-2">{{ $userdata->diachi }}</td>
            <td class="col-2">Chưa rõ</td>
            <td class="col-1">
              <form action="{{ route('admin.user.destroy', ['user' => $user]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Xóa user">
              </form>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
</body>

</html>
