<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row col-lg-12">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 my-5">
            <div class="text-center">
                <h3>Register User</h3>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
            </div>
            <form action="/register" method="post">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" minlength="5"  id="name" required>
                  @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" minlength="5"  id="username" required>
                  @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" required>
                  @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control  @error('password') is-invalid @enderror" onkeyup='check()' id="password" name="password" minlength="5" required>
                  @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" onkeyup='check()' name="password" minlength="5" required>
                  <span class="mx-0 mt-2" id='message'></span>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Register</button>
                <p>Sudah punya akun ? <a href="/" >Login Disini</a></p>
              </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>
    
</body>
<script>

  var check = function() {
if (document.getElementById('password').value ==
  document.getElementById('confirm_password').value) {
  document.getElementById('message').style.color = 'green';
  document.getElementById('message').innerHTML = '✓ Password Match';
  document.getElementById('submit').disabled = false;
} else {
  document.getElementById('message').style.color = 'red';
  document.getElementById('message').innerHTML = 'Password Not Match';
  document.getElementById('submit').disabled = true;
}
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</html>