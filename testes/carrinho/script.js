// script.js
$(document).ready(function() {
    $('.btn-aceitar').on('click', function() {
      var pedidoId = $(this).data('pedido-id');
      // Realizar a lógica para aceitar o pedido com o ID 'pedidoId'
      // Redirecionar o usuário para a página confirm.php
      window.location.href = 'confirm.php';
    });
  
    $('.btn-negar').on('click', function() {
      var pedidoId = $(this).data('pedido-id');
      $('#modal-negar').show();
      $('#form-negar').on('submit', function(event) {
        event.preventDefault();
        var motivo = $('textarea[name="motivo"]').val();
        // Realizar a lógica para negar o pedido com o ID 'pedidoId' e o motivo 'motivo'
        // Redirecionar o usuário para a página negado.php
        window.location.href = 'negado.php';
      });
    });
  
    $('.close').on('click', function() {
      $('#modal-negar').hide();
    });
  });
  