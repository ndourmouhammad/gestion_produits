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
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #fff;
            display: flex;
            align-items: center;
            padding: 10px 20px;
        }

        .sidebar .nav-link.active {
            background-color: #FF9800;
            border-radius: 0 30px 30px 0;
        }

        .container {
            padding: 2rem;
            flex-grow: 1;
        }

        .form-wrapper {
            margin-top: 2rem;
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-wrapper .form-group {
            margin-bottom: 1rem;
        }

        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .header-title {
            margin-bottom: 2rem;
            color: #4CAF50;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
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
            <div class="form-wrapper">
                <h2 class="header-title">Modifier la commande: {{ $commande->reference }}</h2>
                <form action="{{ route('commandes.etat.traitement', $commande->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="etat_commande{{ $commande->id }}">État</label>
                        <select class="form-control" id="etat_commande{{ $commande->id }}" name="etat_commande">
                            <option value="valide" {{ $commande->etat == 'valide' ? 'selected' : '' }}>validé</option>
                            <option value="annule" {{ $commande->etat == 'annule' ? 'selected' : '' }}>annulé</option>
                            <option value="encours" {{ $commande->etat == 'encours' ? 'selected' : '' }}>en cours</option>
                        </select>
                        @error('etat_commande')
                            <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
