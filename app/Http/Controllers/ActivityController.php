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

        return redirect()->back()->with(['success' => true]);
    }

    public function update(Request $request, Activity $activity)
    {
        //
    }

    public function order(Request $request)
    {
        $i = 1;
        foreach ($request->order as $value) {
            $activity = Activity::findOrFail($value);
            $activity->order = $i++;
            $activity->save();
            Activity::find($value)->update();
            // $i++;
        }

        return true;
    }

    public function destroy(Activity $activity)
    {
        $activity->order = null;
        $activity->delete();
        return redirect()->back();
    }

    public function emptyTrash()
    {
        Activity::onlyTrashed()->forceDelete();
        return redirect()->back();
    }

    public function delete(Activity $activity)
    {
        $activity->forceDelete();
        return redirect()->back();
    }

    public function restore(Activity $activity)
    {
        $count = count(Activity::all());
        $activity->order = $count++;
        $activity->save();
        $activity->restore();
        return redirect()->back();
    }
}
