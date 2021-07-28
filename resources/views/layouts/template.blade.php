<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">


    <title> @yield('title')</title>
    <meta name="description" content="ร้านค้าและสินค้า ในตลาดนัดสวนจตุจักร รวบรวมร้านค้าที่คัดเลือดมาแล้วอย่างดี จากทั้งหมด 8,000 ร้านค้า">
    <meta name="author" content="teeneejj">
    <meta name="keywords" content="">
    <meta name="googlebot" content="ALL">

    <meta property="og:url"           content="https://teeneejj.com" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="ร้านค้าและสินค้า ในตลาดนัดสวนจตุจักร" />
    <meta property="og:image"         content="https://teeneejj.com/assets/image/cusimage/homepage-share.jpg" />
    <meta property="og:description"   content="ร้านค้าและสินค้า ในตลาดนัดสวนจตุจักร รวบรวมร้านค้าที่คัดเลือดมาแล้วอย่างดี จากทั้งหมด 8,000 ร้านค้า" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="314" />
    <meta property="fb:app_id" content="935699479860195">
    <meta property="fb:admins" content="100002037238809">


    @include('layouts.inc-style')
    @yield('stylesheet')

</head>
<body class="bobo"style="">



    @include('layouts.inc-header')






@yield('content')










    @include('layouts.inc-footer')

    <!-- JavaScripts -->
    @include('layouts.inc-script')
    @yield('scripts')


        </body>
</html>
