<style>
  .legend {
    text-align: left;
    line-height: 18px;
    color: black;
    background-color: white;
  }

  .legend i {
    width: 50px;
    height: 18px;
    float: left;
    margin-right: 18px;
    opacity: 1;
  }
</style>
<div class="bg-float">
  <img src="<?= base_url('assets/img/blur-ykw.svg') ?>" alt="hmmmmmm">
</div>
<div class="bg-float">
  <img src="<?= base_url('assets/img/blur-ykw.svg') ?>" alt="hmmmmmm">
</div>
<div class="container-fluid text-center" style="padding-top:80px;">
  <div class="peta-utama data-isi">
    <h4 class="card-label stiky">Nama Ruas : <?= $jalan[0]->Kode ?> <?= $jalan[0]->Uraian ?> </h4>
  </div>
</div>
<div class="container-fluid text-center">
  <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <input type='hidden' id="kd_ruas" value="<?= $temp_data[1] ?>"><input type='hidden' id="hari" value="<?= $temp_data[0] ?>">
  <div class="row">
    <div class="col grafik-chart d-flex flex-column pb-2">
      <div class="grafik-box statistika">
        <div id="chartContainer" width="100%" height="400" style="display: block; box-sizing: border-box; height: 200px; width:100%;"></div>
      </div>
      <div class="col d-flex justify-content-around">
        <a href="#" onclick="sebelum()" type="button" class="btn btn-warning m-2">
          << Hari Sebelumnya</a>
            <a href="#" onclick="sesudah()" type="button" class="btn btn-success m-2">Hari Berikutnya >></a>

      </div>

    </div>

  </div>
  <div class="row pt-3">
    <div class="col-md-3">
      <div class="card tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><?= $hari['hari1'] ?>, <?= date('d-m-Y', strtotime($hari['tgl1'])) ?></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#Jam</th>
                <th>Volume (smp/jam)</th>
                <th>VC Ratio</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($arus1 != null) {
                foreach ($arus1 as $a) { ?>
                  <tr>
                    <td><?= $a->jam ?></td>
                    <td><?= $a->arus ?></td>
                    <td><?= number_format($a->vc, 2) ?></td>

                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
          <b> Jam puncak : <?= $hari['jam1']; ?>.00 WIB ; Volume Kend : <?= $hari['arus_e1'] ?> ;</br> VC Ratio : <?= number_format($hari['vc_e1'], 2) ?></b>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><?= $hari['hari2'] ?>, <?= date('d-m-Y', strtotime($hari['tgl2'])) ?></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#Jam</th>
                <th>Volume (smp/jam)</th>
                <th>VC Ratio</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($arus2 != null) {
                foreach ($arus2 as $a) { ?>
                  <tr>
                    <td><?= $a->jam ?></td>
                    <td><?= $a->arus ?></td>
                    <td><?= number_format($a->vc, 2) ?></td>

                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
          <b> Jam puncak : <?= $hari['jam2']; ?>.00 WIB ; Volume Kend : <?= $hari['arus_e2'] ?> ;</br> VC Ratio : <?= number_format($hari['vc_e2'], 2) ?></b>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><?= $hari['hari3'] ?>, <?= date('d-m-Y', strtotime($hari['tgl3'])) ?></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#Jam</th>
                <th>Volume (smp/jam)</th>
                <th>VC Ratio</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($arus3 != null) {
                foreach ($arus3 as $a) { ?>
                  <tr>
                    <td><?= $a->jam ?></td>
                    <td><?= $a->arus ?></td>
                    <td><?= number_format($a->vc, 2) ?></td>

                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
          <b> Jam puncak : <?= $hari['jam3']; ?>.00 WIB ; Volume Kend : <?= $hari['arus_e3'] ?> ;</br> VC Ratio : <?= number_format($hari['vc_e3'], 2) ?></b>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><?= $hari['hari4'] ?>, <?= date('d-m-Y', strtotime($hari['tgl4'])) ?></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#Jam</th>
                <th>Volume (smp/jam)</th>
                <th>VC Ratio</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($arus4 != null) {
                foreach ($arus4 as $a) { ?>
                  <tr>
                    <td><?= $a->jam ?></td>
                    <td><?= $a->arus ?></td>
                    <td><?= number_format($a->vc, 2) ?></td>

                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
          <b> Jam puncak : <?= $hari['jam4']; ?>.00 WIB ; Volume Kend : <?= $hari['arus_e4'] ?> ;</br> VC Ratio : <?= number_format($hari['vc_e4'], 2) ?></b>
        </div>
      </div>
    </div>
  </div>
  <div class="row pt-2">
    <div class="col-md-3">
      <div class="card tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><?= $hari['hari5'] ?>, <?= date('d-m-Y', strtotime($hari['tgl5'])) ?></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#Jam</th>
                <th>Volume (smp/jam)</th>
                <th>VC Ratio</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($arus5 != null) {
                foreach ($arus5 as $a) { ?>
                  <tr>
                    <td><?= $a->jam ?></td>
                    <td><?= $a->arus ?></td>
                    <td><?= number_format($a->vc, 2) ?></td>

                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
          <b> Jam puncak : <?= $hari['jam5']; ?>.00 WIB ; Volume Kend : <?= $hari['arus_e5'] ?> ;</br> VC Ratio : <?= number_format($hari['vc_e5'], 2) ?></b>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><?= $hari['hari6'] ?>, <?= date('d-m-Y', strtotime($hari['tgl6'])) ?></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#Jam</th>
                <th>Volume (smp/jam)</th>
                <th>VC Ratio</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($arus6 != null) {
                foreach ($arus6 as $a) { ?>
                  <tr>
                    <td><?= $a->jam ?></td>
                    <td><?= $a->arus ?></td>
                    <td><?= number_format($a->vc, 2) ?></td>

                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
          <b> Jam puncak : <?= $hari['jam6']; ?>.00 WIB ; Volume Kend : <?= $hari['arus_e6'] ?> ;</br> VC Ratio : <?= number_format($hari['vc_e6'], 2) ?></b>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card  tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><?= $hari['hari7'] ?>, <?= date('d-m-Y', strtotime($hari['tgl7'])) ?></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">#Jam</th>
                <th>Volume (smp/jam)</th>
                <th>VC Ratio</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($arus7 != null) {
                foreach ($arus7 as $a) { ?>
                  <tr>
                    <td><?= $a->jam ?></td>
                    <td><?= $a->arus ?></td>
                    <td><?= number_format($a->vc, 2) ?></td>

                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
          <b> Jam puncak : <?= $hari['jam7']; ?>.00 WIB ; Volume Kend : <?= $hari['arus_e7'] ?> ;</br> VC Ratio : <?= number_format($hari['vc_e7'], 2) ?></b>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card tabel-berborder">

        <div class="card-header">
          <h3 class="card-title"><b>Hari Puncak<b></h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">Hari</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Arus</th>
                <th>VC Ratio</th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <th><?= $hari['hari_tot'] ?></th>
                <th><?= date('d-m-Y', strtotime($hari['tgl_tot'])) ?></th>
                <th><?= $hari['jam_tot'] ?>.00 WIB</th>
                <th><?= $hari['arus_tot'] ?></th>
                <th><?= number_format($hari['vc_tot'], 2) ?></th>
              </tr>

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col grafik-chart">
      <div class="grafik-box statistika">
        <canvas id="myChart" width="100%" height="15"></canvas>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col grafik-chart">
      <div class="grafik-box">
        <div id="donutData" width="100%" height="400" style="display: block; box-sizing: border-box; height: 200px; width:100%;"></div>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col grafik-chart">
      <div class="grafik-box">
        <div id="chartContainer2" width="100%" height="400" style="display: block; box-sizing: border-box; height: 200px; width:100%;"></div>
      </div>
    </div>

    <div class="col grafik-chart">
      <div class="grafik-box">
        <div id="chartContainer3" width="100%" height="400" style="display: block; box-sizing: border-box; height: 200px; width:100%;"></div>
      </div>
    </div>

  </div>
</div>


<?php $koneksi = mysqli_connect('localhost', 'root', '', 'lhr2025');
$kd_ruas = $temp_data[1];
$hari = $temp_data[0]; ?>


<?php $this->load->view('modal.php'); ?>


</section>
<script type="text/javascript">
  window.onload = function() {


    var chart = new CanvasJS.Chart("chartContainer2", {
      animationEnabled: true,
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      title: {
        text: "LHR 2020 - 2025"
      },
      axisY: {
        title: "LHR"
      },
      data: [{
        type: "line",
        showInLegend: true,
        legendMarkerColor: "grey",
        legendText: "TAHUN",
        dataPoints: [{
            y: <?= $vc[0]->lhr20 ?>,
            label: "2020"
          },
          {
            y: <?= $vc[0]->lhr21 ?>,
            label: "2021"
          },
          {
            y: <?= $vc[0]->lhr22 ?>,
            label: "2022"
          },
          {
            y: parseInt(<?= $vc[0]->lhr23 ?>),
            label: "2023"
          },
          {
            y: parseInt(<?= $vc[0]->jml3 ?>),
            label: "2025"
          },

        ]
      }]
    });
    chart.render();

    var chart = new CanvasJS.Chart("chartContainer3", {
      animationEnabled: true,
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      title: {
        text: "VC RATIO 2020 - 2025"
      },
      axisY: {
        title: "VC RATIO"
      },
      data: [{
        type: "line",
        showInLegend: true,
        legendMarkerColor: "grey",
        legendText: "TAHUN",
        dataPoints: [{
            y: <?= $vc[0]->vc20 ?>,
            label: "2020"
          },
          {
            y: <?= $vc[0]->vc21 ?>,
            label: "2021"
          },
          {
            y: <?= $vc[0]->vc22 ?>,
            label: "2022"
          },
          {
            y: <?= $vc[0]->vc23 ?>,
            label: "2023"
          },
          {
            y: <?= $vc[0]->vc3 ?>,
            label: "2025"
          },

        ]
      }]
    });
    chart.render();


    var chart = new CanvasJS.Chart("donutData", {
      animationEnabled: true,
      title: {
        text: "Annual Average Daily Traffic",
        horizontalAlign: "left"
      },
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?= $jml[1] + $jml[2] + $jml[3] ?>,
            label: "Kendaraan Ringan"
          },
          {
            y: <?= $jml[4] + $jml[5] ?>,
            label: "Bus"
          },
          {
            y: <?= $jml[6] + $jml[7] ?>,
            label: "Truk Ringan"
          },
          {
            y: <?= $jml[8] + $jml[9] + $jml[10] ?>,
            label: "Truk Berat"
          },

        ]
      }]
    });
    chart.render();


    var chart = new CanvasJS.Chart("chartContainer", {
      exportEnabled: true,
      animationEnabled: true,
      title: {
        text: "Grafik Total Kendaraan Hari ke : <?= $hari ?>"
      },
      axisX: {
        title: "Jam Ke :"
      },
      axisY: {
        title: "Grafik Per Golongan",
        titleFontColor: "#4F81BC",
        lineColor: "#4F81BC",
        labelFontColor: "#4F81BC",
        tickColor: "#4F81BC",
        includeZero: true
      },
      axisY2: {
        title: "Clutch - Units",
        titleFontColor: "#C0504E",
        lineColor: "#C0504E",
        labelFontColor: "#C0504E",
        tickColor: "#C0504E",
        includeZero: true
      },
      toolTip: {
        shared: true
      },
      legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
      },
      data: [<?php


              for ($i = 1; $i <= 12; $i++) {
                if ($i == 1) {
                  $moda = "motor";
                  $kode = "5";
                } elseif ($i == 2) {
                  $moda = "mobil";
                  $kode = "6";
                } elseif ($i == 3) {
                  $moda = "mobil_besar";
                  $kode = "6";
                } elseif ($i == 4) {
                  $moda = "pickup";
                  $kode = "7";
                } elseif ($i == 5) {
                  $moda = "bus_kecil";
                  $kode = "2";
                } elseif ($i == 6) {
                  $moda = "bus_besar";
                  $kode = "3";
                } elseif ($i == 7) {
                  $moda = "truk_ringan";
                  $kode = "8";
                } elseif ($i == 8) {
                  $moda = "truk_sedang";
                  $kode = "9";
                } elseif ($i == 9) {
                  $moda = "truk_3";
                  $kode = "0";
                } elseif ($i == 10) {
                  $moda = "truk_gandeng";
                  $kode = "w";
                } elseif ($i == 11) {
                  $moda = "trailer";
                  $kode = "q";
                } elseif ($i == 12) {
                  $moda = "tak_bermotor";
                  $kode = "1";
                }
              ?>

          {

            type: "column",
            name: "<?= $moda ?>",
            showInLegend: true,
            dataPoints: [
              <?php
                for ($j = 0; $j <= 23; $j++) {
                  $sqlSelect = "SELECT " . $moda . " FROM `tb_grafik` where kd_ruas='$kd_ruas' and jam='$j' and hari='$hari'";
                  $result = mysqli_query($koneksi, $sqlSelect);
                  $d = mysqli_fetch_array($result);

              ?> {
                  label: "Jam : <?= $j ?>",
                  y: <?= $d[0] ?>
                },
              <?php } ?>
            ]
          },
        <?php } ?>
      ],
      /** Set axisY properties here*/
      axisY: {
        prefix: "",
        suffix: ""
      }
    });

    chart.render();

    function toggleDataSeries(e) {
      if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }
  }


  function sesudah() {
    var kd_ruas = document.getElementById('kd_ruas').value;
    var hari = document.getElementById('hari').value;
    var hari_nya = parseInt(hari) + 1;
    var h = parseInt(hari) + 1;
    if (parseInt(hari_nya) == 8) {
      var hari_nya = '7'
    }

    document.getElementById('hari').value = hari_nya;

    if (parseInt(h) < 8) {

      $.ajax({
        url: '<?= base_url('Awal/sesudah/') ?>' + kd_ruas + '?hari=' + hari_nya,

        success: function(msg) {
          var hasile = msg;

          proses(hasile, hari_nya)

        }
      });
    }

  }

  function sebelum() {
    var kd_ruas = document.getElementById('kd_ruas').value;
    var hari = document.getElementById('hari').value;
    var hari_nya = parseInt(hari) - 1;
    var h = parseInt(hari) - 1;
    if (parseInt(hari_nya) == 0) {
      var hari_nya = '1'
    }

    document.getElementById('hari').value = hari_nya;

    if (parseInt(h) > 0) {
      $.ajax({
        url: '<?= base_url('Awal/sesudah/') ?>' + kd_ruas + '?hari=' + hari_nya,

        success: function(msg) {
          var hasile = msg;

          proses(hasile, hari_nya)

        }
      });
    }

  }

  function proses(hasile, hari) {

    var chart = new CanvasJS.Chart("chartContainer", {
      exportEnabled: true,
      animationEnabled: true,
      title: {
        text: "Grafik Total Kendaraan Hari ke  :" + hari
      },
      axisX: {
        title: "Jam :"
      },
      axisY: {
        title: "Grafik Per Golongan",
        titleFontColor: "#4F81BC",
        lineColor: "#4F81BC",
        labelFontColor: "#4F81BC",
        tickColor: "#4F81BC",
        includeZero: true
      },
      axisY2: {
        title: "Clutch - Units",
        titleFontColor: "#C0504E",
        lineColor: "#C0504E",
        labelFontColor: "#C0504E",
        tickColor: "#C0504E",
        includeZero: true
      },
      toolTip: {
        shared: true
      },
      legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
      },
      data: [

        <?php


        for ($i = 1; $i <= 12; $i++) {
          if ($i == 1) {
            $moda = "motor";
            $kode = "5";
          } elseif ($i == 2) {
            $moda = "mobil";
            $kode = "6";
          } elseif ($i == 3) {
            $moda = "mobil_besar";
            $kode = "6";
          } elseif ($i == 4) {
            $moda = "pickup";
            $kode = "7";
          } elseif ($i == 5) {
            $moda = "bus_kecil";
            $kode = "2";
          } elseif ($i == 6) {
            $moda = "bus_besar";
            $kode = "3";
          } elseif ($i == 7) {
            $moda = "truk_ringan";
            $kode = "8";
          } elseif ($i == 8) {
            $moda = "truk_sedang";
            $kode = "9";
          } elseif ($i == 9) {
            $moda = "truk_3";
            $kode = "0";
          } elseif ($i == 10) {
            $moda = "truk_gandeng";
            $kode = "w";
          } elseif ($i == 11) {
            $moda = "trailer";
            $kode = "q";
          } elseif ($i == 12) {
            $moda = "tak_bermotor";
            $kode = "1";
          }
        ?>


          {

            type: "column",
            name: "<?= $moda ?>",
            showInLegend: true,
            dataPoints: [
              <?php for ($j = 0; $j <= 23; $j++) { ?> {
                  label: "Jam : <?= $j ?>",
                  y: hitung(hasile, <?= $j ?>, '<?= $moda ?>')
                },
              <?php } ?>
            ]
          },

        <?php } ?>

      ],
      /** Set axisY properties here*/
      axisY: {
        prefix: "",
        suffix: ""
      }
    });

    chart.render();

    function toggleDataSeries(e) {
      if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      e.chart.render();
    }


  }

  function hitung(hasile, jam, moda) {
    hasil = JSON.parse(hasile);
    if (moda == "motor") {
      for (m = 0; m <= 23; m++) {
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[m]);
          break;
        }
      }
    } else if (moda == "mobil") {
      mulai = 24;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "mobil_besar") {
      mulai = 48;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "pickup") {
      mulai = 72;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "bus_kecil") {
      mulai = 96;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "bus_besar") {
      mulai = 120;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "truk_ringan") {
      mulai = 144;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "truk_sedang") {
      mulai = 166;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "truk_3") {
      mulai = 190;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "truk_gandeng") {
      mulai = 214;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "trailer") {
      mulai = 238;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else if (moda == "tak_bermotor") {
      mulai = 262;
      for (m = 0; m <= 23; m++) {
        kend_nya = m + mulai;
        if (parseInt(jam) == parseInt(m)) {
          hasile = parseInt(hasil[kend_nya]);
          break;
        }
      }
    } else {
      hasile = 22;
    }
    return hasile;
  }
</script>
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var ctx2 = document.getElementById("myChart2").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    title: 'dadadaa',
    data: {
      labels: ["1", "2", "3", "4", "5", "6", "7"],
      datasets: [{
        label: '# of Votes',
        data: [<?= $vc[0]->vc_h1 ?>, <?= $vc[0]->vc_h2 ?>, <?= $vc[0]->vc_h3 ?>, <?= $vc[0]->vc_h4 ?>, <?= $vc[0]->vc_h5 ?>, <?= $vc[0]->vc_h6 ?>, <?= $vc[0]->vc_h7 ?>],

        borderColor: [
          'rgba(255, 159, 64, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 159, 64, 1)'

        ],
        borderWidth: 2
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>