<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Http\Requests\DimensionRequest;

class DimensionController extends Controller
{
    /**
     * Exibe a listagem de dimensões.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('dimensions.index');
    }

    /**
     * Pesquisa e pagina os registros de dimensões.
     *
     * @return void
     */
    public function search()
    {
        return Dimension::orderBy('title')->paginate(10);
    }

    /**
     * Exibe a página de criação de dimensões.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dimensions.create');
    }

    /**
     * Cadastra uma nova dimensão.
     *
     * @param  DimensionRequest $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(DimensionRequest $request)
    {
        $data = $request->only('title');
        Dimension::create($data);

        return redirect('/dimensions')->withSuccess('A dimensão foi adicionada com sucesso!');
    }

    /**
     * Exibe a página para editar a dimensão.
     *
     * @param  Dimension $dimension
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Dimension $dimension)
    {
        return view('dimensions.edit', ['dimension' => $dimension]);
    }

    /**
     * Atualiza uma dimensão.
     *
     * @param  DimensionRequest $request
     * @param  Dimension $dimension
     * @return \Illuminate\Routing\Redirector
     */
    public function update(DimensionRequest $request, Dimension $dimension)
    {
        $data = $request->only('title');
        $dimension->update($data);

        return redirect('/dimensions')->withSuccess('A dimensão foi editada com sucesso!');
    }

    /**
     * Remove uma dimensão
     *
     * @param  Dimension $dimension
     * @return void
     */
    public function destroy(Dimension $dimension)
    {
        if ($dimension->canDelete()) {
            $dimension->delete();
        } else {
            abort(400, "Não é possível remover a dimensão. Existe pelo menos uma pergunta relacionada a ela.");
        }
    }
}
