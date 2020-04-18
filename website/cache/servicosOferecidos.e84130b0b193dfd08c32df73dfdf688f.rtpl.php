<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="servicosOferecidos" id="servicosOferecidos">
    <div class="extracontainer">
        <div class="container">
            <div class="titulos">
                <div class="grid-1">
                    <h3>Serviços</h3>
                </div>
                <div class="grid-1">
                    <p>Clique em um tipo de serviço para saber mais.</p>
                </div>
            </div>
            <div class="listAllProjects">
                <ul>
                    <li :class="{active : servicoSelecionado == 1}" class="grid-1" @click="selectService(1)">
                        <span>Website</span>
                    </li>
                    <li :class="{active : servicoSelecionado == 2}" class="grid-1" @click="selectService(2)">
                        <span>Software</span>
                    </li>
                </ul>
            </div>
            <div v-if="servicoSelecionado == 1" class="sectionService">
                <h2 class="grid-2">Website</h2>
                <div>
                    <h3 class="grid-1">O que fazemos</h3>
                    <p class="grid-1"><?php echo htmlspecialchars( $website->GetContent('o que fazemos'), ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
                <div>
                    <h3 class="grid-1">O projeto</h3>
                    <p class="grid-1"><?php echo htmlspecialchars( $website->GetContent('o projeto'), ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
            </div>
            <div v-if="servicoSelecionado == 2" class="sectionService">
                <h2 class="grid-2">Software</h2>
                <div>
                    <h3 class="grid-1">O que fazemos</h3>
                    <p class="grid-1"><?php echo htmlspecialchars( $software->GetContent('o que fazemos'), ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
                <div>
                    <h3 class="grid-1">O projeto</h3>
                    <p class="grid-1"><?php echo htmlspecialchars( $software->GetContent('o projeto'), ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                </div>
            </div>
        </div>
    </div>
    <button href="" class="button1" onclick="vm_newProjectForm.open()">Iniciar projeto</button>
</div>
<script src="<?php echo ROUTE_WEBSITE; ?>/js/servicos.js"></script>