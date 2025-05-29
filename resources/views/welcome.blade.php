<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #e3f2fd, #fce4ec);
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
</head>
<body>
    <div class="container text-center py-5 hero">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Quiz" class="quiz-img">
        <h1 class="display-4 fw-bold"> Bienvenue sur Quiz Platform</h1>
        <p class="lead">Créez, répondez et testez vos connaissances en toute simplicité.</p>

        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Accéder au tableau de bord</a>
        @else
            <a href="{{ route('register') }}" class="btn btn-success mt-3 me-2">Créer un compte</a>
            <a href="{{ route('login') }}" class="btn btn-outline-primary mt-3">Se connecter</a>
        @endauth
    </div>

    <footer class="text-center py-4 text-muted">
        <small>&copy; {{ date('Y') }} Quiz Platform — Projet Laravel par Delphine.</small>
    </footer>
</body>
</html>
