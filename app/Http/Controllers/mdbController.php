<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PDO;

class mdbController extends Controller
{
    //
    public function mdb(){
        $dba = "//10.150.2.10/hris/DATA/gPMaster.mdb";
        $db = new \PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=".$dba.";Uid=; Pwd=hrd03ht;");
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM Employee WHERE Emplcode='2016761'";
        $result = $db->query($sql);
        $sample = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $sample;
    }
}
