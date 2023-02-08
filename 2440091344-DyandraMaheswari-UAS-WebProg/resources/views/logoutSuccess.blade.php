@extends('header')

@section('title','Index')

@section('style')
 <style>
    .container{
        margin-block: 10% 10% !important;
    }

    .card{
        height: 300px;
    }
 </style>
@endsection

@section('content')
<div class="container text-center">
    <div class="card bg-warning">
        <div class="card-body my-5 mx-5">
            <h2>Log Out Success!</h2>
            <a href="/" class="text-danger">Click here to go to 'Index'</a>

        </div>
      </div>
  </div>
@endsection
