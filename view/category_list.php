<?php include("view/header.php") ?>
<?php if ($categories) { ?>
    <section id="list" class="list">
        <header>
            <h2>Category List</h2>
        </header>
        <?php foreach ($categories as $category) : ?>
            <div class="list_row">
                <div class="list_item">
                    <p class="bold"><?= $category['categoryName'] ?></p>
                </div>
                <div class="list_removed">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_category">
                        <input type="hidden" name="category_id" value="<?= $category['categoryID'] ?>">
                        <button class="remove-button">Remove Category</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No Categories exist yet</p>
<?php } ?>
<section>
    <h2>Add Category</h2>
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_category">
        <div class="add_inputs">
            <label>Name:</label>
            <input type="text" name="category_name" maxlength="30" placeholder="Name" autofocus required>
        </div>
        <div class="add-button">
            <button class="bold">Add Category</button>
        </div>
    </form>
</section>
<section>
<a href=".?action=list_items">View Tasks</a>
</section>
<?php include("view/footer.php") ?>