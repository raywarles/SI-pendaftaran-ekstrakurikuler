<!DOCTYPE html>

<html>

<head>

    <title>Laporan Kegiatan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
            @page { size: A4;  margin: 30px;  }

            .line-title {
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
            }
    </style>
</head>

<body>
    <img src="{{asset('assetnya/images/23.png')}}" style="width: 60px;height: auto;position: absolute;">
        <table style="width: 100%;">
            <tr>
                <td align="center">
                    <span style="line-height: 1.6;font-weight: bold;">
                        SISTEM INFORMASI MANAJEMEN EKSTRAKURIKULER <br>SMA NEGERI 1 SOLOK
                    </span>
                </td>
            </tr>

            
        </table>
        <hr class="line-title">
        <h4 align="center">Laporan Data Kegiatan : {{$eks->nama_ekskul}}</h4>
            <p align="center">Periode : {{$sem->semester}} {{$sem->tahun}}</p>
        <div class="table-responsive">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>            
                        <th>Jam</th>
   
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0; $no2 = 0; ?>
                    @foreach($kegiatan as $ang)
                    <tr>
                        <td>{{$no+=1}}</td>
                        <td>{{$ang->nama_kegiatan}}</td>
                        <td>{{$ang->tanggal}}</td>
                        <td>{{$ang->jam}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>