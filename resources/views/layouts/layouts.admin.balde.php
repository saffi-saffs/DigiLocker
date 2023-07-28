<!-- resources/views/layouts/layouts.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Include your CSS and other head assets here -->
</head>
<body>
    <!-- Common header, navigation, or sidebar can be included here -->
    
    <!-- Content section where the views will be injected -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Common footer or scripts can be included here -->
</body>
</html>
