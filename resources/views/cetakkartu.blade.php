
<style>
img {
    width: 100%;
    height: auto;
}
</style>

</head>

<body onload='window.print()' style="font-family: arial;font-size: 12px;">
    
            <div style="width: 850px;height: 260px;margin-bottom: -12px;padding:; background-image: url({{asset('assets\images\kartu\blangko.png')}});">
            <div style="width: 850px;height: 260px;margin-bottom: -12px;padding:; background-image: url('{{asset('assets/images/kartu/blangko.png')}}');">

            <img style="border-radius: 6px;border: 1px solid #222; position: absolute;margin-left: 30px;margin-top: 90px; width: 90px; height: 100px;overflow: hidden;" class="img-responsive img" src="{{asset('assets\images\logo-sm.png')}}">
            
            <img style="position: absolute;margin-left: 40px;margin-top: 15px; width: 50px;" src="{{asset('assets\images\logo-sm.png')}}">

            <p style="color: #fff;position: absolute;padding-left: 85px;padding-top: 3px; width:300px; height: 40px;text-transform: uppercase;text-align: center;letter-spacing: 2px;">Provinsi Jawa Timur<br>Kota Malang<br>Kecamatan Lowokwaru<br><b>Pondok Pesantren Bahrul Maghfiroh</b></p>

            <p style="letter-spacing: 2px;margin-left: 150px;padding-top: 90px;width: 240px; text-align: left; font-size: 15px"><b>KARTU SANTRI</b></p>

            <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 35px;margin-top: 80px;width: 83px;height:30px;text-align:center;position: center;float: center">
            <?php
                $tanggal = date ("j");
                $bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
                $bulan = $bulan[date("n")];
                $tahun = date("Y");
                $thn = $tahun+5;
            ?>Berlaku Hingga:<br><b><?php echo $tanggal ." ". $bulan ." ". $thn;?></b></p>
            <table cellspacing="0em" style="margin-top: -10px; padding-left: 150px; position: relative;font-family: arial;font-size: 10px;transition-property: 500px;width: 390px;height: 130px;"> 
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>
                </tr> 
                <tr>
                    <td>NIS/NISN</td>
                    <td>:</td>
                    <td>{{$santri->nis}}</td>
                </tr> 
                <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>JK</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Kelurahan/Desa</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td>{{$santri->nama_lengkap}}</td>composer require barryvdh/laravel-dompdf

                </tr>
            </table>
            {{-- <p style="margin-top: -220px;padding-left: 560px;padding-top: 10px;font-size: 11px;"> <b style="font-size: 12px;">PERATURAN PERPUSTAKAAN</b> --}}
            {{-- <ol style="padding-left: 480px;font-family: arial;font-size: 11px;text-align: justify;padding-right: 25px;margin-top: -8px;">
              <li>Kartu ini diterbitkan oleh Pondok Pesantren Bahrul Maghfiroh, segala penggunaan kartu ini diatur oleh perpustakaan sesuai ketentuan dan syarat yang berlaku</a></li>
                      <li>Setiap Siswa/i wajib membawa kartu ini jika ke perpustakaan</li>
                      <li>Kartu ini tidak boleh dialih pinjamkan</li>
                      <li>Bila menemukan kartu ini, mohon kembalikan ke perpustaakaan sekolah</li>
            </ol> --}}
            {{-- <p style="margin-left: 490px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 25px;width: 35%;text-align: right;">Kota Malang, <?php echo $tanggal ." ". $bulan ." ". $tahun;?></p>
            <p style="padding-left: 650px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 25px;width: 35%;margin-top: -6px;">Mengetahui,<br><b>Kepala Sekolah<br><br><br><br>Prof<br>NIP. 123</p>
            <img style="padding-left: 580px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 25px;width: 15%;margin-top: -65px;position: absolute;" src="{{asset('assets\images\kartu\blangko.png')}}">
            <img style="border-radius: 2px;border:4px solid #fff;margin-left: 500px;font-family: arial;font-size: 10px;text-align: justify;width: 70px;margin-top: -80px;position: absolute;" src="{{asset('assets\images\kartu\blangko.png')}}"> --}}
            </p>
        </div>

<div>