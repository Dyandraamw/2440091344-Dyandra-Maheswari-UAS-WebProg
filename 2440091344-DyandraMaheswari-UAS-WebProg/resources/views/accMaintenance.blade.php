@extends('header')

@section('title','Account Maintenance')


@section('content')
<div class=" height-full d-flex flex-column align-items-center mb-0">
    <h2 class="mt-5 text-black">{{ __('Account Maintenance') }}</h2>
</div>

<div class=" height-full d-flex flex-column align-items-center justify-items-center ">
    <table class="table">
        <thead>
          <tr class="text-center ">
            <th scope="col">{{ __('Account') }}</th>
            <th scope="col">{{ __('Action') }}</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="text-center ">
                    <td><h6 class="mt-3">{{  $item->first_name }} {{  $item->last_name }} - {{  $item->role_name }}</h6></td>
                    <td><a href="/showRole/{{ $item->accid }}" class="btn btn-warning mt-1 mx-1">Update Role</a><a href="/deleteAcc/{{ $item->accid }}" class="btn btn-danger mt-1 mx-1">{{ __('Delete') }}</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection
