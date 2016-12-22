<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function addTicket(Request $request){
        DB::table('ticketing')  
            ->insert([
                'ticketNumber' => $request->input('ticketNumber'),
                'priority' => $request->input('priority'),
                'userName' => $request->input('userName'),
                'problem' => $request->input('problem'),
                'assignedTo' => $request->input('assignedTo'),
                'completed' => $request->input('completed')
            ]);

        return redirect('/home');
    }

    public function ticketList(){
        $tickets = DB::select('select * FROM ticketing WHERE completed is null OR completed = 0');

        return view('/home', ['tickets' => $tickets]);
    }

    public function updateTicket(){
        
        DB::table('knowledgebase')
            ->insert([
                'ticketNumber' => $request->input('ticketNumber'),
                'userName' => $request->input('userName'),
                'problem' => $request->input('problem'),
                'assignedTo' => $request->input('assignedTo'),
                'fix' => $request->input('fix')
            ]);

        return redirect('/home');
    }

}
