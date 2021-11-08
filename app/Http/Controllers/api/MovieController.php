<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Http;
use Config;
class MovieController extends Controller
{
    public function index($page){
        $url;
        if($page===1){
            $url = 'https://api.themoviedb.org/3/trending/movie/week?page=1';
        }else{
            $url= 'https://api.themoviedb.org/3/trending/movie/week?page='.$page;
        }
       $trendingMovies= Http::withHeaders([
           'accept'=>'application/json'
       ])
       ->withToken(config('token.token'))
       ->get($url)
       ->json();
       return $trendingMovies;
    }
    public function show($id){
        $movieDetail= Http::withHeaders([
            'accept'=>'application/json'
        ])
        ->withToken(config('token.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id)
        ->json();
        return $movieDetail;
    }
}
