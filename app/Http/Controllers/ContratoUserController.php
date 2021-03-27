<?php

namespace App\Http\Controllers; 

use App\Http\Requests\ContratoUserRequest;
use Illuminate\Http\Request;
use App\ContratoUser;
use App\Contrato;
use App\User;

class ContratoUserController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, ContratoUser $contratouser)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->request = $request;
        $this->repository = $contratouser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContratoUser $model)
    {
        $contratousers = ContratoUser::paginate(25);

        $contratos = Contrato::all();

        return view('pages.contratos.index', compact('contratousers', 'contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.propostas.show', compact('user', 'contratos')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoUserRequest $request, ContratoUser $user)
    {
        $data = $request->only('status');

        $this->repository->create($data);

        return redirect()->route('contratos.index');
    }

    /**
     * Display the specified resource.
     * 
     *
     * @param  int  $idtouser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratouser = ContratoUser::all();

        $contrato = Contrato::all();

        return view('pages.contratos.show', compact( 'contratouser', 'contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contratouser = ContratoUser::all();

        if (!$contratouser = $this->repository->find($id))
            return redirect()->back();

        return view('pages.contratos.edit', compact( 'contratouser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        if (!$contratouser = $this->repository->find($id))
        return redirect()->back();

        $data = $request->all();

        $contratouser->update($data);

        return redirect()->route('contratos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $contratouser = $this->repository->where('id', $id)->first();

        if (!$contratouser)
            return redirect()->back();

        $contratouser->delete();

        return redirect()->route('contratos.index');
    }
    
    public function saque(ContratoUser $model)
    {
        $contratousers = ContratoUser::paginate(25);

        $contratos = Contrato::all();

        return view('pages.saques.saque', compact('contratousers', 'contratos'));
    }

   
    public function sacar($id)
    {
        $contratouser = ContratoUser::all();

        if (!$contratouser = $this->repository->find($id))
            return redirect()->back();

        return view('pages.saques.sacar', compact('contratouser'));
    }

    public function salvar(Request $request, $id)
    {   
        if (!$contratouser = $this->repository->find($id))
        return redirect()->back();

        $data = $request->all();

        $contratouser->update($data);

        return redirect()->route('saques.saque');
    }

    public function editar(ContratoUser $id)
    {
        $contratouser = ContratoUser::all();

        if (!$contratouser = $this->repository->find($id))
            return redirect()->back();

        return view('pages.contrato.editar', compact( 'contratouser'));
    }

    public function upar(ContratoUserRequest $request, $id)
    {   
        if (!$contratouser = $this->repository->find($id))
        return redirect()->back();

        $data = $request->all();

        $contratouser->update($data);

        return redirect()->route('resgates.index');
    }
}
