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
        var found = false;

        $(this).find('td').each(function() {
            var cellText = $(this).text().toLowerCase();
            if (cellText.includes(searchQuery)) {
                found = true;
                return false; // Break the loop if found in this row
            }
        });

        if (found) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});
