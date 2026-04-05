<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Produit</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container auth-container">
        <h1 style="font-size: 24px;">✏️ Modifier : {{ $product->name }}</h1>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Nom du produit</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
            </div>
            
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
            </div>
            
            <div class="form-group">
                <label>Prix (FCFA)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" required>
            </div>
            
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <button type="submit" style="flex: 1;">Mettre à jour</button>
            </div>
        </form>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('products.index') }}" style="color: #666;">⬅️ Annuler et retourner</a>
        </div>
    </div>
</body>
</html>
