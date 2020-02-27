@extends('layouts.app')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            jQuery.ajax({
                url: "{{ url('/usersRegistered') }}",
                type: 'GET',
                success: function (response) {
                    document.getElementById('usersRegistered').innerHTML = response;
                },
                error: function (response) {
                    alert('error')
                }
            });
        }, false);
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Edição de Usuário - Usuarios Cadastrados: <span id="usersRegistered"></span>
                                        </div>

                                        <div class="panel-body">
                                            <form class="form-horizontal" method="POST"
                                                  action="{{ route('putuser', Auth::user()->id ) }}">

                                                {{ csrf_field() }}
                                                <meta name="csrf_token" content="{{ csrf_token() }}">
                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Name</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name"
                                                               value="{{ Auth::user()->name }}" required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password"
                                                           class="col-md-4 control-label">Password</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control"
                                                               name="password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirm
                                                        Password</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password"
                                                               class="form-control" name="password_confirmation"
                                                               required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Update
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
