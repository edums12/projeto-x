<nav>
    <div class="nav-wrapper indigo">
        <div class="container">
            <a href="<?= base_url("ClassController")?>" class="brand-logo">PROJETO X</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="<?= base_url("ClassController")?>">
                        <i class="material-icons left">home</i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("ClassController/listClass")?>">
                        <i class="material-icons left">list</i>
                        Classes
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("WorkControllerTeacher")?>">
                        <i class="material-icons left">book</i>
                        Works
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("LoginController/destroyAccess")?>">
                        <i class="material-icons left">close</i>
                        Logout
                    </a>
                </li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li>
                    <a class="indigo-text text-lighten-1" href="<?= base_url("ClassController")?>" class="">PROJETO X</a>
                </li>
                <li>
                    <a href="<?= base_url("ClassController")?>">
                        <i class="material-icons left">home</i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("ClassController/listClass")?>">
                        <i class="material-icons left">list</i>
                        Classes
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("WorkControllerTeacher")?>">
                        <i class="material-icons left">book</i>
                        Works
                    </a>
                </li>
                <li>
                    <a href="<?= base_url("LoginController/destroyAccess")?>">
                        <i class="material-icons left">close</i>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>