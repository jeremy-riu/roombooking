<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class TimetableController extends Controller
{
    function show_timetables(){
        $data=Admin::paginate(10);
        return view('timetable',['timetables'=>$data]);
    }
    function delete_timetables($id)
    {
        $data=Admin::find($id);
        $data->delete();
        return redirect('timetable');
    }
    public function gettimetables(){
        $timetables = Admin::all();
        session(['alltimetables' => $timetables]);
        return view('viewmytables');
    }

    function edit_timetables($id)
    {
        $data= Admin::find($id);
        return view('editProducts ',['data'=>$data]);
    }
    function update_timetables(Request $req)
    {
        $data=Admin::find($req->id);
        $data->subject=$req->subject;
        $data->location=$req->location;
        $data->slots=$req->slots;
        $data->days=$req->days;
        $data->start_time=$req->start_time;
        $data->end_time=$req->end_time;
        $data->save();
        return redirect('timetable');
    }
}
