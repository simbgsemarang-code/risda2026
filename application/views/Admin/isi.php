<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Jumlah Sumber Daya Air</li>
    </ol>

</div>
<div class="row gutters">
     <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
<div class="row gutters">
     <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
<div class="row gutters">
     <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer4" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer5" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
<div class="row gutters">
     <div class="col-xl-12 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer6" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
    
</div>
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Panjang Saluran (meter)</li>
    </ol>

</div>		
<div class="row gutters">
     <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer7" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer8" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
<div class="row gutters">
     <div class="col-xl-12 col-sm-12 col-12">
        <div class="card">
            <div class="counter-item bg-light rounded p-3 h-100">
                <div id="chartContainer9" style="height: 300px; width: 100%;"></div>
            </div>
        </div>
    </div>
   
</div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Kondisi Saluran Irigasi"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik Sekali",
                        y: <?=$statistik['jml irigasi']['jumlah baik sekali']?>
                    },
                    {
                        label: "Baik",
                        y: <?=$statistik['jml irigasi']['jumlah baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['jml irigasi']['jumlah sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['jml irigasi']['jumlah buruk']?>
                    },
                    
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer1", {
            title: {
                text: "Kondisi Saluran Pembuang"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['jml pembuang']['jumlah baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['jml pembuang']['jumlah sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['jml pembuang']['jumlah buruk']?>
                    },

                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer2", {
            title: {
                text: "Kondisi Drainase Perkotaan"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['jml drainase']['jumlah baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['jml drainase']['jumlah sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['jml drainase']['jumlah buruk']?>
                    },

                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer3", {
            title: {
                text: "Statistik Bendung"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml bendung']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml bendung']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml bendung']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                   
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer4", {
            title: {
                text: "Statistik B. Pelengkap Irigasi"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml pirigasi']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml pirigasi']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml pirigasi']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                   
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer5", {
            title: {
                text: "Statistik B. Pelengkap Pembuang"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml ppembuang']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah batas imajiner']?>,
                        indexLabel: "Batas Imajiner"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah imajiner']?>,
                        indexLabel: "Imajiner"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah alami']?>,
                        indexLabel: "Alami"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah rusak berat']?>,
                        indexLabel: "Rusak Berat"
                    },
                     {
                        y: <?=$statistik['jml ppembuang']['jumlah hilang']?>,
                        indexLabel: "Hilang"
                    },
                   
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer6", {
            title: {
                text: "Statistik Air Baku"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml air baku']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml air baku']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml air baku']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                    {
                        y: <?=$statistik['jml air baku']['jumlah tidak operasi']?>,
                        indexLabel: "Tidak Beroperasi"
                    },
                   
                   
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer7", {
            title: {
                text: "Kondisi Saluran Irigasi"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik Sekali",
                        y: <?=$statistik['pan irigasi']['panjang baik sekali']?>
                    },
                    {
                        label: "Baik",
                        y: <?=$statistik['pan irigasi']['panjang baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['pan irigasi']['panjang sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['pan irigasi']['panjang buruk']?>
                    },
                    
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer8", {
            title: {
                text: "Kondisi Saluran Pembuang"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['pan pembuang']['panjang baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['pan pembuang']['panjang sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['pan pembuang']['panjang buruk']?>
                    },

                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer9", {
            title: {
                text: "Kondisi Saluran Drainase"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['pan drainase']['panjang baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['pan drainase']['panjang sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['pan drainase']['panjang buruk']?>
                    },

                ]
            }]
        });
        chart.render();
    }
 </script>