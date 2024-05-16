$(document).ready(function () {
    $('#example').DataTable({
        lengthMenu: [
            [5, 10, 25, -1],
            [5, 10, 25, 'All']
        ],
        order: [
            [3, 'desc'],
            [4, 'desc']
        ]
    });
});
