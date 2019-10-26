

<div class="card" style="width: 36rem;">
    <div class="card-header">
       <h3>Посты</h3>
    </div>
    <ul class="list-group list-group-flush posts-list">
        <?php foreach ($model as $k => $v): ?>
            <li class="list-group-item">
                <a href="" data-id="<?=$v->id?>" data-toggle="modal" class="post-link" data-target="#exampleModalLong"><?= $v->header?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-text">
            </div>
        </div>
    </div>
</div>
