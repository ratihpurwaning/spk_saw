<?php
/**
 * @var $criteria
 * @var $nasabah
 * @var $grouped
 * @var $ids
 */
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tambah Kriteria Nasabah</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Input data kriteria nasabah</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <?php if (!is_null($nasabah)) { ?>
                            <div class="row">
                                <div class="col-lg-8">
                                    <p class="mb-0">
                                        Masukkan data kriteria untuk <strong style="font-weight: bold;"><?= $nasabah['nama_nsb'] ?></strong>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                        <hr>
                        <?php if (flashHas('error')) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>Error!</strong> <?php echo flashGet('error'); ?>
                            </div>
                        <?php } ?>
                        <form action="<?= BASE_PATH; ?>/nasabah/bobot" method="post" class="needs-validation" novalidate="">
                            <input type="text" hidden name="id" value="<?= $_GET['id']; ?>">
                            <div class="row">
                                <?php $i = 1; foreach ($grouped as $key => $value) { ?>
                                    <div class="col-md-4 mb-4">
                                        <input type="text" name="kriteria[]" hidden value="<?= $value[0]['id_kriteria']; ?>">
                                        <label class="form-control-label" for="sub_kriteria"><?= ucfirst($key); ?> (C<?= $i++; ?>)</label>
                                        <select class="form-control" name="sub_kriteria[]" id="sub_kriteria">
                                            <?php foreach ($value as $item) { ?>
                                                <option <?= in_array($item['id_subkriteria'], $ids) ? 'selected' : ''; ?> value="<?= $item['id_subkriteria']; ?>"><?= $item['ket']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
