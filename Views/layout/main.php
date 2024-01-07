<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!--<a class="navbar-brand" href="/index.php/">Asosiy sahifa</a>-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  " href="/auto/list">Avto olam</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="/book/list">Kitoblar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category/list">Kategoriyalar</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/user/list">Foydalanuvchilar</a>
                </li>
                <div style="position: absolute; right: 100px">
                    <form class="d-flex" role="search" method="post" action="search.php">
                        <input class="form-control" type="search" name="title" placeholder="Qidiruv">
                        <button class="btn btn-success" type="submit" name="search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" fill="currentColor"
                                 class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="login">
                    <a class="btn" href="/user/login">Kirish</a>
                </div>
            </ul>
        </div>
    </div>
</nav>

