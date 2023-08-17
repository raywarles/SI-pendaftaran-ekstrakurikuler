<!DOCTYPE html>
    <html>
    <head>
        <title>Laporan Jumlah Anggota</title>
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

<body style="padding: 50px;">
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
        <h4 align="center">Laporan Jumlah Anggota </h4>
        <p align="center">
            @if(isset($sem))
            Periode : {{$sem->semester}} {{$sem->tahun}}
            @else
            Periode : Semua Semester;
            @endif

        </p>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Ekstrakurikuler</th>
                            <th>Jumlah</th>            


                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; $no2 = 0; ?>
                        @foreach($eks as $ek)
                        <?php 
                        if(isset($sem)){
                            $cek2 = App\Models\Riwayat::where('ekstrakurikuler_id',$ek->id)->where('semester_id',$sem->id)->get();
                        }
                        else{
                            $cek2 = App\Models\Riwayat::where('ekstrakurikuler_id',$ek->id)->get();
                        }
                        ?>
                        <tr>
                            <td>{{$no+=1}}</td>
                                <td>{{$ek->nama_ekskul}}</td>
                                    <td>{{count($cek2)}} Siswa</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xl-2">
                            </div>
                            <div class="col-lg-12 col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title" align="center">Jumlah Anggota</h4>
                                        <canvas id="mataChart" class="chartjs" width="undefined" height="undefined"></canvas>
                                    </div>
                                </div>
                            </div>                

                            <div class="col-lg-12 col-xl-2">
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                        <script src="{{asset('assetnya/js/charts2/Chart.js')}}"></script>
                            <script src='https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js
                            '></script>
                            <script type="text/javascript">
                                var ctx = document.getElementById("mataChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'pie',
                                    data: {
                                        labels: <?php echo json_encode($label); ?>,
                                        datasets: [{
                                            label: 'Jumlah Anggota',
                                            backgroundColor: ["#4B77A9", "#B27200", "#D21243", "#5F255F", "cyan", "black"],

                                            data: <?php echo json_encode($cek); ?>
                                        }],
                                        options: {
                                            animation: {
                                                onProgress: function(animation) {
                                                    progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;
                                                }
                                            }
                                        }
                                    },

                                });

                                new Chart(ctx, {
                                    type: 'pie',
                                    data,
                                    options: {
                                        plugins: {
                                            labels: {
                                                render: 'value',
                                                precision: 0,
                                                showZero: true,
                                                fontSize: 30,
                                                fontColor: '#fff',
                                                fontStyle: 'normal',
                                                fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                                                textShadow: true,
                                                shadowOffsetX: -5,
                                                shadowOffsetY: 5,
                                                shadowColor: 'rgba(255,0,0,0.75)',
                                                arc: true,
                                                position: 'default',
                                                overlap: true,
                                                showActualPercentages: true,

                                                outsidePadding: 4,
                                                textMargin: 4
                                            }
                                        }
                                    }
                                });
                            </script>
                        </body>

                        </html>