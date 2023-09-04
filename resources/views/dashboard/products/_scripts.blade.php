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
</script>
