@extends('article.master', ['title' => $article->title])

@section('content')

    <!-- Intro -->
    <section class="site-section site-section-top site-section-light themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-fadeInQuickInv"><strong>{{ $article->title }}</strong></h1>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Post -->
    <section class="site-content site-section border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <article class="site-block">
                        {!! $article->body !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- END Post -->
    @include('article.layouts.comments')

@endsection