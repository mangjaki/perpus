
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
        
        <link href="{{ url('css2/bootstrap.min.css') }}" rel="stylesheet">

        <link href="{{ url('css2/bootstrap-icons.css') }}" rel="stylesheet">

        <link href="{{ url('css2/tooplate-kool-form-pack.css') }}" rel="stylesheet">
    </head>
    
    <body>

        <main>

            <header class="site-header">
                <div class="container">
                    <div class="row justify-content-between">

                        <div class="col-lg-12 col-12 d-flex">
                            <ul class="social-icon d-flex justify-content-center align-items-center mx-auto">
                                <h3 class="text-white me-4 d-none d-lg-block">> Silakan Login <</h3>
                            </ul>
                        </div>

                    </div>
                </div>
            </header>
            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-5 col-12 mx-auto">
                            <form class="custom-form login-form" role="form" method="POST" action="{{ route('login') }}">
                              @csrf
                              <h2 class="hero-title text-center mb-4 pb-2">>> Form Login <<</h2>

                                <div class="form-floating mb-4 p-0">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>

                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating p-0">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

                                    <label for="password">Password</label>
                                </div>

                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-5 col-12">
                                        <button type="submit" class="form-control">Login</button>
                                    </div>
                                </div> </br>
                                <div class="row justify-content-center align-items-center">
                                  <div class="col-lg-12 col-12 text-center">
                                    <span>Belum Memiliki Akun ?klik Register di bawah </span>
                                  </div>
                                  <div class="col-lg-6 col-12 text-center">
                                    <a href="{{ route('register') }}" class="btn custom-btn custom-border-btn">Register</a>
                                  </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <div class="video-wrap">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="">
                        <source src="{{ url('videos2/video.mp4') }}" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>
            </section>
        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="{{ url('js/jquery.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('js/countdown.js') }}"></script>
        <script src="{{ url('js/init.js') }}"></script>

    </body>
</html>
