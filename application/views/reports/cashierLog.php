<div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
        <h2 class="page-header"><i class="fa fa-money fa-fw"></i> Cashier Log Record</h2>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-12" style="margin-bottom: 5px;height: 65px;">
          <div class="col-lg-6">
            <button id="btnPrint" class="btn btn-default pull pull-left" style="margin-top: 15px;"><i class="fa fa-plus"></i> Print Record</button>
          </div>
          <div class="col-lg-6">
              <!-- <div class="messages" ></div> -->
              <div class="alert alert-success" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
              <div class="alert alert-danger" style="display:none;"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          </div>
      </div>
      <div class="col-lg-12">
        <table class="table table-striped table-bordered table-hover" id="cashierlogin">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Employee</th>
                    <th>Log-in Time</th>
                    <th>Log-out Time</th>
                    <th>Opening Cash</th>
                    <th>Closing Cash</th>
                    <th>Total Deposits</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
      </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <form id="myForm">
	      <div class="modal-body">
	      		<div class="row">
	      			<div class="col-md-6 col-md-offset-3">
	      				<input type="hidden" name="id" value="0" >
                <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money fa-fx"> Opening</i></span>
                    <input class="form-control" placeholder="OPENING CASH" name="op_money" type="text" required autofucos />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1"><i class="fa fa-money fa-fx"></i> Closing</span>
                      <input type="text" name="closingCash" class="form-control" placeholder="Closing Cash" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="">Select</option>
                        <option value="open">Open</option>
                        <option value="close">Close</option>
                    </select>
                </div>
					</div>
				</div>
	      </div>
      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="printModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>

          <div class="modal-body">
            <div class="row">
            <form id="printForm" action="" method="post">
                <div class="col-md-4">
                    <fieldset>
                        <legend>Employee</legend>
                        <div class="form-group">
                            <select class="form-control" id="employee2" name="employee2" required>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <fieldset>
                        <legend>Record Month</legend>
                        <div class="form-group">
                            <select class="form-control" id="mon2" name="mon2" required>
                                <option value="">Select</option>
                                <?php
                                    $mon = date('m');
                                    $months = array('01' => 'January', '02' => 'Febuary', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
                                    foreach ($months as $key => $value) {
                                        if ($mon == $key) {
                                ?>
                                    <option value="<?php echo $key?>" selected><?php echo $value?></option>
                                <?php
                                        }else{
                                ?>
                                    <option value="<?php echo $key?>"><?php echo $value?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-4">
                    <fieldset>
                        <legend>Record Year</legend>
                        <div class="form-group">
                            <input type="text" class="form-control" id="year" name="year" value="<?php echo date('Y')?>" required autofocus />
                        </div>
                    </fieldset>
                </div>
            </form>
            </div>
          </div>

      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="conPrint" class="btn btn-primary">Print File</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var attendTable;
    $(document).ready(function() {
        showEmployee();
        showOTType();
        setInterval(function(){
            logTable.ajax.reload(null, false);
        },3000);
        // Setup - add a text input to each footer cell
        $('#cashierlogin thead th').each( function () {
            var title = $(this).text();
            $(this).html( '<input style="width:100%;font-size:12px;" type="text" placeholder="'+title+'" />' );
        } );

        logTable = $("#cashierlogin").DataTable({
            'processing':true,
            'serverside':true,
            'ajax': {
                "url": "<?php echo site_url('admin/fetchCashierLog')?>",
                "type": "POST"
            },
            "dom": '<"top"l>rt<"bottom"ip><"clear">',
            'bProcessing': false,
            "scrollY":        "190px",
            "scrollCollapse": true,
            "paging":         true
        });

        // Apply the search
        logTable.columns().every( function () {
            var that = this;

            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        //add new function
        $('#btnAdd').click(function(){
            $('#myForm')[0].reset();
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text("Punch-In");
            $('#myForm').attr('action','<?php echo base_url("admin/add_EmpAttend")?>');
        });

        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            $.ajax({
                type:'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                    var error = response.error;
                    var type = response.type;
                    if (response.success) {
                        $('#myForm')[0].reset();
                        $('.alert-success').html(type + ' added overtime.').fadeIn().delay(2000).fadeOut('slow');
                            attendTable.ajax.reload(null, false);
                            if (type == "Update") {$('#myModal').modal('hide');}
                    }else{
                        $('#myModal').modal('hide');
                        var error = response.error;
                        $('.alert-danger').html(type + ' ' + error).fadeIn().delay(2000).fadeOut('slow');
                    }
                },
                error: function(){
                    $('.alert-danger').html('Unable to add record.').fadeIn().delay(2000).fadeOut('slow');
                    $('#myModal').modal('hide');
                }
            });
        });

        //edit
        $('#cashierlogin').on('click','.item-edit',function(){
            var id =  $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Log');
            $('#myForm').attr('action','<?php echo base_url("admin/updateCashierlog")?>');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url("admin/editCashierlog")?>',
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function(data){
                    $('input[name=id]').val(data.logid);
                    $('input[name=op_money]').val(data.opening_cash);
                    $('input[name=closingCash]').val(data.closing_cash);
                    $('select[name=status]').val(data.log_status);
                },
                error: function(){
                    $('.alert-danger').html('Unable load data from server.').fadeIn().delay(2000).fadeOut('slow');
                }
            });
        });

        $('#cashierlogin').on('click','.item-delete',function(){
            var id =  $(this).attr('data');
            $('#deleteModal').modal('show');
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async:true,
                    url: '<?php echo base_url("admin/deleteCashierlog")?>',
                    data: {id: id},
                    dataType: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Successfully deleted Cashier Log.').fadeIn().delay(1000).fadeOut('slow');
                            attendTable.ajax.reload(null, false);
                        }else{
                            $('.alert-danger').html('Unable to delete Cashier Log.').fadeIn().delay(2000).fadeOut('slow');
                        }
                    },
                    error: function(){
                        $('.alert-danger').html('Unable to server.').fadeIn().delay(2000).fadeOut('slow');
                    }
                });
            });
        });
    });

    $('#btnPrint').click(function(){
            $('#printForm')[0].reset();
            $('#printModal').modal('show');
            $('#printModal').find('.modal-title').text("Print Cashier Log");
            $('#printForm').attr('action','<?php echo base_url("admin/")?>');
    });

    $('#conPrint').click(function(){
        /*var link =  $(this).attr('data');
        window.open(link,"newwindow", "width=1200, height=800");*/
         var month = $('select[name=mon2]');
        var emp = $('select[name=employee2]');
        var year = $('input[name=year]');
        var url = '<?php echo base_url('admin/printCahierLog')?>/'  + month.val() + '/' + year.val() + '/' + emp.val();
        window.open(url,"newwindow", "width=900, height=600");
    });
    function showEmployee(){
        $.ajax({
            url:'<?php echo base_url("admin/fetchEmp")?>',
            async:false,
            dataType:'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++) {
                    var name = data[i].emp_fname+ ' ' +data[i].emp_mname+ ' '+data[i].emp_lname;
                    html +='<option value="'+data[i].emp_id+'">'+ name +'</option>';
                }
                $('#employee').html(html);
                $('#employee2').html(html);
            },
            error: function(){
                $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    }

    function showOTType(){
        $.ajax({
            url:'<?php echo base_url("admin/fetchOtType")?>',
            async:false,
            dataType:'json',
            success: function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++) {
                    html +='<option value="'+data[i].ot_type_id+'">'+ data[i].ot_type_name +'</option>';
                }
                $('#ot_type').html(html);
            },
            error: function(){
                $('.alert-danger').html('Server error. Unable to retrieve data.').fadeIn().delay(2000).fadeOut('slow');
            }
        });
    }

</script>