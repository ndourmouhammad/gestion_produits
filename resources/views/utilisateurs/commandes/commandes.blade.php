<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - commandes Alimentaires</title>
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
        
    /* Styles pour le footer */
    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 10px 0;
    }

    /* Styles pour le corps de la page */
    body {
        margin-bottom: 60px; /* Ajoute une marge en bas égale à la hauteur du footer */
    }


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
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('categories') }}">Catégories</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('produits') }}">Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('commandes')}}">Commandes</a>
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
            <img src="https://img.freepik.com/photos-gratuite/bouteille-lait-verre-classique_23-2150734435.jpg?t=st=1717741465~exp=1717745065~hmac=4dd6544241d8a4e0e385da4f7606d3f2581225823f73045b8aa86141623344f8&w=1380" class="d-block w-100" alt="commandes laitiers">
            <div class="carousel-caption d-none d-md-block">
                <h5>commandes Laitiers</h5>
                <p>Dégustez nos commandes laitiers frais et savoureux, riches en calcium.</p>
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

<!-- Corps de la page avec commandes sous forme de cartes -->

    <div class="container">
        <h1 class="mt-5">Mes commande</h1>
        <div class="card mt-5">
            
            @foreach ($commandes as $commande)
                <div class="card-header">
                    <h1>Commande numéro {{ $commande->id }}</h1>
                </div>
                @foreach ($commande->produits as $produit)
                    <div class="d-flex">
                        <img src="{{ $produit->image }}" class="card-img-top w-50 mx-auto" alt="{{ $produit->designation }}">
                        <div class="card-body">
                            <p>Désignation du produit commandé : {{ $produit->designation }} </p>
                            <p>Date de la commande: {{ $commande->created_at->format('d/m/Y') }}</p>
                            <p>Référence de la commande : {{ $commande->reference }}</p>
                            <p>Référence du produit : {{ $produit->reference }}</p>
                            <p>Prix unitaire : {{ $produit->prix_unitaire }} FCFA</p>
                            <p>Montant total : {{ $commande->montant_total }} FCFA</p>
                            <p>Adresse de livraison : {{ $commande->adresse_livraison }}</p>
                            <p>Numéro téléphone : {{ $commande->telephone }}</p>
                            <p>Catégorie : {{ $produit->categorie->libelle }} </p>
                            <div class="status-badge mb-2">
                                @if ($commande->etat_commande == 'valide')
                                    <span class="badge bg-success text-white">Etat : validé</span>
                                @elseif ($commande->etat_commande == 'annule')
                                    <span class="badge bg-danger text-white">Etat : annulé</span>
                                @else
                                    <span class="badge bg-warning text-white">Etat : en cours</span>
                                @endif
                                
                            </div>
                            <div class="mt-5">
                                <a href="{{ route('commandes.edit', $commande->id)}}" class="btn btn-primary"></i> Modifier</a>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach  
        </div>
        <div class="row">
            <div class="col">
                {{ $commandes->links() }}
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

