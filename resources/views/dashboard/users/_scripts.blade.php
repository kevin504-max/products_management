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

    const table = $('#usersTable').DataTable({
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
