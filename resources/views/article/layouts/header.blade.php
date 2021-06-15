<!-- Site Header -->
<header>
    <div class="container">
        <!-- Site Logo -->
        <a href="/" class="site-logo">
            <i class="fa fa-book"></i><strong> {{ __('messages.titles.blog') }}</strong>
        </a>
        <!-- END Site Logo -->

        <!-- Site Navigation -->
        <nav>
            <!-- Menu Toggle -->
            <!-- Toggles menu on small screens -->
            <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">{{ __('messages.posts.header.menu') }}</a>
            <!-- END Menu Toggle -->

            <!-- Main Menu -->
            <ul class="site-nav">
                <li>
                    <a href="/" @if (\Request::is('/')) class="active" @endif>{{ __('messages.posts.header.home') }}</a>
                </li>
                {{-- <li>
                    <a href="/faq"  @if (\Request::is('faq')) class="active" @endif>{{ __('messages.posts.header.faq') }}</a>
                </li> --}}
                {{--<li>
                    <a href="/contact" @if (\Request::is('contact')) class="active" @endif>تماس با ما</a>
                </li>--}}

                @if(auth()->guest())
                    <li>
                        <a href="{{ route('login') }}" class="featured">{{ __('messages.posts.header.login') }} <i class="fa fa-arrow-left"></i> </a>
                    </li>
                @endif

                @if (auth()->check())
                    @if(isAdmin())
                        <li>
                            <a href="{{ route('dashboard') }}" class="featured">{{ __('messages.posts.header.panel') }}</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('profile') }}" class="featured">{{ __('messages.posts.header.panel') }}</a>
                        </li>
                    @endif

                    <li>
                        <form action="{{ route('logout') }}" id="logout" method="post">
                            {{ csrf_field() }}
                        </form>
                        <a href="javascript:void(0)" onclick="document.getElementById('logout').submit();">{{ __('messages.posts.header.logout') }}</a>
                    </li>
                @endif

            </ul>
            <!-- END Main Menu -->
        </nav>
        <!-- END Site Navigation -->
    </div>
</header>
<!-- END Site Header -->
