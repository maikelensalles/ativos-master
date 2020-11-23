<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ContratoRequest;
use Illuminate\Http\Request;
use App\ContratoSetor;
use App\Contrato;

class ContratoController extends Controller
{
    protected $request;
    private $contrato;
    private $repository;

    public function __construct(Contrato $contrato, Request $request)
    {
        $this->request = $request;
        $this->repository = $contrato;
        $this->contrato = $contrato;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::paginate(25);

        return view('pages.propostas.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setors = ContratoSetor::all();

        return view('pages.propostas.create', compact('setors'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoRequest $request, Contrato $model)
    {
        $data = $request->only('titulo', 'sub_titulo', 'descricao', 'descricao_longa', 'contrato_setor_id', 'rentabilidade_alvo', 'body', 'body_2', 'valor_captado', 'body_3', 'status', 'valor_cota', 'participacao');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('contratos');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);

        return redirect()->route('propostas.index');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$contrato = $this->repository->find($id))
            return redirect()->back();

        return view('pages.propostas.show', [
            'contrato' => $contrato
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setores = ContratoSetor::all();

        if (!$contrato = $this->repository->find($id))
            return redirect()->back();

        return view('pages.propostas.edit', compact('contrato', 'setores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoRequest $request, $id)
    {
        if (!$contrato = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {

            if ($contrato->image && Storage::exists($contrato->image)) {
                Storage::delete($contrato->image);
            }

            $imagePath = $request->image->store('novidades');
            $data['image'] = $imagePath;
        }

        $contrato->update($data);

        return redirect()->route('propostas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = $this->repository->where('id', $id)->first();
        if (!$contrato)
            return redirect()->back();
    
        if ($contrato->image && Storage::exists($contrato->image)) {
            Storage::delete($contrato->image);
        }

        $contrato->delete();

        return redirect()->route('propostas.index');
    }

    public function single($slug)
    {
        $contrato = $this->contrato->whereSlug($slug)->first();

        return view('single', compact('contrato'));
    }
}