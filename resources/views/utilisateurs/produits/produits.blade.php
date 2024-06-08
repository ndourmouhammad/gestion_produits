<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" container="width=device-width, initial-scale=1.0">
    <title>Les produits</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
    flex-direction: column;
    min-height: 100vh;
        }
        .navbar, .footer {
            background-color: #4CAF50; /* Vert pour la fraîcheur */
        }
        .btn-primary, .btn-outline-primary {
            background-color: #FF9800; /* Orange pour l'énergie */
            border-color: #FF9800;
        }
        .btn-outline-primary:hover {
            background-color: #FF9800;
            color: #fff;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour améliorer la lisibilité */
            padding: 1rem;
            border-radius: 0.5rem;
        }
        .carousel-caption h5 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .carousel-caption p {
            font-size: 1.2rem;
        }
        .carousel-item img {
            max-height: 500px; /* Limite de hauteur pour les images du carrousel */
            object-fit: cover;
        }
        .navbar-nav {
            margin: auto;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .navbar-nav .nav-item {
            margin-left: 15px;
            margin-right: 15px;
        }
        .auth-buttons {
            display: flex;
        }
        .auth-buttons .btn {
            margin-left: 10px;
        }
        

.container {
    flex: 1;
}

    </style>
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Kane & Frères</a>
    <div class="collapse navbar-collapse justify-container-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" href="{{ route('categories') }}">Catégories</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('produits') }}">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Commandes</a>
            </li>
            
        </ul>
    </div>
    <div class="auth-buttons">
        <a href="#" class="btn btn-outline-light">Connexion</a>
        <a href="#" class="btn btn-outline-light">Inscription</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        
        @foreach ($produits as $produit)
        <div class="col-md-4">
            <div class="card mt-3 mb-3">
                <img src="{{ $produit->image }}" class="card-img-top" alt="{{ $produit->designation }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $produit->designation }}</h5>
                    <p class="card-text"><strong>Prix: {{ $produit->prix_unitaire }} FCFA</strong></p>
                    <div class="status-badge mb-2">
                        @if ($produit->etat == 'disponible')
                        <span class="badge bg-success text-white">disponible</span>
                        @elseif ($produit->etat == 'en_rupture')
                        <span class="badge bg-danger text-white">en rupture</span>
                        @else
                        <span class="badge bg-warning text-white">en stock</span>
                        @endif
                    </div>
                    <a href="#" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Ajouter au panier</a>
                    <a href="{{ route('detail', $produit->id) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Voir détails</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>
<!-- Footer -->
<footer class="footer mt-5 py-3">
    <div class="container text-center">
        <span class="text-white">© 2024 Kane & Frères</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html> 
