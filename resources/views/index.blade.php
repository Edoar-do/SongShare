@extends('layouts.master')

@section('titolo')
{{ trans('labels.siteTitle') }}
@endsection

@section('corpo')
<!-- Carousel ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active" style="background-image: url('img/musicSharing.png')">
            <div class="carousel-caption">
                <p>@lang('labels.joinOnSongShare')</p>
                <p><a class="btn btn-lg btn-primary btn-add-to-cart" href="{{ route('register') }}" role="button">@lang('labels.register')</a></p>
            </div>
        </div>
        <div class="item" style="background-image: url('img/musicSearch.jfif')">
            <div class="carousel-caption">
                <p>@lang('labels.trySearchEngine')</p>
                <p><a class="btn btn-lg btn-primary btn-add-to-cart" href="{{ route('musicSearch') }}" role="button">@lang('labels.searchMusic')</a></p>
            </div>
        </div>
        <div class="item" style="background-image: url('img/helpUsPic.jfif')">
            <!--<img class="third-slide" src="img/consulenze/camere_da_letto/camera3.jpg" alt="Third slide">-->
            <div class="carousel-caption">
                <p>@lang('labels.helpUsImprove')</p>
                <p><a class="btn btn-lg btn-primary btn-add-to-cart" href="{{ route('helpUs') }}" role="button">@lang('labels.helpUs')</a></p>
            </div>
        </div>
    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="img-circle" src="{{url('/')}}/img/anzianoMusica.jfif" alt="Generic placeholder image" width="140" height="140">
            <h2>Lino, 76</h2>
            <p>@lang('labels.LinoMSG')</p>   
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">

            <img class="img-circle" src="{{url('/')}}/img/ragazzaMusica.jfif" alt="Generic placeholder image" width="140" height="140">

            <h2>Annie, 23</h2>
            <p>@lang('labels.AnnieMSG')</p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
            <img class="img-circle" src="{{url('/')}}/img/kronk.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Kronk, 30, @lang('labels.kronkAvatar')</h2>
            <p>@lang('labels.KronkMSG')</p>

        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- Footer -->
    <footer class="bg-white footer">
        <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <img src="{{url('/')}}/img/logo-footer.png" alt="Brand" width="70" height="70" class="mb-3 footer-logo">
                    <p class="font-italic text-muted">@lang('labels.songShareFinalMSG')</p>
                    <p>
                        <a href="{{ route('setLang', ['lang' => 'en']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/en.png" width="30" class="img-rounded"/></a>
                        <a href="{{ route('setLang', ['lang' => 'it']) }}" class="nav-link"><img src="{{ url('/') }}/img/flags/it.png" width="24" class="img-rounded"/></a>
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 mb-lg-0">
                    <h3 class="text-uppercase font-weight-bold mb-4">@lang('labels.followUs')</h3>
                    <a href="https://www.instagram.com/unibs.official">
                        <img src="{{url('/')}}/img/insta_logo.png" alt="" width="40" class="mb-3">
                    </a>
                </div
            </div>
        </div>

        <!-- Copyrights -->
        <div class="bg-light py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">© 2021 EdoardoCoppola.it @lang('labels.rightsReserved').</p>
            </div>
        </div>
    </footer>
    <!-- End -->
    @endsection