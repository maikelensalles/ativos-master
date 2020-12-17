<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\ContratoUserSaque;
use App\ContratoUser;
use App\Contrato;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //SOMAR TOTAL EM ATIVOS
        $contratousers =  ContratoUser::all(); //DB::table('contrato_users')

                        //->join('users', 'contrato_users.user_id', '=', 'users.id')

                        //->select('user_id', DB::raw('sum(valor) as total'))

                        //->groupBy('user_id')

                        //->get();
        
        //SOMAR TOTAL DE RESGATE
        $contratousersaque = ContratoUserSaque::all(); //DB::table('contrato_users_saques')

                        //->join('users', 'contrato_users_saques.user_id', '=', 'users.id')

                        //->select('user_id', DB::raw('sum(saque) as total'))

                        //->where('user_id', '=', Auth::id())

                        //->groupBy('user_id')

                        //->get();

        //SOMAR TOTAL DE RENTABILIDADE ALVO
        $contrato = DB::table('contrato_users')

                            ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                            ->select('contrato_id', DB::raw('sum(rentabilidade_alvo) as total'))

                            ->groupBy('contrato_id')

                            ->get();
                        
         //SOMAR TOTAL DE VALOR ESTIMADO ATUAL
         $estimado = DB::table('contrato_users')

                        ->join('users', 'contrato_users.user_id', '=', 'users.id')

                        ->join('contratos', 'contrato_users.contrato_id', '=', 'contratos.id')

                        ->select('user_id', '=', 'contrato_id')

                        ->select('user_id', DB::raw('sum(rentabilidade_alvo) as rent'), DB::raw('sum(valor) as val'))

                        ->groupBy('user_id')

                        ->get();

        return view('dashboard', compact('estimado', 'contratousers', 'contratousersaque', 'contrato'));
    }
}

