<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Inforation System</title>
</head>
<body class="body"> 
    <div class="main_container">
        <div class="main_container_content">
            <div class="login_header">
                <div class="login_panel_label">
                    Login Panel
                </div>
            </div>
            <form action="#">
                <div class="login_body">
                    <div class="user_inputs">
                        <div class="group">
                            <div class="username_label">
                                Username
                            </div>
                            <input type="text" class="form-control user" name="user" id="user" placeholder="username" required>
                        </div>
                        <div class="group">
                            <div class="username_label">
                                Password
                            </div>
                            <input type="password" class="form-control pass" name="pass" id="pass" placeholder="password" required>
                        </div>
                    </div>
                </div>
                <div class="btn_position">
                    <div type="submit" class="button login-button">
                        login
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<style scope>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
    @font-face {
    font-family: 'Montserrat';
    src: url('fonts/Montserrat-Regular.ttf') format('truetype'),
         url('fonts/Montserrat-Bold.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}
.login-button{
    background-color: #009dad;
    border-radius: 100px;
    box-shadow: rgba(173, 216, 230, .2) 0 -25px 18px -14px inset, rgba(173, 216, 230, .15) 0 1px 2px, rgba(173, 216, 230, .15) 0 2px 4px, rgba(173, 216, 230, .15) 0 4px 8px, rgba(173, 216, 230, .15) 0 8px 16px, rgba(173, 216, 230, .15) 0 16px 32px;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: CerebriSans-Regular,-apple-system,system-ui,Roboto,sans-serif;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    transition: all 250ms;
    border: 0;
    font-size: 16px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;

}
.btn_position{
    display:flex;
    justify-content:center;
    margin-top:10px;
}
.login-button:hover {
    background-color: #fff;
    color:#009dad;
    box-shadow: rgba(0,157,173,.35) 0 -25px 18px -14px inset,rgba(0,157,173,.25) 0 1px 2px,rgba(0,157,173,.25) 0 2px 4px,rgba(0,157,173,.25) 0 4px 8px,rgba(0,157,173,.25) 0 8px 16px,rgba(0,157,173,.25) 0 16px 32px;
    transform: scale(1.05) rotate(-1deg);
}
.username_label{
    padding-top:20px;
    margin-bottom:-5px;
}
.body {
    /* display: block; */
    margin: 0px;
    font-family: 'Montserrat', sans-serif;
    background-image: url("{{asset ('/dist/img/sm2.png') }}");
    
}
.main_container{
    background-color: transparent; 
    display:flex; 
    justify-content:center; 
    height:100%; width:100%; 
    align-items:center; 
    position: fixed;
}

.main_container_content{
    height: 308px;
    width:500px; 
    position:fixed;
    border-radius: 0.35em;
    overflow: hidden;
    background-color: #fff;
    box-shadow: 0 0 0 0 rgba(13, 110, 253, 0), 0 10px 20px -10px rgba(13, 110, 253, 0.25);
    transition:0.3s;
    animation: slideAndFade 0.5s ease-out forwards; 
}

@keyframes slideAndFade {
    0% {
        transform: translateY(10%); 
        opacity: 0; 
    }
    
    100% {
        transform: translateY(0); 
        opacity: 1; 
    }
}
.main_container_content:hover{
    box-shadow: 0 0 0 0 rgba(13, 110, 253, 0), 0 10px 20px 5px rgba(13, 110, 253, 0.25);
    cursor: pointer;
}
.login_header{
    background-color: #009dad;
    display: flex;
    justify-content: center;
}
.login_panel_label{
    font-size: 20px;
    font-weight: 900;
    padding: 15px;
    letter-spacing: 2px;
    font-family: 'Montserrat', sans-serif;
    color: white;
}

.login_body{
    width: 500px;
    display:flex;
    flex-direction: row;
    justify-content: space-around;
}

.user_inputs{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    margin-top: 30px;
}


.form-control {
    display: flex;
    width: 300px;
    margin: 10px;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.group{
    display: flex;
}


</style>