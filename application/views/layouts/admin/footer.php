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
     updateTime(); // Initial call
 </script>
 <script src="<?= base_url(); ?>assets/admin/js/feather-icons/feather.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/js/app.js"></script>

 <script src="<?= base_url(); ?>assets/admin/vendors/chartjs/Chart.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/vendors/apexcharts/apexcharts.min.js"></script>
 <script src="<?= base_url(); ?>assets/admin/js/pages/dashboard.js"></script>

 <script src="<?= base_url(); ?>assets/admin/js/main.js"></script>
 </body>

 </html>