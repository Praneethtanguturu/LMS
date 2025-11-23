<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management System</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: #f4f6f9;
        }
        .navbar {
            background: #343a40 !important;
        }
        .sidebar {
            height: 100vh;
            background: white;
            padding-top: 20px;
            border-right: 1px solid #ddd;
        }
        .sidebar a {
            display: block;
            padding: 10px 20px;
            font-size: 16px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #007bff;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark">
        <span class="navbar-brand mb-0 h1">Leave Management System</span>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <a href="{{ url('/') }}">Dashboard</a>
                <a href="{{ url('/leave-types') }}">Leave Types</a>
                <a href="{{ url('/apply-leave') }}">Apply Leave</a>
                <a href="{{ url('/my-leaves') }}">My Leave History</a>
                <a href="{{ url('/admin/leaves') }}">Admin – Pending Leaves</a>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 mt-4">
                @yield('content')
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
