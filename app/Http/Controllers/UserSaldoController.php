<?php

namespace App\Http\Controllers; 

use App\Http\Requests\UserSaldoRequest;
use Illuminate\Http\Request;
use App\ContratoUser;
use App\UserSaldo;
use App\User;

class UserSaldoController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, UserSaldo $usersaldo)
    {
        $this->request = $request;
        $this->repository = $usersaldo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserSaldo $model)
    {
        $usersaldos = UserSaldo::paginate(25);

        return view('pages.saldos.index', compact('usersaldos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        $contratouser = ContratoUser::all();

        return view('pages.saldos.create', compact('user', 'contratouser')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSaldoRequest $request)
    {
        $data = $request->only('saldo', 'contrato_id', 'user_id');

        $this->repository->create($data);

        return redirect()->route('saldos.index');
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
        $usersaldo = UserSaldo::all();

        if (!$usersaldo = $this->repository->find($id))
            return redirect()->back();

        return view('pages.saldos.edit', compact( 'usersaldo'));
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
        if (!$usersaldo = $this->repository->find($id))
        return redirect()->back();

        $data = $request->all();

        $usersaldo->update($data);

        return redirect()->route('saldos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $usersaldo = $this->repository->where('id', $id)->first();

        if (!$usersaldo)
            return redirect()->back();

        $usersaldo->delete();

        return redirect()->route('saldos.index');
    }
}
