<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            /* Vert */
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
            /* Orange */
        }

        .content {
            padding: 2rem;
        }

        .table-wrapper {
            margin-top: 2rem;
        }

        .table-wrapper .btn {
            margin-bottom: 1rem;
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

        <!-- Main content -->
        <div class="content tab-content">
            <!-- Gestion des Catégories -->
            <div class="tab-pane active" id="categories">
                <h2>Gestion des Catégories</h2>
                <div class="table-wrapper">

                    <a href="{{ route('ajoutCategorieForm')}}"><button class="btn btn-warning">Ajouter une catégorie</button></a>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom de la catégorie</th>
                                <th>Description</th>
                                <th>Date d'ajout</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->libelle }}</td>
                                <td>{{ $categorie->description }}</td>
                                <td>{{ $categorie->created_at }}</td>
                                <td>

                                    <a href="{{ route('modifierCategorieForm', $categorie->id) }}"><button class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button></a>
                                    <a href="{{ route('supprimer-categorie', $categorie->id) }}"><button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Gestion des Produits -->
            <div class="tab-pane" id="produits">
                <h2>Gestion des Produits</h2>
                <div class="table-wrapper">

                    <a href="{{ route('ajoutProduitForm')}}"><button class="btn btn-warning">Ajouter un produit</button></a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Référence</th>
                                <th>Désignation</th>
                                <th>Prix unitaire</th>
                                <th>Catégorie</th>
                                <th>L'image</th>
                                <th>L'état du produit</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->id }}</td>
                                <td>{{ $produit->reference }}</td>
                                <td>{{ $produit->designation }}</td>
                                <td>{{ $produit->prix_unitaire }} FCFA</td>
                                <td>{{ $produit->categorie->libelle }}</td>
                                <td><img class="img-fluid" alt="" style="max-width: 100px; max-height: 100px;" src="{{ $produit->image }}" alt=""></td>
                                <td>{{ $produit->etat }}</td>
                                <td>

                                    <a href="{{ route('modifierProduitForm', $produit->id) }}"><button class="btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button></a>

                                    <a href="{{ route('supprimer-produit', $produit->id) }}"><button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Gestion des Commandes -->
            <div class="tab-pane" id="commandes">
                <h2>Gestion des Commandes</h2>
                <div class="table-wrapper">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Référence</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Montant total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les données des commandes seront insérées ici -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Gestion des Utilisateurs -->
            <div class="tab-pane" id="users">
                <h2>Gestion des Utilisateurs</h2>
                <div class="table-wrapper">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#addUserModal">Ajouter un utilisateur</button>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom complet d'utilisateur</th>
                                <th>Email</th>
                                <th>Mot de passe</th>
                                <th>Rôle</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Les données des utilisateurs seront insérées ici -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>