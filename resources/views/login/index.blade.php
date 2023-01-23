<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
</head>
<body>

<div class="container">
    <div class="row col-lg-12">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 my-5">
            <div class="text-center">
                <h3>Login User</h3>
                <p>Login, untuk masuk ke dalam aplikasi !</p>
                  @if (session()->has('error'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{ session('error') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif
                  @if (session()->has('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session('success') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif
            </div>
            <form action="/login" method="post">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                 <div class="captcha">
                    <span>{!! captcha_img('math') !!}</span>
                    <button type="button" class="btn btn-danger reload " id="reload">&#x21bb;</button>
                 </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control @error('captcha') is-invalid @enderror" id="captcha" name="captcha" placeholder="Masukan Captcha" required>
                    @error('captcha')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary mb-2">Login</button>
                <p>Belum punya akun ? <a href="/register" >Register Disini</a></p>
              </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>
    
</body>
<script>
    $('#reload').click(function(){
        $.ajax({
            type:'GET',
            url:'reload-captcha',
            success:function(data){
                $(".captcha span").html(data.captcha)
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</html>