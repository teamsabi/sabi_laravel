<script src="{{ asset('template user/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/slick.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('template user/assets/js/gijgo.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.barfiller.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/hover-direction-snake.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/contact.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('template user/assets/js/mail-script.js') }}"></script>
<script src="{{ asset('template user/assets/js/jquery.ajaxchimp.min.js') }}"></script>	
<script src="{{ asset('template user/assets/js/plugins.js') }}"></script>
<script src="{{ asset('template user/assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Script agar tombol isi input otomatis -->
<script>
    document.querySelectorAll('.btn-nominal').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // agar tidak reload
            const nominal = this.getAttribute('data-nominal');
            document.getElementById('nominal').value = nominal;
        });
    });
</script>

<!-- Script untuk rupiah -->
<script>
    const nominalInput = document.getElementById('nominal');

    nominalInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, ''); // hapus semua karakter non-angka
        value = new Intl.NumberFormat('id-ID').format(value);
        e.target.value = value;
    });
</script>

<!-- Script untuk btn pilih nominal -->
<script>
    const btnNominals = document.querySelectorAll('.btn-nominal');

    btnNominals.forEach(btn => {
        btn.addEventListener('click', function () {
            // Reset semua tombol ke style awal
            btnNominals.forEach(b => {
                b.style.backgroundColor = 'white';
                b.style.color = 'rgba(0, 0, 0, 0.7)';
                b.style.border = '1px solid #ccc';
            });

            // Set style tombol yang dipilih
            this.style.backgroundColor = '#007bff';
            this.style.color = 'white';
            this.style.border = '1px solid #007bff';

            // (Opsional) Masukkan nilai ke input
            const nominalValue = this.dataset.nominal;
            document.getElementById('nominal').value = new Intl.NumberFormat('id-ID').format(nominalValue);
        });
    });
</script>

<!-- Script box centang  -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkbox = document.getElementById("anon-checkbox");
        checkbox.addEventListener("change", function () {
            if (this.checked) {
                this.style.backgroundColor = "#ccc";
                this.style.backgroundImage = "url('data:image/svg+xml;utf8,<svg fill=\"%23007bff\" viewBox=\"0 0 16 16\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M13.854 3.146a.5.5 0 0 1 0 .708l-7.5 7.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6 10.293l7.146-7.147a.5.5 0 0 1 .708 0z\"/></svg>')";
                this.style.backgroundRepeat = "no-repeat";
                this.style.backgroundPosition = "center";
                this.style.backgroundSize = "12px";
            } else {
                this.style.backgroundImage = "none";
            }
        });
    });
</script>
