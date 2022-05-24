<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url('/js/scripts.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('/assets/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('/assets/demo/chart-bar-demo.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?php echo base_url('/js/datatables-simple-demo.js') ?>"></script>



<script>
    function startCalc() {
        interval = setInterval("calc()", 1);
    }

    function calc() {
        one = document.autoSumForm.Uang_Pembayaran.value;
        document.autoSumForm.Kembalian.value = one - <?= $this->cart->total(); ?>;
    }

    function stopCalc() {
        clearInterval(interval);
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.add_cart').click(function() {
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_price = $(this).data("productprice");
            var product_discount = $(this).data("productdiscount");
            var quantity = $('#' + product_id).val();
            $.ajax({
                url: "<?= base_url('admin/pembelian/add_to_cart'); ?>",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    product_discount: product_discount,
                    quantity: quantity
                },
                success: function(data) {
                    $('#detail_cart').html(data);
                }
            });
        });
        $('#detail_cart').load("<?= base_url('admin/pembelian/load_cart'); ?>");

        $(document).on('click', '.remove_cart', function() {
            var row_id = $(this).attr("id");

            $.ajax({
                url: "<?= base_url('admin/pembelian/delete_cart'); ?>",
                method: "POST",
                data: {
                    row_id: row_id
                },
                success: function(data) {
                    $('#detail_cart').html(data);
                }
            });
        });
    });
</script>

<script>
    var table = document.getElementById('table');
    for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            document.getElementById('nama_supplier').value = this.cells[0].innerHTML;
            document.getElementById('id_supplier').value = this.cells[1].innerHTML;
            $('#showSupplier').modal('hide');
        };
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.process_payment').click(function() {
            var kode_beli = $(this).data("kode_beli");
            var supplier = document.getElementById('id_supplier').value;
            $.ajax({
                url: "<?= base_url('admin/pembelian/add_pembelian'); ?>",
                method: "POST",
                data: {
                    kode_beli: kode_beli,
                    supplier: supplier
                },
                success: function(data) {
                    $('#nama_supplier').html(data);
                }
            });
        });
    });
</script>

<!-- Grafik Garis Pembelian -->
<script>
    $(function()
    {
        Chart.defaults.global.defaultFontFamily = 'Segoe UI'; // Mengatur default seluruh font (style) pada chart
        Chart.defaults.global.defaultFontSize = 14; // Mengatur default seluruh size font pada chart

        //Get the Line chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`); // JSON.parse = fungs i untuk mengurai data menjadi objek JavaScript
        var ctx = $("#pnjLine"); // Target canvas id dari v_chart.php

        //Line chart data
        var data = {
            labels: cData.label_bulan,
            datasets: [{
                label: 'Buku Terjual',
                data: cData.data_jml,
        lineTension: 0.3, // Mengatur tingkat ketegangan garis, jika di set ke 0 maka garis semakin lurus.
        borderWidth: 3, // Mengatur lebar garis (pixels)
        backgroundColor: "rgba(2,117,216,0.2)", // Mengatur warna backgroun d pada isi grafik

        borderColor: "rgba(2,117,216,1)", // Mengatur warna garis
        pointStyle: 'circle', // Mengatur style point (triangle, star, cros s, dash, rect, rectRounded, etc)
        pointRadius: 3, // Mengatur besarnya point pada garis
        pointBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna point
        pointBorderColor: "rgba(255,255,255,0.8)", // Mengatur warna border point
        pointHoverRadius: 5, // Mengatur besarnya point pada garis saat dis entuh pointer mouse
        pointHoverBackgroundColor: "rgba(2,117,216,1)", // Mengatur warna b ackground pointsaat disentuh pointer mouse
        pointHitRadius: 50, // Mengatur radius hit point di garis saat dis entuh pointer mouse
        pointBorderWidth: 2, // Mengatur besar border untuk point
        }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                 position: "top",
                 text: "Grafik Pembelian Tahun " + cData.label_tahun,
                 fontSize: 18,
                 fontColor: "#111"
            },
         legend: {
             display: true,
             position: "right",
             labels: {
                 fontColor: "#333",
                 fontSize: 16,
                }
            },
         scales: {
            xAxes: [{
                time: {
                    unit: 'month',
                },
                gridLines: {
                    display: false
                },
                 scaleLabel: {
                     display: true,
                     fontStyle: 'bold',
                     labelString: 'BULAN'
                }
            }],
         yAxes: [{
            ticks: {
                 min: 0,
                 max: 1000,
                 maxTicksLimit: 15
         },
        gridLines: {
            color: "rgba(0, 0, 0, .150)",
        },
        scaleLabel: {
            display: true,
            fontStyle: 'bold',
            labelString: 'JUMLAH Pembelian'
            }
        }],
    },
 };
 //Create Line Chart class object
 var chart1 = new Chart(ctx, {
     type: "line", // Mengatur tipe chart yang digunakan
     data: data,
     options: options
    });
});
</script>

<!-- Grafik Batang Pembelian -->
 <script>
    $(function() {
     Chart.defaults.global.defaultFontFamily = 'Segoe UI';
     Chart.defaults.global.defaultFontSize = 14;

    //get the bar chart canvas
     var cData = JSON.parse(`<?php echo $chart_data; ?>`);
     var ctx = $("#pnjBar");

    //bar chart data
     var data = {
        labels: cData.label_bulan,
        datasets: [{
            label: 'Buku Terjual',
            data: cData.data_jml,
            backgroundColor: [ // Warna background pada batang grafik
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57",
                "#1D7A46",
                "#CDA776",
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
            ],
            borderColor: [ // Warna border pada batang grafik
                "#CDA776",
                "#989898",
                "#CB252B",
                "#E39371",
                "#1D7A46",
                "#F4A460",
                "#CDA776",
                "#DEB887",
                "#A9A9A9",
                "#DC143C",
                "#F4A460",
                "#2E8B57", 
            ],
            borderWidth: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1] // Lebar border pada batang grafik
        }]
    };
    
    //options
    var options = {
        responsive: true,
        title:{
            display: true,
            position: "top",
            text: "Grafik Pembelian Tahun " + cData.label_tahun,
            fontSize: 18,
            fontColor: "#111"
        },
        legend: {
            display: false,
            position: "right",
            labels:{
                fontColor: "#333",
                fontSize: 16
            }
        },
        scales:{
            xAxes: [{
                time:{
                    unit: 'month'
                },
                gridLines:
                {
                    display: false
                },
                scaleLabel:
                {
                    display: true,
                    fontStyle: 'bold',
                    labelString: 'Bulan'
                }
            }],
            yAxes: [{
                ticks:{
                    min:0,
                    max: 1000,
                    maxTicksLimit: 10
                },
                gridLines:
                {
                    color: "rgba(0, 0, 0, .150)",
                },
                scaleLabel:
                {
                    display: true,
                    fontStyle: 'bold',
                    labelString: 'Jumlah Pembelian'
                }
            }],
        }, 
    };

    //Create Bar Chart class object
    var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
        });
    });
</script>

<!-- Download as Image - Line Chart -->
<script> 
    function downloadLine() { 
        var download = document.getElementById("download"); 
        var image = document.getElementById("pnjLine").toDataURL("image/jpg") .replace("image/jpg", "image/octet-stream"); 
        download.setAttribute("href", image); 
    }
</script>

<!-- Download as Image - Bar Chart -->  
<script>
    function downloadBar() {
        var download = document.getElementById("download1");
        var image = document.getElementById("pnjBar").toDataURL("image/jpg", 1.0).replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>

<!-- Download as PDF - Line Chart -->
<script type="text/javascript">
    function LinePDF() {
        html2canvas(document.getElementById("pnjLine"), {
            onrendered: function(canvas) {
                var img = canvas.toDataURL("image/png", 1.0); // meng-konversi grafik di canvas menjadi image (png)
                var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')

                // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points (pt)
                var lebarKonten = canvas.width;
                var tinggiKonten = canvas.height;
                var tinggiPage = lebarKonten / 592.28 * 841.89;
                var leftHeight = tinggiKonten;
                var position = 0;
                var imgWidth = 595.28;
                var imgHeight = 592.28 / lebarKonten * tinggiKonten;
                if (leftHeight < tinggiPage) {
                    doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight);
                } else {
                    while (leftHeight > 0) {
                        doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight)
                        leftHeight -= tinggiPage;
                        position -= 841.89;
                        //Avoid adding blank pages
                        if (leftHeight > 0) {
                            pdf.addPage();
                        }
                    }
                }
                doc.save('LineChart_Pembelian.pdf'); //Download the rendered PDF.
            }
        });
    }
</script>

<script type="text/javascript"> 
    function BarPDF()
    { 
        html2canvas(document.getElementById("pnjBar"), { 
            onrendered: function(canvas) { 
         var img = canvas.toDataURL("image/png", 1.0); // mengkonversi grafik di canvas menjadi image (png)
         var doc = new jsPDF('p', 'pt', 'a4'); // membuat dokumen pdf dengan jsPDF('orientation p = portrait', 'size unit', 'format kertas')
         // Mengatur size image agar sesuai format kertas a4[595.28,841.89] dalam size unit points(pt)
         var lebarKonten = canvas.width; 
         var tinggiKonten = canvas.height; 
         var tinggiPage = lebarKonten / 592.28 * 841.89; 
         var leftHeight = tinggiKonten; 
         var position = 0; 
         var imgWidth = 595.28; 
         var imgHeight = 592.28 / lebarKonten * tinggiKonten; 
         if (leftHeight < tinggiPage) { 
            doc.addImage(img, 'PNG', 0, 0, imgWidth, imgHeight); 
         } else { 
            while (leftHeight > 0) { 
                doc.addImage(img, 'PNG', 0, position, imgWidth, imgHeight) 
                leftHeight -= tinggiPage; 
                position -= 841.89; 
         //Avoid adding blank pages 
         if (leftHeight > 0) { 
            pdf.addPage(); 
         } 
        } 
        } 
         doc.save('BarChart_Pembelian.pdf'); //Download the rendered PDF. 
        } 
        }); 
    }
</script>