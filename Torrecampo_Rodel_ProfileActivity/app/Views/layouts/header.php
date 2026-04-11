<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <?php if (!empty($user['profile_image'])): ?>
                        <img src="<?= base_url('uploads/profiles/' . $user['profile_image']) ?>" class="user-image rounded-circle shadow" alt="User Image" />
                    <?php else: ?>
                        <img src="<?= base_url('assets/images/avatar4.png') ?>" class="user-image rounded-circle shadow" alt="User Image" />
                    <?php endif; ?>
                    <span class="d-none d-md-inline"><?= $user['fullname'] ?? 'Mona General' ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        <?php if (!empty($user['profile_image'])): ?>
                            <img src="<?= base_url('uploads/profiles/' . $user['profile_image']) ?>" class="rounded-circle shadow" alt="User Image" />
                        <?php else: ?>
                            <img src="<?= base_url('assets/images/avatar4.png') ?>" class="rounded-circle shadow" alt="User Image" />
                        <?php endif; ?>
                        <p><?= $user['fullname'] ?? 'Mona General' ?> - <?= $user['role'] ?? 'Member' ?><small>Member since Nov. 2023</small></p>
                    </li>
                    <li class="user-body">
                        <a href="<?= base_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                        <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat float-end">Sign out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>