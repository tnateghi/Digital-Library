<div id="sidebar">
    <!-- Sidebar Brand -->
    <div id="sidebar-brand" class="themed-background">
        <a href="/" class="sidebar-title" title="{{ config('app.name', 'کتابخانه دیجیتال') }}">
            <i class="fa fa-book"></i> <span class="sidebar-nav-mini-hide"><strong>{{ config('app.name', 'کتابخانه دیجیتال') }}</strong></span>
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
                        <a title="داشبورد" {{ href('dashboard') }}><i class="gi gi-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">داشبورد</span></a>
                    </li>
                @endif

                <li>
                    <a title="پروفایل من" {{ href('profile') }}><i class="hi hi-user sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">پروفایل من</span></a>
                </li>

                @if(isAdmin())

                    @can('articles-admin')
                        <li {{ active_menu(['articles.create', 'articles.index', 'articles.comments']) }}>
                            <a href="#" title="مدیریت نوشته ها" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-pencil sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">مدیریت نوشته ها</span></a>
                            <ul>
                                <li>
                                    <a {{ href('articles.index') }}>نوشته ها</a>
                                </li>
                                <li>
                                    <a {{ href('articles.create') }}>افزودن نوشته جدید</a>
                                </li>
                                <li>
                                    <a {{ href('articles.comments') }}>دیدگاه ها</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can('books-admin')
                        <li {{ active_menu(['books.create', 'books.index', 'book-categories.index']) }}>
                            <a href="#" title="مدیریت کتاب ها" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">مدیریت کتاب ها</span></a>
                            <ul>

                                <li>
                                    <a {{ href('books.index') }}>لیست کتاب ها</a>
                                </li>
                                <li>
                                    <a {{ href('book-categories.index') }} >مدیریت دسته بندی ها</a>
                                </li>
                                <li>
                                    <a {{ href('books.create') }}>افزودن کتاب جدید</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @can('users-admin')
                        <li {{ active_menu(['users.create', 'users.index', 'users.new']) }}>
                            <a href="#" title="مدیریت کاربران" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-users sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">مدیریت کاربران</span></a>
                            <ul>
                                <li>
                                    <a {{ href('users.index') }}>لیست کاربران</a>
                                </li>
                                <li>
                                    <a {{ href('users.new') }}>کاربران جدید <span class="label label-danger">{{ \App\User::where('level', 'new')->get()->count() }}</span></a>
                                </li>
                                <li>
                                    <a {{ href('users.create') }}>افزودن کاربر جدید</a>
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
                        <a href="#" title="جستجو" class="sidebar-nav-menu"><i class="fa fa-chevron-right sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="hi hi-search sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">جستجو</span></a>
                        <ul>
                            @can('users-admin')
                                <li>
                                    <a {{ href('users.search') }}>جستجوی کاربر</a>
                                </li>
                            @endcan
                            <li>
                                <a {{ href('books.search') }}>جستجوی کتاب</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a title="آمار" {{ href('statistics') }}><i class="fa fa-pie-chart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">آمار</span></a>
                    </li>

                    @can('settings-admin')
                        <li>
                            <a title="تنظیمات" {{ href('settings') }}><i class="gi gi-settings sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">تنظیمات</span></a>
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
            <small>توسعه یافته با <i class="fa fa-heart text-danger"></i> توسط <a href="https://t-nateghi.ir/" target="_blank">ناطقی</a></small><br>
        </div>
    </div>
    <!-- END Sidebar Extra Info -->
</div>
