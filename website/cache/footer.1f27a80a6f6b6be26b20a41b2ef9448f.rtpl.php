<?php if(!class_exists('Rain\Tpl')){exit;}?><footer class="footer1">
    <div class="extracontainer">
        <div class="container">
            <ul class="socialMedia">
                <li>
                    <a href="<?php echo htmlspecialchars( $contato->getContent('instagram'), ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank"><?php require $this->checkTemplate("instagran");?></a>
                </li>
                <li>
                    <a href="<?php echo htmlspecialchars( $contato->getContent('facebook'), ENT_COMPAT, 'UTF-8', FALSE ); ?>" target="_blank"><?php require $this->checkTemplate("facebook");?></a>
                </li>
            </ul>
            <p><?php echo htmlspecialchars( $contato->getContent('email'), ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
        </div>
    </div>
</footer>

</body>
</html>