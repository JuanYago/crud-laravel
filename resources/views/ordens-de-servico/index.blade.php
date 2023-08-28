@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ordens de Serviço</h1>
        <a href="{{ route('painel') }}" class="btn btn-info">Painel de Acompanhamento</a>
        <a href="{{ route('ordens-de-servico.create') }}" class="btn btn-primary">Nova Ordem de Serviço</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome do Técnico</th>
                    <th>Data de Solicitação</th>
                    <th>Prazo de Atendimento</th>
                    <th>Endereço de Atendimento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ordensDeServico as $os)
                    <tr>
                        <td>{{ $os->id }}</td>
                        <td>{{ $os->nome_tecnico }}</td>
                        <td>{{ $os->data_solicitacao->format('d/m/Y') }}</td>
                        <td>{{ $os->prazo_atendimento->format('d/m/Y') }}</td>
                        <td>{{ $os->endereco_atendimento }}</td>
                        <td>{{ $os->status }}</td>
                        <td>
                        <a href="{{ route('ordens-de-servico.edit', $os->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('ordens-de-servico.destroy', $os->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
