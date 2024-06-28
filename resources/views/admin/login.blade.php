<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url('/Pictures/bg.jpg')">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">
            <form method="POST" action="{{ route('admin.login') }}" class="signin-form">
              @csrf
              @method('post')

              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Username" required>
              </div>
              <div class="form-group">
                <input id="password-field" type="password" class="form-control" name="password" placeholder="Password"
                  required>
                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
              </div>
              <div class="form-group">
                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
              </div>

              <a href="#" style="color: #fff">Forgot Password</a>
            </form>


            {{-- Báo nếu có lỗi --}}
            @if ($errors->any())
              <div
                class=" container d-flex flex-column justify-content-center align-item-center mt-2 alert alert-danger p-2"
                style="border-radius: 75px;" data-aos="fade-up" data-aos-duration="500">
                @foreach ($errors->all() as $error)
                  <p class="text-center m-0 p-0">{{ $error }}</p>
                @endforeach
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
