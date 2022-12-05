<div>
    @if($errors->any())
    <div class="alert alert-success card col-lg-12" role="alert" id="success-alert">
        <h4 class="alert-heading">Successfull!</h4>
        <p>You have successfully Updated.</p>
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
                        @if($recipts[0]->propic == "empty.png")
                        <img src="/uploads/profile/empty/empty.png" alt="" id="propic"
                            class="w-100 border-radius-lg shadow-sm">
                        @else
                        <img src="/uploads/profile/{{$recipts[0]->user_id}}/{{$recipts[0]->propic}}" alt=""
                            class="w-100 border-radius-lg shadow-sm" id="propic">
                        @endif
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{$recipts[0]->uname}}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{$recipts[0]->puid}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card card-plain">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 d-flex align-items-center">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <span class="mb-2 text-xs">Decies Reason: <span
                                                class="text-dark ms-sm-2 font-weight-bold"> {{$recipts[0]->reason}}</span></span>
                                            <span class="text-xs"><span
                                                    class="text-dark ms-sm-2 font-weight-bold"> {!! $recipts[0]->content !!}</span></span>
                                            @if($recipts[0]->status == 2)
                                            <span class="text-xs"><span
                                                class="text-dark ms-sm-2 font-weight-bold"> {!! $recipts[0]->staff_note !!}</span></span>
                                            <span class="text-xs"><span
                                                class="text-dark  font-weight-bold">Price : {{$recipts[0]->price }}</span></span>
                                            @endif
                                        </div>
                                        <div class="ms-auto text-end">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                >
                                                {{$recipts[0]->status}}
                                            </a>
                                            
                                        </div>
                                    </li>
                                </ul>
                                <p class="text-sm">
                                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two
                                    equally difficult paths, choose the one more painful in the short term (pain
                                    avoidance is creating an illusion of equality).
                                </p>
                                <ul class="list-group mt-3">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                            class="text-dark">Full Name:</strong> &nbsp; {{$recipts[0]->uname}}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                            class="text-dark">NIC:</strong> &nbsp; {{$recipts[0]->nic}}</li>
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">Age:</strong> &nbsp; {{Carbon\Carbon::parse($recipts[0]->dob)->age}} | {{$recipts[0]->dob}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Mobile:</strong> &nbsp; {{$recipts[0]->phone}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Email:</strong> &nbsp; {{$recipts[0]->email}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Location:</strong> &nbsp; {{$recipts[0]->address}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Barcode:</strong> &nbsp; {{$recipts[0]->puid}}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Blood
                                            Group:</strong> &nbsp; {{$recipts[0]->bloodgroup}}</li>
                                </ul>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="col-12 col-xl-8 ml-auto">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Medication</h6>
                            </div>
                            <div class="card-body p-3">
                                <form action="/{{Auth()->user()->role}}/recipts/price/{{$recipts[0]->rid}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Add Note <span class="red_star">*</span></label>
                                            <textarea name="note" required>{!! $recipts[0]->staff_note !!}</textarea>
                                        </div>
                                    <div class="form-group">
                                        <label for="">Price <span class="red_star">*</span></label>
                                        <input type="number" name="price" id="price" step=".01" class="form-control" required  value="{{ $recipts[0]->price }}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" id="submit" class="btn bg-gradient-primary" value="save" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'note' );
</script>
<script>
    $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>