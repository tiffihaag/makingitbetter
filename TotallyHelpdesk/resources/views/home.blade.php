@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">Ticketing System</div>

          <div class="panel-body">
            Welcome, {{ Auth::user()->name }}
          <br><br> 

          <!-- NEW Ticket Button -->
          <button id="openBtn">New Ticket</button>
            <br><br>

          <!-- The NEW Ticket Modal -->
          <div id="newticketModal" class="modal">
          
            <style>
            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 15% auto; /* 15% from the top and centered */
                padding: 20px;
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }

            /* The Close Button */
            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }
            </style>

            <!-- NEW Modal content -->
            <div class="modal-content">
              <span id="closeNew" class="close">x</span>
            
            <form class="form-horizontal" action="/addTicket">
              New Ticket
              <div class="form-group">
              <br><br>
                <label class="control-label col-sm-2" for="ticket">Ticket#</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ticket" placeholder="number">
                  </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label><input type="checkbox" name="priority"> Priority Ticket?</label>
                  </div>
                </div>
              </div>
                
              <div class="form-group">
                <label class="control-label col-sm-2" for="user">User</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="userName" placeholder="user name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="problem">Problem</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="problem" placeholder="description of problem">
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-2" for="user">Assigned To</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="assignedTo" placeholder="assign to helpdesk person">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label><input type="checkbox" name="completed"> Completed During First Contact?</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10" style="padding-left: 25px;">
                  <button type="submit" class="btn btn-default" id="submitBtn">Submit</button>
                </div>
              </div>
            </form>
          </div>
        
          <!--NEW Ticket Modal Script-->
          <script>
          // Get the modal
          var modal = document.getElementById('newticketModal');

          // Get the button that opens the modal
          var btn = document.getElementById("openBtn");

          // Get the <span> element that closes the modal
          var span = document.getElementById("closeNew");

          // When the user clicks on the button, open the modal
          btn.onclick = function() {
              modal.style.display = "block";
          }

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
              modal.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }
          </script>
        </div><!-- close new ticket entry -->

        <!-- Modal content for EDIT Ticket Button -->
        <!-- The Modal -->
        <div id="editModal" class="modal">
        
          <style>
          /* The Modal (background) */
          .modal2 {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
          }

          /* Modal Content/Box */
          .modal-content {
              background-color: #fefefe;
              margin: 15% auto; /* 15% from the top and centered */
              padding: 20px;
              border: 1px solid #888;
              width: 80%; /* Could be more or less, depending on screen size */
          }

          /* The Close Button */
          .close {
              color: #aaa;
              float: right;
              font-size: 28px;
              font-weight: bold;
          }

          .close:hover,
          .close:focus {
              color: black;
              text-decoration: none;
              cursor: pointer;
          }
          </style>

          <-- Content for EDIT Modal-->
          <div class="modal-content">
            <span id="editTicket" class="close">x</span>
          
            <form class="form-horizontal" action="/editTicket">
              Edit/Update Ticket
              <div class="form-group">
                <br><br>
                <label class="control-label col-sm-2" for="ticket">What You've Tried</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="edit" placeholder="what didn't work">
                  <input type="hidden" name="ticketNumber" id="editticketNumber">
                  <input type="hidden" name="userName" id="edituserName">
                  <input type="hidden" name="problem" id="editProblem">
                  <input type="hidden" name="assignedTo" id="editAssignedTo">
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10" style="padding-left: 25px;">
                    <button type="submit" id="editButton" class="btn btn-default">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <--Script for EDIT Ticket-->
          <script>
          // Get the modal
          var modal2 = document.getElementById('editModal');

          // Get the <span> element that closes the modal
          var span2 = document.getElementById("editTicket");

          // When the user clicks on the button, open the modal
          function editTicket(ticketNumber) {
            modal2.style.display = "block";
            $("#editticketNumber").val(ticketNumber);

            var unameLoc = "#" + ticketNumber + "userName";
            $("#edituserName").val($(unameLoc).attr("data-val"));
            console.log($(unameLoc).attr("data-val"));

            var problemLoc = "#" + ticketNumber + "problem";
            $("#editProblem").val($(problemLoc).attr("data-val"));
            
            var assignedToLoc = "#" + ticketNumber + "assignedTo";
            $("#editAssignedTo").val($(assignedToLoc).attr("data-val"));
            $('#editModal').show();
            console.log("I should display");
          }

          // When the user clicks on <span> (x), close the modal
          span2.onclick = function() {
            modal2.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
          }
          </script>
      </div>  <!-- end editmodal -->

      <!-- Modal content for COMPLETED Ticket Button -->
      <!-- The Modal -->
      <div id="updateModal" class="modal">
      
        <style>
        /* The Modal (background) */
        .modal3 {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        </style>

      <-- Content for COMPLETED Modal-->
      <div class="modal-content" >
        <span id="closeTicket" class="close">x</span>
      
        <form class="form-horizontal" action="/updateTicket">
          Completed Ticket
          <div class="form-group">
          <br><br>
          <label class="control-label col-sm-2" for="ticket">Fix For Problem</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="fix" placeholder="how you fixed it">
              <input type="hidden" name="ticketNumber" id="updticketNumber">
              <input type="hidden" name="userName" id="upduserName">
              <input type="hidden" name="problem" id="updProblem">
              <input type="hidden" name="assignedTo" id="updAssignedTo">
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10" style="padding-left: 25px;">
                <button type="submit" id="closeButton" class="btn btn-default">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>

      <--Script for COMPLETED Ticket-->
      <script>
      // Get the modal
      var modal3 = document.getElementById('updateModal');

      // Get the <span> element that closes the modal
      var span3 = document.getElementById("closeTicket");

      // When the user clicks on the button, open the modal
      function updateTicket(ticketNumber) {
        modal3.style.display = "block";
        $("#updticketNumber").val(ticketNumber);
        console.log("completed ticket fired");

        var unameLoc = "#" + ticketNumber + "userName";
        $("#upduserName").val($(unameLoc).attr("data-val"));
        console.log($(unameLoc).attr("data-val"));

        var problemLoc = "#" + ticketNumber + "problem";
        $("#updProblem").val($(problemLoc).attr("data-val"));
        
        var assignedToLoc = "#" + ticketNumber + "assignedTo";
        $("#updAssignedTo").val($(assignedToLoc).attr("data-val"));
        $("#updateModal").show();
      }

      // When the user clicks on <span> (x), close the modal
      span3.onclick = function() {
        modal3.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal3) {
            modal3.style.display = "none";
        }
      }
      </script>
    </div>  <!-- end updateModal -->
    

    <!--Display Table for OPEN Tickets-->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Ticket#</th>
          <th>User</th>
          <th>Problem</th>
          <th>Assigned To</th>
          <th>Edit</th>
          <th>Completed?</th>
        </tr>
      </thead>

      @if (!empty($tickets))
        @foreach ($tickets as $tickets)
        <tbody>
          <tr id="{{ $tickets->ticketNumber }}">
            <td align="center">{{ $tickets->ticketNumber }}</td>
            
            <td id="{{ $tickets->ticketNumber }}userName" data-val="{{ $tickets->userName }}">{{ $tickets->userName }}</td>
            
            <td id="{{ $tickets->ticketNumber }}problem" data-val="{{ $tickets->problem }}">{{ $tickets->problem }}</td>
            
            <td id="{{ $tickets->ticketNumber }}assignedTo" data-val="{{ $tickets -> assignedTo }}">{{ $tickets->assignedTo }}</td>
            
            <td align="center"><button id="edit" value="{{ $tickets->problem }}" name="edit" onclick="editTicket({{ $tickets->ticketNumber }})">Edit</button></td>
            
            <td align="center"><button id="completed" value="{{ $tickets->completed }}" name="completed" onclick="updateTicket({{ $tickets->ticketNumber }})">Close</button></td>
          </tr>
        </tbody>
        @endforeach
      @endif
    </table>      
    </div> 
  </div>
  </div>
</div>
  <div class="chatbox col-md-2">
    <iframe src="http://localhost:8000/"></iframe>
  </div>

@endsection
