@extends('header')

@section('title','Success')

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
          <h2>Success!</h2>
          <h5>We will contact you in 1x24 hours.</h5>
          <a href="/home" class="text-danger">Click here to go to 'Home'</a>
        </div>
      </div>
  </div>
@endsection
