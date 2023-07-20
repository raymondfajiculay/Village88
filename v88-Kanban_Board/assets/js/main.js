$(function () {
    $(".connectedSortable")
        .sortable({
            connectWith: ".connectedSortable",
        })
        .disableSelection();
});
