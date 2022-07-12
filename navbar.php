<?php
$current_page = isset($_GET['p']) ? $_GET['p'] : 'home';

?>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php?m=contents&p=home">
            <img src="assets/img/logo_big.png" alt="" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= ($current_page == 'home') ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?m=contents&p=home">BERANDA <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-expanded="false">PROFIL</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="index.php?m=contents&p=tentang-kammi">Tentang KAMMI</a>
                        <a class="dropdown-item" href="index.php?m=contents&p=struktur-pengurus">Struktur Pengurus</a>
                    </div>
                </li>
                <li class="nav-item <?= ($current_page == 'publikasi-list') ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?m=contents&p=publikasi-list">PUBLIKASI</a>
                </li>
                <li class="nav-item  <?= ($current_page == 'dokumen-file') ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?m=contents&p=agenda">DOKUMEN/ FILE</a>
                </li>
                <?php
                if (cek_login() == true) {
                ?>
                    <li class="nav-item <?= ($current_page == 'agenda') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php?m=contents&p=agenda">AGENDA</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item <?= ($current_page == 'kontak') ? 'active' : '' ?>">
                    <a class="nav-link" href="index.php?m=contents&p=kontak">KONTAK</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-circle"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown05">
                        <?php
                        if (cek_login() == true) {
                            echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
                        } else {
                            echo "<a class='dropdown-item' href='user'>Login</a>";
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>