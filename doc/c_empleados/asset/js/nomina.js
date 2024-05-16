$(document).ready(function () {
    $('#example').DataTable({
        lengthMenu: [
            [8, 16, 24, 32, -1],
            [8, 16, 24, 32, 'All']
        ]
    });
});