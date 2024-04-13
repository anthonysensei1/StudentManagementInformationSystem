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
