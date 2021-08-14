<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Rqst;
use DB;
use Session;

date_default_timezone_set('Africa/Harare');

class crudController extends Controller
{
    public function insertData(){
        $data = Rqst::except('_token');
        $tbl = decrypt($data['tbl']);
        //print_r($tbl);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H:i:s');

        if (Rqst::has('social')) {
            $data['social'] = implode(',',$data['social']);
            //print_r($data['social']);
            //exit();
        }

        if(Rqst::hasFile('image')){
            $data['image'] = $this->uploadImage($tbl,$data['image']);
        }

        if (Rqst::has('category_id')) {
            $data['category_id'] = implode(',', $data['category_id']);
        }

        DB::table($tbl)->insert($data);
        session::flash('message','Dados inseridos com sucesso');
        return redirect()->back();
    }

    public function updateData(){
        $data = Rqst::except('_token');
        $tbl = decrypt($data['tbl']);
        //print_r($tbl);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H:i:s');

        if (Rqst::has('social')) {
            $data['social'] = implode(',',$data['social']);
            //print_r($data['social']);
            //exit();
        }

        if(Rqst::hasFile('image')){
            $data['image'] = $this->uploadImage($tbl,$data['image']);
        }

        if (Rqst::has('category_id')) {
            $data['category_id'] = implode(',', $data['category_id']);
        }
        
        DB::table($tbl)->where(key($data),reset($data))->update($data);
        session::flash('message','Dados atualizados com sucesso');
        return redirect()->back();
    }

    public function uploadImage($location,$imagename){
        $name = $imagename->getClientOriginalName();
        $imagename->move(public_path().'/'.$location,date('ymdgis').$name);
        return date('ymdgis').$name;
    }
}
