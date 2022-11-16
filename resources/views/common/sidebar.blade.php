<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tech-Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Management
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown"
            aria-expanded="true" aria-controls="taTpDropDown">
            <i class="fas fa-user-alt"></i>
            <span>Merchant Management</span>
        </a>
        <div id="taTpDropDown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Merchant Management:</h6>
                <a class="collapse-item" href="/merchants/create">New Merchant Create</a>
                <a class="collapse-item" href="/merchants">Merchant List</a>
               
            </div>
        </div>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown1"
        aria-expanded="true" aria-controls="taTpDropDown1">
        <i class="fab fa-btc"></i>
        <span>Crypto Management</span>
    </a>
        <div id="taTpDropDown1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Crypto:</h6>
                <a class="collapse-item" href="/crypto">Home</a>
                <a class="collapse-item" href="/crypto">Create Transfer</a>
                <a class="collapse-item" href="/crypto/history">Transfer History</a>
            </div>
        </div>

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#taTpDropDown2"
        aria-expanded="true" aria-controls="taTpDropDown2">
        <i class="fas fa-list"></i>
        <span>Transactions </span>
    </a>
        <div id="taTpDropDown2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Crypto:</h6>
                <a class="collapse-item" href="/trans/All">All</a>
                <a class="collapse-item" href="/trans/Success">Success</a>
                <a class="collapse-item" href="/trans/Fail">Fail</a>
                <a class="collapse-item" href="/trans/Error">Error</a>
                <a class="collapse-item" href="/trans/Review">Review</a>
                <a class="collapse-item" href="/trans/Fraud">Fraud</a>
                <a class="collapse-item" href="/trans/Payouts">Payouts</a>
                <a class="collapse-item" href="/trans/Market">MarketPlace</a>
            </div>
        </div>

    </li>

    <!-- Divider -->


    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>