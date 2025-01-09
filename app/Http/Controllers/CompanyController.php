<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Exceptions\CommonException;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $company_model = new CompanyModel();
            return $company_model->CompanyList();
        } catch(\Exception $e) {
            $err_data = [
                'Username' => '36825', 
                'Password' => '36825',
                'Parameters' => 'NULL',
                'Function' => __FUNCTION__
            ];
            throw new CommonException($e, $err_data, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        try {
            $company_model = new CompanyModel();
            $company_model->InsertCompany($req);
            return $company_model->CompanyList();
        } catch(\Exception $e) {
            $err_data = [
                'Username' => '42448', 
                'Password' => '42448',
                'Parameters' => $req->all(),
                'Function' => __FUNCTION__
            ];
            throw new CommonException($e, $err_data, 500);
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
    public function update(Request $req, $condition)
    {   
        try {
            $company_model = new CompanyModel();
            $company_model->UpdateCompany($req, $condition);
            return $company_model->CompanyList();
        } catch(\Exception $e) {
            $err_data = [
                'Username' => '42448', 
                'Password' => '42448',
                'Parameters' => [$req->all(), $condition],
                'Function' => __FUNCTION__
            ];
            throw new CommonException($e, $err_data, 500);
        }
        
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
