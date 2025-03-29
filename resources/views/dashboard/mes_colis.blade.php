<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Colis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>📦 Mes Colis</h2>

        @if($colis->isEmpty())
            <p>Aucun colis trouvé.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Numéro Suivi</th>
                        <th>Expéditeur</th>
                        <th>Destinataire</th>
                        <th>Poids (kg)</th>
                        <th>Frais Livraison (€)</th>
                        <th>Statut</th>
                        <th>Date Expédition</th>
                        <th>Date Livraison</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colis as $c)
                        <tr>
                            <td>{{ $c->numero_suivi }}</td>
                            <td>{{ $c->expediteur->nom }}</td> <!-- Affichage du nom de l'expéditeur -->
                            <td>{{ $c->destinataire->nom }}</td> <!-- Affichage du nom du destinataire -->
                            <td>{{ $c->poids }}</td>
                            <td>{{ $c->frais_livraison }} €</td>
                            <td>{{ $c->statut }}</td>
                            <td>{{ $c->date_expedition }}</td>
                            <td>{{ $c->date_livraison ?? 'Non livrée' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
