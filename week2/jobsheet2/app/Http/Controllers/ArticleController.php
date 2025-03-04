<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles(string $id)
    {
        return "artikel no " . $id;
    }
}
