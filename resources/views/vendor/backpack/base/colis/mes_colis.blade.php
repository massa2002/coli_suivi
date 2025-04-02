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
                    <td>{{ $c->expediteur->nom }}</td>
                    <td>{{ $c->destinataire->nom }}</td>
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
