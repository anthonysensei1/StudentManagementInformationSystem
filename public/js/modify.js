function edit(id, data) {
    $(".id").val(id);

    if (data === null) return;

    for (let key in data) {
        $(`#${key}`).val(`${data[key]}`);
    }
}

$(".close").on("click", function () {
    $(".modal input").val("");
    $(".modal select").val("");
    $(".modal file").val("");
    $(".modal form")[0].reset();
});

$("#searcharea").on("input", function () {
    const searchQuery = $(this).val().toLowerCase();

    $(".table tbody tr").each(function () {
        const grade = $(this).find("td:nth-child(2)").text().toLowerCase();

        if (grade.includes(searchQuery)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});
