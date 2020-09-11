<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit a Post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Posts</li>
            <li class="breadcrumb-item active">Edit a Post</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-feather-alt"></i>
Edit an existing Post
</div>
            <div class="card-body">
                <form method="POST" action="post-update?id=<?= $data['post']->getId() ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="Title" required value="<?= $data['post']->getTitle() ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="subtitle" placeholder="Subtitle" value="<?= $data['post']->getSubtitle() ?>">
                    </div>
                    <div class="form-group">
                        <label for="imageinput">Cover Image</label>
                        <img src="<?= ASSETS.'/uploads/'.$data['post']->getImage() ?>" height="100px" width="150px">
                        <input type="file" class="form-control-file" name="image" id="imageinput">
                        <input class="form-control" type="text" name="imagedescr" placeholder="Image Description" required value="<?= $data['post']->getSubtitle() ?>">
                    </div>

                    <div class="form-group">
                        <textarea id="editor" name="content" required>
                            <?= $data['post']->getContent() ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Publish">
                    </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.ckeditor.com/ckeditor5/21.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
.create( document.querySelector('#editor') )
.catch( error => {
    console.error( error );
} );
</script>
