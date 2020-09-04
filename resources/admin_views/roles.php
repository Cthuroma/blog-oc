<main>
    <div class="container-fluid">
        <h1 class="mt-4">Home</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Home</li>
        </ol>
        <div class="row">
            <div class="col-xl-4">
                <div class="card bg-light mb-4">
                    <div class="card-body">Owner : Owen Jolivet</div>
                </div>
            </div>
        </div>
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
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Registered on</th>
                            <th>Promote as Admin</th>
                            <?php if($data['loggedUser']->isOwner()) { ?><th>Downgrade to User</th><?php } ?>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Registered on</th>
                            <th>Promote as Admin</th>
                            <?php if($data['loggedUser']->isOwner()) { ?><th>Downgrade to User</th><?php } ?>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach($data['users'] as $user){ ?>
                            <tr>
                                <td><?= $user->getName() ?></td>
                                <td><?= $user->getMail() ?></td>
                                <td><?= $user->getRegistrationDate()->format('F j, Y') ?></td>
                                <td><?php if(!$user->isAdmin() && !$user->isOwner()) { ?><a href="/promoteuser?id=<?= $user->getId() ?>" class="btn btn-primary">Promote to admin</a><?php } ?></td>
                                <td><?php if($data['loggedUser']->isOwner() && $user->isAdmin()) { ?><a href="/downgradeuser?id=<?= $user->getId() ?>" class="btn btn-primary">Downgrade to User</a><?php } ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
