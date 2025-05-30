@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenue {{ auth()->user()->name }}</h1>
    <p>Ceci est votre tableau de bord utilisateur.</p>

    <div class="mt-4">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Se déconnecter
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
@endsection
