<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #5d6e7a, #7e9e88);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .hero {
            flex-grow: 1;
        }

        .quiz-img {
            max-width: 300px;
            margin: 20px auto;
        }
    </style>
<body>
    <nav class="navbar navbar-expand-lg px-4" style="background-color: #8d9e93;">
        <a class="navbar-brand" href="#">Quiz App</a>

        <div class="ms-auto">
            @auth
                <span class="me-3">Bonjour, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Connexion</a>
                <a href="{{ route('register') }}" class="btn btn-outline-success btn-sm">Inscription</a>
            @endauth
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>
</body>
</html>
