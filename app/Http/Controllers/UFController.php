<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UF;

class UFController extends Controller
{

    protected $uf; // Declara una propiedad protegida llamada $uf.
    public function __construct(){ // Define un constructor para la clase UFController.
        $this->uf = new UF(); // Inicializa la propiedad $uf creando una nueva instancia de la clase UF.
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->uf->all(); // Devuelve todos los registros de UF utilizando el método all() del modelo UF.
    }
}