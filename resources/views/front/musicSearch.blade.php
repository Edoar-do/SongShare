@extends('layouts.master')

@php
use SongShare\Http\Controllers\FrontController;
@endphp

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('corpo')
<div class='container'>
    <form class="navbar-form navbar-left" method="get" action="{{ route('searchResult') }}">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search" name="search" id="search">
        </div>
        <button type="submit" class="btn btn-default" onclick="event.preventDefault(); checkSearch()"><span class='glyphicon glyphicon-search'aria-hidden="true"></span></button>
        <span class="invalid-input" id="invalid-search"></span>
    </form>
</div>
<!-- Most liked songs -->
<div class="container">
    <div class="row">
        <div class="container">
            <header class="header-sezione">
                <h1>@lang('labels.mostLikedSongs')  <span class='glyphicon glyphicon-heart'></span></h1>
            </header>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" style="width:100%">
                <col width='20%'> <!-- title -->
                <col width='20%'> <!-- author -->
                <col width='40%'> <!-- feat -->
                <col width='10%'> <!-- likes -->
                <col width='10%'> <!-- like button -->
                <thead>
                    <tr>
                        <th>{{ trans('labels.songTitle') }}</th>
                        <th>{{ trans('labels.songAuthor') }}</th>
                        <th>{{ trans('labels.songFeat') }}</th>
                        <th>{{ trans('labels.songLikes') }}</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($mostLikedSongs as $song)
                    <tr>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->author }}</td>
                        <td>{{ $song->feat }}</td>
                        <td>{{ $song->likes }}</td>
                        <td>
                            @auth
                                @if(FrontController::checkAlreadyLiked($song->id))
                                <a class="btn btn-primary" href="{{ route('song.likeOrDislike', ['id' => $song->id, 'up_down' => true]) }}"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                                @else
                                <a class="btn btn-info" href="{{ route('song.likeOrDislike', ['id' => $song->id, 'up_down' => false]) }}"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                                @endif
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Most recent songs -->

    <div class="row">
        <div class="container">
            <header class="header-sezione">
                <h1>@lang('labels.mostRecentSongs') <span class='glyphicon glyphicon-time'></span></h1>
            </header>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" style="width:100%">
                <col width='20%'> <!-- title -->
                <col width='20%'> <!-- author -->
                <col width='40%'> <!-- feat -->
                <col width='10%'> <!-- likes -->
                <col width='10%'> <!-- like button -->
                <thead>
                    <tr>
                        <th>{{ trans('labels.songTitle') }}</th>
                        <th>{{ trans('labels.songAuthor') }}</th>
                        <th>{{ trans('labels.songFeat') }}</th>
                        <th>{{ trans('labels.songLikes') }}</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($mostRecentSongs as $song)
                    <tr>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->author }}</td>
                        <td>{{ $song->feat }}</td>
                        <td>{{ $song->likes }}</td>
                        <td>
                            @auth
                                @if(FrontController::checkAlreadyLiked($song->id))
                                <a class="btn btn-primary" href="{{ route('song.likeOrDislike', ['id' => $song->id, 'up_down' => true]) }}"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                                @else
                                <a class="btn btn-info" href="{{ route('song.likeOrDislike', ['id' => $song->id, 'up_down' => false]) }}"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                                @endif
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection