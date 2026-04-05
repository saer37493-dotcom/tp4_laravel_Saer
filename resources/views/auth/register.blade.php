<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container auth-container">
        <h1>Créer un compte</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            
            <div class="form-group">
                <label>Nom complet</label>
                <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label>Adresse E-mail</label>
                <input type="email" name="email" placeholder="nom@exemple.com" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            
            <div class="form-group">
                <label>Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" placeholder="••••••••" required>
            </div>
            
            <button type="submit">S'inscrire</button>
        </form>

        <p class="link-text"><a href="{{ route('login') }}">Déjà un compte ? Se connecter</a></p>
    </div>
</body>
</html>
