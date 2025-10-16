<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>

<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
<?php endif; ?>

<form action="<?= base_url('employees/update/' . $employee['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <p>
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="<?= esc($employee['name']) ?>" required>
    </p>

    <p>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" value="<?= esc($employee['email']) ?>" required>
    </p>

    <p>
        <label for="phone">Phone:</label><br>
        <input type="text" name="phone" id="phone" value="<?= esc($employee['phone']) ?>" required>
    </p>

    <p>
        <label for="image">Image:</label><br>
        <?php if (!empty($employee['image']) && file_exists('uploads/' . $employee['image'])): ?>
            <img src="<?= base_url('uploads/' . $employee['image']) ?>" alt="Employee Image" width="100"><br>
        <?php endif; ?>
        <input type="file" name="image" id="image">
    </p>

    <button type="submit">Update</button>
    <a href="<?= base_url('employees') ?>">Cancel</a>
</form>

</body>
</html>
