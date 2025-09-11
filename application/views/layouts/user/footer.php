 <footer>
     <div class="footer clearfix mb-0 text-muted">
         <div class="d-flex flex-column justify-content-center align-items-center">
             <p>Copyright &copy; Perpustakaan Rinolidati. All right reserve</p>
             <p class="timestamp">WAKTU AKSES: <span id="current-time"></span></p>
         </div>
     </div>
 </footer>
 </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.all.min.js"></script>
 <script>
     function updateTime() {
         const now = new Date();
         const options = {
             hour: '2-digit',
             minute: '2-digit',
             second: '2-digit'
         };
         document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID', options);
     }
     setInterval(updateTime, 1000);
     updateTime(); 
 </script>
 <script>
     $(document).ready(function() {
         const login = "<?= $this->session->flashdata('login_berhasil'); ?>";

         if (login) {
             Swal.fire({
                 title: 'Login Sukses!',
                 text: login,
                 icon: 'success',
                 confirmButtonText: 'OK'
             });
         }
     });
 </script>
 <script>
     $(document).ready(function() {
         const successMessage = "<?= $this->session->flashdata('success'); ?>";

         if (successMessage) {
             Swal.fire({
                 title: 'Berhasil!',
                 text: successMessage,
                 icon: 'success',
                 confirmButtonText: 'OK'
             });
         }
     });
 </script>
 <script>
     $(document).ready(function() {
         const errorMessage = "<?= $this->session->flashdata('error'); ?>";

         if (errorMessage) {
             Swal.fire({
                 title: 'Error!',
                 html: errorMessage,
                 icon: 'error',
                 confirmButtonText: 'OK'
             });
         }
     });
 </script>

 <script src="<?= base_url(); ?>assets/admin/js/feather-icons/feather.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/js/app.js"></script>

 <script src="<?= base_url(); ?>assets/admin/vendors/chartjs/Chart.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/vendors/apexcharts/apexcharts.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/js/pages/dashboard.js"></script>
 <script src="<?= base_url(); ?>assets/home/vendor/isotope-layout/isotope.pkgd.min.js"></script>

 <script src="<?= base_url(); ?>assets/admin/js/main.js"></script>
 
 </body>

 </html>