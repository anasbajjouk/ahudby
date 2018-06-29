<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function search(Request $request){
        
        /*$name = $request->get('table_search');
        $authors = Author::SearchByName($name)->get();

        foreach($authors as $author){
           $data[] = $author->name ? $author->name : 0;
           
        if(!($data)){ dd( "d");}

        }
        return $data;*/

        $search = $request->table_search;

        if (is_null($search))
        {
           //return view('admin.author.index');		   
           return 'd';

        }else{
            $posts = Author::where('name','LIKE',"%{$search}%")
                           ->get();

            return view('admin.author.indexSearch',compact('posts'));
        }
    

    }

}