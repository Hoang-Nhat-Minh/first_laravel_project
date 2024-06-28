<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <style>
    h1 {
      color: white;
    }

    body {
      background-image: url('/Pictures/background.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

    .login-form {
      padding: 40px;
      margin-left: auto;
      margin-right: auto;
    }


    .login-form input {
      height: 40px;
      border-radius: 100px;
      margin-bottom: 10px;
    }

    .login-form button {
      height: 40px;
      margin-top: 20px;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    #login {
      background-color: darkcyan;
    }
  </style>
</head>

<body>
  <h1 class="text-center mt-5">Welcome to Truyen Thong Viet</h1>
  <div class="container col-md-5 col-sm-5">
    <form class="login-form d-flex flex-column justify-content-center align-item-center" method="POST"
      action="{{ route('login') }}">
      @csrf
      @method('post')

      <input type="text" class="form-control" data-aos="fade-up" data-aos-duration="1000" name="name"
        placeholder="Tài khoản" required>

      <input type="password" class="form-control" data-aos="fade-up" data-aos-duration="1250" name="password"
        placeholder="Mật khẩu" required>

      <a href="#" class="mb-3 text-decoration-none" data-aos="fade-up" data-aos-duration="1500"
        style="color:white">Quên mật khẩu?</a>

      <button type="submit" class="btn mb-3" data-aos="fade-up" data-aos-duration="1750" id="login"
        style="border-radius: 100px;">Đăng nhập</button>

      <p class="text-center m-0" data-aos="fade-up" data-aos-duration="2000" style="color:white">-- Hoặc đăng nhập với
        --</p>
      <div class="container" data-aos="fade-up" data-aos-duration="2250">
        <div class="row mt-3">
          <div class="col-md-5 col-sm-12 mt-2 p-0">
            <a href="{{ route('facebooklogin') }}" class="btn btn-primary w-100"
              style="border-radius: 100px;">Facebook</a>
          </div>
          <div class="col-md-5 col-sm-12 mt-2 p-0" style="margin-left: auto;">
            <a href="{{ route('googlelogin') }}" class="btn btn-danger w-100" style="border-radius: 100px;">Gmail</a>
          </div>
        </div>
      </div>

      <a href="{{ route('dangki') }}" class="text-decoration-none text-center" style="color:white">Đăng ký
      </a>

      {{-- Báo nếu có lỗi --}}
      @if ($errors->any())
        <div class=" container d-flex flex-column justify-content-center align-item-center mt-2 alert alert-danger p-2"
          style="border-radius: 75px;" data-aos="fade-up" data-aos-duration="500">
          @foreach ($errors->all() as $error)
            <p class="text-center m-0 p-0">{{ $error }}</p>
          @endforeach
        </div>
      @endif

    </form>
  </div>

  <script>
    AOS.init();
  </script>
</body>

</html>
