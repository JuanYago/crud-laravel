@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">Painel de Acompanhamento</h1>
    <table class="table table-striped table-bordered mt-3">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Técnico Atribuído</th>
                <th>Tempo de Abertura</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ordensEmAndamento as $os)
            <tr>
                <td>{{ $os->id }}</td>
                <td>{{ $os->nome_tecnico }}</td>
                <td>{{ $os->created_at->diffForHumans() }}</td>
                <td>
                    @if ($os->status === 'Em Andamento')
                    <span class="badge badge-info">{{ $os->status }}</span>
                    @elseif ($os->status === 'Concluído')
                    <span class="badge badge-success">{{ $os->status }}</span>
                    @else
                    <span class="badge badge-secondary">{{ $os->status }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
