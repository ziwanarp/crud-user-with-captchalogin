@extends('template.main')
@section('content')

<div class="container">
    <div class="row col-lg-12">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 my-5">
            <div class="text-center">
                <h3>Update User</h3>
            </div>
            <form action="/user/{{ $user->id }}" method="post">
                @method('put')
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" >
                  @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" >
                  @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" >
                  @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" onkeyup='check()' minlength="5" name="password" required >
                  @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label class="form-label">Confrim Password</label>
                  <input type="password" class="form-control" id="confirm_password" onkeyup='check()' minlength="5" name="confirm_password" required>
                  <span class="mx-0 mt-2" id='message'></span>
                </div>
                    @csrf
                    <a class="btn btn-primary" href="/user">Kembali</a>
                      <button type="submit" id="submit" class="btn btn-danger">Update</button>
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