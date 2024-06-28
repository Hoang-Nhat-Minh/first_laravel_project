<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liên hệ</title>

  <style>
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

    input,
    textarea {
      width: 100%;
    }
  </style>
</head>

<body>
  @include('header')

  <img src="/Pictures/LienHe.jpeg" style="width: 100%; height: 350px; object-fit: cover; border-bottom: 1px solid black; border-top: 1px solid black">

  <div class="container p-4 text-start">
    <div class="row p-4" data-aos="fade-down" data-aos-duration="1100">
      <h2>
        Liên hệ chúng tôi
      </h2>
      <div class="col-sm-12 col-md-6">
        <p>Thành phố Thái Nguyên,Tỉnh Thái Nguyên</p>
      </div>
      <div class="col-sm-12 col-md-6">
        <p>T:(+84)-398-435-434</p>
        <p>E:truyenthongviet@gmail.com</p>
      </div>
    </div>

    <div class="row p-4" data-aos="fade-down" data-aos-duration="1100">
      <div class="col-sm-12 col-md-6">
        <h2>Theo dõi chúng tôi</h2>
        <a class="text-dark" href="#">Facebook</a><br>
        <a class="text-dark" href="#">Instagram</a><br>
        <a class="text-dark" href="#">Zalo</a><br>
      </div>
      <div class="col-sm-12 col-md-6">
        <h1>Giờ mở cửa</h1>
        <div class="container p-0">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h3>Dịch vụ bữa trưa</h3>
              <p>Thứ Ba - Thứ Sáu</p>
              <p>11h30 - 14h30</p>
            </div>
            <div class="col-sm-12 col-md-6">
              <h3>Dịch vụ bữa tối</h3>
              <p>Chủ Nhật - Thứ Năm</p>
              <p>17h30 - 10h</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Map -->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118727.02084731428!2d105.72108707485727!3d21.577357335434225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313526e41a2f48ff%3A0x9af085049fb0466f!2zVHAuIFRow6FpIE5ndXnDqm4sIFRow6FpIE5ndXnDqm4sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1703044027530!5m2!1svi!2s" width="100%" height="450" style="border:1px solid black;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

  <!-- Form mail -->
  <div class="container text-start p-4 mt-5 mb-5">
    <div class="row" data-aos="fade-down" data-aos-duration="1100">
      <h2 class="mt-5 mb-3">Liên hệ</h2>
      <div class="col-sm-12 col-md-6 mt-3 mb-3">
        <p>Nhà hàng và quầy bar Truyền thống Việt tọa lạc ở tầng trệt và tầng một trong tòa nhà cổ kính tại Thái Nguyên. Cả nhà hàng và quầy bar đều có lối vào riêng.</p>
        <p>Nếu bạn có bất kỳ câu hỏi hoặc ý kiến, hãy liên hệ với chúng tôi theo cách thuận tiện nhất. Đừng ngần ngại đặt câu hỏi. Không có câu hỏi hợp lý nào mà đội ngũ của chúng tôi không thể trả lời.</p>
        <a href="{{ route('resevation') }}" class="custom-link" id="DatBan">Đặt bàn</a>
      </div>
      <div class="col-sm-12 col-md-6 mt-3 mb-3">
        <form action="/submit_form" method="post">
          <label for="name">Tên:</label><br>
          <input type="text" id="name" name="name"><br>
          <label for="email">Email:</label><br>
          <input type="email" id="email" name="email"><br>
          <label for="content">Nội dung:</label><br>
          <textarea id="content" name="content"></textarea><br>
          <input class="custom-link" type="submit" value="Gửi tin nhắn">
        </form>
      </div>
    </div>
  </div>

  @include('footer')
</body>

</html>