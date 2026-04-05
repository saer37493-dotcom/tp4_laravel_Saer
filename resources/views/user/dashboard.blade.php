<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Utilisateur</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container">
        <div class="nav-links">
            <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
                @csrf
                <button type="submit" class="btn-inline">Se déconnecter</button>
            </form>
        </div>

        <h1>Espace Utilisateur</h1>
        
        <div class="glass-card" style="text-align: center; padding: 40px;">
            <div style="font-size: 48px; margin-bottom: 20px;">👤</div>
            <h2>Bienvenue, {{ auth()->user()->name }} !</h2>
            <p style="color: #666;">Vous êtes connecté et prêt à naviguer.</p>
        </div>
    </div>
</body>
</html>
