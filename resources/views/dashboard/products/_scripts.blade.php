<script>
    $(document).ready(function () {
        $(".mask-money").unmask().mask("#.##0,00", {
            reverse: true,
            placeholder: "0,00"
        });
    });

    $("#modalUpdateProduct").on("show.bs.modal", function (event) {
        var product = $(event.relatedTarget).data("product");
        console.log(product);
        var modal = $(this);

        modal.find("#id").val(product.id);
        modal.find("#name_update").val(product.name);
        modal.find("#code_update").val(product.code);
        modal.find("#price_update").val(product.price);
    });

    $("#modalDeleteProduct").on("show.bs.modal", function (event) {
        $(this).find("#id").val($(event.relatedTarget).data("id"));
    });

    const table = $('#productsTable').DataTable({
        responsive: true,
        lengthChange: true,
        length: 20,
        dom: '<"html5buttons"B>lTfgitp',
        order: [
            [0, "desc"]
        ],
        buttons: [
            {
                extend: 'excel',
                title: 'Histórico de Compras'
            },
            {
                extend: 'pdf',
                title: 'Histórico de Compras'
            },
            {
                extend: 'print',
                customize: function(win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                    .addClass('compact')
                    .css('font-size', 'inherit');
                }
            }
        ]
    })
</script>
