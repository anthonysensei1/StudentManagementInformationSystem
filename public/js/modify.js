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
            var selectedGrade = data['u_c_grade'];
            if (selectedGrade) {
                $(".c_section").parent().removeAttr("hidden");
            } else {
                $(".c_section").parent().attr("hidden", "hidden");
            }

            $(".c_section option").each(function () {
                var sectionGrade = $(this).data("grade-level");
                if (sectionGrade == selectedGrade) {
                    $(this).show();
                    $('#u_c_section').val(data['u_c_section']);
                } else {
                    $(this).hide();
                }
            });
        } else if (key === "u_upload_image_name") {
            $(`#${key}`).val(value);
            $("#u_image").attr("src", getBaseUrl() + "images/" + value);
            $(".uploadImageLabel").text(value);
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
        } else {
            $(`#${key}`).text(data[key]);
        }
    }
}

$(".close").on("click", function () {
    $(".modal input[type='text']").val("");
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

function getBaseUrl() {
    return window.location.protocol + "//" + window.location.host + "/";
}
