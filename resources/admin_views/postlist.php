<main>
    <div class="container-fluid">
        <h1 class="mt-4">Posts list</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Posts</li>
            <li class="breadcrumb-item active">Posts List</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-newspaper"></i>
                Current Posts
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Subtitle</th>
                            <th>Posted on</th>
                            <th>Last Updated on</th>
                            <th>Edit the post</th>
                            <th>Delete the post</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Subtitle</th>
                            <th>Posted on</th>
                            <th>Last Updated on</th>
                            <th>Edit the post</th>
                            <th>Delete the post</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php if (isset($data['posts'])) { foreach($data['posts'] as $post){ ?>
                        <tr>
                            <td><?= $post->getAuthor()->getName() ?></td>
                            <td><?= $post->getTitle() ?></td>
                            <td><img height="75px" src="<?= ASSETS.'uploads/'.$post->getImage() ?>"></td>
                            <td><?= $post->getSubtitle() ?></td>
                            <td><?= $post->getCreaDate()->format('F j, Y') ?></td>
                            <td><?= $post->getEditDate()->format('F j, Y') ?></td>
                            <td><a href="/admin-postedit?id=<?= $post->getId() ?>" class="btn btn-outline-primary">Edit the Post</a></td>
                            <td><a href="/post-delete?id=<?= $post->getId() ?>" class="btn btn-outline-danger">Delete the Post</a></td>
                        </tr>
                        <?php } }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
