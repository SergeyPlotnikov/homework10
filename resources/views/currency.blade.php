@extends('layouts.app');

@section('title',$title);

@section('content')
    <table class="table table-bordered" style="margin-top: 25px">
        <thead>
        <th class="text-center" scope="col">Id</th>
        <th class="text-center" scope="col">Title</th>
        <th class="text-center" scope="col">Rate</th>
        <th class="text-center" scope="col">Change rate</th>
        </thead>
        <tbody>
        <tr>
            <td class="text-center">{{$currency['id']}}</td>
            <td class="text-center">{{$currency['name']}}</td>
            <td class="text-center">{{$currency['rate']}}</td>
            @component('change-button',['currencyId'=>$currency['id']])
            @endcomponent
        </tr>
        </tbody>
    </table>
@endsection