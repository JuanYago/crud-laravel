@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nova Ordem de Serviço</h1>
        <form action="{{ route('ordens-de-servico.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome_tecnico">Nome do Técnico</label>
                <input type="text" name="nome_tecnico" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="data_solicitacao">Data de Solicitação</label>
                <input type="date" name="data_solicitacao" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prazo_atendimento">Prazo de Atendimento</label>
                <input type="date" name="prazo_atendimento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endereco_atendimento">Endereço de Atendimento</label>
                <input type="text" name="endereco_atendimento" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Pendente">Pendente</option>
                    <option value="Em Andamento">Em Andamento</option>
                    <option value="Concluída">Concluída</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Criar Ordem de Serviço</button>
        </form>
    </div>
@endsection
