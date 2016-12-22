@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">Asset Manager</div>
        <br>

        <div class="panel-body">
            <!-- Trigger/Open The New Asset Modal -->
              <button id="myBtn">New Asset</button>
                <br><br>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                
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

                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">x</span>
                <form class="form-horizontal" action="/addAsset">
                  New Asset
                  <div class="form-group">
                  <br><br>
                    <label class="control-label col-sm-2" for="name">Name/Description</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" placeholder="name of item">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="type">Item Type</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="type" placeholder="ex. workstation, server, printer, software">
                      </div>
                  </div>                  

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="location">Location</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="location" placeholder="ex. Floor 1 - Joes desk">
                      </div>
                  </div>   

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="assettag">Asset Tag#</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="assettag" placeholder="the company asset tag number">
                      </div>
                  </div>  

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="ipaddress">IP Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="ipaddress" placeholder="ex. 127.0.0.1">
                      </div>
                  </div>   

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="manufacturer">Manufacturer</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="manufacturer" placeholder="ex. Cisco, Dell">
                      </div>
                  </div>  

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="model">Model#</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="model" placeholder="ex. 20332">
                      </div>
                  </div>   

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="serial">Serial#</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="serial" placeholder="ex. FOC1050YOR5">
                      </div>
                  </div>   

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="purchase">Purchase Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="purchase" >
                      </div>
                  </div>   

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="renewal">Renewal Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="renewal">
                      </div>
                  </div>   

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="key">Product Key</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="key" placeholder="XXXXX-XXXXX-XXXXX-XXXXX-XXXXX">
                      </div>
                  </div>   

                  <div class="form-group">
                    <label class="control-label col-sm-2" for="disabled">Disabled?</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="disabled" placeholder="Or currently being using">
                      </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
                    
                 </form>
                 </div> <!--modal content-->
                </div> <!--modal div-->
              

          <!--New Asset Modal Script-->
          <script>
          // Get the modal
          var modal = document.getElementById('myModal');

          // Get the button that opens the modal
          var btn = document.getElementById("myBtn");

          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];

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

          <!--Display Table for Open Tickets-->
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name/Desc</th>
                <th>Type</th>
                <th>Location</th>
                <th>Asset Tag</th>
                <th>IP Address</th>
                <th>Manufacturer</th>
                <th>Model</th>
                <th>Serial</th>
                <th>Purchase Date</th>
                <th>Renew Date</th>
                <th>Product Key</th>
                <th>Disabled?</th>
                <th>Delete Asset</th>
              </tr>
            </thead>
            
            @if (!empty($qassets))
              @foreach ($qassets as $qassets)
              <tbody>
                <tr id="{{ $qassets->id }}">
                  <td>{{ $qassets->name }}</td>
                  <td>{{ $qassets->itemtype }}</td>
                  <td>{{ $qassets->location }}</td>
                  <td>{{ $qassets->assettag }}</td>
                  <td>{{ $qassets->ipaddress }}</td>
                  <td>{{ $qassets->manufacturer }}</td>
                  <td>{{ $qassets->model }}</td>
                  <td>{{ $qassets->serialnumber }}</td>
                  <td>{{ $qassets->purchasedate }}</td>
                  <td>{{ $qassets->renewby }}</td>
                  <td>{{ $qassets->productkey }}</td>
                  <td>{{ $qassets->currentlydisabled }}</td>
                  <td><button id="delete" value="{{ $qassets->isdeleted }}" name="delete" onclick="deleteAsset({{ $qassets->id }})">Delete</button></td> 
                </tr>
              </div>
              </tbody>
              @endforeach
            @endif
          </table> 
        </div> 


        <!-- Modal content for Delete Asset Button -->
        <!-- The Modal -->
          <div id="deleteModal" class="modal">
          
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

        <-- Content for Delete Modal-->
        <div class="modal-content">
          <span id="deleteAsset" class="close">x</span>
        <form class="form-horizontal" action="/deleteAsset">
          Delete Asset
          <div class="form-group">
          <br><br>
            <label class="control-label col-sm-2" for="asset">How Asset Was Removed</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="del" placeholder="ex. destroyed, donated">
              
              <input type="text" name="id" id="delassetId">
              <!-- <input type="hidden" name="name" id="delname">
              <input type="hidden" name="itemtype" id="delitemtype">
              <input type="hidden" name="location" id="dellocation">
              <input type="hidden" name="ipaddress" id="delipaddress">
              <input type="hidden" name="manufacturer" id="delmanufacturer">
              <input type="hidden" name="model" id="delmodel">
              <input type="hidden" name="serialnumber" id="delserialnumber">
              <input type="hidden" name="purchasedate" id="delpurchasedate">
              <input type="hidden" name="renewby" id="delrenewby">
              <input type="hidden" name="productkey" id="delproductkey">
              <input type="hidden" name="currentlydisabled" id="delcurrentlydisabled"> -->
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="closeButton" class="btn btn-default">Delete</button>
              </div>
            </div>
          </div>
          </form>
        </div>

      <!--Script for Delete Asset-->
      <script>
        // Get the modal
        var modal1 = document.getElementById('deleteModal');

        // Get the <span> element that closes the modal
        var span1 = document.getElementById("deleteAsset");

        // When the user clicks on the button, open the modal
        function deleteAsset(assetId) {
            console.log(assetId);
            modal1.style.display = "block";
            $("#delassetId").val(assetId);
        }

        // When the user clicks on <span> (x), close the modal
        span1.onclick = function() {
            modal1.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal1) {
                modal1.style.display = "none";
            }
        }
        </script>
       </div>
      </div>
      <div class="chatbox3 col-md-2">
        <iframe src="http://localhost:8000/"></iframe>
      </div>
    </div> 
  </div>    
@endsection
