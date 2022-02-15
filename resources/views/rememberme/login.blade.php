<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="main">
                <h3><a>Remember me in Laravel Example</a></h3>

                @php
                    if (isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass'])) {
                        $login_email = $_COOKIE['login_email'];
                        $login_pass = $_COOKIE['login_pass'];
                        $is_remember = "checked='checked'";
                    } else {
                        $login_email = '';
                        $login_pass = '';
                        $is_remember = '';
                    }
                @endphp
                <form role="form" action="{{ route('post.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="useremail">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{ $login_email }}" class="form-control">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="userpassword">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" value="{{ $login_pass }}" class="form-control">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" name="rememberme" {{ $is_remember }}>
                            Remember me </label>
                    </div>
                    <button type="submit" class="btn btn btn-secondary">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
