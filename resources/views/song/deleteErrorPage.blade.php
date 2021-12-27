@extends('layouts.delete')

@section('titolo', 'Delete song from the list')

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    {{ trans('labels.deleteSongMsgFirstPart') }} {{ trans('labels.deleteSongMsgLastPart') }}
                </h1>
            </header>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class='panel-heading'>
                    {{ trans('labels.illegalPageAccessTitle') }}
                </div>
                <div class='panel-body'>
                    <p>{{ trans('labels.illegalPageAccessMsgFirstPart') }} <strong>{{ trans('labels.illegalPageAccessMsgStrongPart') }}</strong> {{ trans('labels.illegalPageAccessMsgLastPart') }}</p>
                    <p><a class="btn btn-default" href="{{ route('song.index') }}"><span class='glyphicon glyphicon-log-out'></span> {{ trans('labels.backSongList') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection