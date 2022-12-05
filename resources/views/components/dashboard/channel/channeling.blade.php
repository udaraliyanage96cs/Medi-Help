<div>
    <div class="">
        <div class="addnew">
            <a href="/{{Auth()->user()->role}}/channels/add" class="btn btn-success">New Channel</a>
        </div>
    </div>
    @if(isset($todayChannel))
    <div class="card col-lg-12 col-md-12 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Today Channel</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="col-lg-1 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab"
                                href="/{{Auth()->user()->role}}/channels/edit/{{$todayChannel->id}}" role="tab"
                                aria-selected="false">
                                <i class="material-icons text-lg position-relative">settings</i>
                                <span class="ms-1">Edit</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mt-3">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">{{$todayChannel->name}}</h6>
                            <h6 class="mb-3 text-sm">Registed Patients ({{count($todayTickets)}})</h6>
                            <span class="mb-2 text-xs">Channel Note: <span
                                class="text-dark font-weight-bold ms-sm-2">{{$todayChannel->note}}</span></span>
                            <span class="mb-2 text-xs">Time: <span
                                class="text-dark font-weight-bold ms-sm-2">{{$todayChannel->time}}</span></span>
                            <span class="mb-2 text-xs">Vanue: <span
                                class="text-dark font-weight-bold ms-sm-2">{{$todayChannel->vanue}}</span></span>
                            <div class="mt-3">
                                <a href="/{{Auth()->user()->role}}/channels/view/{{$todayChannel->id}}" class="btn btn-success">View List</a>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="col-md-4">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mt-3">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">Informations</h6>
                            <span class="mb-2 text-xs">Registed Patients: <span
                                class="text-dark font-weight-bold ms-sm-2">{{count($todayTickets)}}</span></span>
                            <span class="mb-2 text-xs">Current Position: <span
                                class="text-dark font-weight-bold ms-sm-2">1</span></span>
                            <span class="mb-2 text-xs">Next Position: <span
                                class="text-dark font-weight-bold ms-sm-2">2</span></span>
                            <span class="mb-2 text-xs">Average Time: <span
                                class="text-dark font-weight-bold ms-sm-2">5:27 min</span></span>
                            <span class="mb-2 text-xs">Status: <span
                                class="text-dark font-weight-bold ms-sm-2">Processing</span></span>
                        </div>
                    </li>
                </div>
            </div>
          
        </div>
        
    </div>
    @endif
    <div class="card col-lg-12 col-md-12 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Channles Last Week</h6>
            </div>
        </div>
        <div class="card-body">
            @if(count($channels))
                <table class="table align-items-center mb-0 table-striped table-hover" id="table">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Note</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Time</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                                @foreach($channels as $channel)
                                    <tr class="trow">
                                        <td>{{$channel->date}}</td>
                                        <td>{{$channel->name}}</td>
                                        <td>{{$channel->note}}</td>
                                        <td>{{$channel->time}}</td>
                                        <td><a href="/{{Auth()->user()->role}}/channels/view/{{$channel->id}}" class="btn btn-success">View</a></td>
                                    </tr>
                                @endforeach
                            
                    </tbody>
                </table>
            @else
                <h6 class="text-capitalize ps-3">No Data</h6>
            @endif
        </div>
    </div>
</div>
</div>