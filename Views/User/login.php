<div class="userLogin container">
    <div class="row justify-content-center">
        <div class="col-6 mt-3">
            <img class="img" src="/Views/image/7f5b2b.jpg" alt="online market">
            <h4 class="text-center mt-2 mb-4">Online shop</h4>
            <form method="post">
                <div class="form-group">
                    <label> <strong>Foydalanuvchi nomi yoki asosiy elektron pochta </strong> </label>
                    <input
                        type="text"
                        name="email"
                        class="inp form-control mt-2 mb-3"
                        id="exampleInputEmail1"
                    >
                    <label> <strong> Parol </strong> </label>
                    <input
                        type="password"
                        name="password"
                        class="inp form-control mt-2"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                    >
                    <div class="register col d-flex justify-content-between">
                        <p class="mt-5">
                            <input class="check form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">Ealab qolsin
                        </p>
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>

                <div class="col d-flex justify-content-between">
                    <a class="btn btn-primary mt-1 mb-3" href="/user/list">Kirish</a>
                </div>
                <div>
                    <p>
                        Agar bizning saytdan xali xam ro'yxatdan o'tmagan bo'lsangiz
                        bu yerdan ro'yxatdan o'tish mumkin.
                        <a href="/user/register/">Ro'yxatdan o'tish</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .userLogin {
        position: absolute;
        left: 50px;
        right: 50px;
        top: 50px;
    }

    .img {
        display: block;
        margin: 0 auto;
        width: 100px;
        height: 100px;
        border-radius: 60px;
        border: solid 1px;
    }

    .inp {
        border-radius: 5px;
        border: solid 1px;
    }

    .btn {
        width: 700px;
    }
    
    .register {

    }
    .check {
        border: solid 1px;
    }
</style>