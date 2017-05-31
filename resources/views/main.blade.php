
<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')

  <body>
    <div class="container">
        @include('layouts.navbar')
        <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
          @yield('content')

        </div> <!-- /container -->
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    @yield('scripts')
  </body>
</html>
