<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
public function index(){
    $peserta = Peserta::all();
    // return view('peserta.index',compact($peserta));
    return view('peserta.index',['peserta'=>$peserta]);
}
public function show($id){
$peserta = Peserta::where('id',$id)->first();
if(!$peserta){
    return redirect('/peserta');
}
return view('peserta.show',['peserta'=>$peserta]);
}
}
