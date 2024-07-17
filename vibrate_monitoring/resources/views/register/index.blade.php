<!doctype html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset("css/login.css") }}>
    <script nonce="f28055c4-5f64-4334-b6a9-3e7773909a3c">
        try{(function(w,d){!function(bS,bT,bU,bV){bS[bU]=bS[bU]||{};bS[bU].executed=[];bS.zaraz={deferred:[],listeners:[]};bS.zaraz._v="5629";bS.zaraz.q=[];bS.zaraz._f=function(bW){return async function(){var bX=Array.prototype.slice.call(arguments);bS.zaraz.q.push({m:bW,a:bX})}};for(const bY of["track","set","debug"])bS.zaraz[bY]=bS.zaraz._f(bY);bS.zaraz.init=()=>{var bZ=bT.getElementsByTagName(bV)[0],b$=bT.createElement(bV),ca=bT.getElementsByTagName("title")[0];ca&&(bS[bU].t=bT.getElementsByTagName("title")[0].text);bS[bU].x=Math.random();bS[bU].w=bS.screen.width;bS[bU].h=bS.screen.height;bS[bU].j=bS.innerHeight;bS[bU].e=bS.innerWidth;bS[bU].l=bS.location.href;bS[bU].r=bT.referrer;bS[bU].k=bS.screen.colorDepth;bS[bU].n=bT.characterSet;bS[bU].o=(new Date).getTimezoneOffset();if(bS.dataLayer)for(const ce of Object.entries(Object.entries(dataLayer).reduce(((cf,cg)=>({...cf[1],...cg[1]})),{})))zaraz.set(ce[0],ce[1],{scope:"page"});bS[bU].q=[];for(;bS.zaraz.q.length;){const ch=bS.zaraz.q.shift();bS[bU].q.push(ch)}b$.defer=!0;for(const ci of[localStorage,sessionStorage])Object.keys(ci||{}).filter((ck=>ck.startsWith("_zaraz_"))).forEach((cj=>{try{bS[bU]["z_"+cj.slice(7)]=JSON.parse(ci.getItem(cj))}catch{bS[bU]["z_"+cj.slice(7)]=ci.getItem(cj)}}));b$.referrerPolicy="origin";b$.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bS[bU])));bZ.parentNode.insertBefore(b$,bZ)};["complete","interactive"].includes(bT.readyState)?zaraz.init():bS.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};
    </script>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/logo2.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign Up</h3>
                                </div>
                            </div>
                            <form action="{{ route('register-form') }}" method="POST" class="register-form">
                                @csrf
                                <div class="form-group mt-3">
                                    <input type="text" name="name"
                                        class="form-control rounded-top @error('name') is-invalid @enderror" required>
                                    <label class="form-control-placeholder" for="name">Name</label>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" required>
                                    <label class="form-control-placeholder" for="email">Email</label>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="register-password-field" type="password" name="password"
                                        class="form-control rounded-bottom @error('password') is-invalid @enderror"
                                        required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#register-password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Register</button>
                                </div>
                            </form>

                            <p class="text-center">Already a member? <a href="{{ route('login') }}">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/login/jquery.min.js"></script>
    <script src="js/login/popper.js"></script>
    <script src="js/login/bootstrap.min.js"></script>
    <script src="js/login/main.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vedd3670a3b1c4e178fdfb0cc912d969e1713874337387"
        integrity="sha512-EzCudv2gYygrCcVhu65FkAxclf3mYM6BCwiGUm6BEuLzSb5ulVhgokzCZED7yMIkzYVg65mxfIBNdNra5ZFNyQ=="
        data-cf-beacon='{"rayId":"87fefd80dae35e97","version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
</body>

</html>