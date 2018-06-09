<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Author;
use App\Period;
use Illuminate\Http\Request;

class PhotoController extends Controller
{

    public function userIndex()
    {
        $photos = Photo::where('author_id', '!=', null)
                        ->orWhere('period_id', '!=', null)
                        ->paginate(12);
        return view('front.photo.photoList', compact('photos'));
    }

    public function index()
    {   
        $photos = Photo::where('author_id', '!=', null)
                        ->orWhere('period_id', '!=', null)
                        ->paginate(12);

        return view('admin.photo.index', compact('photos'));
    }


    public function create()
    {
        $authors = Author::all();
        $periods = Period::all();
        return view('admin.photo.create', compact('authors', 'periods'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'imageUpload' => 'image|required|mimes:jpeg,jpg,png,gif',
            'imageName' => 'string|required|min:6',
            'imageDescription' => 'string|required|min:6',
            'radio' => 'required',
        ]);

        $radio = $request->get('radio');
        $authorSelect = $request->get('authorSelect');
        $periodSelect = $request->get('periodSelect');
        $image = $request->imageUpload;


        if($radio == 'author' && isset($authorSelect) && $authorSelect > 0){

            if($image){
                $imageName = time() . '-' . $image->getClientOriginalName();
                $imageFile = $image->move('images/author_img', $imageName);  

                Photo::create([
                        'name' => $request->get('imageName'),
                        'path' =>  $imageFile,
                        'description' => $request->get('imageDescription'),
                        'author_id' => $authorSelect
                    ]);
            }

        }else if ($radio == 'period' && isset($authorSelect) && $authorSelect > 0) {

            if($image){
                $imageName = time() . '-' . $image->getClientOriginalName();
                $imageFile = $image->move('images/period_img', $imageName);  
                
                Photo::create([
                        'name' => $request->get('imageName'),
                        'path' =>  $imageFile,
                        'description' => $request->get('imageDescription'),
                        'period_id' => $periodSelect
                    ]);
            }
        }

        //if($photo){
            return redirect()->route('photo.index')->with('success', 'Photo has been updated successfully');
        //}else{
           // return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        //}
    }


    public function show(Photo $photo)
    {
        $photo = Photo::findOrFail($photo->id);

        if($photo->user_id){
            return abort(404);
        }
    
        return view('admin.photo.show', compact('photo'));
    }


    public function destroy(Photo $photo)
    {
        $photo = Photo::findOrFail($photo->id);

        if($photo->user_id){
            return abort(404);
        }

        $photo->delete();

        return redirect()->route('photo.index')
                    ->with('success', 'Picture Has Been Deleted Successfully.');
    }
}
