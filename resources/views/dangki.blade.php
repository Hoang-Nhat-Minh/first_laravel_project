<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng kí</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <style>
    body {
      background-image: url('/Pictures/BackgroundImg.jpeg');
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
      opacity: 90%;
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
      height: 40px;
    }
  </style>
</head>

<body>
  <div class="container mt-5 col-md-5 col-sm-5">
    <form class="login-form d-flex flex-column justify-content-center align-item-center"
      action="{{ route('dangki.store') }}" method="POST">
      @csrf
      @method('post')

      <input type="text" class="form-control" data-aos="fade-left" data-aos-duration="1000" name="name"
        placeholder="Tài khoản" required value="{{ old('name') }}">

      <input type="password" class="form-control" data-aos="fade-left" data-aos-duration="1250" name="password"
        placeholder="Mật khẩu" required required value="{{ old('password') }}">

      <input type="password" class="form-control" data-aos="fade-left" data-aos-duration="1500" name="confirm_password"
        placeholder="Nhập lại mật khẩu" required value="{{ old('confirm_password') }}">

      <input type="email" class="form-control" data-aos="fade-left" data-aos-duration="1750" name="email"
        placeholder="Nhập email" required value="{{ old('email') }}">

      <button type="submit" class="btn mb-3" data-aos="fade-left" data-aos-duration="2000" id="login"
        style="border-radius: 100px;">Đăng ký</button>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </form>
  </div>

  <script>
    document.getElementById('login').addEventListener('click', function(event) {
      var password = document.getElementById('password').value;
      var confirmPassword = document.getElementById('confirm_password').value;

      if (password !== confirmPassword) {
        alert('Mật khẩu và mật khẩu xác nhận không khớp!');
        event.preventDefault();
      }
    });
    AOS.init();
  </script>
</body>

</html>
