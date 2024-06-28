<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>

  <style>
    .custom-link {
      display: inline-block;
      padding: 5px 20px;
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

    .prices {
      padding: 0;
      margin: 0;
      color: purple;
      text-decoration: underline;
    }

    .items-name {
      padding: 0;
      margin: 0;
      text-decoration: none;
    }


    .hover-image {
      transition: transform 0.3s ease-in-out;
    }

    .hover-image:hover {
      transform: scale(1.1) translateY(-10px);
    }
  </style>

</head>

<body>

  @include('header')

  <div class="container text-center p-5">
    <h1 style="margin-top:50px">Shop</h1>
    <div class="d-flex justify-content-center align-items-center">
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
      <i class="bi bi-info-circle icon"></i>
    </div>
    <p>Các sản phẩm đập chất Việt</p>
  </div>


  <div class="container">
    <div class="row p-0">
      @foreach ($products as $product)
        <div class="col-12 col-sm-3 col-md-3 mb-4">
          <div data-aos="flip-right" data-aos-duration="1250">
            <a href="{{ route('product.show', $product->slug) }}" style="text-decoration: none; color: black;">
              <img src="{{ asset('Pictures/upFormWeb/' . $product->productImg) }}" class="hover-image"
                style="height:200px;width:200px; object-fit: cover;">
              <p class="items-name">{{ $product->name }}</p>
            </a>
            <p class="prices">{{ $product->price }}</p>
            <a href="{{ route('product.show', $product->slug) }}" class="custom-link">Đặt hàng</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @include('footer')
</body>

</html>
