<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= htmlspecialchars(ASSETS.'img/home-bg.jpg', ENT_COMPAT, 'utf-8'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Posts List</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($data['posts'] as $post){ ?>
            <div class="post-preview">
                <a href="<?= htmlspecialchars('/post/'.$post->getId(),ENT_COMPAT, 'utf-8'); ?>">
                    <h2 class="post-title">
                        <?= htmlspecialchars($post->getTitle(),ENT_COMPAT, 'utf-8'); ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?= htmlspecialchars($post->getSubtitle(),ENT_COMPAT, 'utf-8'); ?>
                    </h3>
                </a>
                <p class="post-meta">Posted by
                    <?= htmlspecialchars($post->getAuthor()->getName(),ENT_COMPAT, 'utf-8'); ?>
                    on <?= htmlspecialchars($post->getCreaDate()->format('F j, Y'),ENT_COMPAT, 'utf-8'); ?></p>
            </div>
            <?php } ?>
            <hr>
            <!-- Pager -->
            <div class="clearfix">
                <?php if($data['page'] > 1) { ?>
                    <a class="btn btn-primary float-left" href="<?= htmlspecialchars('/posts/'.($data['page']-1),ENT_COMPAT, 'utf-8'); ?>">&larr; Newer Posts</a>
                <?php } ?>
                <a class="btn btn-primary float-right" href="<?= htmlspecialchars('/posts/'.($data['page']+1),ENT_COMPAT, 'utf-8'); ?>">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
</div>
