<div>
    @if($errors->any())
    <div class="alert alert-success card col-lg-12" role="alert">
        <h4 class="alert-heading">Successfull!</h4>
        <p>You have successfully Updated your profile.</p>
    </div>
    @endif
    <div class="">
        <div class="addnew">
            <a href="/{{Auth()->user()->role}}/patient/add" class="btn btn-success">New Patient</a>
        </div>
    </div>

    <div class="">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if($Patient[0]->propic == "empty.png")
                        <img src="/uploads/profile/empty/empty.png" alt="" id="propic"
                            class="w-100 border-radius-lg shadow-sm">
                        @else
                        <img src="/uploads/profile/{{$Patient[0]->user_id}}/{{$Patient[0]->propic}}" alt=""
                            class="w-100 border-radius-lg shadow-sm" id="propic">
                        @endif
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$Patient[0]->name}}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{$Patient[0]->puid}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab"
                                    href="/{{Auth()->user()->role}}/patient/edit/{{$Patient[0]->id}}" role="tab"
                                    aria-selected="false">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1">Edit</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="/{{Auth()->user()->role}}/patient/edit/{{$Patient[0]->id}}">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <p class="text-sm">
                                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two
                                    equally difficult paths, choose the one more painful in the short term (pain
                                    avoidance is creating an illusion of equality).
                                </p>
                                <hr class="horizontal gray-light my-4">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                            class="text-dark">Full Name:</strong> &nbsp; {{$Patient[0]->name}}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                            class="text-dark">NIC:</strong> &nbsp; {{$Patient[0]->nic}}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">Age:</strong> &nbsp; {{$age}} | {{$Patient[0]->dob}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Mobile:</strong> &nbsp; {{$Patient[0]->phone}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Email:</strong> &nbsp; {{$Patient[0]->email}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Location:</strong> &nbsp; {{$Patient[0]->address}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Barcode:</strong> &nbsp; {{$Patient[0]->puid}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Blood
                                            Group:</strong> &nbsp; {{$Patient[0]->bloodgroup}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-5 ml-auto">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Patient History</h6>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-group">
                                    @if(count($tickets)>0)
                                        @foreach($tickets as $ticket)
                                            @php
                                                $recipt = App\Http\Controllers\TicketController::getRecipt($ticket->tid);
                                            @endphp
                                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-3 text-sm">{{$ticket->name}} | {{$ticket->bookindate}} </h6>
                                                <span class="mb-2 text-xs">Channel Note: <span
                                                        class="text-dark font-weight-bold ms-sm-2">{{$ticket->note}}</span></span>
                                                <span class="mb-2 text-xs">Doctor Name: <span
                                                        class="text-dark ms-sm-2 font-weight-bold">{{$ticket->uname}}</span></span>
                                                @if($recipt)
                                                    <span class="mb-2 text-xs">Decies Reason: <span
                                                        class="text-dark ms-sm-2 font-weight-bold"> {{$recipt->reason}}</span></span>
                                                    <span class="text-xs"><span
                                                        class="text-dark ms-sm-2 font-weight-bold"> {!! $recipt->content !!}</span></span>
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
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3 ml-auto">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Reports</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="">
                                    <div class="">
                                        <div class="addnew" style="display:flex;justify-content:flex-end">
                                            <a href="/{{Auth()->user()->role}}/patient/reports/add/{{$Patient[0]->id}}" class="btn btn-success">Add Report</a>
                                        </div>
                                    </div>
                                </div>
                                @if(count($reports))
                                    @foreach($reports as $report)
                                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$report->title}}</h6>
                                                <span class="text-xs">Date : {{$report->created_at->toDateString()}}</span>
                                                <span class="text-xs">Price : {{$report->price}}</span>
                                                <span class="text-xs">Note : {{$report->staff_note}}</span>
                                            </div>
                                            <div class="d-flex align-items-center text-sm">
                                                <a  data-toggle="tooltip" data-placement="top" title="View Report" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" target="_blank" href="/uploads/reports/{{$report->patient_id}}/{{$report->url}}">
                                                    <i class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                                </a>
                                                <a data-toggle="tooltip" data-placement="top" title="Copy To Clipboard" 
                                                onclick="copyToClipboard('{{URL::to('/')}}/uploads/reports/{{$report->patient_id}}/{{$report->url}}')" 
                                                class="btn btn-link text-dark text-sm mb-0 px-0 ms-4 copyBtn" target="_blank" >
                                                    <i class="material-icons text-lg position-relative me-1">content_copy</i>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg text-end">
                                        <div class="d-flex flex-column text-end">
                                            <h6 class="mb-1 text-dark font-weight-bold text-sm text-end">No Data</h6>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function copyToClipboard(url) {
        console.log(url);
        navigator.clipboard.writeText(url);
    }
</script>