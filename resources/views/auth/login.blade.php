
@extends('layouts.app')

@section('content')
<style type="">
    .uk-navbar-container{
        display: none !important;
    }
    .uk-child-width-1-2\@s>*{
        width:50% !important;
    }
    .uk-label{
        background:#3abb45 !important;
    }
    .uk-button-primary{
         background:#3abb45 !important;
         transition: 0.5s;
    }
    .uk-button-primary:hover{
        background:#409848 !important;
    }
    .uk-text-primary{
        color:#3abb45 !important;
    }
    a{
        color:#3abb45 !important;
    }
    .uk-input:focus{
        border:1px solid #3abb45 !important;
    }
    .uk-input[type=text]{
        padding-left: 20px;
    }
    .uk-input{
    height: 50px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
    }
    ::placeholder{
        padding-left:20px;
    }
</style>


<div class="uk-modal-full login-bg">
        <div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
            
            <div class="uk-padding-large">
                
    <div class="uk-section">
         <a href="/" class="uk-button-default uk-text-primary uk-position-top-left" type="button" uk-icon="icon: arrow-left; ratio:2;"></a>
        <div class="col-md-8">
            <div class="uk-card uk-card-default">
                <div class="card-title uk-h2 uk-text-center uk-text-primary">{{ ('Login') }}</div>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ ('Login') }}">
                        @csrf
                              @if ($errors->has('email'))
                                   <div class="uk-alert-danger" uk-alert>
                                        <a class="uk-alert-close" uk-close></a>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif

                                 @if ($errors->has('password'))
                                    <div class="uk-alert-danger" uk-alert>
                                        <a class="uk-alert-close" uk-close></a>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                        <div class="uk-form-group uk-margin">
                            <label class="uk-label " for="email">{{ ('Student-Number') }}</label>
                
                                <input id="email" type="email" class="uk-input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                   
                        </div>

                        <div class="uk-form-group uk-margin">
                            <label class="uk-label " for="password">{{ ('Password') }}</label>

                  
                                <input id="password" type="password" class="uk-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

               
                        </div>

                        <div class="form-group uk-margin">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="uk-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label uk-text-default" for="remember">
                                        {{ ('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="uk-button uk-button-primary">
                                    {{ __('Login') }}
                                </button>
                                <br/>
                                <div class="uk-margin">
                                    <a class="uk-underline uk-text-primary" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                </div>
                            </div>
                        </div>
                    </form>
        
            </div>
        </div>
    </div>
            </div>
            <div class="uk-background-cover" style="clip-path: polygon(26% 0, 100% 0%, 100% 100%, 0 100%); background-image: url('http://www.lightyourmind.com/wp-content/uploads/2017/11/Books-Background-Hd-Wallpaper.jpg');" uk-height-viewport></div>
        </div>

</div>
@endsection
