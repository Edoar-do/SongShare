@extends('layouts.delete')

@section('titolo', 'Delete song from the list')

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    {{ trans('labels.deleteSongMsgFirstPart') }} "{{ $song->title }}" {{ trans('labels.deleteSongMsgLastPart') }}
                </h1>
            </header>
            <p class='lead'>
                {{ trans('labels.confirmDeletionrMsg') }}
            </p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    {{ trans('labels.revert') }}
                </div>
                <div class='panel-body'>
                    <p>{{ trans('labels.deleteSongRevertMsgFirstPart') }} <strong>{{ trans('labels.deleteSongRevertMsgStrongPart') }}</strong> {{ trans('labels.deleteSongRevertMsgLastPart') }}</p>
                    <p><a class="btn btn-default" href="{{ route('song.index') }}"><span class='glyphicon glyphicon-log-out'></span> {{ trans('labels.backSongList') }}</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    {{ trans('labels.confirm') }}
                </div>
                <div class='panel-body'>
                    <p>{{ trans('labels.deleteSongConfirmMsgFirstPart') }} <strong>{{ trans('labels.deleteSongConfirmMsgStrongPart') }}</strong> {{ trans('labels.deleteSongConfirmMsgLastPart') }}</p>
                    <p><a class="btn btn-danger" href="{{ route('song.destroy', ['id' => $song->id]) }}"><span class='glyphicon glyphicon-trash'></span> {{ trans('labels.delete') }}</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection