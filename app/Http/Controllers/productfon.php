<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class productfon extends Controller{

  public function index(){
     return view('welcome');
  }

  public function getUsers($id){

     $employees = DB::table('product')->select('*')->where('id', $id)->get();

     $userData['data'] = $employees;

     return json_encode($userData);
     exit;
  }
}
