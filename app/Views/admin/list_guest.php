<?= view('admin/templates/header'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $page_name; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <a type="button" class="btn btn-primary" href="<?= base_url('guest/new'); ?>"><i class="bi bi-plus"></i> Add New</a>
        </div>
      </div>

    <table class="table" id="guestTable">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Pengundang</th>
        <th scope="col">Kehadiran</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($guests):
            $i = 1;
            foreach($guests as $g):
        ?>
        <tr>
        <th scope="row"><?= $i++; ?></th>
        <td><?= $g->title . ' ' . $g->name; ?></td>
        <td><?= $g->address; ?></td>
        <td><?= ($g->invited_by == 'Groom' ? 'Mempelai Pria':'Mempelai Wanita'); ?></td>
        <td><?= ($g->is_attending == 0 & $g->attendee == 0 ? '-' : ($g->is_attending == 1 ? 'Hadir' : 'Tidak')); ?></td>
        <td>
            <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Action
                </button>
                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="<?= base_url('guest/'.$g->id.'/edit'); ?>">View</a></li>
                    <li><button class="dropdown-item copy-link" data-invitation-code="<?= $g->invitation_code;?>">Copy Link</button></li>
                    <li><button class="dropdown-item copy-invitation" data-invitation-code="<?= $g->invitation_code;?>">Copy Invitation Text</button></li>
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

    $('.copy-link').on('click', function(){
        let invitationCode = $(this).data('invitation-code');
        let link = `<?= base_url(); ?>/${invitationCode}`;
        navigator.clipboard.writeText(link);

        /* Alert the copied text */
        Swal.fire({
            title: 'Link Copied!',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        })        
    });

    $('.copy-invitation').on('click', function() {
        let invitationCode = $(this).data('invitation-code');
        let invitationText = 
        `Bismillahirrahmanirrahiim,
Assalamu'alaikum wa rahmatullah wa barakaatuh,

<?= base_url(); ?>/${invitationCode}

Sehubungan dengan kondisi pandemi Covid-19 serta adanya pembatasan sosial, acara akad nikah hanya dihadiri oleh keluarga inti yang sangat terbatas. Kami mohon maaf tidak dapat mengundang Bapak/Ibu/Rekan-rekan secara langsung. Merupakan kebahagiaan bagi kami apabila Bapak/Ibu/Rekan-rekan berkenan meberikan doa restu dan menyaksikan akad nikah kami melalui Instagram Live Streaming. 

Kami memohon doa dan restu Bapak/Ibu agar pernikahan kami berlangsung dengan lancar. Terima kasih. Wassalamu'alaikum wa rahmatullah wa barakaatuh.

Salam Takzim,
Niken & Aya`;

        navigator.clipboard.writeText(invitationText);

        /* Alert the copied text */
        Swal.fire({
            title: 'Invitation Text Copied!',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        })
    }
    );

} );
</script>