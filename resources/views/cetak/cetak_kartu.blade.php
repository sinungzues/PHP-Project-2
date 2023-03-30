<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>

    <link rel='stylesheet' href='../../css/style.css'>
    <title>Cetak Id Card</title>
</head>

<body>

    <h4 class="text-center">Cetak ID Card Pegawai</h4>
    <div class='row'>
        @foreach ($join as $j)
            <div class='col'>
                <div class='col' style="margin-top: 150px; margin-bottom:160px;">
                    <div class='row m-1 mt-2'>
                        <div class='card' style='width: 260px; height: 350px'>
                            <div class='text-center mt-4'>
                                <img src='../../img/logo.png' alt='' height='70px' />
                                <h6 class='mt-3'>PEMERINTAH KABUPATEN KLATEN</h6>
                                <p class='bg-dark' style='color: white'>{{ $j->nama_kantor }}</p>
                                <img src='{{ asset('storage/' . $j->foto) }}' alt='{{ $j->nama_pegawai }}'
                                    height='120px' width='90px' class='mt-2' />
                            </div>
                        </div>
                    </div>
                    <div class='row m-1 mt-5'>
                        <div class='card' style='width: 260px; height: 350px'>
                            <div class='text-center'>
                                <p class='bg-dark mt-2' style='color: white'>
                                    KARTU TANDA PENGENAL
                                </p>
                                <p style='font-size: 9px; margin-top: -11px; font-weight: bold'>
                                    WAJIB DIKENAKAN UNTUK KEPENTINGAN DINAS
                                </p>
                                <table style='font-size: 14px; text-align: left; margin-top: -10px;' cellpadding='2px'>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $j->nama_pegawai }}</td>
                                    </tr>
                                    <tr>
                                        <td>NIP</td>
                                        <td>:</td>
                                        <td>{{ $j->nip_pegawai }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>{{ $j->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gol. Darah</td>
                                        <td>:</td>
                                        <td>{{ $j->golongan_darah }}</td>
                                    </tr>
                                    <tr>
                                        <td>Almt Kantor</td>
                                        <td>:</td>
                                        <td>{{ $j->alamat_kantor }}</td>
                                    </tr>
                                    <tr>
                                        <td>Dikeluarkan</td>
                                        <td>:</td>
                                        @foreach ($print as $p)
                                            <td>{{ $p->tgl_print }}</td>
                                        @endforeach
                                    </tr>
                                </table>
                                <p class='mt-1' style='font-size: 14px'>A.n. BUPATI KLATEN</p>
                                <p style='margin-top: -20px; font-size: 14px'>Sekretaris Daerah</p>
                                <img src='{{ asset('storage/' . $j->cap) }}' alt='Cap Dinas' class='boxdua' />
                                <img src='{{ asset('storage/' . $j->ttd) }}' alt='Tanda Tangan' class='boxsatu' />
                                <p style='margin-top: 28px; font-size: 14px'>
                                    {{ $j->nama_pejabat }}
                                </p>
                                <hr>
                                <p style='margin-top: -20px; font-size: 14px'>{{ $j->jabatan_pejabat }}</p>
                                <p style='font-size: 14px; margin-top: -20px'>
                                    NIP. {{ $j->nip_pejabat }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script text="script/javascript">
        window.print();
    </script>

</body>

</html>
