<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use App\Models\Reminder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $user = auth()->check() ? auth()->user() : null;

        if ($request->ajax()) {
            
            return $this->ajax($request);
        }else {

            $user_lists = ToDoList::where('user_id', $user->id)->latest()->get() ?? null;

            return view('dashboard')->with('data', $user_lists);
        }
    }

    public function getList(Request $request){
        $user = auth()->check() ? auth()->user() : null;
        $inputs = $request->all();
   
        $user_lists = ToDoList::find($inputs['id']) ?? null;

        return response()->json(['user_lists' => $user_lists]);
    }

    public function ajax(Request $request) {
        $user = auth()->check() ? auth()->user() : null;
        $inputs = $request->all();

        if ($inputs['type'] == 'new'){
            $list = new ToDoList;
            $list->fill([
                'user_id' => $user->id,
                'title' => $inputs['name'] ?? null,
                'reminder' => $inputs['remind_me'] ?? 0,
                'notes' => $inputs['notes'] ?? null,
                'type' => $inputs['category'] ?? null,
                'status' => 'ongoing',
            ])->save();
           
            if(isset($inputs['remind_me'])) {
               $reminder = new Reminder;
               $reminder->fill([
                'to_do_list_id' => $list->id,
                'remind_date' => $inputs['reminder_date'],
                'remind_time' => $inputs['reminder_time'],
               ])->save();
            }

            return response()->json(['list' => $list]);

        } else {
            $list = ToDoList::find($inputs['list_id']);

            $list->update([
                'title' => $inputs['name'] ?? null,
                'category' => $inputs['category'] ?? null,
                'notes' => $inputs['notes'] ?? null
            ]);
        }   
        
        return response(['success' => 'Successfully create list']);
    }

    public function delete($id) {
       
        $deleted = ToDoList::where('id', $id)->delete();
        
        return response (['success' => 'Successfully delete list']);
    }
}
