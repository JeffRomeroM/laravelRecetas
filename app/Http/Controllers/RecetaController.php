<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use App\Models\Receta;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->Middleware('auth');
    }

    public function index()
    {

        $recetas = auth()->user()->recetas;

        return view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // DB::table('categoria_receta')->get()->pluck('id', 'nombre')->dd();
        //Obtener las categorias sin modelo
        // $categorias = DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        //Obtener las categorias con modelo
        $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('recetas.create')->with('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     */

    

    public function store(Request $request)
    {
        //dd( $request['imagen']->store('upload-recetas', 'public'));
 
        $data = $request->validate([
            'titulo'=> 'required|min:6',
            'categoria'=> 'required',
            'preparacion'=> 'required',
            'ingredientes'=> 'required',
            //'imagen'=> 'required|image|size:1200'
        ]);

        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');

        // $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        // $img->save();
        
        //Almacenar en la base de datos sin modelo
        // DB::table('recetas')->insert([
        //     'titulo'=> $data['titulo'],
        //     'preparacion'=> $data['preparacion'],
        //     'ingredientes'=> $data['ingredientes'],
        //     'imagen'=> $ruta_imagen,
        //     'user_id'=> Auth::user()->id,
        //     'categoria_id'=> $data['categoria']

        // ]);
        
        //Almacenar en la base de datos con modelo
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
        ]);
        


        //redireccion
        return redirect()->action([RecetaController::class, 'Store']);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
