$(document).ready(function () {
    $('#example').DataTable({
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All']
        ]
    });
});
