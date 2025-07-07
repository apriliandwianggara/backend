<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController; // INI BARIS KRUSIAL

class Controller extends BaseController // INI JUGA KRUSIAL
{
    use AuthorizesRequests, ValidatesRequests;
}
