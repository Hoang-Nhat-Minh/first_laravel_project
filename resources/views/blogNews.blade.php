<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News</title>
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

    .pagination{
      display:flex; 
      justify-content:center; 
      align-items:center;
    }

    .page-item .page-link {
      margin:10px;
      color:black;
      border-radius: 100px;
    }

    .page-item.active .page-link {
      background-color: black !important;
      border-color: black !important;
    }

  </style>
</head>

<body>
  @include('header')

  <div class="container text-center p-5">
    <div class="row p-5" data-aos="fade-up" data-aos-duration="1100">
      <h1 class="p-5" style="background-color: lightcoral;border-radius: 10px;">Tin Tức Mới Nhất Về Chúng Tôi</h1>
    </div>

    @foreach ($blogs as $blog)
      <br><br><br>
      <div class="row p-5" data-aos="fade-up" data-aos-duration="1100"
        style="background-color: lightgrey;border-radius: 10px;">
        <div class="col-sm-12 col-md-6  p-3">
          <h5>{{ \Carbon\Carbon::parse($blog->ngayBlog)->format('F,d,Y') }}</h5><br>
          <h3>{{ $blog->header }}</h3>
          <div class="col d-flex flex-nowrap justify-content-center p-2">
            <div class="info-icon">i</div>
            <div class="info-icon">i</div>
            <div class="info-icon">i</div>
          </div>
          <p>{{ $blog->shortInfo }}</p>
          <a href="{{ route('blog.show', $blog->slug) }}" class="custom-link">Tìm hiểu thêm</a>
        </div>
        <div class="col-sm-12 col-md-6" style="margin-top:auto;margin-bottom:auto;">
          <img src="{{ asset('Pictures/upFormWeb/' . $blog->blogImg) }}"
            style="height:100%;width:100%;object-fit:cover">
        </div>
      </div>
    @endforeach

    <div class="row p-5">
      {{ $blogs->links() }}
    </div>


  </div>

  @include('footer')
</body>

</html>
