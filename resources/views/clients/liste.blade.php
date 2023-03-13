@extends('layouts.app')
@section('titre', 'Liste de clients')
@section('main')
    <div class="d-flex justify-content-end mt-5">

        <h6>liste de clients</h6>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>prenom</th>
                            <th>nom</th>
                            <th colspan="3">action</th>
                        </tr>
                    </thead>

                    <body>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->prenom }}</td>
                                <td>{{ $client->nom }}</td>
                                <td colspan="3">
                                    <a href="/clients/{{ $client->id }}" class="btn btn-sm btn-warning">
                                        modifier
                                    </a>
                                    <a href="/clients/rating/{{ $client->id }}" class="btn btn-sm btn-success">
                                        rating
                                    </a>
                                    <a href="/clients/supprimer/{{ $client->id }}" class="btn btn-sm btn-danger">
                                        supprimer
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </body>
                </table>
            </div>
        </div>
    </div>
@endsection
