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
    <h2>Mensagens</h2>
    <ul>
        <?php $counter1=-1;  if( isset($secondMenu) && ( is_array($secondMenu) || $secondMenu instanceof Traversable ) && sizeof($secondMenu) ) foreach( $secondMenu as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
</div>
<div class="adm_menu adm_menu3">
    <h2>Novas</h2>
    <ul>
        <?php $counter1=-1;  if( isset($mensagensNovas) && ( is_array($mensagensNovas) || $mensagensNovas instanceof Traversable ) && sizeof($mensagensNovas) ) foreach( $mensagensNovas as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
    <h2>Lidas</h2>
    <ul>
        <?php $counter1=-1;  if( isset($mensagensLidas) && ( is_array($mensagensLidas) || $mensagensLidas instanceof Traversable ) && sizeof($mensagensLidas) ) foreach( $mensagensLidas as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
</div>
<div class="adm_content">
    <h1>Nova mensagem / [2] Teste</h1>
    <div>
        <p>Nome</p>
        <p class="inputCliente"><?php echo htmlspecialchars( $mensagem["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
    </div>
    <div>
        <p>Email</p>
        <p class="inputCliente"><?php echo htmlspecialchars( $mensagem["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
    </div>
    <div>
        <p>Enviado em</p>
        <p class="inputCliente"><?php echo htmlspecialchars( $mensagem["created_at"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
    </div>
    <?php if( $mensagem["answered_in"] > '2000' ){ ?>
    <div>
        <p>Lido em</p>
        <p class="inputCliente"><?php echo htmlspecialchars( $mensagem["answered_in"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
    </div>
    <?php } ?>
    <div>
        <p>Mensagem</p>
        <p class="textoCliente"><?php echo htmlspecialchars( $mensagem["message"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
    </div>
    
    
    <button class="button1" onclick="Pagina.read(<?php echo htmlspecialchars( $mensagem["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Marcar como lida</button>
</div>

<script src="<?php echo ROUTE_WEBSITE; ?>/js/adm/MensagensMensagens.js"></script>