<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du Produit</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container auth-container">
        <div class="nav-links" style="justify-content: flex-start; margin-bottom: 20px;">
            <a href="{{ route('products.index') }}" style="background: transparent; border:none; padding:0; text-decoration: underline;">⬅️ Liste des produits</a>
        </div>

        <h1>👁️ Détail du Produit</h1>

        <div class="glass-card">
            <p style="margin-bottom: 12px;"><strong style="color: #555;">Référence :</strong> #{{ $product->id }}</p>
            <p style="margin-bottom: 12px; font-size: 20px;"><strong style="color: #555;">Aperçu :</strong> {{ $product->name }}</p>
            
            <div style="background: rgba(255,255,255,0.4); padding: 16px; border-radius: 12px; margin-bottom: 20px;">
                <p style="color: #333; line-height: 1.5;">{{ $product->description ?? 'Aucune description fournie.' }}</p>
            </div>
            
            <p style="margin-bottom: 12px; font-size: 24px; font-weight: 700; color: #111;">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
            
            <div style="font-size: 12px; color: #888; margin-top: 30px; display: flex; justify-content: space-between;">
                <p>Création : {{ $product->created_at->format('d/m/Y H:i') }}</p>
                <p>M.à.j : {{ $product->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('products.edit', $product) }}" style="display: inline-block; background: #111; color: #fff; padding: 12px 30px; border-radius: 20px; text-decoration: none;">✏️ Editer ce produit</a>
        </div>
    </div>
</body>
</html>
