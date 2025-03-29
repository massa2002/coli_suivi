@extends(backpack_view('layouts.top_left'))

@section('header')
    <section class="container-fluid">
        <h2>Mes Colis</h2>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($colis->isEmpty())
                <div class="alert alert-info">
                    Vous n'avez aucun colis pour le moment.
                </div>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Numéro de suivi</th>
                            <th>Expéditeur</th>
                            <th>Poids (kg)</th>
                            <th>Frais de livraison</th>
                            <th>Statut</th>
                            <th>Date d'expédition</th>
                            <th>Date de livraison</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colis as $coli)
                            <tr>
                                <td>{{ $coli->numero_suivi }}</td>
                                <td>{{ $coli->expediteur->nom }}</td>
                                <td>{{ $coli->poids }}</td>
                                <td>{{ $coli->frais_livraison }} €</td>
                                <td>{{ $coli->statut }}</td>
                                <td>{{ $coli->date_expedition }}</td>
                                <td>{{ $coli->date_livraison }}</td>
                                <td>
                                    <a href="{{ route('colis.historique', $coli->id) }}" class="btn btn-sm btn-primary">
                                        Voir l'historique
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection