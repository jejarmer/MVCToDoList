<?php include('view/header.php'); ?>

<section id="list" class="list">
    <header>
        <form action="." method="get" id="list_header_select" class="list_header_select">
            <input type="hidden" name="action" value="list_items">
            <label>Sort by</label>
            <select name="category_id" required>
                <option value="0">View All</option>
                <?php foreach ($categories as $category) : ?>
                    <?php if ($category_id == $category['categoryID']) { ?>
                        <option value="<?= $category['categoryID'] ?>" selected>
                        <?php } else { ?>
                        <option value="<?= $category['categoryID'] ?>">
                        <?php } ?>
                        <?= $category['categoryName'] ?>
                        </option>
                    <?php endforeach; ?>
            </select>
            <button>Go</button>
        </form>
    </header>
    <?php if ($items) {  ?>
        <?php foreach ($items as $items) : ?>
            <div>
                <div>
                    <p class="bold"><?= $items['categoryName'] ?></p>
                    <p><?= $items['Title'] ?></p>
                    <p><?= $items['Description'] ?></p>
                </div>
                <div>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_item">
                        <input type="hidden" name="task_id" value="<?= $items['ItemNum'] ?>">
                        <button>Remove Task</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php } else {  ?>
        <br>
        <?php if ($category_id) { ?>
            <p>No items exist for this category yet.</p>
        <?php } else { ?>
            <p>No items exist yet.</p>
        <?php } ?>
        <br>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2>Add Task</h2>
    
    <form action="." method="post" id="add_form" class="add_form">
        <input type="hidden" name="action" value="add_item">
        <div class="add_inputs">
            <label>Category</label>
            <select name="category_id" required>
                <option value="">Please select</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category['categoryID'] ?>">
                        <?= $category['categoryName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br />
            <label>Title</label>
            <input type="text" name="title" maxlength="20" placeholder="Title" required>
            <br />
            <label>Desc</label>
            <input type="text" name="description" maxlength="120" placeholder="Description" required>
        </div>
        <div class="add-button">
        <button class="bold">Add Task</button>
        </div>
 </form>
</section>
<section>
<a href=".?action=list_categories">View/Edit Categories</a>
</section>
<?php include('view/footer.php'); ?>