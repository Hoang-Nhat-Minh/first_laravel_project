<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tài khoản</title>
  <style>
    .outputImg {
      height: 350px;
      width: 350px;
      object-fit: cover;
      border-radius: 100px;
    }
  </style>
</head>

<body>
  @include('header')

  <div class="container pt-5">
    <div class="row mt-5 d-flex flex-column justify-coontent-center align-items-center">
      @php
        $user = Auth::user();
        $userdata = \App\Userdata::where('email', $user->email)->first();
      @endphp

      @if ($userdata != null && $i == 1)
        <!-- Hiển thị dữ liệu từ userdata -->
        <div class="row">
          <div class="col-md-5 col-sm-12 d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('Pictures/upFormWeb/' . $userdata->avatar) }}"
              style="height:200px;width:200px;object-fit:cover;border-radius: 100%">
            <h3 class="mt-3">{{ $userdata->nickname }}</h3>
          </div>
          <div class="col-md-7 col-sm-12 mb-5">
            <p><strong>Username:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p>Nickname: {{ $userdata->nickname }}</p>
            <p>Ngày sinh: {{ $userdata->ngaysinh }}</p>
            <p>Giới tính: {{ $userdata->gioitinh }}</p>
            <p>Địa chỉ: {{ $userdata->diachi }}</p>
            <p>Số điện thoại: {{ $userdata->sodt }}</p>
            <p><strong>Ngày tham gia: {{ \Carbon\Carbon::parse($user->created_at)->format('F-d-Y') }}</strong></p>
            <div class="row">
              <!-- Thêm nút cập nhật -->
              <form class="col-6" method="POST" action="{{ route('changeI') }}">
                @csrf
                @method('post')
                <input class="btn btn-success" type="submit" value="Cập nhật">
              </form>

              {{-- Nút đăng xuất --}}
              <form class="col-6 d-flex justify-content-end" method="POST" action="{{ route('logout') }}"
                class="p-0">
                @csrf
                @method('post')
                <button class="btn btn-danger" type="submit">Đăng xuất</button>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <h3>Lịch sử giao dịch</h3>
          <table class="table">
            <thead>
              <tr>
                <th class="col-2 text-center">Tên giao dịch</th>
                <th class="col-2 text-center">Thời gian giao dịch</th>
                <th class="col-2 text-center">Số lượng</th>
                <th class="col-2 text-center">Ảnh sản phẩm</th>
                <th class="col-2 text-center">Chi tiết</th>
                <th class="col-2 text-center">Huỷ đặt</th>
              </tr>
            </thead>
            <tbody>
              @php
                $email = Auth::user()->email; // Lấy email của người dùng hiện tại
                $useritems = App\useritems::where('email', $email)->get(); // Lấy tất cả các mục của người dùng
              @endphp

              @foreach ($useritems as $item)
                @php
                  $product = App\products_data::where('name', $item->name)->first(); // Lấy thông tin sản phẩm dựa trên tên
                @endphp
                <tr>
                  <td class="col-2 text-center">{{ $product->name }}</td>
                  <td class="col-2 text-center">{{ $item->created_at }}</td>
                  <td class="col-2 text-center">{{ $item->soluong }}</td>
                  <td class="col-2 text-center"><img src="/Pictures/upFormWeb/{{ $product->productImg }}"
                      alt="{{ $product->name }}" style="height:90px; width:90px; object-fit:cover"></td>
                  <td class="col-2 text-center">{{ $product->deltailInfo }}</td>
                  <td class="col-2 text-center">
                    <form action="{{ route('destroy.book.item', ['item' => $item]) }}" method="post">
                      @csrf
                      @method('delete')
                      <input class="btn btn-danger" type="submit" value="Hủy đặt">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="row">
          <h3>Lịch sử đặt bàn</h3>
          <table class="table">
            <thead>
              <tr>
                <th class="col-3 text-center">Ngày đặt</th>
                <th class="col-2 text-center">Ngày dùng bàn</th>
                <th class="col-3 text-center">Thời gian dùng bàn</th>
                <th class="col-2 text-center">Số lượng người</th>
                <th class="col-2 text-center">Huỷ đặt</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($reservations as $reservation)
                <tr>
                  <td class="col-3 text-center">{{ $reservation->created_at }}</td>
                  <td class="col-2 text-center">{{ $reservation->ngaydat }}</td>
                  <td class="col-3 text-center">{{ $reservation->thoigian }}</td>
                  <td class="col-2 text-center">{{ $reservation->soluongnguoi }}</td>
                  <td class="col-2 text-center">
                    <form action="{{ route('destroy.resevation', ['resevation' => $reservation]) }}" method="post">
                      @csrf
                      @method('delete')
                      <input class="btn btn-danger" type="submit" value="Hủy đặt">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @elseif ($userdata != null && $i == 0)
        <!-- Hiển thị form cập nhập -->
        <div class="col p-3" id="updateForm">
          <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div style="margin-top:auto;margin-bottom:auto;width:100%">
              <label for="image">Ảnh Avatar:</label><br>
              <input class="btn btn-success mb-2" type="file" accept="image/*" name="avatar" id="file"
                onchange="loadFileCover(event)"><br>
              <img class="outputImg" id="outputAvatar" /><br>
            </div>
            <script>
              var loadFileCover = function(event) {
                var outputAvatar = document.getElementById('outputAvatar');
                outputAvatar.src = URL.createObjectURL(event.target.files[0]);
                outputAvatar.onload = function() {
                  URL.revokeObjectURL(outputAvatar.src) // giải phóng bộ nhớ
                }
              };
            </script>

            <label for="nickname"><strong>Nickname:</strong></label><br>
            <input type="text" id="nickname" name="nickname"
              value="{{ old('nickname', $userdata->nickname) }}"><br>

            <label for="ngaysinh"><strong>Ngày sinh:</strong><span style="color: red;">*</span>:</label><br>
            <input type="date" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh', $userdata->ngaysinh) }}"
              required><br>

            <label for="gioitinh"><strong>Giới tính</strong><span style="color: red;">*</span>:</label><br>
            <select id="gioitinh" name="gioitinh" class="form-select" required>
              <option value="" disabled {{ old('gioitinh') ? '' : 'selected' }}>Chọn giới tính</option>
              <option value="Nam" {{ old('gioitinh', $userdata->gioitinh) == 'Nam' ? 'selected' : '' }}>Nam</option>
              <option value="Nữ" {{ old('gioitinh', $userdata->gioitinh) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>

            <label for="diachi"><strong>Địa chỉ:</strong><span style="color: red;">*</span>:</label><br>
            <input type="text" id="diachi" name="diachi" value="{{ old('diachi', $userdata->diachi) }}"
              required><br>

            <label for="sodt"><strong>Số điện thoại:</strong><span style="color: red;">*</span>:</label><br>
            <input type="text" id="sodt" name="sodt" value="{{ old('sodt', $userdata->sodt) }}"
              required><br>

            <input class="btn btn-success mt-3" type="submit" value="Cập nhật">
          </form>

          @if ($errors->any())
            <div class="alert alert-danger mt-3">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>
      @else
        <!-- Hiển thị form nhập mới -->
        <div class="col p-3" id="updateForm">
          <form method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div style="margin-top:auto;margin-bottom:auto;width:100%">
              <label for="image">Ảnh Avatar:</label><br>
              <input class="btn btn-success mb-2" type="file" accept="image/*" name="avatar" id="file"
                onchange="loadFileCover(event)"><br>
              <img class="outputImg" id="outputAvatar" /><br>
            </div>
            <script>
              var loadFileCover = function(event) {
                var outputAvatar = document.getElementById('outputAvatar');
                outputAvatar.src = URL.createObjectURL(event.target.files[0]);
                outputAvatar.onload = function() {
                  URL.revokeObjectURL(outputAvatar.src) // giải phóng bộ nhớ
                }
              };
            </script>

            <label for="nickname"><strong>Nickname:</strong></label><br>
            <input type="text" id="nickname" name="nickname" value="{{ old('nickname') }}"><br>

            <label for="ngaysinh"><strong>Ngày sinh:</strong><span style="color: red;">*</span>:</label><br>
            <input type="date" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh') }}" required><br>

            <label for="gioitinh"><strong>Giới tính</strong><span style="color: red;">*</span>:</label><br>
            <select id="gioitinh" name="gioitinh" class="form-select" required>
              <option value="" disabled {{ old('gioitinh') ? '' : 'selected' }}>Chọn giới tính</option>
              <option value="Nam" {{ old('gioitinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
              <option value="Nữ" {{ old('gioitinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>

            <label for="diachi"><strong>Địa chỉ:</strong><span style="color: red;">*</span>:</label><br>
            <input type="text" id="diachi" name="diachi" value="{{ old('diachi') }}" required><br>

            <label for="sodt"><strong>Số điện thoại:</strong><span style="color: red;">*</span>:</label><br>
            <input type="text" id="sodt" name="sodt" value="{{ old('sodt') }}" required><br>

            <input class="btn btn-success mt-3" type="submit" value="Cập nhật">
          </form>
          @if ($errors->any())
            <div class="alert alert-danger mt-3">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>
      @endif
    </div>
  </div>

  @include('footer')
</body>

</html>
