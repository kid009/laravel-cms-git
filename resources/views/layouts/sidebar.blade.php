{{-- resources/views/components/sidebar.blade.php --}}
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <span data-feather="users"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.index') }}">
                    <span data-feather="users"></span>
                    Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <span data-feather="users"></span>
                    Tags
                </a>
            </li>
        </ul>
    </div>
</nav>
