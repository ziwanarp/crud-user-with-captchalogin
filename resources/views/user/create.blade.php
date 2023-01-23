@extends('template.main')
@section('content')

<div class="container">
    <div class="row col-lg-12">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 my-5">
            <div class="text-center">
                <h3>Tambah User</h3>
            </div>
            <form action="/user" method="post">
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
                <a class="btn btn-primary" href="/user">Kembali</a>
                <button type="submit" class="btn btn-danger">Tambah</button>
              </form>
        </div>
        <div class="col-lg-3">
        </div>
    </div>
</div>
    
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
@endsection