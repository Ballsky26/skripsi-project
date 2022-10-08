<div class="section-header">
    <h1><?= $title; ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(''); ?>ketua/dashboard">Dashboard</a></div>
        <div class="breadcrumb-item">Data Pendaftar Tenant</div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="flash" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                <?= $this->session->flashdata('message'); ?>
                <div class="clearfix mb-3"></div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pemilik</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Tanggal Daftar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($pendaftar as $p) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $p['nama_pemilik']; ?></td>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= date('d ', $p['tanggal_daftar']) . $bulan_indo[intval(date('m', $p['tanggal_daftar']))] . date(' Y', $p['tanggal_daftar']); ?></td>
                                        <td>
                                            <?php
                                            if ($p['status'] == 'Diproses') {
                                                echo '<span class="badge badge-warning">Diproses</span>';
                                            } elseif ($p['status'] == 'Diterima') {
                                                echo  '<span class="badge badge-success">Diterima</span>';
                                            } elseif ($p['status'] == 'Ditolak') {
                                                echo  '<span class="badge badge-danger">Ditolak</span>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('ketua/detail_pendaftar_tenant/' . $p['id']); ?>" class="badge badge-info"><i class="fas fa-info"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Data Berhasil ' + flash
        })
    }
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data ini akan Dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })

    });
</script>