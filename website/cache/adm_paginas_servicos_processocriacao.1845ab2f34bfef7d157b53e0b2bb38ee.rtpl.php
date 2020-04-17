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
    <h2>Serviços</h2>
    <ul>
        <?php $counter1=-1;  if( isset($thirMenu) && ( is_array($thirMenu) || $thirMenu instanceof Traversable ) && sizeof($thirMenu) ) foreach( $thirMenu as $key1 => $value1 ){ $counter1++; ?>
            <li <?php if( $value1["active"] ){ ?>class="selected"<?php } ?>><a href="<?php echo htmlspecialchars( $value1["link"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a></li>
        <?php } ?>
    </ul>
</div>
<div class="adm_content">
    <h1>Serviços / Processo de Criação</h1>
    <div>
        <p>Processos</p>
        <ul class="listTecnologias">
            <?php $counter1=-1;  if( isset($processos) && ( is_array($processos) || $processos instanceof Traversable ) && sizeof($processos) ) foreach( $processos as $key1 => $value1 ){ $counter1++; ?>
            <li>
                <input type="text" id="title_<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" value="<?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                <textarea id="text_<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["text"], ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea>
                <div>
                    <button onclick="Pagina.update(<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Salvar</button>
                    <button onclick="Pagina.delete(<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>)">Deletar</button>
                </div>
            </li>
            <?php } ?>
            <li>
                <input type="text" id="title_new">
                <textarea id="text_new"></textarea>
                <div>
                    <button onclick="Pagina.adicionar()">Salvar</button>
                </div>
            </li>
        </ul>
    </div>
</div>

<script src="<?php echo ROUTE_WEBSITE; ?>/js/adm/PaginaProcessos.js"></script>