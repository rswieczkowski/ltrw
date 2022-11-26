

<hr />
<div>
    <?php if(!empty($invoice)): ?>
        Invoice ID: <?= htmlspecialchars($invoice['id'], ENT_QUOTES)  ?> <br />
        Invoice amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES)  ?> <br />
        User: <?= htmlspecialchars($invoice['name'], ENT_QUOTES)  ?> <br />
    <?php endif ?>
</div>
<hr />
<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="receipt"/>
    <button type="submit">Upload</button>
</form>




