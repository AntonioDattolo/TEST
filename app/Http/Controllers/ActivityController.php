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

        $filter = $request->get('filter', false); // parametro per filtrare i dati (se le attività sono chiuse o meno) all di default
        
        if($filter == false){

            $query = Activity::orderBy($sort, $direction)->paginate(10); 

        }else{

            $query = Activity::orderBy($sort, $direction)->where('closed', false)->paginate(10);
        };
        
        $data =[   
            'activity' => $query,
            'sort' => $sort,
            'direction' => $direction,
            'filter' => $filter
        ];

        // dd($filter);
        
        return view('test', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "min:5",
            "attendes" => "required|numeric|min:5", 
            "description" => "required",
            "start" => "nullable",
            "closed" => "nullable"
        ]);

        $data = $request->all();

        $activity = new Activity;
        $activity->title = $data['title'];
        $activity->attendes = $data['attendes'];
        $activity->description = $data['description'];
        $activity->start = $data['start'];
        $activity->closed = false; // false di default in quanto, appena creata non puà essere conclusa yet ^^
        
        $activity->save();

        return redirect()->route('activity.index')->with('message', 'Activity Created');
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
            "closed" => "nullable"
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
