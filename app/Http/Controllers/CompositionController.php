<?php

namespace App\Http\Controllers;

use App\Composition;
use App\Author;
use Illuminate\Http\Request;

class CompositionController extends Controller
{

    public function index()
    {
        $compositions = Composition::paginate(12);
        return view('admin.composition.index', compact('compositions'));
    }


    public function create()
    {
        $authors = Author::all();
        return view('admin.composition.create', compact('authors'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'composition' => 'required',
            'name' => 'string|required',
            'authorSelect' => 'required',
            'date' => 'required|date',
            'description' => 'required|string',
        ]);
            
        $music_file = $request->composition;
           
        if(isset($music_file))
        { 
            $filename = $music_file->getClientOriginalName(); 
            $uploadMusicFile = $music_file->move('composition/',$filename); 

            $composition = Composition::create([
                            'name' => ucfirst($request->get('name')),
                            'description' => ucfirst($request->get('description')),
                            'date' => $request->get('date'),
                            'soundTrack' => $uploadMusicFile
                            ]);
            
            $composition = \DB::table('author_composition')->insert(
                                    ['author_id' => $request->get('authorSelect'),
                                     'composition_id' => $composition->id,
                                     'created_at' => now(),
                                     'updated_at' => now()]
                                );

        }


        if($composition){
            return redirect()->route('composition.index')->with('success', 'Composition has been added successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }

    }


    public function destroy(Composition $composition)
    {
        $composition = Composition::findOrFail($composition->id);
        $composition->authors()->delete();
        $composition->delete();

        return redirect()->route('composition.index')
                    ->with('success', 'Composition Has Been Deleted Successfully.');
    }
}
