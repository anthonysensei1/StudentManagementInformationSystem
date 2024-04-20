let selectedGradeLevels = [];
let u_selectedGradeLevels = [];

function edit(id, data) {
    $(".id").val(id);
    if (data === null) return;

    $("input[type='radio'][name='u_grade_level[]']").prop("checked", false);
    $("input[type='radio'][name='u_section[]']").prop("checked", false);
    $(".u_radios_section").prop("hidden", true);

    for (let key in data) {
        let value = data[key];

        if ($(`#${key}`).attr("type") === "time") {
            let timeParts = value.split(":");
            let hours = parseInt(timeParts[0], 10);
            let minutes = parseInt(timeParts[1], 10);

            if (value.includes("PM") && hours < 12) {
                hours += 12;
            } else if (value.includes("AM") && hours === 12) {
                hours = 0;
            }

            let formattedTime = `${hours.toString().padStart(2, "0")}:${minutes
                .toString()
                .padStart(2, "0")}`;
            $(`#${key}`).val(formattedTime);
        } else if (key === "upload_image_name") {
            $(`#${key}`).attr("src", getBaseUrl() + "images/" + value);
        } else if (key.startsWith("u_grade_level_")) {
            let gradeLevelId = value;
            $(`input[name='u_grade_level_[]'][value='${gradeLevelId}']`).prop(
                "checked",
                true
            );
            $(".u_radios_section").each(function () {
                let isMatchingGradeLevel =
                    $(this).data("u_grade_level_id") == gradeLevelId;
                $(this).prop("hidden", !isMatchingGradeLevel);
            });
        } else if (key.startsWith("u_section_")) {
            let sectionId = value;
            $(`input[name='u_section_[]'][value='${sectionId}']`).prop(
                "checked",
                true
            );
        } else if (key.startsWith("u_gender")) {
            let genderId = value;
            $(`input[name='u_gender[]'][value='${genderId}']`).prop(
                "checked",
                true
            );
        } else if (key.startsWith("u_c_section")) {
            var selectedGrade = data["u_c_grade"];
            if (selectedGrade) {
                $(".c_section").parent().removeAttr("hidden");
            } else {
                $(".c_section").parent().attr("hidden", "hidden");
            }

            $(".c_section option").each(function () {
                var sectionGrade = $(this).data("grade-level");
                if (sectionGrade == selectedGrade) {
                    $(this).show();
                    $("#u_c_section").val(data["u_c_section"]);
                } else {
                    $(this).hide();
                }
            });
        } else if (key === "u_upload_image_name") {
            $(`#${key}`).val(value);
            $("#u_image").attr("src", getBaseUrl() + "images/" + value);
            $(".uploadImageLabel").text(value);
        } else if (key === "u_t_upload_image_name") {
            $(`#${key}`).val(value);
            $("#u_image").attr("src", getBaseUrl() + "images_teacher/" + value);
            $(".uploadImageLabel").text(value);
        } else if (key === "u_classes_checkbox") {
            let classesId = value.split(", ");
            classesId.forEach(function (element, index) {
                $(`input[name='u_classes[]'][value='${element}']`).prop(
                    "checked",
                    true
                );
            });
        } else if (key === "u_subjects") {
            let subjectsId = value.split(", ");

            if (subjectsId.length > 0) {
                $("#u_check1").prop("disabled", false);
            }

            subjectsId.forEach(function (element) {
                $(`input[name='u_subjects[]'][value='${element}']`).prop(
                    "checked",
                    true
                );

                $(`.u_table_classes table tbody tr[data-section-id=${element}]`)
                    .removeAttr("hidden")
                    .show();
            });

            let classesId = data['u_classes_checkbox'].split(", ");
            classesId.forEach(function (element, index) {
                let grade_level = $(`input[name='u_classes[]'][value='${element}']`).data('classes-value');
                u_selectedGradeLevels.push(parseInt(grade_level));
            });
        } else if ( key === "u_permissionRole") {
            let permissionRole = value.split(", ");

            $("select[name='u_permissionRole']").val(permissionRole);
        
            $("select[name='u_permissionRole'] option").removeClass('selected');
        
            $("select[name='u_permissionRole'] option").each(function() {
                if(permissionRole.includes($(this).val())) {
                    $(this).addClass('selected');
                }
            });
        } else {
            $(`#${key}`).val(value);
        }
    }
}

function view(id, data) {
    $(".id").val(id);
    if (data === null) return;

    for (let key in data) {
        if (key === "upload_image_name") {
            $(`#${key}`).attr("src", getBaseUrl() + "images/" + data[key]);
        } else if (key === "t_upload_image_name") {
            $(`#${key}`).attr(
                "src",
                getBaseUrl() + "images_teacher/" + data[key]
            );
        } else {
            $(`#${key}`).text(data[key]);
        }
    }
}

$(".close").on("click", function () {
    selectedGradeLevels = [];
    u_selectedGradeLevels = [];
    $(".modal input[type='text']").val("");
    $(".modal input[type='password']").val("");
    $(".modal select").val("");
    $(".modal input[type='radio']").prop("checked", false);
    $(".modal input[type='file']").val("");
    $(".modal form")[0].reset();
    $(".modal input[type='date']").val("");
    $(".modal input[type='number']").val("");
    $(".modal label[for='customFile']").text("Upload Image");
    $(".modal img[class='image']").attr(
        "src",
        getBaseUrl() + "dist/img/nopp.png"
    );
    $(".modal .radios_section").prop("hidden", true);
    $(".modal .c_section_div").prop("hidden", true);
    $(".modal input:checkbox.check2").prop("checked", false);
    $(".table_classes table tbody tr").hide();
    $(".modal input:checkbox#check1").prop("checked", false);
    $(".modal input:checkbox.u_check2").prop("checked", false);
    $(".u_table_classes table tbody tr").hide();
    $(".modal input:checkbox#u_check1").prop("checked", false);
    $(".modal input:checkbox.classes_checkbox").prop("checked", false);
    $(".modal input:checkbox.u_classes_checkbox").prop("checked", false);
});

$("#searcharea").on("input", function () {
    const searchQuery = $(this).val().toLowerCase();

    $(".table tbody tr").each(function () {
        var found = false;

        $(this)
            .find("td")
            .each(function () {
                var cellText = $(this).text().toLowerCase();
                if (cellText.includes(searchQuery)) {
                    found = true;
                    return false;
                }
            });

        if (found) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});

$("input[type=radio][name='grade_level[]']").change(function () {
    const gradeLevelId = this.value;
    $(".radios_section").hide();
    $(".radios_section input[type=radio]").prop("checked", false);
    $(".radios_section")
        .filter(function () {
            return $(this).data("grade_level_id") == gradeLevelId;
        })
        .removeAttr("hidden")
        .show();
});

$("input[type=radio][name='u_grade_level[]']").change(function () {
    const gradeLevelId = this.value;
    $(".u_radios_section").hide();
    $(".u_radios_section input[type=radio]").prop("checked", false);
    $(".u_radios_section")
        .filter(function () {
            return $(this).data("u_grade_level_id") == gradeLevelId;
        })
        .removeAttr("hidden")
        .show();
});

$(".c_grade").change(function () {
    var selectedGrade = $(this).val();
    if (selectedGrade) {
        $(".c_section").parent().removeAttr("hidden");
    } else {
        $(".c_section").parent().attr("hidden", "hidden");
    }

    $(".c_section option").each(function () {
        var sectionGrade = $(this).data("grade-level");
        if (sectionGrade == selectedGrade) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
    $(".c_section").val("");
    $(".c_section option:first").show();
});

$(".classes_checkbox").on("change", function () {
    const gradeLevelId = $(this).data("classes-value");
    const isChecked = $(this).is(":checked");

    if (isChecked) {
        selectedGradeLevels.push(gradeLevelId);
    } else if (!isChecked) {
        const index = selectedGradeLevels.indexOf(gradeLevelId);
        if (index > -1) {
            selectedGradeLevels.splice(index, 1);
        }
    }

    $(".table_classes table tbody tr").hide();
    $("#check1").prop("disabled", true);
    $("#check1").prop("checked", false);
    $("input:checkbox.check2").prop("checked", false);
    if (selectedGradeLevels.length === 0) {
        $(".table_classes table tbody tr").hide();
        $("input:checkbox.check2").prop("checked", false);
    } else {
        $("#check1").prop("disabled", false);
        $.each(selectedGradeLevels, function (index, value) {
            $(
                '.table_classes table tbody tr[data-grade-level-id="' +
                    value +
                    '"]'
            )
                .removeAttr("hidden")
                .show();
        });
    }
});

$("#check1").change(function () {
    var isChecked = this.checked;

    $("input:checkbox.check2").each(function () {
        var tr = $(this).closest("tr");

        if (tr.is(":visible")) {
            $(this).prop("checked", isChecked);
        }
    });
});

$(".u_classes_checkbox").on("change", function () {
    const gradeLevelId = $(this).data("classes-value");
    const isChecked = $(this).is(":checked");

    if (isChecked) {
        u_selectedGradeLevels.push(gradeLevelId);
    } else if (!isChecked) {
        const index = u_selectedGradeLevels.indexOf(gradeLevelId);
        if (index > -1) {
            u_selectedGradeLevels.splice(index, 1);
        }
    }

    $(".u_table_classes table tbody tr").hide();
    $("#u_check1").prop("disabled", true);
    $("#u_check1").prop("checked", false);
    $("input:checkbox.u_check2").prop("checked", false);
    if (u_selectedGradeLevels.length === 0) {
        $(".u_table_classes table tbody tr").hide();
        $("input:checkbox.u_check2").prop("checked", false);
    } else {
        $("#u_check1").prop("disabled", false);
        $.each(u_selectedGradeLevels, function (index, value) {
            $(
                '.u_table_classes table tbody tr[data-grade-level-id="' +
                    value +
                    '"]'
            )
                .removeAttr("hidden")
                .show();
        });
    }
});

$("#u_check1").change(function () {
    var isChecked = this.checked;

    $("input:checkbox.u_check2").each(function () {
        var tr = $(this).closest("tr");

        if (tr.is(":visible")) {
            $(this).prop("checked", isChecked);
        }
    });
});

function getBaseUrl() {
    return window.location.protocol + "//" + window.location.host + "/";
}
