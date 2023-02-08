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

    <h2 class="mt-5 text-black">{{ __('Register') }}</h2>

    <form class="m-5 col-5"  action="/register" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 text-black">
            <label for="first_name" class="form-label">{{ __('First Name') }}</label>
            <input type="text" class="form-control bg-light border-1"  id="first_name" name="first_name" placeholder="Enter your first name" >
          </div>

        <div class="mb-3 text-black">
            <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
            <input type="text" class="form-control bg-light border-1"  id="last_name" name="last_name" placeholder="Enter your last name" >
        </div>

        <div class="mb-3 text-black">
          <label for="email" class="form-label ">Email</label>
          <input type="email" class="form-control bg-light border-1 " id="email" name="email"  placeholder="Enter your email" >
        </div>

        <div class="mb-3 text-black">
            <label for="role_id" class="form-label ">{{ __('Role') }}</label>
            <select class="form-select bg-light border-1"  id="role_id" name="role_id">
                <option selected>Select your role</option>
                @foreach ($roles as $item)
                    <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3 text-black">
            <label for="gender_id" class="form-label ">{{ __('Gender') }}</label>
            <select class="form-select bg-light border-1"  id="gender_id" name="gender_id">
                <option selected>Select your gender</option>
                @foreach ($genders as $item)
                    <option value="{{ $item->id }}">{{ $item->gender_desc }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3 text-black">
            <label for="display_picture_link" class="form-label ">{{ __('Display Picture') }}</label>
            <input class="form-control bg-light border-1" type="file" id="display_picture_link" aria-describedby="display_picture_link" name="display_picture_link">

        </div>

        <div class="mb-3 text-black">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control bg-light border-1" id="password" name="password" placeholder="Enter your password">
        </div>

        <div class="mb-3 text-black">
            <label for="confirm" class="form-label">{{ __('Confirm Password') }}</label>

             <input  type="password" class="form-control bg-light border-1 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="Confirm your password" id="password">
        </div>

        <input type="submit" class="btn mt-4  col-12 btn-warning " value="Register">


      </form>

</div>
@endsection
