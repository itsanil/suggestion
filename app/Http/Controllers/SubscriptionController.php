<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Module;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subscription::all();
        $module_data = Module::pluck('name', 'name')->toArray();
        return view('subscription.index',compact('data','module_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_data = Module::pluck('name', 'name')->toArray();
        return view('subscription.create',compact('module_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:subscriptions,name',
        ]);
        $datas = $request->all();
        $datas['modules'] = json_encode($datas['modules'],true);
        unset($datas['_token']);
        $data = new Subscription();
        $data::create($datas);
        return redirect()->back()
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Subscription::find($id);
        $module_data = Module::pluck('name', 'name')->toArray();
        return view('subscription.edit',compact('module_data','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:subscriptions,name,'.$id,
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        unset($datas['_method']);
        $data = Subscription::find($id);
        $data->update($datas);
        return redirect()->back()
                    ->withStatus('Data updated Successfully!');
        echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $data = Subscription::find($id);
            $data->delete();
            return redirect()->back()
                    ->withStatus('Data deleted Successfully!');
        }catch (\Exception $e) {
            return back()->withErrors(__($e->getMessage()));
        }
    }
}
