<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('order')->get();
        return view('dashboard.activities', ['activities' => $activities]);
    }




    public function store(Request $request)
    {

        $request->validate([
            'activity' => ['required', 'string', 'unique:activities,activity'],
        ]);

        $activity = new Activity();

        $count = count(Activity::all());
        $activity->order = $count + 1;
        $activity->activity = $request->activity;

        $activity->save();

        return redirect()->back()->with(['success' => true, 'type' => 'success', 'msg' => __('Activity added with success')]);
    }





    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'activity' => ['required', 'string']
        ]);

        $activity->activity = $request->activity;

        $activity->save();

        return redirect()->back()->with(['success' => true, 'type' => 'info', 'msg' => __('Activity updated with success')]);
    }




    public function order(Request $request)
    {
        $i = 1;
        foreach ($request->order as $value) {
            $activity = Activity::findOrFail($value);
            $activity->order = $i++;
            $activity->save();
        }
    }




    public function destroy(Activity $activity)
    {
        $activity->delete();
        $i = 1;
        $activities = Activity::orderBy('order')->get();
        foreach ($activities as $activity) {
            $activity->order = $i++;
            $activity->save();
        }
        return redirect()->back()->with(['success' => true, 'type' => 'danger', 'msg' => __('Activity deleted with success')]);
    }
}
