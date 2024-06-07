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
            background-color: #4CAF50; /* Vert */
            min-height: 100vh;
            color: #fff;
        }
        .sidebar .nav-link {
            color: #fff;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link.active {
            background-color: #FF9800; /* Orange */
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
                <h3 class="nav-link">Kane&Frères</h3>
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
            <!-- ... -->
        </div>

        <!-- Gestion des Produits -->
        <div class="tab-pane" id="produits">
            <!-- ... -->
        </div>

        <!-- Gestion des Commandes -->
        <div class="tab-pane" id="commandes">
            <!-- ... -->
        </div>

        <!-- Gestion des Utilisateurs -->
        <div class="tab-pane" id="users">
            <!-- ... -->
        </div>
    </div>
</div>

<!-- Modals -->
<!-- ... -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
