@extends('account.index')

@section('content')

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module module-login span4 offset1">
                <form class="form-vertical" action="{{ route('account-sign-in-post') }}" method="POST">
                    @csrf
                    <div class="module-head">
                        <h3>Librarian / Admin Sign In</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" type="text" name="username" placeholder="Username" value="{{ old('username') }}" autofocus>
                                @if($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12" type="password" name="password" placeholder="Password">
                                @if($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                            <img src="{{ captcha_src() . '?' . time() }}" alt="Captcha Image"> <!-- Add the unique identifier -->
                            <button type="button" class="btn btn-danger" id="reload">
                                ↻
                            </button>
                                </br></br>
                                <input type="text" id="captcha" name="captcha" placeholder="Enter Captcha">
                                @if ($errors->has('captcha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" id="remember"> Remember me
                                </label>
                            </div>
                        </div>
                        <a href="{{ route('account-create') }}">New librarian? Sign Up</a>
                    </div>
                </form>
            </div>
            <div class="module module-login span4 offset2">
                <div class="module-head">
                    <h3>Student Section</h3>
                </div>
                <div class="module-body">
                    <p><a href="{{ route('student-registration') }}"><strong>Student Registration Form</strong></a></p>
                    <p><a href="{{ route('search-book') }}"><strong>Search Book</strong></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{ route('reload-captcha') }}',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@include('account.style')
@stop