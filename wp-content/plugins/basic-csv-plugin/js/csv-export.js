jQuery(document).ready(function () {
    jQuery('#csv-download-button').on('click', function (e) {
        e.preventDefault();

        jQuery.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'export_csv',
            },
            dataType: 'json',
            success: function (response) {
                downloadCSV(response.file_url);
            },
        });
    });

    function downloadCSV(fileUrl) {
        var link = document.createElement('a');
        link.href = fileUrl;
        link.download = 'exported_data.csv';
        link.click();
    }
});