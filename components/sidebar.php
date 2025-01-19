<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/queseria/config.php';
function disableIfCurrent($page) {
    $current_page = basename($_SERVER['PHP_SELF']);
    return $current_page === $page ? 'disabled' : '';
}
?>
<aside id="sidebar" class="js-sidebar">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="../admin_controller.php">Queseria el veracruzano</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="../admin_controller.php" class="sidebar-link <?= $current_page == 'admin_controller.php' ? 'active' : '' ?>">
                    <i class="fas fa-list-ul fa-lg pe-2"></i>
                    Panel de inicio
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-users fa-lg pe-2"></i>
                    Productos
                </a>
                <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/quesos.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Quesos
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/avenas.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Avenas
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/licores.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Licores
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/chocolates.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Chocolates
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/panaderia.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Panaderia
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/salsas.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Salsas
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/carnes_frias.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Carnes frias
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="<?= BASE_URL ?>productos/horchatas.php" class="sidebar-link">
                            <i class="fas fa-user-plus fa-lg pe-2"></i>Horchatas
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
