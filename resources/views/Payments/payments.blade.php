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
                            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#add"
                                id="addNew">
                                <i class="fas fa-plus"></i>
                                Add New
                            </button>
                        </div>
                        <div class="buttons">
                            <button class="btn btn-outline-success btn-md mt-2 mb-2" onclick="toggleTables(this)">Grade
                                Level & Fees</button>
                        </div>
                        <div class="buttons">
                            <button class="btn btn-outline-success btn-md mt-2 mb-2"
                                onclick="toggleTables(this)">Payments</button>
                        </div>
                        <a href="#" class="gotoMainTable" style="display: none;">Go back to MainTable</a>
                    </div>
                </div>
                <!-- MainTableArea -->
                <table id="example1" class="table table-bordered table-striped mt-2">
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
                        @php
                            $counter = 1;
                        @endphp
                        @if (count($payments) > 0)
                            @foreach ($payments as $payment)
                                <tr class="text-center">
                                    <td>{{ $counter }}</td>
                                    <td>{{ $payment['id_no'] }}</td>
                                    <td>{{ $payment['lrn'] }}</td>
                                    <td>{{ $payment['first_name'] }} {{ $payment['middle_name'] }}
                                        {{ $payment['last_name'] }}</td>
                                    <td>{{ $payment['student_balance'] }}</td>
                                    <td>{{ $payment['amount'] }}</td>
                                    <td>{{ $payment['payable_balance'] }}</td>
                                    <td>
                                        <button class="btn btn-outline-warning btn-md text-dark edit_view edit_view_fees"
                                            data-toggle="modal" data-id="{{ $payment['payments_id'] }}"
                                            data-gradeid="{{ $payment['grade_level'] }}"
                                            data-route-template="{{ route('payment_edit', ['id' => ':id']) }}"
                                            data-target="#viewData">
                                            <i class="fas fa-eye"></i>
                                            view
                                        </button>
                                        <button class="btn btn-outline-primary btn-md edit" data-toggle="modal"
                                            data-id="{{ $payment['payments_id'] }}"
                                            data-route-template="{{ route('payment_edit', ['id' => ':id']) }}"
                                            data-target="#update">
                                            <i class="fas fa-pen"></i>
                                            update
                                        </button>
                                        <button class="btn btn-outline-danger btn-md edit" data-toggle="modal"
                                            data-id="{{ $payment['payments_id'] }}"
                                            data-route-template="{{ route('payment_edit', ['id' => ':id']) }}"
                                            data-target="#deleteEntry">
                                            <i class="fas fa-trash"></i>
                                            delete
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        @endif
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
                        @php
                            $counter = 1;
                        @endphp
                        @if (count($grade_level_fees) > 0)
                            @foreach ($grade_level_fees as $grade_level_fee)
                                <tr class="text-center">
                                    <td>{{ $counter }}</td>
                                    <td> Grade {{ $grade_level_fee['grade'] }}</td>
                                    <td>{{ $grade_level_fee['month'] }}</td>
                                    @php
                                        $fee_details = json_decode($grade_level_fee['fee_details'], true);
                                    @endphp
                                    <td>
                                        @foreach ($fee_details as $fee_detail)
                                            @php
                                                echo 'Fee type: ' .
                                                    $fee_detail['feeType'] .
                                                    ' ' .
                                                    ' Amount: ' .
                                                    $fee_detail['amount'];
                                            @endphp
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-md fee_edit" data-toggle="modal"
                                            data-id="{{ $grade_level_fee['id'] }}"
                                            data-route-template="{{ route('payments_fee_edit', ['id' => ':id']) }}"
                                            data-target="#updateEntry">
                                            <i class="fas fa-pen"></i> update
                                        </button>
                                        {{-- <button class="btn btn-outline-danger btn-md fee_edit" data-toggle="modal"
                                            data-id="{{ $grade_level_fee['id'] }}"
                                            data-route-template="{{ route('payments_fee_edit', ['id' => ':id']) }}"
                                            data-target="#deleteEntryFee">
                                            <i class="fas fa-trash"></i>
                                            delete
                                        </button> --}}
                                    </td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- EndGradeLevelandFeesTableArea -->


                <!-- PaymentsTableArea -->
                <div class="buttons" id="paymentsButton" style="display: none;">
                    <button class="btn btn-outline-success mt-2 mb-2" data-toggle="modal" data-id=""
                        data-target="#paymentsReport">
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
                        @php
                            $counter = 1;
                        @endphp
                        @if (count($payments_reports) > 0)
                            @foreach ($payments_reports as $payments_report)
                                <tr class="text-center">
                                    <td>{{ $counter }}</td>
                                    <td>{{ $payments_report['id_no'] }}</td>
                                    <td>{{ $payments_report['lrn'] }}</td>
                                    <td>{{ $payments_report['first_name'] }} {{ $payments_report['middle_name'] }}
                                        {{ $payments_report['last_name'] }}</td>
                                    <td>{{ $payments_report['amount'] }}</td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No data is displayed!</td>
                            </tr>
                        @endif
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('payments_store') }}" class="formPost">
                    <div class="modal-body">
                        <!-- SearchArea -->
                        <div class="input-group">
                            <input type="search" class="form-control form-control-md searchareas" name="searcharea"
                                id="searcharea2" placeholder="Search Students ID/Name">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-md btn-default search_button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <div class="sdata">
                            <label>Students Name</label>
                            <input type="text" class="form-control form-control-md sname" name="sname"
                                id="sname" readonly>
                        </div>
                        <div class="sdata">
                            <label>Outstanding Balance</label>
                            <input type="text" class="form-control form-control-md ob" name="ob" id="ob"
                                readonly>
                        </div>
                        <div class="sdata">
                            <label>Amount</label>
                            <input type="number" class="form-control form-control-md amt" name="amt" id="amt"
                                required placeholder="P 00.00">
                        </div>
                        <div class="sdata">
                            <label>Remarks</label>
                            <textarea class="form-control form-control-md remarks" rows="3" cols="" name="remarks" id="remarks"
                                placeholder="..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-md">
                            <i class="fas fa-money"></i>
                            pay
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('payments_update') }}" class="formPost">
                    <div class="modal-body">
                        <!-- SearchArea -->
                        {{-- <form action="#">
                            <div class="input-group">
                                <input type="search" class="form-control form-control-md searcharea" name="searcharea"
                                    id="u_searcharea2" placeholder="Search Students ID/Name">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-md btn-default search_button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> --}}
                        <input type="text" class="form-control id" name="id" id=" u_h_id" readonly hidden>
                        <input type="text" class="form-control students_id" name="students_id" id=" u_h_students_id"
                            readonly hidden>
                        <input type="text" class="form-control balance" name="balance" id=" u_h_balance" readonly
                            hidden>
                        <div class="sdata">
                            <label>Students Name</label>
                            <input type="text" class="form-control form-control-md students_fullname" name="sname"
                                id="i_sname" readonly>
                        </div>
                        <div class="sdata">
                            <label>Outstanding Balance</label>
                            <input type="text" class="form-control form-control-md student_balance" name="ob"
                                id="u_ob" readonly>
                        </div>
                        <div class="sdata">
                            <label>Amount</label>
                            <input type="number" class="form-control form-control-md amount" name="amt"
                                id="u_amt" required placeholder="P 00.00">
                        </div>
                        <div class="sdata">
                            <label>Remarks</label>
                            <textarea class="form-control form-control-md remarks" rows="3" cols="" name="remarks" id="u_remarks"
                                placeholder="..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary btn-md">
                            <i class="fas fa-money"></i>
                            save
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
                <form action="{{ route('payments_fee_store') }}" class="formPostFee">
                    <div class="modal-body">
                        <div class="FeeEntryMainDiv">
                            <div class="details">
                                <label class="dfd">Details</label>
                                <div class="grdlvl">
                                    <label>Grade Level</label>
                                    <select class="form-control" name="sgrade" id="sgrade" required>
                                        <option value="" disabled selected>Select Grade</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade['id'] }}">Grade {{ $grade['grade'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="month_new">
                                    <label>Month</label>
                                    <input type="month" class="form-control" name="month" id="month" required>
                                </div>
                            </div>
                            <div class="feeDetails">
                                <div class="FD">
                                    <label class="dfd">Fee Details</label>
                                    <div class="feeType">
                                        <label>Fee Type</label>
                                        <input type="text" class="form-control" name="feeType" id="feeType"
                                            placeholder="fee type">
                                    </div>
                                    <div class="amount_newtry">
                                        <label>Amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount"
                                            placeholder="P 00.00">
                                    </div>
                                    <div class="addToList">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="addToList()">
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
                                        <tbody class="text-center fee_details_list" id="fee_details_list">
                                        </tbody>
                                    </table>
                                    <div class="nfe_div"></div>
                                    <div class="totalDiv">
                                        <label>Total</label>
                                        <div class="totalResult">
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
                        <button type="submit" class="btn btn-outline-danger btn-md close_local" data-dismiss="modal">
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('payments_fee_update') }}" class="formPostFee">
                    <div class="modal-body">
                        <div class="FeeEntryMainDiv">
                            <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                            <div class="details">
                                <label class="dfd">Details</label>
                                <div class="grdlvl">
                                    <label>Grade Level</label>
                                    <select class="form-control grade_level_id" name="sgrade" id="u_sgrade" required>
                                        <option value="" disabled selected>Select Grade</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade['id'] }}">Grade {{ $grade['grade'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="month_new">
                                    <label>Month</label>
                                    <input type="month" class="form-control month" name="month" id="u_month"
                                        required>
                                </div>
                            </div>
                            <div class="feeDetails">
                                <div class="FD">
                                    <label class="dfd">Fee Details</label>
                                    <div class="feeType">
                                        <label>Fee Type</label>
                                        <input type="text" class="form-control" name="u_feeType" id="u_feeType"
                                            placeholder="fee type">
                                    </div>
                                    <div class="amount_u_newtry">
                                        <label>Amount</label>
                                        <input type="number" class="form-control" name="u_amount" id="u_amount"
                                            placeholder="P 00.00">
                                    </div>
                                    <div class="addToList">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="addToList()">
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
                                        <tbody class="text-center fee_details_list">
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
                        <button type="button" class="btn btn-outline-danger btn-md close_local" data-dismiss="modal">
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
                <div class="modal-header bg-gradient-secondary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="LSG">
                            <div class="lsg">
                                LRN :
                                <span class="data lrn"></span>
                            </div>
                            <div class="lsg">
                                Student :
                                <span class="data students_fullname"></span>
                            </div>
                            <div class="lsg">
                                Grade Level and Section :
                                <span class="data grade_section_name"></span>
                            </div>
                        </div>
                        <div class="receipt_label">
                            Receipt
                        </div>
                        <table class="table table-bordered" id="divToPrint">
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
                                        <div class="fta_fee_details"></div>
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
                                            <div class="fpda payments_date">
                                                <!-- this is for the date -->
                                            </div>
                                            <div class="fpda amount">
                                                <!-- this is for the amount result -->
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
                                            <div class="fda2">
                                                Total
                                            </div>
                                            <div class="fpda_total">
                                                <!-- this area is for FeeDetails result -->
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
                                            </div>
                                        </div>

                                        <div class="rda"></div>
                                        <!-- <div class="result_division"></div> -->
                                        <div class="da">
                                            <div class="fpda">
                                                Total Payable Pay
                                            </div>
                                            <div class="fpda amount">
                                                <!-- this area is for total payable result -->
                                            </div>
                                        </div>
                                        <div class="da">
                                            <div class="fpda">
                                                Total Paid
                                            </div>
                                            <div class="fpda student_balance">
                                                <!-- this area is for total paid result -->
                                            </div>
                                        </div>
                                        <div class="da">
                                            <div class="fpda">
                                                Balance
                                            </div>
                                            <div class="fpda payable_balance">
                                                <!-- this area is for balance result -->
                                            </div>
                                        </div>
                                        <div class="result_division"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-success btn-md" id="printButton">
                                <i class="fas fa-print"></i>
                                print
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#" class="formPost">
                    <div class="modal-body text-center">
                        <table class="table" id="divToPrintPayments">
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
                                @php
                                    $counter = 1;
                                    $total = 0;
                                @endphp
                                @if (count($payments_reports) > 0)
                                    @foreach ($payments_reports as $payments_report)
                                        <tr>
                                            <td>{{ $counter }}</td>
                                            <td>{{ $payments_report['id_no'] }}</td>
                                            <td>{{ $payments_report['lrn'] }}</td>
                                            <td>{{ $payments_report['first_name'] }} {{ $payments_report['middle_name'] }}
                                                {{ $payments_report['last_name'] }}</td>
                                            <td>{{ $payments_report['amount'] }}</td>
                                            <td>
                                                @php
                                                    $date = new DateTime($payments_report['created_at']);
                                                    $formattedDate = $date->format('F j, Y');
                                                @endphp
                                                {{ $formattedDate }}
                                            </td>
                                            <td>{{ $payments_report['remarks'] }}</td>
                                        </tr>
                                        @php
                                            $counter++;
                                        @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No data is displayed!</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>{{ $payments_reports_total }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success btn-md" id="printButtonPayments">
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
                <form action="{{ route('payments_destroy') }}" class="formPost">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <input type="text" class="form-control students_id" name="students_id" id="students_id"
                            readonly hidden>
                        <input type="text" class="form-control payable_balance" name="payable_balance"
                            id="payable_balance" readonly hidden>
                        <input type="text" class="form-control balance" name="balance" id="balance" readonly
                            hidden>
                        <input type="text" class="form-control amount" name="amount" id="amount" readonly hidden>
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

    <!-- Delete Dialog -->
    <div class="modal fade" id="deleteEntryFee" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <form action="{{ route('payments_fee_destroy') }}" class="formPostFee">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
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
            var mainTable = document.getElementById("example1");
            var gradeLevelTable = document.getElementById("gradeLevelTable");
            var paymentsTable = document.getElementById("paymentsTable");
            var lsfLabel = document.getElementById("lsfLabel");
            var newEntryButton = document.getElementById("newEntryButton");
            var paymentsButton = document.getElementById("paymentsButton");
            var gotoMainTableLink = document.querySelector('.gotoMainTable');
            var addNewButton = document.getElementById('addNew');

            addNewButton.disabled = false;

            var buttons = document.querySelectorAll(".buttons button");
            buttons.forEach(function(btn) {
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

        document.addEventListener('DOMContentLoaded', function() {
            const mainTable = document.getElementById('example1');
            const gotoMainTableLink = document.querySelector('a.gotoMainTable');
            const addNewButton = document.getElementById('addNew');

            gotoMainTableLink.addEventListener('click', function(event) {
                event.preventDefault();
                mainTable.style.display = 'table';
                gradeLevelTable.style.display = "none";
                paymentsTable.style.display = "none";
                newEntryButton.style.display = "none";
                paymentsButton.style.display = "none";
                lsfLabel.innerHTML = "List of Student Fees";
                gotoMainTableLink.style.display = 'none';


                var buttons = document.querySelectorAll(".buttons button");
                buttons.forEach(function(btn) {
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

        $('.search_button').on('click', function(e) {
            e.preventDefault();
            const id = $('#searcharea2').val() || $('#u_searcharea2').val();
            const path = "{{ route('payments_student_search', ['id' => ':id']) }}".replace(':id', id);
            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    id: id
                },
                success: function(data) {

                    const message = data['message'];
                    $('.sname').val(message['first_name'] + " " + message['middle_name'] + " " +
                        message['last_name']);
                    $('.ob').val(message['balance']);
                    $('.id').val(message['id']);

                }
            });

        });

        let arr_fee_list = [];
        let totalAmount;
        let defual_totalAmount = 0;


        $(".edit_view_fees").on("click", function(e) {
            e.preventDefault();
            const id = $(this).data("gradeid");
            const path =
                "{{ route('payments_student_search_fees', ['id' => ':id']) }}".replace(
                    ":id",
                    id
                );
            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    id: id,
                },
                success: function(data) {
                    $('.fta_fee_details').empty();
                    data["message"].forEach(item => {
                        let arr_fee_details = JSON.parse(item["fee_details"]);
                        let array = JSON.parse(arr_fee_details);
                        array.forEach(item => {

                            let rowHtml = `<div class="fta">
                                <div class="fee_type">${item.feeType}</div>
                                <div class="amount1">${item.amount}</div>
                            </div>`;

                            $('.fta_fee_details').append(rowHtml);

                            let feeObject = {
                                feeType: item.feeType,
                                amount: parseFloat(item.amount)
                            };

                            arr_fee_list.push(feeObject);

                            totalAmount = arr_fee_list.reduce((total, fee) => total +
                                parseFloat(fee.amount), 0);

                            $('.fpda_total').html(totalAmount);

                        })

                    });
                },
            });
        });

        function addToList() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
            });

            let feeType = $('#feeType').val();
            feeType = feeType !== '' ? feeType : $('#u_feeType').val();

            let amount = $('#amount').val();
            amount = amount !== '' ? amount : $('#u_amount').val();


            let feeExists = arr_fee_list.some(fee => fee.feeType === feeType);

            if (feeExists) {
                Toast.fire({
                    icon: "error",
                    title: '<p class="text-center pt-2">Fee type already exists!</p>',
                });
                return;
            } else if (amount == '') {
                Toast.fire({
                    icon: "error",
                    title: '<p class="text-center pt-2">Please provide amount!</p>',
                });
                return;
            }

            let feeObject = {
                feeType: feeType,
                amount: parseFloat(amount)
            };

            arr_fee_list.push(feeObject);
            
            let rowHtml = `<div class="fta">
                       <div class "fee_type">${feeObject.feeType}</div>
                       <div class="amount1">${feeObject.amount}</div>
                   </div>`;

            $('.fee_details_list').append(rowHtml);

            totalAmount = arr_fee_list.reduce((total, fee) => total + parseFloat(fee.amount), 0);


            $('#feeType').val("");
            $('#amount').val("");
            $('#u_feeType').val("");
            $('#u_amount').val("");

            $('.totalResult').text(totalAmount);
        }

        $(".close_local").on("click", function() {
            arr_fee_list = [];
            defual_totalAmount = [];
            $(".modal form").each(function() {
                this.reset();
            });
            $('.fee_details_list').empty();
            $('.totalResult').text("");
        });

        $(".formPostFee").on("submit", function(e) {
            e.preventDefault();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
            });

            if (arr_fee_list.length < 1) {
                Toast.fire({
                    icon: "error",
                    title: '<p class="text-center pt-2"> Please add fee details!</p>',
                });
                return;
            }

            let arrFeeListJson = JSON.stringify(arr_fee_list);

            let formData = $(this).serialize() + '&arr_fee_list=' + encodeURIComponent(arrFeeListJson) +
                '&totalAmount=' + totalAmount + '&defual_totalAmount=' + defual_totalAmount;

            $.ajax({
                type: "POST",
                cache: false,
                url: $(this).attr("action"),
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(data) {
                    switch (data["response"]) {
                        case 1:
                            Toast.fire({
                                icon: "success",
                                title: '<p class="text-center pt-2 text-bold text-black">' +
                                    data["message"] +
                                    "</p>",
                            });

                            setTimeout(function() {
                                window.location.href = data["path"];
                            }, 1500);

                            break;
                        default:
                            Toast.fire({
                                icon: "error",
                                title: '<p class="text-center pt-2">' +
                                    data["message"] +
                                    "</p>",
                            });
                            break;
                    }
                },
            });
        });

        $('.fee_edit').on('click', function(e) {
            e.preventDefault();
            const id = $(this).data('id');
            let routeTemplate = $(this).data('route-template');
            const url = routeTemplate.replace(':id', id);

            $.ajax({
                type: "GET",
                cache: false,
                url: url,
                data: {
                    id: id
                },
                success: function(data) {
                    console.log(data['message']);
                    const arr_fee_details = JSON.parse(data['message']['fee_details']);

                    for (const key in data['message']) {
                        if (data['message'].hasOwnProperty(key)) {
                            $(`.${key},#${key}`).val(data['message'][key]);

                            if ($(`.${key},#${key}`).is('select')) {
                                $(`.${key},#${key}`).find(`option[value="${data['message'][key]}"]`)
                                    .prop('selected', true);
                            }

                            if (key === "fee_details") {

                                const array = JSON.parse(arr_fee_details);
                                array.forEach(item => {

                                    let feeObject = {
                                        feeType: item.feeType,
                                        amount: parseFloat(item.amount)
                                    };

                                    arr_fee_list.push(feeObject);

                                    let rowHtml = `<tr>
                                                        <td>${feeObject.feeType}</td>
                                                        <td>${feeObject.amount}</td>
                                                    </tr>`;

                                    $('.fee_details_list').append(rowHtml);

                                    totalAmount = arr_fee_list.reduce((total, fee) =>
                                        total + parseFloat(fee.amount), 0);

                                    defual_totalAmount = totalAmount;

                                    $('.totalResult').text(totalAmount);

                                });

                            }

                        }
                    }
                }
            });
        });

        $('#printButton').on('click', function() {
            $('#divToPrint').printThis();
        });

        $('#printButtonPayments').on('click', function() {
            $('#divToPrintPayments').printThis();
        });


        $("#prpmonth").on("change", function() {
            const selectedMonth = $(this).val(); // YYYY-MM
            const selectedYearMonth = selectedMonth ? new Date(selectedMonth) : null;

            $(".table tbody tr").each(function() {
                var showRow = false;
                var dateText = $(this).find("td:nth-child(6)").text();

                var rowDate = new Date(dateText);

                if (rowDate.getFullYear() === selectedYearMonth.getFullYear() &&
                    rowDate.getMonth() === selectedYearMonth.getMonth()) {
                    showRow = true;
                }

                $(this).toggle(showRow);
            });
        });
    </script>
@endsection
