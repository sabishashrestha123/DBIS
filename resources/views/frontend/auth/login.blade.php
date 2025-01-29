@extends('frontend.layouts.master')
@section('content')

<div class="login-container">
    <h3>Student Login</h3>
    <form>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter your username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter your password">
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="#" class="text-center">Forgot password?</a>
        </div>
        <a href="{{ route('studentregister') }}" class="text-center">Registration ?</a>
    </form>



</div>




@endsection
