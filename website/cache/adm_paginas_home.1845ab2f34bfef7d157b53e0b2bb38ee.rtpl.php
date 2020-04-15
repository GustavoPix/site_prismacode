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
<div class="adm_content">
    <h1>Home</h1>
    <div>
        <p>Título</p>
        <input type="text" id="titulo" value="<?php echo htmlspecialchars( $content->GetContent('titulo'), ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    <div>
        <p>Sobre</p>
        <textarea id="sobre"><?php echo htmlspecialchars( $content->GetContent('sobre'), ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    </div>
    <div>
        <p>Solução</p>
        <textarea id="solucoes"><?php echo htmlspecialchars( $content->GetContent('solucoes'), ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    </div>
    <button class="button1" onclick="Pagina.update()">Salvar</button>
</div>

<script src="<?php echo ROUTE_WEBSITE; ?>/js/adm/PaginasHome.js"></script>