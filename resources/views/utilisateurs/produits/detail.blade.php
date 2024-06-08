<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" container="width=device-width, initial-scale=1.0">
    <title>{{ $produit->designation }}</title>
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
                <a class="nav-link" href="{{ route('commandes')}}">Commandes</a>
            </li>
           
        </ul>
    </div>
    <div class="auth-buttons">
        @auth
        <div class="nav-item">
            <span class="nav-link text-white">Bienvenue, {{ auth()->user()->prenom}}</span>
        </div>
        <div class="nav-item">
                <a href="{{ route('logout') }}" class="btn btn-outline-light">Déconnexion</a>
        </div>
        @endauth
        @guest
        <a href="{{ route('login') }}" class="btn btn-outline-light">Connexion</a>
        <a href="{{ route('register') }}" class="btn btn-outline-light">Inscription</a>
        @endguest
    </div>
</nav>

<div class="container">
    <h1 class="mt-5">Les informations du produit</h1>
    <div class="card mt-5">
        <div class="card-header">
            <h1>{{ $produit->designation }}</h1>
        </div>
        <div class="d-flex">
            
            <img src="{{ $produit->image }}" class="card-img-top w-50 mx-auto" alt="{{ $produit->designation }}">
            
            <div class="card-body">
                
                <p>Date d'ajout: {{ $produit->created_at->format('d/m/Y') }}</p>
                <p>Référence : {{ $produit->reference }}</p>
                <p>Prix unitaire : {{ $produit->prix_unitaire }} FCFA</p>
                <p>Catégorie : {{ $produit->categorie->libelle }} </p>
                <div class="status-badge mb-2">
                    @if ($produit->etat == 'disponible')
                    <span class="badge bg-success text-white">disponible</span>
                    @elseif ($produit->etat == 'en_rupture')
                    <span class="badge bg-danger text-white">en rupture</span>
                    @else
                    <span class="badge bg-warning text-white">en stock</span>
                    @endif
                    
                </div>
                <div class="mt-5">
                    <a href="{{ route('produit.commander', $produit->id) }}" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Ajouter au panier</a>
                </div>
            </div>
        </div>
        
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

