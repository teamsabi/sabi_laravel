<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Akun Anda</title>
</head>
<body>
    <p>
        Halo <b>{{ $detail['name'] }}</b> !
    </p>
    <br>
    <p>
        Berikut adalah data anda :
    </p>

    <table>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ $detail['name'] }}</td>
        </tr>
        <tr>
            <td>Role</td>
            <td>:</td>
            <td>{{ $detail['role'] }}</td>
        </tr>
        <tr>
            <td>Website</td>
            <td>:</td>
            <td>{{ $detail['website'] }}</td>
        </tr>
        <tr>
            <td>Tanggal Registrasi</td>
            <td>:</td>
            <td>{{ $detail['datetime'] }}</td>
        </tr>
        <br><br><br>
        <center>
            <h3>Klick dibawah ini untuk verifikasi akun anda : </h3>
            <a href="{{ $detail['url'] }}" style="text-decoration:none; color:rgb(255, 255, 255); padding: 9px; background-color:blue; font:bold; border-radius: 20%;">Verifikasi</a>
            <br><br><br>
            <p>
                Copy Righ JTICare - Team OKEE
            </p>
        </center>
    </table>
    
</body>
</html>