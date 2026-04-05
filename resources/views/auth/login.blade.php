<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container auth-container">
        <h1>Connexion</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            
            <div class="form-group">
                <label>Adresse E-mail</label>
                <input type="email" name="email" placeholder="nom@exemple.com" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            
            <button type="submit">Se connecter</button>
        </form>

        <p class="link-text"><a href="{{ route('register') }}">Pas encore de compte ? Inscrivez-vous</a></p>
    </div>
</body>
</html>
