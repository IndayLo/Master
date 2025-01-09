<?php

namespace App\Models;

use App\DAO\DAOCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CompanyModel extends Model
{
    public function CompanyList(){
        $dao_company = new DAOCompany();
        return $dao_company::CompanyList();
    }

    public function InsertCompany($req){
        $dao_company = new DAOCompany();
        
        $company_name = $req->input("company_name");
        $is_existing = $dao_company::ExistingCompany($company_name);

        if (count($is_existing) == 0 && $company_name != '') {
            $latest_code = $dao_company::LatestCode();
            $final_code = str_pad($latest_code + 1, 3, '0', STR_PAD_LEFT);
            DB::transaction(function() use($dao_company, $final_code, $company_name) {
                $dao_company::InsertCompany($final_code, $company_name);
            });  
        } 
    }

    public function UpdateCompany($req, $condition){
        $dao_company = new DAOCompany();
        DB::transaction(function() use($dao_company, $req, $condition) {
            $dao_company::UpdateCompany($req, $condition);
        }); 
    }
}
