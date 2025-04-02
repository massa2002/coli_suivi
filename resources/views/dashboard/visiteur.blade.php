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
            background: #000;
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
           
            <!-- Ajouter un lien vers la page "Mes Colis" -->
            <li class="nav-item">
                <a href="#" class="nav-link">Mes Colis</a>
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
    <div class="content" id="main-content">
    
</div>

</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    function chargerPage(url) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                document.getElementById("main-content").innerHTML = html;
            })
            .catch(error => console.error("Erreur lors du chargement :", error));
    }

    // Charger "Mes Colis" automatiquement au démarrage
    chargerPage("{{ route('mes.colis') }}");

    // Ajouter l'événement de clic pour le menu "Mes Colis"
    document.getElementById("mes-colis-link").addEventListener("click", function(event) {
        event.preventDefault();
        chargerPage("{{ route('mes.colis') }}");
    });
});
</script>

</body>
</html>
