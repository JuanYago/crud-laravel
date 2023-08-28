@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Ordem de Serviço</h1>
        <form action="{{ route('ordens-de-servico.update', $ordemDeServico->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome_tecnico">Nome do Técnico</label>
                <input type="text" name="nome_tecnico" class="form-control" value="{{ $ordemDeServico->nome_tecnico }}" required>
            </div>
            <div class="form-group">
                <label for="data_solicitacao">Data de Solicitação</label>
                <input type="date" name="data_solicitacao" class="form-control" value="{{ $ordemDeServico->data_solicitacao->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="prazo_atendimento">Prazo de Atendimento</label>
                <input type="date" name="prazo_atendimento" class="form-control" value="{{ $ordemDeServico->prazo_atendimento->format('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="endereco_atendimento">Endereço de Atendimento</label>
                <input type="text" name="endereco_atendimento" class="form-control" value="{{ $ordemDeServico->endereco_atendimento }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pendente" {{ $ordemDeServico->status === 'Pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="Em Andamento" {{ $ordemDeServico->status === 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                    <option value="Concluída" {{ $ordemDeServico->status === 'Concluída' ? 'selected' : '' }}>Concluída</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Ordem de Serviço</button>
        </form>
    </div>
@endsection
