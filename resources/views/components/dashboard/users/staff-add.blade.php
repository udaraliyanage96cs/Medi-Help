<div>
    @if($errors->any())
        <div class="alert alert-success" id="success-alert" role="alert">
            <h4 class="alert-heading">Successfull!</h4>
            @if(implode('', $errors->all(':message'))=="updated")
                <p>You have successfully Updated!.</p>
            @else
                <p>You have successfully added new Staff Member.</p>
            @endif
        </div>
    @endif
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Add Staff Member</h6>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(isset($user))
            <!-- For Edit Staff -->
            <form action="/admin/staff/edit/{{$user->id}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for=""
                        >Members Name
                        <span class="red_star">*</span></label
                    >
                    <input
                        type="text"
                        name="mname"
                        id="mname"
                        class="form-control"
                        value="{{$user->name}}"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for=""
                        >Email <span class="red_star">*</span></label
                    >
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{$user->email}}"
                        class="form-control"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for=""
                        >Role Type
                        <span class="red_star">*</span></label
                    >
                    <select
                        name="rtype"
                        id="rtype"
                        class="form-control"
                    >
                        <option value="doctor" @if($user->role == "doctor") selected @endif>Doctor</option>
                        <option value="cashier" @if($user->role == "cashier") selected @endif>Cashier</option>
                        <option value="pharmasist" @if($user->role == "pharmasist") selected @endif>Pharmasist</option>
                    </select>
                </div>
                <div class="form-group">
                    <input
                        type="submit"
                        name="submit"
                        id="submit"
                        class="btn bg-gradient-primary"
                        value="Update"
                    />
                </div>
            </form>
            @else
            <!-- For Add New Staff -->
            <form action="/admin/staff/add" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for=""
                        >Members Name
                        <span class="red_star">*</span></label
                    >
                    <input
                        type="text"
                        name="mname"
                        id="mname"
                        class="form-control"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for=""
                        >Email <span class="red_star">*</span></label
                    >
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for=""
                        >Default Password <span class="red_star">*</span></label
                    >
                    <input
                        type="text"
                        name="pwd"
                        id="pwd"
                        class="form-control"
                        value="123"
                        required
                    />
                </div>
                <div class="form-group">
                    <label for=""
                        >Role Type
                        <span class="red_star">*</span></label
                    >
                    <select
                        name="rtype"
                        id="rtype"
                        class="form-control"
                    >
                        <option value="doctor">Doctor</option>
                        <option value="cashier">Cashier</option>
                        <option value="pharmasist">Pharmasist</option>
                    </select>
                </div>
                <div class="form-group">
                    <input
                        type="submit"
                        name="submit"
                        id="submit"
                        class="btn bg-gradient-primary"
                        value="save"
                    />
                </div>
            </form>
            @endif

        </div>
    </div>
</div>

<script>
    $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>