@extends('header')

@section('title','Profile')

@section('content')
<div class=" height-full d-flex flex-column align-items-center mb-0">

    <h2 class="mt-5 text-black">{{ __('Edit Profile') }}</h2>


    @foreach ($account as $item)
        <div class="card m-3  text-black" style="width: 10rem; height: 10rem;">
            <img src="{{ url('storage/'.$item->display_picture_link) }}" class="img-fluid card-img-top" style="height: 10rem;width: 10rem;" alt="image">
        </div>
        <form action="editProfile" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item->id }}">


            @include('editProfile')

        </form>
    @endforeach
</div>

@endsection
