<?php

namespace App\Http\Controllers\Mobile\Join;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Mobile\Login\LoginController;
use App\Models\Member;
use App\Models\MemberAgree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("/mobile/join/agree");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("/mobile/join/create");
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $nowDate = date("Y-m-d H:i:s");

            $memberAgree = new MemberAgree;
            $memberAgree->agree1 = "Y";
            $memberAgree->agree2 = "Y";
            $memberAgree->updateDate = $nowDate;
            $memberAgree->createDate = $nowDate;
            $memberAgree->save();

            $agreePK = $memberAgree->mbAgreePK;

            $member = new Member;
            $member->email = $request["userEmail"] ?? '';
            $member->pw = Hash::make($request['userPassword']);
            $member->memberName = Crypt::encryptString($request['userName']) ?? '';
            $member->phone = Crypt::encryptString($request['userPhone']) ?? '';
            $member->mbAgreePK = $agreePK;
            $member->auth = 'N';
            $member->lastLoginDate = $nowDate;
            $member->updateDate = $nowDate;
            $member->createDate = $nowDate;
            $member->save();

            DB::commit();
            return LoginController::login($request,Member::findMemberInfo($member->memberPK));
        } catch(Exception $e){
            DB::rollback();
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
