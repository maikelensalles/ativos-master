<?php

namespace App\Http\Controllers; 

use App\Contrato;
use App\User;
use Illuminate\Http\Request;
use App\ContratoUser;
use App\Http\Requests\ContratoUserRequest;

class ContratoUserController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, ContratoUser $contratouser)
    {
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
        $contratousers = ContratoUser::all();

        return view('pages.contratos.shindexow', compact( 'contratousers')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoUserRequest $request, ContratoUser $model)
    {
        $contratousers = ContratoUser::paginate(25);

        $contratos = Contrato::all();

        $user = User::all();

        $data = $request->all();

        $this->repository->create($data);

        return redirect()->route('contratos.index', compact('contratousers', 'contratos', 'user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $model, $id)
    {
        //
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('pages.contratos.index');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContratoUserRequest $request)
    {
        contratousers()->update($request->all());

        return redirect()->route('contratos.index', compact('contratousers'));
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



}
