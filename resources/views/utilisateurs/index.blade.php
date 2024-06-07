<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil - Produits Alimentaires</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
    </style>
</head>
<body>

<!-- Barre de navigation -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Kane&Frères</a>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Catégories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Commandes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Historique des commandes</a>
            </li>
        </ul>
    </div>
    <div class="auth-buttons">
        <a href="#" class="btn btn-outline-light">Connexion</a>
        <a href="#" class="btn btn-outline-light">Inscription</a>
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
            <img src="https://img.freepik.com/photos-premium/nourriture-saine-boeuf-cru-saumon-filet-poulet-fruits-legumes_156140-6233.jpg?w=1380" class="d-block w-100" alt="Viandes et Poissons">
            <div class="carousel-caption d-none d-md-block">
                <h5>Viandes et Poissons</h5>
                <p>Savourez nos viandes et poissons de haute qualité, pour une alimentation équilibrée.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://img.freepik.com/photos-premium/cocktail-alcoolise-fruits-glace_200402-13662.jpg?w=1380" class="d-block w-100" alt="Boissons">
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
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produit 1">
                <div class="card-body">
                    <h5 class="card-title">Produit 1</h5>
                    <p class="card-text">Description courte du produit 1.</p>
                    <p class="card-text"><strong>Prix: 4.500 FCFA</strong></p>
                    <a href="#" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Ajouter au panier</a>
                    <a href="#" class="btn btn-primary"><i class="fas fa-info-circle"></i> Voir détails</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produit 2">
                <div class="card-body">
                    <h5 class="card-title">Produit 2</h5>
                    <p class="card-text">Description courte du produit 2.</p>
                    <p class="card-text"><strong>Prix: 10.000 FCFA</strong></p>
                    <a href="#" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Ajouter au panier</a>
                    <a href="#" class="btn btn-primary"><i class="fas fa-info-circle"></i> Voir détails</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produit 3">
                <div class="card-body">
                    <h5 class="card-title">Produit 3</h5>
                    <p class="card-text">Description courte du produit 3.</p>
                    <p class="card-text"><strong>Prix: 25.000 FCFA</strong></p>
                    <a href="#" class="btn btn-primary"><i class="fas fa-cart-plus"></i> Ajouter au panier</a>
                    <a href="#" class="btn btn-primary"><i class="fas fa-info-circle"></i> Voir détails</a>
                </div>
            </div>
        </div>
        <!-- Répéter les cartes pour d'autres produits -->
    </div>
</div>

<!-- Footer -->
<footer class="footer mt-5 py-3">
    <div class="container text-center">
        <span class="text-white">© 2024 Produits Alimentaires</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html> 

