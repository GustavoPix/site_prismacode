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
    <h2>Sobre</h2>
    <ul>
        <?php $counter1=-1;  if( isset($thirMenu) && ( is_array($thirMenu) || $thirMenu instanceof Traversable ) && sizeof($thirMenu) ) foreach( $thirMenu as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
    <h2>Equipe</h2>
    <ul>
        <?php $counter1=-1;  if( isset($equipe) && ( is_array($equipe) || $equipe instanceof Traversable ) && sizeof($equipe) ) foreach( $equipe as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
        <li <?php if( $novoUser ){ ?>class="selected"<?php } ?>><a href="<?php echo ROUTE; ?>/adm/paginas/sobre/usuario/novo">+ Novo Usuário</a></li>
    </ul>
</div>
<div class="adm_content">
    <h1>Equipe / <?php echo (htmlspecialchars( $user["name"] , ENT_COMPAT, 'UTF-8', FALSE )?htmlspecialchars(  $user["name"] , ENT_COMPAT, 'UTF-8', FALSE ): "Novo Usuário"); ?></h1>
    <div>
        <p>Nome</p>
        <input type="text" id="name" value="<?php echo htmlspecialchars( $user["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    <div>
        <p>Sobre</p>
        <textarea id="sobre"><?php echo htmlspecialchars( $user["sobre"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
    </div>
    <div>
        <p>Foto</p>
        <div class="img">
            <img src="https://prismacode.com/website/img/picture/<?php echo htmlspecialchars( $user["photo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
        </div>
    </div>
    <div>
        <p>Linkedin</p>
        <input type="text" id="linkedin" value="<?php echo htmlspecialchars( $user["linkedin"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    <div>
        <p>Github</p>
        <input type="text" id="github" value="<?php echo htmlspecialchars( $user["github"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
    </div>
    
    <?php if( isset($user["id"]) ){ ?>
    <button class="button1" onclick="Pagina.update(<?php echo htmlspecialchars( $user["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Salvar</button>
    <?php }else{ ?>
    <button class="button1" onclick="Pagina.adicionar()">Adicionar</button>
    <?php } ?>
</div>
<script src="<?php echo ROUTE_WEBSITE; ?>/js/adm/PaginaUpdateUser.js"></script>