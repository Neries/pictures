<?php
return [
    'pictures/add/uploadfile' => 'pictures/uploadfile', // actionUploadfile in PicturesController

    'pictures/([0-9]+)' => 'pictures/view/$1', // actionView in PicturesController

    'pictures/add' => 'pictures/add', // actionAdd in PicturesController

    '' => 'pictures/index', // actionIndex in PicturesController



];