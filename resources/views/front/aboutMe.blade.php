@extends('layouts.master')

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('corpo')
<div class="container">
    <header class="header-sezione">
        <h1>
            @lang('labels.startingAboutMe')
        </h1>
    </header>
</div>

<div class="container">                
    <div class="col-sm-9">
        <div class="box-lavoro-evidenza">
            <p>@lang('labels.aboutMeMSG')</p>
            <blockquote>
                <p>Gutta cavat lapidem</p>
                <small>[@lang('labels.latinProverb')]</small>
            </blockquote>
        </div>
    </div><!-- /.col-sm-8 -->
    <div class="row">
        <div class="col-sm-3">
            <div class="box-lavoro-evidenza">
                <img src="img/ingegneria.jfif" class="img-thumbnail img-responsive">
            </div>
        </div><!-- /.col-sm-4 -->
    </div>                

    <!-- Footer -->
    <footer class="bg-white footer">
        <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <img src="{{ url('/')}}/img/logo-footer.png" alt="Brand" width="70" height="70" class="mb-3 footer-logo">
                    <p class="font-italic text-muted">@lang('labels.songShareFinalMSG')</p> 
                    <p>
                        <a href="{{ route('setLang', ['lang' => 'en']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/en.png" width="30" class="img-rounded"/></a>
                        <a href="{{ route('setLang', ['lang' => 'it']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/it.png" width="24" class="img-rounded"/></a>
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 mb-lg-0">
                    <h3 class="text-uppercase font-weight-bold mb-4">@lang('labels.followUs')</h3>
                    <a href="https://www.instagram.com/unibs.official">
                        <img src="img/insta_logo.png" alt="" width="40" class="mb-3">
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyrights -->
        <div class="bg-light py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">© 2021 EdoardoCoppola.it All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- End -->
</div><!-- /.container -->
@endsection