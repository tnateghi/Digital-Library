$("#form-validation").submit(function(e) {
    e.preventDefault();

    $(document).ajaxStart(function() {
        $("#wait").removeClass("hidden");
    });
    $("#results").removeClass("animation-fadeInQuick");
    $("#noResult").removeClass("animation-slideUp");

    $.ajax({
        url: "/admin/book-search?search=" + $("#search").val().replace(' ', '+'),
        success: function(response) {

            $("#results_table").find("tbody tr").remove();

            if (!response.length) {
                $("#noResult").removeClass("hidden").addClass("animation-slideUp");
                $("#results").addClass("hidden");
            } else {
                $("#noResult").addClass("hidden");
                $("#results").removeClass("hidden").addClass("animation-fadeInQuick");
            }
            $.each(response, function(i, item) {
                var status;

                if (item.status) {
                    status = "<span class='label label-success'>" + langData.books.search.available + "</span>";
                } else {
                    status = "<span class='label label-danger'>" + langData.books.search.not_available + "</span>";
                }

                if (typeof admin !== 'undefined') {
                    var link = "<a href='/admin/books/book_id'  class='btn btn-effect-ripple btn-xs btn-success' title='" + langData.books.search.show + "'><i class='fa fa-eye'></i></a>";
                    link = link.replace('book_id', item.id);
                } else {
                    var link = "";
                }


                var category = '<span class="label label-info">' + item.category + '</span>';
                var tr = $('<tr>').append(
                    $('<td class="text-center">').text(item.id),
                    $('<td>').text(item.name),
                    $('<td>').text(item.author),
                    $('<td>').html(category),
                    $('<td>').text(item.bookmaker),
                    $('<td>').text(item.ed_year),
                    $('<td class="text-center">').html(status),
                    $('<td class="text-center">').html(link)
                );
                tr.appendTo('#results_table');
            })
        },
        complete: function() {
            $("#wait").addClass("hidden");
        },

        error: function() {
            alert("خطایی در ارتباط رخ داده است!");
        }
    });
});