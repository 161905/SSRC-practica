<head>
    <meta charset="UTF-8">
    <title> Sistema de Solicitud de Recursos Computacionales @yield('htmlheader_title', 'Your title here') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = @php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        @endphp
    </script>
<style>
.dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #2980B9;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}

.myButton {
    -moz-box-shadow:inset 0px 39px 0px -24px #e67a73;
    -webkit-box-shadow:inset 0px 39px 0px -24px #e67a73;
    box-shadow:inset 0px 39px 0px -24px #e67a73;
    background-color:#e4685d;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;
    border:1px solid #ffffff;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:15px;
    padding:6px 15px;
    text-decoration:none;
    text-shadow:0px 1px 0px #b23e35;
    width: 110px;
    text-align: center;
    
}
.myButton:hover {
    background-color:#eb675e;
    width: 110px;
}
.myButton:active {
    position:relative;
    top:1px;
    width: 110  px;
}

.myButton2 {
    -moz-box-shadow:inset 0px 39px 0px -24px #e67a73;
    -webkit-box-shadow:inset 0px 39px 0px -24px #e67a73;
    box-shadow:inset 0px 39px 0px -24px #DDD910;
    background-color:#BDBA0E;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;
    border:1px solid #ffffff;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:15px;
    padding:6px 15px;
    text-decoration:none;
    text-shadow:0px 1px 0px #b23e35;
    width: 110px;
    text-align: center;
    
}
.myButton2:hover {
    background-color:#93DD10;
    box-shadow:inset 0px 39px 0px -24px #93DD10;
    width: 110px;
}
.myButton2  :active {
    position:relative;
    top:1px;
    width: 110  px;
}

.myButton4 {
    -moz-box-shadow:inset 0px 39px 0px -24px #e67a73;
    -webkit-box-shadow:inset 0px 39px 0px -24px #e67a73;
    box-shadow:inset 0px 39px 0px -24px #5ED88D;
    background-color:#5ED8BD;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;
    border:1px solid #ffffff;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:15px;
    padding:6px 15px;
    text-decoration:none;
    text-shadow:0px 1px 0px #b23e35;
    width: 110px;
    text-align: center;
    
}
.myButton4:hover {
    background-color: #8BEC85;
    box-shadow:inset 0px 39px 0px -24px #8BEC85;
    width: 110px;
}
.myButton4 :active {
    position:relative;
    top:1px;
    width: 110  px;
}

.myButton5{
    -moz-box-shadow:inset 0px 39px 0px -24px #e67a73;
    -webkit-box-shadow:inset 0px 39px 0px -24px #e67a73;
    box-shadow:inset 0px 39px 0px -24px #FF5757;
    background-color:red;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;
    border:1px solid #ffffff;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:15px;
    padding:6px 15px;
    text-decoration:none;
    text-shadow:0px 1px 0px #b23e35;
    width: 110px;
    text-align: center;
    
}
.myButton5:hover {
    background-color: #FFBD57;
    box-shadow:inset 0px 39px 0px -24px #FFBD57;
    width: 110px;
}
.myButton5 :active {
    position:relative;
    top:1px;
    width: 110  px;
}






</style>


</head>
