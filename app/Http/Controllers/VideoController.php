<?php

namespace App\Http\Controllers;

use App\Video;
use App\Author;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function userIndex()
    {
        $videos = Video::paginate(8);
        return view('front.video.videoList', compact('videos'));
    }

    public function index()
    {
        $videos = Video::paginate(8);
        return view('admin.video.index', compact('videos'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('admin.video.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'youtube' => 'string|required|min:11|max:11',
            'name' => 'string|required',
            'authorSelect' => 'required',
        ]);

        $youtubeURL = 'https://www.youtube.com/embed/' . $request->get('youtube');
            
        $video = Video::create([
            'name' => ucfirst($request->get('name')),
            'path' => $youtubeURL
        ]);

        $video = \DB::table('author_video')->insert(
                                    ['author_id' => $request->get('authorSelect'),
                                     'video_id' => $video->id,
                                     'created_at' => now(),
                                     'updated_at' => now()]
                                );

        if($video){
            return redirect()->route('video.index')->with('success', 'Video has been added successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }
    }

    public function show(Video $video)
    {
        $video = Video::findOrFail($video->id);
        return view('admin.video.show', compact('video'));
    }


    public function destroy(Video $video)
    {

        $video = Video::findOrFail($video->id);

        $video->delete();

        return redirect()->route('video.index')
                    ->with('success', 'Video Has Been Deleted Successfully.');
    }
}
