<div>
    <div class="card col-lg-12 col-md-12 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 ps-3"  style="padding-right:16px">
                <div class="row">
                    <div class="form-group col-lg-10">
                        <h6 class="text-white text-capitalize ">Recipts List - ( {{date("Y/m/d")}} )</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
            @if(count($recipts))
                <table class="table align-items-center mb-0" id="table">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ticket No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Channl Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recipts as $recipt)
                            <tr class="trow">
                                <td>{{$recipt->name}}</td>
                                <td>{{$recipt->ticket_id}}</td>
                                <td>{{$recipt->cname}}</td>
                                <td>{{$recipt->price}}</td>
                                <td>{{$recipt->status}}</td>
                                <td>{{$recipt->created_at}}</td>
                                <td>
                                    <a href="/{{Auth()->user()->role}}/recipts/price/{{$recipt->rid}}" class="btn btn-success">Bill</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-capitalize ps-3">No Data Available</h6>
            @endif
            </div>
        </div>
    </div>
</div>
