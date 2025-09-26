<!DOCTYPE html>
<html ⚡ lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">

    @include('frontend.amp.partials.amphead')
</head>
<body>


@include('frontend.amp.partials.ampheader')

@yield('content')

@include('frontend.amp.partials.ampfooter')

@include('frontend.amp.partials.ampscript')

</body>
</html>