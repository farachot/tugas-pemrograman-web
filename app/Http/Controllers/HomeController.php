<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
         $cars = Car::latest()->get();
      
         return view('frontend.homepage', compact('cars'));
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

    public function detail(Car $car)
    {
       return view('frontend.detail', compact('car'));
    } 
}
