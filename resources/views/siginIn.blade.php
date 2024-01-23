<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="Assets/Css/Login style/main.css" />
  <title>Login</title>

  {{-- Icon --}}
  <link rel="icon" href="{{asset('Assets/Img/apps-line.png')}}" type="image/x-icon">

  <!-- Bootrsrap Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/signinStyle.css" />

  {{-- Style --}}
  <link rel="stylesheet" href="{{asset('Assets/Css/signinStyle.css')}}">
</head>

<body>
  {{-- Sweet alert --}}
  @include('sweetalert::alert')
  <div class="wrapper container-fluid vh-100 overflow-hidden">
    <section class="login row">
      <div class="login-left content-left col-lg-7 h-100 d-none d-lg-block p-0">
      </div>
      <div class="login-right col-12 col-lg-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-8 border border-2 signin-box p-3 p-sm-5 rounded rounded-5">
            <div class="header">
              <div class="text-center">
                <h1 class="my-0 mt-lg-3">Sehat QTA</h1>
              </div>
              {{-- alert here --}}
              @if($errors->any()) {{-- handling jika ada eror --}}
              <div class="alert alert-danger m-2">
                <ul>
                  @foreach ($errors-> all() as $error )
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
            </div>
            <form action="" method="post">
              @csrf
              <div class="login-form d-flex flex-column gap-1 gap-lg-2 mt-2 mt-lg-4 mt-4">
                <label for="email">Email</label>
                <input name="email" class="form-control text-black" id="email" placeholder="Masukan email" />
                <div class="password-container">
                  <label for="password">Password</label>
                  <div class="pass-wrapper position-relative d-flex">
                    <input name="password" type="password" class="form-control text-black" id="password"
                      placeholder="Masukan password" />
                  </div>
                </div>
                <button class="btn btn-primary login-btn mt-1 mt-lg-2" type="submit">
                  Sign In
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- Boostrap Js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>