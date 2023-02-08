@extends('header')

@section('title','Item Detail')


@section('content')

<div class="container ">
    @foreach ($details as $item)
    <div class="row">
        <div class="col-5 text-center my-5">
            <h3>{{ $item->item_name }}</h3>
            <img src="{{ url('storage/images/vegetable-icon.png') }}" class="img-fluid card-img-top" style="height: 15rem; width: 15rem;" alt="image">
        </div>
        <div class="col-7  my-5 ml-3">
            <h5 class="mt-5">Price : Rp{{ number_format($item->price, 2, ',', '.') }}</h5>
            <p class="my-4">{{ $item->item_desc }}</p>

            <form action="/addCart" method="POST">
                @csrf
                <input type="hidden" value="{{ Auth::user()->id }}" name="account_id">
                <input type="hidden" value="{{ $item->id }}" name="item_id">
                <input class="btn btn-warning col-3" type="submit" value="Buy">
            </form>

        </div>
    </div>
    @endforeach
</div>

@endsection
