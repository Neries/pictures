<div class="container" style="padding-top: 65px">

    <form action="add/uploadfile" method="post" enctype=multipart/form-data>

        <div class="form-group">
            <label for="name">Picture name:</label>
            <input class="form-control" id="name" name="name" type="text" placeholder="Set picture name" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5" maxlength="900"
                      placeholder="Max length: 900 symbols." required></textarea>
        </div>

        <div class="row">
            <div class="form-group col-sm-2">

                <input type="file" name=uploadfile class="form-control-file btn" id="exampleInputFile"
                       aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">*.png *.jpg</small>
            </div>
            <div class="form-group col-sm-10">
                <input type=submit class="btn btn-primary pull-right" value=Загрузить>
            </div>
        </div>
    </form>
</div>