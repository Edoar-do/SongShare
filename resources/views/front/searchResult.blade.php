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
                $('#example').DataTable(
                {
                    'scrollY' : 200,
                    'scrollCollapse' : true,
                    'processing' : true,                    
                });
            });

        </script>
@endsection

@section('corpo')
<div style='padding-top: 20px' class='container'>
    <div class='row'>
        <form class="navbar-form navbar-left" name="search" method="get" action="{{ route('searchResult') }}">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="searchInput" id="searchInput">
            </div>
            <button type="submit" onclick="event.preventDefault(); checkSearch()" class="btn btn-default"><span class='glyphicon glyphicon-search'aria-hidden="true"></span></button>
            <span class="invalid-input" id="invalid-search"></span>
        </form>
    </div>
</div>
<!-- Search Results -->
<div class="container">
    <div class="row">
        <div class="container">
            <header class="header-sezione">
            <h1>
                @lang('labels.searchResult')
            </h1>
        </header>
        </div>
        <div class="col-md-12">
            <table id="example" class="table table-striped table-hover table-responsive" style="width:100%">
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
                    @foreach($searchResult as $song)
                    <tr>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->author }}</td>
                        <td>{{ $song->feat }}</td>
                        <td name="likes{{$song->id}}">{{ $song->likes }}</td>
                        <td>
                            
                            
                            @auth
                            @if(FrontController::checkAlreadyLiked($song->id))
                            <a name="likeThen{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id;?>'; likeSong('then', songID);" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            <a name="dislikeThen{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id;?>'; dislikeSong('then', songID);" style="visibility: hidden" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-down"></span></a>
                            @else
                            <a name="likeElse{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id;?>'; likeSong('else', songID);" style="visibility: hidden" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                            <a name="dislikeElse{{$song->id}}" onclick="event.preventDefault(); songID = '<?php echo $song->id;?>'; dislikeSong('else', songID);" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-down"></span></a>
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