<?php

namespace App\Http\Controllers;
use App\Ticketing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $tickets = App\Ticketing::all();

    //     foreach ($tickets as $tickets) {
    //         echo $tickets->name;
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $rows = ticketNumber::get(); // Get all users from the database
    //     $table = Table::create($rows); // Generate a Table based on these "rows"

    //     return view('ticketNumber.index', ['tickets' => $tickets]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function editTicket(Request $request)
    {
        $affected = DB::update('update ticketing SET problem = concat(concat(problem, NOW()), ?) WHERE ticketNumber = ?', [$request->input('edit'), $request->input('ticketNumber')]);

        return redirect('/home');
    }


    public function updateTicket(Request $request)
    {
        DB::table('completed')
            ->insert([
                'ticketNumber' => $request->input('ticketNumber'),
                'userName' => $request->input('userName'),
                'problem' => $request->input('problem'),
                'assignedTo' => $request->input('assignedTo'),
                'fix' => $request->input('fix')
            ]);

        $affected = DB::update('update ticketing SET completed = 1 WHERE ticketNumber = ?', [$request->input('ticketNumber')]);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function completedTicket() {
        $ticketsCompleted = DB::select('select * FROM completed');

        return view('/knowledgebase', ['tickets' => $ticketsCompleted]);
    }
}

