<div class="row align-items-center" style="height: 60vh" >
    <div class="mx-auto  col-5 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Login System</h5>
            <div class=" card-body ">
                <form  method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">Username</label>
                            <input type="text" class="form-control" name="user">
                        </div>
                        <div class="form-grup col-12 mb-2 input-group-sm">
                            <label class="form-control-label">Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="modal-footer col-12  py-1">
                            <input type="hidden" name="table" value="user">
                            <button  name="login" value="1" class="btn btn-sm btn-block btn-danger">login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
