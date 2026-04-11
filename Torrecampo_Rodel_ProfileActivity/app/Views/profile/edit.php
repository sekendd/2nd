<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Edit Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profile</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php if (!empty($user['profile_image'])): ?>
                                    <img id="preview" src="<?= base_url('uploads/profiles/' . esc($user['profile_image'])) ?>" 
                                         class="profile-user-img img-fluid img-circle" 
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                <?php else: ?>
                                    <div id="avatarPlaceholder" class="bg-secondary text-white rounded-circle d-inline-flex align-items-center justify-content-center" 
                                         style="width: 120px; height: 120px; font-size: 3rem;">
                                        <?= substr(esc($user['fullname']), 0, 1) ?>
                                    </div>
                                    <img id="preview" src="#" class="profile-user-img img-fluid img-circle d-none" 
                                         style="width: 120px; height: 120px; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                            <h3 class="profile-username text-center mt-3"><?= esc($user['fullname']) ?></h3>
                            <p class="text-muted text-center"><?= esc($user['username']) ?></p>
                            <div class="text-center mt-3">
                                <label for="imageInput" class="btn btn-primary btn-sm" style="cursor: pointer;">
                                    <i class="bi bi-camera"></i> Change Photo
                                </label>
                                <input type="file" name="profile_image" id="imageInput" accept="image/*" style="display: none;">
                                <div id="fileName" class="text-muted small mt-2"></div>
                                <small class="text-muted d-block mt-1">Max 2MB (JPG, PNG, WEBP)</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-person-fill"></i> Personal Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control <?= session('errors.name') ? 'is-invalid' : '' ?>" value="<?= old('name', esc($user['fullname'])) ?>" required>
                                    <?php if (session('errors.name')): ?>
                                        <div class="invalid-feedback"><?= session('errors.name') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" value="<?= old('email', esc($user['username'])) ?>" required>
                                    <?php if (session('errors.email')): ?>
                                        <div class="invalid-feedback"><?= session('errors.email') ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-book"></i> Academic Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Student ID <span class="text-danger">*</span></label>
                                    <input type="text" name="student_id" class="form-control <?= session('errors.student_id') ? 'is-invalid' : '' ?>" value="<?= old('student_id', esc($user['student_id'])) ?>" required>
                                    <?php if (session('errors.student_id')): ?>
                                        <div class="invalid-feedback"><?= session('errors.student_id') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Course <span class="text-danger">*</span></label>
                                    <input type="text" name="course" class="form-control <?= session('errors.course') ? 'is-invalid' : '' ?>" value="<?= old('course', esc($user['course'])) ?>" required>
                                    <?php if (session('errors.course')): ?>
                                        <div class="invalid-feedback"><?= session('errors.course') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Year Level <span class="text-danger">*</span></label>
                                    <input type="text" name="year_level" class="form-control <?= session('errors.year_level') ? 'is-invalid' : '' ?>" value="<?= old('year_level', esc($user['year_level'])) ?>" required>
                                    <?php if (session('errors.year_level')): ?>
                                        <div class="invalid-feedback"><?= session('errors.year_level') ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Section</label>
                                    <input type="text" name="section" class="form-control" value="<?= old('section', esc($user['section'])) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-telephone"></i> Contact Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>" value="<?= old('phone', esc($user['phone'])) ?>" required>
                                <?php if (session('errors.phone')): ?>
                                    <div class="invalid-feedback"><?= session('errors.phone') ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control <?= session('errors.address') ? 'is-invalid' : '' ?>" rows="3" required><?= old('address', esc($user['address'])) ?></textarea>
                                <?php if (session('errors.address')): ?>
                                    <div class="invalid-feedback"><?= session('errors.address') ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i> Save Changes</button>
                            <a href="<?= base_url('profile') ?>" class="btn btn-secondary"><i class="bi bi-x-circle"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('imageInput').onchange = function (evt) {
        const [file] = this.files;
        if (file) {
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('avatarPlaceholder');
            const fileName = document.getElementById('fileName');
            
            fileName.textContent = file.name;
            
            const reader = new FileReader();
            reader.onload = (e) => {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                if (placeholder) {
                    placeholder.classList.add('d-none');
                }
            };
            reader.readAsDataURL(file);
        }
    };
</script>
<?= $this->endSection() ?>