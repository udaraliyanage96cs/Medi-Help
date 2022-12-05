<div>
    <div class="">
        <div class="addnew">
            <a href="/admin/staff/add" class="btn btn-success">New Staff Member</a>
        </div>
    </div>
    <div class="card col-lg-12 col-md-12 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Staff Members</h6>
            </div>
        </div>
        <div class="card-body">
            <table class="table align-items-center mb-0" id="table">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Member Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                </thead>
                <tbody>
                        @if($users)
                            @foreach($users as $user)
                                <tr class="trow">
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td><a href="/admin/staff/edit/{{$user->id}}" class=""><i class="material-icons ">border_color</i></a></td>
                                    <td><a href="/admin/staff/delete/{{$user->id}}" class=""><i class="material-icons ">deleteoutline</i></a></td>
                                </tr>
                            @endforeach
                        @endif
                </tbody>
            </table>
        </div>
    </div>
</div>