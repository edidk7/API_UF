<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UF;

class UFController extends Controller
{

    protected $uf;
    public function __construct(){
        $this->uf = new UF();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->uf->all();
    }
}