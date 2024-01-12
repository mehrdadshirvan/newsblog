@extends('layouts.admin')


@section('content')
    <div class="container" style="background: #fff;box-shadow: 0px 3px 10px 0px #00000040;padding: 0;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p style="margin: 0;padding: 5px 15px;font-weight: 600">
                    <i class="fa fa-user-plus"></i>
                    ایجاد کاربر جدید
                </p>
                <hr style="margin: 5px;">
                <form class="col-md-12" action="{{ url('/admin/make-new-user') }}" method="post">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">
                                نام کاربری:
                            </label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-3 control-label">
                                ایمیل کاربری:
                            </label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-3 control-label">
                                رمز ورود:
                            </label>

                            <div class="col-md-9">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">
                                تکرار رمز ورود:
                            </label>

                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                    <br>
                                <button type="submit" class="btn btn-primary">
                                    ثبت کاربر جدید
                                </button>
                    <br>
                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                </form>
                <hr>
            </div>
        </div>
    </div>
@endsection