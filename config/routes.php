<?php
return [

    'pictures/([0-9]+)' => 'pictures/view/$1', // actionView in PicturesController

    'testpage' => 'pictures/testpage', // actionTestpage in PicturesController

    'pictures/add' => 'pictures/add', // actionAdd in PicturesController

    'login' => 'users/login', // actionLogin in UsersController

    'registration' => 'users/registration', // actionRegistration in UsersController

    'account' => 'account/view', // actionView in AccountController

    '' => 'pictures/index', // actionIndex in PicturesController

];