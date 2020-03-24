<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetArticleController extends Controller
{
    public function __invoke()
    {
        return response()->json("This is article page");
    }
}
