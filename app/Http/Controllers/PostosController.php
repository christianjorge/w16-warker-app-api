<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostoRequest;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\ModelCidades;
use App\Models\ModelPostos;

class PostosController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Passo a var $posto para a view index
        $posto=ModelPostos::paginate(10);
        return view('index',compact('posto'));
    }

    /**
     * Show the form for creating a new resource.
     *-+
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades=ModelCidades::all();
        return view('create',compact('cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostoRequest $request)
    {
        $cad=ModelPostos::create([
            'reservatorio'=>$request->reservatorio,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'cidades_id'=>$request->cidades_id
        ]);

        if($cad){
            if($_SERVER["REQUEST_URI"] != '/api/posto'){
                return redirect('postos');
            }else{
                return $this->success(null,'Inserção efetuada com sucesso!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posto=ModelPostos::find($id);
        if($_SERVER["REQUEST_URI"] != '/api/posto/'.$id){
            return view('show',compact('posto'));
        }else{
            return json_encode($posto);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posto=ModelPostos::find($id);
        $cidades=ModelCidades::all();
        return view('create',compact('posto','cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostoRequest $request, $id)
    {
        ModelPostos::where(['id'=>$id])->update([
            'reservatorio'=>$request->reservatorio,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'cidades_id'=>$request->cidades_id
        ]);
        if($_SERVER["REQUEST_URI"] != '/api/posto/'.$id){
            return redirect('postos');
        }else{
            return $this->success(null,'Atualização efetuada com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=ModelPostos::destroy($id);
        if($_SERVER["REQUEST_URI"] != '/api/posto/'.$id){
            return($del)?"1":"0";
        }else{
            return $this->success(null,'Delete executado!');
        }
    }
}
