<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
       return view('frontend.homepage');
    }
    public function contact()
    {
       return view('frontend.contact');
    }

    public function contactStore(Request $request)
    {
      $data = $request->validate([
         'nama' => 'required',
         'email' => 'required',
         'subject' => 'required',
         'pesan' => 'required'
      ]);

      Message::create($data);

      return redirect()->back()->with([
         'message' => 'pesan berhasil dikirim',
         'alert-type' => 'info'
     ]);
    }

    public function detail()
    {
       return view('frontend.detail');
    } 
}
