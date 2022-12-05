<div>
    @if($errors->any())
        <div class="alert alert-success" id="success-alert" role="alert">
            <h4 class="alert-heading">Successfull!</h4>
            @if(implode('', $errors->all(':message'))=="updated")
                <p>Patient successfully Updated!.</p>
            @else
                <p>You have successfully added new Patient.</p>
            @endif
        </div>
    @endif
    <div class="card">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Add New Patient</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(isset($user))
            <form action="/{{Auth()->user()->role}}/patient/edit/{{$user[0]->id}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <div class="imgbox">
                                @if($user[0]->propic == "empty.png")
                                    <img src="/uploads/profile/empty/empty.png" alt="" id="propic">
                                @else
                                    <img src="/uploads/profile/{{$user[0]->user_id}}/{{$user[0]->propic}}" alt="" id="propic">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""
                                >Profile Photo <span class="red_star">*</span></label
                            >
                            <input
                                type="file"
                                name="file"
                                id="file"
                                class="form-control"
                            />
                        </div>
                    </div>
                    
                    <div class="col-lg-5" style="padding-left:40px">
                        <div class="form-group">
                            <label for=""
                                >Patient Name
                                <span class="red_star">*</span></label
                            >
                            <input
                                type="text"
                                name="pname"
                                id="pname"
                                class="form-control changeble"
                                value="{{$user[0]->name}}"
                                disabled
                            />
                        </div>
                        <div class="form-group">
                            <label for=""
                                >Email
                                <span class="red_star">*</span></label
                            >
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                value="{{$user[0]->email}}"
                                disabled
                            />
                        </div>
                        
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for=""
                                >Patient Unique Id <span class="red_star">*</span></label
                            >
                            <input
                                type="text"
                                name="puid"
                                id="puid"
                                class="form-control"
                                value="{{$user[0]->puid}}"
                                required
                                readonly
                            />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for=""
                                >Date of Birth <span class="red_star">*</span></label
                            >
                            <input
                                type="date"
                                name="dob"
                                id="dob"
                                value="{{$user[0]->dob}}"
                                class="form-control"
                                required
                            />
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for=""
                                >Phone <span class="red_star">*</span></label
                            >
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="form-control"
                                value="{{$user[0]->phone}}"
                                required
                            />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for=""
                                >NIC</label
                            >
                            <input
                                type="text"
                                name="nic"
                                id="nic"
                                class="form-control"
                                value="{{$user[0]->nic}}"
                            />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for=""
                                >Address <span class="red_star">*</span></label
                            >
                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="form-control"
                                required
                                value="{{$user[0]->address}}"
                            />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for=""
                                >Blood Group <span class="red_star">*</span></label
                            >
                            <select name="bgroup" id="bgroup" class="form-control">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
                </div>
            
               
                <div class="form-group">
                    <input
                        type="submit"
                        name="submit"
                        id="submit"
                        class="btn bg-gradient-success"
                        value="Update"
                    />
                </div>
            </form>
            @else
            <form action="/{{Auth()->user()->role}}/patient/add" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-2 col-md-6">
                        <div class="form-group">
                            <div class="imgbox">
                                <img src="/uploads/profile/empty/empty.png" alt="" id="propic">
                            </div>
                        </div>
                        <label for=""
                            >Profile Photo <span class="red_star">*</span></label
                        >
                        <input
                            type="file"
                            name="file"
                            id="file"
                            class="form-control"
                        />
                    </div>
                    <div class="col-lg-10" style="padding-left:40px">
                        <div class="row">
                            <div class="form-group col-lg-6" >
                                <label for=""
                                    >Patient Name
                                    <span class="red_star">*</span></label
                                >
                                <input
                                    type="text"
                                    name="pname"
                                    id="pname"
                                    class="form-control"
                                    
                                    required
                                />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for=""
                                    >Email
                                    <span class="red_star">*</span></label
                                >
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""
                                        >Patient Unique Id <span class="red_star">*</span></label
                                    >
                                    <input
                                        type="text"
                                        name="puid"
                                        id="puid"
                                        class="form-control"
                                        value={{$newPUID}}
                                        required
                                        readonly
                                    />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""
                                        >Date of Birth <span class="red_star">*</span></label
                                    >
                                    <input
                                        type="date"
                                        name="dob"
                                        id="dob"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""
                                        >Phone <span class="red_star">*</span></label
                                    >
                                    <input
                                        type="text"
                                        name="phone"
                                        id="phone"
                                        class="form-control"
                                        value=""
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for=""
                                        >NIC</label
                                    >
                                    <input
                                        type="text"
                                        name="nic"
                                        id="nic"
                                        class="form-control"
                                        value=""
                                    />
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for=""
                                        >Address <span class="red_star">*</span></label
                                    >
                                    <input
                                        type="text"
                                        name="address"
                                        id="address"
                                        class="form-control"
                                        required
                                    />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
               
                </div>
               
               
                
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for=""
                                >Blood Group <span class="red_star">*</span></label
                            >
                            <select name="bgroup" id="bgroup" class="form-control">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group col-lg-3">
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#propic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file").change(function(){
        readURL(this);
    });
</script>