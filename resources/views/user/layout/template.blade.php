<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   @include('layout.css')

   @stack('css')

    <title>Parawisata</title>
  </head>
  <body>
    @include('user.layout.navbar')

    <div class="container">
        @yield('content')

        <!-- row populer -->

    </div>
    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <hr class="featurette-divider">
            <p class="float-right"><a href="#">Back to top</a></p>
            <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </div>
    </footer>

    @include('layout.js')

    @stack('js')
</body>
</html>