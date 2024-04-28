@extends('layout.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-2">
                <!-- SearchArea -->
                <form action="#" id="form_search">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-md" name="searcharea" id="searcharea2"
                            placeholder="Search Year . . . Ex. 2000">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- EndSearch -->
                <!-- TableArea -->
                <table class="table table-bordered mt-2" id="annual_table" hidden>
                    <thead>
                        <tr class="text-center">
                            <th>Grade Levels</th>
                            <th>List of Students</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="grade_list">
                                <div class="d-flex justify-content-center flex-column">
                                    @foreach ($grade_levels as $grade_level)
                                        <a class="grade_list_link" name="grade_list" id="grade_list" data-grade="{{ $grade_level['id'] }}"> {{ $grade_level['grade'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <table class="table table-bordered">
                                    <div class="batch_year">BATCH <span id="prev_year">2023</span> - <span
                                            id="current_year">2024</span></div>
                                    <thead id="table_head" hidden>
                                        <tr>
                                            <th colspan="2" class="grade_header">
                                                * * * Grade 1 * * *
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_tbody">
                                        <div class="row" id="table_tbody_row" hidden>
                                            <div class="col-6">
                                                Boys
                                            </div>
                                            <div class="col-6">
                                                Girls
                                            </div>
                                            <div class="col-6" id="b_data">
                                            </div>
                                            <div class="col-6" id="g_data">
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- EndTable -->

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
                    title: '<p class="text-center pt-2">Invalid search. Please search only year. Ex: 2000</p>',
                });
                $('#annual_table').prop('hidden', true);
                return;
            }

            $('#table_tbody_row').prop('hidden', true);
            $('#annual_table').prop('hidden', false);
            $('#prev_year').text(searchValue);
            $('#current_year').text(parseInt(searchValue) + 1);
        });

        $(".grade_list_link").on("click", function(e) {
            const grade = $(this).data("grade");
            const year = $('#searcharea2').val();
            const pathTemplate =
                "{{ route('search_student', ['year' => ':year', 'grade' => ':grade']) }}";
            const path = pathTemplate.replace(":year", year).replace(":grade", grade);

            $('#table_tbody_row').prop('hidden', false);
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

                    data['message'].forEach(element => {
                        let rowData = '<div>';
                        if (element.gender === 1) {
                            rowData +=
                                `${element.first_name} ${element.middle_name} ${element.last_name}`;
                            rowData += '</div>';
                            $('#b_data').append(rowData);
                        } else {
                            rowData +=
                                `${element.first_name} ${element.middle_name} ${element.last_name}`;
                            rowData += '</div>';
                            $('#g_data').append(rowData);
                        }
                    });
                },
            });
        })
    </script>
@endsection
