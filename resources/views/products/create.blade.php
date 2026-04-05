<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Produit</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container auth-container">
        <h1>➕ Nouveau Produit</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            
            <div class="form-group">
                <label>Nom du produit</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Ordinateur Portable" required>
            </div>
            
            <div class="form-group">
                <label>Description détaillée</label>
                <textarea name="description" rows="4" placeholder="Description...">{{ old('description') }}</textarea>
            </div>
            
            <div class="form-group">
                <label>Prix (FCFA)</label>
                <input type="number" name="price" value="{{ old('price') }}" placeholder="150000" required>
            </div>
            
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <button type="submit" style="flex: 1;">Enregistrer</button>
            </div>
        </form>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('products.index') }}" style="color: #666;">⬅️ Annuler et retourner</a>
        </div>
    </div>
</body>
</html>
