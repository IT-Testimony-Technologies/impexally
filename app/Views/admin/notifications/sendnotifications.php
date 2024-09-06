<div class="row">
    <div class="col-sm-12 title-section">
        <h3><?= trans('Send_Notifications'); ?></h3>
    </div>
</div>

<div class="row mb-4">
    <div class="col-sm-12">
        <h3><?= trans('Send_Notification_to_Single User'); ?></h3>
        <form id="singleUserNotificationForm">
            <div class="form-group">
                <label for="userId"><?= trans('Username'); ?></label>
                <select class="form-control" id="userId" name="user_id" required>
                    <?php if (!empty($users)):
                        foreach ($users as $item): ?>
                            <option value="<?= $item->id ?>"><?= esc(getUsername($item)); ?></option>
                        <?php endforeach;
                    endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="title"><?= trans('Title'); ?></label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="body"><?= trans('Message_Body'); ?></label>
                <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="title">Notification Image(URL)</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary"><?= trans('Send_Notification'); ?></button>
        </form>
        <div id="singleUserNotificationResult" class="mt-3"></div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <h3><?= trans('Send_Notification_to_All_Users'); ?></h3>
        <form id="allUsersNotificationForm">
            <div class="form-group">
                <label for="allTitle"><?= trans('Title'); ?></label>
                <input type="text" class="form-control" id="allTitle" name="title" required>
            </div>
            <div class="form-group">
                <label for="allBody"><?= trans('Message_Body'); ?></label>
                <textarea class="form-control" id="allBody" name="body" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="title">Notification Image (URL)</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary"><?= trans('Send_Notification'); ?></button>
        </form>
        <div id="allUsersNotificationResult" class="mt-3"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#singleUserNotificationForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: 'https://native.impexally.com/public/api/sendnotification',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#singleUserNotificationResult').html('<div class="alert alert-success">Notification sent successfully!</div>');
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    $('#singleUserNotificationResult').html('<div class="alert alert-danger">Error - ' + errorMessage + '</div>');
                }
            });
        });

        $('#allUsersNotificationForm').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: 'https://native.impexally.com/public/api/sendallusersnotification',
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#allUsersNotificationResult').html('<div class="alert alert-success">Notification sent successfully to all users!</div>');
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    $('#allUsersNotificationResult').html('<div class="alert alert-danger">Error - ' + errorMessage + '</div>');
                }
            });
        });
    });
</script>

<style>
<style>
.form-group {
    margin-bottom: 1rem;
}

.form-control {
    margin-bottom: 0.5rem;
}

.btn {
    margin-top: 1rem;
}

.mt-3 {
    margin-top: 1rem !important;
}

.mb-4 {
    margin-bottom: 1.5rem !important;
}
</style>
