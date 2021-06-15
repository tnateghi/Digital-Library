<div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="/" class="sidebar-title" title="{{ config('app.name') }}">
            <i class="fa fa-book"></i> <span class="sidebar-nav-mini-hide"><strong>{{ config('app.name') }}</strong></span>
        </a>
    </div>
    <!-- END Sidebar Brand -->

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">

                @if(isAdmin())
                    <li>
                        <a title="{{ __('messages.admin.sidebar.dashboard') }}" {{ href('dashboard') }}><i class="gi gi-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ __('messages.admin.sidebar.dashboard') }}</span></a>
                    </li>
                @endif

                <li>
                    <a title="{{ __('messages.admin.sidebar.profile') }}" {{ href('profile') }}><i class="hi hi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ __('messages.admin.sidebar.profile') }}</span></a>
                </li>

                @if(isAdmin())

                    @can('articles-admin')
                        <li {{ active_menu(['articles.create', 'articles.index', 'articles.comments']) }}>
                            <a href="#" title="{{ __('messages.admin.sidebar.posts') }}" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-pencil sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ __('messages.admin.sidebar.posts') }}</span></a>
                            <ul>
                                <li>
                                    <a {{ href('articles.index') }}>{{ __('messages.admin.sidebar.posts_list') }}</a>
                                </li>
                                <li>
                                    <a {{ href('articles.create') }}>{{ __('messages.admin.sidebar.create_post') }}</a>
                                </li>
                                <li>
                                    <a {{ href('articles.comments') }}>{{ __('messages.admin.sidebar.comments') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can('books-admin')
                        <li {{ active_menu(['books.create', 'books.index', 'book-categories.index']) }}>
                            <a href="#" title="{{ __('messages.admin.sidebar.books') }}" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ __('messages.admin.sidebar.books') }}</span></a>
                            <ul>

                                <li>
                                    <a {{ href('books.index') }}>{{ __('messages.admin.sidebar.books_list') }}</a>
                                </li>
                                <li>
                                    <a {{ href('book-categories.index') }} >{{ __('messages.admin.sidebar.categories') }}</a>
                                </li>
                                <li>
                                    <a {{ href('books.create') }}>{{ __('messages.admin.sidebar.create_book') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can('users-admin')
                        <li {{ active_menu(['users.create', 'users.index', 'users.new']) }}>
                            <a href="#" title="{{ __('messages.admin.sidebar.users') }}" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ __('messages.admin.sidebar.users') }}</span></a>
                            <ul>
                                <li>
                                    <a {{ href('users.index') }}>{{ __('messages.admin.sidebar.users_list') }}</a>
                                </li>
                                <li>
                                    <a {{ href('users.new') }}>{{ __('messages.admin.sidebar.new_users') }} <span class="label label-danger">{{ \App\User::where('level', 'new')->get()->count() }}</span></a>
                                </li>
                                <li>
                                    <a {{ href('users.create') }}>{{ __('messages.admin.sidebar.create_user') }}</a>
                                </li>

                            </ul>
                        </li>
                    @endcan

                    @can('lends-admin')
                        <li {{ active_menu(['lends.admin', 'lends.allActiveLends', 'lends.myActiveLends', 'lends.myLendsHistory']) }}>
                            <a href="#" title="امانت" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="hi hi-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">امانت</span></a>
                            <ul>
                                <li>
                                    <a {{ href('lends.admin') }}>مدیریت امانت</a>
                                </li>
                                <li>
                                    <a {{ href('lends.allActiveLends') }}>لیست کامل امانت های جاری</a>
                                </li>
                                <li {{ active_menu(['lends.myActiveLends', 'lends.myLendsHistory']) }}>
                                    <a href="#" class="sidebar-nav-submenu"><span class="sidebar-nav-ripple" style="height: 201px; width: 201px; top: -85.5px; left: 27.5px;"></span><i class="fa fa-chevron-right sidebar-nav-indicator"></i>امانت های من</a>
                                    <ul>
                                        <li>
                                            <a {{ href('lends.myActiveLends') }}>امانت های جاری</a>
                                        </li>
                                        <li>
                                            <a {{ href('lends.myLendsHistory') }}>سابقه امانت</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @cannot('lends-admin')
                        <li {{ active_menu(['lends.myActiveLends', 'lends.myLendsHistory']) }}>
                            <a href="#" title="امانت" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="hi hi-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">امانت های من</span></a>
                            <ul>
                                <li>
                                    <a {{ href('lends.myActiveLends') }}>امانت های جاری</a>
                                </li>
                                <li>
                                    <a {{ href('lends.myLendsHistory') }}>سابقه امانت</a>
                                </li>

                            </ul>
                        </li>
                    @endcannot

                    @can('roles-admin')
                        <li {{ active_menu(['roles.create', 'roles.index']) }}>
                            <a href="#" title="مدیریت مقام ها" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-star-half-o sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">مدیریت مقام ها</span></a>
                            <ul>

                                <li>
                                    <a {{ href('roles.index') }}>لیست مقام ها</a>
                                </li>
                                <li>
                                    <a {{ href('roles.create') }}>افزودن مقام جدید</a>
                                </li>

                            </ul>
                        </li>
                    @endcan

                    <li {{ active_menu(['users.search', 'books.search']) }}>
                        <a href="#" title="{{ __('messages.admin.sidebar.search') }}" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="hi hi-search sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ __('messages.admin.sidebar.search') }}</span></a>
                        <ul>
                            @can('users-admin')
                                <li>
                                    <a {{ href('users.search') }}>{{ __('messages.admin.sidebar.search_user') }}</a>
                                </li>
                            @endcan
                            <li>
                                <a {{ href('books.search') }}>{{ __('messages.admin.sidebar.search_book') }}</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a title="آمار" {{ href('statistics') }}><i class="fa fa-pie-chart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">آمار</span></a>
                    </li>

                    @can('settings-admin')
                        <li>
                            <a title="{{ __('messages.admin.sidebar.settings') }}" {{ href('settings') }}><i class="gi gi-settings sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">{{ __('messages.admin.sidebar.settings') }}</span></a>
                        </li>
                    @endcan

                @else

                    <li {{ active_menu(['lends.myActiveLends', 'lends.myLendsHistory']) }}>
                        <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-tasks sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">امانت های من</span></a>
                        <ul>
                            <li>
                                <a {{ href('lends.myActiveLends') }}>امانت های جاری</a>
                            </li>
                            <li>
                                <a {{ href('lends.myLendsHistory') }}>سابقه امانت</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a {{ href('books.search') }}><i class="hi hi-search sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">جستجوی کتاب</span></a>
                    </li>

                @endif

                <li>
                    <a title="سوالات متداول" {{ href('admin-faq') }}><i class="gi gi-circle_question_mark sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">سوالات متداول</span></a>
                </li>

            </ul>
            <!-- END Sidebar Navigation -->

        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->

    <!-- Sidebar Extra Info -->
    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
        <div class="text-center">
            {!! __('messages.posts.footer.footer_text') !!}
        </div>
    </div>
    <!-- END Sidebar Extra Info -->
</div>
