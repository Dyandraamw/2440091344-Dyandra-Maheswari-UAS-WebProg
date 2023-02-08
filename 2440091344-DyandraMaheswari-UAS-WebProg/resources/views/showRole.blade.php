@extends('header')

@section('title','Acc Role')

@section('content')
<div class=" height-full d-flex flex-column align-items-center mb-0">

    <h2 class="mt-5 text-black">Edit Role</h2>


    @foreach ($data as $item)
        <h4 class="my-5 text-success">{{ $item->first_name }} {{ $item->last_name }}</h4>
        <form action="/editRole" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $item->accid }}">


            @include('editRole')

        </form>
    @endforeach
</div>

@endsection
