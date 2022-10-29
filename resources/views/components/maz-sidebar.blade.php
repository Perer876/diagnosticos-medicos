@props(['href','logo', 'title' => 'Menu'])

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">

        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <x-logo class="w-50 h-50" />
                </div>
                <x-theme-toggle />
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">{{ $title }}</li>
                {{ $slot ?? '' }}
            </ul>
        </div>

    </div>
</div>
