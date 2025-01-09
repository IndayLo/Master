<?php

namespace App\DAO;

use App\DTO\DTOCompany;
use App\Models\Company;

class DAOCompany {
    public static function CompanyList(){
        $data = Company::select('company_code', 'company_name','deleted_at')->get();

        $company_list = [];
        foreach($data as $rec){
            $dto_company = new DTOCompany();
            $dto_company->setCompany_code($rec->company_code);
            $dto_company->setCompany_name($rec->company_name);
            $dto_company->setDeleted_at($rec->deleted_at);
            $company_list[] = $dto_company;
        }
        return $company_list;
    }

    public static function InsertCompany($final_code, $company_name){
        Company::insert(
            [
                'company_code' => $final_code,
                'company_name' => strtoupper($company_name),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => '42448'
            ]
        );
    }

    public static function UpdateCompany($req, $condition){
        Company::where('company_code','=',$req->input('company_code'))
        ->update([
            'company_name'=>strtoupper($req->input('company_name')),
            'deleted_at'=>$condition == 'update' ? 
                          $req->input('deleted_at') : (is_null($req->input('deleted_at')) ? 
                          date('Y-m-d H:i:s') : null),
            'updated_at'=>date('Y-m-d H:i:s'),
            'updated_by'=>'36825'
        ]);
    }

    public static function ExistingCompany($company_name){
        $data = Company::select('company_name')
        ->where('company_name', $company_name)
        ->get();

        $company_arr = [];
        foreach($data as $rec){
            $dto_company = new DTOCompany();
            $dto_company->setCompany_name($rec->company_name);
            $company_arr[] = $dto_company;
        }
        return $company_arr;
    }

    public static function LatestCode(){
        $data = Company::max('company_code');
        $dto_company = new DTOCompany();
        $dto_company->setCompany_code($data);
        return $dto_company->getCompany_code();
    }
}