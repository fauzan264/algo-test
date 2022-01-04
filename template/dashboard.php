<?php

    // bar chart
    $qu_day = "SELECT DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal, SUM(distinct total_penjualan) as penjualan FROM view_data_penjualan WHERE MONTH(tanggal) = MONTH(current_timestamp()) GROUP BY tanggal";
    $rw_day   = mysqli_query($con, $qu_day);
    while ($rs_day = mysqli_fetch_array($rw_day)) {
        $rs_day_text[] = $rs_day['tanggal'];
        $rs_day_val[] = $rs_day['penjualan'];
    }

    // pie chart
    $qu_category    = "SELECT * FROM view_stok_kategori";
    $rw_category    = mysqli_query($con, $qu_category);
    while ($rs_category = mysqli_fetch_array($rw_category)) {
        $rs_category_text[] = $rs_category['kategori'];
        $rs_category_val[] = $rs_category['stok_kategori'];
    }

    // data penjualan 10 terakhir
    $qu_sell    = "SELECT * FROM view_data_penjualan";
    $rw_sell    = mysqli_query($con, $qu_sell);
    while ($rs_sell = mysqli_fetch_array($rw_sell)) {
        $result[] = $rs_sell;
    }
?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <!-- Bar Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Penjualan Bulan Ini</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-bar">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Persentase Kategori Barang</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Penjualan Terakhir</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Customer</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Total Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1; 
                                    foreach ($result as $res) { 
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><a href="index.php?mod=penjualan&cmd=detail&id=<?php echo $res['id']; ?>"><?php echo $res['nama_konsumen']; ?></a></td>
                                    <td><?php echo $res['alamat']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($res['tanggal'])); ?></td>
                                    <td><?php echo $res['total_penjualan']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
