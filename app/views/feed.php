<link rel="stylesheet" href="assets/vendor/front/semantic/components/feed.css">
<script rel="stylesheet" src="assets/front_end/js/feed.js"></script>
<script rel="stylesheet" src="assets/charts/feed.js"></script>
<br><br><br><br>
<div class="ui container segment" id="article">
    <?php if (isset($data['publicacoes'])): ?>
    <div class="ui feed">
        <?php foreach ($data['publicacoes'] as $publicacao): ?>
            <div class="event">
            <div class="label">
                <img src="assets/files/img/avatar/small/joe.jpg">
            </div>
            <div class="content">
                <div class="summary">
                    <a><?= $publicacao->getUser()->getLogin() ?></a>
                    <div class="date">
                        <?= $publicacao->getData(); ?>
                    </div>
                </div>
                <div id="<?= $publicacao->getGrafico()->getCodigo() ?>"  class="extra text grafico">
                    <?= $publicacao->getDescricao(); ?>
                    <div class="info">
                        <div id="tipo-<?= $publicacao->getGrafico()->getCodigo() ?>"><?= $publicacao->getGrafico()->getTipo() ?></div>
                        <?php foreach ($publicacao->getGrafico()->getDados() as $dado): ?>
                            <div class="nome"><?= $dado->getNome()?></div>
                            <div class="gasto"><?= $dado->getGasto()?></div>
                        <?php endforeach; ?>
                    </div>
                    <canvas id="chart-<?= $publicacao->getGrafico()->getCodigo() ?>"></canvas>
                </div>
                <div class="meta">
                    <a class="like">
                        <i class="like icon"></i><?= count($publicacao->getLike()) ?>
                    </a>
                    <a class="comments comentarios" id="<?= $publicacao->getCodigo(); ?>">
                        <i class="comments icon"></i><?= count($publicacao->getComentarios()) ?>
                    </a>
                </div>
                <div class="ui cookie nag comentarios" style="z-index: inherit" id="comen-<?= $publicacao->getCodigo(); ?>">
                    <i class="close icon black"></i>
                    <div class="ui small comments">
                        <h4 class="ui dividing header">Comentários</h4>
                        <?php foreach ($publicacao->getComentarios() as $comentario): ?>
                            <div class="comment">
                            <a class="avatar">
                                <img src="assets/files/img/avatar/small/matt.jpg" style=" height: auto">
                            </a>
                            <div class="content">
                                <a class="author">Matt</a>
                                <div class="metadata">
                                    <span class="date">Today at 5:42PM</span>
                                </div>
                                <div class="text">
                                    How artistic!
                                </div>
                                <div class="meta">
                                    <a class="like">
                                        <i class="like icon"></i><?= count($publicacao->getLike()) ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <form class="ui reply form">
                            <div class="field">
                                <textarea id="text-<?= $publicacao->getCodigo(); ?>" rows="2"></textarea>
                            </div>
                            <div class="ui blue labeled submit icon button add_coment" id="add-<?= $publicacao->getCodigo(); ?>">
                                <i class="icon edit"></i> Add Comentário
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <?php else: ?>
        <div class="ui middle aligned center aligned grid" id="div1">
            <div class="ui container">

                <div class="ui warning message">
                    <div class="header">
                        Sem postagens
                    </div>
                    <p>Ops, seus seguidores ainda não postaram nenhum <gráfico class="."></gráfico></p>
                </div>
            </div>
        </div>
        <br>
    <?php endif; ?>
</div>