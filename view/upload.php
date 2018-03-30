<div class="container" style="padding-top: 65px">

    <form action="add/uploadfile" method="post" enctype=multipart/form-data>

        <div class="form-group">
            <label for="name">Picture name:</label>
            <input class="form-control" id="name" name="name"  type="text" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>


        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name=uploadfile class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">*.png *.jpg</small>
        </div>

        <input type=submit class="btn btn-primary" value=Загрузить>
    </form>
</div>