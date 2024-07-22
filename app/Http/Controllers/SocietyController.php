<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\Subscription;
use App\Models\SocietyData;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Hash;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Society::all();
        return view('society.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscription_data = Subscription::pluck('name', 'id')->toArray();
        return view('society.create',compact('subscription_data'));
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
            'name' => 'required|unique:societies,name',
            'registration_date' => 'required',
            'subscription_id' => 'required',
            'status' => 'required',
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        $data = new Society();
        $data->create($datas);
        return redirect('society')
                    ->withStatus('Data added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function show(Society $society)
    {
        $data = SocietyData::where('society_id',$society->id)->first();
        // echo "<pre>"; print_r($data); echo "</pre>"; die('anil');
        return view('society.show',compact('society','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function edit(Society $society)
    {
        $data = $society;
        // echo "<pre>"; print_r($society); echo "</pre>"; die('anil');
        $subscription_data = Subscription::pluck('name', 'id')->toArray();
        return view('society.edit',compact('subscription_data','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Society $society)
    {
        // echo "<pre>"; print_r($request->all()); echo "</pre>"; die('anil');
        if (isset($request->society_id)) {
            $request->validate([
                'address' => 'required|string|max:255',
                // 'email' => 'required|email|max:255',
                // 'gst_no' => 'required|string|max:15',
                // 'pt_no' => 'required|string|max:15',
                // 'pan_no' => 'required|string|max:10',
                // 'tan_no' => 'required|string|max:15',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'pincode' => 'required|string|max:10',
                'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'registration_number' => 'required|string|max:255',
                'db_name' => 'required|string|max:255',
                'db_username' => 'required|string|max:255',
                'db_password' => 'required|string|max:255',
                // 'mobile_no' => 'required|string|max:15',
                // 'mobile_no' => 'required|numeric|min:10|max:10|unique:society_datas,mobile_no,'.$society->id,
            ]);
            $society_id = $request->society_id;
            $society_data = Society::find($request->society_id);
            $data = SocietyData::where('society_id',$society_id)->first();
            $user_data = User::where('society_id',$society_id)->first();
            $datas = $request->all();
            unset($datas['_token']);
            unset($datas['_method']);
            if (empty($data)) {
                $request->validate([
                    'email' => 'required|email|max:255|unique:society_datas,email',
                    'mobile_no' => 'required|digits:10|unique:society_datas,mobile_no',
                ]);
                $datass = new SocietyData();
                $datass->create($datas);
            }else{
                $request->validate([
                    'email' => 'required|email|max:255|unique:society_datas,email,'.$data->id,
                    'mobile_no' => 'required|digits:10|unique:society_datas,mobile_no,'.$data->id,
                ]);
                $data->update($datas);
            }
            if (empty($user_data)) {
                $user_datas = new User();
                $user_datas->name = $society_data->name;
                $user_datas->email = $request->email;
                $user_datas->society_id = $request->society_id;
                $user_datas->contact_mobile = $request->mobile_no;
                $user_datas->password = Hash::make(12345678);
                $user_datas->save();
                $user_datas->assignRole('Society Admin');
            }else{
                $user_datas = $user_data;
                $user_datas->name = $society_data->name;
                $user_datas->email = $request->email;
                $user_datas->society_id = $request->society_id;
                $user_datas->contact_mobile = $request->mobile_no;
                $user_datas->password = Hash::make(12345678);
                $user_datas->save();
                $user_datas->assignRole('Society Admin');
            }
            if ($request->img) {
                $data = SocietyData::where('society_id',$society_id)->first();
                $path='/uploads/society/profile/'.($society_id);
                $user_file=$request->file('img');
                $img = $this->profile_photo($user_file,$path);
                $data->img = $img;
                $data->save();
            }
            return redirect('society')
                    ->withStatus('Data updated Successfully!');
        }
        $this->validate($request, [
            'name' => 'required|unique:subscriptions,name,'.$society->id,
            'registration_date' => 'required',
            'subscription_id' => 'required',
            'status' => 'required',
        ]);
        $datas = $request->all();
        unset($datas['_token']);
        unset($datas['_method']);
        $data = $society;
        $data->update($datas);
        return redirect('society')
                    ->withStatus('Data updated Successfully!');
    }

    public function profile_photo($user_file,$paths){
        $path = public_path().$paths;
        if (!file_exists($path)) 
        {
            File::makeDirectory($paths, $mode = 0777, true, true);
        }
        $user_file_path = $path.'-'.$user_file->getClientOriginalName();
        $filename = $user_file->getClientOriginalName();
        $file_path = $path.$filename;    
        $file=$user_file;
        $file->move($path,$filename);
        $path_table=$paths.'/'.$filename;
        return $path_table;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy(Society $society)
    {
        try
        {
            $data = $society;
            $data->delete();
            return redirect('society')
                    ->withStatus('Data deleted Successfully!');
        }catch (\Exception $e) {
            return back()->withErrors(__($e->getMessage()));
        }
    }
}
