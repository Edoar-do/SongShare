@extends('layouts.master')

@section('titolo')
@if(isset($song->id))
    {{ trans('labels.editSong') }}
@else
    {{ trans('labels.addSong') }}
@endif
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class='col-md-12'>
            @if(isset($song->id))
                <header class='header-sezione'><h2> @lang('labels.editSongForm')</h2></header>
                <form class="form-horizontal" name="song"  method="get" action="{{ route('song.update', ['id' => $song->id]) }}">
            @else
                <header class='header-sezione'><h2> @lang('labels.addSongForm')</h2></header>
                <form class="form-horizontal" name="song" method="post" action="{{ route('song.store') }}">
            @endif
                @csrf
                <!-- titolo -->
                <div class="form-group" style='padding-top: 10px'>
                    <label for="title" class="col-md-2">{{ trans('labels.songTitle') }}</label>
                    <div class="col-sm-10">
                        @if(isset($song->id))
                        <input class="form-control" type="text" id="title" name="title" placeholder="{{ trans('labels.songTitle') }}" value="{{ $song->title }}">
                        @else
                        <input class="form-control" type="text" id="title" name="title" placeholder="{{ trans('labels.songTitle') }}">
                        @endif
                        <span class="invalid-input" id="invalid-title"></span>
                    </div>
                </div>
                
                <!-- autore -->
                <div class="form-group">
                    <label for="title" class="col-md-2">{{ trans('labels.songAuthor') }}</label>
                    <div class="col-sm-10">
                        @if(isset($song->id))
                        <input class="form-control" type="text" id="author" name="author" placeholder="{{ trans('labels.songAuthor') }}" value="{{ $song->author }}">
                        @else
                        <input class="form-control" type="text" id="author" name="author" placeholder="{{ trans('labels.songAuthor') }}">
                        @endif
                        <span class="invalid-input" id="invalid-author"></span>
                    </div>
                </div>
                
                <!-- feat -->
                <div class="form-group">
                    <label for="title" class="col-md-2">{{ trans('labels.songFeat') }}</label>
                    <div class="col-sm-10">
                        @if(isset($song->id))
                        <input class="form-control" type="text" id="feat" name="feat" placeholder="{{ trans('labels.songFeat') }}" value="{{ $song->feat }}">
                        @else
                        <input class="form-control" type="text" id="feat" name="feat" placeholder="{{ trans('labels.songFeat') }}">
                        @endif
                        <span class="invalid-input" id="invalid-feat"></span>
                    </div>
                </div>
                
                <!-- genere -->
                <div class="form-group">
                    <label for="title" class="col-md-2">{{ trans('labels.songGenre') }}</label>
                    <div class="col-sm-10">
                        @if(isset($song->id))
                        <input class="form-control" type="text" id="genre" name="genre" placeholder="{{ trans('labels.songGenre') }}" value="{{ $song->genre }}">
                        @else
                        <input class="form-control" type="text" id="genre" name="genre" placeholder="{{ trans('labels.songGenre') }}">
                        @endif
                        <span class="invalid-input" id="invalid-genre"></span>
                    </div>
                </div>                
                
                <!-- bottoni salvataggio e annullamento -->
                
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        @if(isset($song->id))
                        <input type="hidden" name="id" value="{{ $song->id }}"/>
                        <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> {{ trans('labels.save') }}</label>
                        <input id="mySubmit" type="submit" value="Save" class="hidden" onclick="event.preventDefault(); checkSong('Save')"/>
                        @else
                        <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> {{ trans('labels.create') }}</label>
                        <input id="mySubmit" type="submit" value="Create" class="hidden" onclick="event.preventDefault(); checkSong('Create')"/>
                        @endif
                        <span class="invalid-input" id="existingSong"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <a href="{{ route('song.index') }}" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> {{ trans('labels.cancel') }}</a>                         
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection