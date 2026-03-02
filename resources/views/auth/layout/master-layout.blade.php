<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Authentication</title>
    <link href="{{ asset('Assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Assets/css/AuthenticationStyle.css') }}">
</head>
<body>

    @yield('content')

    <script src="{{ asset('Assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
      // Success message hide after 10 seconds
      setTimeout(function () {
        let success = document.getElementById('successMessage');
        if (success) {
          success.style.display = 'none';
        }
      }, 5000);

      // Error message hide after 10 seconds
      setTimeout(function () {
        let error = document.getElementById('errorMessage');
        if (error) {
          error.style.display = 'none';
        }
      }, 5000);
    </script>
</body>
</html>
