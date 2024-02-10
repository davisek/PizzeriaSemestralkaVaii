$(document).ready(function() {
    $('[data-toggle="modal"][data-target="#deletePizza"]').on('click', function() {
        var pizzaId = $(this).data('delete-id');
        var pizzaName = $(this).data('delete-name');
        $('#pizzaNameDelete').text(pizzaName);

        var form = $('#deletePizzaForm');
        var action = '/admin/delete/pizza/' + pizzaId;
        form.attr('action', action);
    });
    $('[data-toggle="modal"][data-target="#deleteUser"]').on('click', function() {
        var userId = $(this).data('user-delete-id');
        var userName = $(this).data('user-delete-name');
        $('#userNameDelete').text(userName);

        var form = $('#deleteUserForm');
        var action = '/admin/delete/user/' + userId;
        form.attr('action', action);
    });
});
