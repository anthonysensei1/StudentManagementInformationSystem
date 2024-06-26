@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid pt-2">
            <!-- SearchArea -->
            <form action="#" id="form_search">
                <div class="input-group">
                    <input type="search" class="form-control form-control-lg" name="searcharea" id="searcharea2"
                        placeholder="Search Year . . . Ex. 2000" autofocus>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-md btn-default">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- EndSearch -->
            <div class="row">
                <div class="col-lg-3">
                    <!-- TableArea -->
                    <table class="table table-bordered mt-2" id="annual_table" hidden>
                        <thead>
                            <tr class="text-center">
                                <th>Grade Levels</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grade_levels as $grade_level)
                            <tr class="text-center">
                                <td class="grade_list">
                                    <a class="grade_list_link" name="grade_list" id="grade_list"
                                        data-gradename="{{ $grade_level['grade'] }}"
                                        data-grade="{{ $grade_level['id'] }}"> Grade {{ $grade_level['grade'] }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- EndTable -->
                </div>
                <div class="col-lg-9">
                    <table class="table table-bordered mt-2" id="annual_table1" hidden>
                        <thead>
                            <tr class="text-center">
                                <th>List of Students</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>
                                    <table class="table table-bordered">
                                        <div class="batch_year">
                                            BATCH <span id="prev_year">2023</span> - <span id="current_year">2024</span>
                                        </div>
                                        <thead>
                                            <tr class="grade_header" id="table_head" hidden>
                                                <td colspan="2" class="grade_header" id="gradename"></td>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body scrollable">
                                            <tr class="cust_row">
                                                <td class="boys">Boys</td>
                                                <td class="girls">Girls</td>
                                            </tr>
                                            <tr id="table_tbody_row" hidden style="height:470px">
                                                <td id="b_data"></td>
                                                <td id="g_data"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.annualstudentroster').forEach(function(element) {
        element.classList.add('activated');
    });
});

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1500,
});

$("#form_search").on("submit", function(e) {
    e.preventDefault();
    const searchValue = $('#searcharea2').val();
    if (!/^\d{4}$/.test(searchValue)) {
        Toast.fire({
            icon: "error",
            title: '<p class="text-center pt-2">Invalid search. Please search only a year. Ex: 2000</p>',
        });
        $('#annual_table').prop('hidden', true);
        $('#annual_table1').prop('hidden', true);
        return;
    }

    $('#table_tbody_row').prop('hidden', true);
    $('#table_head').prop('hidden', true);
    $('#annual_table').prop('hidden', false);
    $('#annual_table1').prop('hidden', false);
    $('#prev_year').text(searchValue);
    $('#current_year').text(parseInt(searchValue) + 1);
});

$(".grade_list_link").on("click", function(e) {
    const grade = $(this).data("grade");
    const year = $('#searcharea2').val();
    const gradename = $(this).data("gradename");
    const pathTemplate =
        "{{ route('search_student', ['year' => ':year', 'grade' => ':grade']) }}";
    const path = pathTemplate.replace(":year", year).replace(":grade", grade);

    if (gradename) {
        $('#gradename').text(` * * * Grade ${gradename} * * *`);
    }

    $('#table_tbody_row').prop('hidden', false);
    $('#table_head').prop('hidden', false);
    $('#b_data').empty();
    $('#g_data').empty();

    $.ajax({
        type: "GET",
        cache: false,
        url: path,
        data: {
            year: year,
            grade: grade
        },
        success: function(data) {
            $('#b_data').empty(); // Clear previous data
            $('#g_data').empty(); // Clear previous data

            if (data['message'].length === 0) {
                $('#b_data').append('<div class="data">No Data</div>');
                $('#g_data').append('<div class="data">No Data</div>');
            } else {
                data['message'].forEach(element => {
                    let rowData = '<div class="data">';
                    rowData +=
                        `${element.first_name} ${element.middle_name} ${element.last_name}`;
                    rowData += '</div>';
                    if (element.gender === 1) {
                        $('#b_data').append(rowData);
                    } else {
                        $('#g_data').append(rowData);
                    }
                });
            }
        },
    });

})
</script>
@endsection