<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use Illuminate\Http\Request;

use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'start'); // Colonna di default è la data di inizio

        $direction = $request->get('direction', 'asc'); //default asc
        
        $data =[   
            'activity' =>Activity::orderBy($sort, $direction)->paginate(10),
            'sort' => $sort,
            'direction' => $direction
        ];

        
        return view('test', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $activity = new Activity;
        $activity->title = $data['title'];
        $activity->number = $data['attendes'];
        $activity->description = $data['description'];
        $activity->start = Carbon::now();
        $activity->closed = false; // false di default in quanto, appena creata non puà essere conclusa yet ^^
        $activity->save();
        return redirect()->route('activity.index')->with('message', 'Activity Created');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
        // dd($activity);

        $data = $request->validate([
            "title" => "min:5",
            "attendes" => "required|numeric|min:5", 
            "description" => "required",
            "start" => "nullable",
            "closed" => "nullable|boolean"
        ]);
        $data['closed'] = $request->has('closed') ? true : false;
        // dd($data['closed'] );
        $activity->update($data);

        return redirect()->route('activity.index')->with('message', 'Activity updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $activity =  Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('activity.index')->with('message', 'Activity Deleted');
    }
}
