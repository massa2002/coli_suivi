@extends(backpack_view('layouts.top_left'))

@section('header')
    <section class="container-fluid">
        <h2>Historique du colis #{{ $colis->numero_suivi }}</h2>
    </section>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Commentaire</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historique as $event)
                        <tr>
                            <td>{{ $event->statut }}</td>
                            <td>{{ $event->date_historique }}</td>
                            <td>{{ $event->commentaire }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection