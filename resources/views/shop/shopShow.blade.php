<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $product->name }}</title>
  <style>
    .prices {
      padding: 0;
      margin: 0;
      color: purple;
      text-decoration: underline;
    }

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
  </style>
</head>

<body>
  <div class="container text-center pt-4">
    <h1>Chi Tiết Đồ Dùng</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-6">
        <img src="{{ asset('Pictures/upFormWeb/' . $product->productImg) }}" style="width:100%; object-fit: cover;">
      </div>

      <div class="col-12 col-sm-6 col-md-6 p-4">
        <h3>{{ $product->name }}</h3>
        <h4 class="prices">{{ $product->price }}</h4>
        <br>
        <p>{{ $product->shortInfo }}</p>

        <form action="{{ route('user.book.item', ['name' => $product->name]) }}" method="POST" class="counter">
          @csrf
          @method('post')

          <p class="align-self-center ">Số lượng:</p>
          <div class="d-flex justify-content-center">
            <button id="decrease" class="custom-link" type="button">-</button>
            <input id="quantity" name="soluong" class="form-control text-center" type="text" value="1"
              readonly>
            <button id="increase" class="custom-link" type="button">+</button>
          </div><br>

          <button type="submit" class="custom-link">Đặt hàng</button>
          <script>
            var quantity = document.getElementById('quantity');
            var increase = document.getElementById('increase');
            var decrease = document.getElementById('decrease');
            increase.addEventListener('click', function() {
              quantity.value = parseInt(quantity.value) + 1;
            });
            decrease.addEventListener('click', function() {
              if (quantity.value > 1) {
                quantity.value = parseInt(quantity.value) - 1;
              }
            });
          </script>
        </form>
      </div>
    </div>

    <div class="row mt-5 mb-5 p-4" style="border-top:1px solid black;border-bottom:1px solid black;">
      <h2>Mô tả:</h2>
      <p>{{ $product->deltailInfo }}</p>
    </div>
  </div>

  @include('footer')
</body>

</html>
