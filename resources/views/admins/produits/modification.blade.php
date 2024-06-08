<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" container="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #4CAF50;
            min-height: 100vh;
            color: #fff;
        }

        .sidebar .nav-link {
            color: #fff;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link.active {
            background-color: #FF9800;
        }

        .container {
            padding: 2rem;
        }

        .form-wrapper {
            margin-top: 2rem;
        }

        .form-wrapper .form-group {
            margin-bottom: 1rem;
        }

        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar navbar-dark">
            <ul class="nav flex-column">
                <li class="nav-item text-center">
                    <h3 class="nav-link">Kane & Frères</h3>
                    <h3 class="nav-link">Mouhammad NDOUR</h3>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link " href="#" data-target="#categories" data-toggle="tab">
                        <i class="fas fa-sitemap mr-2"></i> Gestion des Catégories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-target="#produits" data-toggle="tab">
                        <i class="fas fa-box mr-2"></i> Gestion des Produits
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="#commandes" data-toggle="tab">
                        <i class="fas fa-shopping-cart mr-2"></i> Gestion des Commandes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="#users" data-toggle="tab">
                        <i class="fas fa-users mr-2"></i> Gestion des Utilisateurs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Contenu -->
        <div class="container">
            <h1>Modifier le produit {{ $produit->libelle }}</h1>
            <div class="form-wrapper col-6">
                <form action="{{ route('modifier-produit', $produit->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="1">
                    <div class="form-group">
                        <label for="designation{{ $produit->id }}">Désignation</label>
                        <input type="text" class="form-control" id="designation{{ $produit->id }}" name="designation" value="{{ $produit->designation }}">
                        @error('designation')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="reference{{ $produit->id }}">Référence</label>
                        <input type="text" class="form-control" id="reference{{ $produit->id }}" name="reference" value="{{ $produit->reference }}">
                        @error('reference')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prix_unitaire{{ $produit->id }}">Prix unitaire</label>
                        <input type="number" class="form-control" id="prix_unitaire{{ $produit->id }}" name="prix_unitaire" value="{{ $produit->prix_unitaire }}">
                        @error('prix_unitaire')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categorie_id{{ $produit->id }}">Catégorie</label>
                        <select class="form-control" id="categorie_id{{ $produit->id }}" name="categorie_id">
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->libelle }}</option>
                            @endforeach
                        </select>
                        @error('categorie_id')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image{{ $produit->id }}">Image</label>
                        <input type="url" class="form-control" id="image{{ $produit->id }}" name="image" value="{{ $produit->image }}">
                        @error('image')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="etat{{ $produit->id }}">État</label>
                        <select class="form-control" id="etat{{ $produit->id }}" name="etat">
                            <option value="disponible" {{ $produit->etat == 'disponible' ? 'selected' : '' }}>Disponible</option>
                            <option value="en_rupture" {{ $produit->etat == 'en_rupture' ? 'selected' : '' }}>En rupture</option>
                            <option value="en_stock" {{ $produit->etat == 'en_stock' ? 'selected' : '' }}>En stock</option>
                        </select>
                        @error('etat')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    
                </form>
            </div>
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>