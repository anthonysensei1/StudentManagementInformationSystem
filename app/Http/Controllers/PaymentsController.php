<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Classes;
use App\Models\GradeFee;
use App\Models\Section;
use App\Models\Student;
use App\Models\GradeLevel;
use App\Models\PaymentReport;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $render_data = [
            'sections' => Section::join('grade_levels', 'sections.grade_level_id', '=', 'grade_levels.id')->select('sections.*', 'grade_levels.grade')->orderBy('grade_levels.grade', 'asc')->get(),
            'grades' => GradeLevel::all(),
            'grade_level_fees' => GradeFee::join('grade_levels', 'grade_fees.grade_level_id', '=', 'grade_levels.id')->select('grade_fees.*', 'grade_levels.grade')->orderBy('grade_fees.grade_level_id', 'asc')->get()
                ->map(function ($item) {
                    $item->fee_details = json_decode($item->fee_details);
                    return $item;
                }),
            'payments' => Payments::join('students', 'payments.student_id', 'students.id')->join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('sections', 'students.section', 'sections.id')->select('payments.id AS payments_id','payments.*','students.*', 'grade_levels.grade', 'sections.section AS section_name')->orderBy('students.id_no', 'asc')->get(),
            'payments_reports' => PaymentReport::join('students', 'payment_reports.student_id', 'students.id')->join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('sections', 'students.section', 'sections.id')->select('payment_reports.id AS payments_id','payment_reports.*','students.*', 'grade_levels.grade', 'sections.section AS section_name')->orderBy('students.id_no', 'asc')->get(),
            'payments_reports_total' => PaymentReport::sum('amount'),
        ];

        return view('Payments/payments', $render_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $payments = Payments::where('student_id',  $request->id)->first();

        if ($payments) {
            $render_message = [
                'response' => 0,
                'message' => 'Payments is invalid! Student already exist!',
                'path' => '/Payments/payments'
            ];

            return response()->json($render_message); 
        }

        if ($request->amt > $request->ob) {
            $render_message = [
                'response' => 0,
                'message' => 'Payment is invalid! Try again!',
                'path' => '/Payments/payments'
            ];

            return response()->json($render_message);
        }

        $student = Student::where('id',  $request->id)->first();

        $form_data = [
            'balance' => $student['balance'] - $request->amt,
        ];

        Student::where('id',  $request->id)->update($form_data);

        $form_data = [
            'student_id' => $request->id,
            'student_balance' => $request->ob,
            'amount' => $request->amt,
            'remarks' => $request->remarks,
            'payable_balance' => $student['balance'] - $request->amt,
        ];

        $payment = Payments::create($form_data);

        $form_data['payment_id'] = $payment->id;

        PaymentReport::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Adding payment success',
            'path' => '/Payments/payments'
        ];

        return response()->json($render_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query = Payments::join('students', 'payments.student_id', 'students.id')->join('grade_levels', 'students.grade_level', 'grade_levels.id')->join('sections', 'students.section', 'sections.id')->join('grade_fees', 'grade_fees.grade_level_id', 'grade_levels.id')->select('payments.updated_at AS payments_date','payments.*','students.id AS students_id','students.id_no','students.lrn','students.first_name','students.middle_name','students.last_name','students.address','students.b_date','students.age','students.gender','students.grade_level','students.section','students.p_first_name','students.p_middle_name','students.p_last_name', DB::raw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) AS students_fullname'), DB::raw('CONCAT(grade_levels.grade, " ", sections.section) AS grade_section_name'),'students.contact_number','students.email_add','students.status','students.balance', 'grade_levels.grade', 'sections.section AS section_name', 'grade_fees.month', 'grade_fees.fee_details')->where('payments.id', $id)->first();

        $render_data = [
            'response' => 1,
            'message' => $query
        ];
        return response()->json($render_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if ($request->amt > $request->ob) {
            $render_message = [
                'response' => 0,
                'message' => 'Payment is invalid! Try again!',
                'path' => '/Payments/payments'
            ];

            return response()->json($render_message);
        }

        $form_data = [
            'balance' => $request->balance - $request->amt,
        ];

        Student::where('id',  $request->students_id)->update($form_data);

        $form_data = [
            'student_id' => $request->students_id,
            'student_balance' => $request->balance,
            'amount' => $request->amt,
            'remarks' => $request->remarks,
            'payable_balance' => $request->balance - $request->amt,
        ];

        Payments::where('id',  $request->id)->update($form_data);

        $form_data['payment_id'] = $request->id;

        PaymentReport::create($form_data);

        $render_message = [
            'response' => 1,
            'message' => 'Updating payment success',
            'path' => '/Payments/payments'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $form_data = [
            'balance' => $request->balance +  $request->amount,
        ];

        Student::where('id',  $request->students_id)->update($form_data);

        Payments::where('id', '=', $request->id)->delete();

        $render_message = [
            'response' => 1,
            'message' => 'Delete payment success!',
            'path' => '/Payments/payments'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string $id The ID or name of the student to search for.
     * @return \Illuminate\Http\Response
     */
    public function student_search($id)
    {
        $query = Student::join('grade_levels', 'students.grade_level', '=', 'grade_levels.id')
            ->join('sections', 'students.section', '=', 'sections.id')
            ->select(
                'students.*',
                'grade_levels.grade',
                'sections.section AS section_name',
                DB::raw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) AS student_name')
            );

        if (is_numeric($id)) {
            $query->where('students.id_no', $id);
        } else {
            $query->whereRaw('CONCAT(students.first_name, " ", students.middle_name, " ", students.last_name) LIKE ?', ["%{$id}%"]);
        }

        $student = $query->first();

        $render_data = [
            'response' => 1,
            'message' => $student
        ];
        return response()->json($render_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fee_store(Request $request)
    {

        $form_data = [
            'grade_level_id' => $request->sgrade,
            'month' => $request->month,
            'fee_details' => json_encode($request->arr_fee_list),
            'total_amount' => $request->totalAmount,
        ];

        GradeFee::create($form_data);

        $students = Student::where('grade_level',  $request->sgrade)->get();

        foreach ($students as $student) {
            $form_data = [
                'balance' => $student['balance'] + $request->totalAmount,
            ];

            Student::where('id', $student['id'])->update($form_data);
        }

        $render_message = [
            'response' => 1,
            'message' => 'Adding fee entry success',
            'path' => '/Payments/payments'
        ];

        return response()->json($render_message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fee_edit($id)
    {
        $query = GradeFee::join('grade_levels', 'grade_fees.grade_level_id', 'grade_levels.id')
            ->select(
                'grade_fees.*',
                'grade_levels.grade'
            )->where('grade_fees.id', $id)->first();

        $render_data = [
            'response' => 1,
            'message' => $query
        ];
        return response()->json($render_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fee_update(Request $request)
    {
        $form_data = [
            'grade_level_id' => $request->sgrade,
            'month' => $request->month,
            'fee_details' => json_encode($request->arr_fee_list),
        ];

        GradeFee::where('id', '=', $request->id)->update($form_data);

        $students = Student::where('grade_level',  $request->sgrade)->get();

        foreach ($students as $student) {
            $form_data = [
                'balance' => $student['balance'] - $request->defual_totalAmount + $request->totalAmount,
            ];

            Student::where('id', $student['id'])->update($form_data);
        }

        $render_message = [
            'response' => 1,
            'message' => 'Updating fee entry success',
            'path' => '/Payments/payments'
        ];

        return response()->json($render_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fee_destroy(Request $request)
    {
        GradeFee::where('id', '=', $request->id)->delete();

        $render_message = [
            'response' => 1,
            'message' => 'Delete fee entry success!',
            'path' => '/Payments/payments'
        ];

        return response()->json($render_message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student_search_fees($grade_level_id)
    {
        $query = GradeFee::where('grade_level_id', $grade_level_id)->get();

        $render_data = [
            'response' => 1,
            'message' => $query
        ];
        return response()->json($render_data);
    }
}
