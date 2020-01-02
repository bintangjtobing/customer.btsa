<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang='en' class=''>

<head>
    <script
        src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'>
    </script>
    <script
        src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'>
    </script>
    <script
        src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'>
    </script>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon"
        href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link rel="mask-icon" type=""
        href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg"
        color="#111" />
    <link rel="canonical" href="https://codepen.io/frytyler/pen/EGdtg" />
    <title>Register new account! | Customer BTSA LOGISTICS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
        href="{!! url('https://res.cloudinary.com/btsa-co-id/image/upload/v1541503574/jscsstxtfiledll/icon/starlogo.ico')!!}">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js'></script>
    <link rel="stylesheet" type="text/css" href="{!!asset('css/customer.css')!!}">
    <style class="cp-pen-styles">
    </style>
</head>

<body>
    <div class="register">
        <h1>Customer Request</h1>
        @if (session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong>
            <p>{{session('sukses')}}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form method="post" action="/prosesdaftar">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <input type="text" placeholder="Nama Depan" name="nama_depan">
                </div>
                <div class="col">
                    <input type="text" placeholder="Nama Belakang" name="nama_belakang">
                </div>
                <small class="mb-2">*Nama diatas adalah nama penanggung jawab untuk Instansi/Perusahaan yang akan anda
                    pilih dibawah. Perlu diketahui bahwa kami akan melakukan verifikasi untuk kebenaran data
                    tersebut.</small>
            </div>
            <div class="form-row">
                <div class="col">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="col">
                    <input type="email" name="email" placeholder="Email" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                </div>
            </div>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="nohp" placeholder="Nomor telepon personal yang bisa dihubungi" required
                pattern=".{12,}">
            {{--
       <input type="text" name="CustomerID" placeholder="Nama PT / Instansi yang akan dihandle" data-toggle="tooltip" data-placement="top" title="*Isi kolom ini dengan nama PT yang terdaftar sebagai client BTSA Logistics dengan jelas. Karena kami akan melakukan verifikasi untuk kebenaran data tersebut." required> --}}
            <select name="CustomerID">
                <option>- Pilih PT / Instansi yang akan dihandle -</option>
                @foreach ($arcustomers as $item)
                <option value="{{$item->CustomerID}}">{{$item->CustomerName}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary btn-block btn-large">Request an account.</button>
            <p class="subtitle my-3">Registered? <a href="/">Login to your account!</a></p>
        </form>
    </div>
    <script
        src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
    <script>
        $('button[name="btn-regist"]').click(function () {
            if ($('input[name="password"]').val().length < 6) {
                alert('Minimum password length = 6');
            } else if {
                if ($('input[name="nohp"]').val().length < 12) {
                    alert('Nomor hp minimal mempunyai 12 angka.');
                } else {
                    $('form').submit();
                }

            }
        });

    </script>
</body>

</html>
