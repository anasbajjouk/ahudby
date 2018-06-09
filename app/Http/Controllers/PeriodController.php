<?php

namespace App\Http\Controllers;

use App\Period;
use App\Photo;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    
     // USER NORMAL VIEW 
    public function userIndex()
    {
        $periods = Period::paginate(12);
        return view('front.period.textList', compact('periods'));
    }

        public function userShow(Period $period)
    {
        $period = Period::findOrFail($period->id);
        $events = $period->events;

        return view('front.period.textDetail', compact('period', 'events'));
    }

    // ADMIN VIEW

    public function index()
    {
        $periods = Period::paginate(12);
        return view('admin.period.index', compact('periods'));

    }


    public function create()
    {
        return view('admin.period.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'detail' => 'required|string'
        ]);

        $period = Period::create([
                    'name' => ucfirst($request->get('name')),
                    'detail' => ucfirst($request->get('detail')),
                    'startDate' => $request->get('startDate'),
                    'endDate' => $request->get('endDate'),
                ]);
        
        $images = $request->file('images');

        if($images){
            foreach($images as $image){
                $imageName = time() . '-' . $image->getClientOriginalName();
                $imageFile = $image->move('images/period_img', $imageName);
                Photo::create([
                    'name' => ucfirst($request->get('imageName')),
                    'description' => ucfirst($request->get('imageDescription')),
                    'period_id' => $period->id,
                    'path' => $imageFile
                ]);
            }
        }

        if($period){
            return redirect()->route('period.index')->with('success', 'Period has been added successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }

    }


    public function show(Period $period)
    {
        $period = Period::findOrFail($period->id);  
        return view('admin.period.show', compact('period'));
    }


    public function edit(Period $period)
    {
        $period = Period::findOrFail($period->id);  
        return view('admin.period.edit', compact('period'));
    }

    public function update(Request $request, Period $period)
    {
        $period = Period::findOrFail($period->id);

            $this->validate($request,[
                    'name' => 'required|string',
                    'startDate' => 'required|date',
                    'endDate' => 'required|date',
                    'detail' => 'required|string'
                    ]);


        $period->update([
                    'name' => ucfirst($request->get('name')) ? ucfirst($request->get('name')) : $period->name,
                    'detail' => ucfirst($request->get('detail')) ? ucfirst($request->get('detail')) : $period->detail,
                    'startDate' => $request->get('startDate') ? $request->get('startDate') : $period->startDate,
                    'endDate' => $request->get('endDate') ? $request->get('endDate') : $period->endDate,
                ]);

        if($period){
            return redirect()->route('period.index')->with('success', 'Period has been updated successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }
    }


    public function destroy(Period $period)
    {
        $period = Period::findOrFail($period->id);
        $period->photos()->delete();
        $period->delete();

        return back()->with('success', 'Period Has Been Deleted Successfully.');
    }
}
