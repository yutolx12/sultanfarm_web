<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Landing Page | Sultan Farm</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('landing/assets/favicon.ico') }}">
  <!-- Bootstrap icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet">
  <!-- Core theme CSS (includes Bootstrap) -->
  <link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet">
</head>

<body style="background-color: #E5FAF8;">
  <div class="container mt-2">
    <div class="container text-center">
      <div class="row align-items-start">
        <div class="col">
          <div class="product-cards-container">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                  <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="assets/images/logo/login.jpg" alt="login form" class="img-fluid"
                          style="border-radius: 1rem 0 0 1rem; height: 100%;">
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                          @if (session('error'))
                          <div class="alert alert-danger" id="alert" role="alert">
                            {{ session('error') }}
                          </div>
                          @endif
                          <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                              @csrf

                              <div class="row mb-3">
                                <div class="col-md-12">
                                  <div class="d-flex align-items-center  text-center">
                                    <img src="assets/images/logo/logo_sultan.png" style="width: 250px; height: 100%"
                                      alt="Logo" srcset="">
                                  </div>
                                </div>
                              </div>
                              <p class="text-center" style="color: #212E30; font-weight: 700; text-align: center">Silahkan Masuk</p>
                              <div class="row mb-3">
                                <div class="col-md-12-start">
                                  <p class="text-lg-start" style="color: #3B484A">E-mail</p>
                                </div>
                                <div class="col-md-12">
                                  <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                  @error('email')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col-md-12">
                                  <p class="text-lg-start" style="color: #3B484A">Password</p>                                </div>
                                <div class="col-md-12">
                                  <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                  @error('password')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                              </div>

                              <div class="row mb-0">
                                <div class="col-md">
                                  <button type="submit"  style="background-color: #228896; color: white;" class="btn btn-pill px-5 mb-2 mb-lg-0">
                                    <span class="d-flex align-items-center"></span>
                                    </span>{{ __('Login') }}</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('landing/js/scripts.js') }}"></script>
  <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
<style>
  .form-label {
    font-weight: bold;
    margin-bottom: 5px;
  }
</style>