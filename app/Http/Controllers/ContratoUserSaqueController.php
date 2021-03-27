<?php

namespace App\Http\Controllers; 

use App\Http\Requests\ContratoUserSaqueRequest;
use App\Http\Requests\ContratoUserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ContratoUserSaque;
use App\ContratoUser;
use App\Contrato;
use App\User;

class ContratoUserSaqueController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, ContratoUserSaque $contratousersaque)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->request = $request;
        $this->repository = $contratousersaque;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContratoUserSaque $model)
    {
        $contratousersaques = ContratoUserSaque::all();

        $contratousers = ContratoUser::all();
        
        $contratos = Contrato::all();

        $users = User::all();

        return view('pages.resgates.index', compact('contratousersaques', 'contratousers', 'contratos', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contratos = DB::table('contrato_users')

                    ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                    ->get();

        $users = User::all();

        return view('pages.resgates.create', compact('contratos', 'users')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoUserSaqueRequest $request)
    {
        $data = $request->only('saque', 'status_saque');

        $this->repository->create($data);

        return redirect()->route('resgates.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contratousersaque = ContratoUserSaque::all();

        if (!$contratousersaque = $this->repository->find($id))
            return redirect()->back();

        return view('pages.resgates.edit', compact('contratousersaque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContratoUserSaqueRequest $request, $id)
    {   
        if (!$contratousersaque = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        $contratousersaque->update($data);

        return redirect()->route('resgates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
    }
}