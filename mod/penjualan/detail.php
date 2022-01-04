<?php

    // data penjualan 10 terakhir
    $id         = $_GET['id'];

    // table penjualan
    $qu_sell    = "SELECT * FROM tb_penjualan WHERE id=$id";
    $rw_sell    = mysqli_query($con, $qu_sell);
    $rs_sell    = mysqli_fetch_array($rw_sell);
    
    // table penjualan
    $qu_detail_sell    = "SELECT * FROM tb_detail_penjualan WHERE id_penjualan=$id";
    $rw_detail_sell    = mysqli_query($con, $qu_detail_sell);
    
    while ($rs_detail_sell = mysqli_fetch_array($rw_detail_sell)) {
        $result[] = $rs_detail_sell;
    }

?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Content Row -->
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <!-- Bar Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-12 mx-auto">
                                        <div class="form-group">
                                            <label><small>Nama Konsumen</small></label>
                                            <p><?php echo $rs_sell['nama_konsumen'] ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><small>Alamat</small></label>
                                            <p><?php echo $rs_sell['alamat'] ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label><small>Tanggal</small></label>
                                            <p><?php echo date('d-m-Y', strtotime($rs_sell['tanggal'])) ?></p>
                                        </div>
                                        <div class="row">
                                            <p>Detail Pembelian</p>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Barang</th>
                                                            <th>Jumlah</th>
                                                            <th>Harga Satuan</th>
                                                            <th>Harga Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $no = 1; 
                                                            foreach ($result as $res) { 
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $res['kode_barang']; ?></td>
                                                            <td><?php echo $res['jumlah']; ?></td>
                                                            <td><?php echo $res['harga_satuan']; ?></td>
                                                            <td><?php echo $res['harga_total']; ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <div align="right">
                                            <a href="#" class="btn btn-sm btn-danger" onclick="history.back()"><i class="fas fa-undo"></i> Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->