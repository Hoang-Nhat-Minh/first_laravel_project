<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Đặt bàn</title>

  <style>
    form {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding-left: 30px;
      padding-right: 30px;
      height: 100%;
      background-color: rgb(130, 174, 158);
      color: white;
      border-radius: 10px;
      border: 1px solid black;
    }

    input[type=submit] {
      padding: 10px 30px;
      background-color: white;
      color: black;
      border: 1px solid white;
      transition: all 0.5s;
    }

    input[type=submit]:hover {
      background-color: rgb(130, 174, 158);
      color: white;
    }

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
  <!-- 1 -->
  <img src="/Pictures/DatBan.jpeg"
    style="width: 100%; height: 650px; object-fit: cover; border-bottom: 1px solid black; border-top: 1px solid black">

  <!-- 2.Nội dung Đặt bàn -->
  <div class="container text-center mt-5 mb-5">
    <div class="d-flex justify-content-center align-items-center">
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
    </div>

    <!-- Chữ giới thiệu Đặt bàn -->
    <h1 class="mb-5" data-aos="zoom-in" data-aos-duration="1100">Đặt hàng tại Truyền Thống Việt thật dễ dàng và nhanh
      chóng.</h1>

    <!-- Đặt bàn -->
    <div class="row mt-3 mb-3">
      <!-- Text giới thiệu -->
      <div class="text-start col-sm-12 col-md-6" data-aos="zoom-in" data-aos-duration="1100">
        <p class="fs-4">Hãy tham gia cùng chúng tôi cho một trải nghiệm ẩm thực thực sự đáng nhớ tại một trong những
          địa điểm tuyệt vời nhất ở Việt Nam. Một trải nghiệm tôn vinh sự đa dạng của những sản phẩm Việt Nam tuyệt vời
          của chúng tôi, được chế biến với sự sáng tạo và đam mê.</p>
        <br>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h3>Đặt qua điện thoại</h3>
            <p>Chúng tôi nhận đặt chỗ cho bữa trưa và bữa tối. Để đặt chỗ, vui lòng gọi cho chúng tôi theo số
              (+84)-398-435-434 từ 10 giờ sáng đến 6 giờ chiều, từ thứ Hai đến thứ Sáu.</p><br>
            <p>Chúng tôi không nhận đặt chỗ khu vực quầy bar - chúng tôi dành khu vực này cho khách đi bộ để đảm bảo
              rằng chúng tôi luôn cung cấp một số bàn cho những người đó.</p>
          </div>

          <div class="col-sm-12 col-md-6">
            <h3>Đặt theo nhóm</h3>
            <p>Bạn có thể đặt bàn từ 1 đến 9 người qua biểu mẫu ở trên. Nếu không có sẵn, vui lòng liên hệ trực tiếp với
              nhà hàng chúng tôi để có thể hỗ trợ.</p><br>
            <p>Đối với nhóm lớn hơn, vui lòng truy cập phần Ăn uống riêng & Sự kiện để biết thêm thông tin. Chúng tôi
              mong được chào đón bạn sớm.</p>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-6" data-aos="zoom-in" data-aos-duration="1100">
        <form class="text-start p-2" method="POST" action="{{ route('user.resevation') }}">
          @csrf
          @method('post')

          <h1>Đặt bàn</h1><br><br>
          <!-- Ngày tháng -->
          <label for="date">Ngày tháng:</label>
          <input type="date" name="ngaydat"><br>
          <!-- Thời gian -->
          <label for="time">Thời gian:</label>
          <input type="time" name="thoigian" min="07:40" max="21:40" required
            oninvalid="this.setCustomValidity('Vui lòng nhập thời gian từ 7:40 SA đến 21:40 CH')"
            oninput="this.setCustomValidity('')"><br>
          <!-- Số lượng người -->
          <label for="quantity">Số lượng người:</label>
          <input type="number" name="soluongnguoi" min="1" max="9"><br>
          <input type="submit" value="Đặt bàn">
          @if ($errors->any())
            <div
              class=" container d-flex flex-column justify-content-center align-item-center mt-2 alert alert-danger p-2"
              style="border-radius: 75px;" data-aos="fade-up" data-aos-duration="500">
              @foreach ($errors->all() as $error)
                <p class="text-center m-0 p-0">{{ $error }}</p>
              @endforeach
            </div>
          @endif
        </form>
      </div>
    </div>
  </div>

  <!-- 3 -->
  <img src="/Pictures/Bar.jpeg"
    style="width: 100%; height: 450px; object-fit: cover; border-bottom: 1px solid black; border-top: 1px solid black">

  <!-- 4.Text tham khảo -->
  <div class="container">
    <div class="row p-4">
      <div class="col-sm-12 col-md-6" data-aos="zoom-in" data-aos-duration="1100"
        style="margin-top:auto;margin-bottom:auto">
        <h1 class="text-center p-3">Phòng Riêng</h1>
        <h2 class="text-center">Gác Lửng</h2>
        <div class="d-flex justify-content-center align-items-center">
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
        </div>
        <p class="text-center">Phòng 50 chỗ của nhà hàng truyền thống Việt Nam, “Phòng Gác Lửng,” nổi bật với tủ rượu có
          kiểm soát nhiệt độ, trưng bày nhiều loại rượu và không gian riêng tư. Một phòng bán riêng, “Phòng Sơn Trà,”
          sẵn sàng phục vụ cho các cuộc họp, sinh nhật và các dịp khác.
        </p>
        <p class="text-center"><a href="{{ route('resevation') }}" class="custom-link">Đặt bàn online</a></p>
      </div>

      <div class="col-sm-12 col-md-6" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/NhaHang2.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>
    </div>

    <div class="row p-4">
      <div class="col-sm-12 col-md-6" data-aos="zoom-in" data-aos-duration="1100">
        <img src="/Pictures/NhaHang1.jpeg" style="height:100%;width:100%;object-fit:cover">
      </div>

      <div class="col-sm-12 col-md-6" data-aos="zoom-in" data-aos-duration="1100"
        style="margin-top:auto;margin-bottom:auto">
        <h1 class="text-center p-3">Phòng Ăn</h1>
        <h2 class="text-center">Phòng Hoàng Gia</h2>
        <div class="d-flex justify-content-center align-items-center">
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
          <i class="bi bi-info-circle icon"></i>
        </div>
        <p class="text-center">Từ vị trí nhìn ra phòng ăn và bếp mở, có thể chứa đến 75 khách hoặc một buổi tiệc đứng
          với 130 khách. Phòng Hoàng Gia là một không gian ăn uống riêng tư hiện đại, sáng sủa và thanh lịch, nằm ở góc
          nhà hàng nhìn ra Hồ Nguyễn Hiền.
        </p>
        <p class="text-center"><a href="{{ route('resevation') }}" class="custom-link">Đặt bàn online</a></p>
      </div>
    </div>

    <!-- Miễn phí dịch vụ -->
    <div class="container text-center" data-aos="zoom-in" data-aos-duration="1100"
      style="background-color:goldenrod; color:white;border-radius: 10px;">
      <h2 class="pt-5">Champagne Tặng Kèm</h2>
      <p class="pt-3 pb-5 pl-3 pr-3">Mỗi tối thứ Hai, thứ Ba và thứ Tư, chúng tôi dành tặng một chai Champagne miễn phí
        cho các nhóm từ 10 người trở lên đặt chỗ tại quầy bar của chúng tôi.<br>
        Hãy gọi cho đội ngũ đặt chỗ của chúng tôi theo số (+84)-398-435-434 để biết thêm thông tin.</p>
    </div>
  </div>

  @include('footer')
</body>

</html>
