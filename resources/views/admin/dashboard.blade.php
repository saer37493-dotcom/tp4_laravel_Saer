<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Admin</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container">
        <div class="nav-links">
            <a href="{{ route('products.index') }}">📦 Gérer les Produits</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
                @csrf
                <button type="submit" class="btn-inline">Se déconnecter</button>
            </form>
        </div>

        <h1>🛡️ Espace Admin</h1>
        
        <div class="glass-card">
            <h2>Bienvenue, {{ auth()->user()->name }} !</h2>
            <p style="color: #555;">Vous êtes connecté en tant qu'administrateur avec des privilèges étendus.</p>
        </div>

        <div class="grid-cards" style="margin-top: 30px;">
            <div class="glass-card">
                <div style="font-size: 32px; margin-bottom: 10px;">📦</div>
                <h3>Gestion des Produits</h3>
                <p style="color: #666; font-size: 14px; margin: 10px 0;">Ajoutez, modifiez ou supprimez les articles de la boutique.</p>
                <a href="{{ route('products.index') }}" style="display: inline-block; margin-top: 10px; color: #007bff;">Accéder →</a>
            </div>
        </div>
    </div>
</body>
</html>
