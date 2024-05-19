<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients List</title>
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Clients List</h2>
        <table id="clientsTable" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Payment Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= $client['id'] ?></td>
                        <td><?= $client['name'] ?></td>
                        <td><?= $client['email'] ?></td>
                        <td><?= $client['phone'] ?></td>
                        <td><?= $client['payment_status'] ?></td>
                        <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal" data-id="<?= $client['id'] ?>">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteClientModal" data-id="<?= $client['id'] ?>">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Client Modal -->
    <div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="editClientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editClientModalLabel">Edit Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editClientForm">
                        <input type="hidden" id="editClientId">
                        <div class="mb-3">
                            <label for="editClientName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="editClientName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="editClientEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientPhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="editClientPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="editClientPaymentStatus" class="form-label">Payment Status</label>
                            <input type="text" class="form-control" id="editClientPaymentStatus" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Client Modal -->
    <div class="modal fade" id="deleteClientModal" tabindex="-1" aria-labelledby="deleteClientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteClientModalLabel">Delete Client</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this client?</p>
                    <form id="deleteClientForm">
                        <input type="hidden" id="deleteClientId">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var editClientModal = document.getElementById('editClientModal');
        editClientModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var clientId = button.getAttribute('data-id');

            document.getElementById('editClientId').value = clientId;
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
