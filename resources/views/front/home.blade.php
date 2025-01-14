<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="QjKqYhanGtcKrSkqC6zwqNTCPVs26Sns6axjFjaK">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#ff8d2f">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Tarahum.id">
    {{-- <meta name="msapplication-TileImage" content="http://be.tarahum.id/images/settings/icon/1707664549_icon.jpg"> --}}
    {{-- <meta name="msapplication-TileColor" content="#FFFFFF"> --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="theme-color" content="#ff9f29"> --}}

    {{-- <link rel="icon" type="image/x-sicon" href="http://be.tarahum.id/images/settings/icon/1707664549_icon.jpg"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://tarahum.id/member/assets/css/vendors/bootstrap.css"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"> --}}
    {{-- <link rel="apple-touch-icon" href="http://be.tarahum.id/images/settings/icon/1707664549_icon.jpg"> --}}

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    {{-- <link rel="stylesheet" type="text/css" href="https://tarahum.id/member/assets/css/remixicon.css"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://tarahum.id/member/assets/css/custom.css?version=1.1"> --}}
    <link rel="stylesheet" type="text/css" href="https://tarahum.id/member/assets/css/style.css">
    {{-- <link rel="stylesheet" href="https://tarahum.id/extensions/sweetalert2/sweetalert2.min.css"> --}}
    {{-- <link rel="manifest" href="https://tarahum.id/manifest.json?v=1.1"> --}}

    <title>temandhuafa.id</title>
</head>

<body class="inter-body learning-color">

    <main class="position-relative">

        @livewire('header')

        @livewire('nav-bar')

        @livewire('carousel')

        @livewire('campaign-list')

        @livewire('footer')

        @livewire('nav-side')

    </main>

    <script src="https://tarahum.id/member/assets/js/vendors/bootstrap/bootstrap.bundle.min.js"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK">
    </script>
    <script src="https://tarahum.id/member/assets/js/custom_swiper.js?version=1.1" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK">
    </script>
    <script src="https://tarahum.id/member/assets/js/script.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    <script src="https://tarahum.id/member/assets/js/hide-show.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    <script src="https://tarahum.id/member/assets/js/otp-5.js" nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    <script src="https://tarahum.id/sw.js"></script>
    <script src="https://tarahum.id/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"
        nonce="z6hvP1gSTt0jmJuS7AOsUzzmz5IUwMlK"></script>
    {{-- <script>
        var _0xc5e = ["", "split", "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/", "slice", "indexOf",
            "", "", ".", "pow", "reduce", "reverse", "0"
        ];

        function _0xe35c(d, e, f) {
            var g = _0xc5e[2][_0xc5e[1]](_0xc5e[0]);
            var h = g[_0xc5e[3]](0, e);
            var i = g[_0xc5e[3]](0, f);
            var j = d[_0xc5e[1]](_0xc5e[0])[_0xc5e[10]]()[_0xc5e[9]](function(a, b, c) {
                if (h[_0xc5e[4]](b) !== -1) return a += h[_0xc5e[4]](b) * (Math[_0xc5e[8]](e, c))
            }, 0);
            var k = _0xc5e[0];
            while (j > 0) {
                k = i[j % f] + k;
                j = (j - (j % f)) / f
            }
            return k || _0xc5e[11]
        }
        eval(function(h, u, n, t, e, r) {
            r = "";
            for (var i = 0, len = h.length; i < len; i++) {
                var s = "";
                while (h[i] !== n[e]) {
                    s += h[i];
                    i++
                }
                for (var j = 0; j < n.length; j++) s = s.replace(new RegExp(n[j], "g"), j);
                r += String.fromCharCode(_0xe35c(s, e, 10) - t)
            }
            return decodeURIComponent(escape(r))
        }("UPTUiUPPNiTPTTiNNNiUTPPiUPPUiUPNNiUTPNiUPTUiUPPPiUPPUiTNTPiUPNPiUPNNiUPUPiUPPUiUPNNiNNNiUPTUiUPUNiNNTiUPUNiTNNUiUTPNiUPTUiUPTPiTNNUiUTPTiUPNPiUPNNiTPTUiUTUPiUPUNiTNNUiUTPNiUPTUiUPTPiTNNUiUTPTiUPNPiUPNNiTPUNiUTPPiUPPUiUPNNiUTPNiUPTUiUPPPiUPPUiTNTPiUPNPiUPNNiUPUPiUPPUiUPNNiTPUNiUPNNiUPPUiUPTPiUPTUiUTPPiUTPTiUPPUiUPNNiTPTTiNNNiTPNPiUTPPiUTTPiTPUNiUPTNiUTPPiNNNiTPTUiTPUNiUTPTiUPTTiUPPUiUPUNiTPTTiTPTTiUPNNiUPPUiUPTPiUPTUiUTPPiUTPTiUPNNiTNNUiUTPTiUPTUiUPNPiUPUNiTPTUiTTUUiTTUNiUTUPiUPPPiUPNPiUPUNiUTPPiUPNPiUPUTiUPPUiTPUNiUPUTiUPNPiUPTPiTPTTiNNNiTNPPiUPPUiUPNNiUTPNiUPTUiUPPPiUPPUiNNTiUTTPiUPNPiUPNNiUPUPiUPPUiUPNNiNNTiUPNNiUPPUiUPTPiUPTUiUTPPiUTPTiUPNNiTNNUiUTPTiUPTUiUPNPiUPUNiNNTiUTPPiUTPUiUPPPiUPPPiUPPUiUPPUiUPPTiUPPUiUPPTiTTTNiNNNiTPUTiUPNNiUPPUiUPTPiUPTUiUTPPiUTPTiUPNNiTNNUiUTPTiUPTUiUPNPiUPUNiTPTUiUTUUiTPUTiTPTTiUPPUiUPNNiUPNNiUPNPiUPNNiTPTUiTTUUiTTUNiUTUPiUPPPiUPNPiUPUNiUTPPiUPNPiUPUTiUPPUiTPUNiUPPUiUPNNiUPNNiUPNPiUPNNiTPTTiTNNTiTNPPiUPPUiUPNNiUTPNiUPTUiUPPPiUPPUiNNTiUTTPiUPNPiUPNNiUPUPiUPPUiUPNNiNNTiUPNNiUPPUiUPTPiUPTUiUTPPiUTPTiUPNNiTNNUiUTPTiUPTUiUPNPiUPUNiNNTiUPPNiTNNUiUPTUiUPUTiUPPUiUPPTiTTTNiTPPTiUTUPiUPPUiUPNNiUPNNiUPNPiUPNNiUTUUiTNNTiTPTUiUTUUiTPUTiTPTUiUTUUiUPPUiUPUTiUTPPiUPPUiUTUPiUPPPiUPNPiUPUNiUTPPiUPNPiUPUTiUPPUiTPUNiUPPUiUPNNiUPNNiUPNPiUPNNiTPTTiNNNiTNPPiUPPUiUPNNiUTPNiUPTUiUPPPiUPPUiNNTiUTTPiUPNPiUPNNiUPUPiUPPUiUPNNiUTPPiNNTiTNNUiUPNNiUPPUiNNTiUPUNiUPNPiUTPTiNNTiUTPPiUTPUiUPNTiUPNTiUPNPiUPNNiUTPTiUPPUiUPPTiTPUNiNNNiTPTUiUTUUi",
            12, "PTUNipsvo", 29, 4, 6))
    </script>
    <script>
        var _0xc79e = ["", "split", "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/", "slice", "indexOf",
            "", "", ".", "pow", "reduce", "reverse", "0"
        ];

        function _0xe30c(d, e, f) {
            var g = _0xc79e[2][_0xc79e[1]](_0xc79e[0]);
            var h = g[_0xc79e[3]](0, e);
            var i = g[_0xc79e[3]](0, f);
            var j = d[_0xc79e[1]](_0xc79e[0])[_0xc79e[10]]()[_0xc79e[9]](function(a, b, c) {
                if (h[_0xc79e[4]](b) !== -1) return a += h[_0xc79e[4]](b) * (Math[_0xc79e[8]](e, c))
            }, 0);
            var k = _0xc79e[0];
            while (j > 0) {
                k = i[j % f] + k;
                j = (j - (j % f)) / f
            }
            return k || _0xc79e[11]
        }
        eval(function(h, u, n, t, e, r) {
            r = "";
            for (var i = 0, len = h.length; i < len; i++) {
                var s = "";
                while (h[i] !== n[e]) {
                    s += h[i];
                    i++
                }
                for (var j = 0; j < n.length; j++) s = s.replace(new RegExp(n[j], "g"), j);
                r += String.fromCharCode(_0xe30c(s, e, 10) - t)
            }
            return decodeURIComponent(escape(r))
        }("QSQCQSRCkSQCkQACkSSCkkkCkQkCkSkCkQTCkkQCQSDCQQTCkQUCkSkCQUDCkSQCkkDCQSRCkSTCkkkCkQTCkSSCkkQCkSDCkQACkQTCQSRCQSDCkTSCQSQCQSRCUUCQQTCkkSCkSkCkQTCkSQCQRUCkSkCQUDCkSSCkkQCkSDCkQACkQTCUUCQSDCQQTCkSSCkQQCkSDCkSSCkQSCQSRCkSTCkkkCkQTCkSSCkkQCkSDCkQACkQTCQSRCkSkCkkTCkSkCkQTCkkQCQSDCkTSCkSkCkkTCkSkCkQTCkkQCQQTCkQRCkQUCkSkCkkTCkSkCkQTCkkQCQAQCkSkCkSTCQUDCkkkCkQQCkkQCQSRCQSDCQTSCQSQCQQTCQRQCkQACQUDCkSQCkSDCkQTCkSACQRACkkTCkSkCkQUCkQQCQUDCkkDCQSRCUUCkkSCkSRCkQACkkACUUCQSDCQTSCkkTCQUDCkQUCURCkkQCkSkCkkSCkkQCkSDCkQkCkQACkQTCkSDCQUDCkQQCQADCkSQCQTkCQSQCQSRCkkQCkSRCkSDCkkSCQSDCQQTCkSQCQUDCkkQCQUDCQSRCUUCkSDCkSQCUUCQSDCQTSCkkTCQUDCkQUCURCkSSCkkSCkQUCkSTCQDQCkQACkQSCkSkCkQTCQTkCQSQCQSRCQSACkQkCkSkCkkQCQUDCQUSCkQTCQUDCkQkCkSkCQTkCUUCkSSCkkSCkQUCkSTCQQkCkkQCkQACkQSCkSkCkQTCUUCQUkCQSACQSDCQQTCQUDCkkQCkkQCkQUCQSRCQSACkSSCkQACkQTCkkQCkSkCkQTCkkQCQSACQSDCQTSCkkTCQUDCkQUCURCkQRCkQACkkSCkkQCQAQCQUDCkkQCQUDCQTkCkTSCkkQCkSkCkkSCkkQCkSDCkQkCkQACkQTCkSDCQUDCkQQCQUACkSDCkSQCQkUCkkQCkSkCkkSCkkQCkSDCkQkCkQACkQTCkSDCQUDCkQQCQADCkSQCQQQCkTkCQTSCQSQCQQTCQUDCkSUCQUDCkkRCQSRCkTSCkkQCkkDCkQRCkSkCQkUCQSACQRRCQRACQDSCQDQCQSACQQQCkkkCkQUCkQQCQkUCQURCkSRCkkQCkkQCkQRCkkSCQkUCQQACQQACkkQCQUDCkQUCQUDCkSRCkkkCkQkCQQTCkSDCkSQCQQACQUDCkQkCQUDCkQQCQQACkkQCkSkCkkSCkkQCkSDCkQkCkQACkQTCkSDCQUDCkQQCQQACkQUCkSkCQUDCkSSCkkQCkSDCkQACkQTCQURCQQQCkSSCkQACkQTCkkQCkSkCkQTCkkQCQDQCkkDCkQRCkSkCQkUCQSACQUDCkQRCkQRCkQQCkSDCkSSCQUDCkkQCkSDCkQACkQTCQQACkSUCkkSCkQACkQTCQSACQQQCkSQCQUDCkkQCQUDCQkUCQAUCQDSCQRACQRTCQQTCkkSCkkQCkQUCkSDCkQTCkSACkSDCkSTCkkDCQSRCkQRCkQACkkSCkkQCQAQCQUDCkkQCQUDCQSDCQQQCkSRCkSkCQUDCkSQCkSkCkQUCkkSCQkUCkTSCQSACQDRCQQkCQASCQDSCQRUCQATCQQkCQDQCQRACQRSCQAkCQRTCQSACQkUCkSSCkkSCkQUCkSTCQDQCkQACkQSCkSkCkQTCkTkCQQQCkQRCkQUCkQACkSSCkSkCkkSCkkSCQAQCQUDCkkQCQUDCQkUCkSTCQUDCkQQCkkSCkSkCQQQCkkSCkkkCkSSCkSSCkSkCkkSCkkSCQkUCkSTCkkkCkQTCkSSCkkQCkSDCkQACkQTCQSRCkQUCkSkCkkSCkQRCkQACkQTCkkSCkSkCQSDCkTSCQSQCQQTCQRQCkQACQUDCkSQCkSDCkQTCkSACQRACkkTCkSkCkQUCkQQCQUDCkkDCQSRCUUCkSRCkSDCkSQCkSkCUUCQSDCQTSCQDSCkkACQUDCkQQCQQTCkSTCkSDCkQUCkSkCQSRCkTSCkSDCkSSCkQACkQTCQkUCQSACkkSCkkkCkSSCkSSCkSkCkkSCkkSCQSACQQQCkkQCkSDCkkQCkQQCkSkCQkUCUUCQDSCkkkCkSSCkSSCkSkCkkSCkkSCUDCUUCQQQCkkQCkSkCkkRCkkQCQkUCkQUCkSkCkkSCkQRCkQACkQTCkkSCkSkCQQTCkQkCkSkCkkSCkkSCQUDCkSACkSkCQQQCkkQCkkDCkQRCkSkCQkUCUUCkkSCkkkCkSSCkSSCkSkCkkSCkkSCUUCQQQCQUDCkQQCkQQCkQACkkACQAkCkkSCkSSCQUDCkQRCkSkCQRSCkSkCkkDCQkUCkSTCQUDCkQQCkkSCkSkCQQQCQUDCkQQCkQQCkQACkkACQRACkkkCkkQCkkSCkSDCkSQCkSkCQASCkQQCkSDCkSSCkQSCQkUCkSTCQUDCkQQCkkSCkSkCQQQCkTkCQSDCkTkCQQQCkSkCkQUCkQUCkQACkQUCQkUCkSTCkkkCkQTCkSSCkkQCkSDCkQACkQTCQSRCkkRCkSRCkQUCQSDCkTSCkSSCkQACkQTCkkSCkQACkQQCkSkCQQTCkQQCkQACkSACQSRCkkRCkSRCkQUCQSDCQTSCkSDCkSTCQSRCkkRCkSRCkQUCQQTCkkSCkkQCQUDCkkQCkkkCkkSCQTkCQTkCQTkCQkQCQQUCQQUCQSDCkTSCQSQCQQTCQRQCkQACQUDCkSQCkSDCkQTCkSACQRACkkTCkSkCkQUCkQQCQUDCkkDCQSRCUUCkSRCkSDCkSQCkSkCUUCQSDCQTSCQDSCkkACQUDCkQQCQQTCkSTCkSDCkQUCkSkCQSRCkTSCkSDCkSSCkQACkQTCQkUCUUCkSkCkQUCkQUCkQACkQUCUUCQQQCkkQCkSDCkkQCkQQCkSkCQkUCUUCQRACkQACkQRCkkSCQQTCQQTCQQTCUUCQQQCkkQCkSkCkkRCkkQCQkUCUUCQADCkQTCkQRCkkkCkkQCURCkSQCkQACkQTCQUDCkkSCkSDCURCQUUCkSkCkQQCkkkCkQkCURCkkSCkSkCkkSCkkkCQUDCkSDCUDCUUCQQQCkTkCQSDCkTkCkSkCkQQCkkSCkSkCURCkSDCkSTCQSRCkkRCkSRCkQUCQQTCkkSCkkQCQUDCkkQCkkkCkkSCQTkCQTkCQTkCQkQCQQRCQQRCQSDCkTSCQSQCQQTCQRQCkQACQUDCkSQCkSDCkQTCkSACQRACkkTCkSkCkQUCkQQCQUDCkkDCQSRCUUCkSRCkSDCkSQCkSkCUUCQSDCQTSCQDSCkkACQUDCkQQCQQTCkSTCkSDCkQUCkSkCQSRCkTSCkSDCkSSCkQACkQTCQkUCUUCkSkCkQUCkQUCkQACkQUCUUCQQQCkkQCkSDCkkQCkQQCkSkCQkUCUUCQRACkQACkQRCkkSCQQTCQQTCQQTCUUCQQQCkkQCkSkCkkRCkkQCQkUCUUCQDSCkSDCkQQCQUDCkSRCkQSCQUDCkQTCURCkQQCkQACkSACkSDCkQTCQQTCUUCQQQCkTkCQSDCQQTCkkQCkSRCkSkCkQTCQSRCkSTCkkkCkQTCkSSCkkQCkSDCkQACkQTCQSRCkQUCkSkCkkSCkkkCkQQCkkQCQSDCkTSCkQQCkQACkSSCQUDCkkQCkSDCkQACkQTCQQTCkSRCkQUCkSkCkSTCQTkCQSACkSRCkkQCkkQCkQRCkkSCQkUCQQACQQACkkQCQUDCkQUCQUDCkSRCkkkCkQkCQQTCkSDCkSQCQQACkQQCkQACkSACkSDCkQTCQSACkTkCQSDCkTkCkSkCkQQCkkSCkSkCkTSCQSQCQQTCQRQCkQACQUDCkSQCkSDCkQTCkSACQRACkkTCkSkCkQUCkQQCQUDCkkDCQSRCUUCkSRCkSDCkSQCkSkCUUCQSDCQTSCQDSCkkACQUDCkQQCQQTCkSTCkSDCkQUCkSkCQSRCkTSCkSDCkSSCkQACkQTCQkUCUUCkSkCkQUCkQUCkQACkQUCUUCQQQCkkQCkSDCkkQCkQQCkSkCQkUCUUCQRACkQACkQRCkkSCQQTCQQTCQQTCUUCQQQCkkQCkSkCkkRCkkQCQkUCkkRCkSRCkQUCQQTCkQUCkSkCkkSCkQRCkQACkQTCkkSCkSkCQAUCQDSCQRACQRTCQQTCkQkCkSkCkkSCkkSCQUDCkSACkSkCQQQCkTkCQSDCkTkCkTkCkTkCQSDCkTkCQSDCkTkCQSDCQTSC",
            25, "SQkTARDUC", 29, 8, 16))
    </script> --}}

</body>

</html>
