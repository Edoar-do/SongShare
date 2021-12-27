@extends('layouts.master')

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('corpo')
<form action="TODO" method="POST"> <!-- TO DO -->
    <div class="form-group">
        <label for="email"><br>E-mail:</label>
        <input type="email" class="form-control" id="email" placeholder="name@example.com">
        <span class="invalid-input" id="invalid-email"></span>
    </div>
    <div class="form-group">
        <label for="text-area"><br>{{ trans('labels.howToImprove') }}</label>
        <textarea class="form-control" id="text-area" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" onclick="event.preventDefault(); checkEmail()">Submit</button>
</form>
@endsection