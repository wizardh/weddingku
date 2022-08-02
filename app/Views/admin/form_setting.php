<?= view('admin/templates/header'); ?>
<script src="js/jscolor.js"></script>

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
            <div class="col-sm-8">
              <label for="name" class="form-label">Bride's Name</label>
              <input type="text" class="form-control" id="bride_name" name="bride_name" placeholder="" value="<?= $wsettings->bride_name; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>
            <div class="col-sm-4">
              <label for="name" class="form-label">Bride's Nickname</label>
              <input type="text" class="form-control" id="bride_nickname" name="bride_nickname" placeholder="" value="<?= $wsettings->bride_nickname; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Bride's Parents</label>
              <input type="text" class="form-control" id="bride_parents" name="bride_parents" placeholder="" value="<?= $wsettings->bride_parents; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>            

            <div class="col-sm-8">
              <label for="name" class="form-label">Groom's Name</label>
              <input type="text" class="form-control" id="groom_name" name="groom_name" placeholder="" value="<?= $wsettings->groom_name; ?>" required>
              <div class="invalid-feedback">
                Valid name is required.
              </div>
            </div>
            <div class="col-sm-4">
              <label for="name" class="form-label">Groom's Nickname</label>
              <input type="text" class="form-control" id="groom_nickname" name="groom_nickname" placeholder="" value="<?= $wsettings->groom_nickname; ?>" required>
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

            <div class="col-sm-6">
              <label for="name" class="form-label">Akad Date</label>
              <input type="text" class="form-control" id="akad_date" name="akad_date" placeholder="yyyy/mm/dd" value="<?= $wsettings->akad_date; ?>" required>
              <div class="invalid-feedback">
                Valid date is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="name" class="form-label">Akad Time</label>
              <input type="text" class="form-control" id="akad_time" name="akad_time" placeholder="08:00 - 09:00" value="<?= $wsettings->akad_time; ?>" required>
              <div class="invalid-feedback">
                Valid date is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Akad Address</label>
              <input type="text" class="form-control" id="akad_address" name="akad_address" placeholder="" value="<?= $wsettings->akad_address; ?>" required>
              <div class="invalid-feedback">
                Valid address is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="name" class="form-label">Wedding Date</label>
              <input type="text" class="form-control" id="wedding_date" name="wedding_date" placeholder="yyyy/mm/dd" value="<?= $wsettings->wedding_date; ?>" required>
              <div class="invalid-feedback">
                Valid date is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="name" class="form-label">Wedding Time</label>
              <input type="text" class="form-control" id="wedding_time" name="wedding_time" placeholder="10:00 - 13:00" value="<?= $wsettings->wedding_time; ?>" required>
              <div class="invalid-feedback">
                Valid date is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Wedding Address</label>
              <input type="text" class="form-control" id="wedding_address" name="wedding_address" placeholder="" value="<?= $wsettings->wedding_address; ?>" required>
              <div class="invalid-feedback">
                Valid address is required.
              </div>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Health Protocol</label>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="health_protocol" name="health_protocol" <?= ($wsettings->health_protocol ? 'checked':'');?>>
                <label class="form-check-label" for="health_protocol">Show Covid-19 Health Protocol Information</label>
              </div>
            </div>
            
            <div class="col-sm-12">
              <label for="name" class="form-label">Invitation Text Template</label>
              <textarea class="form-control" id="invitation_template" name="invitation_template" rows="4" required><?= $wsettings->invitation_template; ?></textarea>
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">YouTube Video ID for BGM (separate multiple IDs with comma, will be played randomly)</label>
              <input type="text" class="form-control" id="youtube_ids" name="youtube_ids" placeholder="" value="<?= $wsettings->youtube_ids; ?>">
            </div>

            <div class="col-sm-12">
              <label for="bg_color" class="form-label">Background Color</label>
              <input data-jscolor="{}" type="text" class="form-control" id="bg_color" name="bg_color" value="<?= $wsettings->bg_color; ?>" required>
              <div class="invalid-feedback">
                Valid ID is required.
              </div>
            </div>            

            <div class="col-sm-12">
              <label for="bg_color" class="form-label">Primary Text Color</label>
              <input data-jscolor="{}" type="text" class="form-control" id="primary_color" name="primary_color" value="<?= $wsettings->primary_color; ?>" required>
              <div class="invalid-feedback">
                Valid ID is required.
              </div>
            </div>            


            <div class="col-sm-12">
              <label for="bg_color" class="form-label">Secondary Text Color</label>
              <input data-jscolor="{}" type="text" class="form-control" id="secondary_color" name="secondary_color" value="<?= $wsettings->secondary_color; ?>" required>
              <div class="invalid-feedback">
                Valid ID is required.
              </div>
            </div>            

            <div class="col-sm-12">
              <label for="name" class="form-label">Font Import Style URL</label>
              <input type="text" class="form-control" id="font_import" name="font_import" placeholder="" value="<?= $wsettings->font_import; ?>">
            </div>

            <div class="col-sm-12">
              <label for="name" class="form-label">Font CSS Rules</label>
              <input type="text" class="form-control" id="font_css" name="font_css" placeholder="" value="<?= $wsettings->font_css; ?>">
            </div>
            
            <hr class="my-4">

            <div class="col-4">
              <input type="submit" class="w-100 btn btn-primary btn-lg" value="Save">
            </div>
      </div>
    </div>
    
    </main>
  </div>
</div>

<script>
// Here we can adjust defaults for all color pickers on page:
jscolor.presets.default = {
    position: 'right',
    palette: [
        '#000000', '#7d7d7d', '#870014', '#ec1c23', '#ff7e26',
        '#fef100', '#22b14b', '#00a1e7', '#3f47cc', '#a349a4',
        '#ffffff', '#c3c3c3', '#b87957', '#feaec9', '#ffc80d',
        '#eee3af', '#b5e61d', '#99d9ea', '#7092be', '#c8bfe7',
    ],
    //paletteCols: 12,
    //hideOnPaletteClick: true,
};
</script>

<?= view('admin/templates/footer'); ?>