@extends('header')

@section('title','Cart')


@section('content')
<div class=" height-full d-flex flex-column align-items-center mb-0">
    <h2 class="mt-5 text-black">{{ __('Cart') }}</h2>
</div>

<div class=" height-full d-flex flex-column align-items-center justify-items-centercol-8">
    <table class="table table-borderless">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
                <tr class="text-center ">
                    <td><img src="{{ url('storage/images/vegetable-icon.png') }}" class="img-fluid card-img-top " style="height: 6rem; width:6rem;" alt="image"></td>
                    <td><h6 class="mt-3">{{  $item->item_name }}</h6></td>
                    <td><h6 class="mt-3">Price : Rp{{ number_format($item->price, 2, ',', '.') }}</h6></td>
                    <td><a href="/deleteCart/{{ $item->cid }}" class="btn btn-danger mt-1">{{ __('Delete') }}</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

<div class=" height-full d-flex flex-column align-items-center mb-0">
    <h3 class="mt-5 mb-2 text-black">{{ __('Total Price') }} : Rp{{ number_format($total, 2, ',', '.') }}</h2>
    <form action="/addOrder" method="POST">
        @csrf
        <input class="btn btn-warning" type="submit" value="Checkout">
    </form>
</div>

@endsection
