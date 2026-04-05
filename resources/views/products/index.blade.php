<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="{{ asset('css/glass.css') }}">
</head>
<body>
    <div class="glass-container">
        <div class="nav-links">
            <a href="{{ route('admin.dashboard') }}">⬅️ Tableau de bord</a>
        </div>

        <h1>📦 Base de données Produits</h1>

        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <div style="margin-bottom: 20px;">
            <a href="{{ route('products.create') }}" style="background: #111; color: #fff; padding: 12px 20px; border-radius: 20px; text-decoration: none; font-size: 14px; font-weight: 500;">➕ Ajouter un produit</a>
        </div>

        <div class="glass-card" style="padding: 0; overflow: hidden;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>#{{ $product->id }}</td>
                            <td style="font-weight: 500;">{{ $product->name }}</td>
                            <td style="color: #666;">{{ Str::limit($product->description ?? 'N/A', 50) }}</td>
                            <td style="font-weight: 600;">{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('products.show', $product) }}">👁️ Voir</a>
                                    <a href="{{ route('products.edit', $product) }}">✏️ Modif.</a>
                                    <form method="POST" action="{{ route('products.destroy', $product) }}" style="display:inline; margin:0; padding:0; gap:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de supprimer ce produit ?')">🗑️ Suppr.</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 40px; color: #666;">Aucun produit trouvé dans la base de données.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
