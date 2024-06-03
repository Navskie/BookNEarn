        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basic DataTable Initialization</title>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- DataTables CSS -->
        <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
        </head>
        <body>

        <div class="container mt-5">
        <h2>Employee Data</h2>
        <table id="employeeTable" class="display">
                <thead>
                <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        
                </tr>
                </thead>
                <tbody>
                <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>HR</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>HR</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>HR</td>
                </tr>
                <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td>Marketing</td>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td>Marketing</td>
                        <td>Jane Smith</td>
                        <td>jane@example.com</td>
                        <td>Marketing</td>
                </tr>
                <!-- Add more rows as needed -->
                </tbody>
        </table>
        </div>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        <script>
        $(document).ready(function () {
                $('#employeeTable').DataTable({
                responsive: true,
                });
        });
        </script>

        </body>
        </html>
