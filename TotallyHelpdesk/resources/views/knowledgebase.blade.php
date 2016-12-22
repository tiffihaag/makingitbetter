@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">Knowledge Base</div>

              <div class="panel-body">
                <table class="table table-bordered tablesorter" id="myTable">
                  <thead>
                    <tr>
                      <th>Ticket#</th>
                      <th>User</th>
                      <th>Problem</th>
                      <th>Assigned To</th>
                      <th>Fix</th>
                    </tr>
                  </thead>

                <div class="enteredTickets">
                  
                  @if (!empty($tickets))
                    @foreach ($tickets as $tickets)
                    <tbody>
                      <tr id="{{ $tickets->ticketNumber }}">

                        <td align="center">{{ $tickets->ticketNumber }}</td>
                        <td>{{ $tickets->userName }}</td>
                        <td>{{ $tickets->problem }}</td>
                        <td>{{ $tickets->assignedTo }}</td>
                        <td>{{ $tickets->fix }}</td>
                      </tr>
                    </tbody>
                    @endforeach
                  @endif
                </div> 
                </table>
                </div>
        </div>
      </div>
    </div>
      <div class="chatbox2 col-md-2">
        <iframe src="http://localhost:8000/"></iframe>
      </div>
  </div>
</div>

@endsection


