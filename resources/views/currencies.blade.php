@extends('layouts.app');

@section('title',$title);

@section('content')
    @if(!empty($currencies))
        <table class="table table-bordered" style="margin-top: 25px">
            <thead>
            <th class="text-center" scope="col">Id</th>
            <th class="text-center" scope="col">Title</th>
            <th class="text-center" scope="col">Rate</th>
            @can('currencies.show-change-button')
                <th class="text-center" scope="col">Change rate</th>
            @endcan
            </thead>
            <tbody>
            @foreach($currencies as $currency)
                <tr>
                    <td class="text-center">{{$currency['id']}}</td>
                    <td class="text-center"><a href="{{route('show-currency',['id'=>$currency['id']])}}">
                            {{$currency['name']}}
                        </a></td>
                    <td class="text-center">{{$currency['rate']}}</td>
                    @can('currencies.show-change-button')
                        @component('change-button',['currencyId'=>$currency['id']])
                        @endcomponent
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="row" style="margin-top: 25px;">
            <div class="col-md-3">
                <div class="alert alert-warning" role="alert">No currencies</div>
            </div>
        </div>
    @endif
@endsection