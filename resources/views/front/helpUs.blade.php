@extends('layouts.master')

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('corpo')
<form action="{{route('helpUsForm')}}" method="GET" name='helpUsForm'>
    <div class="form-group">
        <header class='header-sezione'><label id='labelMail' for="text-area"><br>{{ ucwords(Auth::user()->name) }} {{ trans('labels.howToImprove') }}</label></header>
        <textarea class="form-control" id="text-area" name='text-area' rows="5" style="resize: none"}></textarea>
        <span class="invalid-input" id="invalid-text"></span>
    </div>    
    <button type="submit" class="btn btn-primary" onclick="event.preventDefault(); checkBeforeSending()"><span style='padding-right: 10px' class='glyphicon glyphicon-send'></span><b>@lang('labels.send')</b></button>
    @if($message === 'Mail sent successfully')
    <button class='btn btn-success' style='pointer-events: none'><span style='padding-right: 10px'  class='glyphicon glyphicon-ok-sign'></span><b>{{ $message }}</b></button>
    @elseif($message === 'Mail sending failed')
    <button class='btn btn-danger' style='pointer-events: none'><span style='padding-right: 10px'  class='glyphicon glyphicon-remove-sign'></span><b>{{ $message }}</b></button>
    @elseif($message === 'Something went wrong...')
    <button class='btn btn-warning' style='pointer-events: none'><span style='padding-right: 10px'  class='glyphicon glyphicon-question-sign'></span><b>{{ $message }}</b></button>
    @endif
</form>
@endsection