@extends('layouts.delete')

@section('titolo', 'Delete book from the list')

@section('stile', 'style.css')

@section('left_navbar')
<li><a href="{{ route('home') }}">Home</a></li>
<li class="dropdown active">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Library<b class="caret"></b></a>
    <ul class="dropdown-menu">
        <li class='active'><a href="{{ route('book.index') }}">@lang('labels.booksList')</a></li>
        <li><a href="{{ route('author.index') }}">{{ trans('labels.authorsList') }}</a></li>
    </ul>
</li>
@endsection

@section('breadcrumb')
<li><a href="{{ route('home') }}">Home</a></li>
<li class="active"><a href="{{ route('book.index') }}">My Library</a></li>
<li class="active"><a href="{{ route('book.index') }}">{{ trans('labels.books') }}</a></li>
<li class="active">{{ trans('labels.deleteBook') }}</li>
@endsection

@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    {{ trans('labels.deleteBookMsgFirstPart') }} {{ trans('labels.deleteBookMsgLastPart') }}
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
                    <p><a class="btn btn-default" href="{{ route('book.index') }}"><span class='glyphicon glyphicon-log-out'></span> {{ trans('labels.backBookList') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection