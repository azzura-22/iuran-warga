<link rel="stylesheet" href="{{asset('bootstrap1/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/fontawesome-free-6.7.2-web/css/all.min.css')}}">
<style>
    body {
        background-color: #f8f9fa;
    }
    .sidebar {
        height: 100vh;
        background-color: #343a40;
        position: fixed;
        border-top: none;
        width: 350px;
        left: 0;
        top: 0;
        z-index: 1000;
    }
    .sidebar a {
        color: #ffffff;
        text-decoration: none;
        display: block;
        padding: 10px 20px;
        font-size: 1.3rem;
    }
    .sidebar a:hover {
        background-color: #495057;
    }
    .sidebar .nav-link.active {
        border-top: none !important;
    }
    .main-content {
        margin-left: 250px;
        padding: 30px 20px;
        min-height: 100vh;
    }
</style>
<body>
    <nav class="sidebar py-4">
        <h2 class="text-center mb-4 text-white">citizen fees</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-white" href="{{route('homewarga')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('historywarga')}}">history payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('logout')}}">logout</a>
            </li>
        </ul>
    </nav>
    <div class="main-content">
        @yield('content')
    </div>
</body>
<script src="{{asset('bootstrap1/js/bootstrap.bundle.min.js')}}"></script>
