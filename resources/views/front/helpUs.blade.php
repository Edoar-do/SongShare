@extends('layouts.master')

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('corpo')
<form action="{{route('helpUsForm')}}" method="GET" name='helpUsForm'>
    <div class="form-group">
        <label for="text-area"><br>{{ Auth::user()->name }} {{ trans('labels.howToImprove') }}</label>
        <textarea class="form-control" id="text-area" name='text-area' rows="5"></textarea>
        <span class="invalid-input" id="invalid-text"></span>
    </div>    
    <button type="submit" class="btn btn-primary" onclick="event.preventDefault(); checkBeforeSending()">Submit</button>
    
</form>
@endsection