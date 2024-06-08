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
                    <a class="nav-link active" href="#" data-target="#categories" data-toggle="tab">
                        <i class="fas fa-sitemap mr-2"></i> Gestion des Catégories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-target="#produits" data-toggle="tab">
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
            <h1>Modifier la catégorie {{ $categorie->libelle }}</h1>
            <div class="form-wrapper col-6">
                <form action="{{ route('modifier-categorie', $categorie->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="1">
                    <div class="form-group">
                        <label for="libelle">Libellé</label>
                        <input type="text" class="form-control" id="libelle{{ $categorie->id }}" name="libelle" value="{{ $categorie->libelle }}">
                        @if ($errors->has('libelle'))
                            <div class="error text-danger">{{ $errors->first('libelle') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description{{ $categorie->id }}" name="description">{{ $categorie->description }}</textarea>
                        @if ($errors->has('description'))
                            <div class="error text-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-warning">Modifier</button>
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
