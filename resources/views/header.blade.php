<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    .header {
      position: fixed;
      background-color: rgba(130, 174, 158, 0.1);
      font-size: large;
      height: 75px;
      width: 100%;
      color: rgb(32, 32, 32);
      font-weight: bold;
      transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
      z-index: 10;
      padding: 0;
      margin: 0;
    }

    .icon {
      font-size: 25px;
    }

    .sticky {
      border-bottom: 1px solid black;
      background: rgba(130, 174, 158, 0.8);
      color: #f1f1f1;
    }

    .list {
      padding: 0;
      margin: 0;
      text-decoration: none;
      color: inherit;
      transition: box-shadow 0.3s ease-in-out;
    }

    .list:hover {
      color: inherit;
      box-shadow: inset 0 -2px 0 0;
    }

    button {
      padding: 0;
      margin: 0;
      border: none;
      background: none;
      font-weight: bold;
    }

    button .sub-menu {
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.5s ease, left 0.5s ease;
      left: -33%;
      top: 0;
    }

    button:hover .sub-menu {
      opacity: 1;
      visibility: visible;
      left: 0;
      transition-delay: 0.2s;
    }

    #sub {
      color: white;
    }

    .sub-menu {
      position: fixed;
      padding: 2px;
      width: 35%;
      height: 100%;
      display: flex;
      flex-direction: column;
      text-align: left;
      opacity: 0;
      visibility: hidden;
      background-color: rgb(130, 174, 158);
      line-height: 5;
      border-right: 1px solid black;
    }

    #Brand {
      text-align: center;
      font-size: x-large;
      text-decoration: none;
      color: inherit;
      padding: 0;
      margin: 0;
    }

    @media screen and (max-width: 768px) {

      .list,
      #Brand {
        font-size: 15px;
      }
    }
  </style>
</head>

<div class="header justify-content-between align-items-center" id="pageHeader">

  <script type="text/javascript">
    window.onscroll = function() {
      myFunction()
    };

    var header = document.getElementById("pageHeader");

    var sticky = header.offsetTop;

    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
  </script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <div class="row d-flex align-items-center" style="height:100%;">
    <div class="col text-start">
      <button class="list" style="padding-left: 20px;"> Features
        <div class="sub-menu">
          <a class="list" id="sub" href="{{ route('menu') }}">Menu</a>
          <a class="list" id="sub" href="{{ route('resevation') }}">Resevations</a>
          <a class="list" id="sub" href="{{ route('blogNews') }}">Blog / News</a>
          <a class="list" id="sub" href="{{ route('contact') }}">Liên hệ</a>
          <a class="list" id="sub" href="{{ route('onlineStore') }}">Online Store</a>
        </div>
      </button>
    </div>
    <div class="col text-center">
      <a id="Brand" href="{{ url('/') }}">Truyền Thống Việt</a>
    </div>
    <div class="col text-end">
      @if (Route::has('login') || Route::has('admin.login'))
        @auth
          <a class="list m-3" href="{{ route('profile') }}">{{ $name }}</a>
        @else
          <a class="list m-3" href="{{ route('login') }}">Login</a>
        @endauth
      @endif
    </div>
  </div>

</div>

</html>
