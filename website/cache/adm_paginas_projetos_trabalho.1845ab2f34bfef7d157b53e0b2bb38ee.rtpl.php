<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="adm_menu adm_menu1">
    <p>Olá</p>
    <h1>Gustavo Carvalho</h1>
    <ul>
        <?php $counter1=-1;  if( isset($mainMenu) && ( is_array($mainMenu) || $mainMenu instanceof Traversable ) && sizeof($mainMenu) ) foreach( $mainMenu as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
    <p>Sair</p>
</div>
<div class="adm_menu adm_menu2">
    <h2>Páginas</h2>
    <ul>
        <?php $counter1=-1;  if( isset($secondMenu) && ( is_array($secondMenu) || $secondMenu instanceof Traversable ) && sizeof($secondMenu) ) foreach( $secondMenu as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
</div>
<div class="adm_menu adm_menu3">
    <h2>Projetos</h2>
    <ul>
        <?php $counter1=-1;  if( isset($thirMenu) && ( is_array($thirMenu) || $thirMenu instanceof Traversable ) && sizeof($thirMenu) ) foreach( $thirMenu as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
    <h2>Trabalhos</h2>
    <ul>
        <?php $counter1=-1;  if( isset($trabalhos) && ( is_array($trabalhos) || $trabalhos instanceof Traversable ) && sizeof($trabalhos) ) foreach( $trabalhos as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
        <li <?php if( $novoTrabalho ){ ?>class="selected"<?php } ?>><a href="<?php echo ROUTE; ?>/adm/paginas/projetos/novo">+ Novo Trabalho</a></li>
    </ul>
</div>
<div class="adm_content">
    <h1>Projetos / <?php echo (htmlspecialchars( $trabalho["nome"] , ENT_COMPAT, 'UTF-8', FALSE )?htmlspecialchars(  $trabalho["nome"] , ENT_COMPAT, 'UTF-8', FALSE ): "Novo Trabalho"); ?></h1>
    <div>
        <p>Nome</p>
        <input type="text" id="name" value="<?php echo htmlspecialchars( $trabalho["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    <div>
        <p>Tipo</p>
        <input type="text" id="tipo" value="<?php echo htmlspecialchars( $trabalho["tipo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    <div>
        <p>Site</p>
        <input type="text" id="site" value="<?php echo htmlspecialchars( $trabalho["site"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    <div>
        <p>O Projeto</p>
        <textarea id="projeto"><?php echo htmlspecialchars( $trabalho["projeto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    </div>
    <div>
        <p>Features</p>
        <textarea id="features"><?php echo htmlspecialchars( $trabalho["features"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    </div>
    <div>
        <p>Solução</p>
        <textarea id="solucao"><?php echo htmlspecialchars( $trabalho["solucao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    </div>
    <div>
        <p>Resultado</p>
        <textarea id="resultado"><?php echo htmlspecialchars( $trabalho["resultado"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    </div>
    <div>
        <p>Tecnologias</p>
        <ul class="listTecnologias">
            <?php $counter1=-1;  if( isset($tecnologias) && ( is_array($tecnologias) || $tecnologias instanceof Traversable ) && sizeof($tecnologias) ) foreach( $tecnologias as $key1 => $value1 ){ $counter1++; ?>
            <li id="tecnologia_<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <input type="text" value="<?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled>
                <button onclick="Pagina.pushDelete(<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Deletar</button>
            </li>
            <?php } ?>
            <li>
                <input type="text" id="tecnologias" value="<?php echo htmlspecialchars( $value["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </li>
        </ul>
    </div>
    <div>
        <p>Imagens</p>
        <ul class="listImages">
            <?php if( $imagens ){ ?>
                <?php $counter1=-1;  if( isset($imagens) && ( is_array($imagens) || $imagens instanceof Traversable ) && sizeof($imagens) ) foreach( $imagens as $key1 => $value1 ){ $counter1++; ?>
                <li class="img">
                    <img src="https://prismacode.com/website/img/portfolio/<?php echo htmlspecialchars( $value1["url"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
                </li>
                <?php } ?>
            <?php }else{ ?>
                <li class="img">
                    <img src="https://prismacode.com/website/img/portfolio/0" alt="">
                </li>
                <li class="img">
                    <img src="https://prismacode.com/website/img/portfolio/0" alt="">
                </li>
                <li class="img">
                    <img src="https://prismacode.com/website/img/portfolio/0" alt="">
                </li>
                <li class="img">
                    <img src="https://prismacode.com/website/img/portfolio/0" alt="">
                </li>
                <li class="img">
                    <img src="https://prismacode.com/website/img/portfolio/0" alt="">
                </li>
                <li class="img">
                    <img src="https://prismacode.com/website/img/portfolio/0" alt="">
                </li>
            <?php } ?>
            
        </ul>
    </div>
    <?php if( isset($user["id"]) ){ ?>
    <button class="button1" onclick="Pagina.update(<?php echo htmlspecialchars( $trabalho["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Salvar</button>
    <?php }else{ ?>
    <button class="button1" onclick="Pagina.adicionar()">Adicionar</button>
    <?php } ?>
</div>
<script src="<?php echo ROUTE_WEBSITE; ?>/js/adm/PaginaTrabalhos.js"></script>