<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\{Question, Dimension};
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Exibe a listagem de perguntas.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dimensions = Dimension::all();

        return view('questions.index', ['dimensions' => $dimensions]);
    }

    /**
     * Pesquisa e pagina os registros de perguntas.
     *
     * @param Request $request
     * @return void
     */
    public function search(Request $request)
    {
        $query = Question::query();

        // Filtro por dimensão
        if ($request->input('dimension')) {
            $query->where('dimension_id', $request->dimension);
        }

        return $query->with('dimension')->paginate(10);
    }

    /**
     * Exibe a página de criação de perguntas.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $dimensions = Dimension::all();
        return view('questions.create', ['dimensions' => $dimensions]);
    }

    /**
     * Cadastra uma nova pergunta.
     *
     * @param  QuestionRequest $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(QuestionRequest $request)
    {
        $data = $request->only('dimension_id', 'title', 'active');
        $data['active'] = $data['active'] ?? false;
        Question::create($data);

        return redirect('/questions')->withSuccess('A pergunta foi adicionada com sucesso!');
    }

    /**
     * Exibe a página para editar a pergunta.
     *
     * @param  Question $question
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Question $question)
    {
        $dimensions = Dimension::all();
        return view('questions.edit', ['question' => $question, 'dimensions' => $dimensions]);
    }

    /**
     * Atualiza uma pergunta.
     *
     * @param  QuestionRequest $request
     * @param  Question $question
     * @return \Illuminate\Routing\Redirector
     */
    public function update(QuestionRequest $request, Question $question)
    {
        $data = $request->only('dimension_id', 'title', 'active');
        $data['active'] = $data['active'] ?? false;
        $question->update($data);

        if ($request->ajax()) {
            return $question;
        }

        return redirect('/questions')->withSuccess('A pergunta foi editada com sucesso!');
    }

    /**
     * Remove uma pergunta
     *
     * @param  Question $question
     * @return void
     */
    public function destroy(Question $question)
    {
        $question->delete();
    }
}
