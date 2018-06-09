<?php

namespace App\Http\Controllers;

use App\Event;
use App\Period;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::paginate(12);
        return view('admin.event.index',compact('events'));
    }

    public function create()
    {
        $periods = Period::all();
        return view('admin.event.create',compact('periods'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'detail' => 'required',
            'date' => 'required|string',
            'period' => 'required|integer'
        ]);

        $period = $request->get('period');

        if(isset($period) && $period > 0){

            $event = Event::create([
                            'detail' => ucfirst($request->get('detail')),
                            'date' => ucfirst($request->get('detail')),
                            'period_id' => $period
                        ]);
        }

        if($event){
            return redirect()->route('event.index')->with('success', 'Event has been added successfully');
        }else{
             return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }
        
    }

    public function show(Event $event)
    {
        $event = Event::findOrFail($event->id);
        return view('admin.event.show',compact('event'));
    }

    public function edit(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $periods = Period::all();
        return view('admin.event.edit',compact('event', 'periods'));
    }

    public function update(Request $request, Event $event)
    {

        $this->validate($request,[
            'detail' => 'required',
            'date' => 'required',
            'period' => 'required|integer'
        ]);

        $event = Event::findOrFail($event->id);
        $period = $request->get('period');

        if(isset($period) && $period > 0 && $period != null){

            $event->update([
                            'detail' => ucfirst($request->get('detail')) ,
                            'date' => ucfirst($request->get('date')),
                            'period_id' => $period
                        ]);

        }
        
        if($event){
            return redirect()->route('event.index')->with('success', 'Event has been updated successfully');
        }else{
            return redirect()->back()->with('errors', 'Something went wrong, Please check the fields again.');
        }

    }

    public function destroy(Event $event)
    {
        $event = Event::findOrFail($event->id);

        $event->delete();

        return redirect()->route('event.index')
                    ->with('success', 'Event Has Been Deleted Successfully.');
    }
}
