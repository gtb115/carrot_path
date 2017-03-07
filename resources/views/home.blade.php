
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <title>CARROT PATH</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Molengo|Rancho" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Satisfy', cursive;
                font-weight: 400;
                height: 100vh;
                margin: 0;
                z-index: 1;
                background-image: url('https://blogs-images.forbes.com/sap/files/2016/12/All-In-Workers-1200x800.jpg');
                background-repeat: no-repeat;
                background-size: cover;
            }

            .full-height {
                height: 80vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                
            }

        
            .content {
                text-align: center;
                background-color: ;
                margin-right: 9em;
            }

            .title {
                font-size: 84px;
                
                color: #31034A;
            }

            .search {
                -webkit-appearance: none;
                height: 100%;
                width: 100%;
                background-color:#FFF;
                color:#666;
                font-weight:bold;
                border: solid #666 1px;
                text-align: center;
                font-size: 2em;

            }

            input {
                background-image: url('https://cdn1.iconfinder.com/data/icons/hawcons/32/698627-icon-111-search-128.png');
                background-repeat: no-repeat;
                background-size: 1.4em;
                padding-bottom: 10px;
                padding-top: 10px;
                
                border-radius: 20px 20px;
            }

            .m-b-md {
                margin-bottom: 10px;
                font-family: 'Satisfy', cursive;
            }

            .message {
                margin-bottom: 40px;
                font-family: 'Satisfy', cursive;
                font-size: 2em;
                color: #31034A;
            }

        </style>
    </head>
    <body>
        @include('layouts.nav')
        <div class="flex-center position-ref full-height">
        
            <div class="content">
                <div class="title m-b-md">
                    CARROT PATH
                </div>

                <div class="links">
                    <div class="message">Find Volunteering Opportunities Near You</div>
                    <input type="search" class="search" style='font-family: Molengo, sans-serif' placeholder="Enter You City or Town..."/>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="/js/home.js"></script>
</html>


