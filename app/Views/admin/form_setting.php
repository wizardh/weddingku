<?= view('admin/templates/header'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $page_name; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-secondary" href="/setting/">Wedding Setting</a>
        </div>
      </div>
      <?php 
      if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php 
      endif; ?>

      <?php if(isset($validation)): ?>
        <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors(); ?>
      <?php endif; ?>      
      <?php
        $hidden = ['updated_by' => session('user_type'), 'id' => $wsettings->id];
        echo form_open('setting/update/' . $wsettings->id, '', $hidden);
      ?>      

      <div class="col-md-6 col-lg-6">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="name" class="form-label">Bride's Name</label>
              <input type="text" class="form-control" id="bride_name" name="bride_name" placeholder="" value="<?= $wsettings->bride_name; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Bride's Parents</label>
              <input type="text" class="form-control" id="bride_name" name="bride_name" placeholder="" value="<?= $wsettings->bride_parents; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>            

            <div class="col-sm-12">
              <label for="name" class="form-label">Groom's Name</label>
              <input type="text" class="form-control" id="groom_name" name="groom_name" placeholder="" value="<?= $wsettings->groom_name; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Groom's Parents</label>
              <input type="text" class="form-control" id="groom_parents" name="groom_parents" placeholder="" value="<?= $wsettings->groom_parents; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
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