@extends('main.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-lg-5" style="background-color: #ffff;">

  @if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @if(session()->has('warning'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ $session('warning') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center mt-3">Registration Form</h1>
      <form action="/register" method="post">
        @csrf
        <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> klo mw pake logo taro sini imagenya -->
        
        <div class="form-floating">
          <input type="text" name="username" class="form-control rounded-top @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username') 
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Address" required value="{{ old('address') }}">
          <label for="address">Address</label>
          @error('address') 
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
          <label for="email">Email address</label>
          @error('email') 
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
          @error('password') 
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" name="confirm-password" class="form-control rounded-bottom @error('confirm-password') is-invalid @enderror" id="confirm-password" placeholder="Confirm-password" required>
          <label for="confirm-Password">Confirm Password</label>
          @error('confirm-password') 
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
    
        <!-- <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register Now</button>
      </form>
      <small class="d-block text-center mt-3 mb-3">Already have account? <a href="/login">Login</a></small>
    </main>
    
  </div>
</div>

@endsection