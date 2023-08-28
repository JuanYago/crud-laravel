<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\OrdemDeServico;
use Carbon\Carbon;

class OrdemDeServicoController extends Controller
{
    // Listar todas as Ordens de Serviço
    public function index()
    {
        $ordensDeServico = OrdemDeServico::all();

        // Converter as datas em objetos Carbon
        $ordensDeServico->transform(function ($ordemDeServico) {
            $ordemDeServico->data_solicitacao = Carbon::parse($ordemDeServico->data_solicitacao);
            $ordemDeServico->prazo_atendimento = Carbon::parse($ordemDeServico->prazo_atendimento);
            return $ordemDeServico;
        });

        return view('ordens-de-servico.index', compact('ordensDeServico'));
    }

    public function create()
    {
        return view('ordens-de-servico.create');
    }

    //Salvar nova Ordem de Serviço
    public function store(Request $request)
    {

        $request->validate([
            'nome_tecnico' => 'required',
            'data_solicitacao' => 'required|date',
            'prazo_atendimento' => 'required|date',
            'endereco_atendimento' => 'required',
            'status' => 'required',
        ]);

        // Crie uma nova instância da OrdemDeServico e preencha os atributos
        $ordemDeServico = new OrdemDeServico();
        $ordemDeServico->nome_tecnico = $request->input('nome_tecnico');
        $ordemDeServico->data_solicitacao = Carbon::createFromFormat('Y-m-d', $request->input('data_solicitacao'));
        $ordemDeServico->prazo_atendimento = Carbon::createFromFormat('Y-m-d', $request->input('prazo_atendimento'));
        $ordemDeServico->endereco_atendimento = $request->input('endereco_atendimento');
        $ordemDeServico->status = $request->input('status');
        $ordemDeServico->save();

        return redirect()->route('ordens-de-servico.index')->with('success', 'Ordem de Serviço criada com sucesso!');
    }


    public function edit($ordens_de_servico)
    {
        $ordemDeServico = OrdemDeServico::find($ordens_de_servico);
        $ordemDeServico->data_solicitacao = Carbon::parse($ordemDeServico->data_solicitacao);
        $ordemDeServico->prazo_atendimento = Carbon::parse($ordemDeServico->prazo_atendimento);
        return view('ordens-de-servico.edit', compact('ordemDeServico'));
    }

    // Atualizar Ordem de Serviço
    public function update(Request $request, $ordens_de_servico)
    {
        // Validação dos campos
        $request->validate([
            'nome_tecnico' => 'required',
            'data_solicitacao' => 'required|date',
            'prazo_atendimento' => 'required|date',
            'endereco_atendimento' => 'required',
            'status' => 'required',
        ]);


        $ordemDeServico = OrdemDeServico::find($ordens_de_servico);

        // Verifique se a ordem de serviço foi encontrada
        if (!$ordemDeServico) {
            return redirect()->route('ordens-de-servico.index')->with('error', 'Ordem de Serviço não encontrada.');
        }

        // Atualize os atributos da ordem de serviço com os dados do formulário
        $ordemDeServico->nome_tecnico = $request->input('nome_tecnico');
        $ordemDeServico->data_solicitacao = Carbon::createFromFormat('Y-m-d', $request->input('data_solicitacao'));
        $ordemDeServico->prazo_atendimento = Carbon::createFromFormat('Y-m-d', $request->input('prazo_atendimento'));
        $ordemDeServico->endereco_atendimento = $request->input('endereco_atendimento');
        $ordemDeServico->status = $request->input('status');
        $ordemDeServico->save();


        return redirect()->route('ordens-de-servico.index')->with('success', 'Ordem de Serviço atualizada com sucesso.');
    }

    // Exibir Ordem de Serviço
    public function painel()
    {
        $ordensEmAndamento = OrdemDeServico::where('status', 'Em Andamento')->get();


        // Converter as datas em objetos Carbon
        $ordensEmAndamento->transform(function ($ordemDeServico) {
            $ordemDeServico->data_solicitacao = Carbon::parse($ordemDeServico->data_solicitacao);
            $ordemDeServico->prazo_atendimento = Carbon::parse($ordemDeServico->prazo_atendimento);
            return $ordemDeServico;
        });

        return view('ordens-de-servico.painel', compact('ordensEmAndamento'));
    }

    // Deletar Ordem de Serviço
    public function destroy($ordens_de_servico)
    {
        // Busque a ordem de serviço pelo ID
        $ordemDeServico = OrdemDeServico::find($ordens_de_servico);

        // Verifique se a ordem de serviço foi encontrada
        if (!$ordemDeServico) {
            return redirect()->route('ordens-de-servico.index')->with('error', 'Ordem de Serviço não encontrada.');
        }

        $ordemDeServico->delete();

        return redirect()->route('ordens-de-servico.index')->with('success', 'Ordem de Serviço excluída com sucesso.');
    }
}
