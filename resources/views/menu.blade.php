<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>

  <style>
    .info-icon {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background-color: none;
      color: black;
      border: 1px solid black;
      text-align: center;
      font-weight: bold;
    }

    .dot {
      flex-grow: 1;
      border-bottom: 1px dotted black;
      margin-top: 10px;
    }

    .custom-link {
      display: inline-block;
      padding: 10px 30px;
      background-color: black;
      border: 1px solid black;
      color: white;
      text-align: center;
      text-decoration: none;
      transition: all 0.5s;
    }

    .custom-link:hover {
      background-color: white;
      color: black;
    }

    #DatBan {
      font-size: x-large;
    }
  </style>
</head>

<body>

  @include('header')

  <img src="/Pictures/Menu.jpeg"
    style="width: 100%; height: 500px; object-fit: cover; border-bottom: 1px solid black; border-top: 1px solid black">

  <!-- Nội dung menu -->
  <div class="container text-center mt-5 mb-5">

    <!-- icon -->
    <div class="d-flex justify-content-center align-items-center">
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
    </div>

    <!-- Chữ giới thiệu menu -->
    <p class="fs-3" data-aos="zoom-in" data-aos-duration="1100">Thực đơn của chúng tôi mang đến những món ăn đương
      đại, lấy cảm hứng từ nền ẩm thực truyền thống Việt Nam. Thực đơn Lẩu Tam Đời có sẵn xuyên suốt buổi trưa đến tối
      với thực đơn bữa trưa đặt biệt được phục vụ từ thứ Hai đến thứ Sáu, trừ ngày lễ. Chào mừng bạn đến với quán ăn
      Truyền Thống Việt.</p>

    <!-- Menu -->
    <div class="row row-cols-2 mt-3">
      <div class="col" data-aos="zoom-in" data-aos-duration="1100">
        <!-- Khai Vị -->
        <h1 class="text-start mb-3 mt-5">Khai Vị</h1>
        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Chả Giò</h4>
          <div class="dot"></div>
          <h4>$1.50</h4>
        </div>
        <p class="text-start">Chả giò chiên giòn với nhân thịt heo, tôm và rau củ, phục vụ cùng nước chấm chua ngọt.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bánh Bèo</h4>
          <div class="dot"></div>
          <h4>$1.00</h4>
        </div>
        <p class="text-start">Bánh bèo nhỏ hấp với nhân tôm khô, hành lá và mỡ hành, phục vụ cùng nước mắm chua ngọt.
        </p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Nem nướng</h4>
          <div class="dot"></div>
          <h4>$1.20</h4>
        </div>
        <p class="text-start">Thịt heo nướng ướp gia vị được xắn lên xiên, phục vụ cùng nước chấm hồisin cay.</p>

        <div class="col p-0 d-flex flex-row align-items-center">
          <h4 class="text-start">Bánh Mì Pâté Chả Lụa</h4>
          <div class="dot"></div>
          <h4>$1.99</h4>
        </div>
        <p class="text-start p-0">Bánh mì kẹp pâté, chả lụa, dưa leo, cà rốt muối chua và rau sống, phục vụ trên ổ bánh
          mì giòn.</p>

        <!-- Tráng Miệng -->
        <h1 class="text-start mb-3 mt-5">Tráng Miệng</h1>
        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Chè Trôi Nước</h4>
          <div class="dot"></div>
          <h4>$1.50</h4>
        </div>
        <p class="text-start">Bánh gạo nhỏ hấp, nhân đậu xanh, phục vụ cùng nước đường gừng.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bánh Flan</h4>
          <div class="dot"></div>
          <h4>$1.00</h4>
        </div>
        <p class="text-start">Bánh flan mềm mịn, phục vụ cùng nước caramen ngọt.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Chè Bưởi</h4>
          <div class="dot"></div>
          <h4>$1.20</h4>
        </div>
        <p class="text-start">Chè bưởi thơm béo, phục vụ cùng hạt sen và nước cốt dừa.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bánh Khoai Môn</h4>
          <div class="dot"></div>
          <h4>$1.99</h4>
        </div>
        <p class="text-start">Bánh khoai môn hấp, nhân đậu xanh, phục vụ cùng nước cốt dừa.</p>
      </div>


      <!-- Món chính -->
      <div class="col" data-aos="zoom-in" data-aos-duration="1100">

        <h1 class="text-start mb-3 mt-5">Món Chính</h1>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Phở Bò</h4>
          <div class="dot"></div>
          <h4>$2.50</h4>
        </div>
        <p class="text-start">Phở bò với nước dùng thơm ngon, phục vụ cùng thịt bò và rau sống.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bún Chả</h4>
          <div class="dot"></div>
          <h4>$2.00</h4>
        </div>
        <p class="text-start">Bún chả với thịt heo nướng, phục vụ cùng bún và nước mắm pha chua ngọt.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bánh Xèo</h4>
          <div class="dot"></div>
          <h4>$2.20</h4>
        </div>
        <p class="text-start">Bánh xèo giòn tan, nhân tôm, thịt heo và giá, phục vụ cùng nước mắm pha.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Cơm Tấm</h4>
          <div class="dot"></div>
          <h4>$2.99</h4>
        </div>
        <p class="text-start">Cơm tấm với sườn nướng, phục vụ cùng nước mắm pha chua ngọt.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bún Bò Huế</h4>
          <div class="dot"></div>
          <h4>$2.50</h4>
        </div>
        <p class="text-start">Bún bò Huế với nước dùng cay, phục vụ cùng thịt bò và giò heo.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bánh Mì Thịt</h4>
          <div class="dot"></div>
          <h4>$2.00</h4>
        </div>
        <p class="text-start">Bánh mì thịt với pâté, thịt nguội, chả lụa, phục vụ cùng dưa leo, cà rốt muối chua và rau
          sống.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Gỏi Cuốn</h4>
          <div class="dot"></div>
          <h4>$2.20</h4>
        </div>
        <p class="text-start">Gỏi cuốn với tôm, thịt heo, bún và rau sống, phục vụ cùng nước chấm hồisin.</p>

        <div class="col d-flex flex-row align-items-center">
          <h4 class="text-start">Bún Thịt Nướng</h4>
          <div class="dot"></div>
          <h4>$2.99</h4>
        </div>
        <p class="text-start">Bún thịt nướng với thịt heo nướng, phục vụ cùng bún, rau sống và nước mắm pha chua ngọt.
        </p>

        <!-- Đặt bàn -->
        <a href="{{ route('resevation') }}" class="custom-link" id="DatBan">Đặt bàn</a>
      </div>
    </div>
    <!-- Hết Menu -->

    <br>
    <br>
    <br>

    <!-- Cam Kết -->
    <!-- icon -->
    <div class="d-flex justify-content-center align-items-center">
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
    </div>
    <p class="fs-3" data-aos="zoom-in" data-aos-duration="1100">Tại "Truyền Thống Việt", chúng tôi phục vụ nhu cầu ăn
      uống đa dạng, bao gồm các lựa chọn thực đơn chay và thuần chay vào bất kỳ ngày nào có giao dịch. Xin vui lòng liên
      hệ với chúng tôi ít nhất 24 giờ trước thời gian đặt chỗ của bạn và chúng tôi sẽ cố gắng hết sức để đáp ứng yêu cầu
      của bạn.</p>
    <br>
    <br>

    <!-- Thông Tin -->
    <div class="row row-cols-2 fs-5">
      <div class="col text-start" data-aos="zoom-in" data-aos-duration="1100">
        <h3 class="mb-4">Nhà Cung Cấp Của Chúng Tôi</h3>
        <p class="mb-5">Chúng tôi tin rằng món ăn ngon phụ thuộc nguyên liệu của nó, và những nguyên liệu tốt nhất
          thường là nguyên liệu địa phương.</p>
        <p class="mb-5">Mỗi ngày, chúng ta đưa ra nhiều quyết định về thực phẩm mà chúng ta ăn và mỗi lựa chọn thực
          phẩm của chúng ta đều có ảnh hưởng đạo đức và môi trường.</p>
        <p>Đó là sự trùng hợp tốt nhất khi những lựa chọn thực phẩm tốt - những lựa chọn tốt cho đất đai và con người
          chúng ta, cho môi trường, cho cơ thể và tâm trí - cũng đều ngon miệng và thú vị.</p>
      </div>

      <div class="col text-start" data-aos="zoom-in" data-aos-duration="1100">
        <h3 class="mb-4">Triết Lý Về Thực Phẩm Của Chúng Tôi</h3>
        <p>Chúng tôi tin rằng không món ăn nào có thể tốt hơn nguyên liệu của nó, và những nguyên liệu tốt nhất thường
          là những sản phẩm địa phương. Vì nấu ăn tuyệt vời bắt đầu từ những nguyên liệu tuyệt vời, và những nguyên liệu
          tuyệt vời bắt nguồn từ những nông dân xuất sắc.</p>
        <a href="{{ url('/') }}" class="custom-link">Tìm hiểu thêm</a>
      </div>
    </div>

  </div>

  <img class="mt-5 mb-5" src="/Pictures/BanAn.jpeg"
    style="width: 100%; height: 400px; object-fit: cover; border-bottom: 1px solid black; border-top: 1px solid black">

  @include('footer')
</body>


</html>
