<main>
    <div class="container-fluid">
        <h1 class="mt-4">Create a new Post</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Posts</li>
            <li class="breadcrumb-item active">New Post</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-feather-alt"></i>
                Create a new Post
            </div>
            <div class="card-body">
                <form method="POST" action="post-newpost" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="Title" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="subtitle" placeholder="Subtitle">
                    </div>
                    <div class="form-group">
                        <label for="imageinput">Cover Image</label>
                        <input type="file" class="form-control-file" name="image" id="imageinput" required>
                        <input class="form-control" type="text" name="imagedescr" placeholder="Image Description" required>
                    </div>

                    <div class="form-group">
                        <textarea id="editor" name="content" required>
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
