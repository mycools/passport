<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Authorization</title>

    <!-- Styles -->
    <link href="{{ asset('/auth/assets/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/auth/assets/css/auth.css') }}">
    <style>
        .passport-authorize .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .passport-authorize .scopes {
            margin-top: 20px;
        }

        .passport-authorize .buttons {
            margin-top: 15px;
            text-align: center;
        }

        .passport-authorize .btn {
/*             width: 125px; */
        }

        .passport-authorize .btn-approve {
            margin-right: 15px;
        }

        .passport-authorize form {
            display: inline;
        }
    </style>
</head>
@if(env('OAUTH_AUTO_SCOPE')==true)
<body>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 col-sm-3 col-md-6 col-lg-2">
                    Redirecting....
                </div>
            </div>
    </div>
    <form id="autoallow" method="post" action="/oauth/authorize">
        {{ csrf_field() }}

        <input type="hidden" name="state" value="{{ $request->state }}">
        <input type="hidden" name="client_id" value="{{ $client->id }}">

    </form>
    <script>
    document.getElementById('autoallow').submit();
    </script>
</body>
@else
<body class="passport-authorize">
    <div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-6 col-sm-3 col-md-6 col-lg-2">
                <img src="{{ asset('/auth/images/logo.png') }}" class="img-fluid" />
            </div>
	    </div>
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card card-default">
                    <div class="card-header">
                        Log in with {{ env('AUTH_UNV') }} Account


                    </div>
                    <div class="card-body">
                        <!-- Introduction -->

                        <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>

                        <!-- Scope List -->
                        @if (count($scopes) > 0)
                            <div class="scopes">
                                    <p><strong>This application will be able to:</strong></p>

                                    <ul>
                                        @foreach ($scopes as $scope)



                                            @endphp
                                            <li>
                                            @if (is_array($scope->description))
                                            <div><strong>{{ __($scope->description['description']) }}</strong></div>

                                            @else
                                            <div>{{ __($scope->description) }}</div>
                                            @endif
                                            </li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
				<div class="row justify-content-center">
					<div class="col-sm-8 col-lg-6">
                        <div class="buttons">
                            <!-- Authorize Button -->
                            <form method="post" action="/oauth/authorize">
                                {{ csrf_field() }}

                                <input type="hidden" name="state" value="{{ $request->state }}">
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <button type="submit" class="btn btn-swu btn-approve btn-block">Continue as {{$user->firstname_en}}</button>
                            </form>
                        </div>
                        <div class="buttons">
                            <!-- Cancel Button -->
                            <form method="post" action="/oauth/authorize">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <input type="hidden" name="state" value="{{ $request->state }}">
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <button class="btn btn-default  btn-block">Cancel</button>
                            </form>
                        </div>
					</div>
				</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endif
</html>
