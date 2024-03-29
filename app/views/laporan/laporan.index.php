<?php
/**
 * @var $criteria
 * @var $nasabah
 * @var $head
 * @var $ranking
 * @var $namaKriteria
 * @var $namaNasabah
 * @var $periode
 * @var $kuota
 */
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Tanggal Pengajuan</h3>
                    <p class="text-sm mb-0">
                        Pilih Tanggal Pengajuan 
                    </p>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form action="<?= BASE_PATH; ?>/laporan" method="GET">
                            <div class="form-group row">
                                <div class="input-group input-group-merge col-12">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input value="<?= isset($_GET["periode"]) && !empty($_GET["periode"]) ? date("Y-m-d", strtotime($_GET['periode'])) : ''; ?>" name="periode" class="form-control" placeholder="Periode ..." type="date">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-success btn-sm mt-2" type="submit">
                                        Pilih
                                    </button>
                                    <a href="<?= BASE_PATH; ?>/laporan" class="btn btn-info btn-sm mt-2" type="submit">
                                        Tampil Semua
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Cetak Laporan</h3>
                    <p class="text-sm mb-0">
                        Halaman ini adalah tampilan saat mencetak laporan
                    </p>
                    <a href="<?= BASE_PATH; ?>/laporan/pdf?periode=<?= $periode; ?>&kuota=<?= $kuota; ?>" class="btn btn-sm btn-primary mt-2"><i class="fa fa-print"></i> Cetak pdf</a>
                </div>
                <div class="table-responsive">
                    <div id="datatable-basic_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-flush dataTable datatable-basic" role="grid" aria-describedby="datatable-basic_info">
                                    <thead class="thead-light">
                                    <tr role="row">
                                        <th class="sorting_asc text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 30px;">
                                            Ranking
                                        </th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Nama</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">NIK</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Alamat</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">No Tlp</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Tanggal Pengajuan</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="datatable-basic" rowspan="1" colspan="1">Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; foreach ($ranking as $nasabah => $value) { ?>
                                        <tr role="row" class="even">
                                            <td class="sorting_1 text-center"><?= ++$i; ?></td>
                                            <td class="sorting_1 col-3"><?= $nasabah; ?></td>
                                            <td class="sorting_1 text-center"><?= $namaNasabah[$nasabah]['data']["no_nik"]; ?></td>
                                            <td class="sorting_1 text-center"><?= $namaNasabah[$nasabah]['data']["alamat"]; ?></td>
                                            <td class="sorting_1 text-center"><?= $namaNasabah[$nasabah]['data']["no_tlp"]; ?></td>
                                            <td class="sorting_1 text-center"><?= date('d F Y', strtotime($namaNasabah[$nasabah]['data']["periode"])); ?></td>
                                            <td class="sorting_1 text-center text <?= $namaNasabah[$nasabah]['layak'] ? 'text-success' : 'text-danger' ?>"><?= $namaNasabah[$nasabah]['layak'] ? 'Layak' : 'Tidak Layak'; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>