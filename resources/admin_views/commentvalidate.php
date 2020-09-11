<main>
    <div class="container-fluid">
        <h1 class="mt-4">Comments waiting validation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Comments</li>
            <li class="breadcrumb-item active">Comments waiting validation</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-newspaper"></i>
                Comments waiting validation
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Post</th>
                            <th>Submitted on</th>
                            <th>Validate</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Author</th>
                            <th>Content</th>
                            <th>Post</th>
                            <th>Submitted on</th>
                            <th>Validate</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($data['comments'] as $comment){ ?>
                            <tr>
                                <td><?= $comment->getAuthor()->getName() ?></td>
                                <td><?= $comment->getContent() ?></td>
                                <td><a href="/post/<?= $comment->getPost() ?>">Post</a></td>
                                <td><?= $comment->getDate()->format('F j, Y - H:i:s') ?></td>
                                <td><a href="/validate-comment?id=<?= $comment->getId() ?>" class="btn btn-outline-primary">Validate</a></td>
                                <td><a href="/delete-comment?id=<?= $comment->getId() ?>" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
