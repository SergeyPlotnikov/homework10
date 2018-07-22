@extends('layouts.app')

@section('title',$title)

@section('content')
    <div class="row">
        <div class="col-md-5">
            <form role="form" method="post" action="{{route('store-currency')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="titleCurrency">Title currency</label>
                    <input type="text" class="form-control" name="name" id="titleCurrency"
                           value="{{old('name')}}" placeholder="Enter title">
                    @if($errors->has('name'))
                        <div style="margin-top: 10px" class="alert alert-danger" role="alert">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="text" class="form-control" name="rate" id="rate"
                           value="{{old('rate')}}" placeholder="Enter the rate">
                    @if($errors->has('rate'))
                        <div style="margin-top: 10px" class="alert alert-danger" role="alert">
                            {{$errors->first('rate')}}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection