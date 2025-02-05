<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<?php $currentPage = basename($_SERVER['SCRIPT_NAME']); ?>
<?php
// Sidebar-Menu structure -->
$menuItems = [
    [
        "menuTitle" => "User",
        "icon" => "fa-solid fa-user-gear",
        "pages" => [
            ["title" => "Admin", "url" => "index.php"],
            ["title" => "Settings", "url" => "user.php"],
        ],
    ],
    [
        "menuTitle" => "Home",
        "icon" => "fa-solid fa-house",
        "pages" => [
            ["title" => "Banner", "url" => "banner.php"],
            ["title" => "Features", "url" => "features.php"],
        ],
    ],
    [
        "menuTitle" => "About Us",
        "icon" => "fa fa-info-circle",
        "pages" => [
            ["title" => "About", "url" => "about.php"],
            ["title" => "Statistics", "url" => "statistics.php"],
        ],
    ],
    [
        "menuTitle" => "Services",
        "icon" => "fa fa-briefcase",
        "pages" => [
            ["title" => "Our Services", "url" => "ourServices.php"],
            ["title" => "Services", "url" => "services.php"],
        ],
    ],
    [
        "menuTitle" => "Products",
        "icon" => "fa fa-shopping-bag",
        "pages" => [
            ["title" => "Categories", "url" => "category.php"],
            ["title" => "Products", "url" => "products.php"],
        ],
    ],
    [
        "menuTitle" => "Contact",
        "icon" => "fa-solid fa-address-book",
        "pages" => [
            ["title" => "Information", "url" => "contact.php"],
        ],
    ]
];
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left side of the navbar -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="./" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Search form -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"
                name="search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right side of the navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#messages">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">2</span>
            </a>
        </li>
        <!-- Notifications dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" href="#notifications">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">5</span>
            </a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo -->
    <a href="./" class="brand-link">
        <img src="../assets/img/logo.png" alt="Admin Panel Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/img/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="./" class="d-block">Iqbolshoh Ilhomjonov</a>
            </div>
        </div>

        <!-- Sidebar menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($menuItems as $menuItem): ?>
                    <?php
                    $isActive = false;
                    $isMenuOpen = false;
                    foreach ($menuItem['pages'] as $page) {
                        if ($currentPage === $page['url']) {
                            $isActive = true;
                            $isMenuOpen = true;
                            break;
                        }
                    }
                    ?>
                    <li class="nav-item has-treeview <?= $isMenuOpen ? 'menu-open' : '' ?>">
                        <a class="nav-link <?= $isActive ? 'active' : '' ?>">
                            <i class="nav-icon <?= $menuItem['icon'] ?>"></i>
                            <p>
                                <?= $menuItem['menuTitle'] ?>
                                <?php if (!empty($menuItem['pages'])): ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php endif; ?>
                            </p>
                        </a>
                        <?php if (!empty($menuItem['pages'])): ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($menuItem['pages'] as $page): ?>
                                    <li class="nav-item">
                                        <a href="<?= $page['url'] ?>"
                                            class="nav-link <?= $currentPage === $page['url'] ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?= $page['title'] ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<?php
function renderHeader($pageTitle, $breadcrumbItems)
{
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <?= $pageTitle; ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumbItems as $item): ?>
                            <?php if ($item['url'] === '#'): ?>
                                <li class="breadcrumb-item active"><?= $item['title']; ?></li>
                            <?php else: ?>
                                <li class="breadcrumb-item"><a href="<?= $item['url']; ?>"><?= $item['title']; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>