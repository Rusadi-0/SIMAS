    <!-- <div class="mt-5"></div> -->
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    © <?= date("Y", time()) ?> by <strong><a href="https://github.com/rusadi-0/"></a>Hadi Rusadi</strong>.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <!-- jQuery  -->
    <!-- <script src="<?= base_url('assets/'); ?>/js/jquery.min.js"></script> -->
    <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/modernizr.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/detect.js"></script>
    <script src="<?= base_url('assets/'); ?>js/fastclick.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.slimscroll.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.blockUI.js"></script>
    <script src="<?= base_url('assets/'); ?>js/waves.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.nicescroll.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.scrollTo.min.js"></script>

    <script src="<?= base_url('assets/'); ?>plugins/skycons/skycons.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/raphael/raphael-min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/morris/morris.min.js"></script>

    <script src="<?= base_url('assets/'); ?>pages/dashborad.js"></script>

    <!-- Alertify js -->
    <script src="<?= base_url('assets/'); ?>plugins/alertify/js/alertify.js"></script>
    <script src="<?= base_url('assets/'); ?>pages/alertify-init.js"></script>

    <!-- Dropzone js -->
    <script src="<?= base_url('assets/'); ?>plugins/dropzone/dist/dropzone.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/dropify/js/dropify.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url('assets/'); ?>js/app.js"></script>
    <script>
        function oh() {
            document.getElementById('jah').innerHTML = `<i class='jak fa fa-spin fa-spinner'></i> Simpan`;

            window.setTimeout(function() {
                $("#jah").fadeTo(10, 0).slideUp(10, function() {
                    $(this).remove();
                    document.getElementById('jahh').innerHTML = `<button type="submit" id="jah" onclick="oh()" disabled class="btn btn-primary mt-2" class="btn btn-primary mt-2"><i class='jak fa fa-spin fa-spinner'></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary mt-2">Reset</button>`
                });
            }, 1);
            window.setTimeout(function() {
                $("#jah").fadeTo(10, 0).slideUp(10, function() {
                    $(this).remove();
                    document.getElementById('jahh').innerHTML = `<button type="submit" id="jah" onclick="oh()" class="btn btn-primary mt-2" class="btn btn-primary mt-2"><i class='mdi mdi-content-save'></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary mt-2">Reset</button>`
                });
            }, 5000);
        }
        /* BEGIN SVG WEATHER ICON */
        if (typeof Skycons !== 'undefined') {
            var icons = new Skycons({
                    "color": "#fff"
                }, {
                    "resizeClear": true
                }),
                list = [
                    "clear-day", "clear-night", "partly-cloudy-day",
                    "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                    "fog"
                ],
                i;

            for (i = list.length; i--;)
                icons.set(list[i], list[i]);
            icons.play();
        };

        // scroll

        $(document).ready(function() {

            $("#boxscroll").niceScroll({
                cursorborder: "",
                cursorcolor: "#cecece",
                boxzoom: true
            });
            $("#boxscroll2").niceScroll({
                cursorborder: "",
                cursorcolor: "#cecece",
                boxzoom: true
            });

        });

        $(document).ready(function() {
            $('#table_id').DataTable();
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });



        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('Administrator/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('Administrator/roleaccess/'); ?>" + roleId;
                }
            });

        });

        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        window.setTimeout(function() {
            $(".alert").fadeTo(300, 0).slideUp(300, function() {
                $(this).remove();
            });
        }, 7000);

        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
    </body>

    </html>