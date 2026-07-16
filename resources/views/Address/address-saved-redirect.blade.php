<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Saving address…</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: system-ui, -apple-system, Segoe UI, sans-serif;
            color: #2e317e;
            background: #f7f8fc;
        }
    </style>
</head>
<body>
    <p>Updating your delivery address…</p>
    <script>
    (function () {
        var address = @json($selectedAddress ?? null);
        var redirectUrl = @json($redirectUrl ?? url('/cart?tab=1'));
        if (address && typeof address === 'object') {
            try {
                localStorage.setItem('selectedAddress', JSON.stringify(address));
            } catch (e) {}
            try {
                sessionStorage.setItem('qk_preferred_cart_address', JSON.stringify(address));
            } catch (e) {}
            try {
                Object.keys(sessionStorage).forEach(function (k) {
                    if (k.indexOf('qk_delivery_eta_cache:') === 0) {
                        sessionStorage.removeItem(k);
                    }
                });
            } catch (e) {}
        }
        window.location.replace(redirectUrl);
    })();
    </script>
</body>
</html>
