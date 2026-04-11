<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">My Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php if (!empty($user['profile_image'])): ?>
                                <img src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" 
                                     class="profile-user-img img-fluid img-circle" 
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center" 
                                     style="width: 120px; height: 120px; font-size: 3rem;">
                                    <?= substr(esc($user['fullname']), 0, 1) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h3 class="profile-username text-center mt-3"><?= esc($user['fullname']) ?></h3>
                        <p class="text-muted text-center"><?= esc($user['student_id'] ?: 'No Student ID') ?></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Course</b> <a class="float-end"><?= esc($user['course'] ?: 'N/A') ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Year Level</b> <a class="float-end"><?= esc($user['year_level'] ?: 'N/A') ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Section</b> <a class="float-end"><?= esc($user['section'] ?: 'N/A') ?></a>
                            </li>
                        </ul>
                        <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary btn-block"><i class="bi bi-pencil-square"></i> Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-person-lines-fill"></i> Personal Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong><i class="bi bi-envelope"></i> Email</strong></div>
                            <div class="col-sm-8"><?= esc($user['username']) ?></div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong><i class="bi bi-telephone"></i> Phone</strong></div>
                            <div class="col-sm-8"><?= esc($user['phone'] ?: 'No contact number') ?></div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-4"><strong><i class="bi bi-geo-alt"></i> Address</strong></div>
                            <div class="col-sm-8"><?= esc($user['address'] ?: 'No address provided') ?></div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="bi bi-clock-history"></i> Account Activity</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Account Created</strong></div>
                            <div class="col-sm-8"><?php date_default_timezone_set('Asia/Manila'); echo date('M d, Y'); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><strong>Last Updated</strong></div>
                            <div class="col-sm-8"><?php date_default_timezone_set('Asia/Manila'); echo date('M d, Y H:i'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>