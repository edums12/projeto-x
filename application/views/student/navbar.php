<nav>
    <div class="nav-wrapper indigo">
        <div class="container">
            <a href="<?= base_url("StudentController")?>" class="brand-logo">PROJETO X</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="<?= base_url("StudentController")?>">
                        <i class="material-icons left">home</i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#modalClass" class="modal-trigger">
                        <i class="material-icons left">add</i>
                        Turma
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("LoginController/destroyAccess")?>">
                        <i class="material-icons left">close</i>
                        Sair
                    </a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li>
                    <a class="indigo-text text-lighten-1" href="<?= base_url("StudentController")?>" class="">PROJETO X</a>
                </li>
                <li>
                    <a href="<?= base_url("StudentController")?>">
                        <i class="material-icons left">home</i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("LoginController/destroyAccess")?>">
                        <i class="material-icons left">close</i>
                        Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>