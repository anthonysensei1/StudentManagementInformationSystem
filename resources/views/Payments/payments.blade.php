@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="division">
               <div class="lsf">
                  <div class="lsf_label" id="lsfLabel">
                     List of Student Fees
                  </div>
               </div>
               <div class="btn_list">
                  <div class="buttons">
                     <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#add" id="addNew">
                        <i class="fas fa-plus"></i>
                        Add New
                     </button>
                  </div>
                  <div class="buttons">
                     <button class="btn btn-outline-success btn-md mt-2 mb-2" onclick="toggleTables(this)">Grade Level & Fees</button>
                  </div>
                  <div class="buttons">
                     <button class="btn btn-outline-success btn-md mt-2 mb-2" onclick="toggleTables(this)">Payments</button>
                  </div>
                  <a href="#" class="gotoMainTable" style="display: none;">Go back to MainTable</a>
               </div>
            </div>
            <!-- MainTableArea -->
            <table class="table table-bordered table-striped mt-2" id="mainTable">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>ID No.</th>
                        <th>LRN</th>
                        <th>Fullname</th>
                        <th>Payable Fee</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                           <button class="btn btn-outline-warning btn-md text-dark" data-toggle="modal" data-id="" data-target="#viewData">
                              <i class="fas fa-eye"></i>
                              view
                           </button>
                           <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#update">
                              <i class="fas fa-pen"></i>
                              update
                           </button>
                           <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteEntry">
                              <i class="fas fa-trash"></i>
                              delete
                           </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- EndMainTable -->

            <!-- GradeLevelandFeesTableArea -->
            <div class="buttons" id="newEntryButton" style="display: none;">
               <button class="btn btn-outline-success mt-2 mb-2" data-toggle="modal" data-target="#newEntry">
                  <i class="fas fa-plus"></i>
                  New Entry
               </button>
            </div>
            <table class="table table-bordered table-striped mt-2" id="gradeLevelTable" style="display: none;">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Grade Level</th>
                        <th>Month</th>
                        <th>Total Fee</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                           <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateEntry">
                              <i class="fas fa-pen"></i>
                              update
                           </button>
                           <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteEntry">
                              <i class="fas fa-trash"></i>
                              delete
                           </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- EndGradeLevelandFeesTableArea -->


            <!-- PaymentsTableArea -->
            <div class="buttons" id="paymentsButton" style="display: none;">
               <button class="btn btn-outline-success mt-2 mb-2" data-toggle="modal" data-id="" data-target="#paymentsReport">
                  <i class="fas fa-plus"></i>
                  Payments Report
               </button>
            </div>
            <table class="table table-bordered table-striped mt-2" id="paymentsTable" style="display: none;">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>ID No.</th>
                        <th>LRN</th>
                        <th>Fullname</th>
                        <th>Paid Amount</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <!-- <td>
                           <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#">
                              <i class="fas fa-pen"></i>
                              update
                           </button>
                           <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteEntry">
                              <i class="fas fa-trash"></i>
                              delete
                           </button>
                        </td> -->
                    </tr>
                </tbody>
            </table>
            <!-- EndPaymentsTableArea -->

        </div>
    </section>
</div>


<!-- Modals/Dialogs -->


<!-- Add Dialog -->
<div class="modal fade" id="add" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">New Payment</h4>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <!-- SearchArea -->
               <form action="#">
                  <div class="input-group">
                     <input type="search" class="form-control form-control-md" name="searcharea" id="searcharea" placeholder="Search Students ID/Name">
                     <div class="input-group-append">
                           <button type="submit" class="btn btn-md btn-default">
                              <i class="fa fa-search"></i>
                           </button>
                     </div>
                  </div>
               </form>
               <div class="sdata">
                  <label>Students Name</label>
                  <input type="text" class="form-control form-control-md" name="sname" id="sname" disabled>
               </div>
               <div class="sdata">
                  <label>Outstanding Balance</label>
                  <input type="text" class="form-control form-control-md" name="ob" id="ob" disabled>
               </div>
               <div class="sdata">
                  <label>Amount</label>
                  <input type="text" class="form-control form-control-md" name="amt" id="amt" placeholder="P 00.00">
               </div>
               <div class="sdata">
                  <label>Remarks</label>
                  <textarea class="form-control form-control-md" rows="3" cols="" name="remarks" id="remarks" placeholder="..."></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-money"></i>
                  pay
               </button>
               <button type="submit" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                  <i class="fas fa-times"></i>
                  cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Add Dialog -->





<!-- Update Dialog -->
<div class="modal fade" id="update" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Update Payment</h4>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <!-- SearchArea -->
               <form action="#">
                  <div class="input-group">
                     <input type="search" class="form-control form-control-md" name="searcharea" id="searcharea" placeholder="Search Students ID/Name">
                     <div class="input-group-append">
                           <button type="submit" class="btn btn-md btn-default">
                              <i class="fa fa-search"></i>
                           </button>
                     </div>
                  </div>
               </form>
               <div class="sdata">
                  <label>Students Name</label>
                  <input type="text" class="form-control form-control-md" name="i_sname" id="i_sname" disabled>
               </div>
               <div class="sdata">
                  <label>Outstanding Balance</label>
                  <input type="text" class="form-control form-control-md" name="u_ob" id="u_ob" disabled>
               </div>
               <div class="sdata">
                  <label>Amount</label>
                  <input type="text" class="form-control form-control-md" name="u_amt" id="u_amt" placeholder="P 00.00">
               </div>
               <div class="sdata">
                  <label>Remarks</label>
                  <textarea class="form-control form-control-md" rows="3" cols="" name="u_remarks" id="u_remarks" placeholder="..."></textarea>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-money"></i>
                  pay
               </button>
               <button type="submit" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                  <i class="fas fa-times"></i>
                  cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Update Dialog -->





<!-- New Entry Dialog -->
<div class="modal fade" id="newEntry" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">New Fee Entry</h4>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="FeeEntryMainDiv">
                  <div class="details">
                     <label class="dfd">Details</label>
                     <div class="grdlvl">
                        <label>Grade Level</label>
                        <select class="form-control" name="sgrade" id="sgrade" required>
                           <option value="" disabled selected>Select Grade</option>
                           <option value="Grade 1">Grade 1</option>
                           <option value="Grade 2">Grade 2</option>
                           <option value="Grade 3">Grade 3</option>>
                        </select>
                     </div>
                     <div class="month">
                        <label>Month</label>
                        <input type="month" class="form-control" name="month" id="month" required>
                     </div>
                  </div>
                  <div class="feeDetails">
                     <div class="FD">
                        <label class="dfd">Fee Details</label>
                        <div class="feeType">
                           <label>Fee Type</label>
                           <input type="text" class="form-control" name="feeType" id="feeType" required placeholder="fee type">
                        </div>
                        <div class="amount">
                           <label>Amount</label>
                           <input type="text" class="form-control" name="amount" id="amount" required placeholder="P 00.00">
                        </div>
                        <div class="addToList">
                           <button type="submit" class="btn btn-secondary btn-sm">
                              <i class="fas fa-plus"></i>
                              Add To List
                           </button>
                        </div>
                     </div>
                     <div class="nfe_div"></div>
                     <div class="TA">
                        <table class="table">
                           <thead class="text-center">
                              <tr>
                                 <th>Type</th>
                                 <th>Amount</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              <tr>
                                 <td>Tuition</td>
                                 <td>700</td>
                              </tr>
                              <tr>
                                 <td>Guard</td>
                                 <td>60</td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="nfe_div"></div>
                        <div class="totalDiv">
                           <label>Total</label>
                           <div class="totalResult">
                              760
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  save
               </button>
               <button type="submit" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                  <i class="fas fa-times"></i>
                  cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of New Entry Dialog -->





<!-- Update Entry Dialog -->
<div class="modal fade" id="updateEntry" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Update Fee Entry</h4>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="FeeEntryMainDiv">
                  <div class="details">
                     <label class="dfd">Details</label>
                     <div class="grdlvl">
                        <label>Grade Level</label>
                        <select class="form-control" name="u_sgrade" id="u_sgrade" required>
                           <option value="" disabled selected>Select Grade</option>
                           <option value="Grade 1">Grade 1</option>
                           <option value="Grade 2">Grade 2</option>
                           <option value="Grade 3">Grade 3</option>>
                        </select>
                     </div>
                     <div class="month">
                        <label>Month</label>
                        <input type="month" class="form-control" name="u_month" id="u_month" required>
                     </div>
                  </div>
                  <div class="feeDetails">
                     <div class="FD">
                        <label class="dfd">Fee Details</label>
                        <div class="feeType">
                           <label>Fee Type</label>
                           <input type="text" class="form-control" name="u_feeType" id="u_feeType" required placeholder="fee type">
                        </div>
                        <div class="amount">
                           <label>Amount</label>
                           <input type="text" class="form-control" name="u_amount" id="u_amount" required placeholder="P 00.00">
                        </div>
                        <div class="addToList">
                           <button type="submit" class="btn btn-secondary btn-sm">
                              <i class="fas fa-plus"></i>
                              Add To List
                           </button>
                        </div>
                     </div>
                     <div class="nfe_div"></div>
                     <div class="TA">
                        <table class="table">
                           <thead class="text-center">
                              <tr>
                                 <th>Type</th>
                                 <th>Amount</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                              <tr>
                                 <td>Tuition</td>
                                 <td>700</td>
                              </tr>
                              <tr>
                                 <td>Guard</td>
                                 <td>60</td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="nfe_div"></div>
                        <div class="totalDiv">
                           <label>Total</label>
                           <div class="totalResult">
                              760
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  save
               </button>
               <button type="submit" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                  <i class="fas fa-times"></i>
                  cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Update Entry Dialog -->






<!-- View Data Dialog -->
<div class="modal fade" id="viewData" data-backdrop="static">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-body">
            <form action="#">
               <div class="LSG">
                  <div class="lsg">
                     LRN : 
                     <span class="data">100078457</span>
                  </div>
                  <div class="lsg">
                     Student : 
                     <span class="data">Nekka H. Jeminos</span>
                  </div>
                  <div class="lsg">
                     Grade Level and Section : 
                     <span class="data">Grade 2 - A</span>
                  </div>
               </div>
               <div class="receipt_label">
                  Receipt
               </div>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Fee Details</th>
                        <th>Fee Payment Details</th>
                     </tr>
                     <tr>
                        <th>
                           <div class="fta">
                              <div class="fee_type">
                                 Fee Type
                              </div>
                              <div class="amount1">
                                 Amount
                              </div>
                           </div>
                           <div class="top_division"></div>
                           <!--the result/datas for Fee Details will display in this div  -->
                           <div class="fta">
                              <div class="fda">
                                 <!-- this is for the fee type -->
                                 Tuition
                              </div>
                              <div class="fda">
                                 <!-- this is for the Amount of fee -->
                                 700
                              </div>
                           </div>
                           <div class="fta">
                              <div class="fda">
                                 Guard
                              </div>
                              <div class="fda">
                                 60
                              </div>
                           </div>
                        </th>
                        <th>
                           <div class="da">
                              <div class="date">
                                 Date
                              </div>
                              <div class="amount2">
                                 Amount
                              </div>
                           </div>
                           <div class="top_division"></div>
                           <!--the result/datas for FeePaymentDetails will display in this div  -->
                           <div class="da">
                              <div class="fpda">
                                 <!-- this is for the date -->
                                 2023-10-31
                              </div>
                              <div class="fpda">
                                 <!-- this is for the amount result -->
                                 700
                              </div>
                           </div>
                           <div class="da">
                              <div class="fpda">
                                 2023-11-05
                              </div>
                              <div class="fpda">
                                 60
                              </div>
                           </div>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <div class="result_division"></div>
                           <div class="fta">
                              <div class="fda">
                                 Total
                              </div>
                              <div class="fda">
                                 <!-- this area is for FeeDetails result -->
                                 760
                              </div>
                           </div>
                        </td>
                        <td>
                           <div class="da">
                              <div class="fpda">
                                 Total
                              </div>
                              <div class="fpda">
                                 <!-- this area is for FeePaymentDetails result -->
                                 760
                              </div>
                           </div>
                           
                           <div class="rda"></div>
                           <!-- <div class="result_division"></div> -->
                           <div class="da">
                              <div class="fpda">
                                 Total Payable Pay
                              </div>
                              <div class="fpda">
                                 <!-- this area is for total payable result -->
                                 760
                              </div>
                           </div>
                           <div class="da">
                              <div class="fpda">
                                 Total Paid
                              </div>
                              <div class="fpda">
                                 <!-- this area is for total paid result -->
                                 760
                              </div>
                           </div>
                           <div class="da">
                              <div class="fpda">
                                 Balance
                              </div>
                              <div class="fpda">
                                 <!-- this area is for balance result -->
                                 0
                              </div>
                           </div>
                           <div class="result_division"></div>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-outline-success btn-md">
                     <i class="fas fa-print"></i>
                     print
                  </button>
                  <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                     <i class="fas fa-times"></i>
                        cancel
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of View Data Dialog -->




<!-- Payments Report Dialog -->
<div class="modal fade" id="paymentsReport" data-backdrop="static">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header prpMonth">
            <div class="prpMonth">
               <div class="lblMonth">Month of </div>
               <input type="month" class="form-control" name="prpmonth" id="prpmonth">
            </div>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body text-center">
               <table class="table">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>ID No.</th>
                        <th>LRN</th>
                        <th>Fullname</th>
                        <th>Paid Amount</th>
                        <th>Date</th>
                        <th>Remarks</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>1003</td>
                        <td>100078457</td>
                        <td>Nekka Jeminos</td>
                        <td>760</td>
                        <td>10/31/2023</td>
                        <td>Paid</td>
                     </tr>
                  </tbody>
                  <tfoot>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>760</td>
                        <td></td>
                        <td></td>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-print"></i>
                  print
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Payments Report Dialog -->




<!-- Delete Dialog -->
<div class="modal fade" id="deleteEntry" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Confirmation</h4>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <input type="text" class="form-control u_id" name="d_id" id="d_id" readonly hidden>
               <h4>Are you certain you wish to proceed with the deletion?</h4>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  yes
               </button>
               <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">
               <i class="fas fa-times"></i>
                  cancel
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Delete Dialog -->


<script>
    function toggleTables(button) {
        var mainTable = document.getElementById("mainTable");
        var gradeLevelTable = document.getElementById("gradeLevelTable");
        var paymentsTable = document.getElementById("paymentsTable");
        var lsfLabel = document.getElementById("lsfLabel");
        var newEntryButton = document.getElementById("newEntryButton");
        var paymentsButton = document.getElementById("paymentsButton");
        var gotoMainTableLink = document.querySelector('.gotoMainTable');
        var addNewButton = document.getElementById('addNew');

        addNewButton.disabled = false;

        var buttons = document.querySelectorAll(".buttons button");
        buttons.forEach(function (btn) {
            btn.classList.remove("active");
        });

        button.classList.add("active");

        if (button.innerText.trim() === "Grade Level & Fees") {
            mainTable.style.display = "none";
            gradeLevelTable.style.display = "table";
            paymentsTable.style.display = "none";
            lsfLabel.innerHTML = "List of Grade Level and Fees";
            newEntryButton.style.display = "flex";
            paymentsButton.style.display = "none";
            gotoMainTableLink.style.display = 'flex';
            addNewButton.disabled = true;
        } else if (button.innerText.trim() === "Payments") {
            mainTable.style.display = "none";
            gradeLevelTable.style.display = "none";
            paymentsTable.style.display = "table";
            lsfLabel.innerHTML = "List of Payments";
            newEntryButton.style.display = "none";
            paymentsButton.style.display = "block";
            gotoMainTableLink.style.display = 'flex';
            addNewButton.disabled = true;
        } else if (button.innerText.trim() === "Add New") {
            mainTable.style.display = "table";
            gradeLevelTable.style.display = "none";
            paymentsTable.style.display = "none";
            lsfLabel.innerHTML = "List of Student Fees";
            newEntryButton.style.display = "none";
            paymentsButton.style.display = "none";
            gotoMainTableLink.style.display = 'none';
            addNewButton.disabled = false;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const mainTable = document.getElementById('mainTable');
        const gotoMainTableLink = document.querySelector('a.gotoMainTable');
        const addNewButton = document.getElementById('addNew');

        gotoMainTableLink.addEventListener('click', function (event) {
            event.preventDefault();
            mainTable.style.display = 'table';
            gradeLevelTable.style.display = "none";
            paymentsTable.style.display = "none";
            newEntryButton.style.display = "none";
            paymentsButton.style.display = "none";
            lsfLabel.innerHTML = "List of Student Fees";
            gotoMainTableLink.style.display = 'none';


            var buttons = document.querySelectorAll(".buttons button");
            buttons.forEach(function (btn) {
                btn.classList.remove("active");
            });

            addNewButton.disabled = false;
        });
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.pay').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>

@endsection


