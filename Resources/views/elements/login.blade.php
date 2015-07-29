<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>{!! $title !!}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        @if ($favicon != '')
        <link rel="shortcut icon" href="{!! $favicon !!}" />
        @endif

        {!! $resourceBag->getParsedCSS() !!}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page" style="background-image: url('{!! $backgroundImage !!}');">
        <div class="login-box">
            <div class="login-box-body clearfix">
                <div class="login-logo">
                    {!! $logo !!}
                </div>
                <p class="login-box-msg">{!! $heading !!}</p>
                @if ($showError)
                <p class="text-center text-danger">
                    <strong>{!! $errorMessage !!}</strong>
                </p>
                @endif
                {!! Form::open($form) !!}
                    <div class="form-group has-feedback{!! $showError ? ' has-error' : '' !!}">
                        <input name="{!! $fieldLoginName !!}" type="text" class="form-control" placeholder="{!! $fieldLoginPlaceholder !!}" />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback{!! $showError ? ' has-error' : '' !!}">
                        <input name="{!! $fieldPasswordName !!}" type="password" class="form-control" placeholder="{!! $fieldPasswordPlaceholder !!}" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    @if ($webURL != '')
                    <a href="{!! $webURL !!}" class="pull-left btn btn-default btn-flat">{!! $showWeb !!}</a>
                    @endif
                    <button type="submit" class="pull-right btn btn-primary btn-flat">{!! $login !!}</button>
                </form>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- REQUIRED JS SCRIPTS -->

        {!! $resourceBag->getParsedConfig() !!}

        {!! $resourceBag->getParsedJS() !!}

        <script>
        // All assets are loaded now. Call handler.
        assetsLoaded();
        </script>

    </body>
</html>