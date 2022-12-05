<meta name="csrf-token" content="{{ csrf_token() }}" />
<div>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert @if($error==1) alert-success @elseif($error==0) alert-warning @endif alert-dismissible text-white" role="alert" id="success-alert">
                @if($error==1)
                    <span class="text-sm">successfully booked an Appoinment for Today.</span>
                @elseif($error==0)
                    <span class="text-sm">This Patient has already booked an Appoinment for Today.</span>
                @endif
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif

    <div class="alert alert-warning alert-dismissible text-white" role="alert" id="success-alert-2">
        <span class="text-sm">This Patient has already booked an Appoinment for Today.</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    
    <div class="">
        <div class="addnew">
            <a href="/{{Auth()->user()->role}}/patient/add" class="btn btn-success">Register Patient</a>
        </div>
    </div>
    <div class="row">
        <div class="card col-md-5">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-7 col-7">
                        <h6>Today Tickets</h6>
                        <h5 id="ticket_date">{{date('Y-m-d')}}</h5>
                        <h6 class="" id="tickets_count">Count: {{count($tickets)}}</h6>
                    </div>
                    <div class="col-lg-5">
                        <label for="">Filter</label>
                        <input type="date" name="filter" id="filter" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if($tickets)
                    <table class="table align-items-center mb-0" id="tickets_date">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Queue</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Channel</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr class="trow @if($ticket->status == 1) onprogressRow @elseif($ticket->status == 2) closedRow @endif" >
                                    <td>{{$ticket->position}}</td>
                                    <td>{{$ticket->cname}}</td>
                                    <td>{{$ticket->puid}}</td>
                                    <td>{{$ticket->name}}</td>
                                    <td>{{$ticket->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                @endif
            </div>
        </div>
        <div class="col-md-7">
            <div class="ml-5 card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Add New Ticket</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input type="date" name="selectDate" id="selectDate" class="form-control" value="{{Carbon\Carbon::now()->toDateString()}}">
                        </div>
                        <div class="form-group col-lg-5">
                            <select name="channel" id="channel" class="form-control" >
                                <option value="" disabled selected>Select a Channel</option>
                                @if($channels)
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}">{{$channel->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5"><input type="text" id="searchPatient"  placeholder="Search By Barcode" title="Type in a any Detail" class="form-control "></div>
                        <div class="col-lg-3"><input type="button" value="Search" id="searchBtn" class="btn btn-success"></div>
                    </div>
                    <table class="table align-items-center mt-4" id="table_ticket">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birth Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bllod Group</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Attach Ticket</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ml-5 card mt-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Patients</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class=""><input type="text" id="searchbox" onkeyup="myFunction()" placeholder="Search..." title="Type in a any Detail" class="form-control"></div>
                    <table class="table align-items-center mt-4" id="table">
                        <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Barcode</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIC</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birth Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bllod Group</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($Patients)
                                @foreach($Patients as $patient)
                                    <tr class="trow">
                                        <td>{{$patient->puid}}</td>
                                        <td>{{$patient->nic}}</td>
                                        <td>{{$patient->email}}</td>
                                        <td>{{$patient->dob}}</td>
                                        <td>{{$patient->phone}}</td>
                                        <td>{{$patient->bloodgroup}}</td>
                                        <td><a href="/{{Auth()->user()->role}}/patient/view/{{$patient->pid}}" class=""><i class="material-icons ">account_box</i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
     
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('#success-alert-2').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function myFunction() {
        var $rows = $('#table .trow');
        $('#searchbox').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
            
            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });
    }



    $('#filter').on('change', function () {
        var filter = $("#filter").val();
        let bgClass;
        console.log(filter);
        $.ajax({
            type: "get",
            url: '/{{Auth()->user()->role}}/ticket/getspecific/' + filter,
            success: function (res) {
                $("#tickets_date").find("tr:gt(0)").remove();
                var tickets = res['item'];
                $("#tickets_count").text(tickets.length);
                if(tickets.length>0){
                    for(let i=0;i<tickets.length;i++){
                        if(tickets[i]["status"] == 1){
                            bgClass = "onprogressRow";
                        }else if(tickets[i]["status"] == 2){
                            bgClass = "closedRow";
                        }
                        $("#tickets_date tbody").append('<tr class="trow '+bgClass+'"><td>'+tickets[i]["position"]+'</td><td>'+
                        tickets[i]["cname"]+'</td><td>'+
                        tickets[i]["puid"]+'</td> <td>'+tickets[i]["name"]+'</td><td>'+tickets[i]["status"]+'</td></tr>');
                        bgClass= "";
                    }
                }else{
                    $("#tickets_date tbody").append('<tr class="trow"><td>No Details</td></tr>');
                }
            }

        });
    });

    $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });

    $('#selectDate').on('change', function() {
        var selected_option_value = $(this).val();
        $.ajax({
            type: "get",
            url: '/{{Auth()->user()->role}}/ticket/channels/' + selected_option_value,
            success: function (res) {
                console.log(res);
                $('#channel').empty();
                $('#channel').append('<option value="dis" selected disabled>Select a Channel</option>');
                $.each(res['item'], function (key, value) {
                    var id = value['id'];
                    var name = value['name'];
                    $('#channel').append('<option value="' + id + '">' + name + '</option>');
                });
            }

        });
    });

    $("#searchBtn").click(function(){
        let id = $("#searchPatient").val();
        $.ajax({
            type: "get",
            url: '/{{Auth()->user()->role}}/patient/puid/' + id,
            success: function (res) {
                console.log(res);
                $("#table_ticket").find("tr:gt(0)").remove();
                var patients = res['item'];
                console.log(patients);

                if(patients.length>0){
                    for(let i=0;i<patients.length;i++){
                        $("#table_ticket tbody").append('<tr class="trow"><td>'+patients[i]["puid"]+'</td><td>'+patients[i]["name"]+'</td> <td>'+patients[i]["email"]+
                        '</td><td>'+patients[i]["dob"]+'</td><td>'+patients[i]["phone"]+'</td><td>'
                        +patients[i]["bloodgroup"]+'</td><td><input type="button" onclick="getTicket()" class="btn btn-success col-lg-8" value="Get"></td></tr>');
                    }
                }else{
                    $("#table_ticket tbody").append('<tr class="trow"><td style="color:red">Not Found!</td></tr>');
                }
            }

        });
    });

    function getTicket(){
        
        let puid = $("#searchPatient").val();
        let selectDate = $("#selectDate").val();
        let channel = $('#channel').find(":selected").val();
        console.log("cccccc",puid,selectDate,channel);
        $.ajax({
            url: "/{{Auth()->user()->role}}/ticket/add",
            type: 'POST',
            data:{puid: puid, selectDate: selectDate,channel:channel,},
            dataType: 'json',
            success: function (data) {
                console.log(data['item']);
                if(data['item'] == -1){
                    $('#success-alert-2').show();
                    $("#success-alert-2").fadeTo(5000, 500).slideUp(500, function(){
                        $("#success-alert").slideUp(500);
                    });
                }else{
                    location.reload();
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }
    
</script>