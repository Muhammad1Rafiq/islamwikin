<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="\css\style.css">
    <link rel="stylesheet" href="\css\bootstrap.rtl.min.css">
    <script src="\js\bootstrap.bundle.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="\js\jquery-3.6.0.js"></script>
    <script language="JavaScript" type="text/javascript" src="\js\app.js"></script>
    <script src="\js\jQuery.resizableColumns.js"></script

</head>

<body>



    <div class="container-fluid">
        <div class="row g-0">

            <div class=" vstack col-md-2 col-lg-2 col-sm-3  sidebar">
                <div class="" style="padding-bottom: 8%">
                    <img src="\img\logo.png" height="40px" alt="">
                    <span style="font-size: 26px; padding-right: 3%">کۆنکرێتی یاران</span>
                </div>
                <p>داواکارییەکان</p>
                <a name="" id="" href="/" role="button" class="rounded-0 btn">بینین</a>
                <a name="" id="" href="/neworder" role="button" class="rounded-0 btn ">داواکاری نوێ</a>
                <a name="" id="" href="/search" role="button" class="rounded-0 btn">گەڕان</a>

                <p>پەیوەندی دار</p>
                <a name="" id="" href="/customers" role="button" class="rounded-0 btn">کریاڕەکان</a>
                <a name="" id="" href="/types" role="button" class="rounded-0 btn">جۆری کەرەستەکان</a>
                <a name="" id="" href="/drivers" role="button" class="rounded-0 btn ">شۆفێرەکان</a>

                <p>دارایی</p>
                <a name="" id="" href="/" role="button" class="rounded-0 btn">داهاتەکان</a>
                <a name="" id="" href="/setorders" role="button" class="rounded-0 btn ">خەرجییەکان</a>
                <a name="" id="" href="/" role="button" class="rounded-0 btn">شیکاریی</a>

                <p>ڕاپۆرت</p>
                <a name="" id="" href="/" role="button" class="rounded-0 btn">ڕاپۆرتی نوێ</a>
                <a name="" id="" href="/setorders" role="button" class="rounded-0 btn ">ڕاپۆرتەکانی پێشوو</a>
                <a name="" id="" href="/" role="button" class="rounded-0 btn">شیکاریی</a>

                <p>بەشەکانی تر</p>
                <a name="" id="" href="/setorders" role="button" class="rounded-0 btn">دۆخ</a>
                <a name="" id="" href="/query" role="button" class="rounded-0 btn">بەکارهێنەرەکان</a>
                <a name="" id="" href="/analysis" role="button" class="rounded-0 btn">ڕێکخستنەکان</a>
            </div>


            <div class="col-10 col-lg-10 col-sm-9 maincontent p-1 position-absolute top-0 end-0">
                @yield('content')
            </div>

        </div>
    </div>

</body>

</html>
