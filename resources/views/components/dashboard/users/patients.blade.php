<div>
    <div class="">
        <div class="addnew">
            <a href="/{{Auth()->user()->role}}/patient/add" class="btn btn-success">New Patient</a>
        </div>
    </div>
    <div class="card col-lg-12 col-md-12 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Patients</h6>
            </div>
            <div class="searchbox"><input type="text" id="searchbox" onkeyup="myFunction()" placeholder="Search..." title="Type in a any Detail" class="form-control searchbox"></div>
        </div>
        <div class="card-body">
            <table class="table align-items-center mb-0 table-striped table-hover" id="table">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birth Date</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIC</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bllod Group</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Registed At</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Profile</th>
                    </tr>
                </thead>
                <tbody>
                        @if($patients)
                            @foreach($patients as $patient)
                                <tr class="trow">
                                    <td>{{$patient->puid}}</td>
                                    <td>{{$patient->name}}</td>
                                    <td>{{$patient->email}}</td>
                                    <td>{{$patient->dob}}</td>
                                    <td>{{$patient->phone}}</td>
                                    <td>{{$patient->nic}}</td>
                                    <td>{{$patient->bloodgroup}}</td>
                                    <td>{{$patient->created_at}}</td>
                                    <td><a href="/{{Auth()->user()->role}}/patient/view/{{$patient->id}}" class="btn btn-success">View Profile</a></td>
                                </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
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
</script>