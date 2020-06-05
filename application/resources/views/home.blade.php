<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <style type="text/css">
        body {
            background: #41455A;
        }

        .form-control {
            box-shadow: none !important;
            height: 40px !important;
            /*border-radius: 0px !important;*/
        }

        .form-group {
            margin-bottom: 0px !important;
        }

        .btn-success,
        .btn-default,
        .btn-primary,
        .btn-warning,
        .btn-info {
            height: 40px !important;
        }

        input,
        select {
            border: 1px solid #4171D6 !important;
        }

        .navbar {
            background: #41455A;
            border: 0px;
        }

        .navbar-default .navbar-nav>li>a {
            color: #2CACF4;
        }

        .navbar-default .navbar-nav>li>a:hover {
            color: #fff;
        }

        .navbar-brand {
            color: #2CACF4 !important;
        }

        .panel,
        .panel .panel-heading,
        .panel .panel-body,
        .panel .panel-footer {
            background-color: #46475A;
            border: 2px solid transparent;
            background-image: linear-gradient(#42455a, #42455a), radial-gradient(circle at top left #fd00da, #19d7f4, #75d);
            background-origin: border-box;
            background-clip: content-box, border-box;
        }
        .pt-10{
            padding-top: 10px;
        }
        .fbbkash{
         display: none;
        }
        .twbkash{
         display: none;
        }
        .ytbkash{
         display: none;
        }
        .inbkash{
         display: none;
        }
        .mtc-10{
            color:#fff !important;
            margin-top:10px !important;
        }
        .mt-10{
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-default" style="border-radius: 0px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SMM PANEL</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::user())
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div style="border:1px groove;">
                    <center>
                        <h1 style="color:#E4E4E4;">
                            Get Your Social Account's
                        </h1>
                        <h1 style="color:#E4E4E4;">Followers And Likes At One</h1>
                        <h1 style="color:#E4E4E4;"> Place, Instantly</h1>
                    </center>
                </div>
            </div>
        </div><br><br>
        <section class="oder-option">
            <div class="row">
                <div class="col-md-12 message">
                </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title" style="color:#4267B2;"><i class="fa fa-facebook"></i> Facebook
                                </h2>
                            </div>
                            <div class="panel-body">
                                <form id="facebook_form" action="{{ route('facebook-post') }}" method="POST" class="form">
                                    @csrf
                                    <div class="form-group col-md-5">
                                        <input type="hidden" name="service_id" id="fb_service_id">
                                        <select name="facebook" id="facebook" class="form-control">
                                            <option value="0">Select services</option>
                                            @foreach(@service('Facebook') as $s)
                                            <option service_id="{{ $s->id }}" value="{{ $s->price }}">{{ $s->like }} {{ $s->service_title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                            <input type="text" class="form-control fb_charge" placeholder="Amount"
                                                disabled>
                                        </div>
                                        <input type="hidden" name="charge" class="fb_charge">
                                    </div>
                                    <div class="form-group col-md-3">
                                        @if (Auth::user())
                                            <button type="submit" class="btn btn-sm btn-warning form-control"><i
                                                class="fa fa-shopping-cart"></i> Order Now</button>
                                        @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-warning form-control pt-10"><i
                                            class="fa fa-shopping-cart"></i> <span>Order Now</span></a>
                                        @endif

                                    </div>

                                    <div class="form-group col-md-9 fbbkash">
                                        <label for="" class="mtc-10">bKash Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter you bkash number" name="bkash_no">

                                        <span class="help-block">
                                            <strong></strong>
                                        </span>

                                    </div>

                                </form>
                            </div>
                            <div class="panel-footer">

                            </div>
                        </div>
                    </div>
                    <!--col-md-6 end-->
                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 class="panel-title" style="color:#1DA1F2;"><i class="fa fa-twitter"></i> Twitter
                                </h1>
                            </div>
                            <div class="panel-body">
                                <form id="twitter_form" action="{{ route('twitter-post') }}" method="POST" class="form">
                                    @csrf
                                    <div class="form-group col-md-5">
                                        <input type="hidden" name="service_id" id="tw_service_id">
                                        <select name="twitter" id="twitter" class="form-control">
                                            <option  value="">Select services</option>
                                            @foreach(@service('Twitter') as $s)
                                            <option service_id="{{ $s->id }}" value="{{ $s->price }}">{{ $s->like }} {{ $s->service_title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                            <input type="text" class="form-control tw_charge" placeholder="Amount"
                                                disabled>
                                        </div>
                                        <input type="hidden" class="tw_charge" name="charge">
                                    </div>
                                    <div class="form-group col-md-3">
                                            @if (Auth::user())
                                                <button type="submit" class="btn btn-sm btn-warning form-control"><i
                                                    class="fa fa-shopping-cart"></i> Order Now</button>
                                            @else
                                            <a href="{{ route('login') }}" class="btn btn-sm btn-warning form-control pt-10"><i
                                                class="fa fa-shopping-cart"></i> <span>Order Now</span></a>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-9 twbkash">
                                            <label for="" class="mtc-10">bKash Number:</label>
                                            <input type="text" class="form-control" placeholder="Enter you bkash number" name="bkash_no">
                                        </div>
                                </form>
                            </div>
                            <div class="panel-footer"></div>
                        </div>

                    </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title" style="color:#FF0000;"><i class="fa fa-youtube"></i> Youtube</h1>
                        </div>
                        <div class="panel-body">
                            <form id="youtube_form" action="{{ route('youtube-post') }}" method="POST" class="form">
                                @csrf
                                <div class="form-group col-md-5">
                                    <input type="hidden" name="service_id" id="yt_service_id">
                                    <select name="youtube" id="youtube" class="form-control">
                                        <option value="">Select services</option>
                                        @foreach(@service('Youtube') as $s)
                                        <option service_id="{{ $s->id }}" value="{{ $s->price }}">{{ $s->like }} {{ $s->service_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="text" class="form-control yt_charge" placeholder="Amount" disabled>
                                    </div>
                                    <input type="hidden" name="charge" class="yt_charge">
                                </div>
                                <div class="form-group col-md-3">
                                        @if (Auth::user())
                                            <button type="submit" class="btn btn-sm btn-warning form-control"><i
                                                class="fa fa-shopping-cart"></i> Order Now</button>
                                        @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-warning form-control pt-10"><i
                                            class="fa fa-shopping-cart"></i> <span>Order Now</span></a>
                                        @endif

                                    </div>

                                    <div class="form-group col-md-9 ytbkash">
                                        <label for="" class="mtc-10">bKash Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter you bkash number" name="bkash_no">
                                    </div>
                            </form>
                        </div>
                        <div class="panel-footer"></div>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title" style="color:#C73768;"><i class="fa fa-instagram"></i> Instagram
                            </h1>
                        </div>
                        <div class="panel-body">
                            <form id="instagram_form" action="{{ route('instagram-post') }}" method="POST" class="form">
                                @csrf
                                <div class="form-group col-md-5">
                                    <input type="hidden" name="service_id" id="in_service_id">
                                    <select name="instagram" id="instagram" class="form-control">
                                        <option value="">Select services</option>
                                        @foreach(@service('Instagram') as $s)
                                        <option service_id="{{ $s->id }}" value="{{ $s->price }}">{{ $s->like }} {{ $s->service_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-addon">$</div>
                                        <input type="text" class="form-control in_charge" placeholder="Amount" disabled>
                                    </div>
                                    <input type="hidden" name="charge" class="in_charge">

                                </div>
                                <div class="form-group col-md-3">
                                        @if (Auth::user())
                                            <button type="submit" class="btn btn-sm btn-warning form-control"><i
                                                class="fa fa-shopping-cart"></i> Order Now</button>
                                        @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-warning form-control pt-10"><i
                                            class="fa fa-shopping-cart"></i> <span>Order Now</span></a>
                                        @endif

                                    </div>

                                    <div class="form-group col-md-9 inbkash">
                                        <label for="" class="mtc-10">bKash Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter you bkash number" name="bkash_no">
                                    </div>
                            </form>
                        </div>
                        <div class="panel-footer"></div>
                    </div>

                </div>
            </div>
        </section>
        <br><br>
        <section class="order-list" style="background: #ECF0F5;">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>SI.No.</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Like</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            //    dd($orders)
                            @endphp
                            @foreach ($orders as $index => $item)
                            <tr>
                                <td>{{ $index + 1}}</td>
                                <td>{{ userInfo($item->user_id)->name }}</td>
                                <td class="text-warning">{{ serviceInfo($item->service_id)->service_title }}</td>
                                <td>{{ serviceInfo($item->service_id)->like }} Likes</td>
                                <td>${{ serviceInfo($item->service_id)->price }}</td>
                                <td>{!! $item->status == 0?'<span class="text-warning">Pending</span>':($item->status == 1?'<span class="text-success">Completed</span>':'<span class="text-danger">Cancelled</span>') !!}</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">{{ $orders->links() }}</div>
            </div>
        </section>
    </div>
    <!--JQUERY ONCHANGE EVENT -->
    <script type="text/javascript">
        /*-----------------------------
        -----------------------------*/
        function sucessOrFail(response, className){
            if (response.errors) {
                className.html("").fadeIn();
                className.html('<div class="alert alert-danger">'+response.errors+'</div>').fadeOut(1000);
            }

            if (response.success) {
                className.html("").fadeIn();
                className.html('<div class="alert alert-success">'+response.success+'</div>').fadeOut(10000);
            }
        }

        function dispalyOnly(className){
            className.css({'display':'block'});
        }

        function displayNone(className){
            className.css({'display':'none'});
        }

        function insertData(formId, url, message, display){
            formId.on('submit', function(e){
            e.preventDefault();
            var fbData = new FormData(formId[0]);
            console.log(fbData);
            $.ajax({
                type:'POST',
                url: url,
                data:fbData,
                contentType:false,
                processData:false,
                success:function(response){
                    sucessOrFail(response, message);
                    displayNone(display)
                },
                error:function(message){
                    console.log(message.responseJSON.errors.bkash_no[0]);
                    var response = {
                        'errors':message.responseJSON.errors.bkash_no[0]
                    };
                    sucessOrFail(response, $('.message'));

                }
            });

        })
        }
        /*-----------------------------
            FACEBOOK SERVICE ONCHANGE EVENT
            ------------------------------*/
        $('#facebook').on('change', function () {
            $('.fb_charge').val($(this).val());
            var service_id = $('#facebook option:selected').attr('service_id');
            console.log(service_id);
            $('#fb_service_id').val(service_id);
            dispalyOnly($('.fbbkash'));
        });

        insertData($('#facebook_form'), '{{ route('facebook-post') }}', $('.message'), $('.fbbkash'));

        /*-----------------------------
         TWITTER SERVICE ONCHANGE EVENT
         ------------------------------*/
        $('#twitter').on('change', function () {
            $('.tw_charge').val($(this).val());
            var service_id = $('#twitter option:selected').attr('service_id');
            console.log(service_id);

            $('#tw_service_id').val(service_id);
            dispalyOnly($('.twbkash'));
        });
        insertData($('#twitter_form'), '{{ route('twitter-post') }}', $('.message'), $('.twbkash'));

        /*-----------------------------
            YOUTUBE SERVICE ONCHANGE EVENT
            ------------------------------*/
        $('#youtube').on('change', function () {
            $('.yt_charge').val($(this).val());
            var service_id = $('#youtube option:selected').attr('service_id');
            $('#yt_service_id').val(service_id);
            dispalyOnly($('.ytbkash'));
        });
        insertData($('#youtube_form'), '{{ route('youtube-post') }}', $('.message'), $('.ytbkash'));
        /*-----------------------------
            INSTAGRAM SERVICE ONCHANGE EVENT
            ------------------------------*/
        $('#instagram').on('change', function () {
            $('.in_charge').val($(this).val());
            var service_id = $('#instagram option:selected').attr('service_id');
            $('#in_service_id').val(service_id);
            dispalyOnly($('.inbkash'));

        });
        insertData($('#instagram_form'), '{{ route('instagram-post') }}', $('.message'), $('.inbkash'));

    </script>
</body>

</html>
