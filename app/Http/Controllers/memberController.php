<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member=member::paginate(5);
        return view('member.member',compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.memberAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mid'=>'required',
            'mname'=>'required',
            'passwd'=>'required',
        ]);
        //方法1
        // $request['lastlogindatetime']=now();// 或者 Carbon::now()
        // $request['ctid']='ct'. str_pad(rand(1, 22), 2, '0', STR_PAD_LEFT); // 隨機生成 ct01 ~ ct22
        member::create($request->all());
        // member::create([ //方法2
        //     'mid'=>$request['mid'],
        //     'mname'=>$request['mname'],
        //     'passwd'=>$request['passwd'],
        //     'lastlogindatetime' => now(), // 或者 Carbon::now()
        //     'ctid'=>'ct'. str_pad(rand(1, 22), 2, '0', STR_PAD_LEFT), // 隨機生成 ct01 ~ ct22
        // ]);
        return redirect()->route('member.index')->with('success','會員新增成功....');
    }

    /**
     * Display the specified resource.
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(member $member)
    {
        return view('member.memberEdit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, member $member)
    {
        $request->validate([
            'mid'=>'required',
            'mname'=>'required',
            'passwd'=>'required',
        ]);
        $member->update($request->all());
        // return redirect()->route('member.edit',$member->mid)->with('success','會員資料已修改成功!!!');
        return redirect()->route('member.index')->with('success','會員資料已修改成功!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with('success','會員資料已刪除成功!!!');
    }
}
