<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Management')</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/xv9cmw1iqpagrtx13hrs0e10uo4j6mzwjubxgi9ovgletv0j/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('events.index') }}">Event Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('events.index') }}">Master Data Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('organizers.index') }}">Master Organizers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event-categories.index') }}">Master Event Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('events.page') }}">Events</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content') <!-- This is where page-specific content will go -->
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">This is the footer</span>
        </div>
    </footer>

    <!-- Scripts (like jQuery, Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts') <!-- This allows for additional scripts in specific views -->
</body>

</html>
