<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories - Produits Alimentaires</title>
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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('accueil') }}">Accueil</a>
            </li>
            <li class="nav-item  active">
                <a class="nav-link" href="{{ route('categories') }}">Catégories</a>
            </li>
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

<!-- Bannière -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://www.equonet.net/photo/art/grande/60211230-44089638.jpg?v=1636729429" class="d-block w-100" alt="Fruits et légumes">
            <div class="carousel-caption d-none d-md-block">
                <h5>Bienvenue dans la page catégorie</h5>
                <p>Dans cette page vous allez découvrir les différentes variétés de nos produits</p>
            </div>
        </div>
</div>

<div class="container mt-5">
    <h1>Dall len ak JAM</h1>
    <div class="row">
        @foreach ($categories as $categorie)
        <div class="col-md-4">
            
            <div class="card mt-5">
                {{-- <img src="https://images.unsplash.com/photo-1634932515818-7f9292c4e149?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="{{ $categorie->libelle }}"> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $categorie->libelle }}</h5>
                    <p class="card-text">{{ $categorie->description }}</p>
                    <a href="#" class="btn btn-primary"><i class="fas fa-info-circle"></i> Découvrir</a>
                </div>
            </div>
            
        </div>
        @endforeach
        <!-- Répéter les cartes pour d'autres produits -->
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