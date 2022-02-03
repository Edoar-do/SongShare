@extends('layouts.master')

@php
use SongShare\Http\Controllers\FrontController;
@endphp

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('datatable')
<script type="text/javascript" class="init">

    $(document).ready(function () {
        $('table').DataTable(
                {
                    'scrollY': 200,
                    'scrollCollapse': true,
                    'info': false,
                    'processing': true,
                    'paging': false

                });
    });

</script>
@endsection

@section('corpo')

<div class='container'>
    <div class='row'>
        <form class="navbar-form navbar-left" name="search" method="get" action="{{ route('searchResult') }}">
            <label  for="searchInput" id='searchLabel'>{{ trans('labels.searchInput') }}</label>
            <div class="form-group" >            
                <input type="text" class="form-control" placeholder="Search" name="searchInput" id="searchInput">
            </div>
            <button  type="submit" class="btn btn-default" onclick="event.preventDefault(); checkSearch()"><span class='glyphicon glyphicon-search'aria-hidden="true"></span></button>
            <span class="invalid-input" id="invalid-search"></span>
        </form>
    </div>
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
                        <td name="likes{{$song->id}}">{{ $song->likes }}</td>
                        <td>


                            @auth
                            @if(FrontController::checkAlreadyLiked($song->id))
                            <a name="likeThen{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id; ?>'; likeSong('then', songID);" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            <a name="dislikeThen{{$song->id}}" onclick="event.preventDefault(); sondID = '<?php echo $song->id; ?>'; dislikeSong('then', songID);" style="visibility: hidden" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                            @else
                            <a name="likeElse{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id; ?>'; likeSong('else', songID);" style="visibility: hidden" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            <a name="dislikeElse{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id; ?>'; dislikeSong('else', songID);" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-down"></span></a>                            
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
                        <td name="likes{{$song->id}}">{{ $song->likes }}</td>
                        <td>


                            @auth
                            @if(FrontController::checkAlreadyLiked($song->id))
                            <a name="likeThen{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id; ?>'; likeSong('then', songID);" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            <a name="dislikeThen{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id; ?>'; dislikeSong('then', songID);" style="visibility: hidden" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                            @else
                            <a name="likeElse{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id; ?>'; likeSong('else', songID);" style="visibility: hidden" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            <a name="dislikeElse{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id; ?>'; dislikeSong('else', songID);" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-down"></span></a>
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