
          </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-right">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <?= lang('footer');?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modalContent"></div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalPayResum" style="padding-top: 82px;padding-left: 52px!important;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg modalContent">
        <div class="modal-content">
            <div class="modal-header">
                <img src="<?= $this->load->assets('images/logo.png');?>" style="max-height: 1.8em;max-width: 40%;"/>
                <span class="text-right" style="position: absolute;right: 55px;">Realizar pago</span>
            </div>
            <div class="modal-body text-center" style="font-size:1.4em">
                <span class="text-center">RESUMEN DEL PAGO:</span>
                <br><br><form id="frmresumen">
                    
                </form><br>
                <div class="col-md-3"></div>
                <div class="bg-dark col-md-6" style="color: white;">TOTAL: <span id='sp_total'></span></div>
                <div class="col-md-3"></div>
                <div class="clearfix clear-fix"></div>
      
                <div class="col-md-3"></div>
                <div class="bg-dark col-md-6 dv-recibido" style="color: white;display:none;">RECIBIDO: <span id='sp_recibido'></span></div>
                <div class="col-md-3"></div>
                <div class="clearfix clear-fix"></div>

                <div class="col-md-3"></div>
                <div class="bg-dark col-md-6 dv-devuelta" style="color: white;display:none;">DEVUELTA: <span id='sp_devuelta'></span></div>
                <div class="col-md-3"></div>
                

            </div>
            <div class="modal-footer">
                <button type="button" class="col-xs-6 btn btn-primary btn-lg btn-block" data-dismiss="modal">Cancelar</button>
                <button type="button" class="col-xs-6 mb-2 mr-2 btn btn-primary btn-lg btn-block btn-process" onclick="processPayment(event)"><i class="pe-7s-gleam"></i>&nbsp; PROCESAR PAGO</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $this->load->assets('scripts/main.js');?>"></script>
</body>
<script src="<?php echo $this->load->assets("js/jquery-2.1.1.js"); ?>"></script>
<script src="<?php echo $this->load->assets("js/bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/fullcalendar/moment.min.js"); ?>"></script>
<script src="<?php echo $this->load->assets("js/plugins/jquery-ui/jquery-ui.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/main/main.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/jqueryMask/jquery.mask.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/dataTables/datatables.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/validate/jquery.validate.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/select2/select2.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/semantic/semantic.min.js"); ?>"></script>

<script type="text/javascript" src="<?php echo $this->load->assets('js/views/clientes.js'); ?>"></script>
<script type="text/javascript"  src="<?php echo $this->load->assets('js/views/prestamos.js?t=14'); ?>"></script>
<script src="<?php echo $this->load->assets('js/views/cobros.js'); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/fullcalendar/fullcalendar.min.js"); ?>"></script>
<!-- <script src="<?php echo $this->load->assets('js/ui-sweetalert.min.js');?>" type="text/javascript"></script> -->
<script src="<?php echo $this->load->assets('js/sweetalert.min.js?t=1');?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->load->assets('js/fileinput.js');?>"></script>
<script src="<?php echo $this->load->assets('js/plugins/js.cookie.min.js');?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/iCheck/icheck.min.js"); ?>"></script>
<script src="<?= $this->load->assets('js/plugins/dataTables/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= $this->load->assets('js/plugins/highcharts/highcharts.js'); ?>"></script>
<script src="<?php echo $this->load->assets('js/plugins/dataTables/dataTables.buttons.min.js');?>"></script>
<script src="<?php echo $this->load->assets('js/plugins/dataTables/jszip.min.js');?>"></script>
<script src="<?php echo $this->load->assets('js/plugins/dataTables/buttons.html5.min.js');?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/bootstrap_plugins.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/datapicker/bootstrap-datepicker.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/boostrapDialog/bootstrap-dialog.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/intro/intro.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo $this->load->assets("js/plugins/toast/toast.min.js"); ?>"></script>
</html>
<script type="text/javascript">
Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))), 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
 var site_url = "<?= base_url('index.php');?>";
 var admin_url = "<?= base_url('index.php');?>";
 toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "3000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

window.swal = function(x,y,z){
    //swal("Correcto!", a.msg, "success")
    Swal.fire(x, y, z);
}

$(document).ready(function () {
    $('.elem').click(function (e) {
        e.preventDefault();
        $('.menu-content').removeClass('visibleMenuItem');
        var menuItem = $(this).attr('id');
        $(this).siblings('.blue').removeClass('blue');
        $(this).addClass('blue');
        $('#' + menuItem + '-menu').addClass('visibleMenuItem');
    });
});
</script>