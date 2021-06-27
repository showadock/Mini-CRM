<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class EmpresasController extends Controller
{

    // Ruta protegida por auth
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empresas = DB::table('empresas')->paginate(10);

        return view('empresas.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = request()->validate([
            'nombre' => 'required', 
            'email' => 'required|email',
            'web' => 'required|min:5',
            'imagen' => 'required|image',
            'cuit' => 'required|min:8'
        ]);
    
        $imgPath = $request['imagen']->store('empresas-logotipos', 'public');

        $imgResize  =   Image::make(public_path("storage/{$imgPath}"))->fit(400,400);
        $imgResize->save();

       DB::table('empresas')->insert([
           'nombre' => $data['nombre'],
           'email' => $data['email'],
           'web' => $data['web'],
           'imagen' => $imgPath,
           'user_id' => Auth::user()->id,
           'cuit' => $data['cuit']
       ]);

       // Redireccionar
       return redirect()->route('empresas.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresas)
    {
        return view('empresas.show', compact('empresas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresas)
    {
        return view('empresas.edit',compact('empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresas $empresas)
    {

        $data = request()->validate([
            'nombre' => 'required', 
            'email' => 'required|email',
            'web' => 'required|min:5',
            'cuit' => 'required|min:8'
        ]);

        $empresas->nombre = $data['nombre'];
        $empresas->email = $data['email'];
        $empresas->web = $data['web'];
        $empresas->cuit = $data['cuit'];


        // Si sube una imagen, la actualizamos
        if(request('imagen'))
        {
            $imgPath = $request['imagen']->store('empresas-logotipos', 'public');

            $imgResize  =   Image::make(public_path("storage/{$imgPath}"))->fit(400,400);
            $imgResize->save();

            $empresas->imagen = $imgPath;
        }

        $empresas->save();


        return redirect()->route('empresas.edit', compact('empresas'))->with('response', 'Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresas $empresas)
    {
        // ELiminar empresa
        $empresas->delete();

        return redirect()->route('empresas.list')->with('message', 'Empresa eliminada');
    }
}
