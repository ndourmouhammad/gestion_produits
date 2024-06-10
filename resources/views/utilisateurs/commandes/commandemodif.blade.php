<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Kane & Frères</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh; /* Taille minimale de la vue en hauteur */
            display: flex;
            flex-direction: column;
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
        /* Styles spécifiques au formulaire */
        form {
            margin-top: 50px;
            max-width: 550px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border: 1px solid #FF9800;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #FF9800;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #f57c00;
        }

        .content {
            flex: 1; /* Remplissage flexible de l'espace restant */
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

<!-- Contenu de la page -->
<div class="content">
    
    
    @if ($commande->etat_commande == 'valide')
        <p>La commande est déjà validé et vous n'êtes plus en mesure de le changer.</p>
    @else
    <form action="{{ route('commandes.update', $commande->id) }}" method="POST">
        <h3>Commande: {{ $commande->reference }}</h3>
           
            @csrf
    
            <div class="form-group">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ $commande->quantity }}">
                @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="adresse_livraison">Adresse de livraison</label>
                <input type="text" name="adresse_livraison" class="form-control" value="{{ $commande->adresse_livraison }}" >
                @error('adresse_livraison')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ $commande->telephone }}" >
                @error('telephone')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="etat_commande{{ $commande->id }}">État</label>
                <select class="form-control" id="etat_commande{{ $commande->id }}" name="etat_commande">
                    
                    <option value="annule" {{ $commande->etat == 'annule' ? 'selected' : '' }}>annulé</option>
                    <option value="encours" {{ $commande->etat == 'encours' ? 'selected' : '' }}>en cours</option>
                </select>
                @error('etat_commande')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Mettre à jour</button>
        </form> 
    @endif
   

</div>

<!-- Footer -->
<footer class="footer py-3">
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

  