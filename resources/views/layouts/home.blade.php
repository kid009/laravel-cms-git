<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Blog Template · Bootstrap v5.0</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: "Prompt", sans-serif;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* stylelint-disable selector-list-comma-newline-after */

        .blog-header {
            line-height: 1;
            border-bottom: 1px solid #e5e5e5;
        }

        .blog-header-logo {
            font-family: "Prompt", sans-serif;
                /*rtl:Amiri, Georgia, "Times New Roman", serif*/
            ;
            font-size: 2.25rem;
        }

        .blog-header-logo:hover {
            text-decoration: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Prompt", sans-serif;
                /*rtl:Amiri, Georgia, "Times New Roman", serif*/
            ;
        }

        .display-4 {
            font-size: 2.5rem;
        }

        @media (min-width: 768px) {
            .display-4 {
                font-size: 3rem;
            }
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .nav-scroller .nav-link {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: .875rem;
        }

        .card-img-right {
            height: 100%;
            border-radius: 0 3px 3px 0;
        }

        .flex-auto {
            flex: 0 0 auto;
        }

        .h-250 {
            height: 250px;
        }

        @media (min-width: 768px) {
            .h-md-250 {
                height: 250px;
            }
        }

        /* Pagination */
        .blog-pagination {
            margin-bottom: 4rem;
        }

        .blog-pagination>.btn {
            border-radius: 2rem;
        }

        /*
 * Blog posts
 */
        .blog-post {
            margin-bottom: 4rem;
        }

        .blog-post-title {
            margin-bottom: .25rem;
            font-size: 2.5rem;
        }

        .blog-post-meta {
            margin-bottom: 1.25rem;
            color: #727272;
        }

        /*
 * Footer
 */
        .blog-footer {
            padding: 2.5rem 0;
            color: #727272;
            text-align: center;
            background-color: #f9f9f9;
            border-top: .05rem solid #e5e5e5;
        }

        .blog-footer p:last-child {
            margin-bottom: 0;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
</head>

<body>

    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
            <h1 class="display-5 fw-bold text-white">ศูนย์รวมความรู้วิศวกรรมซอฟต์แวร์</h1>
            <div class="col-lg-6 mx-auto">
                <p class="fs-5 mb-4">
                    แบ่งปันประสบการณ์การออกแบบสถาปัตยกรรมระบบ, การเขียนโค้ดด้วย Laravel
                และการจัดการ Server ระดับ Production เพื่อยกระดับทักษะของนักพัฒนาทุกคน
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href='/' class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">
                        อ่านบทความล่าสุด
                    </a>
                    {{-- <a href='' class="btn btn-outline-light btn-lg px-4">
                        ค้นหาตามแท็ก
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

    <main class="container mt-3">

        <div class="row g-5">

            <div class="col-md-9">

                @yield('content')

            </div>

            <div class="col-md-3">
                <div class="position-sticky" style="top: 2rem;">

                    <div class="p-4">
                        <h4>Category</h4>
                        <div class="list-group">
                            <a href="/" class="list-group-item list-group-item-action">
                                All
                            </a>
                            @foreach ($categories as $category)
                                <a href="{{ route('home.category', $category->id) }}"
                                    class="list-group-item list-group-item-action">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="p-4">
                        <h4>Tag</h4>
                        @foreach ($tags as $tag)
                            <a href="{{ route('home.tag', $tag->id) }}" class="text-decoration-none">
                                <span class="badge rounded-pill bg-success">{{ $tag->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="blog-footer">
        <p>&copy; {{ date('Y') }} <a href="https://km.pongpoom-dev.com/">Knowledge Management</a>. All rights reserved.</p>
    </footer>

</body>

</html>
