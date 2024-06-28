<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $blog->header }}</title>
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
  </style>
</head>

<body>
  @include('header')

  <br><br><br>
  <div class="container text-center" style="border-radius: 10px;">
    <h1 style="font-weight: bold;color:black;">
      {{ $blog->header }}
    </h1>
    <div class="row p-4" style="border-bottom:1px solid black;border-top:1px solid black;">
      <div class="col-sm-12 col-md-6">
        <img src="{{ asset('Pictures/upFormWeb/' . $blog->blogImg) }}"
          style="height:100%;width:100%;object-fit:cover;border: 1px solid black;border-radius: 10px;">
      </div>
      <div class="col-sm-12 col-md-6 p-3" style="margin-top:auto;margin-bottom:auto;">
        <h5>
          {{ \Carbon\Carbon::parse($blog->ngayBlog)->format('F,d,Y') }}
        </h5><br>

        <h3>
          {{ $blog->header }}
        </h3>
        <div class="col d-flex flex-nowrap justify-content-center p-2">
          <div class="info-icon">i</div>
          <div class="info-icon">i</div>
          <div class="info-icon">i</div>
        </div>

        <p>
          {{ $blog->shortInfo }}
        </p>
      </div>
    </div>
  </div>
  <br>
  <div class="container text-start" style="border-radius: 10px;">
    @for ($i = 1; $i <= 5; $i++)
      <p class="fs-4" style="white-space: pre-wrap;">{{ $blog["deltailInfo$i"] }}</p>
      @if ($blog["blogDeltailImg$i"] !== null)
        <img class="mt-4 mb-4" src="{{ asset('Pictures/upFormWeb/' . $blog["blogDeltailImg$i"]) }}"
          style="height:100%;width:100%;object-fit:cover;border: 1px solid black;border-radius: 10px;">
      @endif
    @endfor
  </div>
  <br><br><br>

  @include('footer')
</body>

</html>
