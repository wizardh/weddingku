<?= view('admin/templates/header'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $page_name; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-sm btn-outline-secondary" href="<?= base_url('wishlist'); ?>">WishList</a>
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

      <?= form_open_multipart('wishlist/create', ''); ?>

      <div class="col-md-6 col-lg-6">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="name" class="form-label">Item</label>
              <input type="text" class="form-control" id="item" name="item" placeholder="" required>
            </div>

            <div class="col-sm-12">
                <label for="userfile" class="form-label">Image</label>
                <input class="form-control" type="file" id="userfile" name="userfile">
            </div>

            <div class="col-12">
              <label for="reference" class="form-label">Reference Link <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="reference" name="reference" placeholder="" >
            </div>

            <div class="col-12">
              <label for="price" class="form-label">Est. Price<span class="text-muted"> (Optional)</span></label>
              <input type="number" class="form-control" id="price" name="price" >
            </div>

            <div class="col-4">
              <input type="submit" class="w-100 btn btn-primary btn-lg" value="Submit">
            </div>
      </div>
    </div>
    <?= form_close(); ?>

    <hr class="my-4">
    <table class="table" id="guestTable">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Item</th>
        <th scope="col">Est.Price</th>
        <th scope="col">Reference</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($wishlist):
            $i = 1;
            foreach($wishlist as $w):
        ?>
        <tr>
        <th scope="row"><?= $i++; ?></th>
        <td><?= $w->description; ?><br><img height="100" src="<?= base_url('uploads/'.$w->image); ?>"></td>
        <td>Rp <?= number_format($w->estimated_price, 0, ',','.');?></td>
        <td><a href="<?= $w->reference_link; ?>">Link Marketplace</a></td>        
        <td><?= $w->status . '<br>' . ( !empty($w->guest_id) ? 'Booked by ' . $w->name : ''); ?></td>        
        <td>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <a href="<?= base_url('wishlist/hide/'.$w->id); ?>" type="button" class="btn btn-warning" style="width: 6em"><?= ($w->status == 'hidden' ? 'Show':'Hide');?></a>
            <a onclick="return confirm('Delete this item?')" href="<?= base_url('wishlist/delete/'.$w->id); ?>" type="button" class="btn btn-danger" style="width: 6em">Delete</a>
            </div>            
            
        </td>
        </tr>
        <?php
            endforeach;
        endif;
        ?>
    </tbody>
    </table>        
    
    </main>
  </div>
</div>

<?= view('admin/templates/footer'); ?>