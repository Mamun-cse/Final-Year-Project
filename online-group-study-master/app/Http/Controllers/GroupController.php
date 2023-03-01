<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Group;
use App\Models\Topic;
use App\Models\GroupMember;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class GroupController extends Controller
{
    public function group_create(){
        if(Auth::check()){
            return view('group.group_create');
        }
        else{
            \Alert::info('Opps! ', 'you need to registartion first');
            return redirect()->to('/registration');
        }

    }
    public function group(Request $request){

        if(Auth::check()){
            $request->validate([
                'gname' => 'required|unique:groups,gname',

            ],[
                'gname.required' => 'The group name field is required'
            ]);
            $user_id = Auth::user()->id;
            $group_count = Group::where('user_id',$user_id)->count();
            if($group_count>=2){
            \Alert::info('ops! ', 'one user can not create more than 2 group ');
            return redirect()->back();
            }
            $group = new Group;
            $group->gname = $request->gname;
            $group->user_id = $user_id;
            $group->admin_user_id = $user_id;
            $group->save();

            $join_group = new GroupMember;
            $join_group->group_id=$group->id;
            $join_group->user_id=Auth::user()->id;
            $join_group->status=1;
            $join_group->save();
            \Alert::success('success ', 'Group create successfully');
            return redirect()->back();
        }
        else{
            \Alert::info('Opps! ', 'You need to registartion first');
            return redirect()->to('/registration');
        }


    }
    public function group_show()
    {

        $groups = Group::all();
        return view('group.group_show',compact('groups'));
    }
    public function join_group($id)
    {
        if(Auth::check()){
            $is_exist=GroupMember::where('user_id',Auth::user()
            ->id)->where('group_id',$id)->count();
            if($is_exist){
                \Alert::info('Ops! ', 'you are already join the group');
            return redirect()->back();

            }
            else{
            $join_group = new GroupMember;
            $join_group->group_id=$id;
            $join_group->user_id=Auth::user()->id;
            $join_group->admin_user_id==Auth::user()->id;
            $join_group->save();
            \Alert::success('Succes! ', 'you join the group successfully please wait for admin approval');
            return redirect()->back();
            }

        }
        else{
            \Alert::info('Opps! ', 'you need to registartion first');
            return redirect()->to('/registration');
        }
    }
    public function group_home(Request $request)
    {
        $group=Group::findOrFail($request->group_id);
        return view('group.group_home',compact('group'));
    }

    public function group_all_member($id)
    {

        if(Auth::check()){
            $group=Group::findOrFail($id);
            $members = GroupMember::where('group_id',$id)->get();
            $is_admin = false;
            if($group->admin_user_id==Auth::user()->id){
                $is_admin = true;
            }
            return view('group.group_all_member',compact('group','members','is_admin'));
        }
        else{
            return view('group.group_create');
        }

    }

    public function group_member_approve(Request $request){
        $member_id = $request->member_id;
        if(Auth::check()){
            $member=GroupMember::find($member_id);
            $member->status=1;
            $member->update();
            \Alert::success('Succes! ', 'Member has been approved successfully');
            return redirect()->back();

        }
        else{
            return view('group.group_create');
        }

    }

    public function group_study_topics($id){
        if(Auth::check()){

            $group=Group::findOrFail($id);
            $is_admin = false;
            if($group->admin_user_id==Auth::user()->id){
                $group_member_id=GroupMember::where('group_id',$id)
                ->where('user_id',Auth::user()->id)
                ->first()->id;
                $is_admin = true;
            }
            else{
                $group_member_id=GroupMember::where('group_id',$id)
                ->where('user_id',Auth::user()->id)
                ->first()->id;
            }
            return view('group.group_topics',compact('group','is_admin','group_member_id'));
        }
        else{

            return view('group.group_create');
        }
    }

}
