<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .card{
        background-color: black;
        color: white;
        max-width: 500px;
        margin: 100px auto 0;
        text-align: center;
        border-radius: 0px;
    }
    .card h2{
        padding-top: 10px;
    }
    a{
        text-decoration: none;
    }
    button{
        background-color:#49B618;
        color: white;
        padding: 5px;
    }
    button:hover{
        background-color: white;
        border-color: #49B618;
        color: #49B618;
        
    }
    img{
        width: 200px;
        margin:0 auto;
    }
    body{
        background-image: url("{{asset('img/kota medan.jpeg')}}");
        background-size: 120%;
        background-position: center;
        background-repeat: no-repeat;
    }
    </style>
</head>
<body>
    <div class="card">
        @if(Session::has('berhasil'))
        <div class="alert alert-success" role="alert">
            {{Session::get('berhasil') }}
        </div>
        @elseif(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
        <h2>Verifikasi Email Untuk Melanjutkan</h2>
        <div>
            <img src="{{asset('img/email_confirm.png')}}" alt="Email Confirm">
        </div>
        <p>Periksa email Anda untuk melihat pesan Verifikasi Email</p>
        <button id="resend-email">Klik untuk mengirim ulang verifikasi email</button>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.getElementById('resend-email').addEventListener('click', function() {
        // Kirim permintaan Ajax ke rute dengan menggunakan metode POST
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/email/verification-notification');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Jika menggunakan Laravel's CSRF protection
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Tanggapan sukses, lakukan tindakan yang diperlukan
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Permintaan pengiriman ulang email telah berhasil dikirim',
                        })
                } else {
                    // Tanggapan gagal, tangani sesuai kebutuhan
                    Swal.fire({
                         icon: 'error',
                         title:'Gagal',
                         text: 'Permintaan pengiriman ulang email gagal dikirim',
                        })
                }
            }
        };
        
        xhr.send();
    });
</script>
</body>
</html>