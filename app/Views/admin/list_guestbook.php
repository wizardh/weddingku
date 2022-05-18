<?= view('admin/templates/header'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $page_name; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

    <table class="table" id="guestTable">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Pesan</th>
        <th scope="col">Timestamp</th>
        <th scope="col">Visibility</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($guestbooks):
            $i = 1;
            foreach($guestbooks as $g):
        ?>
        <tr>
        <th scope="row"><?= $i++; ?></th>
        <td>
            <?php if( !empty($g->guest_id) ): ?>
            <a class="text-dark" href="<?= base_url('guest/'.$g->guest_id.'/edit'); ?>"><?= $g->title . ' ' . $g->name; ?></a>
            <?php else: ?>
                <?= $g->guest_name . ' - ' . $g->guest_relation; ?>
            <?php endif; ?>
        </td>
        <td><?= $g->message; ?></td>
        <td><?= $g->created_at; ?><sub><br>IP: <?= $g->ip_address; ?></sub></td>
        <td id="visibility-<?= $g->id; ?>"><?= ($g->approved ? 'Public':'Private'); ?></td>
        <td>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><button class="dropdown-item set-public" data-id="<?= $g->id;?>">Set to Public</button></li>
                    <li><button class="dropdown-item set-private" data-id="<?= $g->id;?>">Set to Private</button></li>
                </ul>
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
<script type="text/javascript">
$(document).ready( function () {
    $('#guestTable').DataTable();

    $('.set-public').on('click', function(){
        let id = $(this).data('id');
        let approved = 1;
        let approved_by = '<?= session('user_type');?>';
        console.log(id);

        // ajax to set public (approved = 1)
        $.ajax({
            url: `<?= base_url(); ?>/guestbook/update/` + id,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'POST',
            dataType: 'json',
            data: { approved:approved, approved_by:approved_by },             
            success: function(data) {
                console.log(data);
                $('#visibility-'+id).html('Public');
                /* Alert the copied text */
                Swal.fire({
                    title: `Message's visibility set to public!`,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });  
            }
        });        
    });

    $('.set-private').on('click', function(){
        let id = $(this).data('id');
        let approved = 0;
        let approved_by = 'Groom';
        console.log(id);

        // ajax to set private (approved = 0)
        $.ajax({
            url: `<?= base_url(); ?>/guestbook/update/` + id,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'POST',
            dataType: 'json',
            data: { approved:approved, approved_by:approved_by },             
            success: function(data) {
                console.log(data);
                $('#visibility-'+id).html('Private');
                /* Alert the copied text */
                Swal.fire({
                    title: `Message's visibility set to Private!`,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });  
            }
        });             
    });

} );
</script>