$('a').on('click', function (e) {
    e.preventDefault();
    var href = $(this).attr('href');
    var id = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: href,
        data: {'id': id},
        success: function(){}
    });
});
