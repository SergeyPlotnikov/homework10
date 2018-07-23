@extends('layouts.app')

@section('title',$title)

@section('content')

    <div class="row">
        <div class="col-md-2">
            <form role="form" method="post" action="{{route('service',['id'=>$id])}}">
                {!! method_field('put') !!}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="rate">Rate</label>
                    <input type="hidden" name="userId" value="{{$userId}}">
                    <input type="hidden" name='old_rate' value="{{$currency['rate']}}">
                    <input type="text" class="form-control" name="rate" id="rate"
                           value="{{old('rate')??$currency['rate']}}" placeholder="Enter rate">
                    @if($errors->has('rate'))
                        <div style="margin-top: 10px" class="alert alert-danger" role="alert">
                            {{$errors->first('rate')}}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>
@endsection