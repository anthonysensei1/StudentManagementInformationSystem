@extends('layout.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-2">
                <!-- SearchArea -->
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-md" name="searcharea" id="searcharea"
                            placeholder="Search Year . . .">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- EndSearch -->
                <!-- TableArea -->
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr class="text-center">
                            <th>Grade Levels</th>
                            <th>List of Students</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="grade_list"> <a href="#" name="grade_list" id="grade_list"> Grade 1</a> </td>
                            <td>
                                <table class="table table-bordered">
                                    <div class="batch_year">BATCH 2023 - 2024</div>
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="grade_header">
                                                * * * Grade 1 * * *
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="boys">
                                               Boys
                                            </td>
                                            <td class="girls">
                                                Girls
                                            </td>
                                        </tr>
                                        <!-- Display the datas for boys and girls -->
                                        <tr>
                                            <!-- Populate data for boys -->
                                            <td class="b_data">
                                                Tom Manayon
                                            </td>
                                            <!-- Populate data for girls -->
                                            <td class="g_data">
                                                Nekka Jeminos
                                            </td>
                                        </tr>
                                        <tr>
                                            <!-- Populate data for boys -->
                                            <td class="b_data">
                                                Tom Manayon
                                            </td>
                                            <!-- Populate data for girls -->
                                            <td class="g_data">
                                                Nekka Jeminos
                                            </td>
                                        </tr>
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
    </script>

@endsection
