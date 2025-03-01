<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        button:hover {
            background-color: #555;
            color: white;
            transition: all ease 0.25s;
        }
    </style>
</head>

<body style="height: 98vh; width: 100vw; background-image: url(https://www.bmmigroup.com/wp-content/uploads/2019/05/food-waste-website-01.png);
 background-position: center; background-size: cover; background-repeat: no-repeat;
 display: flex; flex-direction: column; align-items: center; justify-content: space-evenly; overflow: hidden;">
    <header style="height: 12vh; width: 100vw; top: 0; left: 0; position: fixed; display: flex; align-items: center;">
        <img style="height: 100px; width: 100px;" src="{{ asset('favicon.ico') }}" alt="logo">
        <h1 style="margin-left: 10px; font-size: 2rem;">
            <span style="font-size: 4rem;color: white;">F</span>eed A <span
                style="font-size: 4rem;color: white;">M</span>outh
        </h1>
    </header>
    <div id="container" style="height: 80%; width: 80%; display: flex; align-items: center; justify-content: center;">
        <div class="register-form" style="height: 70%; width: 32%; border-radius: 10px; background: rgba(255, 255, 255, 0.1); 
        backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px); transition: transform 0.3s ease-in-out;
         display: flex; flex-direction: column; align-items: center;">
            <h1 style="text-align: center; font-family: 'Courier New', Courier, monospace; font-size: 2.5rem;">SIGN UP
            </h1>
            <form action="{{ route('register') }}" method="post" style="height: 65%; width: 80%; display: flex; flex-direction: column; 
            align-items: center; justify-content: space-around;">
                @csrf
                <input type="text" name="name" placeholder="Username"
                    style="height: 35px; width: 90%; border-radius: 10px; border: none; padding-inline: 10px;" required>
                <input type="email" name="email" placeholder="Email I'D"
                    style="height: 35px; width: 90%; border-radius: 10px; border: none; padding-inline: 10px;" required>
                <input type="password" name="password" placeholder="Password" id="pass"
                    style="height: 35px; width: 90%; border-radius: 10px; border: none; padding-inline: 10px; position: relative;" required>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="position:absolute; right: 60; margin-top: 70px;" fill="currentColor"
                 class="eye-slash"
                    viewBox="0 0 16 16">
                    <path
                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                    <path
                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                    <path
                        d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="position:absolute; display: none; right: 60; margin-top: 70px;" fill="currentColor"
                 class="eye"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                </svg>
                <button
                    style="height: 35px; width: 80px; border: none; border-radius: 10px; font-family: monospace;">Submit</button>
            </form>
        </div>
    </div>
</body>
<script>
    document.querySelector("#pass").addEventListener("focus",(event)=>{
    document.querySelector(".eye").style.display="flex"
    document.querySelector(".eye-slash").style.display="none"
})

document.querySelector("#pass").addEventListener("blur",(event)=>{
    if(document.querySelector("#pass").value===""){
        document.querySelector(".eye").style.display="none"
        document.querySelector(".eye-slash").style.display="flex"
    }
})
</script>

</html>