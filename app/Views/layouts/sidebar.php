<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-boxes"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventaris</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?= service('uri')->getSegment(1) == 'dashboard' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Master Data</div>

    <li class="nav-item <?= service('uri')->getSegment(1) == 'barang' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('barang') ?>">
            <i class="fas fa-fw fa-box"></i>
            <span>Data Barang</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Transaksi</div>

    <li class="nav-item <?= service('uri')->getSegment(1) == 'barang-masuk' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('barang-masuk') ?>">
            <i class="fas fa-arrow-circle-down"></i>
            <span>Barang Masuk</span>
        </a>
    </li>

<!--    <li class="nav-item --><?php //= service('uri')->getSegment(1) == 'barang-keluar' ? 'active' : '' ?><!--">-->
<!--        <a class="nav-link" href="--><?php //= base_url('barang-keluar') ?><!--">-->
<!--            <i class="fas fa-arrow-circle-up"></i>-->
<!--            <span>Barang Keluar</span>-->
<!--        </a>-->
<!--    </li>-->

    <li class="nav-item <?= service('uri')->getSegment(1) == 'peminjaman' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('peminjaman') ?>">
            <i class="fas fa-hand-holding"></i>
            <span>Peminjaman</span>
        </a>
    </li>

    <li class="nav-item <?= service('uri')->getSegment(1) == 'pengembalian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pengembalian') ?>">
            <i class="fas fa-undo-alt"></i>
            <span>Pengembalian</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Laporan</div>

    <li class="nav-item <?= service('uri')->getSegment(1) == 'laporan' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('laporan') ?>">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Laporan</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">


</ul>
