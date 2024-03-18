<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;

class BookingController extends Controller
{
    public function submit_info(Request $request){
        $data=$request->input();
        return view('/select_seat',['data'=>$data]);
    }

    public function add_booking(Request $request){
        $booking = new Booking;
        $booking->movieid = $request->movieS;
        $booking->userid =  Auth::user()->id;
        $booking->locationid = $request->cinemaS;
        $booking->timeid = $request->timeS;
        $booking->date = $request->dateS;
        $booking->seat = $request->seatS;
        $booking->save();
        return redirect('/bookings_history');
    }

    public function all_movie(){
        $movie = Movie::paginate(3);
        return view('/admin_panel',['movies'=>$movie]);
    }

    public function insert_movie(Request $request){
        $request->validate([
            'movie'=>'required',
            'genre'=>'required',
            'duration'=>'required',
            'lang'=>'required',
            'desc'=>'required',
            'poster'=>'required'
        ]);
        $movie = new Movie;
        if($request->hasFile('poster')) {
            $file= $request->file('poster');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('assets'), $filename);
            $movie->poster = '/assets/'.$filename;
        }
        $movie->name =  $request->movie;
        $movie->genre = $request->genre;
        $movie->duration = $request->duration;
        $movie->language = $request->lang;
        $movie->desc =$request->desc;
        $movie->nowShowing=1;
        $movie->save();
        return redirect('/get_admin_panel');
        
    }

    public function delete_movie(Request $request){
        $movie = Movie::find($request->movieid)->get();
        $movie->delete();

        return redirect('/get_admin_panel');
     }

     public function show_edit_movie(Request $request){
        $movie = Movie::find($request->movieid);
        return view('/edit_movie_view',['movies'=>$movie]);
     }

     public function edit_movie(Request $request){
        $request->validate([
            'movie'=>'required',
            'genre'=>'required',
            'duration'=>'required',
            'lang'=>'required',
            'desc'=>'required',
            
        ]);
        $movie = Movie::find($request->movieid);
        $movie->name =  $request->movie;
        $movie->genre = $request->genre;
        $movie->duration = $request->duration;
        $movie->language = $request->lang;
        $movie->desc =$request->desc;
        $movie->save();
        return redirect('/get_admin_panel');
     }
}
