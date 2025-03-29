<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Visiteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        .d-flex {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #007bff;
            padding-top: 20px;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
        }
        .sidebar h4 {
            color: white;
            text-align: center;
            font-weight: bold;
        }
        .nav-link {
            color: white;
            padding: 12px;
            display: block;
            font-size: 16px;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .content {
            margin-left: 250px;
            padding: 40px;
            width: 100%;
        }
        .btn-danger {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Barre latérale -->
    <nav class="sidebar">
        <h4>Tableau de bord</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link">📤 Expéditeur</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">📩 Destinataire</a>
            </li>
            <!-- Ajouter un lien vers la page "Mes Colis" -->
            <li class="nav-item">
                <a href="{{ route('mes.colis') }}" class="nav-link">📦 Mes Colis</a>
            </li>
            <li class="nav-item">
                <form action="{{ route('custom.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-4">Déconnexion</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Contenu principal -->
    <div class="content">
        <h2>Bienvenue sur le Dashboard Visiteur</h2>
        <p>Vous êtes connecté en tant que visiteur.</p>
    </div>
</div>

</body>
</html>
