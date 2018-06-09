<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use App\Photo;

class AuthorController extends Controller
{

    // USER NORMAL VIEW 
    public function userIndex()
    {
        $authors = Author::paginate(12);
        return view('front.author.authorList', compact('authors'));
    }

        public function userShow(Author $author)
    {
        $author = Author::findOrFail($author->id);
        $authorCompositions = $author->compositions;
        $authorVideos = $author->videos;
        return view('front.author.authorDetail', compact('author', 'authorCompositions', 'authorVideos'));
    }

    // ADMIN VIEW

    public function index(){

        $authors = Author::paginate(12);
        return view('admin.author.index', compact('authors'));
    }


    public function create()
    {
        return view('admin.author.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'birthdate' => 'required|date',
            'deathdate' => 'required|date',
            'externalLink' => 'url|nullable',
            'bio' => 'required|string',
        ]);


        $author = Author::create([
                    'name' => ucfirst($request->get('name')),
                    'bio' => ucfirst($request->get('bio')),
                    'bd' => $request->get('birthdate'),
                    'deathdate' => $request->get('deathdate'),
                    'externalLink' => $request->get('externalLink'),
                ]);

        $images = $request->file('images');
        

        if($images){
            foreach ($images as $image) {
                $imageName = time() . '-' .$image->getClientOriginalName();
                $imageFile = $image->move('images/author_img',$imageName);
                Photo::create([
                    'name' => ucfirst($request->get('imageName')),
                    'description' => ucfirst($request->get('imageDescription')),
                    'author_id' => $author->id,
                    'path' => $imageFile
                ]);
            }
        }

        if($author){
            return redirect()->route('author.index')->with('success', 'Author has been added successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }

        
    }


    public function show(Author $author)
    {
        $author = Author::findOrFail($author->id);

        return view('admin.author.show', compact('author'));
    }


    public function edit(Author $author)
    {
        $author = Author::findOrFail($author->id);
        return view('admin.author.edit', compact('author'));
    }


    public function update(Request $request, Author $author)
    {
        $author = Author::findOrFail($author->id);

            $this->validate($request,[
            'name' => 'required|string',
            'deathdate' => 'required|date',
            'birthDate' => 'required|date',
            'externalLink' => 'url|nullable',
            'bio' => 'required|string',
        ]);


        $author->update([
                    'name' => ucfirst($request->get('name')) ? ucfirst($request->get('name')) : $author->name,
                    'bio' => ucfirst($request->get('bio')) ? ucfirst($request->get('bio')) : $author->bio,
                    'bd' => $request->get('birthDate') ? $request->get('birthDate') : $author->birthdate,
                    'deathdate' => $request->get('deathdate') ? $request->get('deathdate') : $author->deathdate,
                    'externalLink' => $request->get('externalLink') ? $request->get('externalLink') : $author->externalLink,
                ]);

        if($author){
            return redirect()->route('author.index')->with('success', 'Author has been updated successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }

    }


    public function destroy(Author $author)
    {
        $author = Author::findOrFail($author->id);
        $author->photos()->delete();
        $author->compositions()->delete();
        $author->videos()->delete();
        $author->delete();
        return back()->with('success', 'Author Has Been Deleted Successfully.');

    }
}
