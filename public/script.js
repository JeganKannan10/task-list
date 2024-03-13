$(document).ready(function() {
    $('#tasks-table').DataTable({
        destroy: true
    });

    // Add click event handler for status toggle
    $('input[type="checkbox"]').on('change', function() {
        var taskId = $(this).closest('tr').data('task-id');
        var status = $(this).is(':checked') ? '1' : '0';

        // Call updateStatus function to update task status
        updateStatus(taskId, status);
    });

    // Function to update task status via AJAX
    function updateStatus(taskId, status) {
        $.ajax({
            url: '/tasks/' + taskId + '/update-status',
            method: 'POST',
            data: {
                _token: token,
                status: status
            },
            success: function(response) {
                $('#status-'+taskId).html((status == 0) ? 'pending' : 'completed')
                // Show success message using Toastr
                toastr.success('Task status updated successfully');
            },
            error: function(xhr, status, error) {
                // Show error message using Toastr
                toastr.error('Error updating task status');
            }
        });
    }
});