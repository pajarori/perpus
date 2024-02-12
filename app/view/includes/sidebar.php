<header class=" app-header"><a class="app-header__logo" href="index.html">E-Perpus</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
</header>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?= Session::get('nama') ?></p>
            <p class="app-sidebar__user-designation"><?= Session::get('level') ?></p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="<?= BASE_URL ?>"><i class="app-menu__icon bi bi-book"></i><span class="app-menu__label">Buku</span></a></li>
        <?php if (Session::isAdmin() || Session::isPetugas()) { ?>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i><span class="app-menu__label">Admin Panel</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= BASE_URL ?>/admin.php?page=buku"><i class="icon bi bi-circle-fill"></i> Buku</a></li>
                    <li><a class="treeview-item" href="<?= BASE_URL ?>/admin.php?page=pinjaman"><i class="icon bi bi-circle-fill"></i> Pinjaman</a></li>
                    <?php if (Session::isAdmin()) { ?>
                        <li><a class="treeview-item" href="<?= BASE_URL ?>/admin.php?page=user"><i class="icon bi bi-circle-fill"></i> User</a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
        <li><a class="app-menu__item" href="<?= BASE_URL ?>logout.php"><i class="app-menu__icon bi bi-box-arrow-right"></i><span class="app-menu__label">Logout</span></a></li>
    </ul>
</aside>