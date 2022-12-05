<div>
    @if($errors->any())
        <div class="alert alert-success" id="success-alert" role="alert">
            <h4 class="alert-heading">Successfull!</h4>
            <p>You have successfully Added Medication.</p>
        </div>
    @endif
    <div class="">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="/uploads/profile/empty/empty.png" alt="" id="propic"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{Auth::user()->name}}
                        </h5>
                        <h6 class="mb-0 text-sm">
                            {{$channel->name}}
                        </h6>
                        <h6 class="mb-0 font-weight-normal text-sm">
                            Registed Patients ({{count($tickets)}})
                        </h6>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{$channel->date}}
                        </p>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{$channel->note}}
                        </p>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-7 col-lg-6">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Tickets Informations</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                @if(count($tickets)>0)
                                    @foreach($tickets as $ticket)
                                        @php
                                            $recipt = App\Http\Controllers\TicketController::getRecipt($ticket->tid);
                                        @endphp
                                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg ">
                                            @if($ticket->status == 2)
                                                <div class="special-card bg-green-card"></div>
                                            @endif
                                                <div class="d-flex flex-column @if($ticket->status == 2) special-card-body   @endif">
                                                    <h6 class="mb-3 text-sm">{{$ticket->name}} | {{$ticket->bookindate}}</h6>
                                                    @if($recipt)
                                                       
                                                        <span class="text-xs"><span
                                                            class="text-dark ms-sm-2 font-weight-bold newContent"> {!! $recipt->content !!}</span></span>
                                                        <span class="mb-2 text-xs">Summary: <span
                                                            class="text-dark ms-sm-2 font-weight-bold"> {{$recipt->reason}}</span></span>
                                                        <span class="text-xs">Staff Note: <span
                                                            class="text-dark ms-sm-2 font-weight-bold"> {!! $recipt->staff_note !!}</span></span>
                                                    @else
                                                        <span class="text-xs">Summary: <span
                                                            class="text-dark ms-sm-2 font-weight-bold">No Data</span></span>
                                                    @endif
                                                </div>
                                                <div class="ms-auto text-end">
                                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                        >
                                                        @if($ticket->status == 0)
                                                            Pending
                                                        @elseif($ticket->status == 1)
                                                            Processing
                                                        @elseif($ticket->status == 2)
                                                            closed
                                                        @endif
                                                    </a>
                                                    <a class="btn btn-link text-dark px-3 mb-0" href="/{{Auth()->user()->role}}/patient/view/{{$ticket->patient_id}}"><i
                                                            class="material-icons text-sm me-2">accessible_forward</i>View History</a>

                                                    @if($ticket->status == 0)
                                                        <a class="btn btn-link text-dark px-3 mb-0" href="/{{Auth()->user()->role}}/channels/recipts/add/{{$ticket->tid}}"><i
                                                            class="material-icons text-sm me-2">vaccines</i>Medication</a>
                                                    @elseif($ticket->status == 1)
                                                        <a class="btn btn-link text-dark px-3 mb-0" href="/{{Auth()->user()->role}}/channels/recipts/add/{{$ticket->tid}}"><i
                                                            class="material-icons text-sm me-2">vaccines</i>Medication</a>
                                                    @elseif($ticket->status == 2)
                                                        <a class="btn btn-link text-dark px-3 mb-0" href="/{{Auth()->user()->role}}/channels/recipts/edit/{{$ticket->tid}}"><i
                                                            class="material-icons text-sm me-2">vaccines</i>Edit</a>
                                                    @endif
                                                    
                                                </div>
                                        </li>
                                        @endforeach
                                    @else
                                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-3 text-sm">No Data </h6>
                                            </div>
                                        </li>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
</script>