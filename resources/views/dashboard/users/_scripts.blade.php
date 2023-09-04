<script>
    $("#modalUpdateUser").on("show.bs.modal", function (event) {
        var user = $(event.relatedTarget).data("user");
        var modal = $(this);

        modal.find("#id").val(user.id);
        modal.find("#name_update").val(user.name);
        modal.find("#email_update").val(user.email);
        modal.find("#cpf_update").val(user.cpf);
    });

    $("#modalDeleteUser").on("show.bs.modal", function (event) {
        $(this).find("#id").val($(event.relatedTarget).data("id"));
    });
</script>
