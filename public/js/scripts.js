var langData;

$.ajax({
    url: langUrl,
    type: 'GET',
    async: false,
    success: function(data) {
        langData = data;
    },
    cache: false,
    contentType: false,
    processData: false
});