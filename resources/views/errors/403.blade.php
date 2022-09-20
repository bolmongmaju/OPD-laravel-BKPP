<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Halaman tidak ditemukan!</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable:no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"> 
    <link rel="shortcut icon" href="{{ asset('assets-front/images/favicon.png') }}">
    <!-- CSS -->
    <link href="{{ asset('404/css/mui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('404/css/normalize.min.css') }}" rel="stylesheet">
    <style>
        body, html {
            height: 100vh;
            width: 100vw;
            text-align: center
        }
        .content {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%)
        }
        .mui-btn + .mui-btn {
            margin-left: 0
        }
        .mui-btn {
            margin: 0
        }
    </style>
</head>
<body id="Background">

<div class="content">
    <div class="mui--text-dark-secondary mui--text-display4">404</div>
    <div id="ityped" class="mui--text-dark-secondary mui--text-headline"></div>
    <a href="{{ url('/') }}" class="mui-btn mui-btn--flat">Kembali</a>
</div>

<!-- JS -->
<script src="{{ asset('404/js/mui.min.js') }}"></script>
<script src="{{ asset('404/js/ityped.min.js') }}"></script>

<script>
ityped.init('#ityped', {
    strings:['OPSS HALAMAN TIDAK DITEMUKAN!', 'ANDA TERSASAR, SILAHKAN BUKA HALAMAN LAIN'],
    startDelay: 200,
    loop: true,
    showCursor: false,
    typeSpeed: 70,
    backSpeed: 20,
    backDelay:  1000,
});

var BackgroundArray =[
    "45deg, #ff9a9e, #fad0c4 99%, #fad0c4",
    "to top, #a18cd1, #fbc2eb",
    "to top, #fad0c4, #fad0c4 1%, #ffd1ff",
    "to right, #ffecd2, #fcb69f",
    "to right, #ff8177, #ff867a, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b",
    "to top, #ff9a9e, #fecfef 99%, #fecfef",
    "120deg, #f6d365, #fda085",
    "to top, #fbc2eb, #a6c1ee",
    "to top, #fdcbf1, #fdcbf1 1%, #e6dee9",
    "120deg, #a1c4fd, #c2e9fb",
    "120deg, #d4fc79, #96e6a1",
    "120deg, #84fab0, #8fd3f4",
    "to top, #cfd9df, #e2ebf0",
    "120deg, #a6c0fe, #f68084",
    "120deg, #fccb90, #d57eeb",
    "120deg, #e0c3fc, #8ec5fc",
    "120deg, #f093fb, #f5576c",
    "120deg, #fdfbfb, #ebedee",
    "to right, #4facfe, #00f2fe",
    "to right, #43e97b, #38f9d7",
    "to right, #fa709a, #fee140",
    "to top, #30cfd0, #330867",
    "to top, #a8edea, #fed6e3",
    "to top, #5ee7df, #b490ca",
    "to top, #d299c2, #fef9d7",
    "135deg, #f5f7fa, #c3cfe2",
    "135deg, #667eea, #764ba2",
    "135deg, #fdfcfb, #e2d1c3",
    "120deg, #89f7fe, #66a6ff",
    "to top, #fddb92, #d1fdff",
    "to top, #9890e3, #b1f4cf",
    "to top, #ebc0fd, #d9ded8",
    "to top, #96fbc4, #f9f586",
    "180deg, #2af598, #009efd",
    "to top, #cd9cf2, #f6f3ff",
    "to right, #e4afcb, #b8cbb8, #b8cbb8, #e2c58b 30%, #c2ce9c 64%, #7edbdc",
    "to right, #b8cbb8, #b8cbb8, #b465da, #cf6cc9 33%, #ee609c 66%, #ee609c",
    "to right, #6a11cb, #2575fc",
    "to top, #37ecba, #72afd3",
    "to top, #ebbba7, #cfc7f8",
    "to top, #fff1eb, #ace0f9",
    "to right, #eea2a2, #bbc1bf 19%, #57c6e1 42%, #b49fda 79%, #7ac5d8",
    "to top, #c471f5, #fa71cd",
    "to top, #48c6ef, #6f86d6",
    "to right, #f78ca0, #f9748f 19%, #fd868c 60%, #fe9a8b",
    "to top, #feada6, #f5efef",
    "to top, #e6e9f0, #eef1f5",
    "to top, #accbee, #e7f0fd",
    "-20deg, #e9defa, #fbfcdb",
    "to top, #c1dfc4, #deecdd",
    "to top, #0ba360, #3cba92",
    "to top, #00c6fb, #005bea",
    "to right, #74ebd5, #9face6",
    "to top, #6a85b6, #bac8e0",
    "to top, #a3bded, #6991c7",
    "to top, #9795f0, #fbc8d4",
    "to top, #a7a6cb, #8989ba 52%, #8989ba",
    "to top, #3f51b1, #5a55ae 13%, #7b5fac 25%, #8f6aae 38%, #a86aa4 50%, #cc6b8e 62%, #f18271 75%, #f3a469 87%, #f7c978",
    "to top, #fcc5e4, #fda34b 15%, #ff7882 35%, #c8699e 52%, #7046aa 71%, #0c1db8 87%, #020f75",
    "to top, #dbdcd7, #dddcd7 24%, #e2c9cc 30%, #e7627d 46%, #b8235a 59%, #801357 71%, #3d1635 84%, #1c1a27",
    "to top, #f43b47, #453a94",
    "to top, #4fb576, #44c489 30%, #28a9ae 46%, #28a2b7 59%, #4c7788 71%, #6c4f63 86%, #432c39",
    "to top, #0250c5, #d43f8d",
    "to top, #88d3ce, #6e45e2",
    "to top, #d9afd9, #97d9e1",
    "to top, #7028e4, #e5b2ca",
    "15deg, #13547a, #80d0c7",
    "to top, #505285, #585e92 12%, #65689f 25%, #7474b0 37%, #7e7ebb 50%, #8389c7 62%, #9795d4 75%, #a2a1dc 87%, #b5aee4",
    "to top, #ff0844, #ffb199",
    "45deg, #93a5cf, #e4efe9",
    "to right, #434343, black",
    "to top, #0c3483, #a2b6df, #6b8cce, #a2b6df",
    "45deg, #93a5cf, #e4efe9",
    "to right, #92fe9d, #00c9ff",
    "to right, #ff758c, #ff7eb3",
    "to right, #868f96, #596164",
    "to top, #c79081, #dfa579",
    "45deg, #8baaaa, #ae8b9c",
    "to right, #f83600, #f9d423",
    "-20deg, #b721ff, #21d4fd",
    "-20deg, #6e45e2, #88d3ce",
    "-20deg, #d558c8, #24d292",
    "60deg, #abecd6, #fbed96",
    "to top, #d5d4d0, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7",
    "to top, #5f72bd, #9b23ea",
    "to top, #09203f, #537895",
    "-20deg, #ddd6f3, #faaca8, #faaca8",
    "-20deg, #dcb0ed, #99c99c",
    "to top, #f3e7e9, #e3eeff 99%, #e3eeff",
    "to top, #c71d6f, #d09693",
    "60deg, #96deda, #50c9c3",
    "to top, #f77062, #fe5196",
    "to top, #c4c5c7, #dcdddf 52%, #ebebeb",
    "to right, #a8caba, #5d4157",
    "60deg, #29323c, #485563",
    "-60deg, #16a085, #f4d03f",
    "-60deg, #ff5858, #f09819",
    "-20deg, #2b5876, #4e4376",
    "-20deg, #00cdac, #8ddad5",
    "to top, #4481eb, #04befe",
    "to top, #dad4ec, #dad4ec 1%, #f3e7e9",
    "45deg, #874da2, #c43a30",
    "to top, #4481eb, #04befe",
    "to top, #e8198b, #c7eafd",
    "to top, #209cff, #68e0cf",
    "to top, #bdc2e8, #bdc2e8 1%, #e6dee9",
    "to top, #e6b980, #eacda3",
    "to top, #1e3c72, #1e3c72 1%, #2a5298",
    "to top, #d5dee7, #ffafbd, #c9ffbf",
    "to top, #9be15d, #00e3ae",
    "to right, #ed6ea0, #ec8c69",
    "to right, #ffc3a0, #ffafbd",
    "to top, #cc208e, #6713d2",
    "to top, #b3ffab, #12fff7",
    "to top, #65bd60, #5ac1a8 25%, #3ec6ed 50%, #b7ddb7 75%, #fef381",
    "to right, #243949, #517fa4",
    "-20deg, #fc6076, #ff9a44",
    "to top, #dfe9f3, white",
    "to right, #00dbde, #fc00ff",
    "to right, #f9d423, #ff4e50",
    "to top, #50cc7f, #f5d100",
    "to right, #0acffe, #495aff",
    "-20deg, #616161, #9bc5c3",
    "60deg, #3d3393, #2b76b9 37%, #2cacd1 65%, #35eb93",
    "to top, #df89b5, #bfd9fe",
    "to right, #ed6ea0, #ec8c69",
    "to right, #d7d2cc, #304352",
    "to top, #e14fad, #f9d423",
    "to top, #b224ef, #7579ff",
    "to right, #c1c161, #c1c161, #d4d4b1",
    "to right, #ec77ab, #7873f5",
    "to top, #007adf, #00ecbc",
    "-225deg, #20E2D7, #F9FEA5",
    "-225deg, #2CD8D5, #C5C1FF 56%, #FFBAC3",
    "-225deg, #2CD8D5, #6B8DD6 48%, #8E37D7",
    "-225deg, #DFFFCD, #90F9C4 48%, #39F3BB",
    "-225deg, #5D9FFF, #B8DCFF 48%, #6BBBFF",
    "-225deg, #A8BFFF, #884D80",
    "-225deg, #5271C4, #B19FFF 48%, #ECA1FE",
    "-225deg, #FFE29F, #FFA99F 48%, #FF719A",
    "-225deg, #22E1FF, #1D8FE1 48%, #625EB1",
    "-225deg, #B6CEE8, #F578DC",
    "-225deg, #FFFEFF, #D7FFFE",
    "-225deg, #E3FDF5, #FFE6FA",
    "-225deg, #7DE2FC, #B9B6E5",
    "-225deg, #CBBACC, #2580B3",
    "-225deg, #B7F8DB, #50A7C2",
    "-225deg, #7085B6, #87A7D9 50%, #DEF3F8",
    "-225deg, #77FFD2, #6297DB 48%, #1EECFF",
    "-225deg, #AC32E4, #7918F2 48%, #4801FF",
    "-225deg, #D4FFEC, #57F2CC 48%, #4596FB",
    "-225deg, #9EFBD3, #57E9F2 48%, #45D4FB",
    "-225deg, #473B7B, #3584A7 51%, #30D2BE",
    "-225deg, #65379B, #886AEA 53%, #6457C6",
    "-225deg, #A445B2, #D41872 52%, #FF0066",
    "-225deg, #7742B2, #F180FF 52%, #FD8BD9",
    "-225deg, #FF3CAC, #562B7C 52%, #2B86C5",
    "-225deg, #FF057C, #8D0B93 50%, #321575",
    "-225deg, #FF057C, #7C64D5 48%, #4CC3FF",
    "-225deg, #69EACB, #EACCF8 48%, #6654F1",
    "-225deg, #231557, #44107A 29%, #FF1361 67%, #FFF800",
    "-225deg, #3D4E81, #5753C9 48%, #6E7FF3"
];

RandomBackground()
// setInterval('RandomBackground();', 1000);
function RandomBackground() {
    var random = parseInt(Math.random()*(BackgroundArray.length-1));
    var BackgroundResult = BackgroundArray[random];
    document.getElementById("Background").style.backgroundImage="linear-gradient("+BackgroundResult+")";
}
</script>

</body>
</html>
