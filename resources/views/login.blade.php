
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/daisyui@2.6.0/dist/full.css"
      rel="stylesheet"
      type="text/css"
    />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Schoolie Login</title>
</head>
<body class="min-h-screen flex justfy-center items-center">
    <!-- resources/views/admin/auth/login.blade.php -->

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</html>