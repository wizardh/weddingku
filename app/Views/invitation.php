<?= view('templates/header'); ?>
<?php 
    $day = date("l", strtotime($wedding_date));
    $month = date("F", strtotime($wedding_date));
    $tanggal = date("j", strtotime($wedding_date));
    $hari = day_to_hari($day);
    $bulan = month_to_bulan($month);
?>

<div class="pt-auto pb-4 my-auto text-center" style="padding-top: 80px;" id="acara">
    <div class="mt-4" style="font-family: 'Playfair Display', serif;">
        <h4 class="lead">The wedding of</h4>
        <h1 class="display-4 fw-bold"><i>Niken & Aya</i></h1>
        <h4 class="lead"><?= date("F jS, Y", strtotime($wedding_date));?></h4>
    </div>

    <div class="col-lg-6 mx-auto px-4 pt-4 mt-4 mb-4">
      <p class="lead">Undangan Kepada</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <div class="card">
            <div class="lead card-body">
                <?= $guest->name; ?>
            </div>
        </div>
      </div>
    </div>
</div>

<!-- BRIDE & GROOM -->
<div class="bg-secondary text-white px-4 py-4 text-center">
    <div class="py-4">
      <div class="col-lg-10 mx-auto">
        <figure>
            <p>"Dan di antara tanda-tanda kekuasaan-Nya ialah diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu mendapat ketenangan hati, dan dijadikan-Nya rasa kasih sayang di antara kamu. Sesungguhnya yang demikian menjadi tanda-tanda kebesaran-Nya bagi orang-orang yang berpikir."</p>
            <figcaption class="blockquote-footer text-white">
            (QS. Ar-Ruum: 21)
            </figcaption>
        </figure>      
      </div>
      <hr class="featurette-divider">
      <div class="row" style="font-family: 'Playfair Display', serif;">      
      <div class="col-lg-5">
        <img class="bd-placeholder-img rounded-circle" width="180" height="180" src="<?= base_url('assets/images/youngwoman_38.png'); ?>" aria-label="Bride Pic" preserveAspectRatio="xMidYMid slice" focusable="false">
            <h2><i>Niken Paramita</i></h2>
            <p>Putri dari Bpk. Andri Amir (Alm.) & Ibu Asih</p>
        </div><!-- /.col-lg-6 -->      
        <div class="col-lg-2 align-self-center">
            <div class="display-1">&</div>
        </div>
        <div class="col-lg-5">
            <img class="bd-placeholder-img rounded-circle" width="180" height="180" src="<?= base_url('assets/images/youngman_34.png'); ?>" aria-label="Groom Pic" preserveAspectRatio="xMidYMid slice" focusable="false">
            <h2><i>M. N. Adhi Wiradharma (Aya)</i></h2>
            <p>Putra dari Bpk. Ir. Slamet A. Wirawan & Ibu Ira Puspasari (Alm.)</p>
        </div><!-- /.col-lg-6 -->
      </div>
    </div>
</div>
<!-- /BRIDE & GROOM -->

<!-- COUNTDOWN -->
<div class="container px-4 py-4 text-center" id="counter-cards">
    <h2 class="pb-2" style="font-family: 'Playfair Display', serif;">Mark the Date!</h2>
    <h4 class="lead"><?= "{$hari}, {$tanggal} {$bulan} " . date("Y", strtotime($wedding_date));?></h4>

    <div class="row row-cols-4 row-cols-lg-4 align-items-stretch g-4 py-4">
        <div class="col-lg-3">
            <div class="card bg-secondary text-white">
                <div class="card-body display-6 px-0" id="days">                    
                </div>
                <div class="card-subtitle mb-2">hari</div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-secondary text-white">
                <div class="card-body display-6 px-0" id="hours">
                </div>
                <div class="card-subtitle mb-2">jam</div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-secondary text-white">
                <div class="card-body display-6 px-0" id="minutes">                    
                </div>
                <div class="card-subtitle mb-2">menit</div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card bg-secondary text-white">
                <div class="card-body display-6 px-0" id="seconds">                    
                </div>
                <div class="card-subtitle mb-2">detik</div>
            </div>
        </div>

    </div>
</div>
<!-- /COUNTDOWN -->

<!-- AKAD DAN LOKASI -->
<div class="bg-secondary text-white px-4 py-4 text-center" id="lokasi">
    <h2 class="pb-2 border-bottom" style="font-family: 'Playfair Display', serif;">Akad</h2>
    <div class="py-2">
      <div class="col-lg-12 mx-auto">
          <p><?= "{$hari}, {$tanggal} {$bulan} " . date("Y", strtotime($akad_date)); ?></p>
          <p>Pukul <?= $akad_time; ?></p>
          <p><?= $wedding_address; ?></p>
      </div>
    </div>

    <h2 class="pb-2 border-bottom" style="font-family: 'Playfair Display', serif;">Resepsi</h2>
    <div class="py-2">
      <div class="col-lg-12 mx-auto">
          <p><?= "{$hari}, {$tanggal} {$bulan} " . date("Y", strtotime($wedding_date)); ?></p>
          <p>Pukul <?= $wedding_time; ?></p>
          <p><?= $wedding_address; ?></p>
      </div>

      <div class="col-lg-12 mx-auto pb-4 ">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15865.124865820308!2d106.87684175000001!3d-6.226605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f53ae0e3ca29%3A0xfba9636463a1ce8b!2sIS%20PLAZA%20BALLROOM!5e0!3m2!1sen!2sid!4v1647143521553!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>

    <div class="col-lg-6 mx-auto border-bottom">
      <p class="lead mb-4">Merupakan suatu kehormatan dan kebahagian bagi kami apabila rekan-rekan dan sahabat berkenan hadir dan memberikan doa restu untuk pernikahan kami.</p>
    </div>
      <br>
    <div class="col-lg-6 mx-auto text-start">
      <p>Sebagai bentuk pencegahan terhadap persebaran wabah COVID 19. Dalam menghadiri penyelenggaraan pernikahan kami, diwajibkan untuk mematuhi Protokol Kesehatan yaitu: </p>
    </div>
    <div class="col-lg-4 mx-auto">
        <ul class="text-start">
          <li>Tamu undangan wajib memakai masker</li>
          <li>Hindari /Tidak berjabat tangan baik dengan mempelai ataupun tamu undangan lain</li>
          <li>Mencuci tangan menggunakan sabun/hand sanitizer yang telah disediakan</li>
          <li>Tidak berkerumun dan saling menjaga jarak sesama tamu undangan (social distancing)</li>
          <li>Tidak membawa anak kecil dibawah 5 tahun</li>
          <li>Menghadiri undangan pernikahan maksimal dua orang</li>
        </ul>
    </div>
</div>
<!-- /AKAD DAN LOKASI -->

<!-- KONFIRMASI -->
<div class="container px-4 py-4 text-center" id="buku-tamu">
    <h2 class="pb-2" style="font-family: 'Playfair Display', serif;">Konfirmasi Kehadiran</h2>
    <div class="col-md-5 mx-auto justify-content-sm-center">
        <div class="card">
            <div class="card-body">
            <div class="form-floating mb-3">
                <select class="form-select" aria-label="kehadiran">
                    <option value="">- - -</option>
                    <option value="0">Tidak Hadir</option>
                    <option value="1" <?= ($guest->is_attending ? 'selected':'');?>)>Hadir</option>
                </select>                
                <label for="floatingInput">Kehadiran</label>
              </div>

              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="jumlah" value="<?= $guest->attendee; ?>">
                <label for="floatingInput">Jumlah yang Hadir</label>
              </div>
              <div class="form-floating mb-3">
                <button class="btn btn-outline-secondary" id="konfirmasi">Konfirmasi</button>
              </div>
            
            </div>
        </div>
    </div>

</div>
<!-- /KONFIRMASI -->

<!-- BUKU TAMU -->
<div class="bg-secondary text-white px-4 py-4 text-center">
    <h2 class="pb-2 border-bottom" style="font-family: 'Playfair Display', serif;">Buku Tamu</h2>
    <div class="col-md-6 mx-auto justify-content-sm-center">
        <div class="card" style="height: 360px;">
            <div class="card-body" id="comment-card" style="overflow-y: auto; max-height: 360px;">
            <?php
            if($guestbook):
                foreach($guestbook as $u): 
            ?>
            <figure>
                <blockquote class="blockquote text-black">
                    <p><?= $u->message; ?></p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    <?= $u->name; ?> <cite title="Source Title"><?= $u->created_at; ?></cite>
                </figcaption>
            </figure>             
            <?php 
                endforeach; 
            endif;

            if($private_guestbook):
                foreach($private_guestbook as $pg): 
            ?>
            <figure>
                <blockquote class="blockquote text-black">
                    <p><?= $pg->message; ?></p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    <?= $pg->name; ?> <cite title="Source Title">Private (Unpublished)</cite>
                </figcaption>
            </figure>             
            <?php 
                endforeach; 
            endif;
            ?>

            </div>
        </div>
    </div>    
</div>
<!-- /BUKU TAMU -->

<!-- FORM BUKU TAMU -->
<div class="container px-4 py-4 text-center" id="confirm-card">
    <h2 class="pb-2" style="font-family: 'Playfair Display', serif;">Kirimkan Pesan</h2>
    <div class="col-md-5 mx-auto justify-content-sm-center">
        <div class="card">
            <div class="card-body">
              <div class="mb-3">                  
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-floating mb-3">
                <button class="btn btn-outline-secondary" id="kirim-pesan" data-guest-id="<?= $guest->id; ?>">Kirim</button>
              </div>
            
            </div>
        </div>
    </div>

</div>
<!-- /FORM BUKU TAMU -->

<!-- QR -->
<div class="bg-secondary text-white px-4 py-4 text-center">
    <h2 class="pb-2 border-bottom" style="font-family: 'Playfair Display', serif;">Om, Minta Duit</h2>
    <div class="col-md-6 mx-auto justify-content-sm-center">
        <div class="col-md-5 mx-auto justify-content-sm-center">
            <div class="card px-0 py-0">
                <div class="card-body">
                <img width="320" src="<?= base_url('assets/images/QRku_Niken.JPG'); ?>" aria-label="Tali Asih" preserveAspectRatio="xMidYMid slice" focusable="true">
                </div>
            </div>
        </div>
    </div>    
</div>
<!-- /BUKU TAMU -->

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
<!-- widget for music player goes here -->
</div>


<?= view('templates/footer'); ?>
<script type="text/javascript">
$(document).ready( function () {
    
    $('#kirim-pesan').on('click', function(){
        let guest_id = $(this).data('guest-id');
        let message = $('#message').val();

        Swal.fire({
            title: 'Kirimkan pesan?',
            showCancelButton: true,
            confirmButtonText: 'Kirim',
            cancelButtonText: 'Batal',
            // text: 'Pesan Anda akan segera tampil di halaman ini',
            }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    url: `<?= base_url(); ?>/guestbook/create/`,
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    type: 'POST',
                    dataType: 'json',
                    data: { guest_id:guest_id, message:message },             
                    success: function(data) {
                        Swal.fire('Pesan telah dikirim!', '', 'success');

                        message_html = 
                            `<figure><blockquote class="blockquote text-black"><p>${message}</p></blockquote><figcaption class="blockquote-footer"><?= $guest->name; ?><cite title="Source Title">Private (Unpublished)</cite></figcaption></figure>`;
                        $('#comment-card').append(message_html);
                        $('#message').val('');
                    }
                });

            }
        });
        
    });    
});

// Set the date we're counting down to
let countDownDate = new Date("<?= $wedding_date;?>").getTime();

// Update the count down every 1 second
let x = setInterval(function() {

    // Get today's date and time
    let now = new Date().getTime();

    // Find the distance between now and the count down date
    let distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    $("#days").html(days); 
    $("#hours").html(hours); 
    $("#minutes").html(minutes);
    $("#seconds").html(seconds);

    // If the count down is finished, write some text
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>