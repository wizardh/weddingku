<?= view('admin/templates/header'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $page_name; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-secondary" href="<?= base_url('guest'); ?>">Guests List</a>
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
        if($new):
            $hidden = ['invited_by' => session('user_type')];
            echo form_open('guest/create', '', $hidden);       
        else:
            $hidden = ['invited_by' => 'Groom', 'id' => $guest->id];
            echo form_open('guest/update/' . $guest->id, '', $hidden);
        endif;
      ?>      
      <div class="col-md-6 col-lg-6">
          <div class="row g-3">
            <div class="col-sm-4">
              <label for="title" class="form-label">Title <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Sdr/Bpk/Ibu dll" value="<?= ($new ? '':$guest->title); ?>">
            </div>

            <div class="col-sm-8">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= ($new ? '':$guest->name); ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?= ($new ? '':$guest->address); ?>">
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Mobile Phone <span class="text-muted">(Optional)</span></label>
              <input type="number" class="form-control" id="phone" name="phone" placeholder="628100000012" value="<?= ($new ? '':$guest->phone); ?>">
              <div class="invalid-feedback">
                Please enter a valid mobile phone number.
              </div>
            </div>

            <div class="col-12">
              <label for="notes" class="form-label">Notes <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="notes" name="notes" placeholder="" value=<?= ($new ? '':$guest->notes); ?>>
            </div>

          <?php
          if( !$new ):
          ?>
            <div class="col-12">
              <label for="invitation_code" class="form-label">Invitation Code </label>
              <input type="text" class="form-control" id="invitation_code" name="invitation_code" value="<?= $guest->invitation_code; ?>" required>
            </div>

            <div class="col-12">
              <label for="invited_by" class="form-label">Invited By </label>
              <input type="text" class="form-control" id="invited_by" name="invited_by" value="<?= ($guest->invited_by == 'Groom' ? 'Mempelai Pria':'Mempelai Wanita'); ?>" disabled>
            </div>

            <div class="col-sm-6">
              <label for="title" class="form-label">Is Attending </label>
              <input type="text" class="form-control" id="is_attending" name="is_attending" value="<?= ($guest->is_attending == 0 & $guest->attendee == 0 ? '-' : ($guest->is_attending == 1 ? 'Hadir' : 'Tidak')); ?>" disabled>
            </div>

            <div class="col-sm-6">
              <label for="name" class="form-label"># attending</label>
              <input type="text" class="form-control" id="attendee" name="attendee" value="<?= ($new ? '':$guest->attendee); ?>" disabled>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>            
          <?php
          endif;
          ?>

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