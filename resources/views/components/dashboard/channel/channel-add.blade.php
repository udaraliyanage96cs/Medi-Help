<div>
    @if($errors->any())
        <div class="alert alert-success card col-lg-12" id="success-alert" role="alert">
            <h4 class="alert-heading">Successfull!</h4>
            @if(implode('', $errors->all(':message'))=="updated")
                <p>Channel successfully Updated!.</p>
            @else
                <p>You have successfully Added new Channel.</p>
            @endif
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            @if(isset($channel))
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Add New Channel</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/doctor/channels/edit/{{$channel->id}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Channel Title
                                    <span class="red_star">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{$channel->name}}"/>
                            </div>
                            <div class="form-group">
                                <label for="">Note <span class="red_star">*</span></label>
                                <input type="text" name="note" id="note" class="form-control" value="{{$channel->note}}" required />
                            </div>
                            <div class="form-group">
                                <label for="">Time<span class="red_star">*</span></label>
                                <input type="time" name="time" id="time" class="form-control" value="{{$channel->time}}" required />
                            </div>
                            <div class="form-group">
                                <label for="">Date<span class="red_star">*</span></label>
                                <input type="date" name="date" id="date" class="form-control" value="{{$channel->date}}" required />
                            </div>
                            <div class="form-group">
                                <label for="">Vanue<span class="red_star">*</span></label>
                                <input type="text" name="vanue" id="vanue" class="form-control" value="{{$channel->vanue}}" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="btn bg-gradient-success" value="Update" />
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Add New Channel</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/doctor/channels/add" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Channel Title
                                    <span class="red_star">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="">Note <span class="red_star">*</span></label>
                                <input type="text" name="note" id="note" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="">Time<span class="red_star">*</span></label>
                                <input type="time" name="time" id="time" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="">Date<span class="red_star">*</span></label>
                                <input type="date" name="date" id="date" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <label for="">Vanue<span class="red_star">*</span></label>
                                <input type="text" name="vanue" id="vanue" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" class="btn bg-gradient-primary" value="save" />
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-lg-6">
            
        </div>
    </div>

</div>
<script>
    $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
</script>