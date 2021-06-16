@extends('article.master', ['title' => __('messages.titles.blog')])

@section('content')

    <!-- Intro -->
    <section class="site-section site-section-top site-section-light themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-fadeInQuickInv"><strong>{{ __('messages.posts.index.latest_posts') }}</strong></h1>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Latest Posts -->
    <section class="site-content site-section">
        <div class="container">
            @if($articles->count() == 0)
                <div class="row row-items">
                    <p><strong>{{ __('messages.posts.index.empty_posts') }} !</strong></p>
                </div>
            @endif
            @foreach($articlesChunk as $row)
                <div class="row row-items">
                    @foreach($row as $article)
                        <div class="col-md-6">
                            <a href="{{ route('article.show', ['article' => $article->slug]) }}" class="post">

                                <div class="text-muted pull-left">{{ get_date($article->created_at, 'Y-m-d') }}</div>
                                <h2 class="h4">
                                    <strong>{{ $article->title }}</strong>
                                </h2>
                                @php
                                    $string = $article->body;
                                    $string = strip_tags($string);
                                    if (strlen($string) > 300) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 250);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                        $string .= '...';
                                    }

                                    //if string is too small a br tag added to end just for beautiful view
                                    if (strlen($string) < 162) {
                                        $string .= '<br><br>';
                                    }
                                @endphp
                                <p>{!! $string !!}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="text-center">
                {{ $articles->render() }}
            </div>
        </div>
    </section>
    <!-- END Latest Posts -->

@endsection
