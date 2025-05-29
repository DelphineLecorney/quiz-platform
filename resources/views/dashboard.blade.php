<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<html>
<head><title>Dashboard</title></head>
<body class="container py-4">
  <h1 class="mb-4">Bienvenue {{ auth()->user()->name }}</h1>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="btn btn-danger" type="submit">Déconnexion</button>
  </form>
</body>

</html>
