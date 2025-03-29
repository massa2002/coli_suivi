@extends(backpack_view('blank'))

@php
    // Widget de bienvenue ou "Getting Started"
    if (backpack_theme_config('show_getting_started')) {
        $widgets['before_content'][] = [
            'type'        => 'view',
            'view'        => backpack_view('inc.getting_started'),
        ];
    } else {
        $widgets['before_content'][] = [
            'type'        => 'jumbotron',
           
            
        ];
    }
    $stats = [
        ['class' => 'bg-primary', 'value' => \App\Models\Colis::count(), 'description' => 'Colis totaux'],
        ['class' => 'bg-info', 'value' => \App\Models\Colis::sum('frais_livraison'), 'description' => 'Total des frais de livraison'],
        ['class' => 'bg-warning', 'value' => \App\Models\User::count(), 'description' => 'Nombre d\'utilisateurs'],
        ['class' => 'bg-danger', 'value' => \App\Models\Expediteur::count(), 'description' => 'Nombre d\'expéditeurs'],
        ['class' => 'bg-success', 'value' => \App\Models\Destinataire::count(), 'description' => 'Nombre de destinataires']
    ];
@endphp

@section('content')
    <div class="row">
        @foreach ($stats as $stat)
            <div class="col-md-4 mb-3">
                <div class="card text-white {{ $stat['class'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $stat['value'] }}</h5>
                        <p class="card-text">{{ $stat['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card bg-white mb-2">
                <div class="card-header">
                    <h3>Colis récents</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Numéro de suivi</th>
                                <th>Expéditeur</th>
                                <th>Destinataire</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Colis::orderBy('created_at', 'desc')->take(5)->get() as $colis)
                                <tr>
                                    <td>{{ $colis->numero_suivi }}</td>
                                    <td>{{ $colis->expediteur->nom }}</td>
                                    <td>{{ $colis->destinataire->nom }}</td>
                                    <td>{{ $colis->statut }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection