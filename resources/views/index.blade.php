<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Truyền Thống Việt</title>

  <style>
    .custom-link {
      color: gold;
      text-decoration: none;
      transition: all 0.5s ease;
    }

    .custom-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  @include('header')

  @if (session('error'))
    <script>
      alert('{{ session('error') }}');
    </script>
  @endif


  <img style="width:100%; border-bottom: 1px solid black;" src="/Pictures/IntroPic.jpeg">
  <!-- 1 -->
  <div class="container">
    <div class="row p-4">
      <div class="col-sm-12 col-md-6 p-4" data-aos="zoom-in" data-aos-duration="1100">
        <h1 class="text-center p-3">Khám phá</h1>
        <h2 class="text-center">Câu chuyện của chúng tôi</h2>

        <div class="d-flex justify-content-center align-items-center">
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
        </div>

        <p class="text-center">Truyền Thống Việt là nhà hàng ẩm thực sinh thái ở xã Sơn Cẩm, Thái Nguyên. Nhà hàng có
          không gian xanh, hồ nước, vườn cây và nhà sàn. Nhà hàng phục vụ các món ăn ba miền, đặc biệt là đặc sản Việt
          Bắc. Từ nhà hàng, bạn có thể ngắm nhìn làng nhà sàn Thái Hải và khu bảo tồn thiên nhiên.
        </p>
        <p class="text-center"><a href="{{ route('blogNews') }}" class="custom-link">Tìm hiểu thêm</a></p>
      </div>
      <div class="col-sm-12 col-md-3 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/BanhMy.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
      <div class="col-sm-12 col-md-3 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/Pho.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
    </div>
  </div>
  <!-- 2 -->
  <img src="/Pictures/Bep.jpeg"
    style="width: 100%; height: 300px; object-fit: cover; border-bottom: 1px solid black; border-top: 1px solid black">
  <!-- 3 -->
  <div class="container">
    <div class="row p-4">

      <div class="col-sm-12 col-md-4" data-aos="zoom-in" data-aos-duration="1100">
        <h1 class="text-center p-3">Nhìn qua</h1>
        <h2 class="text-center">Menu của chúng tôi</h2>

        <div class="d-flex justify-content-center align-items-center">
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
        </div>

        <p class="text-center">Dành cho những ai yêu thích ẩm thực tinh khiết, hãy ghé thăm “Truyền thống Việt” ngay bên
          cạnh và thỏa mãn niềm khao khát của bạn với những món ăn nhỏ của chúng tôi, luôn thay đổi theo cảm hứng từ các
          món ăn quốc tế và theo mùa. Chúng tôi yêu thích ẩm thực, rất nhiều loại thức ăn khác nhau, giống như bạn.
        </p>
        <p class="text-center"><a href="{{ route('menu') }}" class="custom-link">Xem qua Menu</a></p>
      </div>

      <div class="col-sm-12 col-md-2 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/menu-1.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
      <div class="col-sm-12 col-md-2 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/menu-2.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
      <div class="col-sm-12 col-md-2 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/menu-3.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
      <div class="col-sm-12 col-md-2 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/menu-4.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>

    </div>
  </div>
  <!-- 4 -->
  <img src="/Pictures/GiaVi.jpeg"
    style="width: 100%; height: 300px; object-fit: cover; border-bottom: 1px solid black; border-top: 1px solid black">
  <!-- 5 -->
  <div class="container">
    <div class="row p-4">
      <div class="col-sm-12 col-md-6 p-4" data-aos="zoom-in" data-aos-duration="1100">
        <h1 class="text-center p-3">Ẩm thực</h1>
        <h2 class="text-center">Thú vị</h2>

        <div class="d-flex justify-content-center align-items-center">
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
        </div>

        <p class="text-center">Tọa lạc trong một tòa nhà được phục chế, nhà hàng Truyền Thống Việt tại Thái Nguyên cam
          kết mang đến cho quý khách, dù là người dân địa phương hay du khách nước ngoài, một trải nghiệm ẩm thực thư
          giãn và gần gũi. Chúng tôi luôn tạo ra những điều độc đáo, đảm bảo rằng bạn sẽ có những kỷ niệm ẩm thực đáng
          nhớ mỗi khi ghé thăm.
        </p>
        <p class="text-center"><a href="{{ route('contact') }}" class="custom-link">Tìm hiểu thêm</a></p>
      </div>
      <div class="col-sm-12 col-md-3 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/XoiXeo.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
      <div class="col-sm-12 col-md-3 p-1" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/BanhTrang.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
    </div>
  </div>

  @include('footer')
</body>

</html>
