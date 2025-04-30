use App\Models\Torrador; // Certifique-se de que o modelo Torrador existe ou ajuste o nome/modelo conforme necessário
use App\Core\Controller;

<?php

namespace App\Controllers;


class TorradorController extends Controller
{
    // Lista todos os torradores
    public function index()
    {
        $torradores = Torrador::all(); // Ajuste o método ou modelo se necessário
        return $this->view('torradores.index', ['torradores' => $torradores]); // Ajuste o caminho da view conforme necessário
    }

    // Mostra um torrador específico
    public function show($id)
    {
        $torrador = Torrador::find($id); // Ajuste o método ou modelo se necessário
        if (!$torrador) {
            return $this->redirect('/torradores'); // Ajuste a rota conforme necessário
        }
        return $this->view('torradores.show', ['torrador' => $torrador]); // Ajuste o caminho da view conforme necessário
    }

    // Exibe o formulário de criação
    public function create()
    {
        return $this->view('torradores.create'); // Ajuste o caminho da view conforme necessário
    }

    // Salva um novo torrador
    public function store()
    {
        $data = $this->request->getPost(); // Ajuste conforme o método de obtenção de dados no seu framework
        Torrador::create($data); // Ajuste o método ou modelo se necessário
        return $this->redirect('/torradores'); // Ajuste a rota conforme necessário
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $torrador = Torrador::find($id); // Ajuste o método ou modelo se necessário
        if (!$torrador) {
            return $this->redirect('/torradores'); // Ajuste a rota conforme necessário
        }
        return $this->view('torradores.edit', ['torrador' => $torrador]); // Ajuste o caminho da view conforme necessário
    }

    // Atualiza um torrador existente
    public function update($id)
    {
        $data = $this->request->getPost(); // Ajuste conforme o método de obtenção de dados no seu framework
        $torrador = Torrador::find($id); // Ajuste o método ou modelo se necessário
        if ($torrador) {
            $torrador->update($data); // Ajuste o método ou modelo se necessário
        }
        return $this->redirect('/torradores'); // Ajuste a rota conforme necessário
    }

    // Remove um torrador
    public function destroy($id)
    {
        $torrador = Torrador::find($id); // Ajuste o método ou modelo se necessário
        if ($torrador) {
            $torrador->delete(); // Ajuste o método ou modelo se necessário
        }
        return $this->redirect('/torradores'); // Ajuste a rota conforme necessário
    }
}

