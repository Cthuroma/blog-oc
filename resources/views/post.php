<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= htmlspecialchars(ASSETS.'/uploads/'.$data['post']->getImage(), ENT_COMPAT, 'utf-8'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= htmlspecialchars($data['post']->getTitle(),ENT_COMPAT, 'utf-8'); ?></h1>
                    <h2 class="subheading"><?= htmlspecialchars($data['post']->getSubtitle(),ENT_COMPAT, 'utf-8'); ?></h2>
                    <span class="meta">Posted by
              <?= htmlspecialchars($data['post']->getAuthor()->getName(),ENT_COMPAT, 'utf-8'); ?>
              on <?= htmlspecialchars($data['post']->getCreaDate()->format('F j, Y'),ENT_COMPAT, 'utf-8'); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?= $data['post']->getContent() ?>
            </div>
        </div>
    </div>
</article>
<br>
<div class="container">
    <?php if($data['notification'] === 'comment') { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Your comment has been posted, it will be shown once it is validated by our admins.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Comments</h2>
            <hr class="star-light">
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($data['comments'] as $comment){ ?>
            <div class="col col-10 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?= $comment->getContent() ?>
                    </div>
                    <div class="card-footer text-right text-muted">
                        Posted by <?= $comment->getAuthor()->getName() ?> - <?= htmlspecialchars($comment->getDate()->format('F j, Y'),ENT_COMPAT, 'utf-8'); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Comment form -->
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-10 col-sm-12">
                <form method="post" action="/post-comment/<?= $data['post']->getId() ?>">
                    <div class="form-group">
                        <label for="comment">Write a comment</label>
                        <textarea class="form-control" id="comment" name="comment" placeholder="What do you think ?" required></textarea>
                    </div>
                    <div class="form-group col-6">
                        <input type="submit" class="btn btn-primary" <?php if($data['loggedUser']){ ?> value="Submit comment for validation" <?php }else{ ?> disabled tabindex="-1" value="You need to be logged in to comment" <?php } ?>>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
