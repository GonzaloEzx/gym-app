<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#clientsTable').DataTable();
    });

    var editClientModal = document.getElementById('editClientModal');
    editClientModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var clientId = button.getAttribute('data-id');
        // Populate the form fields with client data using AJAX or similar method
    });

    var deleteClientModal = document.getElementById('deleteClientModal');
    deleteClientModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var clientId = button.getAttribute('data-id');
        document.getElementById('deleteClientId').value = clientId;
    });

    document.getElementById('editClientForm').addEventListener('submit', function (event) {
        event.preventDefault();
        var clientId = document.getElementById('editClientId').value;
        var clientName = document.getElementById('editClientName').value;
        var clientEmail = document.getElementById('editClientEmail').value;
        var clientPhone = document.getElementById('editClientPhone').value;
        var clientPaymentStatus = document.getElementById('editClientPaymentStatus').value;
        // Perform AJAX request to update client
    });

    document.getElementById('deleteClientForm').addEventListener('submit', function (event) {
        event.preventDefault();
        var clientId = document.getElementById('deleteClientId').value;
        // Perform AJAX request to delete client
    });
</script>
</body>
</html>
