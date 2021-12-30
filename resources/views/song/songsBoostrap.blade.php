@extends('layouts.master')

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('datatable')
<script type="text/javascript" class="init">

            $(document).ready(function () {
                $('#userSongsTable').DataTable(
                {
                    'scrollY' : 200,
                    'scrollCollapse' : true, 
                    'processing' : true
                    
                });
                
                $('#user3MostLikedSongsTable').DataTable({
                    'scrollY' : 200,
                    'scrollCollapse' : true,
                    'paging': false,
                    'info' : false,
                    'searching' : false,
                    'processing' : true
                });
            });

        </script>
@endsection

@section('corpo')
<div class="container">
    <div class="row">
        <div class="col-md-offset-10 col-xs-6">
            <p>
                <br><a class="btn btn-success" href="{{ route('song.create') }}"><span class="glyphicon glyphicon-plus"></span> {{ trans('labels.createNewSong') }}</a>
            </p>
        </div>
    </div>
</div>
<div class="container">
    <header class="header-sezione">
        <h1>@lang('labels.mySongs') <span class='glyphicon glyphicon-music'></span></h1>
    </header>
    <div class="row">
        <div class="col-md-12">

            <table id="userSongsTable" class="table table-striped table-hover table-responsive" style="width:100%">
                <col width='15%'> <!-- titolo -->
                <col width='15%'> <!-- autore -->
                <col width='30%'> <!-- feat -->
                <col width='15%'> <!-- genere -->
                <col width='5%'> <!-- likes -->
                <col width='10%'> <!-- delete -->
                <col width='10%'> <!-- edit -->
                <thead>
                    <tr>
                        <th>{{ trans('labels.songTitle') }}</th>
                        <th>{{ trans('labels.songAuthor') }}</th>
                        <th>{{ trans('labels.songFeat') }}</th>
                        <th>{{ trans('labels.songGenre') }}</th>
                        <th>{{ trans('labels.songLikes') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($songList as $song)
                    <tr>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->author }}</td>
                        <td>{{ $song->feat }}</td>
                        <td>{{ $song->genre }}</td>
                        <td>{{ $song->likes }}</td>                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('song.edit', ['song' => $song->id]) }}"><span class="glyphicon glyphicon-pencil"></span> {{ trans('labels.edit') }}</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('song.destroy.confirm', ['id' => $song->id]) }}"><span class="glyphicon glyphicon-trash"></span> {{ trans('labels.delete') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- STATISTICHE -->


    <header class="header-sezione">
        <h1>@lang('labels.stats')   <span class='glyphicon glyphicon-signal'></span></h1>
    </header>
    <h2> @lang('labels.threeMostLikedSongs') </h2>
    <div class="row">
        <div class="col-md-12">

            <table id='user3MostLikedSongsTable' class="table table-striped table-hover table-responsive" style="width:100%">
                <col width='15%'> <!-- titolo -->
                <col width='15%'> <!-- autore -->
                <col width='30%'> <!-- feat -->
                <col width='15%'> <!-- genere -->
                <col width='5%'> <!-- likes -->
                <col width='10%'> <!-- delete -->
                <col width='10%'> <!-- edit -->
                <thead>
                    <tr>
                        <th>{{ trans('labels.songTitle') }}</th>
                        <th>{{ trans('labels.songAuthor') }}</th>
                        <th>{{ trans('labels.songFeat') }}</th>
                        <th>{{ trans('labels.songGenre') }}</th>
                        <th>{{ trans('labels.songLikes') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($threeMostLikedSongs as $song)
                    <tr>
                        <td>{{ $song->title }}</td>
                        <td>{{ $song->author }}</td>
                        <td>{{ $song->feat }}</td>
                        <td>{{ $song->genre }}</td>
                        <td>{{ $song->likes }}</td>                        
                        <td>
                            <a class="btn btn-primary" href="{{ route('song.edit', ['song' => $song->id]) }}"><span class="glyphicon glyphicon-pencil"></span> {{ trans('labels.edit') }}</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ route('song.destroy.confirm', ['id' => $song->id]) }}"><span class="glyphicon glyphicon-trash"></span> {{ trans('labels.delete') }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection