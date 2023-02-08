@extends('header')

@section('title','Index')

@section('style')
 <style>
    .container{
        margin-block: 10% 10% !important;
    }

    .card{
        height: 300px;
        font-size: 50px;
    }
 </style>
@endsection

@section('content')
<div class="container text-center">
    <div class="card bg-warning">
        <div class="card-body my-5 mx-5">
          Find and Buy Your Groceries here!
        </div>
      </div>
  </div>
@endsection
