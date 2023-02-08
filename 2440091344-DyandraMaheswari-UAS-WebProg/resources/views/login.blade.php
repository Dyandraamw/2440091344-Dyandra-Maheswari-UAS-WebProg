@extends('header')

@section('title','Register')


@section('content')

<div class=" height-full d-flex flex-column align-items-center mb-0">
    @if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h2 class="mt-5 text-black">Login</h2>

    <form class="m-5 col-5"  action="/login" method="POST">
        @csrf
        <div class="mb-3 text-black">
          <label for="email" class="form-label ">Email</label>
          <input type="email" class="form-control bg-light border-1 " id="email" name="email"  placeholder="Enter your email" >
        </div>

        <div class="mb-3 text-black">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control bg-light border-1" id="password" name="password" placeholder="Enter your password">
        </div>

        <input type="submit" class="btn mt-4  col-12 btn-warning " value="Login">


      </form>

</div>
@endsection
