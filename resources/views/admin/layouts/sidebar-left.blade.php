<div id="sidebar-alt" tabindex="-1" aria-hidden="true">
    <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
    <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll-alt">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Profile -->
            <div class="sidebar-section">
                <h2 class="text-light">پروفایل</h2>
                <form action="" method="post" class="form-control-borderless" onsubmit="return false;">
                    <div class="form-group">
                        <label for="side-profile-name">نام</label>
                        <input type="text" id="side-profile-name" name="side-profile-name" class="form-control" value="توحید">
                    </div>
                    <div class="form-group">
                        <label for="side-profile-email">ایمیل</label>
                        <input type="email" id="side-profile-email" name="side-profile-email" class="form-control" value="john.doe@example.com">
                    </div>
                    <div class="form-group">
                        <label for="side-profile-password">گذرواژه جدید</label>
                        <input type="password" id="side-profile-password" name="side-profile-password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="side-profile-password-confirm">تکرار گذرواژه جدید</label>
                        <input type="password" id="side-profile-password-confirm" name="side-profile-password-confirm" class="form-control">
                    </div>
                    <div class="form-group remove-margin">
                        <button type="submit" class="btn btn-effect-ripple btn-primary" onclick="App.sidebar('close-sidebar-alt');">ذخیره</button>
                    </div>
                </form>
            </div>
            <!-- END Profile -->

        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
