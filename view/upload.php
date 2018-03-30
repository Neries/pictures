<?php return '
<div class="container" style="padding-top: 65px">

    <form action="add/uploadfile" method="post" enctype=multipart/form-data>

        <div class="form-group">
            <label for="exampleTextarea">Example textarea</label>
            <textarea class="form-control" id="exampleTextarea" rows="1"></textarea>
        </div>


        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name=uploadfile class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">*.png *.jpg</small>
        </div>

        <input type=submit class="btn btn-primary" value=Загрузить>
    </form>
</div>
';