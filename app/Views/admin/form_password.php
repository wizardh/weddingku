<?= view('admin/templates/header'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $page_name; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <?php 
      if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php elseif(session()->getFlashdata('error')): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php endif; ?>

      <?php if(isset($validation)): ?>
        <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
      <?php endif; ?>      
      <?php
        $hidden = ['user_id' => session('user_id')];
        echo form_open('change_password', '', $hidden);
      ?>      

      <div class="col-md-6 col-lg-6">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="name" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= session('username'); ?>" disabled>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Old Password</label>
              <input type="password" class="form-control" id="old_password" name="old_password" placeholder="" required>
              <div class="invalid-feedback">
                Password invalid.
              </div>
            </div>            

            <div class="col-sm-12">
              <label for="name" class="form-label">New Password</label>
              <input type="password" class="form-control" id="new_password" name="new_password" placeholder="" required>
              <div class="invalid-feedback">
                New password didn't match.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="" required>
              <div class="invalid-feedback">
                New password didn't match.
              </div>
            </div>

          <hr class="my-4">

            <div class="col-4">
              <input type="submit" class="w-100 btn btn-primary btn-lg" value="Submit">
            </div>
      </div>
    </div>
    
    </main>
  </div>
</div>

<?= view('admin/templates/footer'); ?>