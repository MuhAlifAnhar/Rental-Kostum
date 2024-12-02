<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .sidebar {
            transition: all 0.3s;
            width: 250px;
            background-color: #343a40;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: white;
            z-index: 1000;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }

        .sidebar.collapsed {
            width: 0;
            overflow: hidden;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: white;
        }

        .content {
            transition: margin-left 0.3s;
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }

        .content.collapsed {
            margin-left: 0;
        }

        .active {
            background-color: #0d6efd;
            color: #fff;
        }

        .open-btn {
            position: fixed;
            top: 20px;
            left: 10px;
            z-index: 1000;
            background-color: #343a40;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            display: block;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .navbar-nav {
                flex-direction: column;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <span class="close-btn text-white ms-3 mb-2" onclick="toggleSidebar()">
            <i class="fas fa-times"></i>
        </span>
        <h3 class="text-center">Admin Panel</h3>
        <a href="/admin" class="nav-link text-white {{ Request::is('admin') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        @can('isSuper')
            <a href="/admin/toko" class="nav-link text-white {{ Request::is('admin/toko*') ? 'active' : '' }}">
                <i class="fas fa-store"></i> Toko
            </a>
            <a href="/admin/request" class="nav-link text-white {{ Request::is('admin/request*') ? 'active' : '' }}">
                <i class="fas fa-inbox"></i> Request Toko
            </a>
        @endcan
        @can('isAdmin')
            <a href="/admin/produk" class="nav-link text-white {{ Request::is('admin/produk*') ? 'active' : '' }}">
                <i class="fas fa-box-open"></i> Produk
            </a>
            <a href="/admin/transaksi" class="nav-link text-white {{ Request::is('admin/transaksi*') ? 'active' : '' }}">
                <i class="fas fa-receipt"></i> Transaksi
            </a>
        @endcan
    </div>


    <button class="open-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <div class="content" id="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid ms-3">
                <a class="navbar-brand" href="/admin">Admin Dashboard</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" id="navbar-links">
                        <!-- Links from sidebar will be added here -->
                    </ul>
                    <form action="/logout" method="post" class="nav-link ms-auto">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        @yield('body')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.getElementById("main-content");
            const navbarLinks = document.getElementById("navbar-links");

            sidebar.classList.toggle("collapsed");
            mainContent.classList.toggle("collapsed");

            // Show or hide the sidebar
            if (sidebar.classList.contains("collapsed")) {
                sidebar.style.display = "none"; // Hide sidebar
                updateNavbarLinks(); // Update navbar links on small screens
            } else {
                sidebar.style.display = "block"; // Show sidebar
                clearNavbarLinks(); // Clear navbar links if sidebar is shown
            }
        }

        // function updateNavbarLinks() {
        //     const sidebarLinks = document.querySelectorAll('.sidebar a');
        //     const navbarLinks = document.getElementById("navbar-links");
        //     navbarLinks.innerHTML = ''; // Clear existing navbar links

        //     sidebarLinks.forEach(link => {
        //         const clonedLink = link.cloneNode(true); // Clone the link
        //         clonedLink.classList.remove('text-white'); // Remove white text class
        //         clonedLink.classList.add('text-dark'); // Add dark text class
        //         navbarLinks.appendChild(clonedLink); // Append to navbar
        //     });
        // }

        function clearNavbarLinks() {
            const navbarLinks = document.getElementById("navbar-links");
            navbarLinks.innerHTML = ''; // Clear navbar links when sidebar is shown
        }
    </script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
