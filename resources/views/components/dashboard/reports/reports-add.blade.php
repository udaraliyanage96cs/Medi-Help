<div>
    @if($errors->any())
        <div class="alert alert-success" id="success-alert" role="alert">
            <h4 class="alert-heading">Successfull!</h4>
            <p>Report successfully Attached.</p>
        </div>
    @endif
    <div class="card col-lg-12 col-md-12 mt-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 ps-3" style="padding-right:16px">
                <div class="row">
                    <div class="col-lg-10">
                        <h6 class="text-white text-capitalize ">Add Reports</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="/{{Auth()->user()->role}}/patient/reports/add/{{$patientID}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Report Title
                        <span class="red_star">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="">Note <span class="red_star">*</span></label>
                    <input type="text" name="note" id="note" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="">Price <span class="red_star">*</span></label>
                    <input type="number" name="price" id="price" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="">Document (PDF) <span class="red_star">*</span></label>
                    <input type="file" name="file" id="file"   accept="application/pdf" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="btn bg-gradient-primary" value="save" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
</script>