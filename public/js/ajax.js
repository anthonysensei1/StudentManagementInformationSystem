$(".formPost").on("submit", function (e) {
    e.preventDefault();

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });

    $.ajax({
        type: "POST",
        cache: false,
        url: $(this).attr("action"),
        data: $(this).serialize(),
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            switch (data["response"]) {
                case 1:
                    Toast.fire({
                        icon: "success",
                        title:
                            '<p class="text-center pt-2 text-bold text-black">' +
                            data["message"] +
                            "</p>",
                    });

                    setTimeout(function () {
                        window.location.href = data["path"];
                    }, 1500);

                    break;
                default:
                    Toast.fire({
                        icon: "error",
                        title:
                            '<p class="text-center pt-2">' +
                            data["message"] +
                            "</p>",
                    });
                    break;
            }
        },
    });
});

$(".logout").on("submit", function (e) {
    e.preventDefault();

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });

    $.ajax({
        type: "POST",
        cache: false,
        url: $(this).attr("action"),
        data: $(this).serialize(),
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            switch (data["response"]) {
                case 1:
                    Toast.fire({
                        icon: "success",
                        title:
                            '<p class="text-center pt-2 text-bold text-black">' +
                            data["message"] +
                            "</p>",
                    });

                    setTimeout(function () {
                        window.location.href = data["path"];
                    }, 1500);

                    break;
                default:
                    Toast.fire({
                        icon: "error",
                        title:
                            '<p class="text-center pt-2">' +
                            data["message"] +
                            "</p>",
                    });
                    break;
            }
        },
    });
});

$(".formPostSelect").on("submit", function (e) {
    e.preventDefault();

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 1500,
    });
    const id = $("#id").val();
    const role = $("#role").val();
    const u_role = $("#u_role").val();

    const selectedPermissions = $(".permissionRole .selected")
        .map(function () {
            return this.value;
        })
        .get();

    const formData = {
        id: id,
        role: u_role || role,
        permissionRole: selectedPermissions,
    };

    const formPostData = $.param(formData);

    $.ajax({
        type: "POST",
        cache: false,
        url: $(this).attr("action"),
        data: formPostData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            switch (data["response"]) {
                case 1:
                    Toast.fire({
                        icon: "success",
                        title:
                            '<p class="text-center pt-2 text-bold text-black">' +
                            data["message"] +
                            "</p>",
                    });

                    setTimeout(function () {
                        window.location.href = data["path"];
                    }, 1500);

                    break;
                default:
                    Toast.fire({
                        icon: "error",
                        title:
                            '<p class="text-center pt-2">' +
                            data["message"] +
                            "</p>",
                    });
                    break;
            }
        },
    });
});

$(".edit").on("click", function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    let routeTemplate = $(this).data("route-template");
    const url = routeTemplate.replace(":id", id);

    $.ajax({
        type: "GET",
        cache: false,
        url: url,
        data: {
            id: id,
        },
        success: function (data) {
            for (const key in data["message"]) {
                if (data["message"].hasOwnProperty(key)) {
                    $(`.${key},#${key}`).val(data["message"][key]);
                }
            }
        },
    });
});

$(".edit_view").on("click", function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    let routeTemplate = $(this).data("route-template");
    const url = routeTemplate.replace(":id", id);

    $.ajax({
        type: "GET",
        cache: false,
        url: url,
        data: {
            id: id,
        },
        success: function (data) {
            for (const key in data["message"]) {
                if (data["message"].hasOwnProperty(key)) {
                    $(`.${key},#${key}`).text(data["message"][key]);

                    if (key == "payments_date") {
                        const date = new Date(data['message']['payments_date']);

                        const monthNames = ["January", "February", "March", "April", "May",
                            "June",
                            "July", "August", "September", "October", "November", "December"
                        ];

                        const formattedDate =
                            `${monthNames[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;

                        $(`.${key}`).html(formattedDate);
                    }
                }
            }
        },
    });
});
