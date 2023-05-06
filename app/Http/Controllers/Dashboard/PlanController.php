<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Plan;
use App\Models\Dowload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlanController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('dashboard.plan.crud', [
            'plans'=>$plans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $plan = new Plan();

        if($request->file('photo')){
            $plan['photo'] = $this->photoSave($request->file('photo'), 'image/plan');
        }
        $plan->save();

        return redirect()->route('plan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function dowloadindex()
    {
        $dowload = Dowload::find(1);

        return view('dashboard.dowload.crud', [
            'dowload'=>$dowload,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $plan = Plan::find($id);
        if($request->file('photo')){
            if(is_file(public_path($plan->photo))){
                unlink(public_path($plan->photo));
            }
            $plan['photo'] = $this->photoSave($request->file('photo'), 'image/plan');
        }
        $plan->save();

        return redirect()->route('plan.index');
    }

    public function dowloadupdate(Request $request, string $id)
    {
        $dowload = Dowload::find($id);
        if(!empty($request->file('photo'))){
            if(is_file(public_path($dowload->photo))){
                unlink(public_path($dowload->photo));
            }
            $img_name = Str::random(10) . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/image/dowload'), $img_name);
            $dowload->photo = '/image/dowload/' . $img_name;
        }
        $dowload->name_uz = $request->name_uz;
        $dowload->name_ru = $request->name_ru;
        $dowload->name_en = $request->name_en;
        $dowload->save();

        return redirect()->route('dowload.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plan = Plan::find($id);
        if(is_file(public_path($plan->photo))){
            unlink(public_path($plan->photo));
        }
        $plan->delete();
        return redirect()->back();
    }
}
