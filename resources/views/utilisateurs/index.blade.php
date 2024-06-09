<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Produits Alimentaires</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        <style>
    body {
        font-family: Arial, sans-serif;
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
    .card {
        height: 100%; /* Rendre toutes les cartes de la même hauteur */
    }
    .card-img-top {
        height: 200px; /* Hauteur fixe pour les images */
        object-fit: cover; /* Ajustement de l'image pour remplir le conteneur */
    }
    .card-body {
        display: flex;
        flex-direction: column;
    }
    .card-body .btn {
        margin-top: auto; /* Pousser les boutons vers le bas */
    }
</style>


    </style>
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Kane&Frères</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('categories') }}">Catégories</a>
            </li> --}}
            <li class="nav-item">
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

<!-- Bannière avec carrousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://img.freepik.com/photos-gratuite/legumes-panier-table-bois_155003-5607.jpg?t=st=1717741324~exp=1717744924~hmac=eede4fc599292647d8ff517751fddea184d1e024549e5e78a91ce4dbcc8f6165&w=1380" class="d-block w-100" alt="Fruits et légumes">
            <div class="carousel-caption d-none d-md-block">
                <h5>Fruits et Légumes</h5>
                <p>Découvrez nos fruits et légumes frais, riches en vitamines et minéraux.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://img.freepik.com/photos-gratuite/bouteille-lait-verre-classique_23-2150734435.jpg?t=st=1717741465~exp=1717745065~hmac=4dd6544241d8a4e0e385da4f7606d3f2581225823f73045b8aa86141623344f8&w=1380" class="d-block w-100" alt="Produits laitiers">
            <div class="carousel-caption d-none d-md-block">
                <h5>Produits Laitiers</h5>
                <p>Dégustez nos produits laitiers frais et savoureux, riches en calcium.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1634932515818-7f9292c4e149?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Viandes et Poissons">
            <div class="carousel-caption d-none d-md-block">
                <h5>Viandes et Poissons</h5>
                <p>Savourez nos viandes et poissons de haute qualité, pour une alimentation équilibrée.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1551024709-8f23befc6f87?q=80&w=2157&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Boissons">
            <div class="carousel-caption d-none d-md-block">
                <h5>Boissons</h5>
                <p>Rafraîchissez-vous avec nos boissons variées, pour tous les goûts.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Précédent</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Suivant</span>
    </a>
</div>

<!-- Corps de la page avec produits sous forme de cartes -->
<!-- Corps de la page avec produits sous forme de cartes -->
<div class="container mt-5">
    <div class="row">
        @foreach ($categoriesAvecProduits as $categorie)
        <div class="col-md-12">
            <h2>{{ $categorie->libelle }}</h2>
        </div>
        @foreach ($categorie->produits as $produit)
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card mt-3 mb-3">
                <img src="{{ $produit->image }}" class="card-img-top" alt="{{ $produit->designation }}">
                <div class="card-body d-flex flex-column">
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
                    <div class="mt-auto">
                        <a href="{{ route('produit.commander', $produit->id) }}" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Ajouter au panier</a>
                        <a href="{{ route('detail', $produit->id) }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> Voir détails</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col">
            {{ $categoriesAvecProduits->links() }}
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

