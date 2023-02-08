@extends('header')

@section('title','Home')


@section('content')
<div class=" height-full d-flex flex-column align-items-center mb-0">
    <h2 class="mt-5 text-black">Home</h2>
</div>

<div class="flex-wrap d-flex justify-content-center mt-2 ">
    @foreach ($items as $item)
    <div class="card mx-5 mb-2  text-center border-0 text-black" style="width: 15rem; height: 20rem;">
        <img src="{{ url('storage/images/vegetable-icon.png') }}" class="img-fluid card-img-top" style="height: 10rem;" alt="image">
        <div class="card-body ">
          <h5 class="card-title ">{{ $item->item_name }}</h5>
          <a href="itemDetail/{{ $item->id }}" class="btn btn-success">Detail</a>
        </div>
    </div>
    @endforeach
</div>

<div class="pagination d-flex justify-content-center">
    {{ $items->links() }}
</div>

@endsection
