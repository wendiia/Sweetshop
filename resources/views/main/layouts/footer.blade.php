<footer>
    <div class="container">
        <div class="row pt-5">
            <div class="col-xl-3">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('main/img/logo-cake.svg')}}" alt="Logo"  width="80"  >
                </a>
            </div>

            <div class="col-xl-3 d-flex  justify-content-center">
                <img src="{{asset('main/img/i-pointer.png')}}" width="20" height="20" class="mt-1 me-3" alt="Адрес">
                <div class="">
                    <h5 class=" text-white text-uppercase">Наш адрес</h5>
                    <p class="text-white fs-6 mb-0">г. Москва, ул. Какая-то, 10</p>
                    <p class="text-white fs-6 mb-0">г. Королев, ул. Какая-то, 12</p>
                </div>
            </div>

            <div class="col-xl-3 d-flex  justify-content-center">
                <img src="{{asset('main/img/i-phone.png')}}" width="20" height="20" class="mt-1 me-3" alt="Телефон">
                <div class="">
                    <h5 class="text-uppercase text-white">Телефоны</h5>
                    <p class="text-white fs-6 mb-0">8 (233)-423-43-89</p>
                    <p class="text-white fs-6 mb-0">8 (973)-683-11-52</p>
                </div>
            </div>

            <div class="col-xl-3 d-flex  justify-content-center">
                <img src="{{asset('main/img/i-sms.png')}}" width="20" height="20" class="mt-1 me-3" alt="Почта">
                <div class="">
                    <h5 class="text-uppercase text-white">Связаться с нами</h5>
                    <p class="text-white fs-6 mb-0">Wendia12qwe@mail.ru</p>
                    <p class="text-white fs-6 mb-0">varvara@,ail.ru</p>
                </div>
            </div>
            <div class="footer-line"></div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <p class="text-white fs-6">Copyright © 2020 Blare. All Rights Reserved</p>
            </div>
            <div class="col-xl-6 d-flex justify-content-end">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-social ms-3" type="button"> <img src="{{asset('main/img/i-vk.png')}}" width="20" height="20" alt="vk"> </button>
                    <button class="btn btn-social ms-3" type="button"> <img src="{{asset('main/img/i-twitter.png')}}" width="20" height="20" alt="twitter"> </button>
                    <button class="btn btn-social ms-3" type="button"> <img src="{{asset('main/img/i-instagram.png')}}" width="20" height="20" alt="istagram"> </button>
                </div>
            </div>
        </div>
    </div>



</footer>

<script src="{{asset('main/js/script.js')}}?v=<?=time()?>"></script>
<script src="{{asset('main/js/bootstrap.bundle.min.js')}}?v=<?=time()?>"></script>
