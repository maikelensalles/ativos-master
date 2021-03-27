<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\NovidadeRequest;
use Illuminate\Http\Request;
use App\Novidade;

class NovidadeController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Novidade $novidade)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->request = $request;
        $this->repository = $novidade;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novidades = Novidade::paginate(25);

        return view('pages.novidades.index', compact('novidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.novidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NovidadeRequest $request)
    {
        $data = $request->only('titulo', 'sub_titulo', 'descricao', 'descricao_longa', 'image', 'descricao_media', 'obs');

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('novidades');

            $data['image'] = $imagePath;
        }

        $this->repository->create($data);


        return redirect()->route('novidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        if (!$novidade = $this->repository->find($id))
            return redirect()->back();

        return view('pages.novidades.edit', compact('novidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NovidadeRequest $request, $id)
    {
        if (!$novidade = $this->repository->find($id))
            return redirect()->back();

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {

            if ($novidade->image && Storage::exists($novidade->image)) {
                Storage::delete($novidade->image);
            }

            $imagePath = $request->image->store('novidades');
            $data['image'] = $imagePath;
        }

        $novidade->update($data);

        return redirect()->route('novidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novidade = $this->repository->where('id', $id)->first();
        if (!$novidade)
            return redirect()->back();

        if ($novidade->image && Storage::exists($novidade->image)) {
            Storage::delete($novidade->image);
        }
    
        $novidade->delete();

        return redirect()->route('novidades.index');
    }
}
