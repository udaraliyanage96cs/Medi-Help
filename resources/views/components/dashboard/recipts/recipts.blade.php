<div>
    <div class="card col-lg-12 col-md-12 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3" style="padding-right:16px">
                <div class="row">
                    <div class="form-group col-lg-10">
                        <h6 class="text-white text-capitalize ps-3">Today Channels - ( {{date("Y/m/d")}} )</h6>
                    </div>
                    <div class="form-group col-lg-2">
                        <input type="date" name="datfilter" id="datfilter" class="form-control" style="color:#fff">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="row" id="content_box">
                    @if(count($channels))
                        @foreach($channels as $channel)
                            @php
                                $ticketCount = App\Http\Controllers\ChannelController::getPatientCount($channel->id);
                            @endphp
                                <div class="col-md-4" >
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mt-3" class="child_box">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">{{$channel->name}}</h6>
                                            <h6 class="mb-3 text-sm">Registed Patients  ({{count($ticketCount)}})</h6>
                                            <span class="mb-2 text-xs">Channel Note: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{$channel->note}}</span></span>
                                            <span class="mb-2 text-xs">Time: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{$channel->time}}</span></span>
                                            <span class="mb-2 text-xs">Vanue: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{$channel->vanue}}</span></span>
                                            <div class="mt-3">
                                                <a href="/{{Auth()->user()->role}}/recipts/view/{{$channel->id}}" class="btn btn-success">View List</a>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                        @endforeach
                </div>
                    @else
                    <h6 class="text-capitalize ps-3">No Data Available</h6>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    $('#datfilter').on('change', function() {
        var selected_option_value = $(this).val();
        console.log(selected_option_value);
        $.ajax({
            type: "get",
            url: '/{{Auth()->user()->role}}/recipts/filter/'+selected_option_value,
            success: function (res) {
                $("#content_box").empty();
                var channels = res['items'];
                console.log(res);
                if(channels.length>0){
                    for(let i=0;i<channels.length;i++){
                        let cid = channels[i]['id'];
                        let cname = channels[i]['name'];
                        let ticketCount = channels[i]['name'];
                        let note = channels[i]['note'];
                        let time = channels[i]['time'];
                        let vanue = channels[i]['vanue'];
                        let html = `
                        <div class="col-md-4" >
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg mt-3" class="child_box">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">${cname}</h6>
                                    <h6 class="mb-3 text-sm">Registed Patients  ()</h6>
                                    <span class="mb-2 text-xs">Channel Note: <span
                                        class="text-dark font-weight-bold ms-sm-2">${note}</span></span>
                                    <span class="mb-2 text-xs">Time: <span
                                        class="text-dark font-weight-bold ms-sm-2">${time}</span></span>
                                    <span class="mb-2 text-xs">Vanue: <span
                                        class="text-dark font-weight-bold ms-sm-2">${vanue}</span></span>
                                    <div class="mt-3">
                                        <a href="/{{Auth()->user()->role}}/recipts/view/${cid}" class="btn btn-success">View List</a>
                                    </div>
                                </div>
                            </li>
                        </div>
                        `;
                        $("#content_box").append(html);
                    }
                }else{
                    $("#content_box").append('<div>No Details</div>');
                }
            }

        });
    });
</script>